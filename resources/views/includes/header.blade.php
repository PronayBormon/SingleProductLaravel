    <!-- Header -->
    <header class="header">

        <nav class="navbar navbar-expand-lg fast-header fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/logo.png" class="img-fluid logo" alt="Fast Burner">
                </a>
                <div class="navbar-toggler fast-burger-menu btn-primary-fast" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <div class="d-flex align-items-center justify-content-center burger-menu">
                        <div>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about-us') }}">About us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ url('store') }}">Store</a>
                            {{-- <ul class="dropdown-menu dropdown-right">
                                <li class="drop-menu-item">
                                    <a href="{{ url('store') }}">Product List</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="{{ url('product-details') }}">Product Detail</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="{{ url('cart') }}">My Cart</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="{{ url('user-profile') }}">My Account</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="{{ url('checkout') }}">Checkout</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="login.html">Customer Login</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="registration.html">Customer Registration</a>
                                </li>
                            </ul> --}}
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link" href="blog.html">Blog <i class="fa-solid fa-chevron-down ps-2"></i></a>
                            <ul class="dropdown-menu dropdown-right">
                                <li class="drop-menu-item">
                                    <a href="blog.html">Blog with right sidebar</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="blog-left-sidebar.html">Blog with left sidebar</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="blog-no-sidebar.html">Blog with no sidebar</a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact-us') }}">Contact us</a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Pages <i class="fa-solid fa-chevron-down ps-2"></i></a>
                            <ul class="dropdown-menu dropdown-right">

                                <li class="drop-menu-item">
                                    <a href="login.html">Login Page</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="registration.html">Registration Page</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="404.html">404 Page</a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 login-menu d-flex align-items-center">

                        @auth
                            @if (Auth::user()->role_as == '2')
                                <li class="nav-item login-divider">
                                    <a class="nav-link" href="{{ url('admin/dashboard') }}">Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold" style="text-transform: capitalize"
                                    href="#">{{ Auth::user()->name }} <i
                                        class="fa-solid fa-chevron-down ps-2"></i></a>
                                <ul class="dropdown-menu dropdown-right">

                                    {{-- <li class="drop-menu-item">
                                        <a href="login.html">Login Page</a>
                                    </li>
                                    <li class="drop-menu-item">
                                        <a href="registration.html">Registration Page</a>
                                    </li>
                                    <li class="drop-menu-item">
                                        <a href="404.html">404 Page</a>
                                    </li> --}}
                                    <li class="drop-menu-item">
                                        <a href="{{ url('/user-profile') }}">My Profile</a>
                                    </li>
                                    <li class="drop-menu-item">
                                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="p-2 border-0 m-0  bg-transparent">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item login-divider">
                                <a class="nav-link" href="{{ url('login') }}">Login</a>
                            </li>
                        @endauth
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Currency $</a>
                            <ul class="dropdown-menu login-menu-dropdown">
                                <li class="drop-menu-item active">
                                    <a href="#">USD $</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="#">EUR €</a>
                                </li>
                                <li class="drop-menu-item">
                                    <a href="#">Pound £</a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link fast-cart" href="{{ url('/cart') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="cart-count d-flex align-items-center justify-content-center">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Right side overlay menu -->
        <div class="offcanvas offcanvas-end fast-offcanvas" tabindex="-1" id="offcanvasRight">
            <div class="offcanvas-header d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-unstyled fast-overlay-menu">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/about-us') }}">About Us</a>
                    </li>
                    {{-- <li>
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                        aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Shop
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled fast-inner-overlay-menu">
                                            <li>
                                                <a href="javascript:void(0)">My Cart</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Orders List</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Products</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                        aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        Blog
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled fast-inner-overlay-menu">
                                            <li>
                                                <a href="blog.html">Standard Blog Post</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Video Format Post</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Gallery Format Post</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Audio Format Post</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                    <li>
                        <a href="{{ url('/contact-us') }}">Contact Us</a>
                    </li>
                    {{-- <li>
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                        aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                        Pages
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled fast-inner-overlay-menu">
                                            <li>
                                                <a href="login.html">Login Page</a>
                                            </li>
                                            <li>
                                                <a href="login.html">Registration Page</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Edit User Profile</a>
                                            </li>
                                            <li>
                                                <a href="contact-us.html">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Search</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Offline Page</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">404 Page</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!-- Right side overlay menu -->
    </header>
    <!-- Header -->

    @section('script1')
        <script>
            $(document).ready(function() {
                function fetchCartCount() {
                    $.ajax({
                        url: '/cartitems', // URL of your route
                        type: 'GET',
                        success: function(data) {
                            // Update the cart count display
                            $('.cart-count').text(data.count);
                        },
                        error: function(xhr) {
                            console.error('Error fetching cart count:', xhr);
                        }
                    });
                }                
                fetchCartCount();                
            });
            
        </script>
    @endsection
