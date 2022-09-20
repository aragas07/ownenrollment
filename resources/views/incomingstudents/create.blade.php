<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('light-bootstrap/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('light-bootstrap/img/favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>{{ __('Register') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="{{ asset('light-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/enroll.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
        <script src="{{ asset('light-bootstrap/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    </head>

    <body>
        <div class="wrapper wrapper-full-page">
            @yield('content')
            <!-- <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="https://dorsu.edu.ph/" class="nav-link" target="_blank">{{ __('DOrSU Main') }}</a>
                            </li>
                            <li>
                                <a href="https://dorsu.edu.ph/bec/" class="nav-link" target="_blank">{{ __('Banay-banay Ext.') }}</a>
                            </li>
                            <li>
                                <a href="https://dorsu.edu.ph/cec/" class="nav-link" target="_blank">{{ __('Cateel Ext.') }}</a>
                            </li>
                            <li>
                                <a href="https://dorsu.edu.ph/siec/" class="nav-link" target="_blank">{{ __('San Isidro Ext.') }}</a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="https://dorsu.edu.ph/">{{ __('DoRSU Creations') }}</a>{{ __(', made with love for a better learning.') }}
                        </p>
                    </nav>
                </div>
            </footer> -->
        </div>
    </body>
        <!--   Core JS Files   -->
</html>