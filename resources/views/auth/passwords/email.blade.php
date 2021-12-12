@extends('layouts.frontend.app')

@section('content')

    <div class="signin">
        <form class="form-signin card" method="POST" action="{{ route('password.email') }}">
            @csrf
            {{-- <img class="mb-4" src="" alt="" width="72" height="72"> --}}
            <h1 class="h3 mb-3 font-weight-normal">
                {{ setting('site_title', 'Laravel') }}
            </h1>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your reset email" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-lg btn-primary btn-block mb-3">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>

@endsection
