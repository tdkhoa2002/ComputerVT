<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/63574fddfe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <i class="fas fa-caret-right"></i> -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                    @if(auth()->user()->role->name == "admin")
                                    <div>
                                        <a class="dropdown-item" href="{{ route('user.index') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('user-form').submit();">
                                            User
                                        </a>
    
                                        <form id="user-form" action="{{ route('user.index') }}" method="get" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{ route('order.index') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('cart-index-form').submit();">
                                            Cart
                                        </a>
    
                                        <form id="cart-index-form" action="{{ route('order.index') }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{ route('product.index') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('move-product-form').submit();">
                                            Products
                                        </a>
    
                                        <form id="move-product-form" action="{{ route('product.index') }}" method="get" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{ route('product.create') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('move-category-form').submit();">
                                            Categories
                                        </a>
    
                                        <form id="move-category-form" action="{{ route('category.index') }}" method="get" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{ route('categories_homepage.index') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('categories-homepage-form').submit();">
                                            Categories Homepage
                                        </a>
    
                                        <form id="categories-homepage-form" action="{{ route('categories_homepage.index') }}" method="get" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    @elseif(auth()->user()->role->name == 'user')
                                    <div>
                                        <a class="dropdown-item" href="{{ route('user.show', ['user' => auth()->user()]) }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('profile-form').submit();">
                                            Profile
                                        </a>
    
                                        <form id="profile-form" action="{{ route('user.show', ['user' => auth()->user()]) }}" method="get" class="d-none">
                                            @csrf
                                        </form>
                                    </div>

                                    <div>
                                        <a class="dropdown-item" href="{{ route('cart.show', ['cart' => auth()->user()->id]) }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('cart-form').submit();">
                                            Cart
                                        </a>
    
                                        <form id="cart-form" action="{{ route('cart.show', ['cart' => auth()->user()->id]) }}" method="get" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    
                                    @endif
                                    <div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
