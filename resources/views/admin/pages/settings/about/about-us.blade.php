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
                {{-- ========================================= --}}
                <div class="card">
                    <div class="card-body">
                        <h5>About Us</h5>
                        {{-- <img src="/frontend/knowAbous.png" alt="" style="max-height: 150px;"
                            class="img-fluid mb-2 d-block" style="max-width: 100%; height: auto;"> --}}
                        <form method="post" action="{{ url('admin/about_update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1" for="free">Title</label>
                                <input type="text" value="{{ $data->title }}" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description" class="mb-1">Description</label>
                                <textarea class="summernoteSmall" name="description" id="" cols="30" rows="10">{{ $data->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <img src="/{{$data->image}}" id="imagePreview" style="height: 80px" alt="" class="img-fluid"> <br>
                                <label class="mb-1" for="free">Image</label>
                                <input type="file" id="imageInput" class="form-control" name="image">
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
