@extends('client.layouts.layout')

@section('title', 'Register')

@section('main')
    <!-- Content bg area start -->
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
                            <h3>Create an account</h3>
                            <!-- Form start-->
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="text-title-field">Frist Name <span class="text-error">*</span></div>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="input-text" placeholder="First Name">
                                    @if ($errors->has('first_name'))
                                        <div class="text-error">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="text-title-field">Last Name <span class="text-error">*</span></div>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="input-text" placeholder="Last Name">
                                    @if ($errors->has('last_name'))
                                        <div class="text-error">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>
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
                                <div class="form-group">
                                    <div class="text-title-field">Password Confirmation <span class="text-error">*</span></div>
                                    <div class="position-relative">
                                        <input type="password" name="password_confirmation" class="input-text input-password" placeholder="Confirm Password">
                                        <i class="fa fa-eye-slash reveal-password-icon"></i>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="text-error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                                <div class="mb-0 mt-20">
                                    <button type="submit" class="btn-md btn-theme btn-block" onclick="this.form.submit(); this.disabled = true;">Signup</button>
                                </div>
                            </form>
                            <!-- Form end-->
                        </div>
                        <!-- Footer -->
                        <div class="footer">
                            <span>
                                Already a member? <a href="{{ route('login') }}">Login here</a>
                            </span>
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content bg area end -->
@endsection

@section('js')
    <script src="{{ asset('assets/js/password_reveal.js') }}"></script>
@endsection
