{{-- レイアウトファイル --}}
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.title') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/croppie.js') }}" defer></script>
    @stack('js')

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90454441-26"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-90454441-26');
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
    @stack('css')

    <!-- ※基本共通設定 -->
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <title>ページのタイトル</title>
    <meta property="og:title" content="@yield('title') | {{ config('app.title') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://degiita.com/" />
    <meta property="og:image" content="@yield('ogp','https://degiita.s3-ap-northeast-1.amazonaws.com/degiita/ogp_default.jpeg')" />
    <meta property="og:site_name" content="@yield('title') | {{ config('app.title') }}" />
    <meta property="og:description" content="デグーのSNS。お互いのデグーを紹介したり、デグー飼育ノウハウを共有しよう。" />
    
    <!-- ※Twitter共通設定 -->
    <meta name="twitter:card" content="summary_large_image" />
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
                {{-- 通知ボタン --}}
                <span class="text-right ml-auto notify-button"><i class="fas fa-bell"></i></span>
                {{-- /通知ボタン --}}
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
                        {{-- <li>
                            <a class="nav-link" href="{{ route('degu')}}">
                                <span class="nav-text">
                                    <span class="list">
                                        {{ __('登録デグー一覧') }}
                                    </span>
                                </span>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a class="nav-link" href="{{ route('degu/register')}}">
                                <span class="nav-text">
                                    <span class="register">
                                        {{ __('デグーを登録する') }}
                                    </span>
                                </span>
                            </a>
                        </li> --}}
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

        <main>
            @yield('content')
        </main>

        {{-- Footerここから --}}
        <footer class="container-fluid footer">
            <div class="container">
                <div class="row">
                    {{-- フッター左部分 --}}
                    <div class="col-md-4 col-sm-12 text-white">
                        <div class="row py-2">
                            <div class="col">
                                <span class="appname h2 footer-title">
                                        {{ config('app.name', '') }}
                                </span>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col">
                                <span>
                                        デグーのSNS
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- フッター右部分 --}}
                    <div class="col-md-4 col-sm-12 text-white justify-content-right">
                        <div class="row">
                            <div class="col">
                                <span class="d-inline h4">Services</span>
                                <ul class="services pl-0 my-3">
                                    <li>登録</li>
                                    <li>ログイン</li>
                                    <li>デグーを登録する</li>
                                    <li>デグーQ&A</li>
                                    <li>プライバシーポリシー</li>
                                </ul>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- Footerここまで --}}
    </div>
</body>

</html>