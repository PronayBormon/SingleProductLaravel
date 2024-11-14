<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="/backend/assets/images/favicon.png">
	<title>FutureGenIT - The Future of Information technology</title>
	<link href="/backend/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
	<link href="/backend/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
	@yield('css')
	<link href="/backend/assets/fontawesome/css/all.min.css" rel="stylesheet">
	<link href="/backend/dark/dist/css/style.min.css" rel="stylesheet">
	<style>
        ..note-editor.note-frame .note-editing-area .note-editable{
            color: #fff!important;
        }
    </style>
</head>

<body class="skin-default-dark fixed-layout">
	
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 99">
        @if (session('message'))
            <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true"
                style="background: rgb(1, 145, 1)">
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
        @if (session('error'))
            <div id="liveToast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                style="background: rgb(250, 46, 46);">
                <div class="toast-body d-flex w-100 justify-content-between">
                    <span class="text-white">{{ session('danger') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">FuturegenIT</p>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">
		<!-- ============================================================== -->
		<!-- Topbar header - style you can find in pages.scss -->
		<!-- ============================================================== -->
		@include('admin.include.header')
		<!-- ============================================================== -->
		<!-- End Topbar header -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		@include('admin.include.sidebar')
		<!-- ============================================================== -->
		<!-- End Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Page wrapper  -->
		<!-- ============================================================== -->
		<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->
			{{-- @yeild('content') --}}
			@yield('content')
		</div>



		<footer class="footer">
			© {{ date('Y') }} FuturegenIT</a>
        </footer>
	</div>


	<script src="/backend/assets/node_modules/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap popper Core JavaScript -->
	<script src="/backend/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="/backend/dark/dist/js/perfect-scrollbar.jquery.min.js"></script>
	<!--Wave Effects -->
	<script src="/backend/dark/dist/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="/backend/dark/dist/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="/backend/dark/dist/js/custom.min.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
	<!--morris JavaScript -->
	<script src="/backend/assets/node_modules/raphael/raphael-min.js"></script>
	<script src="/backend/assets/node_modules/morrisjs/morris.min.js"></script>
	<script src="/backend/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
	<!-- Popup message jquery -->
	<script src="/backend/assets/node_modules/toast-master/js/jquery.toast.js"></script>
	<!-- Chart JS -->
	{{-- <script src="/backend/dark/dist/js/dashboard1.js"></script> --}}
	<script src="/backend/assets/node_modules/toast-master/js/jquery.toast.js"></script>
	
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


	@yield('script')


</body>

</html>