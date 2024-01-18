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
                            <li class="breadcrumb-item active" aria-current="page">Create New Room</li>
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
                            <h4 class="cart-title">Create New Room</h4>
                            <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data" id="form_create_room">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="" class="form-control" id="name" placeholder="Enter name">
                                            <span id="error_name" class="text-danger error-text"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Slug <span class="text-danger">*</span></label>
                                            <input type="text" name="slug" value="" class="form-control" id="slug" readonly>
                                            <span id="error_slug" class="text-danger error-text"></span>
                                        </div>

                                        <div class="form-group">
                                            <label>Type <span class="text-danger">*</span></label>
                                            <select class="form-control custom-select" name="type">
                                                @if (!empty(config('constants.room_type')))
                                                    @foreach (config('constants.room_type') as $key => $value)
                                                        <option value="{{ $value }}">{{ $key }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span id="error_type" class="text-danger error-text"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price <span class="text-danger">*</span></label>
                                            <input type="text" name="price" value="" class="form-control" id="price" placeholder="Enter price">
                                            <span id="error_price" class="text-danger error-text"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="max_adult">Maximum number of adults <span class="text-danger">*</span></label>
                                            <input type="text" name="max_adult" value="" class="form-control" id="max_adult" placeholder="Enter maximum number of adults">
                                            <span id="error_max_adult" class="text-danger error-text"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="max_children">Maximum number of children</label>
                                            <input type="text" name="max_children" value="" class="form-control" id="max_children" placeholder="Enter maximum number of children">
                                            <span id="error_max_children" class="text-danger error-text"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Image <span class="text-danger">*</span></label>
                                            <div class="preview-image" style="width: 100%; overflow: hidden;">
                                                <label for="image">
                                                    <img class="thumbnail img-fluid border" id="image-preview" src="{{ asset('assets/images/no_image.png') }}" style="width: 50%; height: 100%; object-fit: cover;">
                                                </label>
                                            </div>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control d-none" accept="image/*">
                                            </div>
                                            <span class="err-image text-danger"></span>
                                            <span id="error_image" class="text-danger error-text"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" rows="10" class="form-control" id="description" placeholder="Enter description"></textarea>
                                            <span id="error_description" class="text-danger error-text"></span>
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

        $('body').on('submit', '#form_create_room', function (e) {
            e.preventDefault();
            let url = $(this).attr('action');
            let formData = new FormData($(this)[0]);
            $('.error-text').html('');
            $.ajax({
                type: "post",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                complete: function() {
                    disableLoader();
                },
                success: function(result) {
                    notiAlert(result.type, result.message);
                    if (result.type === 'success') {
                        setTimeout(() => {
                            location.href = "{{ route('rooms.index') }}"
                        }, 500);
                    }
                },
                error: function(xhr) {
                    if (xhr.status == 422) {
                        let errors = xhr.responseJSON.errors;
                        for(let key in errors) {
                            $('#error_' + key).html(errors[key][0]);
                        }
                    } else {
                        notiAlert(xhr.responseJSON.type, xhr.responseJSON.message);
                    }
                }
            });
        });
    </script>
@endsection
