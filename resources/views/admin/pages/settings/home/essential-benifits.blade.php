@extends('admin.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .fade:not(.show) {
            opacity: 0;
            border: 5px solid white;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Essential Benifits</h4>
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
                        <h5>Essential Benifits</h5>
                        <img src="/frontend/Essential_Benifits.png" alt="" style="max-height: 150px;"
                            class="img-fluid mb-2 d-block" style="max-width: 100%; height: auto;">
                        <form method="post" action="{{ url('admin/essential_benifits-update') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label class="mb-1" for="free">Title</label>
                                <input type="text" value="{{ old('title', $Esbenifits->title) }}" class="form-control"
                                    name="title">
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="free">Title two</label>
                                <input type="text" value="{{ old('title_two', $Esbenifits->title_two) }}"
                                    class="form-control" name="title_two">
                            </div>
                            <div class="form-group">
                                <label for="description" class="mb-1">Description</label>
                                <textarea class="summernoteSmall" name="description" id="" cols="30" rows="10">{{ old('description', $Esbenifits->description) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        {{-- list items  --}}
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Essentail Benifits List</h5>
                                        <hr>
                                        <ul class="p-0" style="list-style: circle">
                                            @foreach ($list as $item)
                                                <li class="d-flex align-items-center">
                                                    <div>
                                                        <h5 class="fw-bold">{{ $item->essential }}</h5>
                                                    </div>
                                                    <form action="{{ url('admin/esbenifits-delete') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <button type="submit"
                                                            class="btn border border-white text-danger p-1 mx-2 btn-default">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                                <hr>
                                            @endforeach

                                        </ul>
                                        {{ $list->links('vendors.custom-pagination') }}
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" action="{{ url('admin/add_esbenifits') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="" class="mb-2">Add Essentail Benifits</label>
                                            <div class="form-group">
                                                <label for="" class="mb-2">Essential</label>
                                                <input type="text" placeholder="essential" class="form-control"
                                                    name="essential">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add new</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
