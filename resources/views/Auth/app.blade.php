<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Auth</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .form-control {
            box-shadow: none !important;
            outline: 0;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                    <img style="z-index: -1" id="background" class="position-absolute -left-20 top-0 max-w-[877px]"
                        src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
                    <div
                        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                            <header
                                class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3 bg-whit7 bg-white sticky-top p-3 shadow">
                                <div class="flex lg:justify-center lg:col-start-2">

                                </div>
                                @if (Route::has('login'))
                                    <nav class="-mx-3 flex flex-1 justify-end w-100 d-flex justify-content-end">
                                        @auth
                                            <a href="{{ url('/') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Home
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="padding-top: 10px;">
                                                @csrf
                                                <button type="submit" class="p-0 border-0 margin-0">Logout</button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Log in
                                            </a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                    Register
                                                </a>
                                            @endif
                                        @endauth
                                    </nav>
                                @endif
                            </header>

                            <main class="mt-6">
                                {{-- ============================================= --}}
                                @yield('content')
                            </main>

                            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
