<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('light-bootstrap/css/loginstyle.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link href="{{ asset('light-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <script src="{{asset('light-bootstrap/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="cont-head">
        <div class="header row">
            <img src="{{asset('light-bootstrap/img/dorsu-cloud-space.png')}}" id="logo-desc">
            <div class="row" id="logo">
                <img class="ml-3" src="{{asset('light-bootstrap/img/dorsu-logo-s.png')}}">
                <a class="text-light">DOrSU Cloud Space</a>
            </div>
            <div class="r-0 mr-3">
                @guest
                <input type="text" placeholder="Search" name="search" id="search" class="inp pr-10">
                <i class="fa fa-magnifying-glass m-search"></i>
                <i class="fa fa-magnifying-glass search"></i>
                @else
                <a id="navbarDropdown" class="nav-link text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name}}</a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
                @endguest
            </div>
        </div>

    @guest
        @yield('content')
    @else
        <div class="cont justify">
            @yield('content')
        </div>
        </div>
    @endif
    <script>
        $(function() {
            var b = true;
            $("#navbarDropdown").click(function() {
                if (b) {
                    $(".dropdown-menu").css("display", "block");
                    b = false;
                } else {
                    $(".dropdown-menu").css("display", "none");
                    b = true;
                }

            })
            $(window).click(function(event) {
                if (!event.target.matches("a")) {
                    b = true;
                    $(".dropdown-menu").css("display", "none");
                }
            })
        })
        </script>
</body>
</html>