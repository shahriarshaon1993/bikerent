@extends('layouts.backend.app')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Menus builder ({{ $menu->name }})</div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.menus.index') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-arrow-circle-left"></i> Back to lists
                </a>

                <a href="{{ route('app.menus.item.create', $menu->id) }}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fas fa-plus-circle"></i> Create menu item
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">How to use:</h5>
                    <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
                </div>
            </div>

            <div class="main-card mb-3 card">
                <div class="card-body menu-builder">
                    <h5 class="card-title">Drag and drop the menu items belows to re-arrange them.</h5>
                    <div class="dd">
                        <ol class="dd-list">
                            @forelse ($menu->menuItems as $item)
                                <li class="dd-item" data-id="{{ $item->id }}">

                                    <div class="pull-right item_actions">
                                        <a href="{{ route('app.menus.item.edit', ['id'=>$menu->id, 'itemId' => $item->id]) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>
    
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $item->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                            <span>Delete</span>
                                        </button>
    
                                        <form id="delete-form-{{ $item->id }}" method="POST" action="{{ route('app.menus.item.destroy', ['id'=>$menu->id, 'itemId' => $item->id]) }}" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>

                                    <div class="dd-handle">
                                        @if ($item->type === 'divider')
                                            <strong>Divider: {{ $item->divider_title }}</strong>
                                        @else
                                            <span>{{ $item->title }}</span>
                                            <small class="url">{{ $item->url }}</small>
                                        @endif
                                    </div>

                                    @if (!$item->childs->isEmpty())
                                        <ol class="dd-list">
                                            @foreach ($item->childs as $childItem)
                                                <li class="dd-item" data-id="{{ $childItem->id }}">
                
                                                    <div class="pull-right item_actions">
                                                        <a href="{{ route('app.menus.item.edit', ['id'=>$menu->id, 'itemId' => $childItem->id]) }}" class="btn btn-info btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                            <span>Edit</span>
                                                        </a>
                    
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $childItem->id }})">
                                                            <i class="fas fa-trash-alt"></i>
                                                            <span>Delete</span>
                                                        </button>
                    
                                                        <form id="delete-form-{{ $childItem->id }}" method="POST" action="{{ route('app.menus.item.destroy', ['id'=>$menu->id, 'itemId' => $childItem->id]) }}" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                
                                                    <div class="dd-handle">
                                                        @if ($childItem->type === 'divider')
                                                            <strong>Divider: {{ $childItem->divider_title }}</strong>
                                                        @else
                                                            <span>{{ $childItem->title }}</span>
                                                            <small class="url">{{ $childItem->url }}</small>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif

                                </li>
                            @empty
                                <div class="text-center">
                                    <strong>No menu item found.</strong>
                                </div>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $('.dd').nestable({maxDepth: 2});
        $('.dd').on('change', function(e) {
            $.post('{{ route('app.menus.item.order', $menu->id) }}', {
                order:JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function(data) {
                iziToast.success({
                    title: 'Success',
                    message: 'Successfully update menu order',
                });
            });
        });
    </script>
@endpush