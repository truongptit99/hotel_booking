@extends('client.layouts.layout')

@section('title', 'Login')

@section('main')
    <!-- Content area start -->
     <div class="contact-bg overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form content box start -->
                    <div class="form-content-box">
                        <!-- logo -->
                        <a href="{{ route('home.index') }}" class="clearfix alpha-logo">
                            <img src="{{ asset('client/img/logos/white-logo.png') }}" alt="white-logo">
                        </a>
                        <!-- details -->
                        <div class="details">
                            <h3>Sign into your account</h3>
                            <!-- Form start -->
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="text-title-field">Email <span class="text-error">*</span></div>
                                    <input type="email" name="email" value="{{ old('email') }}" class="input-text" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <div class="text-error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="text-title-field">Password <span class="text-error">*</span></div>
                                    <div class="position-relative">
                                        <input type="password" name="password" class="input-text input-password" placeholder="Password">
                                        <i class="fa fa-eye-slash reveal-password-icon"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="text-error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="checkbox" style="padding-left: 0">
                                    <div class="ez-checkbox pull-left">
                                        <div class="text-title-field">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="ez-hide" style="position: unset; margin: 0;">
                                            Remember me
                                        </div>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="link-not-important pull-right">Forgot Password</a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block" onclick="this.form.submit(); this.disabled = true;">login</button>
                                </div>
                            </form>
                            <!-- Form end -->
                        </div>
                        <!-- Footer -->
                        <div class="footer">
                            <span>
                                Don't have an account? <a href="{{ route('register') }}">Register here</a>
                            </span>
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content area end -->
@endsection

@section('js')
    <script src="{{ asset('assets/js/password_reveal.js') }}"></script>
@endsection
