@extends('layouts.frontend.app')

@section('content')

<section class="spad mt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Checkout
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-success badge-pill">
                                {{ $carts->count() }}
                            </span>
                        </h4>
                        <ul class="list-group mb-3 checkout-list-group">
                            @foreach ($carts as $cart)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $cart->name }}</h6>
                                        <small class="text-muted">day: {{ $cart->qty }}</small>
                                    </div>
                                    <span class="text-muted">৳{{ $cart->price*$cart->qty }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Total</h6>
                                </div>
                                <span class="text-muted">৳{{ Cart::subtotal() }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form action="{{ route('proccess.payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cart->id }}">

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter phone">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="" cols="10" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="city">City</label>
                                        <input name="city" type="text" class="form-control" placeholder="Your city">
                                    </div>
                                    <div class="col">
                                        <label for="postCode">Post code</label>
                                        <input name="postCode" type="text" class="form-control" id="postCode" placeholder="Post code">
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <h4 class="mb-3">Payment</h4>

                            <div class="my-3">
                                <div class="custom-control custom-radio">
                                    <input class="form-check-input" type="radio" name="cashon" id="cashon" value="1" checked>
                                    <label class="form-check-label" for="cashon">
                                        Cash on delivery
                                    </label>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Order Done</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
