<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Suha Admin - Registration </title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body style="  background-image: linear-gradient(220deg, #4B7BE5, #20c997);" class="hold-transition theme-primary" >

	<div class="container h-p100">
        <div style="padding-top: 80px; " class="  h-p5 align-middle text-center text-white ">
            <h1 >شركة طريق اضواء دجلة</h1>

            <h2 >نظام أدارة الوصولات</h2>
            <img style="width: 100px;" src="{{ asset('upload/logo_new_circle.png') }}" alt="">

        </div>
		<div style="padding-top: 300px; " class="row align-items-center justify-content-md-center  h-p70">

			<div class="col-3 text-center">
                <a class=" text-white btn-lg btn btn-outline-info" href="{{ route('login_form') }}"> Login as admin</a>
            </div>
            <div class="col-3 text-center">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a style="" href="{{ route('dashboard') }}" class="text-sm text-gray-700 underline ">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"  class=" text-white btn btn-lg  btn-outline-info">Login As User</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}"  style="display: n
                            ;">Register</a>
                        @endif --}}
                    @endif
                </div>
                @endif            </div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>


</body>
</html>
