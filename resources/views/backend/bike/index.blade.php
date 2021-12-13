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
                <div>Bike</div>
            </div>
            <div class="page-title-actions">

                @permission('app.bikes.create')
                    <a href="{{ route('app.bikes.create') }}" class="btn-shadow mr-3 btn btn-primary">
                        <i class="fas fa-plus"></i> Create bike
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
                            <th class="text-center">Title</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Discount</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Updated at</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($bikes as $key=> $bike)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $bike->title }}</td>
                                    <td class="text-center">{{ $bike->price_per_day }}</td>
                                    <td class="text-center">{{ $bike->discount_price }}</td>
                                    <td class="text-center">
                                        @if ($bike->status == true)
                                            <span class="badge badge-primary">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $bike->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @permission('app.bikes.index')
                                            @if ($bike->status == true)
                                                <form class="d-inline" method="POST" action="{{ route('app.bikes.deactive', $bike->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Deactive">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form class="d-inline" method="POST" action="{{ route('app.bikes.active', $bike->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-info" title="Active">

                                                        <i class="fas fa-toggle-off"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endpermission

                                        @permission('app.bikes.edit')
                                            <a href="{{ route('app.bikes.edit', $bike->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                        @endpermission

                                        @permission('app.bikes.destroy')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $bike->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>

                                            <form id="delete-form-{{ $bike->id }}" method="POST" action="{{ route('app.bikes.destroy', $bike->id) }}" class="d-none">
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
