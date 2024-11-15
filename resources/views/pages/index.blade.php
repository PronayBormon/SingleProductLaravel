@extends('master')
@section('content')
    {{-- compact('user','About','Essential','EssBenifits','WorkingStep','ProductBenifits','FeaturesList','KnowAboutUs','WhyChoose','Feature','WorkStep','Banner') --}}

    <!-- Bannner -->
    <section class="banner" style="background-image: url('/{{ $Banner->background_image }}');">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <h2 class="banner-title">{{ $Banner->title }}</h2>
                    <p>{!! $Banner->description !!}</p>
                    <a href="{{ url('store') }}" class="btn btn-primary-fast">Shop Now</a>
                </div>
                <div class="col-lg-6">
                    <div class="banner-img">
                        <img src="/{{ $Banner->image }}" class="img-fluid" alt="Fast Burner" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bannner -->

    <!-- Free Shipping -->
    <section class="free-shipping">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex justify-content-start align-items-center free-shipping-wrapper first">
                        <div class="shipping-icon d-flex align-items-center justify-content-center">
                            <img src="/frontend/assets/images/free.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <div class="shipping-right-block">
                            <h3 class="shipping-title">Free Shipping</h3>
                            <div class="shipping-text">{{ $WhyChoose->free_shipping }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-start align-items-center free-shipping-wrapper second">
                        <div class="shipping-icon d-flex align-items-center justify-content-center">
                            <img src="/frontend/assets/images/cart.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <div class="shipping-right-block">
                            <h3 class="shipping-title">Support 24/7</h3>
                            <div class="shipping-text">{{ $WhyChoose->support }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-start align-items-center free-shipping-wrapper third">
                        <div class="shipping-icon d-flex align-items-center justify-content-center">
                            <img src="/frontend/assets/images/return.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <div class="shipping-right-block">
                            <h3 class="shipping-title">Return Policy</h3>
                            <div class="shipping-text">{{ $WhyChoose->return }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-start align-items-center free-shipping-wrapper fourth">
                        <div class="shipping-icon d-flex align-items-center justify-content-center">
                            <img src="/frontend/assets/images/credit-card.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <div class="shipping-right-block">
                            <h3 class="shipping-title">Payment Secure</h3>
                            <div class="shipping-text">{{ $WhyChoose->payment }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Free Shipping -->

    <!-- About Us -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/frontend/assets/images/about_us_img.png" class="img-fluid" alt="Fast Burner" loading="lazy">
                </div>
                <div class="col-md-6">
                    {{-- {{$KnowAboutUs}}
                    {{$ProductBenifits}} --}}
                    <div class="about-us-title-sm">Know About Us</div>
                    <h3 class="about-us-title">{{ $KnowAboutUs->title }} <span>Fatburner</span></h3>
                    <p>{{ $KnowAboutUs->description }}</p>
                    <ul>
                        @foreach ($ProductBenifits as $item)
                            <li><strong><i class="fa-solid fa-check"></i> {{ $item->benifits }}</strong></li>
                        @endforeach
                    </ul>
                    <a href="{{ url('store') }}" class="btn btn-primary-fast">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us -->

    <!-- Features -->
    <section class="fast-featuers">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="features-title"><span>{{ $Feature->title }}</span> {{ $Feature->title_two }}</h2>
                    <div class="features-details-wrapper">
                        <div class="row">
                            @foreach ($FeaturesList as $FeaturesList)
                                <div class="col-lg-6">
                                    <div class="features-details-card">
                                        <img src="{{ $FeaturesList->image }}" alt="Fast burner" class="img-fluid">
                                        <h3>{{ $FeaturesList->title }}</h3>
                                        <p>{!! $FeaturesList->description !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <p class="features-text">{!! $Feature->description !!}</p>
                    <div class="features-video-wrapper">
                        <img src="/frontend/assets/images/video_img.jpg" class="img-fluid" alt="Fast burner">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#featuresModal"><i
                                class="fa-solid fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Modal -->
    <div class="modal fade features-modal" id="featuresModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <iframe height="400" src="{{ $Feature->embaded_link }}" title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Features -->

    <!-- Working steps -->
    <section class="fast-working">
        <img src="/{{ $WorkStep->image }}" class="img-fluid working-step-img" alt="Fast Burner">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="about-us-title"><span>{{ $WorkStep->title }}</span> {{ $WorkStep->title_two }}</h3>
                    <p>{!! $WorkStep->description !!}</p>
                </div>
            </div>
            <div class="row fast-steps-content">
                @foreach ($WorkingStep as $index => $item)
                    <div class="col-lg-3 text-center">
                        <div class="fast-working-circle d-flex justify-content-center align-items-center m-auto">
                            <div class="fast-working-number">{{ $index + 1 }}</div> <!-- Display index number -->
                        </div>
                        <h3 class="fast-working-text">{{ $item->content }}</h3> <!-- Dynamic title from $item -->
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Working steps -->

    <!-- Essential benefits -->
    <section class="fast-benefits">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="about-us-title"><span>{{$EssBenifits->title}}</span> {{$EssBenifits->title_two}}</h3>
                    <p>{!!$EssBenifits->description!!}</p>
                </div>
            </div>
            
            <div class="row fast-benefits-features-wrapper">
                <div class="col-lg-4">
                    @foreach ($Essential->slice(0, 4) as $index => $benefit)
                        <div class="fast-benefits-card d-flex align-items-center">
                            <div class="fast-benefits-card-green">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            <h3 class="fast-benefits-card-text">{{ $benefit->essential }}</h3>
                        </div>
                    @endforeach
                </div>
            
                <div class="col-lg-4 text-center d-flex align-items-center">
                    <img src="/frontend/assets/images/banner_img.png" class="img-fluid" alt="Fast Burner">
                </div>
            
                <div class="col-lg-4">
                    @foreach ($Essential->slice(4, 4) as $index => $benefit)
                        <div class="fast-benefits-card d-flex align-items-center">
                            <div class="fast-benefits-card-green">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div> <!-- Restarting numbering from "01" -->
                            <h3 class="fast-benefits-card-text">{{ $benefit->essential }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
            
            
        </div>
    </section>
    <!-- Essential benefits -->

    <!-- Fast start -->
    <section class="fast-start">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="features-title pb-5">Use Fast Burner For Weight Loss Today. What Are You Waiting For?</h2>
                    <a href="{{url('/store')}}" class="btn btn-primary-fast">Get Start Today</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fast start -->

    {{-- <!-- Fast Cart -->
    <section class="fast-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="/frontend/assets/images/banner_img.png" class="img-fluid" alt="Fast Burner">
                </div>
                <div class="col-lg-6">
                    <h3 class="about-us-title">Nuclear Fast Burner</h3>
                    <div class="price-wrapper">
                        <span class="price-strike">$180.00</span>
                        <span class="price-cart">$100.00</span>
                    </div>
                    <div class="cart-details-wrapper">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel est vitae mi hendrerit
                            rhoncus id vitae lectus.Proin malesuada bibendum congue. Phasellus semper.</p>
                        <div class="cart-details">
                            <span class="cart-bold">SKU: </span>
                            <span>FB-1</span>
                        </div>
                        <div class="cart-details">
                            <span class="cart-bold">Brand: </span>
                            <span>Fastburner</span>
                        </div>
                        <div class="cart-details">
                            <span class="cart-bold">Availability: </span>
                            <span class="text-green">87 In Stock</span>
                        </div>
                    </div>
                    <div class="cart-option-wrapper d-flex">
                        <div class="text-option-bold">Flavour:</div>
                        <ul class="list-inline">
                            <li class="list-inline-item active">
                                <a href="#">Peach Mango</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Strawberry Lime</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Unflavoured</a>
                            </li>
                        </ul>
                    </div>
                    <div class="cart-option-wrapper d-flex">
                        <div class="text-option-bold">Amount:</div>
                        <ul class="list-inline">
                            <li class="list-inline-item active">
                                <a href="#">250G</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">500G ( + $100.00 )</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">1000G ( + $200.00 )</a>
                            </li>
                        </ul>
                    </div>
                    <div class="cart-btn-wrapper d-flex">
                        <input type="text" class="form-control checkout-form-input" placeholder="1">
                        <a href="#" class="btn btn-primary-fast mx-2">Add to Cart</a>
                        <a href="#" class="btn btn-secondary-fast">Add to Wish List</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fast Cart -->

    <!-- Fast customers -->
    <section class="fast-customers">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="about-us-title"><span>What Our Customers </span>are saying</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                        Nullam malesuada erat ut turpis.</p>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel customers-carousel owl-theme">
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review1.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Tommy Dents</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review2.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Amelia Jones</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review3.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Silviia Garden</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review2.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Amelia Jones</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review1.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Tommy Dents</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review2.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Amelia Jones</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review1.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Tommy Dents</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review2.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Amelia Jones</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review3.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Silviia Garden</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="item">
                        <div class="d-flex align-items-center">
                            <img src="/frontend/assets/images/review2.png" class="img-fluid review-img"
                                alt="Fast Burner">
                            <div class="cust-details">
                                <div class="review-name">Amelia Jones</div>
                                <div class="review-position">Honorable Client</div>
                            </div>
                        </div>
                        <i class="fa-sharp fa-solid fa-quote-left"></i>
                        <p>This stuff works, I don't even take the recommended dose and can feel effects, appetite reduced,
                            dropped weight, I will definitely purchase again.</p>
                        <ul class="list-inlline m-0 p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fast customers --> --}}
@endsection
