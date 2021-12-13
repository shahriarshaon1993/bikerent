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
                    <i class="pe-7s-bicycle icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ isset($bike) ? 'Edit' : 'Create' }} Product</div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.bikes.index') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-arrow-circle-left"></i> Back to lists
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ isset($bike) ? route('app.bikes.update', $bike->id) : route('app.bikes.store') }}" enctype="multipart/form-data">
                @csrf
                @isset($bike)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Bike info</h5>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $bike->title ?? old('title') }}" placeholder="Enter page title" autofocus required>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-row my-2">
                                    <div class="col">
                                        <label for="price_per_day">Price per day</label>
                                        <input id="price_per_day" type="price_per_day" class="form-control @error('price_per_day') is-invalid @enderror" name="price_per_day" value="{{ $bike->price_per_day ?? old('price_per_day') }}" placeholder="Price per day" required>

                                        @error('price_per_day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="discount_price">Dicount price</label>
                                        <input id="discount_price" type="discount_price" class="form-control @error('discount_price') is-invalid @enderror" name="discount_price" value="{{ $bike->discount_price ?? old('discount_price') }}" placeholder="Discount price" required>

                                        @error('discount_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input id="model" type="model" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $bike->model ?? old('model') }}" placeholder="Bike model" required>

                                    @error('model')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ $bike->description ?? old('description') }}</textarea>

                                    @error('description')
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
                                    <label for="category_id">Select category</label>

                                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror js-example-basic-single" name="category_id">
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

                            </div>
                        </div>

                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Select brand</h5>

                                <div class="form-group">
                                    <label for="brand_id">Select brand</label>

                                    <select id="brand_id" class="form-control @error('brand_id') is-invalid @enderror js-example-basic-single" name="brand_id">
                                        <option value="">--Select brand--</option>

                                        @if (count($brands))
                                            @foreach ($brands as $key=>$brand)
                                                <option value="{{ $brand->id }}" @isset($bike) ? @if ($bike->brand_id === $brand->id) selected  @endif : ''  @endisset>
                                                    {{ $brand->name }}
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

                            </div>
                        </div>

                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Select image & status</h5>

                                <div class="form-group">
                                    <label for="bike_image">Image</label>

                                    <input type="file" id="bike_image" class="dropify form-control @error('bike_image') is-invalid @enderror" name="bike_image" data-default-file="{{ isset($bike) ? $bike->getFirstMediaUrl('bike_image') : ''}}" {{ !isset($page) ? 'required' : '' }}>

                                    @error('bike_image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="status" name="status" @isset($page) {{ $page->status == true ? 'checked' : '' }} @endisset>
                                        <label class="custom-control-label" for="status">Status</label>
                                    </div>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($bike)
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
    <script src="https://cdn.tiny.cloud/1/wttn6vroj5d5w0a8fxit6i9zxl72pdp8pd9t6y6z8qycho7g/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | preview | insertfile image media link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            image_advtab: true,
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            importcss_append: true,
            height: 400,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
        $(document).ready(function() {
            $('.dropify').dropify();
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
