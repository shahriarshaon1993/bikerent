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
                        Your Order list
                    </h2>

                    @if ($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Ammount</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key=> $order)
                                        <tr>
                                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $order->amount }}</td>
                                            <td class="text-center">{{ $order->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                @if ($order->status_op == true)
                                                    <span class="badge badge-primary">Delevered</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-primary" role="alert">
                            No order here
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
