@extends('admin.layouts.layout')

@section('title', 'Room Management')

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
                            <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">Room Management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Room</li>
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
                            <h4 class="cart-title">Edit Room</h4>
                            <form action="{{ route('rooms.update', $room->id) }}" method="post" enctype="multipart/form-data" id="form_edit_room">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{ old('name', $room->name) }}" class="form-control" id="name" placeholder="Enter name">
                                            @if ($errors->has('name'))
                                                <span id="error_name" class="text-danger error-text">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Slug <span class="text-danger">*</span></label>
                                            <input type="text" name="slug" value="{{ old('slug', $room->slug) }}" class="form-control" id="slug" readonly>
                                            @if ($errors->has('slug'))
                                                <span id="error_slug" class="text-danger error-text">{{ $errors->first('slug') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Type <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="type">
                                                @if (!empty(config('constants.room_type')))
                                                    @foreach (config('constants.room_type') as $key => $value)
                                                        <option value="{{ $value }}" {{ $value == old('type', $room->type) ? 'selected' : '' }}>{{ $key }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('type'))
                                                <span id="error_type" class="text-danger error-text">{{ $errors->first('type') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price <span class="text-danger">*</span></label>
                                            <input type="text" name="price" value="{{ old('price', $room->price) }}" class="form-control" id="price" placeholder="Enter price">
                                            @if ($errors->has('price'))
                                                <span id="error_price" class="text-danger error-text">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="max_adult">Maximum number of adults <span class="text-danger">*</span></label>
                                            <input type="text" name="max_adult" value="{{ old('max_adult', $room->max_adult) }}" class="form-control" id="max_adult" placeholder="Enter maximum number of adults">
                                            @if ($errors->has('max_adult'))
                                                <span id="error_max_adult" class="text-danger error-text">{{ $errors->first('max_adult') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="max_children">Maximum number of children</label>
                                            <input type="text" name="max_children" value="{{ old('max_children', $room->max_children) }}" class="form-control" id="max_children" placeholder="Enter maximum number of children">
                                            @if ($errors->has('max_children'))
                                                <span id="error_max_children" class="text-danger error-text">{{ $errors->first('max_children') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Image <span class="text-danger">*</span></label>
                                            <div class="preview-image" style="width: 100%; overflow: hidden;">
                                                <label for="image">
                                                    <img class="thumbnail img-fluid border" id="image-preview" src="{{ !empty($room->image) ? asset('storage/rooms/' . $room->image) : asset('assets/images/no_image.png') }}" style="width: 50%; height: 100%; object-fit: cover;">
                                                </label>
                                            </div>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control d-none" accept="image/*">
                                            </div>
                                            <span class="err-image text-danger"></span>
                                            @if ($errors->has('image'))
                                                <span id="error_image" class="text-danger error-text">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" rows="10" class="form-control" id="description" placeholder="Enter description">{{ old('description', $room->description) }}</textarea>
                                            @if ($errors->has('description'))
                                                <span id="error_description" class="text-danger error-text">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 row justify-content-center">
                                    <div class="col-2">
                                        <a href="{{ route('rooms.index') }}" class="btn waves-effect waves-light btn-secondary btn-block">
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

@section('js')
    <script src="{{ asset('assets/js/preview_image.js') }}"></script>
    <script src="{{ asset('assets/js/name_to_slug.js') }}"></script>
    <script>
        previewImage('#image', '.thumbnail', '.err-image');

        $('body').on('keyup', '#name', function () {
            let name = $(this).val();
            $('#slug').val(nameToSlug(name));
        });
    </script>
@endsection
