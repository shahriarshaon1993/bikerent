@extends('layouts.backend.app')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Socialite settings</div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.dashboard') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-arrow-circle-left"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            @include('backend.settings.sidebar')
        </div>
        <div class="col-md-9">

            <form method="POST" action="{{ route('app.settings.socialite.update') }}">
                @csrf
                @method('PUT')
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="google_client_id">Google client id</label>
                                    <input id="google_client_id" type="text" class="form-control @error('google_client_id') is-invalid @enderror" name="google_client_id" value="{{ setting('google_client_id') ?? old('google_client_id') }}" placeholder="Google client id">
        
                                    @error('google_client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="google_client_secret">Google client secret</label>
                                    <input id="google_client_secret" type="text" class="form-control @error('google_client_secret') is-invalid @enderror" name="google_client_secret" value="{{ setting('google_client_secret') ?? old('google_client_secret') }}" placeholder="Google client secret">
        
                                    @error('google_client_secret')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="github_client_id">Github client id</label>
                                    <input id="github_client_id" type="text" class="form-control @error('github_client_id') is-invalid @enderror" name="github_client_id" value="{{ setting('github_client_id') ?? old('github_client_id') }}" placeholder="Github client id">
        
                                    @error('github_client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="github_client_secret">Github client secret</label>
                                    <input id="github_client_secret" type="text" class="form-control @error('github_client_secret') is-invalid @enderror" name="github_client_secret" value="{{ setting('github_client_secret') ?? old('github_client_secret') }}" placeholder="Github client secret">
        
                                    @error('github_client_secret')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection