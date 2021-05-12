<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.edit', auth()->user()->id) }}">
                                    Profile
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
            </div>
        </div>
    </nav>

    <main class="py-4">
        @auth
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            @if (auth()->user()->isAdmin())
                                <li class="list-group-item">
                                    <a href="{{route('users.index')}}">User</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('settings.active')}}">Setting</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{route('posts.index')}}">Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories.index')}}">Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags.index')}}">Tag</a>
                            </li>
                                <li class="list-group-item">
                                <a href="{{route('users.edit', auth()->id())}}">My Profile</a>
                            </li>
                        </ul>
                        <ul class="list-group mt-5">
                            <li class="list-group-item mt-5">
                                <a href="{{route('posts.trashed')}}">Trashed post</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
{{--                        @if(session('success'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                {{session('success')}}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                            @if(session('message'))--}}
{{--                                <div class="alert alert-info">--}}
{{--                                    {{session('message')}}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if(session('error'))--}}
{{--                                <div class="alert alert-danger">--}}
{{--                                    {{session('error')}}--}}
{{--                                </div>--}}
{{--                            @endif--}}
                        @yield('content')
                    </div>
                </div>
            </div>
        @else
            @yield('content')
        @endauth
    </main>
</div>
<!-- Scripts -->
<script src="{!! mix('js/app.js') !!}"></script>
@yield('script')
<script>
    @if(session('success'))
    toastr.success('{{session('success')}}')
    @endif
    @if(session('error'))
    toastr.error('{{session('error')}}')
    @endif
    @if(session('message'))
    toastr.warning('{{session('message')}}')
    @endif
</script>
</body>
</html>
