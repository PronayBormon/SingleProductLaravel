@extends('Auth.master')
@section('content')
    <!-- Banner -->
    <section class="banner about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="text-center">
                        <h2 class="banner-title">Login</h2>
                        <nav aria-label="breadcrumb" class="d-flex justify-content-center fast-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner -->

    <!-- Login -->
    <section class="login-wrapper">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            <ul style="list-style: none; padding: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="order-summary-wrapper">
                        <h2 class="checkout-form-title">Login</h2>
                        <p>Login if you are a returning customer.</p>
                        <form action="{{ url('user-login') }}" method="POST">
                            @csrf
                            <input class="form-control checkout-form-input mt-3 @error('email') is-invalid @enderror" 
                                   type="email" 
                                   placeholder="Email Address" 
                                   name="email" 
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <input class="form-control checkout-form-input mt-3 @error('password') is-invalid @enderror" 
                                   type="password" 
                                   placeholder="Password" 
                                   name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="d-flex justify-content-between">
                                <div class="form-check mt-3 checkout-form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                                <div class="mt-3 checkout-form-text">
                                    <a href="{{ url('forget-password') }}">Forgot Your Password?</a>
                                </div>
                            </div>

                            <div class="mt-4 checkout-btn-list">
                                <button type="submit" class="btn btn-teritary-fast w-100">Login</button>
                            </div>
                            <p class="checkout-form-text mt-4 text-end">Don't Have an Account? <a href="{{ url('/register') }}">Sign up now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login -->
@endsection
