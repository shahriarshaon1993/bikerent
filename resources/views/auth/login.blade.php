@extends('layouts.frontend.app')

@section('content')

    <div class="signin">
        <form class="form-signin card" method="POST" action="{{ route('login') }}">
            @csrf
            {{-- <img class="mb-4" src="" alt="" width="72" height="72"> --}}
            <h1 class="h3 mb-3 font-weight-normal">
                {{ setting('site_title', 'Laravel') }}
            </h1>
            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div>
                <button type="submit" class="btn btn-lg btn-primary btn-block mb-3">
                    {{ __('Login') }}
                </button>

                <a href="{{ route('login.provider', 'github') }}" class="btn btn-outline-secondary">
                    Github
                </a>
                <a href="{{ route('login.provider', 'google') }}" class="btn btn-outline-danger">
                    Google
                </a>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>

@endsection
