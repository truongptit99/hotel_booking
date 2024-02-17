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
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="" data-original-title="Step 1" aria-expanded="true">
                                    <span class="round-tab">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Personal Info</h3>
                            </li>
                            <li role="presentation">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="" data-original-title="Step 2">
                                    <span class="round-tab">
                                        <i class="fa fa-cc"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Payment Info</h3>
                            </li>
                            <li role="presentation">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="" data-original-title="Complete">
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
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <form action="#" id="personal-info-form">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-xs-12 col-md-push-4">
                                            <div class="contact-form sidebar-widget">
                                                <h3 class="booking-heading-2 black-color">Personal Info</h3>
                                                <div class="row mb-30">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group firstname">
                                                            <label>First Name</label>
                                                            <input type="text" name="first_name" value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->first_name : '' }}" class="input-text">
                                                            <span class="text-error error_first_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group lastname">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last_name" value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->last_name : '' }}" class="input-text">
                                                            <span class="text-error error_last_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group phone">
                                                            <label>Phone Number</label>
                                                            <input type="text" name="phone_number" value="" class="input-text">
                                                            <span class="text-error error_phone_number"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group email">
                                                            <label>Email</label>
                                                            <input type="email" name="email" value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->email : '' }}" class="input-text">
                                                            <span class="text-error error_email"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group address-line-1">
                                                            <label>Address</label>
                                                            <input type="text" name="address" value="" class="input-text">
                                                            <span class="text-error error_address"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group zip">
                                                            <label>Zip/Post Code</label>
                                                            <input type="text" name="zip" class="input-text">
                                                            <span class="text-error error_zip"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="checkbox">
                                                    <div class="ez-checkbox pull-left">
                                                        <label>
                                                            <input type="checkbox" class="ez-hide">
                                                            By Sign up you are agree with our <a href="#">terms and condition</a>
                                                        </label>
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
    
                                                @if (!empty($room->price))
                                                    <div class="price">
                                                        Total: {{ number_format($room->price) . ' VND' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="clearfix"></div>
    
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-grey prev-step">Previous</button></li>
                                        <li><button type="submit" class="btn search-button btn-theme next-step">Save and continue</button></li>
                                    </ul>
                                </form>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="step2">
                                <form action="#" id="payment-info-form">
                                    <div class="row mb-30">
                                        <div class="col-lg-8 col-md-8 col-xs-12">
                                            <div class="contact-form sidebar-widget">
                                                <h3 class="booking-heading-2">Card Info</h3>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group phone">
                                                            <label>Card Number</label>
                                                            <input type="text" name="card_number" class="input-text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group email">
                                                            <label>CVV</label>
                                                            <input type="text" name="cvv" class="input-text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Expire</label>
                                                            <select class="selectpicker search-fields" name="month">
                                                                <option>Month</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Year</label>
                                                            <select class="selectpicker search-fields" name="year">
                                                                <option>2024</option>
                                                                <option>2025</option>
                                                                <option>2026</option>
                                                                <option>2027</option>
                                                                <option>2028</option>
                                                                <option>2029</option>
                                                                <option>2030</option>
                                                                <option>2031</option>
                                                                <option>2032</option>
                                                                <option>2033</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                            <div class="booling-details-box">
                                                <h3 class="booking-heading-2">Booking Details</h3>
    
                                                <!--  Rooms detail slider start -->
                                                <div class="rooms-detail-slider simple-slider ">
                                                    <div id="carousel-custom-2" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-outer">
                                                            <!-- Wrapper for slides -->
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    <img src="{{ !empty($room->image) ? asset('storage/rooms/' . $room->image) : '' }}" class="thumb-preview" alt="room-img">
                                                                </div>
                                                            </div>
                                                            <!-- Controls -->
                                                            <a class="left carousel-control" href="#carousel-custom-2" role="button" data-slide="prev">
                                                                <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                    <i class="fa fa-angle-left"></i>
                                                                </span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="right carousel-control" href="#carousel-custom-2" role="button" data-slide="next">
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
    
                                                @if (!empty($room->price))
                                                    <div class="price">
                                                        Total: {{ number_format($room->price) . ' VND' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-grey prev-step">Previous</button></li>
                                        <li><button type="submit" class="btn search-button btn-theme next-step">Save and continue</button></li>
                                    </ul>
                                </form>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="complete">
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
                                            <h4>Your Payment ID: #302112295143</h4>

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

                                            @if (!empty($room->price))
                                                <div class="price">
                                                    Total: {{ number_format($room->price) . ' VND' }}
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
                                    <li><button type="button" class="btn search-button btn-theme next-step">confirm booking</button></li>
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
            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {
                e.preventDefault();
                let currentForm = $(this).parents('form');
                let active = $('.wizard .nav-tabs li.active');
                active.next().removeClass('disabled');
                nextTab(active, currentForm);
            });

            $(".prev-step").click(function (e) {
                let active = $('.wizard .nav-tabs li.active');
                prevTab(active);
            });
        });

        function nextTab(elem, form) {
            if (form.valid()) {
                if (form.attr('id') === 'personal-info-form') {
                    let firstName = $('#personal-info-form input[name="first_name"]').val();
                    let lastName = $('#personal-info-form input[name="last_name"]').val();
                    let phoneNumber = $('#personal-info-form input[name="phone_number"]').val();
                    let email = $('#personal-info-form input[name="email"]').val();
                    let address = $('#personal-info-form input[name="address"]').val();

                    $('#complete .contact-name').html(`${firstName} ${lastName}`);
                    $('#complete .phone-number').html(phoneNumber);
                    $('#complete .email').html(email);
                    $('#complete .address').html(address);
                }
                $(elem).next().find('a[data-toggle="tab"]').click();
            }
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
    </script>
    <script>
        $('#personal-info-form').validate({
            submitHandler: function (form) {
                return false;
            },
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
                }
            },
            messages: {
                email: {
                    pattern: 'This field has an invalid format.'
                }
            }
        });

        $('#payment-info-form').validate({
            submitHandler: function (form) {
                return false;
            },
            rules: {
                card_number: {
                    required: true,
                    digits: true
                },
                cvv: {
                    required: true
                },
                month: {
                    required: true
                },
                year: {
                    required: true
                }
            }
        });
    </script>
@endsection
