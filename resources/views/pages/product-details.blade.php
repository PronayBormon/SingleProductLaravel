@extends('master')
@section('content')
    <!-- Banner -->
    <section class="banner about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="text-center">
                        <h2 class="banner-title">Product Detail</h2>
                        <nav aria-label="breadcrumb" class="d-flex justify-content-center fast-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
                                        Home</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/store') }}">Product List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner -->

    <!-- Product Detail -->
    <section class="fast-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="/products/{{ $product->image }}" class="img-fluid w-100" alt="Fast Burner"
                        style="max-height: 500px; object-fit:contain;">
                </div>
                <div class="col-lg-6">
                    <h3 class="about-us-title">{{ $product->title }}</h3>
                    <div class="price-wrapper">
                        <span class="price-strike">${{ $product->price }}</span>
                        <span class="price-cart">${{ $product->final_price }}</span>
                    </div>
                    <div class="cart-details-wrapper">
                        <p>{{ $product->short_description }}</p>
                        <div class="cart-details">
                            <span class="cart-bold">Availability: </span>
                            @if ($product->quantity > 0)
                                <span class="text-green">{{ $product->quantity }} In Stock</span>
                            @else
                                <span class="text-danger">{{ $product->quantity }} Out of Stock</span>
                            @endif
                        </div>
                    </div>
                    <div class="cart-btn-wrapper d-flex">
                        <input type="number" id="qu_input" class="form-control checkout-form-input text-center"
                            min="1" max="{{ $product->quantity }}" value="1" placeholder="0">
                        <button @if ($product->quantity <= 0) disabled @endif class="btn btn-primary-fast mx-2"
                            id="add_cart">Add to Cart</button>
                        {{-- <a href="#" class="btn btn-secondary-fast">Add to Wish List</a> --}}
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3 class="about-us-title">Product Details</h3>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Detail -->
    

    {{-- Alert messages  --}}
    <div id="alert_" class="alert_message bg-success p-2 px-4 m-4  position-fixed top-0  shadow"
        style="right:0; z-index: 9999999999999999; display:none;">
        <p class="text-white mb-0">Successfull add to cart</p>
    </div>


    <div id="alert_error" class="alert_message bg-danger p-2 px-4 m-4  position-fixed top-0  shadow"
        style="right:0; z-index: 9999999999999999; display:none;">
        <p class="text-white mb-0">Please enter a valid quantity</p>
    </div>








@endsection

@section('script')
    <script>
        $(document).ready(function() {

            function showAlert() {
                $('#alert_').fadeIn();
                setTimeout(() => {
                    $('#alert_').fadeOut();
                }, 2000);
            }
            function showAlertError() {
                $('#alert_error').fadeIn();
                setTimeout(() => {
                    $('#alert_error').fadeOut();
                }, 2000);
            }

            $('#qu_input').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#add_cart').click(function() {
                var quantity = parseInt($('#qu_input').val());
                var productId = '{{ $product->id }}';
                var title = '{{ $product->title }}';
                var slug = '{{ $product->slug }}';
                var price = '{{ $product->price }}';
                var final_price = '{{ $product->final_price }}';
                var pro_quantity = '{{ $product->quantity }}';
                var discount = '{{ $product->discount }}';
                var discount_type = '{{ $product->discount_type }}';
                var image = '{{ $product->image }}';


                if (quantity > 0) {
                    // Send AJAX request to add item to cart
                    $.ajax({
                        url: '{{ route('add.to.cart') }}',
                        method: 'POST',
                        data: {
                            quantity: quantity,
                            product_id: productId,
                            title: title,
                            slug: slug,
                            price: price,
                            final_price: final_price,
                            pro_quantity: pro_quantity,
                            discount: discount,
                            discount_type: discount_type,
                            image: image,


                            _token: '{{ csrf_token() }}' // CSRF token for security
                        },
                        success: function(response) {
                            console.log('success');
                            // alert(quantity + " x " + '{{ $product->title }}' + "has been added to your cart.");
                            showAlert();
                        },
                        error: function(xhr) {
                            alert("Error: " + xhr.responseJSON.error);
                        }
                    });
                } else {
                    // alert("Please enter a valid quantity.");
                    showAlertError();
                }
            });
        });
    </script>
@endsection
