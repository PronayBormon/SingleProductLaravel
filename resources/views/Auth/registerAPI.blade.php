@extends('Auth.app')

@section('content')
<div class="container">
    <section class="p-3 p-md-4 p-xl-5 mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 text-center">
                                        <h4>Register a New Account</h4>
                                    </div>
                                </div>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="http://127.0.0.1:8000/api/add-account" method="POST" enctype="multipart/form-data">
                                {{-- @csrf --}}
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required>
                                            <label for="name" class="form-label">Names</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                                            <label for="email" class="form-label">Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating mb-3 position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                            <label for="password" class="form-label">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <i class="bi bi-eye-slash" style="position: absolute; right: 10px; top: 60%; transform: translateY(-60%);" type="button" id="togglePassword"></i>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating mb-3 position-relative">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                                            <label class="form-check-label text-secondary" for="remember_me">
                                                <span style="font-size: 14px">Agree with <a href="#">Terms & conditions</a> and <a href="#">privacy and policy</a></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Register Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-12">
                                    <p class="my-3 mt-1 text-center">Already have an account? <a href="{{ route('login') }}" class="link-secondary text-decoration-none">Login Here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $('#togglePassword').click(function() {
        const passwordInput = $('#password');
        const isPasswordVisible = passwordInput.attr('type') === 'text';
        
        // Toggle input type
        passwordInput.attr('type', isPasswordVisible ? 'password' : 'text');
        
        // Toggle button class
        $(this).toggleClass('bi-eye bi-eye-slash');
    });
</script>
@endsection
