<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-items/hotel-alpha/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 11:21:38 GMT -->
<head>
    <!-- End Google Tag Manager -->
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/bootstrap-submenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('client/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('client/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('client/css/skins/blue-light-2.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('client/img/favicon.ico') }}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/ie10-viewport-bug-workaround.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="{{ asset('client/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="js/html5shiv.min.js"></script>
    <script  src="js/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>
<body>
    <div class="page_loader"></div>

    <div id="notification-message" class="d-none"
        data-message="{{ session()->has('message') ? session('message') : '' }}"
        data-type="{{ session()->has('alert-type') ? session('alert-type') : '' }}"></div>

    @yield('main')

    <script src="{{ asset('client/js/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <script src="{{ asset('client/js/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('client/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('client/js/wow.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('client/js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('client/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.filterizr.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{ asset('assets/js/sweetalertCustom.js') }}"></script>
    <script src="{{ asset('client/js/app.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script  src="{{ asset('client/js/ie10-viewport-bug-workaround.js') }}"></script>

    <script>
        let message = $('#notification-message').data('message');
        let type = $('#notification-message').data('type');
        notiAlert(type, message);
    </script>
    <!-- Custom javascript -->
    @yield('js')
</body>

<!-- Mirrored from storage.googleapis.com/themevessel-items/hotel-alpha/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 11:21:38 GMT -->
</html>
