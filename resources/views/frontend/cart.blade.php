@extends('layouts.frontend.app')

@section('content')

    <div class="product-cart spad mt-5">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Shopping Cart Product
                </div>
                <div class="card-body">
                    @if($carts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $cart->name }}</td>
                                            <td>
                                                <form action="{{ route('update.cart.day') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group mb-3 btn-qty">
                                                        <input type="hidden" name="productId" value="{{ $cart->rowId }}">
                                                        <input type="number" class="form-control" min="1" max="10" value="{{ $cart->qty }}" name="qty">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-success input-group-text" id="basic-addon2">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                ৳ {{ $cart->price*$cart->qty }}
                                            </td>
                                            <td>
                                                <form action="{{ route('remove.cart', $cart->rowId) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-action">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="total-bg">
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td>
                                            ৳{{ Cart::subtotal() }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('checkout') }}" class="btn btn-success btn-block">Checkout</a>
                        </div>
                    @else
                        <div class="alert alert-primary" role="alert">
                            Product not here in cart
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
