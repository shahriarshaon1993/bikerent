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
                <div>Categories</div>
            </div>
            <div class="page-title-actions">

                @permission('admin.bikes.create')
                    <a href="{{ route('app.categories.create') }}" class="btn-shadow mr-3 btn btn-primary">
                        <i class="fas fa-plus"></i> Create categories
                    </a>
                @endpermission

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
                            <th class="text-center">Updated at</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($parentCategories as $key=> $category)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }}</td>
                                    <td class="text-center">
                                        {{ $category->name }}
                                        @if ($category->parent_id == null)
                                        <code class="badge badge-pill badge-warning ml-1">Parent</code>
                                        @endif

                                    </td>
                                    <td class="text-center">{{ $category->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @permission('admin.bikes.edit')
                                            <a href="{{ route('app.categories.edit', $category->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                        @endpermission

                                        @permission('admin.bikes.destroy')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $category->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>

                                            <form id="delete-form-{{ $category->id }}" method="POST" action="{{ route('app.categories.destroy', $category->id) }}" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endpermission
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
