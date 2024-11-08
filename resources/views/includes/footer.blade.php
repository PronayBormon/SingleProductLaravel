<?php
use App\Models\Products;
$products = Products::orderby('id', 'desc')->where('status', 1)->limit(2)->get();
?>
<footer class="fast-footer">
    <div class="container">
        <div class="row">
            <div class="signup-wrapper d-flex align-items-center">
                <div class="row w-100">
                    <div class="col-md-8">
                        <h3 class="signup-title">SignUp Newsletter Today</h3>
                        <div class="signup-text">Enter your email address to subscribe our notification of our new post &
                            features by our daily email.</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="input-group signup-subscribe">
                            <input type="text" class="form-control" placeholder="Enter email to subscribe">
                            <button class="btn" type="button"><i class="fa-solid fa-right-long"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row footer-second">
            <div class="col-lg-3">
                <img src="/logo.png" class="img-fluid footer-logo" alt="Fast Burner">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="fast-support-icon">
                        <i class="icon icon-support"></i>
                    </div>
                    <div class="fast-support-wrapper">
                        <div class="fast-support-title">Got Question?</div>
                        <div class="fast-support-phone"><a href="tel:+447911123456">+44 7911 123456 (900) 689-66</a>
                        </div>
                    </div>
                </div>
                <div class="fast-contact-wrapper">
                    <div class="fast-contact-title">Contact Info</div>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="fast-contact-icon">
                            <i class="icon icon-geo"></i>
                        </div>
                        <div class="fast-contact-address">70 Washington Square South, New York, NY 10012, United States.
                        </div>
                    </div>
                </div>
                {{-- <ul class="list-inline fast-social-icon-wrapper">
                    <li class="list-inline-item">
                        <a href="#"><i class="icon icon-fb"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="icon icon-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="icon icon-pinterest"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="icon icon-youtube"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="icon icon-insta"></i></a>
                    </li>
                </ul> --}}
            </div>
            <div class="col-lg-3">
                <h2 class="fast-footer-title">My Account</h2>
                <ul class="fast-footer-menu">
                    <li><a href="{{ url('/user-profile')}}">Profile</a></li>
                    <li><a href="{{url('cart')}}">Cart</a></li>
                    <li><a href="{{url('checkout')}}">Checkout</a></li>
                    {{-- <li><a href="#">Order Tracking</a></li>
                    <li><a href="#">Whishlist</a></li> --}}
                </ul>
            </div>
            <div class="col-lg-3">
                <h2 class="fast-footer-title">Why Buy From Us</h2>
                <ul class="fast-footer-menu">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('about')}}">About</a></li>
                    <li><a href="{{ url('contact')}}">Contact</a></li>
                    {{-- <li><a href="#">Group Sales</a></li>
                    <li><a href="#">Privacy & Policy</a></li> --}}
                </ul>
            </div>
            <div class="col-lg-3">
                <h2 class="fast-footer-title">Recent Post</h2>
                @foreach($products as $item)
                <div class="fast-recent-post-wrapper">
                    <div class="d-flex justify-content-start">
                        <img src="/products/{{$item->image}}" style="width: 60px; height: 60px;" class="img-fluid" alt="Fast Burner">
                        <div class="fast-recent-right-block">
                            <a href="{{url('/product-details/'.$item->slug)}}" class="recent-post-title">{{$item->title}}</a>
                            <div class="d-flex justify-content-between">
                                {{-- <div class="recent-post-date">25 December 2018</div>
                                <div class="recent-post-date">10 Comments</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</footer>
