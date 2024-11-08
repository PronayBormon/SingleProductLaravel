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
                    <table class="table table-hover no-wrap">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Tracking ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Subtotal</th>
                                <th>Shipping</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tracking_id }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->mobile }}</td>
                                    <td>{{ $order->city }}</td>
                                    <td class="text-center"><span
                                            class="badge bg-success fw-bold">{{ $order->payment_method }}</span></td>
                                    <td class=" ">
                                        @if ($order->payment_status == 1)
                                            <span class="badge bg-success fw-bold">Paid</span>
                                        @else
                                            <span class="badge bg-danger fw-bold">Unpaid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->status == 1)
                                            <span class="badge bg-primary">Pending</span>
                                        @elseif($order->status == 2)
                                            <span class="badge bg-danger">Cancel</span>
                                        @elseif($order->status == 3)
                                            <span class="badge bg-warning text-black" style="color: black;">Out For
                                                delivery</span>
                                        @elseif($order->status == 4)
                                            <span class="badge bg-danger">Return</span>
                                        @elseif($order->status == 5)
                                            <span class="badge bg-success">Delivered</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($order->subtotal, 2) }} TK</td>
                                    <td>{{ number_format($order->shipping, 2) }} TK</td>
                                    <td>{{ number_format($order->total, 2) }} TK</td>
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
                                                        <form
                                                            action="{{ url('/admin/order_update') }}"
                                                            method="POST">
                                                            @csrf
                                                            <h5>Update Order and payment status</h5>
                                                            <hr>
                                                            <div class="mb-3">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $order->id }}">
                                                                <label for="" class="mb-2">Payemnt status</label>
                                                                <select name="payment_status" id="" class="form-control w-100 d-block mb-3">
                                                                    <option value="0" @if ($order->payment_status == 0) selected @endif>Unpaid</option>
                                                                    <option value="1" @if ($order->payment_status == 1) selected @endif>Paid</option>
                                                                </select>
                                                                <label for="" class="mb-2">Order status</label>
                                                                <select name="status" id="" class="form-control w-100 d-block">
                                                                    <option value="1" disabled
                                                                        @if ($order->status == 1) selected @endif>
                                                                        Pending</option>
                                                                    <option value="2"
                                                                        @if ($order->status == 2) selected @endif>
                                                                        Cancel</option>
                                                                    <option value="3"
                                                                        @if ($order->status == 3) selected @endif>
                                                                        Out for delivery</option>
                                                                    <option value="4"
                                                                        @if ($order->status == 4) selected @endif>
                                                                        Return</option>
                                                                    <option value="5"
                                                                        @if ($order->status == 5) selected @endif>
                                                                        Delivered</option>
                                                                </select>
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
                                                    <div class="modal-body position-relative" id="printableArea{{ $order->id }}">
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
                                                                <img src="/products/{{ $item->image }}" alt=""
                                                                    class="img-fluid me-3"
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
