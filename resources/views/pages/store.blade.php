@extends('master')
@section('content')
    <!-- Bannner -->
    <section class="banner about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="text-center">
                        <h2 class="banner-title">Product List</h2>
                        <nav aria-label="breadcrumb" class="d-flex justify-content-center fast-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
                                        Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bannner -->

    {{-- <ul class="list-inlline p-0 star-line">
        <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
        <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
        <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
        <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
        <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
    </ul> --}}

    <!-- Product List -->
    <section class="fast-blog-list">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-result d-flex align-items-center">
                        <div class="product-result-text sortby">Sort By</div>
                        <form method="GET" action="{{ route('store') }}">
                            <select name="sort" class="form-select checkout-form-input sortby"
                                onchange="this.form.submit()">
                                <option value="id" {{ $sortBy == 'id' ? 'selected' : '' }}>Popularity</option>
                                <option value="new" {{ $sortBy == 'new' ? 'selected' : '' }}>Newest First</option>
                                <option value="low" {{ $sortBy == 'low' ? 'selected' : '' }}>Low to High</option>
                                <option value="high" {{ $sortBy == 'high' ? 'selected' : '' }}>High to Low</option>
                            </select>
                            <input type="hidden" name="per_page" value="{{ $perPage }}">
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-result d-md-flex justify-content-end">
                        <div class="d-flex align-items-center">
                            <div class="product-result-text">Results {{ $products->firstItem() }} -
                                {{ $products->lastItem() }} of {{ $products->total() }}</div>
                            <form method="GET" action="{{ route('store') }}">
                                <input type="hidden" name="sort" value="{{ $sortBy }}">
                                <select name="per_page" class="form-select checkout-form-input"
                                    onchange="this.form.submit()">
                                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-md-4">
                        <div class="product-card-wrapper">
                            <div class="product-card-label float-start">Sale</div>
                            <div class="product-card-img-wrapper">
                                <img src="/products/{{ $item->image }}" class="img-fluid" alt="Fast Burner">
                            </div>
                            <h3  style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; line-clamp: 1; -webkit-box-orient: vertical;">{{ $item->title }}</h3>
                            <div class="product-card-price"><span class="strike">${{ $item->price }}</span>
                                <span>${{ $item->final_price }}</span></div>
                            <a href="{{ url('/product-details/' . $item->slug) }}" class="btn btn-primary-fast">Product
                                Details</a>

                        </div>
                    </div>
                @endforeach

                {{ $products->links('vendors.custom-pagination') }}

                {{-- <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">Sale</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-2.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Daily Multivitamin</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">Sale</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-3.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Fatburning Formula</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">Sale</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-4.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Daily Multivitamin</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">Sale</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-5.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Fatburning Formula</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">In Stock</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-6.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Daily Multivitamin</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-staractive"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">Sale</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-3.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Daily Multivitamin</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">Sale</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-4.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Fatburning Formula</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star active"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card-wrapper">
                        <div class="product-card-label float-start">In Stock</div>
                        <div class="product-card-img-wrapper">
                            <img src="/frontend/assets/images/product-2.png" class="img-fluid" alt="Fast Burner">
                        </div>
                        <h3>Daily Multivitamin</h3>
                        <ul class="list-inlline p-0 star-line">
                            <li class="list-inline-item"><i class="fa-solid fa-staractive"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="product-card-price"><span class="strike">$66.00</span> <span>$59.40</span></div>
                        <a href="{{ url('/product-details') }}" class="btn btn-primary-fast">Product Details</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Product List -->
@endsection
