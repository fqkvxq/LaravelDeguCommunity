{{-- レイアウトファイル --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.title') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    @stack('js')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>
    <div id="app">
        {{-- Navbarここから --}}
        <nav class="navbar navbar-expand-md navbar-light text-black bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="appname">
                        {{ config('app.name', '') }}
                    </span>
                </a>
                <button onfocus="this.blur();" class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a class="nav-link" href="{{ route('degu')}}">
                                <span class="nav-text">
                                    <span class="list">
                                        {{ __('登録デグー一覧') }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('degu/register')}}">
                                <span class="nav-text">
                                    <span class="register">
                                        {{ __('デグーを登録する') }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li>
                        <a class="nav-link" href="{{route('qa')}}">
                                <span class="nav-text">
                                    <span class="">
                                        {{ __('デグーQ&A') }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <span class="nav-text">
                                    {{ __('ログイン') }}
                                </span>
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <span class="nav-text">
                                    {{ __('登録') }}
                                </span>
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="nav-text">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="caret"></span>
                                @if(Auth::user()->profile_image_url)
                                    <img class="rounded-circle profile-image img-fluid"
                                    src="{{Auth::user()->profile_image_url }}">
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>

                                <a class="dropdown-item" href="#">
                                    {{ __('ユーザー情報変更') }}
                                </a>

                                <a class="dropdown-item" href="#">
                                    {{ __('デグー情報変更') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Navbarここまで --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>