<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * get spacific order for spacific user
     *
     * @return void
     */
    public function index()
    {
        $orders = Order::where('status_op', false)
                ->where('owner_id', Auth::id())->get();
        return view('frontend.profile.orders.index', compact('orders'));
    }

    public function delivery()
    {
        $orders = Order::where('status_op', true)
                ->where('owner_id', Auth::id())->get();
        return view('frontend.profile.orders.index', compact('orders'));
    }

    /**
     * View single oder
     *
     * @return void
     */
    public function orderView($id)
    {
        $order = Order::with('user')->where('id', $id)->first();
        $shipping = Shipping::with('order')->where('order_id', $id)->first();
        $details = OrderDetails::with('order', 'bike')->where('order_id', $id)->first();

        return view('frontend.profile.orders.view', compact('order', 'shipping', 'details'));
    }

    /**
     * Order Accept logic
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function orderAccept($id)
    {
        Order::where('id', $id)->update([
            'status_op' => true
        ]);
        notify()->success('Order acceped', 'Success');
        return redirect()->route('user.profile.orders');
    }

    /**
     * order Cencel logic
     *
     * @param  mixed $id
     * @return void
     */
    public function orderCancel($id)
    {
        Order::where('id', $id)->delete();
        notify()->success('Order cancel', 'Cancel');
        return redirect()->route('user.profile.orders');
    }

    public function myOrder()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.profile.orders.myorders', compact('orders'));
    }
}