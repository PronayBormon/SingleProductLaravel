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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                    <a href="{{ url('/admin/add-product') }}" class="btn btn-info">Add Product</a>
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

                <div class="table-responsive">
                    <form action="{{url('admin/search_product')}}" method="GET">
                        @csrf
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="form-group m-1">
                                <input type="text" name="search" placeholder="Search Product...." class="form-control">                                
                            </div>
                            <div class="form-group m-1">
                                <select name="status" id="" class="form-control">
                                    <option value="">All</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group m-1">
                                <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> Search</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-hover no-wrap">
                        <thead>
                            <tr>
                                <th class="text-center">SL.</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Discount Type</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td><img src="/products/{{ $item->image }}" alt="" class="img-fluid"
                                            style="height: 70px; width:70px;object-fit: cover;"></td>
                                    <td class="txt-oflo">
                                        <div class="text-wrap"
                                            style="max-width: 250px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; line-clamp: 3; -webkit-box-orient: vertical;">
                                            {{ $item->title }}
                                        </div>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td class="txt-oflo">${{ $item->price }}</td>
                                    <td>{{ $item->discount }}</td>
                                    <td>{{ $item->discount_type == 1 ? 'Flat' : 'Percentage (%)' }}</td>
                                    <td>
                                        <div class="text-wrap"
                                            style="max-width: 200px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                            {{ $item->short_description }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-wrap"
                                            style="max-width: 200px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                            <p>{!! $item->description !!}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge {{ $item->status == '1' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $item->status == '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/products/edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        {{-- <form action="{{ url('/admin/products/delete', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE') --}}
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->id }}"
                                            class="btn btn-danger btn-sm">Delete</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content p-4">
                                                    <div class="modal-body">
                                                        <h4 class="text-white text-center mb-2">Are you sure want to delete ?</h4>
                                                        <div class="d-flex align-items-top p-2"  >
                                                            <img src="/products/{{ $item->image }}" alt=""
                                                                class="img-fluid me-3"
                                                                style="height: 70px; width:70px;object-fit: cover;">
                                                            <div class="bordered-1">
                                                                <div class="text-wrap text-danger fw-bold"
                                                                    style="max-width: 250px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                    {{ $item->title }} <br>
                                                                </div>
                                                                <p> <span
                                                                        class="text-dark fw-bold">{{ $item->price }}TK</span>
                                                                    <br>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="btn-group w-100 pt-3">
                                                            <form action="{{ url('/admin/pro_delete', $item->slug) }}" class="w-50"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger w-100">Delete</button>
                                                            </form>
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                            aria-label="Close">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links('vendors.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
