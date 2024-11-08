<!doctype html>
<html lang="en">

<!-- Mirrored from demo.cottic.com/html/fastburner/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Oct 2024 12:45:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Burner</title>
    <link href="/frontend/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/assets/Font-Awesome-Pro-6.2.1/css/all.min.css" rel="stylesheet">
    <link href="/frontend/assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="/frontend/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        @if (session('message'))
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                style="background: var(--primary-color)">
                {{-- <div class="toast-header">
                  <strong class="me-auto">Notification</strong>
                  <small>Just now</small>
              </div> --}}
                <div class="toast-body d-flex w-100 justify-content-between">
                    <span class="text-white">{{ session('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if (session('warning'))
            <div id="liveToast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                style="background: rgb(250, 213, 46);">
                <div class="toast-body d-flex w-100 justify-content-between">
                    <span class="text-black">{{ session('warning') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if (session('danger'))
            <div id="liveToast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                style="background: rgb(250, 46, 46);">
                <div class="toast-body d-flex w-100 justify-content-between">
                    <span class="text-white">{{ session('danger') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    @include('includes.header')


    @yield('content')

    <!-- Footer -->
    @include('includes.footer')


    <script src="/frontend/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="/frontend/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="/frontend/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="../../../cdn.jsdelivr.net/npm/%40popperjs/core%402.11.5/dist/umd/popper.min.js"></script> --}}
    <script src="/frontend/assets/js/bootstrap.min.js"></script>
    <script src="/frontend/assets/js/owl.carousel.min.js"></script>
    <script src="/frontend/assets/js/custom.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastElement = document.getElementById('liveToast');
            if (toastElement) {
                const toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const toastElement = document.getElementById('liveToast1');
            if (toastElement) {
                const toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });
    </script>
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
    @yield('script1')
</body>

</html>
