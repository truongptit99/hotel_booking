@extends('client.layouts.layout')

@section('title', 'Booking System')

@section('main')
    @include('client.layouts.header')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Booking System</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="active">Booking System</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Booking flow start -->
    <div class="booking-flow content-area-10">
        <div class="container">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist" id="process-booking-bar">
                            <li role="presentation" class="active">
                                <a href="#personal-info" data-toggle="tab" aria-controls="personal-info" role="tab" title="" data-original-title="Personal Info" aria-expanded="true" id="personal-info-tab">
                                    <span class="round-tab">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Personal Info</h3>
                            </li>

                            <li role="presentation">
                                <a href="#review" data-toggle="tab" aria-controls="review" role="tab" title="" data-original-title="Review" id="review-tab">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Review</h3>
                            </li>
                        </ul>
                    </div>

                    <div id="contact_form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="personal-info">
                                <form action="{{ route('submit.booking') }}" id="personal-info-form" method="post">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <input type="hidden" name="room_name" value="{{ $room->name }}">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-xs-12 col-md-push-4">
                                            <div class="contact-form sidebar-widget">
                                                <h3 class="booking-heading-2 black-color">Personal Info</h3>
                                                <div class="row mb-30">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group firstname">
                                                            <label>First Name</label>
                                                            <input type="text" name="first_name" value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->first_name : '' }}" class="input-text">
                                                            <span class="text-error error_first_name">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group lastname">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last_name" value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->last_name : '' }}" class="input-text">
                                                            <span class="text-error error_last_name">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group phone">
                                                            <label>Phone Number</label>
                                                            <input type="text" name="phone_number" value="" class="input-text">
                                                            <span class="text-error error_phone_number">{{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group email">
                                                            <label>Email</label>
                                                            <input type="email" name="email" value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->email : '' }}" class="input-text">
                                                            <span class="text-error error_email">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group address-line-1">
                                                            <label>Address</label>
                                                            <input type="text" name="address" value="" class="input-text">
                                                            <span class="text-error error_address">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group zip">
                                                            <label>Zip/Post Code</label>
                                                            <input type="text" name="zip_code" class="input-text">
                                                            <span class="text-error error_zip_code">{{ $errors->has('zip_code') ? $errors->first('zip_code') : '' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-4 col-md-4 col-xs-12 col-md-pull-8">
                                            <div class="booling-details-box">
                                                <h3 class="booking-heading-2">Booking Details</h3>
    
                                                <!--  Rooms detail slider start -->
                                                <div class="rooms-detail-slider simple-slider ">
                                                    <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-outer">
                                                            <!-- Wrapper for slides -->
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    <img src="{{ !empty($room->image) ? asset('storage/rooms/' . $room->image) : '' }}" class="thumb-preview" alt="room-image">
                                                                </div>
                                                            </div>
                                                            <!-- Controls -->
                                                            <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                                                <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                    <i class="fa fa-angle-left"></i>
                                                                </span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                                                <span class="slider-mover-right no-bg" aria-hidden="true">
                                                                    <i class="fa fa-angle-right"></i>
                                                                </span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Rooms detail slider end -->
    
                                                <h4>{{ !empty($room->name) ? $room->name : '' }}</h4>
    
                                                <ul>
                                                    @if (!empty(session('check_in')))
                                                        <input type="hidden" name="check_in" value="{{ session('check_in') }}">
                                                        <li>
                                                            <span>Check In:</span> {{ date('F d, Y', strtotime(session('check_in'))) }}
                                                        </li>
                                                    @endif
                                                    @if (!empty(session('check_out')))
                                                        <input type="hidden" name="check_out" value="{{ session('check_out') }}">
                                                        <li>
                                                            <span>Check Out:</span> {{ date('F d, Y', strtotime(session('check_out'))) }}
                                                        </li>
                                                    @endif
                                                    @if (!empty(session('adult')))
                                                        <input type="hidden" name="adults" value="{{ session('adult') }}">
                                                        <li>
                                                            <span>Adults:</span> {{ session('adult') }}
                                                        </li>
                                                    @endif
                                                    <input type="hidden" name="children" value="{{ session('children') }}">
                                                    @if (!empty(session('children')))
                                                        <li>
                                                            <span>Children:</span> {{ session('children') }}
                                                        </li>
                                                    @endif
                                                </ul>
    
                                                @if (!empty($room->price) && !empty(session('number_night')))
                                                    <input type="hidden" name="price" value="{{ $room->price }}">
                                                    <input type="hidden" name="total_price" value="{{ $room->price * session('number_night') }}">
                                                    <div class="price">
                                                        Total: {{ number_format($room->price * session('number_night')) . ' USD' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="clearfix"></div>
    
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn search-button btn-theme next-step">Save and continue</button></li>
                                    </ul>
                                </form>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="review">
                                <div class="booling-details-box booling-details-box-2 mrg-btm-30">
                                    <h3 class="booking-heading-2">Booking Details</h3>
                                    <div class="row mrg-btm-30">
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                            <!--  Rooms detail slider start -->
                                            <div class="rooms-detail-slider simple-slider ">
                                                <div id="carousel-custom-3" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-outer">
                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner">
                                                            <div class="item active">
                                                                <img src="{{ !empty($room->image) ? asset('storage/rooms/' . $room->image) : '' }}" class="thumb-preview" alt="room-img">
                                                            </div>
                                                        </div>
                                                        <!-- Controls -->
                                                        <a class="left carousel-control" href="#carousel-custom-3" role="button" data-slide="prev">
                                                            <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                <i class="fa fa-angle-left"></i>
                                                            </span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-custom-3" role="button" data-slide="next">
                                                            <span class="slider-mover-right no-bg" aria-hidden="true">
                                                                <i class="fa fa-angle-right"></i>
                                                            </span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rooms detail slider end -->
                                            <p class="hidden-lg hidden-md">{{ !empty($room->description) ? $room->description : '' }}</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <ul>
                                                @if (!empty(session('check_in')))
                                                    <li>
                                                        <span>Check In:</span> {{ date('F d, Y', strtotime(session('check_in'))) }}
                                                    </li>
                                                @endif
                                                @if (!empty(session('check_out')))
                                                    <li>
                                                        <span>Check Out:</span> {{ date('F d, Y', strtotime(session('check_out'))) }}
                                                    </li>
                                                @endif
                                                @if (!empty(session('adult')))
                                                    <li>
                                                        <span>Adults:</span> {{ session('adult') }}
                                                    </li>
                                                @endif
                                                @if (!empty(session('children')))
                                                    <li>
                                                        <span>Children:</span> {{ session('children') }}
                                                    </li>
                                                @endif
                                            </ul>

                                            <ul>
                                                <li>
                                                    <span>Contact name: </span><span class="contact-name"></span>
                                                </li>
                                                <li>
                                                    <span>Phone number: </span><span class="phone-number"></span>
                                                </li>
                                                <li>
                                                    <span>Email: </span><span class="email"></span>
                                                </li>
                                                <li>
                                                    <span>Address: </span><span class="address"></span>
                                                </li>
                                            </ul>

                                            @if (!empty($room->price) && !empty(session('number_night')))
                                                <div class="price">
                                                    Total: {{ number_format($room->price * session('number_night')) . ' USD' }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 hidden-sm hidden-xs">
                                            <p>{{ !empty($room->description) ? $room->description : '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn search-button btn-theme confirm-booking">confirm booking</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Booking flow end -->

    @include('client.layouts.footer')
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.nav-tabs > li a[title]').tooltip();
        });

        $('#personal-info-form').validate({
            rules: {
                first_name: {
                    required: true,
                    maxlength: 100,
                },
                last_name: {
                    required: true,
                    maxlength: 100,
                },
                phone_number: {
                    required: true,
                    maxlength: 15,
                    digits: true
                },
                email: {
                    required: true,
                    maxlength: 255,
                    pattern: /^([a-z0-9+_]+)(\.[a-z0-9+_-]+)*@[a-z0-9]([a-z0-9-]+\.)+[a-z]{2,6}$/
                },
                address: {
                    required: true,
                    maxlength: 255
                },
                zip_code: {
                    required: true,
                    maxlength: 10,
                    digits: true
                }
            },
            messages: {
                email: {
                    pattern: 'This field has an invalid format.'
                }
            }
        });

        $('body').on('show.bs.tab', '#review-tab', function (e) {
            e.preventDefault();
        });

        $('body').on('click', '.next-step', function (e) {
            let personalInfoForm = $('#personal-info-form');
            let activeTab = $('#process-booking-bar li.active');
            
            if (personalInfoForm.valid()) {
                let firstName = personalInfoForm.find('input[name="first_name"]').val();
                let lastName = personalInfoForm.find('input[name="last_name"]').val();
                let phoneNumber = personalInfoForm.find('input[name="phone_number"]').val();
                let email = personalInfoForm.find('input[name="email"]').val();
                let address = personalInfoForm.find('input[name="address"]').val();

                $('#review .contact-name').html(`${firstName} ${lastName}`);
                $('#review .phone-number').html(phoneNumber);
                $('#review .email').html(email);
                $('#review .address').html(address);

                activeTab.removeClass('active');
                activeTab.next().addClass('active');
                $('#personal-info').removeClass('active');
                $('#review').addClass('active');
            }
        });

        $('body').on('click', '.confirm-booking', function () {
            $(this).prop('disabled', true);
            $('#personal-info-form').submit();
        })
    </script>
@endsection
