@extends('layouts.backend.app')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    @isset($menuItem)
                        Edit menu item
                    @else
                        Add new menu item to (<code>{{ $menu->name }}</code>)
                    @endisset
                </div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.menus.builder', $menu->id) }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-arrow-circle-left"></i> Back to lists
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ isset($menuItem) ? route('app.menus.item.update', ['id'=>$menu->id, 'itemId' => $menuItem->id]) : route('app.menus.item.create', $menu->id) }}">
                @csrf
                @isset($menuItem)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Manage menu item</h5>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="custom-select @error('type') is-invalid @enderror" onchange="setItemType()">
                                        <option value="item" @isset($menuItem) {{ $menuItem->type === 'item' ? 'selected' : ''  }} @endisset>Menu item</option>
                                        <option value="divider" @isset($menuItem) {{ $menuItem->type === 'divider' ? 'selected' : ''  }} @endisset>Divider</option>
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div id="divider_fields">
                                    <div class="form-group">
                                        <label for="divider_title">Title of the divider</label>
                                        <input id="divider_title" type="divider_title" class="form-control @error('divider_title') is-invalid @enderror" name="divider_title" value="{{ $menuItem->divider_title ?? old('divider_title') }}" placeholder="Enter menu divider title">
    
                                        @error('divider_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="title_fields">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $menuItem->title ?? old('title') }}" placeholder="Enter menu title">
    
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="url">URL for the menu item</label>
                                        <input id="url" type="test" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $menuItem->url ?? old('url') }}" placeholder="Enter menu url">
    
                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="target">Open in</label>
                                        <select name="target" id="target" class="custom-select @error('target') is-invalid @enderror">
                                            <option value="_self" @isset($menuItem) {{ $menuItem->target === '_self' ? 'selected' : ''  }} @endisset>Same tab/window</option>
                                            <option value="_blank" @isset($menuItem) {{ $menuItem->target === '_blank' ? 'selected' : ''  }} @endisset>New tab/window</option>
                                        </select>

                                        @error('target')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="icon_class">
                                            Font icon class for menu item
                                            <a href="https://fontawesome.com/" target="_blank">
                                                (Use a fontawesome font class)
                                            </a>
                                        </label>
                                        <input id="icon_class" type="icon_class" class="form-control @error('icon_class') is-invalid @enderror" name="icon_class" value="{{ $menuItem->icon_class ?? old('icon_class') }}" placeholder="Enter item icon class">
    
                                        @error('icon_class')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($menuItem)
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
    <script>
        function setItemType()
        {
            if($('select[name="type"]').val() === 'divider') {
                $('#divider_fields').removeClass('d-none')
                $('#title_fields').addClass('d-none')
            }else {
                $('#divider_fields').addClass('d-none')
                $('#title_fields').removeClass('d-none')
            }
        }

        setItemType();
    </script>
@endpush