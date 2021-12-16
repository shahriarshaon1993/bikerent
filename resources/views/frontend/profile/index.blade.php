@extends('layouts.frontend.app')

@section('content')

    <section class="userProfile mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="{{ Auth::user()->getFirstMediaUrl('avatar') }}" alt="Profile photo">
                    @include('frontend.profile.sidebar')
                </div>
                <div class="col-md-8">
                    <h2 class="card-title">{{ Auth::user()->name }}</h2>
                    <p>Email: {{ Auth::user()->email }} </p>
                    <p>Address: {{ Auth::user()->address }}</p>
                    <p>Phone: {{ Auth::user()->phone }}</p>
                    <p>Occupation: {{ Auth::user()->occupation }}</p>
                    <p>Date of birth: {{ Auth::user()->dateOfBirth }}</p>
                    <p>Gender: {{ Auth::user()->gender }}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
