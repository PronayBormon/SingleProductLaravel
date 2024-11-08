<!doctype html>
<html lang="en">

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
    <div class="loader_bg" id="loader_bg">
        <div>
            <div class="lds-hourglass"></div>
            <p class="fw-bold text-center text-white">Loading..</p>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        @if (session('message'))
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                style="background: var(--primary-color)">
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
            <div id="liveToast2" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
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
    @include('includes.footer')

    <script src="/frontend/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="/frontend/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="/frontend/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/assets/js/owl.carousel.min.js"></script>
    <script src="/frontend/assets/js/custom.js"></script>

    <script>
        window.addEventListener('load', function() {
            const loader = document.getElementById('loader_bg');
            if (loader) {
                loader.style.display = 'none'; // Hide the loader after the page is fully loaded
            }

            const toastElements = [
                document.getElementById('liveToast'),
                document.getElementById('liveToast1'),
                document.getElementById('liveToast2')
            ];

            toastElements.forEach(toastElement => {
                if (toastElement) {
                    const toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }
            });
        });
    </script>

    @yield('script')
    @yield('script1')

</body>

</html>
