@extends('admin.master')
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
                        <li class="breadcrumb-item"><a href="{{ url('admin/products') }}">Products</a></li>
                        <li class="breadcrumb-item active">Add new Products</li>
                    </ol>
                    {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i> Add Product</button> --}}
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

                        <div class="modal-body">
                            <form action="{{ url('/admin/add-products') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul style="list-style: none; padding: 0;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Product Title" required>
                                    <label for="title" class="form-label">Product Title</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="price" id="price"
                                        placeholder="Price" required>
                                    <label for="price" class="form-label">Price</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="discount" id="discount"
                                        placeholder="Discount" required>
                                    <label for="discount" class="form-label">Discount</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="dis_type" id="dis_type" class="form-control">
                                        <option value="0">Discount Type</option>
                                        <option value="1">Flat</option>
                                        <option value="2">Percentage(%)</option>
                                    </select>
                                    <label for="dis_type" class="form-label">Discount Type</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="quantity" id="quantity"
                                        placeholder="Quantity" required>
                                    <label for="quantity" class="form-label">Quantity</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="short_desc" id="short_desc" class="form-control" cols="30" rows="3"
                                        placeholder="Short Description"></textarea>
                                    <label for="short_desc" class="form-label">Short Description</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"
                                        placeholder="Description"></textarea>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Image</h4>
                                        <label for="input-file-now" class="form-label">Upload your product image</label>
                                        <input type="file" name="image" id="input-file-now" class="form-control"
                                            accept="image/*" />
                                    </div>
                                    <img id="image-preview" src="" width="200" alt="Image Preview"
                                        class="img-fluid" style="display: none;">
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection