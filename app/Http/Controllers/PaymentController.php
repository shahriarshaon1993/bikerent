<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function payment(Request $request)
    {
        $owner_id = Bike::where('id', $request->id)->pluck('user_id')->first();
        $order = Order::create([
            'user_id' => Auth::id(),
            'owner_id' => $owner_id,
            'amount' => Cart::Subtotal(),
            'status_code' => uniqid()
        ]);

        $order_id = $order->id;

        $shipping = Shipping::create([
            'order_id' => $order_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'post_code' => $request->postCode
        ]);

        $content = Cart::content();

        foreach($content as $item) {
            OrderDetails::create([
                'order_id' => $order_id,
                'bike_id' => $item->id,
                'bike_name' => $item->name,
                'day' => $item->qty,
                'singleprice' => $item->price,
                'totalprice' => $item->price*$item->qty
            ]);
        }

        Bike::where('id', $request->id)->update([
            'booked_status' => false
        ]);

        Cart::destroy();
        notify()->success('Order done', 'Done');
        return redirect()->route('show.cart');
    }
}