<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('client/img/favicon.ico') }}">
    <link href="{{ asset('/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('/assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('/assets/libs/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <!-- <link href="{{ asset('/dist/css/status.css') }}" rel="stylesheet"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .table-responsive::-webkit-scrollbar {
            display: none;
        }

        input::placeholder, textarea::placeholder {
            color: #a1a1a1 !important;
        }
    </style>
    @yield('css')
</head>

<body>
    <div id="notification-message" class="d-none"
        data-message="{{ session()->has('message') ? session('message') : '' }}"
        data-type="{{ session()->has('alert-type') ? session('alert-type') : '' }}"></div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @section('navbar')
            @include('admin.layouts.navbar')
        @show

        @yield('main')
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- apps -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.init.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src=" {{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <!--This page plugins -->
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js') }}"></script> -->
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweet-alert.init.js') }}"></script>
    <script src="{{ asset('assets/js/showHideLoader.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalertCustom.js') }}"></script>

    <script>
        //Preloader
        $(".preloader").fadeOut();

        $(document).ready(function() {
            //CSRF setup for ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });

            //Error handling for expired authentication
            $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
                if (jqxhr.status === 419) {
                    location.reload();
                }
            });

            //Unblur btn on
            $(document).on('focus', '.btn', function() {
                $(this).blur();
            });

            //prevent double click save form
            $('form').submit(function() {
                enableLoader();
            });

            let message = $('#notification-message').data('message');
            let type = $('#notification-message').data('type');
            notiAlert(type, message);
        });
    </script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    @yield('js')
</body>

</html>
