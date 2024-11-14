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
                <form action="{{ url('admin/search_order') }}" method="GET">
                    @csrf
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="form-group m-1">
                            <input type="text" name="search" placeholder="Search order...." class="form-control">
                        </div>
                        {{-- <div class="form-group m-1">
                            <select name="status" id="" class="form-control">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div> --}}
                        <div class="form-group m-1">
                            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i>
                                Search</button>
                        </div>
                    </div>
                </form>
                <ul class="nav nav-pills m-t-30 m-b-30">
                    <li class=" nav-item"> <a href="#pending" class="nav-link active" data-bs-toggle="tab"
                            aria-expanded="false">New Orders <span
                                class="badge bg-success fw-bold">({{ count($orders) }})</span></a> </li>
                    <li class="nav-item"> <a href="#recontact" class="nav-link " data-bs-toggle="tab"
                            aria-expanded="true">Recontact <span
                                class="badge bg-success fw-bold">({{ count($RecontactOrders) }})</span></a> </li>
                    <li class="nav-item"> <a href="#Confirm" class="nav-link" data-bs-toggle="tab"
                            aria-expanded="false">Confirm <span
                                class="badge bg-success fw-bold">({{ count($ConfirmOrders) }})</span></a> </li>
                    <li class="nav-item"> <a href="#cancel" class="nav-link " data-bs-toggle="tab"
                            aria-expanded="true">Cancel <span
                                class="badge bg-success fw-bold">({{ count($CancelOrders) }})</span></a> </li>
                    <li class="nav-item"> <a href="#return" class="nav-link " data-bs-toggle="tab"
                            aria-expanded="true">Return <span
                                class="badge bg-success fw-bold">({{ count($ReturnOrders) }})</span></a> </li>
                    <li class="nav-item"> <a href="#bookCurier" class="nav-link " data-bs-toggle="tab"
                            aria-expanded="true">Book To Curier <span
                                class="badge bg-success fw-bold">({{ count($BookToCourierOrders) }})</span></a> </li>
                    <li class="nav-item"> <a href="#deliver" class="nav-link " data-bs-toggle="tab"
                            aria-expanded="true">Delivered <span
                                class="badge bg-success fw-bold">({{ count($DeliveredOrders) }})</span></a> </li>
                </ul>
                <hr>
                <div class="tab-content br-n pn">
                    <div id="pending" class="tab-pane active">
                        <div class="table-responsive">
                            <table class="table table-hover no-wrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer Details</th>
                                        <th>Address</th>
                                        <th>Subtotal</th>
                                        <th>Payment</th>
                                        <th>Payment Type</th>
                                        <th>Order Note</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_id }}</td>
                                            <td>
                                                <p class="mb-1"><Strong>Name: </Strong> {{ $order->first_name }}
                                                    {{ $order->last_name }}</p>
                                                <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}</p>
                                                <hr>
                                                <p class="mb-1"><Strong>ID: </Strong>
                                                    {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                <p class="mb-1"><Strong>Name: </Strong>
                                                    {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                <p class="mb-1"><strong>Email:
                                                    </strong>{{ $order->user ? $order->user->email : 'Guest User' }}</p>

                                            </td>
                                            <td>
                                                <p class="mb-1"><Strong>Address: </Strong> {{ $order->address }} </p>
                                                <p class="mb-1">{{ $order->address_line }}, {{ $order->postal_code }}
                                                </p>
                                                <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                            </td>
                                            <td>
                                                <p class="mb-1"><strong>Item
                                                        Total: </strong>{{ number_format($order->subtotal, 2) }} TK</p>
                                                <p class="mb-1">
                                                    <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }} TK
                                                </p>
                                                <p class="mb-1"><strong>Sub total: </strong>
                                                    {{ number_format($order->total, 2) }} TK</p>
                                            </td>
                                            <td>
                                                @if ($order->payment_status == 1)
                                                    <span class="badge bg-success text-white fw-bold">Paid</span>
                                                @else
                                                    <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 230px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->order_note }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 230px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->remark }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $order->id }}"><i
                                                            class="fa-solid fa-pen-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $order->id }}"><i
                                                            class="fa-regular fa-eye"></i></button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal{{ $order->id }}" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <form action="{{ url('/admin/order_update') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <h5> New orders</h5>
                                                                        <hr>

                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $order->id }}">
                                                                            <label for="" class="mb-2">Payemnt
                                                                                status</label>
                                                                            <select name="payment_status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                <option value="0"
                                                                                    @if ($order->payment_status == 0) selected @endif>
                                                                                    Unpaid</option>
                                                                                <option value="1"
                                                                                    @if ($order->payment_status == 1) selected @endif>
                                                                                    Paid</option>
                                                                            </select>
                                                                            <label for="" class="mb-2">Order
                                                                                status</label>
                                                                            <select name="status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                    <option value="{{ $key }}"
                                                                                        @if ($order->status == $key) selected @endif>
                                                                                        {{ $status }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="remark"
                                                                                class="d-block mb-2">Remark</label>
                                                                            <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                        </div>
                                                                        <div>
                                                                            <button type="submit"
                                                                                class="btn btn-danger w-100">Update</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- view items  --}}
                                                <div class="modal fade" id="viewModal{{ $order->id }}" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative"
                                                                id="printableArea{{ $order->id }}">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <h1 class="text-center">Invoice</h1>
                                                                <hr>
                                                                <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                <p class="mb-0">Customer Name: {{ $order->first_name }}
                                                                    {{ $order->last_name }}</p>
                                                                <p class="mb-0">Address: {{ $order->address }}</p>
                                                                <p class="mb-0">City/Town: {{ $order->city }}</p>
                                                                <p>Country: Bangladesh</p>

                                                                @foreach ($order->orderItems as $item)
                                                                    <div class="d-flex align-items-top p-2">
                                                                        <img src="/products/{{ $item->image }}"
                                                                            alt="" class="img-fluid me-3"
                                                                            style="height: 70px; width:70px;object-fit: cover;">
                                                                        <div class="bordered-1 w-100">
                                                                            <div class="text-wrap text-danger fw-bold w-100"
                                                                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                {{ $item->title }} <br>
                                                                            </div>
                                                                            <p class="text-end">
                                                                                {{ number_format($item->price, 2) }}TK-
                                                                                x{{ $item->quantity }} - Subtotal:<span
                                                                                    class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                    TK</span> </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <hr>
                                                                <p class="fw-bold text-end mb-1">Shipping:
                                                                    {{ number_format($order->shipping, 2) }} TK</p>
                                                                <p class="fw-bold text-end mb-1">Item total:
                                                                    {{ number_format($order->subtotal, 2) }} TK</p>
                                                                <hr>
                                                                <p class="fw-bold text-end">Subtotal:
                                                                    {{ number_format($order->total, 2) }} TK</p>

                                                                <button class="btn btn-primary mx-auto"
                                                                    onclick="printDiv('printableArea{{ $order->id }}')"
                                                                    id="print">Print</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links('vendors.custom-pagination') }}
                        </div>
                    </div>
                    <div id="recontact" class="tab-pane ">
                        <div class="table-responsive">


                            <table class="table table-hover no-wrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer Details</th>
                                        <th>Address</th>
                                        <th>Subtotal</th>
                                        <th>Payment</th>
                                        <th>Payment Type</th>
                                        <th>Order Note</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($RecontactOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_id }}</td>
                                            <td>
                                                <p class="mb-1"><Strong>Name: </Strong> {{ $order->first_name }}
                                                    {{ $order->last_name }}</p>
                                                <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}</p>
                                                <hr>
                                                <p class="mb-1"><Strong>ID: </Strong>
                                                    {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                <p class="mb-1"><Strong>Name: </Strong>
                                                    {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                <p class="mb-1"><strong>Email:
                                                    </strong>{{ $order->user ? $order->user->email : 'Guest User' }}</p>

                                            </td>
                                            <td>
                                                <p class="mb-1"><Strong>Address: </Strong> {{ $order->address }} </p>
                                                <p class="mb-1">{{ $order->address_line }}, {{ $order->postal_code }}
                                                </p>
                                                <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                            </td>
                                            <td>
                                                <p class="mb-1"><strong>Item
                                                        Total: </strong>{{ number_format($order->subtotal, 2) }} TK</p>
                                                <p class="mb-1">
                                                    <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }} TK
                                                </p>
                                                <p class="mb-1"><strong>Sub total: </strong>
                                                    {{ number_format($order->total, 2) }} TK</p>
                                            </td>
                                            <td>
                                                @if ($order->payment_status == 1)
                                                    <span class="badge bg-success text-white fw-bold">Paid</span>
                                                @else
                                                    <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->order_note }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->remark }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $order->id }}"><i
                                                            class="fa-solid fa-pen-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $order->id }}"><i
                                                            class="fa-regular fa-eye"></i></button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal{{ $order->id }}" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <form action="{{ url('/admin/order_update') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <h5> New orders</h5>
                                                                        <hr>

                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $order->id }}">
                                                                            <label for="" class="mb-2">Payemnt
                                                                                status</label>
                                                                            <select name="payment_status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                <option value="0"
                                                                                    @if ($order->payment_status == 0) selected @endif>
                                                                                    Unpaid</option>
                                                                                <option value="1"
                                                                                    @if ($order->payment_status == 1) selected @endif>
                                                                                    Paid</option>
                                                                            </select>
                                                                            <label for="" class="mb-2">Order
                                                                                status</label>
                                                                            <select name="status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                    <option value="{{ $key }}"
                                                                                        @if ($order->status == $key) selected @endif>
                                                                                        {{ $status }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="remark"
                                                                                class="d-block mb-2">Remark</label>
                                                                            <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                        </div>
                                                                        <div>
                                                                            <button type="submit"
                                                                                class="btn btn-danger w-100">Update</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- view items  --}}
                                                <div class="modal fade" id="viewModal{{ $order->id }}" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative"
                                                                id="printableArea{{ $order->id }}">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <h1 class="text-center">Invoice</h1>
                                                                <hr>
                                                                <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                <p class="mb-0">Customer Name: {{ $order->first_name }}
                                                                    {{ $order->last_name }}</p>
                                                                <p class="mb-0">Address: {{ $order->address }}</p>
                                                                <p class="mb-0">City/Town: {{ $order->city }}</p>
                                                                <p>Country: Bangladesh</p>

                                                                @foreach ($order->orderItems as $item)
                                                                    <div class="d-flex align-items-top p-2">
                                                                        <img src="/products/{{ $item->image }}"
                                                                            alt="" class="img-fluid me-3"
                                                                            style="height: 70px; width:70px;object-fit: cover;">
                                                                        <div class="bordered-1 w-100">
                                                                            <div class="text-wrap text-danger fw-bold w-100"
                                                                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                {{ $item->title }} <br>
                                                                            </div>
                                                                            <p class="text-end">
                                                                                {{ number_format($item->price, 2) }}TK-
                                                                                x{{ $item->quantity }} - Subtotal:<span
                                                                                    class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                    TK</span> </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <hr>
                                                                <p class="fw-bold text-end mb-1">Shipping:
                                                                    {{ number_format($order->shipping, 2) }} TK</p>
                                                                <p class="fw-bold text-end mb-1">Item total:
                                                                    {{ number_format($order->subtotal, 2) }} TK</p>
                                                                <hr>
                                                                <p class="fw-bold text-end">Subtotal:
                                                                    {{ number_format($order->total, 2) }} TK</p>

                                                                <button class="btn btn-primary mx-auto"
                                                                    onclick="printDiv('printableArea{{ $order->id }}')"
                                                                    id="print">Print</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $RecontactOrders->links('vendors.custom-pagination') }}
                        </div>
                    </div>
                    <div id="Confirm" class="tab-pane">
                        <div class="table-responsive">
                            <table class="table table-hover no-wrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer Details</th>
                                        <th>Address</th>
                                        <th>Subtotal</th>
                                        <th>Payment</th>
                                        <th>Payment Type</th>
                                        <th>Order Note</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ConfirmOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_id }}</td>
                                            <td>
                                                <p class="mb-1"><Strong>Name: </Strong> {{ $order->first_name }}
                                                    {{ $order->last_name }}</p>
                                                <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}</p>
                                                <hr>
                                                <p class="mb-1"><Strong>ID: </Strong>
                                                    {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                <p class="mb-1"><Strong>Name: </Strong>
                                                    {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                <p class="mb-1"><strong>Email:
                                                    </strong>{{ $order->user ? $order->user->email : 'Guest User' }}</p>

                                            </td>
                                            <td>
                                                <p class="mb-1"><Strong>Address: </Strong> {{ $order->address }} </p>
                                                <p class="mb-1">{{ $order->address_line }}, {{ $order->postal_code }}
                                                </p>
                                                <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                            </td>
                                            <td>
                                                <p class="mb-1"><strong>Item
                                                        Total: </strong>{{ number_format($order->subtotal, 2) }} TK</p>
                                                <p class="mb-1">
                                                    <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }} TK
                                                </p>
                                                <p class="mb-1"><strong>Sub total: </strong>
                                                    {{ number_format($order->total, 2) }} TK</p>
                                            </td>
                                            <td>
                                                @if ($order->payment_status == 1)
                                                    <span class="badge bg-success text-white fw-bold">Paid</span>
                                                @else
                                                    <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->order_note }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->remark }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $order->id }}"><i
                                                            class="fa-solid fa-pen-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $order->id }}"><i
                                                            class="fa-regular fa-eye"></i></button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <form action="{{ url('/admin/order_update') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <h5> New orders</h5>
                                                                        <hr>

                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $order->id }}">
                                                                            <label for="" class="mb-2">Payemnt
                                                                                status</label>
                                                                            <select name="payment_status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                <option value="0"
                                                                                    @if ($order->payment_status == 0) selected @endif>
                                                                                    Unpaid</option>
                                                                                <option value="1"
                                                                                    @if ($order->payment_status == 1) selected @endif>
                                                                                    Paid</option>
                                                                            </select>
                                                                            <label for="" class="mb-2">Order
                                                                                status</label>
                                                                            <select name="status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                    <option value="{{ $key }}"
                                                                                        @if ($order->status == $key) selected @endif>
                                                                                        {{ $status }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="remark"
                                                                                class="d-block mb-2">Remark</label>
                                                                            <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                        </div>
                                                                        <div>
                                                                            <button type="submit"
                                                                                class="btn btn-danger w-100">Update</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- view items  --}}
                                                <div class="modal fade" id="viewModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative"
                                                                id="printableArea{{ $order->id }}">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <h1 class="text-center">Invoice</h1>
                                                                <hr>
                                                                <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                <p class="mb-0">Customer Name: {{ $order->first_name }}
                                                                    {{ $order->last_name }}</p>
                                                                <p class="mb-0">Address: {{ $order->address }}</p>
                                                                <p class="mb-0">City/Town: {{ $order->city }}</p>
                                                                <p>Country: Bangladesh</p>

                                                                @foreach ($order->orderItems as $item)
                                                                    <div class="d-flex align-items-top p-2">
                                                                        <img src="/products/{{ $item->image }}"
                                                                            alt="" class="img-fluid me-3"
                                                                            style="height: 70px; width:70px;object-fit: cover;">
                                                                        <div class="bordered-1 w-100">
                                                                            <div class="text-wrap text-danger fw-bold w-100"
                                                                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                {{ $item->title }} <br>
                                                                            </div>
                                                                            <p class="text-end">
                                                                                {{ number_format($item->price, 2) }}TK-
                                                                                x{{ $item->quantity }} - Subtotal:<span
                                                                                    class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                    TK</span> </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <hr>
                                                                <p class="fw-bold text-end mb-1">Shipping:
                                                                    {{ number_format($order->shipping, 2) }} TK</p>
                                                                <p class="fw-bold text-end mb-1">Item total:
                                                                    {{ number_format($order->subtotal, 2) }} TK</p>
                                                                <hr>
                                                                <p class="fw-bold text-end">Subtotal:
                                                                    {{ number_format($order->total, 2) }} TK</p>

                                                                <button class="btn btn-primary mx-auto"
                                                                    onclick="printDiv('printableArea{{ $order->id }}')"
                                                                    id="print">Print</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $ConfirmOrders->links('vendors.custom-pagination') }}
                        </div>
                    </div>
                    <div id="cancel" class="tab-pane ">
                        <div class="table-responsive">
                            <table class="table table-hover no-wrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer Details</th>
                                        <th>Address</th>
                                        <th>Subtotal</th>
                                        <th>Payment</th>
                                        <th>Payment Type</th>
                                        <th>Order Note</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($CancelOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_id }}</td>
                                            <td>
                                                <p class="mb-1"><Strong>Name: </Strong> {{ $order->first_name }}
                                                    {{ $order->last_name }}</p>
                                                <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}</p>
                                                <hr>
                                                <p class="mb-1"><Strong>ID: </Strong>
                                                    {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                <p class="mb-1"><Strong>Name: </Strong>
                                                    {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                <p class="mb-1"><strong>Email:
                                                    </strong>{{ $order->user ? $order->user->email : 'Guest User' }}</p>

                                            </td>
                                            <td>
                                                <p class="mb-1"><Strong>Address: </Strong> {{ $order->address }} </p>
                                                <p class="mb-1">{{ $order->address_line }}, {{ $order->postal_code }}
                                                </p>
                                                <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                            </td>
                                            <td>
                                                <p class="mb-1"><strong>Item
                                                        Total: </strong>{{ number_format($order->subtotal, 2) }} TK</p>
                                                <p class="mb-1">
                                                    <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }} TK
                                                </p>
                                                <p class="mb-1"><strong>Sub total: </strong>
                                                    {{ number_format($order->total, 2) }} TK</p>
                                            </td>
                                            <td>
                                                @if ($order->payment_status == 1)
                                                    <span class="badge bg-success text-white fw-bold">Paid</span>
                                                @else
                                                    <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->order_note }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->remark }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $order->id }}"><i
                                                            class="fa-solid fa-pen-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $order->id }}"><i
                                                            class="fa-regular fa-eye"></i></button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <form action="{{ url('/admin/order_update') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <h5> New orders</h5>
                                                                        <hr>

                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $order->id }}">
                                                                            <label for="" class="mb-2">Payemnt
                                                                                status</label>
                                                                            <select name="payment_status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                <option value="0"
                                                                                    @if ($order->payment_status == 0) selected @endif>
                                                                                    Unpaid</option>
                                                                                <option value="1"
                                                                                    @if ($order->payment_status == 1) selected @endif>
                                                                                    Paid</option>
                                                                            </select>
                                                                            <label for="" class="mb-2">Order
                                                                                status</label>
                                                                            <select name="status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                    <option value="{{ $key }}"
                                                                                        @if ($order->status == $key) selected @endif>
                                                                                        {{ $status }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="remark"
                                                                                class="d-block mb-2">Remark</label>
                                                                            <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                        </div>
                                                                        <div>
                                                                            <button type="submit"
                                                                                class="btn btn-danger w-100">Update</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- view items  --}}
                                                <div class="modal fade" id="viewModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative"
                                                                id="printableArea{{ $order->id }}">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <h1 class="text-center">Invoice</h1>
                                                                <hr>
                                                                <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                <p class="mb-0">Customer Name: {{ $order->first_name }}
                                                                    {{ $order->last_name }}</p>
                                                                <p class="mb-0">Address: {{ $order->address }}</p>
                                                                <p class="mb-0">City/Town: {{ $order->city }}</p>
                                                                <p>Country: Bangladesh</p>

                                                                @foreach ($order->orderItems as $item)
                                                                    <div class="d-flex align-items-top p-2">
                                                                        <img src="/products/{{ $item->image }}"
                                                                            alt="" class="img-fluid me-3"
                                                                            style="height: 70px; width:70px;object-fit: cover;">
                                                                        <div class="bordered-1 w-100">
                                                                            <div class="text-wrap text-danger fw-bold w-100"
                                                                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                {{ $item->title }} <br>
                                                                            </div>
                                                                            <p class="text-end">
                                                                                {{ number_format($item->price, 2) }}TK-
                                                                                x{{ $item->quantity }} - Subtotal:<span
                                                                                    class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                    TK</span> </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <hr>
                                                                <p class="fw-bold text-end mb-1">Shipping:
                                                                    {{ number_format($order->shipping, 2) }} TK</p>
                                                                <p class="fw-bold text-end mb-1">Item total:
                                                                    {{ number_format($order->subtotal, 2) }} TK</p>
                                                                <hr>
                                                                <p class="fw-bold text-end">Subtotal:
                                                                    {{ number_format($order->total, 2) }} TK</p>

                                                                <button class="btn btn-primary mx-auto"
                                                                    onclick="printDiv('printableArea{{ $order->id }}')"
                                                                    id="print">Print</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $CancelOrders->links('vendors.custom-pagination') }}
                        </div>
                    </div>
                    <div id="return" class="tab-pane ">
                        <div class="table-responsive">
                            <table class="table table-hover no-wrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer Details</th>
                                        <th>Address</th>
                                        <th>Subtotal</th>
                                        <th>Payment</th>
                                        <th>Payment Type</th>
                                        <th>Order Note</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ReturnOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_id }}</td>
                                            <td>
                                                <p class="mb-1"><Strong>Name: </Strong> {{ $order->first_name }}
                                                    {{ $order->last_name }}</p>
                                                <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}</p>
                                                <hr>
                                                <p class="mb-1"><Strong>ID: </Strong>
                                                    {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                <p class="mb-1"><Strong>Name: </Strong>
                                                    {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                <p class="mb-1"><strong>Email:
                                                    </strong>{{ $order->user ? $order->user->email : 'Guest User' }}</p>

                                            </td>
                                            <td>
                                                <p class="mb-1"><Strong>Address: </Strong> {{ $order->address }} </p>
                                                <p class="mb-1">{{ $order->address_line }}, {{ $order->postal_code }}
                                                </p>
                                                <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                            </td>
                                            <td>
                                                <p class="mb-1"><strong>Item
                                                        Total: </strong>{{ number_format($order->subtotal, 2) }} TK</p>
                                                <p class="mb-1">
                                                    <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }} TK
                                                </p>
                                                <p class="mb-1"><strong>Sub total: </strong>
                                                    {{ number_format($order->total, 2) }} TK</p>
                                            </td>
                                            <td>
                                                @if ($order->payment_status == 1)
                                                    <span class="badge bg-success text-white fw-bold">Paid</span>
                                                @else
                                                    <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->order_note }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->remark }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $order->id }}"><i
                                                            class="fa-solid fa-pen-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $order->id }}"><i
                                                            class="fa-regular fa-eye"></i></button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <form action="{{ url('/admin/order_update') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <h5> New orders</h5>
                                                                        <hr>

                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $order->id }}">
                                                                            <label for="" class="mb-2">Payemnt
                                                                                status</label>
                                                                            <select name="payment_status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                <option value="0"
                                                                                    @if ($order->payment_status == 0) selected @endif>
                                                                                    Unpaid</option>
                                                                                <option value="1"
                                                                                    @if ($order->payment_status == 1) selected @endif>
                                                                                    Paid</option>
                                                                            </select>
                                                                            <label for="" class="mb-2">Order
                                                                                status</label>
                                                                            <select name="status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                    <option value="{{ $key }}"
                                                                                        @if ($order->status == $key) selected @endif>
                                                                                        {{ $status }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="remark"
                                                                                class="d-block mb-2">Remark</label>
                                                                            <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                        </div>
                                                                        <div>
                                                                            <button type="submit"
                                                                                class="btn btn-danger w-100">Update</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- view items  --}}
                                                <div class="modal fade" id="viewModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative"
                                                                id="printableArea{{ $order->id }}">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <h1 class="text-center">Invoice</h1>
                                                                <hr>
                                                                <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                <p class="mb-0">Customer Name: {{ $order->first_name }}
                                                                    {{ $order->last_name }}</p>
                                                                <p class="mb-0">Address: {{ $order->address }}</p>
                                                                <p class="mb-0">City/Town: {{ $order->city }}</p>
                                                                <p>Country: Bangladesh</p>

                                                                @foreach ($order->orderItems as $item)
                                                                    <div class="d-flex align-items-top p-2">
                                                                        <img src="/products/{{ $item->image }}"
                                                                            alt="" class="img-fluid me-3"
                                                                            style="height: 70px; width:70px;object-fit: cover;">
                                                                        <div class="bordered-1 w-100">
                                                                            <div class="text-wrap text-danger fw-bold w-100"
                                                                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                {{ $item->title }} <br>
                                                                            </div>
                                                                            <p class="text-end">
                                                                                {{ number_format($item->price, 2) }}TK-
                                                                                x{{ $item->quantity }} - Subtotal:<span
                                                                                    class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                    TK</span> </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <hr>
                                                                <p class="fw-bold text-end mb-1">Shipping:
                                                                    {{ number_format($order->shipping, 2) }} TK</p>
                                                                <p class="fw-bold text-end mb-1">Item total:
                                                                    {{ number_format($order->subtotal, 2) }} TK</p>
                                                                <hr>
                                                                <p class="fw-bold text-end">Subtotal:
                                                                    {{ number_format($order->total, 2) }} TK</p>

                                                                <button class="btn btn-primary mx-auto"
                                                                    onclick="printDiv('printableArea{{ $order->id }}')"
                                                                    id="print">Print</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $ReturnOrders->links('vendors.custom-pagination') }}
                        </div>
                    </div>
                    <div id="bookCurier" class="tab-pane ">
                        <div class="table-responsive">
                            <table class="table table-hover no-wrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking ID</th>
                                        <th>Customer Details</th>
                                        <th>Address</th>
                                        <th>Subtotal</th>
                                        <th>Payment</th>
                                        <th>Payment Type</th>
                                        <th>Order Note</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($BookToCourierOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_id }}</td>
                                            <td>
                                                <p class="mb-1"><Strong>Name: </Strong> {{ $order->first_name }}
                                                    {{ $order->last_name }}</p>
                                                <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}</p>
                                                <hr>
                                                <p class="mb-1"><Strong>ID: </Strong>
                                                    {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                <p class="mb-1"><Strong>Name: </Strong>
                                                    {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                <p class="mb-1"><strong>Email:
                                                    </strong>{{ $order->user ? $order->user->email : 'Guest User' }}</p>

                                            </td>
                                            <td>
                                                <p class="mb-1"><Strong>Address: </Strong> {{ $order->address }} </p>
                                                <p class="mb-1">{{ $order->address_line }}, {{ $order->postal_code }}
                                                </p>
                                                <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                            </td>
                                            <td>
                                                <p class="mb-1"><strong>Item
                                                        Total: </strong>{{ number_format($order->subtotal, 2) }} TK</p>
                                                <p class="mb-1">
                                                    <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }} TK
                                                </p>
                                                <p class="mb-1"><strong>Sub total: </strong>
                                                    {{ number_format($order->total, 2) }} TK</p>
                                            </td>
                                            <td>
                                                @if ($order->payment_status == 1)
                                                    <span class="badge bg-success text-white fw-bold">Paid</span>
                                                @else
                                                    <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->order_note }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-wrap"
                                                    style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                    {{ $order->remark }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $order->id }}"><i
                                                            class="fa-solid fa-pen-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $order->id }}"><i
                                                            class="fa-regular fa-eye"></i></button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <form action="{{ url('/admin/order_update') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <h5> New orders</h5>
                                                                        <hr>

                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $order->id }}">
                                                                            <label for="" class="mb-2">Payemnt
                                                                                status</label>
                                                                            <select name="payment_status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                <option value="0"
                                                                                    @if ($order->payment_status == 0) selected @endif>
                                                                                    Unpaid</option>
                                                                                <option value="1"
                                                                                    @if ($order->payment_status == 1) selected @endif>
                                                                                    Paid</option>
                                                                            </select>
                                                                            <label for="" class="mb-2">Order
                                                                                status</label>
                                                                            <select name="status" id=""
                                                                                class="form-control w-100 d-block mb-3">
                                                                                @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                    <option value="{{ $key }}"
                                                                                        @if ($order->status == $key) selected @endif>
                                                                                        {{ $status }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="remark"
                                                                                class="d-block mb-2">Remark</label>
                                                                            <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                        </div>
                                                                        <div>
                                                                            <button type="submit"
                                                                                class="btn btn-danger w-100">Update</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- view items  --}}
                                                <div class="modal fade" id="viewModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content p-4">
                                                            <div class="modal-body position-relative"
                                                                id="printableArea{{ $order->id }}">
                                                                <i class="fa-solid fa-x position-absolute"
                                                                    style="right: 3px; top: 3px;cursor: pointer;"
                                                                    data-bs-dismiss="modal" aria-label="Close"></i>
                                                                <h1 class="text-center">Invoice</h1>
                                                                <hr>
                                                                <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                <p class="mb-0">Customer Name: {{ $order->first_name }}
                                                                    {{ $order->last_name }}</p>
                                                                <p class="mb-0">Address: {{ $order->address }}</p>
                                                                <p class="mb-0">City/Town: {{ $order->city }}</p>
                                                                <p>Country: Bangladesh</p>

                                                                @foreach ($order->orderItems as $item)
                                                                    <div class="d-flex align-items-top p-2">
                                                                        <img src="/products/{{ $item->image }}"
                                                                            alt="" class="img-fluid me-3"
                                                                            style="height: 70px; width:70px;object-fit: cover;">
                                                                        <div class="bordered-1 w-100">
                                                                            <div class="text-wrap text-danger fw-bold w-100"
                                                                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                {{ $item->title }} <br>
                                                                            </div>
                                                                            <p class="text-end">
                                                                                {{ number_format($item->price, 2) }}TK-
                                                                                x{{ $item->quantity }} - Subtotal:<span
                                                                                    class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                    TK</span> </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <hr>
                                                                <p class="fw-bold text-end mb-1">Shipping:
                                                                    {{ number_format($order->shipping, 2) }} TK</p>
                                                                <p class="fw-bold text-end mb-1">Item total:
                                                                    {{ number_format($order->subtotal, 2) }} TK</p>
                                                                <hr>
                                                                <p class="fw-bold text-end">Subtotal:
                                                                    {{ number_format($order->total, 2) }} TK</p>

                                                                <button class="btn btn-primary mx-auto"
                                                                    onclick="printDiv('printableArea{{ $order->id }}')"
                                                                    id="print">Print</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $BookToCourierOrders->links('vendors.custom-pagination') }}
                        </div>
                    </div>
                    <div id="deliver" class="tab-pane ">


                        <ul class="nav nav-pills m-t-30 m-b-30">
                            <li class=" nav-item"> <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                    aria-expanded="false">UnPaid({{ count($unpaidDeliveredOrders) }})</a> </li>
                            <li class="nav-item"> <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                    aria-expanded="false">Paid({{ count($PaidDeliveredOrders) }})</a> </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="navpills-1" class="tab-pane active">

                                <div class="table-responsive">
                                    <table class="table table-hover no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Tracking ID</th>
                                                <th>Customer Details</th>
                                                <th>Address</th>
                                                <th>Subtotal</th>
                                                <th>Payment</th>
                                                <th>Payment Type</th>
                                                <th>Order Note</th>
                                                <th>Remark</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($unpaidDeliveredOrders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->tracking_id }}</td>
                                                    <td>
                                                        <p class="mb-1"><Strong>Name: </Strong>
                                                            {{ $order->first_name }}
                                                            {{ $order->last_name }}</p>
                                                        <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}
                                                        </p>
                                                        <hr>
                                                        <p class="mb-1"><Strong>ID: </Strong>
                                                            {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                        <p class="mb-1"><Strong>Name: </Strong>
                                                            {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                        <p class="mb-1"><strong>Email:
                                                            </strong>{{ $order->user ? $order->user->email : 'Guest User' }}
                                                        </p>

                                                    </td>
                                                    <td>
                                                        <p class="mb-1"><Strong>Address: </Strong>
                                                            {{ $order->address }} </p>
                                                        <p class="mb-1">{{ $order->address_line }},
                                                            {{ $order->postal_code }}
                                                        </p>
                                                        <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-1"><strong>Item
                                                                Total: </strong>{{ number_format($order->subtotal, 2) }} TK
                                                        </p>
                                                        <p class="mb-1">
                                                            <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }}
                                                            TK
                                                        </p>
                                                        <p class="mb-1"><strong>Sub total: </strong>
                                                            {{ number_format($order->total, 2) }} TK</p>
                                                    </td>
                                                    <td>
                                                        @if ($order->payment_status == 1)
                                                            <span class="badge bg-success text-white fw-bold">Paid</span>
                                                        @else
                                                            <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>
                                                        <div class="text-wrap"
                                                            style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                            {{ $order->order_note }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-wrap"
                                                            style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                            {{ $order->remark }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#editModal{{ $order->id }}"><i
                                                                    class="fa-solid fa-pen-square"></i></button>
                                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                                data-bs-target="#viewModal{{ $order->id }}"><i
                                                                    class="fa-regular fa-eye"></i></button>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editModal{{ $order->id }}"
                                                            tabindex="-1" aria-labelledby="editModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content p-4">
                                                                    <div class="modal-body position-relative">
                                                                        <i class="fa-solid fa-x position-absolute"
                                                                            style="right: 3px; top: 3px;cursor: pointer;"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></i>
                                                                        <form action="{{ url('/admin/order_update') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <h5> New orders</h5>
                                                                                <hr>

                                                                                <div class="mb-3">
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $order->id }}">
                                                                                    <label for=""
                                                                                        class="mb-2">Payemnt
                                                                                        status</label>
                                                                                    <select name="payment_status"
                                                                                        id=""
                                                                                        class="form-control w-100 d-block mb-3">
                                                                                        <option value="0"
                                                                                            @if ($order->payment_status == 0) selected @endif>
                                                                                            Unpaid</option>
                                                                                        <option value="1"
                                                                                            @if ($order->payment_status == 1) selected @endif>
                                                                                            Paid</option>
                                                                                    </select>
                                                                                    <label for=""
                                                                                        class="mb-2">Order
                                                                                        status</label>
                                                                                    <select name="status" id=""
                                                                                        class="form-control w-100 d-block mb-3">
                                                                                        @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                            <option
                                                                                                value="{{ $key }}"
                                                                                                @if ($order->status == $key) selected @endif>
                                                                                                {{ $status }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <label for="remark"
                                                                                        class="d-block mb-2">Remark</label>
                                                                                    <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                                </div>
                                                                                <div>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger w-100">Update</button>
                                                                                </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- view items  --}}
                                                        <div class="modal fade" id="viewModal{{ $order->id }}"
                                                            tabindex="-1" aria-labelledby="editModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content p-4">
                                                                    <div class="modal-body position-relative"
                                                                        id="printableArea{{ $order->id }}">
                                                                        <i class="fa-solid fa-x position-absolute"
                                                                            style="right: 3px; top: 3px;cursor: pointer;"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></i>
                                                                        <h1 class="text-center">Invoice</h1>
                                                                        <hr>
                                                                        <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                        <p class="mb-0">Customer Name:
                                                                            {{ $order->first_name }}
                                                                            {{ $order->last_name }}</p>
                                                                        <p class="mb-0">Address: {{ $order->address }}
                                                                        </p>
                                                                        <p class="mb-0">City/Town: {{ $order->city }}
                                                                        </p>
                                                                        <p>Country: Bangladesh</p>

                                                                        @foreach ($order->orderItems as $item)
                                                                            <div class="d-flex align-items-top p-2">
                                                                                <img src="/products/{{ $item->image }}"
                                                                                    alt="" class="img-fluid me-3"
                                                                                    style="height: 70px; width:70px;object-fit: cover;">
                                                                                <div class="bordered-1 w-100">
                                                                                    <div class="text-wrap text-danger fw-bold w-100"
                                                                                        style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                        {{ $item->title }} <br>
                                                                                    </div>
                                                                                    <p class="text-end">
                                                                                        {{ number_format($item->price, 2) }}TK-
                                                                                        x{{ $item->quantity }} -
                                                                                        Subtotal:<span
                                                                                            class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                            TK</span> </p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        <hr>
                                                                        <p class="fw-bold text-end mb-1">Shipping:
                                                                            {{ number_format($order->shipping, 2) }} TK
                                                                        </p>
                                                                        <p class="fw-bold text-end mb-1">Item total:
                                                                            {{ number_format($order->subtotal, 2) }} TK
                                                                        </p>
                                                                        <hr>
                                                                        <p class="fw-bold text-end">Subtotal:
                                                                            {{ number_format($order->total, 2) }} TK</p>

                                                                        <button class="btn btn-primary mx-auto"
                                                                            onclick="printDiv('printableArea{{ $order->id }}')"
                                                                            id="print">Print</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $unpaidDeliveredOrders->links('vendors.custom-pagination') }}
                                </div>
                            </div>
                            <div id="navpills-2" class="tab-pane">
                                <div class="table-responsive">
                                    <table class="table table-hover no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Tracking ID</th>
                                                <th>Customer Details</th>
                                                <th>Address</th>
                                                <th>Subtotal</th>
                                                <th>Payment</th>
                                                <th>Payment Type</th>
                                                <th>Order Note</th>
                                                <th>Remark</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PaidDeliveredOrders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->tracking_id }}</td>
                                                    <td>
                                                        <p class="mb-1"><Strong>Name: </Strong>
                                                            {{ $order->first_name }}
                                                            {{ $order->last_name }}</p>
                                                        <p class="mb-1"><strong>Mobile: </strong>{{ $order->mobile }}
                                                        </p>
                                                        <hr>
                                                        <p class="mb-1"><Strong>ID: </Strong>
                                                            {{ $order->user ? $order->user->id : 'Guest User' }} </p>
                                                        <p class="mb-1"><Strong>Name: </Strong>
                                                            {{ $order->user ? $order->user->name : 'Guest User' }} </p>
                                                        <p class="mb-1"><strong>Email:
                                                            </strong>{{ $order->user ? $order->user->email : 'Guest User' }}
                                                        </p>

                                                    </td>
                                                    <td>
                                                        <p class="mb-1"><Strong>Address: </Strong>
                                                            {{ $order->address }} </p>
                                                        <p class="mb-1">{{ $order->address_line }},
                                                            {{ $order->postal_code }}
                                                        </p>
                                                        <p class="mb-1">{{ $order->city }},Bangladesh</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-1"><strong>Item
                                                                Total: </strong>{{ number_format($order->subtotal, 2) }} TK
                                                        </p>
                                                        <p class="mb-1">
                                                            <strong>Shipping: </strong>{{ number_format($order->shipping, 2) }}
                                                            TK
                                                        </p>
                                                        <p class="mb-1"><strong>Sub total: </strong>
                                                            {{ number_format($order->total, 2) }} TK</p>
                                                    </td>
                                                    <td>
                                                        @if ($order->payment_status == 1)
                                                            <span class="badge bg-success text-white fw-bold">Paid</span>
                                                        @else
                                                            <span class="badge bg-danger text-white fw-bold">Unpaid</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>
                                                        <div class="text-wrap"
                                                            style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                            {{ $order->order_note }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-wrap"
                                                            style="width: 300px;height:150px; overflow-y: auto; border: 1px solid;padding:3px; scrollbar-width: 2px;">
                                                            {{ $order->remark }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#editModal{{ $order->id }}"><i
                                                                    class="fa-solid fa-pen-square"></i></button>
                                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                                data-bs-target="#viewModal{{ $order->id }}"><i
                                                                    class="fa-regular fa-eye"></i></button>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editModal{{ $order->id }}"
                                                            tabindex="-1" aria-labelledby="editModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content p-4">
                                                                    <div class="modal-body position-relative">
                                                                        <i class="fa-solid fa-x position-absolute"
                                                                            style="right: 3px; top: 3px;cursor: pointer;"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></i>
                                                                        <form action="{{ url('/admin/order_update') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <h5> New orders</h5>
                                                                                <hr>

                                                                                <div class="mb-3">
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $order->id }}">
                                                                                    <label for=""
                                                                                        class="mb-2">Payemnt
                                                                                        status</label>
                                                                                    <select name="payment_status"
                                                                                        id=""
                                                                                        class="form-control w-100 d-block mb-3">
                                                                                        <option value="0"
                                                                                            @if ($order->payment_status == 0) selected @endif>
                                                                                            Unpaid</option>
                                                                                        <option value="1"
                                                                                            @if ($order->payment_status == 1) selected @endif>
                                                                                            Paid</option>
                                                                                    </select>
                                                                                    <label for=""
                                                                                        class="mb-2">Order
                                                                                        status</label>
                                                                                    <select name="status" id=""
                                                                                        class="form-control w-100 d-block mb-3">
                                                                                        @foreach ([1 => 'New order', 2 => 'Confirm', 3 => 'Cancel', 4 => 'Return', 5 => 'Recontact', 6 => 'Book to the courier', 7 => 'Delivered'] as $key => $status)
                                                                                            <option
                                                                                                value="{{ $key }}"
                                                                                                @if ($order->status == $key) selected @endif>
                                                                                                {{ $status }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <label for="remark"
                                                                                        class="d-block mb-2">Remark</label>
                                                                                    <textarea name="remark" id="remark" cols="30" rows="6" class="form-control mb-3">{{ $order->remark }}</textarea>
                                                                                </div>
                                                                                <div>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger w-100">Update</button>
                                                                                </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- view items  --}}
                                                        <div class="modal fade" id="viewModal{{ $order->id }}"
                                                            tabindex="-1" aria-labelledby="editModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content p-4">
                                                                    <div class="modal-body position-relative"
                                                                        id="printableArea{{ $order->id }}">
                                                                        <i class="fa-solid fa-x position-absolute"
                                                                            style="right: 3px; top: 3px;cursor: pointer;"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></i>
                                                                        <h1 class="text-center">Invoice</h1>
                                                                        <hr>
                                                                        <h3>Tracking Id : {{ $order->tracking_id }}</h3>
                                                                        <p class="mb-0">Customer Name:
                                                                            {{ $order->first_name }}
                                                                            {{ $order->last_name }}</p>
                                                                        <p class="mb-0">Address: {{ $order->address }}
                                                                        </p>
                                                                        <p class="mb-0">City/Town: {{ $order->city }}
                                                                        </p>
                                                                        <p>Country: Bangladesh</p>

                                                                        @foreach ($order->orderItems as $item)
                                                                            <div class="d-flex align-items-top p-2">
                                                                                <img src="/products/{{ $item->image }}"
                                                                                    alt="" class="img-fluid me-3"
                                                                                    style="height: 70px; width:70px;object-fit: cover;">
                                                                                <div class="bordered-1 w-100">
                                                                                    <div class="text-wrap text-danger fw-bold w-100"
                                                                                        style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                                                        {{ $item->title }} <br>
                                                                                    </div>
                                                                                    <p class="text-end">
                                                                                        {{ number_format($item->price, 2) }}TK-
                                                                                        x{{ $item->quantity }} -
                                                                                        Subtotal:<span
                                                                                            class="text-dark fw-bold">{{ number_format($item->subtotal, 2) }}
                                                                                            TK</span> </p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        <hr>
                                                                        <p class="fw-bold text-end mb-1">Shipping:
                                                                            {{ number_format($order->shipping, 2) }} TK
                                                                        </p>
                                                                        <p class="fw-bold text-end mb-1">Item total:
                                                                            {{ number_format($order->subtotal, 2) }} TK
                                                                        </p>
                                                                        <hr>
                                                                        <p class="fw-bold text-end">Subtotal:
                                                                            {{ number_format($order->total, 2) }} TK</p>

                                                                        <button class="btn btn-primary mx-auto"
                                                                            onclick="printDiv('printableArea{{ $order->id }}')"
                                                                            id="print">Print</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $PaidDeliveredOrders->links('vendors.custom-pagination') }}
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
    <script>
        function printDiv(divId) {
            const divElement = document.getElementById(divId);
            if (!divElement) {
                console.error(`Element with ID ${divId} not found.`);
                return; // Exit the function if the element doesn't exist
            }

            const divContents = divElement.innerHTML;
            const printWindow = window.open('', '_blank', 'width=800,height=600');

            printWindow.document.write(`
        <html>
        <head>
            <title>Print</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                body { font-family: Arial, sans-serif; }
                .table { width: 100%; margin-bottom: 1rem; color: #212529; }
                .table th, .table td { padding: .75rem; vertical-align: top; border: 1px solid #dee2e6; }
                .text-end { text-align: end; }
                .fw-bold { font-weight: bold; }
                @media print {
                    button { display: none; } /* Hide button during print */
                }
            </style>
        </head>
        <body>
            <div class="container">
                ${divContents}
            </div>
        </body>
        </html>
    `);

            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endsection
