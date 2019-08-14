<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#404040">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Woobly</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"
            integrity="sha256-91c9XEM8yFH2Mn9fn8yQaNRvJsEruL7Hctr6JiIY7Uw=" crossorigin="anonymous"></script>

{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"--}}
{{--          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{asset("/vendor/bootstrap-4.3.1/dist/css/bootstrap.css")}}">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">--}}

{{--    <link rel="stylesheet"--}}
{{--          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">--}}
    <link rel="stylesheet" href="{{asset("/vendor/bootstrap-select-1.13.9/dist/css/bootstrap-select.css")}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/bootstrap-select.min.js"></script>

    {{--    <script src="https://kit.fontawesome.com/f4bb5974c6.js"></script>--}}
    <script src="{{asset('/fonts/fontawesome/js/all.js')}}"></script>
    <link rel="icon" href="https://res.cloudinary.com/senbonzakura/image/upload/v1561652707/fav-icon-admin_xgv1bf.png"
          type="image/png">
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('/css/dashboard.css')}}">
</head>
<body style="background-image: url({{asset('/images/photography.png')}})">
<div class="loading text-center">
    <i class="fas fa-dharmachakra fa-spin"></i>
</div>
<div id="app">
    <nav class="navbar navbar-bar navbar-expand-md shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('user')}}">
                Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse flex-lg-row" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <div class="dropdown-divider d-sm-none"></div>
                <ul class="navbar-nav col-md-3 col-lg-2">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{asset("/laravel-filemanager?type=Images&CKEditor=editor&CKEditorFuncNum=0&langCode=vi#")}}">
                                File Manager
                            </a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav d-none d-md-flex col-md-4 col-lg-6 col-xl-7  search-top">
                    @if(Auth::check())
                        <form action="{{asset('/admin')}}" name="search-top-form" method="get" class="search-top-form">
                            <span class="icon fa fa-search"
                                  onClick="document.forms['search-top-form'].submit();"></span>
                            <input type="text" id="s" placeholder="Search">
                            <label style="display: none" for="s"></label>
                        </form>
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                @if(Auth::check())
                    <div class="dropdown-divider d-sm-none"></div>
                @endif
                <ul class="navbar-nav col-md-5 col-lg-4 col-xl-3 text-md-right">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item ml-md-auto">
                            <a class="nav-link" href="{{ route('login') }}">
                                {{ __('Login') }} &nbsp;<span class="fas fa-sign-in-alt"></span>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item ml-md-auto">
                            <a class="nav-link message-relative" href="{{route('message.index')}}">
                                <span>Message</span>
                                <i class="fas fa-bell"></i>
                                @if(count($lsMessage) > 0)
                                    <span class="badge badge-pill badge-danger badge-message">
                                        {{count($lsMessage)}}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								@if(strlen(Auth::user()->name) > 15)
                                	{{substr(Auth::user()->name, 0, 15)}} ...
								@else
									{{Auth::user()->name}}
								@endif
								<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} &nbsp;<span class="fas fa-sign-out-alt"></span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                @if(Auth::check())
                    <div class="dropdown-divider d-sm-none"></div>
                    <ul class="navbar-nav d-md-none  search-top">
                        <form action="{{asset('/admin')}}" name="search-top-form" method="get" class="search-top-form">
                            <span class="icon fa fa-search"
                                  onClick="document.forms['search-top-form'].submit();"></span>
                            <input type="text" id="s" placeholder="Search">
                            <label style="display: none" for="s"></label>
                        </form>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
    <div class="container main-dashboard">
        @yield('content')
    </div>
    <div class="container-fluid footer py-5" style="background: #343a40">
        <div class="row text-center">
            <div class="mx-auto mb-3">
                <a class="btn btn-secondary" href="{{route('category.index')}}">Category</a>
                <a class="btn btn-secondary" href="{{route('tag.index')}}">Tag</a>
                <a class="btn btn-secondary" href="{{route('post.index')}}">Post</a>
                <a class="btn btn-secondary" href="{{asset('/admin/comment')}}">Comment</a>
                <a class="btn btn-secondary" href="{{asset('/admin/dlc')}}">DLC</a>
            </div>
        </div>
        <div class="row text-center">
            <a class="mx-auto" href="{{asset('/')}}"><h1>Woobly</h1></a>
        </div>
        <div class="row text-center">
            <p class="small mx-auto">
                Copyright &copy; Phạm Anh Dũng @Senbonzakura97 anhdunngpham090@gmail.com
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @yield('modal')
        </div>
    </div>
</div>


<script src="{{asset('/js/dashboard.js')}}"></script>
</body>
</html>
