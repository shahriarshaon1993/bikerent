@extends('layouts.backend.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
    </style>
@endpush

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ isset($category) ? 'Edit' : 'Create' }} category</div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.categories.index') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-arrow-circle-left"></i> Back to lists
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ isset($category) ? route('app.categories.update', $category->id) : route('app.categories.store') }}">
                @csrf
                @isset($category)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Category info</h5>

                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name ?? old('name') }}" placeholder="Enter category name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Select category</h5>

                                <div class="form-group">
                                    <label for="parent_id">Select category</label>

                                    <select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror js-example-basic-single" name="parent_id">
                                        <option value="">--Select null category--</option>

                                        @if (count($parentCategories))
                                            @foreach ($parentCategories as $key=>$parentCategory)
                                                <option value="{{ $parentCategory->id }}">

                                                    {{ $parentCategory->name }}

                                                    @if (count($parentCategory->subcategory))
                                                        @foreach ($parentCategory->subcategory as $subcategory)
                                                            <option value="{{ $subcategory->id }}">-- {{ $subcategory->name }}</option>

                                                            @if (count($subcategory->subcategory))
                                                                @foreach ($subcategory->subcategory as $subminicategory)
                                                                    <option value="{{ $subminicategory->id }}">---- {{ $subminicategory->name }}</option>

                                                                @endforeach
                                                            @endif

                                                        @endforeach
                                                    @endif

                                                </option>
                                            @endforeach
                                        @endif

                                    </select>

                                    @error('parent_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($category)
                                        <i class="fas fa-arrow-circle-up"></i>
                                        Update
                                    @else
                                        <i class="fas fa-plus-circle"></i>
                                        Create
                                    @endisset
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
