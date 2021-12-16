<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all orders in order table
     *
     * @return void
     */
    public function index()
    {
        Gate::authorize('app.bikes.index');
        $orders = Order::where('status_op', false)->get();
        return view('backend.orders.index', compact('orders'));
    }

    public function delivered()
    {
        Gate::authorize('app.bikes.index');
        $orders = Order::where('status_op', true)->get();
        return view('backend.orders.index', compact('orders'));
    }

    /**
     * View single oder
     *
     * @return void
     */
    public function orderView($id)
    {
        Gate::authorize('app.bikes.index');
        $order = Order::with('user')->where('id', $id)->first();
        $shipping = Shipping::with('order')->where('id', $id)->first();
        $details = OrderDetails::with('order', 'bike')->where('id', $id)->first();

        return view('backend.orders.view', compact('order', 'shipping', 'details'));
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
        Gate::authorize('app.bikes.index');
        Order::where('id', $id)->update([
            'status_op' => true
        ]);
        notify()->success('Order acceped', 'Success');
        return redirect()->route('app.order.index');
    }

    /**
     * order Cencel logic
     *
     * @param  mixed $id
     * @return void
     */
    public function orderCancel($id)
    {
        Gate::authorize('app.bikes.index');
        Order::where('id', $id)->delete();
        notify()->success('Order cancel', 'Cancel');
        return redirect()->route('app.order.index');
    }
}