<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'checkout']);
    }


    /**
     * Add to cart logic
     *
     * @param  mixed $request
     * @return void
     */
    public function addToCart(Request $request, $id)
    {
        $data = [];
        $product = Bike::where('id', $request->id)->first();

        $data['id'] = $product->id;
        $data['name'] = $product->title;
        $data['qty'] = 1;
        $data['weight'] = 1;

        if ($product->discount_price == NULL) {
            $data['price'] = $product->price_per_day;
        } else {
            $data['price'] = $product->discount_price;
        }

        Cart::add($data);
        notify()->success('Product add in your cart.', 'Added');
        return back();
    }

    /**
     * Show all carts in cart page
     *
     * @return void
     */
    public function showCart()
    {
        $carts = Cart::content();
        return view('frontend.cart', compact('carts'));
    }

    /**
     * Update Cart
     *
     * @param  mixed $request
     * @return void
     */
    public function updateCartDay(Request $request)
    {
        $rowId = $request->productId;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        notify()->success('Product upadate your day.', 'Updated');
        return back();
    }

    /**
     * Remove from carts
     *
     * @param  mixed $rowId
     * @return void
     */
    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        notify()->success('Product successfully remove in your cart.', 'Removed');
        return back();
    }

    /**
     * Apply checkout lgic
     *
     * @return void
     */
    public function checkout()
    {
        $carts = Cart::content();
        if($carts->count() > 0) {
            if(Auth::check()) {
                return view('frontend.checkout', compact('carts'));
            }else {
                return view('auth.login');
            }
        }else {
            return Redirect()->route('show.cart');
        }
    }
}