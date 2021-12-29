@extends('layouts.frontend.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="signin">
                    <form class="form-signin card" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="vendor" value="user">
                        <h1 class="h3 mb-3 font-weight-normal">
                            {{ setting('site_title', 'Laravel') }}
                        </h1>
                        <p>Register as a customer</p>
                        <div class="mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block mt-3">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="signin">
                    <form class="form-signin card" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="vendor" value="vendor">
                        <h1 class="h3 mb-3 font-weight-normal">
                            {{ setting('site_title', 'Laravel') }}
                        </h1>
                        <p>Register as a vendor</p>
                        <div class="mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block mt-3">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
