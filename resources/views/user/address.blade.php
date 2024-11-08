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
                    <p class="pb-4">Hello, <span class="text-capitalize">{{ $user->name }}</span> welcome to your
                        dashboard!</p>
                </div>
            </div>

            <div class="my-account-card-wrapper">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="my-account-sidebar">
                            <h2 class="">My Address</h2>
                            <ul class="list-unstyled my-account-list">
                                <li class=""><a href="{{ url('/user-profile') }}">Dashboard</a></li>
                                <li class="active"><a href="{{ url('/addresses') }}">Addresses</a></li>
                                <li class="">
                                    <form action="{{ route('logout') }}" method="post">
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
                            <form action="{{url('update_user')}}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name <span>*</span></label>
                                            <input type="text" required class="form-control checkout-form-input"
                                                value="{{ $user->name }}" name="first_name" id="firstname"
                                                placeholder="First Name">
                                            @error('firstname')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name <span>*</span></label>
                                            <input type="text" required class="form-control checkout-form-input"
                                                value="{{ $user->last_name }}" name="last_name" id="lastname"
                                                placeholder="Last Name">
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address <span>*</span></label>
                                            <input type="text" required class="form-control checkout-form-input mb-3"
                                                value="{{ $user->address }}" name="address" id="address"
                                                placeholder="Address">
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" class="form-control checkout-form-input" id="apartment"
                                                value="{{ $user->address_line }}" name="address_line"
                                                placeholder="Apartment, etc">
                                            @error('address_line')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile <span>*</span></label>
                                            <input type="text" required class="form-control checkout-form-input"
                                                value="{{ $user->mobile }}" name="mobile" id="mobile"
                                                placeholder="mobile">
                                            @error('mobile')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">Town/City <span>*</span></label>
                                            <input type="text" required class="form-control checkout-form-input"
                                                value="{{ $user->city }}" name="city" id="city"
                                                placeholder="city">
                                            @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Country/region <span>*</span></label>
                                            <select required class="form-select checkout-form-input" name="country"
                                                aria-label="Default select example">
                                                <option selected value="1">Bangladesh</option>
                                                {{-- <option value="1">United States</option>
                                            <option value="2">Netherlands</option>
                                            <option value="3">Islands</option> --}}
                                            </select>
                                            @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="postalcode" class="form-label">Postal Code <span>*</span></label>
                                            <input required type="text" class="form-control checkout-form-input"
                                                name="postal_code" id="postalcode" value="{{ $user->postal_code }}"
                                                placeholder="Postal Code">
                                            @error('postal_code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary-fast w-100 mt-3">Update Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My account -->
@endsection
