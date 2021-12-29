@extends('layouts.frontend.app')

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page->title }}</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $page->getFirstMediaUrl('image') }}" alt="{{ $page->title }}" class="img-thumbnail">
            </div>

            <div class="col-md-6">
                <p>{!! $page->body !!}</p>
            </div>
        </div>
    </div>

@endsection

