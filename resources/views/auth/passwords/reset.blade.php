@extends('client.layouts.layout')

@section('title', 'Reset password')

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
                            <h3>Reset password</h3>
                            <!-- Form start -->
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <div class="text-title-field">Email <span class="text-error">*</span></div>
                                    <input type="text" name="email" value="{{ $email ?? old('email') }}" class="input-text" placeholder="Email">
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
                                        <input type="password" name="password_confirmation" class="input-text input-password" placeholder="Password">
                                        <i class="fa fa-eye-slash reveal-password-icon"></i>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block" onclick="this.form.submit(); this.disabled = true;">Reset password</button>
                                </div>
                            </form>
                            <!-- Form end -->
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
    <!-- Content area end -->
@endsection

@section('js')
    <script src="{{ asset('assets/js/password_reveal.js') }}"></script>
@endsection
