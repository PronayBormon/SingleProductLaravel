@extends('master')
@section('content')
    <!-- Bannner -->
    <section class="banner about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="text-center">
                        <h2 class="banner-title">My Account</h2>
                        <nav aria-label="breadcrumb" class="d-flex justify-content-center fast-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Account</li>
                                {{-- {{$user}} --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bannner -->

    <!-- My account -->
    <section class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="pb-4">Hello, <span class="text-capitalize">{{$user->name}}</span> welcome to your dashboard!</p>
                </div>
            </div>

            <div class="my-account-card-wrapper">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="my-account-sidebar">
                            <h2 class="">My Profile</h2>
                            <ul class="list-unstyled my-account-list">
                                <li class="active"><a href="{{url('/user-profile')}}">Dashboard</a></li>
                                <li class=""><a href="{{url('/addresses')}}">Addresses</a></li>
                                {{-- <li class=""><a href="#">Wishlist</a></li> --}}
                                <li class="">
                                    <form action="{{route('logout')}}" method="post">
                                        @method('post')
                                        @csrf
                                        <button type="submit" class="bg-transparent border-0 text-dark">Logout</button>
                                    </form>
                                    {{-- <a href="#">Log Out</a> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-cart">
                            <h2 class="">Orders History</h2>
                            <div class="my-account-table-wrapper">
                                <table class="">
                                    <thead class="">
                                        <tr class="">
                                            <th class="">Order</th>
                                            <th class="">Date</th>
                                            <th class="">Payment Status</th>
                                            <th class="">Order Status</th>
                                            <th class="">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($orders as $item)
                                            <tr class="">
                                                <td class="">#{{ $item->tracking_id }}</td>
                                                <td class="">{{ date('M j Y', strtotime($item->created_at)) }}</td>
                                                <td class="">
                                                    @if ($item->payment_status == 1)
                                                        <span class="badge bg-success fw-bold">Paid</span>
                                                    @else
                                                        <span class="badge bg-danger fw-bold">Unpaid</span>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-primary">Pending</span>
                                                    @elseif($item->status == 2)
                                                        <span class="badge bg-danger">Cancel</span>
                                                    @elseif($item->status == 3)
                                                        <span class="badge bg-warning text-black" style="color: black;">Out
                                                            For
                                                            delivery</span>
                                                    @elseif($item->status == 4)
                                                        <span class="badge bg-danger">Return</span>
                                                    @elseif($item->status == 5)
                                                        <span class="badge bg-success">Delivered</span>
                                                    @endif
                                                </td>
                                                <td class="fw-bold">{{ $item->total }} TK</td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr class="">
                                            <td class="">#2024</td>
                                            <td class="">November 24, 2022</td>
                                            <td class="">Paid</td>
                                            <td class="">Fulfilled</td>
                                            <td class="">$44.00 USD</td>
                                        </tr> --}}
                                    </tbody>
                                </table>

                                {{ $orders->links("vendors.custom-pagination")}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My account -->
@endsection
