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
                        <h5>Why Choose Us?</h5>
                        <img src="/frontend/whychoose.png" style="height: 80px;margin-bottom: 10px;" alt="" class="img-fluid">
                        <form method="post" action="{{ url('admin/whychoose-update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1" for="free_shipping">Free Shipping</label>
                                <input type="text" class="form-control @error('free_shipping') is-invalid @enderror" 
                                       name="free_shipping" value="{{ old('free_shipping', $wchoose->free_shipping) }}">
                                @error('free_shipping')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mb-1" for="support">Support 24/7</label>
                                <input type="text" class="form-control @error('support') is-invalid @enderror" 
                                       name="support" value="{{ old('support', $wchoose->support) }}">
                                @error('support')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mb-1" for="return">Return Policy</label>
                                <input type="text" class="form-control @error('return') is-invalid @enderror" 
                                       name="return" value="{{ old('return', $wchoose->return) }}">
                                @error('return')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mb-1" for="payment">Payment Secure</label>
                                <input type="text" class="form-control @error('payment') is-invalid @enderror" 
                                       name="payment" value="{{ old('payment', $wchoose->payment) }}">
                                @error('payment')
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
            // Initialize summernote editor for description
            $('.summernoteSmall').summernote({
                height: 150,
                focus: false,
            });

            // Image Preview for uploaded image
            $('#imageInput').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });

            // Background Image Preview for uploaded background image
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
