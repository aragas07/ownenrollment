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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/enroll.css') }}" rel="stylesheet">
    <script src="{{asset('light-bootstrap/js/core/jquery.3.2.1.min.js')}}"></script>
    
</head>
<body>
    <div class="wrapper">
        <div class="col-lg-10" id="forms">
            <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step " data-title="Give consent"></div>
                <div class="progress-step" data-title="Identify yourself"></div>
                <div class="progress-step" data-title="Fill up Forms"></div>
                <div class="progress-step" data-title="Get ticket number Download/Print/Sign"></div>
                <div class="progress-step" data-title="Upload Documents"></div>
                <div class="progress-step" data-title="Confirm"></div>
            </div>
        </div>
        @yield('content')
    </div>

    <script src="{{asset('js/query.js')}}"></script>
</body>
</html>
