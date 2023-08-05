<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/images/favicon/favicon.ico')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Libs CSS -->
    <link href="{{URL::asset('assets/css/stile.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/css/theme-rtl.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/js/jquery/jquery.1.22.3.min.js')}}" rel="stylesheet" />
    <!-- Libs CSS -->

    <!-- Start Laravel Notify -->
    @notifyCss
    <!-- End Laravel Notify -->

    <!-- Start Styles css -->
    @include('layouts.app_site.head')
    @yield('stylesheet')

    <!-- End Styles css -->

</head>

<body>
<!-- Wrapper -->
<div id="db-wrapper" class="toggled">
<!-- Start Main Sidebar -->
@include('layouts.app_site.main-sidebar')
<!-- Start Main Sidebar -->

<!-- Start Main Header -->
@include('layouts.app_site.main-header')
<!-- Start Main Header -->


<!-- Start Content -->
     @yield('content')
<!-- End Content -->

    </main>
</div>
<!-- Start Styles js-->
    @include('layouts.app_site.footer-scripts')
    @yield('script')

<!-- End Styles js-->
<!-- Start Laravel Notify -->
    <div class="mx-lg-8" dir="ltr">
        @include('notify::components.notify')
        @notifyJs
    <!-- End Laravel Notify -->
    </div>


<div class="container-fluid footer">
    <p class="pull-right">&copy;   <a href="https://abdelhady360.github.io/" target="_blank" >AbdelHady Mohamed</a>  <script>document.write(new Date().getFullYear())</script>. All rights reserved .</p>
</div>
</body>
</html>
