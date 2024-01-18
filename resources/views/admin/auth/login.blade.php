@extends('admin.layouts.layout')

@section('title', 'Login')

@section('css')
    <style>
        .auth-wrapper {
            background: url('/assets/images/big/auth-bg.jpg') no-repeat center center;
        }

        #password {
            padding-right: 2rem;
        }

        .reveal-password-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 2%;
            z-index: 3;
        }
    </style>
@endsection

@section('navbar')
@endsection

@section('main')
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <h5 class="font-medium mt-2 m-b-20">Admin Login</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" id="loginform" action="{{ route('admin.post.login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ti-email"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg" placeholder="Email" aria-label="Email"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger error-message">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="ti-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg" placeholder="Password"
                                            aria-label="Password" aria-describedby="basic-addon1">
                                        <i class="fas fa-eye-slash reveal-password-icon"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger error-message">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <a href="#" id="to-recover"
                                                class="float-right">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-danger" type="submit" onclick="disableOnClick(this)">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/password_reveal.js') }}"></script>
    <script>
        function disableOnClick(that) {
            that.form.submit();
            that.disabled=true;
        }
    </script>
@endsection
