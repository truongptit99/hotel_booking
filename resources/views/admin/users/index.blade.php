@extends('admin.layouts.layout')

@section('title', 'User Management')

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
                    <h4 class="page-title">User Management</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Management</li>
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
                            <h4 class="cart-title mb-3">Users list</h4>
                            <div class="table-responsive hide-scroll-bar">
                                <table class="table table-bordered table-striped w-100" id="user-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">First Name</th>
                                            <th class="text-center">Last Name</th>
                                            <th class="text-center">Email</th>
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
            let room_table = $('#user-table').DataTable({
                dom: 'rt<"row align-items-end"<"col-6"li><"col-6"p>>',
                processing: true,
                responsive: true,
                serverSide: true,
                stateSave: true,
                ordering: false,

                ajax: {
                    type: 'post',
                    url: "{{ route('users.data') }}",
                },

                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, class: 'text-center'},
                    { data: 'first_name', name: 'first_name', searchable: true, orderable: false, class: 'text-nowrap'},
                    { data: 'last_name', name: 'last_name', searchable: true, orderable: false, class: 'text-nowrap'},
                    { data: 'email', name: 'email', searchable: true, orderable: false, class: 'text-nowrap'},
                    { data: 'action', name: 'action', searchable: false, orderable: false, class: 'text-center'},
                ]
            });

            removeData('.btn-delete', '#user-table');
        });
    </script>
@endsection
