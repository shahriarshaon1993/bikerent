@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Menus</div>
            </div>
            <div class="page-title-actions">
                @if (Auth::user()->hasPermission('app.menus.create'))
                    <a href="{{ route('app.menus.create') }}" class="btn-shadow mr-3 btn btn-primary">
                        <i class="fas fa-plus"></i> Create menu
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
                            <th>Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $key=> $menu)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }}</td>
                                    <td>
                                        <code>{{ $menu->name }}</code>
                                    </td>
                                    <td>
                                        {{ $menu->description }}
                                    </td>
                                    <td class="text-center">

                                        <a href="{{ route('app.menus.builder', $menu->id) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-list-ul"></i>
                                            <span>Builder</span>
                                        </a>

                                        <a href="{{ route('app.menus.edit', $menu->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>

                                        @if ($menu->deletable == true)
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $menu->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>

                                            <form id="delete-form-{{ $menu->id }}" method="POST" action="{{ route('app.menus.destroy', $menu->id) }}" class="d-none">
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
