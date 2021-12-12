@extends('layouts.backend.app')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Users</div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.users.edit', $user->id) }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('app.users.index') }}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fas fa-arrow-circle-left"></i> Back to lists
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <img src="{{ $user->getFirstMediaUrl('avatar') }}" class="img-fluid img-thumbnail" alt="User Avatar">
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="main-card mb-3 card">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Name:</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Role:</th>
                                <td>
                                    @if ($user->role)
                                        <span class="badge badge-info">{{ $user->role->name }}</span>
                                    @else
                                        <span class="badge badge-danger">No role found :(</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Status:</th>
                                <td>
                                    @if ($user->status == true)
                                        <span class="badge badge-info">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Last modified at:</th>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Joined at:</th>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>
@endpush
