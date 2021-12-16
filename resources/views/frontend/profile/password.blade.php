@extends('layouts.frontend.app')

@section('content')

    <section class="userProfile mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="{{ Auth::user()->getFirstMediaUrl('avatar') }}" alt="Profile photo">
                    @include('frontend.profile.sidebar')
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Update password</h5>
                    <form action="{{ route('user.profile.password') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="current_password">Current password</label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Current password" autofocus>

                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">New password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm password</label>
                            <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm password">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-circle-up"></i>
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
