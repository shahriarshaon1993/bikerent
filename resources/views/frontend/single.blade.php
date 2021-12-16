@extends('layouts.frontend.app')

@section('content')
    <section class="single-product mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="{{ $product->getFirstMediaUrl('bike_image') }}" alt="Product image">
                </div>
                <div class="col-md-8">
                    <h2 class="card-title">{{ $product->title }}</h2>
                    <p>
                        <a href="#">{{ $product->brand->name }}</a>
                        <a href="#">{{ $product->category->name }}</a>
                        product by
                        <a href="#">{{ $product->user->name }}</a>
                        created at {{ $product->created_at->toDayDateTimeString() }}
                    </p>
                    <h3 class="card-text mb-3">
                        Price:
                        @if ($product->discount_price == NULL)
                            ৳ {{ number_format($product->price_per_day) }} a day
                        @else
                            ৳ {{ number_format($product->discount_price) }}
                            <s>৳ {{ number_format($product->price_per_day) }}</s>
                        @endif
                        per day
                    </h3>

                    <form action="{{ route('add.cart', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">Add to cart</button>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2>Details: </h2>
                    <p>{!! $product->description !!}</p>
                    <div class="product-comment mt-5">
                        @comments(['model' => $product])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
