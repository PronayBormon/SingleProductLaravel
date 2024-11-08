@extends('master')
@section('content')
    <!-- Bannner -->
    <section class="banner about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="text-center">
                        <h2 class="banner-title">Checkout</h2>
                        <nav aria-label="breadcrumb" class="d-flex justify-content-center fast-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
                                        Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bannner -->

    <!-- Checkout -->
    <div class="checkout-wrapper">
        <div class="container">         
            {{-- -------------- --}}`   
            @if (!empty($user))
            <form action="{{ url('new-order') }}" method="POST">
                <div class="row">
                    <div class="col-lg-7">
                        @csrf
                        <div class="checkout-form-wrapper">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <h2 class="checkout-form-title">Contact information</h2>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <input class="form-control checkout-form-input" type="text" required name="mobile"
                                        value="{{ $user->mobile }}" placeholder="01">
                                    @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    {{-- <div class="form-check mt-3 checkout-form-check">
                                        <input class="form-check-input"  type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Email me with news and offers
                                        </label>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="checkout-form-title">Billing Details</h2>
                                </div>
                            </div>

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
                                            value="{{ $user->address }}" name="address" id="address" placeholder="Address">
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
                                        <label for="city" class="form-label">Town/City <span>*</span></label>
                                        <input type="text" required class="form-control checkout-form-input"
                                            value="{{ $user->city }}" name="city" id="city" placeholder="city">
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
                                        <input required type="text" class="form-control checkout-form-input" name="postal_code" id="postalcode" value="{{$user->postal_code}}"
                                            placeholder="Postal Code">
                                        @error('postal_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="ordernotes" class="form-label">Order Notes <span>*</span></label>
                                        <textarea class="form-control checkout-form-input" id="ordernotes" rows="3" name="order_note"
                                            placeholder="Notes about your order, e.g, special notes for delivery.">{{old('order_note')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-inline checkout-btn-wrapper">
                                        <li class="list-inline-item">
                                            <a href="{{ url('/store') }}" class="btn btn-primary-fast">Continue to
                                                Shipping</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ url('/cart') }}" class="btn btn-secondary-fast">Return to
                                                cart</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="order-summary-wrapper">
                            <h2 class="checkout-form-title text-center">Your Order Summary</h2>
                            @foreach ($cartItems as $item)
                                <div class="order-card-details">
                                    <div class="d-flex align-items-center justify-content-between order-card-line">
                                        <div class="d-flex align-items-center order-card">
                                            <img src="products/{{ $item['image'] }}" class="img-fluid"
                                                alt="Fast burner">
                                            <div class="order-card-content">
                                                <h3 class="order-card-title">{{ $item['title'] }}</h3>
                                                {{-- <div class="order-card-text">Fast burner</div> --}}
                                            </div>
                                        </div>
                                        <div>{{ $item['final_price'] }}TK</div>
                                    </div>
                            @endforeach
                            {{-- <div class="fast-right-side px-0 my-4">
                            <div class="input-group fast-blog-input-search">
                                <input type="text" class="form-control" placeholder="Gift a card or discount code"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary text-white px-4 w-auto" type="button"
                                    id="button-addon2">Apply</button>
                            </div>
                        </div> --}}

                            <div class="order-total-wrapper">
                                <div class="order-split-line"></div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div>Subtotal</div>
                                    <div>{{ $subtotal }}TK</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Shipping</div>
                                    <div>{{ $shipping }}TK</div>
                                </div>
                                <div class="order-split-line"></div>
                                <div class="d-flex justify-content-between">
                                    <div>Total</div>
                                    <div>{{ $total }}TK</div>
                                </div>
                            </div>

                            <h2 class="checkout-form-title mt-3">Payment</h2>
                            <ul class="list-inline checkout-btn-list">
                                <li class="list-inline-item">
                                    <input type="radio" name="payment_method" hidden id="cod" value="COD"
                                        checked>
                                    <label class="btn btn-teritary-fast select_option" for="cod">COD</label>
                                </li>
                                <li class="list-inline-item">
                                    <input type="radio" name="payment_method" hidden id="mobile_bank"
                                        value="mobile banking">
                                    <label class="btn btn-teritary-fast select_option" for="mobile_bank">Mobile
                                        Banking</label>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-primary-fast w-100 mt-3">Checkout Now</button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- -------------- --}}
            @else
                
            <form action="{{ url('new-order') }}" method="POST">
                <div class="row">
                    <div class="col-lg-7">
                        @csrf
                        <div class="checkout-form-wrapper">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    {{ $user }}
                                    <h2 class="checkout-form-title">Contact information</h2>
                                </div>
                                    <div class="col-lg-6 d-lg-flex justify-content-end">
                                        <p class="checkout-form-text d-flex align-items-center mb-0">Already have an
                                            account? <a href="#">Log in</a></p>
                                    </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <input class="form-control checkout-form-input" type="text" required name="mobile"
                                        value="01{{ old('mobile') }}" placeholder="017000000">
                                    @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    {{-- <div class="form-check mt-3 checkout-form-check">
                                        <input class="form-check-input"  type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Email me with news and offers
                                        </label>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="checkout-form-title">Billing Details</h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name <span>*</span></label>
                                        <input type="text" required class="form-control checkout-form-input"
                                            value="{{ old('first_name') }}" name="first_name" id="firstname"
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
                                            value="{{ old('last_name') }}" name="last_name" id="lastname"
                                            placeholder="Last Name">
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="companyname" class="form-label">Company Name <span>*</span></label>
                                        <input type="text" required class="form-control checkout-form-input"
                                            id="companyname" placeholder="Company Name">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address <span>*</span></label>
                                        <input type="text" required class="form-control checkout-form-input mb-3"
                                            value="{{ old('addres') }}" name="address" id="address" placeholder="Address">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control checkout-form-input" id="apartment"
                                            value="{{ old('address_line') }}" name="address_line"
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
                                        <label for="city" class="form-label">Town/City <span>*</span></label>
                                        <input type="text" required class="form-control checkout-form-input"
                                            value="{{ old('City') }}" name="city" id="city" placeholder="city">
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
                                        <input required type="text" class="form-control checkout-form-input" name="postal_code" id="postalcode" value="{{old('postal_code')}}"
                                            placeholder="Postal Code">
                                        @error('postal_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-check mt-3 checkout-form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="shipaddress">
                                        <label class="form-check-label" for="shipaddress">
                                            Ship to a different address?
                                        </label>
                                    </div>
                                    <div class="form-check my-3 checkout-form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="saveinfo">
                                        <label class="form-check-label" for="saveinfo">
                                            Save this information for next time
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="ordernotes" class="form-label">Order Notes <span>*</span></label>
                                        <textarea class="form-control checkout-form-input" id="ordernotes" rows="3" name="order_note"
                                            placeholder="Notes about your order, e.g, special notes for delivery.">{{old('order_note')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-inline checkout-btn-wrapper">
                                        <li class="list-inline-item">
                                            <a href="{{ url('/store') }}" class="btn btn-primary-fast">Continue to
                                                Shipping</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ url('/cart') }}" class="btn btn-secondary-fast">Return to
                                                cart</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div class="col-lg-5">
                        <div class="order-summary-wrapper">
                            <h2 class="checkout-form-title text-center">Your Order Summary</h2>
                            @foreach ($cartItems as $item)
                                <div class="order-card-details">
                                    <div class="d-flex align-items-center justify-content-between order-card-line">
                                        <div class="d-flex align-items-center order-card">
                                            <img src="products/{{ $item['image'] }}" class="img-fluid"
                                                alt="Fast burner">
                                            <div class="order-card-content">
                                                <h3 class="order-card-title">{{ $item['title'] }}</h3>
                                                {{-- <div class="order-card-text">Fast burner</div> --}}
                                            </div>
                                        </div>
                                        <div>{{ $item['final_price'] }}TK</div>
                                    </div>
                            @endforeach
                            {{-- <div class="fast-right-side px-0 my-4">
                            <div class="input-group fast-blog-input-search">
                                <input type="text" class="form-control" placeholder="Gift a card or discount code"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary text-white px-4 w-auto" type="button"
                                    id="button-addon2">Apply</button>
                            </div>
                        </div> --}}

                            <div class="order-total-wrapper">
                                <div class="order-split-line"></div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div>Subtotal</div>
                                    <div>{{ $subtotal }}TK</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Shipping</div>
                                    <div>{{ $shipping }}TK</div>
                                </div>
                                <div class="order-split-line"></div>
                                <div class="d-flex justify-content-between">
                                    <div>Total</div>
                                    <div>{{ $total }}TK</div>
                                </div>
                            </div>

                            <h2 class="checkout-form-title mt-3">Payment</h2>
                            <ul class="list-inline checkout-btn-list">
                                <li class="list-inline-item">
                                    <input type="radio" name="payment_method" hidden id="cod" value="COD"
                                        checked>
                                    <label class="btn btn-teritary-fast select_option" for="cod">COD</label>
                                </li>
                                <li class="list-inline-item">
                                    <input type="radio" name="payment_method" hidden id="mobile_bank"
                                        value="mobile banking">
                                    <label class="btn btn-teritary-fast select_option" for="mobile_bank">Mobile
                                        Banking</label>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-primary-fast w-100 mt-3">Checkout Now</button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- -------------- --}}
            @endif
        </div>
    </div>
    <!-- Checkout -->
@endsection
