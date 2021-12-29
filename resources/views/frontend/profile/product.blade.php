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
                    <h2 class="card-title">
                        Your products list
                        <a href="{{ route('user.profile.bike.create') }}" class="btn btn-sm btn-success">Upload</a>
                    </h2>

                    @if ($bikes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tile</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Booked</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bikes as $kye=> $bike)
                                        <tr>
                                            <th scope="row">{{ $kye+1 }}</th>
                                            <td>
                                                <a href="{{ route('single.product', $bike->slug) }}">{{ $bike->title }}</a>
                                            </td>
                                            <td>
                                                @if($bike->user_status == true)
                                                    <span class="badge badge-primary">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Padding</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($bike->booked_status == true)
                                                    <form class="d-inline" method="POST" action="{{ route('user.profile.bikes.booked', $bike->slug) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Booked">
                                                            Booked
                                                        </button>
                                                    </form>
                                                @else
                                                    <form class="d-inline" method="POST" action="{{ route('user.profile.bikes.available', $bike->slug) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-info" title="Available">
                                                            Available
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('user.profile.bike.destroy', $bike->slug) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure you want to delete?')" type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $bikes->links() }}
                        </div>
                    @else
                        <div class="alert alert-primary" role="alert">
                            No product here
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
