@extends('layouts.frontend.app')

@section('content')

    <section class="search">
        <div class="album py-5 bg-light">
            <div class="container">
                <h1>Search: "{{ $title }}"</h1>
                @if ($products->count() > 0)
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" src="{{ $product->getFirstMediaUrl('bike_image') }}" alt="Bike Image">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $product->title }}
                                        </h5>
                                        <p class="card-text">
                                            @if ($product->discount_price == NULL)
                                            ৳ {{ number_format($product->price_per_day) }} a day
                                            @else
                                                <s>৳ {{ number_format($product->price_per_day) }}</s>
                                                ৳ {{ number_format($product->discount_price) }}
                                            @endif
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <form action="{{ route('add.cart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Cart</button>
                                                </form>
                                                <a href="{{ route('single.product', $product->slug) }}" type="button" class="btn btn-sm btn-outline-secondary">Details</a>
                                            </div>
                                            @if ($product->status == true)
                                                <small class="badge badge-primary">Available</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-primary" role="alert">
                        Product not found
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
