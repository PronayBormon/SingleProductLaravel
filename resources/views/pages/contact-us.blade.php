@extends('master')
@section('content')
    <!-- Bannner -->
    <section class="banner about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="text-center">
                        <h2 class="banner-title">Contact Us</h2>
                        <nav aria-label="breadcrumb" class="d-flex justify-content-center fast-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
                                        Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bannner -->

    <!-- Contact form -->
    <section class="fast-contact-wrapper-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="about-us-title-sm">Let's Talk</div>
                    <h3 class="about-us-title">Contact us for more information</h3>
                </div>
            </div>

            <div class="row fast-contact-form">
                <div class="col-lg-4">
                    <ul class="list-unstyled">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="contact-card">
                                    <div class="contact-icon-card d-flex align-items-center justify-content-center">
                                        <i class="icon icon-headset"></i>
                                    </div>
                                </div>
                                <div class="contact-card-content">
                                    <h3>Location</h3>
                                    <p class="mb-0">{{$contact->address}}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="contact-card">
                                    <div class="contact-icon-card d-flex align-items-center justify-content-center">
                                        <i class="icon icon-location"></i>
                                    </div>
                                </div>
                                <div class="contact-card-content">
                                    <h3>Support</h3>
                                    <p class="mb-0">{{$contact->phone}}</p>
                                    <p class="mb-0">{{$contact->telephone}}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="contact-card">
                                    <div class="contact-icon-card d-flex align-items-center justify-content-center">
                                        <i class="icon icon-email"></i>
                                    </div>
                                </div>
                                <div class="contact-card-content">
                                    <h3>Email</h3>
                                    <p class="mb-0">{{$contact->email}}</p>
                                    <p class="mb-0">{{$contact->email_two}}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <form action="{{ url('contact') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control fast-contact-form-input" type="text" name="first_name" required placeholder="First Name">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control fast-contact-form-input" type="text" name="last_name" required placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control fast-contact-form-input" type="text" name="phone" required placeholder="Your Phone">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control fast-contact-form-input" type="email" name="email" required placeholder="Your Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea class="form-control fast-contact-form-input" name="message" required placeholder="Write Message" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary-fast">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact form -->

    <!-- Map -->
    <div class="fast-contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583090278!2d-74.1197637963364!3d40.697663748629545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1670753378947!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Map -->

    <!-- Partners -->
    <section class="fast-partners">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="contact-partner-title text-center mb-5">Some of our honurable partners</h2>
                    <div class="owl-carousel partners-carousel owl-theme">
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_1.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_2.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_3.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_4.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_5.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_2.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_3.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_4.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_5.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_2.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_3.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_4.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                        <div class="item">
                            <div class="fast-partners-img-wrapper">
                                <img src="/frontend/assets/images/brand_2.png" class="img-fluid" alt="Fast burner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partners -->
@endsection
