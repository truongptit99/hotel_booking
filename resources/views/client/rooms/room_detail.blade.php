@extends('client.layouts.layout')

@section('title', 'Room Detail')

@section('main')
    @include('client.layouts.header')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Room Detail</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="active">Room Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Rooms detail section start -->
    <div class="content-area rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <!-- Heading courses start -->
                    <div class="heading-rooms clearfix sidebar-widget">
                        <div class="pull-left">
                            <h3>{{ $room->name }}</h3>
                        </div>
                        <div class="pull-right">
                            <h3><span>{{ number_format($room->price) . ' VND' }}</span></h3>
                            <h5>Per Night</h5>
                        </div>
                    </div>
                    <!-- Heading courses end -->

                    <!-- sidebar start -->
                    <div class="rooms-detail-slider sidebar-widget">
                        <!--  Rooms detail slider start -->
                        <div class="rooms-detail-slider simple-slider mb-40 ">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="{{ asset('storage/rooms/' . $room->image) }}" class="thumb-preview" alt="room-image">
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                        <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                            <i class="fa fa-angle-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                        <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                            <i class="fa fa-angle-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!-- Indicators -->
                                <ol class="carousel-indicators thumbs visible-lg visible-md">
                                    <li data-target="#carousel-custom" data-slide-to="0" class=""><img src="{{ asset('storage/rooms/' . $room->image) }}" alt="room-img"></li>
                                </ol>
                            </div>
                        </div>
                        <!-- Rooms detail slider end -->

                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-lg hidden-md clearfix">
                            <div class="text-center">
                                <h3>Search Your Rooms</h3>
                            </div>
                            <div class="search-contents">
                                <form method="GET">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker" placeholder="Check In">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker" placeholder="Check Out">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="room">
                                                        <option>Room</option>
                                                        <option>Single Room</option>
                                                        <option>Double Room</option>
                                                        <option>Deluxe Room</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="beds">
                                                        <option>Beds</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="adults">
                                                        <option>Adult</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="children">
                                                        <option>Child</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <button class="search-button btn-theme">Book Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->

                        <!-- Rooms description start -->
                        <div class="panel-box course-panel-box course-description">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab" aria-expanded="true">Description</a></li>
                                <li class=""><a href="#tab2default" data-toggle="tab" aria-expanded="false">Features</a></li>
                                <li class=""><a href="#tab3default" data-toggle="tab" aria-expanded="false">Advantages</a></li>
                            </ul>
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1default">
                                            <div class="divv">
                                                <!-- Title -->
                                                <h3>Rooms Description</h3>
                                                <!-- paragraph -->
                                                <p>{{ $room->description }}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade features" id="tab2default">
                                            <!-- Rooms features start -->
                                            <div class="rooms-features">
                                                <h3>Rooms Features</h3>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-air-conditioning"></i>Air conditioning
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-balcony-and-door"></i>Balcony
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-weightlifting"></i>Gym
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-parking"></i>Parking
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-sunbed"></i>Beach View
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-bed"></i>2 Bedroom
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-person-learning-by-reading"></i>Free Newspaper
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-swimming-silhouette"></i>Use of pool
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-graph-line-screen"></i>TV
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-no-smoking-sign"></i>No Smoking
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-room-service"></i>Room Service
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-breakfast"></i>Breakfast
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-phone-receiver"></i>Telephone
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-bed"></i>2 Bedroom
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-wifi-connection-signal-symbol"></i>Free Wi-Fi
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rooms features end -->
                                        </div>
                                        <div class="tab-pane fade technical" id="tab3default">
                                            <!-- Advantages start -->
                                            <div class="advantages">
                                                <h3>Advantages</h3>
                                                <ul>
                                                    <li><span>1</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>2</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>3</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>4</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>5</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>6</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                </ul>
                                            </div>
                                            <!-- Advantages end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rooms description end -->
                    </div>
                    <!-- sidebar end -->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="sidebar">
                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-sm hidden-xs clearfix bg-grey">
                            <div class="search-contents">
                                <form action="{{ route('check.room.availability') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <h4>Check in</h4>
                                                    <input type="text" class="btn-default datepicker" name="check_in" id="check_in" value="{{ old('check_in', session('start_date', '')) }}" placeholder="Check in">
                                                    @if ($errors->has('check_in'))
                                                        <div class="text-error error_check_in">{{ $errors->first('check_in') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <h4>Check out</h4>
                                                    <input type="text" class="btn-default datepicker" name="check_out" id="check_out" value="{{ old('check_out', session('end_date', '')) }}" placeholder="Check out">
                                                    @if ($errors->has('check_out'))
                                                        <div class="text-error error_check_out">{{ $errors->first('check_out') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 option-search-room">
                                                <div class="form-group">
                                                    <h4>Adults</h4>
                                                    <input type="text" class="btn-default" name="adult" value="{{ old('adult', session('adult', '')) }}" id="adult" placeholder="Adults">
                                                    @if ($errors->has('adult'))
                                                        <div class="text-error error_adult">{{ $errors->first('adult') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 option-search-room">
                                                <div class="form-group">
                                                    <h4>Children</h4>
                                                    <input type="text" class="btn-default" name="children" value="{{ old('children', session('children', '')) }}" id="children" placeholder="Children">
                                                    @if ($errors->has('children'))
                                                        <div class="text-error error_children">{{ $errors->first('children') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group mrg-btm-10">
                                                    <button class="search-button btn-theme" onclick="this.form.submit(); this.disabled = true">Book Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms detail section end -->

    @include('client.layouts.footer')
@endsection

@section('js')
    <script src="{{ asset('client/js/datepicker_startdate_enddate.js') }}"></script>
    <script>
        $(document).ready(function () {
            let firstCheckIn = $('#check_in').val();
            let firstCheckOut = $('#check_out').val();

            $('#check_in').datepicker({
                format: 'yyyy-mm-dd',
                startDate: new Date(),
                todayHighlight: true,
                clearBtn: true,
                autoclose: true
            }).on('changeDate', function (e) {
                let checkIn = $('#check_in').val();

                setStartDateForCheckOut(checkIn);
            });

            setEndDateForCheckIn(firstCheckOut);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      

            $('#check_out').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                clearBtn: true,
                autoclose: true
            }).on('changeDate', function () {
                let checkOut = $('#check_out').val();

                setEndDateForCheckIn(checkOut);
            });
        });
    </script>
@endsection
