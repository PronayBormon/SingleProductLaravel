@extends('Auth.master')
@section('content')
<!-- Banner -->
<section class="banner about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="text-center">
                    <h2 class="banner-title">Register</h2>
                    <nav aria-label="breadcrumb" class="d-flex justify-content-center fast-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner -->

<!-- Register -->
<section class="login-wrapper">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">



                <div class="order-summary-wrapper">
                    <h2 class="checkout-form-title">Create an Account</h2>
                    <p>Register here if you are a new customer.</p>
                    <form action="{{ url('/newUsers') }}" method="post">
                        @csrf

                        <input class="form-control checkout-form-input mt-3 @error('name') is-invalid @enderror"
                            type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <input class="form-control checkout-form-input mt-3 @error('email') is-invalid @enderror"
                            type="email" placeholder="Email Address" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <input class="form-control checkout-form-input mt-3 @error('password') is-invalid @enderror"
                            type="password" placeholder="Password" name="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <input class="form-control checkout-form-input mt-3" type="password"
                            placeholder="Confirm Password" name="password_confirmation">

                        <div class="mt-4 checkout-btn-list">
                            <button type="submit" class="btn btn-teritary-fast w-100">Submit & Register</button>
                        </div>

                        <div class="form-check mt-3 checkout-form-check">
                            <input class="form-check-input" type="checkbox" required value="" id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                I have read and agree to the terms & conditions
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Register -->
@endsection