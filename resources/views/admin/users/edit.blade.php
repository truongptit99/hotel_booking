@extends('admin.layouts.layout')

@section('title', 'User Management')

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
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User Management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                            <h4 class="cart-title">Edit User</h4>
                            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data" id="form_edit_user">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control" id="first_name" placeholder="Enter first name">
                                            @if ($errors->has('first_name'))
                                                <span id="error_first_name" class="text-danger error-text">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control" id="last_name" placeholder="Enter last name">
                                            @if ($errors->has('last_name'))
                                                <span id="error_last_name" class="text-danger error-text">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 row justify-content-center">
                                    <div class="col-2">
                                        <a href="{{ route('users.index') }}" class="btn waves-effect waves-light btn-secondary btn-block">
                                            Cancel
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn waves-effect waves-light btn-primary btn-block">
                                            <div class="loader-container">
                                                <div class="spinner-border text-dark spinner-border-sm d-none"></div><span>Save</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
