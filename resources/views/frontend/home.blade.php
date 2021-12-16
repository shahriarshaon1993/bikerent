@extends('layouts.frontend.app')

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($sliders as $key => $slider)
                <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="first-slide" src="{{ $slider->getFirstMediaUrl('slider_image') }}" alt="First slide" style="object-fit:cover;">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->excerpt }}</p>
                            @guest
                                <p><a class="btn btn-lg btn-primary" href="{{ $slider->link }}" role="button">Sign up today</a></p>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
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
                                    @if ($product->booked_status == true)
                                        <small class="badge badge-primary">Available</small>
                                    @else
                                    <small class="badge badge-danger">Booked</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
