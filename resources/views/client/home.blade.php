@extends('client.layouts.layout')

@section('title', 'Homepage')

@section('main')
    @include('client.layouts.header')

    <!-- Banner start -->
    <div class="banner banner-2">
        <div class="banner-inner">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('client/img/banner/banner-slider-3.jpg') }}" alt="banner-slider-3">
                        <div class="carousel-caption banner-slider-inner banner-top-align">
                            <div class="banner-content text-center">
                                <h1 data-animation="animated fadeInDown delay-05s"><span>Welcome to</span> Hotel Booking</h1>
                                <p data-animation="animated fadeInUp delay-1s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('client/img/banner/banner-slider-2.jpg') }}" alt="banner-slider-2">
                        <div class="carousel-caption banner-slider-inner banner-top-align">
                            <div class="banner-content text-center">
                                <h1 data-animation="animated fadeInLeft delay-05s"><span>Best Place To</span> Find Room</h1>
                                <p data-animation="animated fadeInUp delay-05s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('client/img/banner/banner-slider-1.jpg') }}" alt="banner-slider-1">
                        <div class="carousel-caption banner-slider-inner banner-top-align">
                            <div class="banner-content text-center">
                                <h1 data-animation="animated fadeInLeft delay-05s"><span>Best Place</span> for relux</h1>
                                <p data-animation="animated fadeInLeft delay-1s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Banner end -->

    <!-- Search area box 2 start -->
    <div class="search-area-box-2 search-area-box-6">
        <div class="container">
            <div class="search-contents">
                <form action="{{ route('search.room') }}" method="post" id="form-search-room">
                    @csrf
                    <div class="row search-your-details">
                        <div class="col-lg-3 col-md-3">
                            <div class="search-your-rooms mt-20">
                                <h3 class="hidden-xs hidden-sm">Search</h3>
                                <h2 class="hidden-xs hidden-sm">Your <span>Rooms</span></h2>
                                <h2 class="hidden-lg hidden-md">Search Your <span>Rooms</span></h2>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-6 option-search-room">
                                    <div class="form-group">
                                        <input type="text" class="btn-default datepicker" name="check_in" placeholder="Check in" id="check_in">
                                        <div class="text-error error_check_in"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 option-search-room">
                                    <div class="form-group">
                                        <input type="text" class="btn-default datepicker" name="check_out" placeholder="Check out" id="check_out">
                                        <div class="text-error error_check_out"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 option-search-room">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="type" id="type">
                                            <option value="">Room type</option>
                                            @if (!empty(config('constants.room_type')))
                                                @foreach (config('constants.room_type') as $key => $value)
                                                    <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="text-error error_type"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 option-search-room">
                                    <div class="form-group">
                                        <input type="text" class="btn-default" name="name" id="name" placeholder="Enter room name">
                                        <div class="text-error error_check_name"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 option-search-room">
                                    <div class="form-group">
                                        <input type="text" class="btn-default" name="adult" id="adult" placeholder="Enter number of adults">
                                        <div class="text-error error_adult"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 option-search-room">
                                    <div class="form-group">
                                        <input type="text" class="btn-default" name="children" id="children" placeholder="Enter number of children">
                                        <div class="text-error error_children"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: flex; justify-content: center;">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        <button class="search-button btn-theme" id="search-room">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Search area box 2 end -->

    <!-- rooms section start -->
    <div class="content-area rooms-section" id="rooms-section">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Best Rooms</h1>
                <p>Please search to get available room!</p>
            </div>

            <div id="list-room">

            </div>
        </div>
    </div>
    <!-- rooms section end -->

    @include('client.layouts.footer')
@endsection

@section('js')
    <script>
        $('#check_in').datepicker({
            format: 'yyyy/mm/dd',
            startDate: new Date(),
            todayHighlight: true,
            clearBtn: true,
            autoclose: true
        }).on('changeDate', function (e) {
            let checkIn = $('#check_in').val();

            if (checkIn !== '') {
                let checkInDate = new Date(checkIn);
                $('#check_out').datepicker('setStartDate', new Date(checkInDate.addDays(1)));
            }
        });

        $('#check_out').datepicker({
            format: 'yyyy/mm/dd',
            startDate: new Date(),
            todayHighlight: true,
            clearBtn: true,
            autoclose: true
        }).on('changeDate', function () {
            let checkOut = $('#check_out').val();

            if (checkOut !== '') {
                let checkOutDate = new Date(checkOut);
                $('#check_in').datepicker('setEndDate', new Date(checkOutDate.addDays(-1)));
            }
        });

        const searchRoom = function (page = '') {
            $('.text-error').html('');
            let url = "{{ route('search.room') }}";
            let dataSearch = {
                _token: "{{ csrf_token() }}",
                page: page,
                check_in: $('#check_in').val(),
                check_out: $('#check_out').val(),
                type: $('#type').val(),
                name: $('#name').val(),
                adult: $('#adult').val(),
                children: $('#children').val()
            } 

            $.ajax({
                url: url,
                type: 'post',
                data: dataSearch,
                complete: function () {
                    $('.page_loader').css('display', 'none');
                },
                success: function(data) {
                    $('#list-room').html(data.view);
                },
                error: function (xhr) {
                    $('#list-room').html('');
                    if (xhr.status == 422) {
                        let errors = xhr.responseJSON.errors;
                        for(let key in errors) {
                            $('.error_' + key).html(errors[key][0]);
                        }
                    } else {
                        notiAlert('error', 'An error occurred, please search again!');
                    }
                }
            });
        }

        $('body').on('click', '.pagination .page-item', async function (e) {
            e.preventDefault();
            $('.page_loader').css('display', 'block');
            let url = $(this).find('.page-link').attr('href');
            let page = url.split('page=')[1];

            await searchRoom(page);

            $('html, body').animate({
                scrollTop: $('.rooms-section').first().offset().top
            }, 100);
        });

        $('body').on('click', '#search-room', function (e) {
            e.preventDefault();
            $('.page_loader').css('display', 'block');
            searchRoom();
        });
    </script>
@endsection
