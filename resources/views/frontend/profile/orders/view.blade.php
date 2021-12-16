@extends('layouts.frontend.app')

@section('content')

    <section class="order-list my-5">
        <div class="container">
            <h2 class="card-title">
                Order Details
            </h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order</h5>
                            <p><b>Name:</b> {{ $order->user->name }}</p>
                            <p><b>Amount:</b> {{ $order->amount }}</p>
                            <p><b>Status code:</b> {{ $order->status_code }}</p>
                            <p>
                                <b>Status:</b>
                                @if ($order->status_op == true)
                                    <span class="badge badge-primary">Delevered</span>
                                @else
                                    <span class="badge badge-danger">Pending</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Shipping</h2>
                            <p><b>Name:</b>  {{ $shipping->name }}</p>
                            <p><b>Email:</b> {{ $shipping->email }}</p>
                            <p><b>Phone:</b> {{ $shipping->phone }}</p>
                            <p><b>Address:</b> {{ $shipping->address }}</p>
                            <p><b>City:</b> {{ $shipping->city }}</p>
                            <p><b>Post code:</b> {{ $shipping->post_code }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Product Details</h2>
                            <p><b>Name:</b>  {{ $details->bike_name }}</p>
                            <p><b>Day:</b>  {{ $details->day }}</p>
                            <p><b>Single day price:</b>  {{ $details->singleprice }}</p>
                            <p><b>Total price:</b>  {{ $details->totalprice }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if ($order->status_op == false)
                <form class="mt-5" action="{{ route('user.profile.order.accept', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-block btn-success">Order accept</button>
                </form>

                <form class="mb-5 mt-2" action="{{ route('user.profile.order.cancel', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-block btn-danger">Order cancel</button>
                </form>
            @endif

        </div>
    </section>

@endsection
