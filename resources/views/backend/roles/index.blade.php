@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-check icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Roles</div>
            </div>
            <div class="page-title-actions">
                @if (Auth::user()->hasPermission('app.roles.create'))
                    <a href="{{ route('app.roles.create') }}" class="btn-shadow mr-3 btn btn-primary">
                        <i class="fas fa-plus"></i> Create role
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="table-responsive">
                    <table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Permissions</th>
                            <th class="text-center">Updated at</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key=> $role)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $role->name }}</td>
                                    <td class="text-center">
                                        @if ($role->permissions->count() > 0)
                                            <span class="badge badge-info">
                                                {{ $role->permissions->count() }}
                                            </span>
                                        @else
                                            <span class="badge badge-warning">
                                                No permission found
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @if (Auth::user()->hasPermission('app.roles.edit'))
                                            <a href="{{ route('app.roles.edit', $role->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                        @endif
                                        
                                        @if ($role->deletable == true && Auth::user()->hasPermission('app.roles.destroy'))
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $role->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>

                                            <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('app.roles.destroy', $role->id) }}" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
