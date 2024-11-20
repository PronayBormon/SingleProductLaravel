<?php
    
use App\Models\Order;
use App\Models\User;
use App\Models\Products;
use App\Models\ContactUs;

$users = User::get();
$Order = Order::get();
$Products = Products::get();
$contact = ContactUs::first();


    $products = Products::orderby('id', 'desc')->where('status', 1)->limit(2)->get();
    $orders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',1)->paginate(10);
    $ConfirmOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',2)->paginate(10);
    $CancelOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',3)->paginate(10);
    $ReturnOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',4)->paginate(10);
    $RecontactOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',5)->paginate(10);
    $BookToCourierOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',6)->paginate(10);
    $DeliveredOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',7)->paginate(10);
    $unpaidDeliveredOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',7)->where('payment_status',0)->paginate(10);
    $PaidDeliveredOrders = Order::with('orderItems','user')->orderBy('id', 'desc')->where('status',7)->where('payment_status',1)->paginate(10);





?>

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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white ms-2"><i
                            class="fa fa-plus-circle"></i> Create New</button> --}}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->

        <div class="row g-0">

            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="icon-note"></i></h3>
                                        <p class="text-muted">Total Orders</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-success">{{count($Order)}}</h2>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fa-regular fa-truck"></i></h3>
                                        <p class="text-muted">Paid Delivered Orders</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($PaidDeliveredOrders)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fa-regular fa-truck"></i></h3>
                                        <p class="text-muted">Unpaid Delivered Orders</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($unpaidDeliveredOrders)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fa-regular fa-truck"></i></h3>
                                        <p class="text-muted">Delivered Orders</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($DeliveredOrders)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fa-regular fa-cube"></i></h3>
                                        <p class="text-muted">Book For Couriers Orders</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($BookToCourierOrders)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fa-regular fa-boxes-stacked"></i></h3>
                                        <p class="text-muted">Return Orders</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($ReturnOrders)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fa-regular fa-boxes-stacked"></i></h3>
                                        <p class="text-muted">Cancel Orders </p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($CancelOrders)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fa-regular fa-box"></i></h3>
                                        <p class="text-muted">Confirm Orders</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($ConfirmOrders)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="icon-user"></i></h3>
                                        <p class="text-muted">Total User</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-primary">{{count($users)}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="icon-bag"></i></h3>
                                        <p class="text-muted">Products</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-cyan">{{count($Products)}}</h2>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="icon-doc"></i></h3>
                                        <p class="text-muted">NEW INVOICES</p>
                                    </div>
                                    <div class="ms-auto">
                                        <h2 class="counter text-purple">157</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
