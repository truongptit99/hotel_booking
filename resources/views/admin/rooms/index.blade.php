@extends('admin.layouts.layout')

@section('title', 'Room Management')

@section('css')

@endsection

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
                    <h4 class="page-title">Room Management</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Room Management</li>
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
                            <div class="text-right mb-3">
                                <a href="{{ route('rooms.create') }}" class="btn waves-effect waves-light btn-success btn-add ml-2">
                                    <i class="fas fa-plus"></i> Create
                                </a>
                            </div>
                            <h4 class="cart-title mb-3">Rooms list</h4>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex align-items-center">
                                        <div class="text-nowrap mr-2">Room type: </div>
                                        <select class="form-control custom-select" name="type" id="room-type">
                                            <option value="">All</option>
                                            @if (!empty(config('constants.room_type')))
                                                @foreach (config('constants.room_type') as $key => $value)
                                                    <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive hide-scroll-bar">
                                <table class="table table-bordered table-striped w-100" id="room-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Action</th>
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
    <script src="{{ asset('assets/js/remove_data.js') }}"></script>
    <script>
        $(document).ready(function () {
            let room_table = $('#room-table').DataTable({
                dom: 'rt<"row align-items-end"<"col-6"li><"col-6"p>>',
                processing: true,
                responsive: true,
                serverSide: true,
                stateSave: true,
                ordering: false,

                ajax: {
                    type: 'post',
                    url: "{{ route('rooms.data') }}",
                    data: function (d) {
                        d.room_type = $('#room-type').val()
                    }
                },

                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, class: 'text-center'},
                    { data: 'image', name: 'image', searchable: false, orderable: false, class: 'text-center'},
                    { data: 'name', name: 'name', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'type', name: 'type', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'price', name: 'price', searchable: false, orderable: false, class: 'text-nowrap'},
                    { data: 'action', name: 'action', searchable: false, orderable: false, class: 'text-center'},
                ]
            });

            $('body').on('change', '#room-type', function () {
                room_table.draw();
            });

            removeData('.btn-delete', '#room-table');
        });
    </script>
@endsection
