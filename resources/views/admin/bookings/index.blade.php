@extends('admin.layouts.layout')

@section('title', 'Booking Management')

@section('main')
    <iframe class="d-none" id="frame-print" srcdoc=''></iframe>
    <div class="d-none" id="frame-print"></div>
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <h4 class="page-title">Booking Management</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking Management</li>
                        </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="cart-title mb-3">Bookings list</h4>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div class="text-nowrap mr-2">Payment status: </div>
                                        <select class="form-control custom-select" name="payment_status" id="payment-status">
                                            <option value="">All</option>
                                            @if (!empty(config('constants.payment_status')))
                                                @foreach (config('constants.payment_status') as $key => $value)
                                                    <option value="{{ $value }}">{{ ucfirst($key) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive hide-scroll-bar">
                                <table class="table table-bordered table-striped w-100" id="booking-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Contact name</th>
                                            <th class="text-center">Phone number</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Zip code</th>
                                            <th class="text-center">Total price</th>
                                            <th class="text-center">Payment status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let booking_table = $('#booking-table').DataTable({
                dom: 'rt<"row align-items-end"<"col-6"li><"col-6"p>>',
                processing: true,
                responsive: true,
                serverSide: true,
                stateSave: true,
                ordering: false,

                ajax: {
                    type: 'post',
                    url: "{{ route('bookings.data') }}",
                    data: function (d) {
                        d.payment_status = $('#payment-status').val()
                    }
                },

                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, class: 'text-center'},
                    { data: 'contact_name', name: 'contact_name', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'phone_number', name: 'phone_number', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'email', name: 'email', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'address', name: 'address', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'zip_code', name: 'zip_code', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'total_price', name: 'total_price', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'payment_status', name: 'payment_status', searchable: false, orderable: false, class: 'text-nowrap'},
                ]
            });

            $('body').on('change', '#payment-status', function () {
                booking_table.draw();
            });
        });
    </script>
@endsection
