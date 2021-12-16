<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <a class="navbar-brand" href="/">{{ setting('site_title', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">

            @php
                $categories = menuHelper();
            @endphp

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @if (count($categories))
                    @foreach ($categories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('search.categories', $category->slug) }}" data-toggle="dropdown">{{ $category->name }}</a>
                            @if (count($category->subcategory))
                                <ul class="dropdown-menu">
                                    @foreach ($category->subcategory as $subCategory)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('search.categories', $subCategory->slug) }}">{{ $subCategory->name }}</a>
                                            @if (count($subCategory->subcategory))
                                                <ul class="submenu dropdown-menu">
                                                    @foreach ($subCategory->subcategory as $child)
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('search.categories', $child->slug) }}">{{ $child->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile.bike') }}">Manage bikes</a>
                    </li>
                @endauth

            </ul>

            <form class="form-inline ml-5" action="{{ route('search') }}" method="POST">
                @csrf
                <input class="form-control mr-sm-2" name="title" type="search" placeholder="Search" aria-label="Search">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show.cart') }}">{{ __('Cart') }}</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @permission('app.dashboard')
                                <a class="dropdown-item" href="{{ route('app.dashboard') }}">
                                    {{ __('Admin Dashboard') }}
                                </a>
                            @endpermission

                            <a class="dropdown-item" href="{{ route('user.profile') }}">
                                {{ __('Profile') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div> <!-- navbar-collapse.// -->
    </nav>
</header>
