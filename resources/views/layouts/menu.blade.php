<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/63574fddfe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <i class="fas fa-caret-right"></i> -->
</head>
<body>
    <div id="menu">
        <div class="container">
            <div>
                <h1>VTComputer</h1>
            </div>
            <div>
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
                            <div class="dropdown">
                                <a href="#"> {{ Auth::user()->name }}</a>
                                <div id="drop-down-items">
                                    @if( auth()->user()->role->name == "admin" )
                                    <a class="drop-down-item" href="{{ route('user.index') }}">User</a>
                                    <a class="drop-down-item" href="{{ route('order.index') }}">Order</a>
                                    <a class="drop-down-item" href="{{ route('product.index') }}">Product</a>
                                    <a class="drop-down-item" href="{{ route('category.index') }}">Category</a>
                                    <a class="drop-down-item" href="{{ route('categories_homepage.index') }}">Category Homepage</a>
                                    @else
                                    <a class="drop-down-item" href="{{ route('user.show', ['user' => auth()->user()->id]) }}">Profile</a>
                                    <a class="drop-down-item" href="{{ route('cart.show', ['cart' => auth()->user()->id]) }}">Cart</a>
                                    @endif
                                    <a href="{{ route('logout') }}">Logout</a>
                                </div>
                            </div>
                            
                            @endguest
                        </ul>
            </div>
        </div>
    </div>
    <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>