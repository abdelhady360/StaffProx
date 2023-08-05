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


    <!-- Styles css -->
    @include('layouts.head')

</head>
<body>

@yield('content')
<!-- Styles js-->
@include('layouts.footer-scripts')

</body>
</html>
