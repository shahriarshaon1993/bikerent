@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Slider</div>
            </div>
            <div class="page-title-actions">

                @permission('app.sliders.create')
                    <a href="{{ route('app.sliders.create') }}" class="btn-shadow mr-3 btn btn-primary">
                        <i class="fas fa-plus"></i> Create slider
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
                            <th class="text-center">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Updated at</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $key=> $slider)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $slider->title }}</td>
                                    <td class="text-center">
                                        <img src="{{ $slider->getFirstMediaUrl('slider_image') }}" alt="Slider Image" width="80px">
                                    </td>
                                    <td class="text-center">{{ $slider->status }}</td>
                                    <td class="text-center">{{ $slider->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @permission('app.sliders.edit')
                                            <a href="{{ route('app.sliders.edit', $slider->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                        @endpermission

                                        @permission('app.sliders.destroy')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $slider->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                                <span>Delete</span>
                                            </button>

                                            <form id="delete-form-{{ $slider->id }}" method="POST" action="{{ route('app.sliders.destroy', $slider->id) }}" class="d-none">
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
