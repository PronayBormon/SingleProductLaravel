@extends('admin.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/products') }}">Frontend Settings</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- {{$product}} --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none; padding: 0; margin-bottom: 0px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5>Banner Section</h5>
                        <form method="post" action="{{ url('/admin/banner-update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <img src="/frontend/banner.png" alt="" style="max-height: 150px;" class="img-fluid mb-2 d-block" style="max-width: 100%; height: auto;">
                                <label class="mb-1" for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $banner->title) }}" name="title">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img id="imagePreview" style="max-height: 60px;" src="/frontend/frontss/banner.png" alt="" class="img-fluid mb-2" style="max-width: 100%; height: auto;">
                                    <img style="max-height: 60px;" src="/{{ $banner->image }}" alt="" class="img-fluid mb-2 ms-2" style="max-width: 100%; height: auto;">
                                </div>
                                <label class="mb-1" for="image">Image<span class="text-small text-danger">(600x636)</span></label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="imageInput">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img id="bgImagePreview" style="max-height: 60px;" src="/frontend/frontss/banner.png" alt="" class="img-fluid mb-2" style="max-width: 100%; height: auto;">
                                    <img style="max-height: 60px;" src="/{{ $banner->background_image }}" alt="" class="img-fluid mb-2 ms-2" style="max-width: 100%; height: auto;">
                                </div>
                                <label class="mb-1" for="background_image">Background Image <span class="text-small text-danger">(1100x500)</span></label>
                                <input type="file" class="form-control @error('background_image') is-invalid @enderror" name="background_image" id="backgroundImageInput">
                                @error('background_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="description" class="mb-1">Description</label>
                                <textarea class="summernoteSmall @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10">{{ old('description', $banner->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $(function() {
            // Initialize summernote
            $('.summernote').summernote({
                height: 350,
                focus: false,
            });
            $('.summernoteSmall').summernote({
                height: 150,
                focus: false,
            });

            // Image preview for the image input
            $('#imageInput').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });

            // Background image preview
            $('#backgroundImageInput').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#bgImagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
