<!doctype html>
<html lang="ja">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <style>
        .app{
            background-color: #ddd;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '飲食店情報') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
            <div class="container">
               
                <div class='row justify-content-around mt-3'>
                   <a class="navbar-brand" href="{{ url('/') }}">
                       <b> 飲食店（ロゴ）</b>
                    </a>
        </div> 

        <div class="my-navbar-contorol">
            @if(Auth::check())
            <span class="my-navbar-item">{{ Auth::user()->name }}</span>
            /
            <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <script>
                document.getElementById('logout').addEventListener('click',function(event){
                event.preventDefault();
                document.getElementById('logout-form').submit();
                });
            </script>
        @else
            <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
            /
            <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
        @endif

            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Scripts -->
    
    <script src="{{ asset('js/_ajaxbookmark.js') }}" defer></script>
</body>
</html>