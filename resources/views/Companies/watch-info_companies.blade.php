@extends('layouts.app_site.app')
@section('title')
    {{$companie->name}}
@stop

<!-- START section -->
@section('stylesheet')

    <style>
        .stand{
            cursor: pointer;
            margin: 15px 0;
        }
    </style>

@endsection
<!-- END section -->

@section('content')

    @php

        ///////////////////////////////////////////////
        $todaysl = now();
        $licenseEndDate = \Illuminate\Support\Carbon::parse($companie->license_end);
        $licensedaysDifference = $todaysl->diffInDays($licenseEndDate, false);

        if ($licensedaysDifference >= 0 && $licensedaysDifference <= 30)
        {$colorLicense = "rgb(255, 175, 26)";}
        elseif ($licensedaysDifference < 0) {$colorLicense = "red";}
        else {$colorLicense = "#64748b";}

        ///////////////////////////////////////////////
        $todaysi = now();
        $icpEndDate = \Illuminate\Support\Carbon::parse($companie->icp_end);
        $icpDifference = $todaysi->diffInDays($icpEndDate, false);

        if ($icpDifference >= 0 && $icpDifference <= 30)
        {$colorIcp = "rgb(255, 175, 26)";}
        elseif ($icpDifference < 0) {$colorIcp = "red";}
        else {$colorIcp = "#64748b";}

        ///////////////////////////////////////////////
        $todaysin = now();
        $insuranceEndDate = \Illuminate\Support\Carbon::parse($companie->insurance_end);
        $insuranceDifference = $todaysin->diffInDays($insuranceEndDate, false);

        if ($insuranceDifference >= 0 && $insuranceDifference <= 30)
        {$colorInsurance = "rgb(255, 175, 26)";}
        elseif ($insuranceDifference < 0) {$colorInsurance = "red";}
        else {$colorInsurance = "#fff";}

    @endphp


    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">الشركة | {{$companie->name}} </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}">لوحة القيادة </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('Companies')}}">الشركات </a>
                                </li>

                                <li class="breadcrumb-item active " aria-current="page">
                                    {{$companie->name}}
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{route('AllAccommodation',$companie->slug)}}" class="btn btn-primary me-2"><i class="fa-regular fa-folder-open"></i> جميع الإقامات</a>
                        <a href="{{route('AllVisa',$companie->slug)}}" class="btn btn-primary me-2"><i class="fa-regular fa-folder-open"></i> جميع التأشيرات</a>
                        <a href="{{url('Companies')}}" class="btn btn-primary me-2">الرجوع للخلف <i class="fa-solid fa-angles-left"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ $error }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <div class="col-xl-4 col-lg-6 col-md-12 col-12">

                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">عدد الموظفين</span>
                            </div>
                            <div>
                                <span class=" fa-regular fa-user fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span >{{$accommodation->count() + $visa->count()}}</span> موظف </h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">عدد الإقامات</span>
                            </div>
                            <div>
                                <span class=" fa-regular fa-compass fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span >{{$accommodation->count()}}</span> إقامة </h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">عدد التأشيرات</span>
                            </div>
                            <div>
                                <span class="  fa-regular fa-bell fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span > {{$visa->count()}} </span>تأشيرة</h2>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">إقامات قاربت على الانتهاء</span>
                            </div>
                            <div>
                                <span class="fa-regular fa-compass fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpCompanieAccommodations}}</span> إقامة عمل</h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpCompanieAccommodationsExp}}</span> إقامة إنتهت </span>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">تأشيرات قاربت على الانتهاء</span>
                            </div>
                            <div>
                                <span class=" fa-regular fa-bell fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpCompanieVisas}}</span> تأشيرة عمل </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpCompanieVisasExp}}</span> تأشيرة إنتهت </span>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card mb-4">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                <div>
                                    <span class="fs-6 text-uppercase fw-semibold">تصاريح عمل قاربت على الانتهاء</span>
                                </div>
                                <div>
                                    <span class="fa-regular fa-file-lines fs-3 text-primary"></span>
                                </div>
                            </div>
                            <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpPermitWorkendCompanieVisas}}</span> تصريح عمل </h2>
                            <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpPermitWorkendCompanieAccommodationsExp}}</span> تصاريح عمل إنتهت </span>

                        </div>
                    </div>
                </div>

            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">جوازات سفر قاربت علي الانتهاء</span>
                            </div>
                            <div>
                                <span class="fa-regular fa-address-card fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpPassporCompanieAccommodations + $CountExpPassporCompanieVisas}}</span> جواز سفر</h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpPassporCompanieAccommodationsExp + $CountExpPassporCompanieVisaExp}}</span> جوزات سفر إنتهت </span>

                    </div>
                </div>
            </div>


        </div>


        <div class="row">


            <div class="col-md-4 col-xl-4 col-3">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 fw-bold">الرخصة  </h4>
                                    </div>
                                    <!-- dropdown  -->
                                    <div>
                          <span class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="DropdownTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                            <span class="dropdown-menu" aria-labelledby="DropdownTen">
                              <span class="dropdown-header">الإعدادات</span>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newCatgory">تجديد</a>
                            </span>
                          </span>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4 text-primary" viewBox="0 0 16 16">
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" /></svg>
                                                <div class="ms-2"><h5 class="mb-0 text-body fw-bold">تاريخ إصدار الرخصة</h5></div>
                                            </div>
                                            <div>
                                                <div><p class="text-dark mb-0 fw-semibold">{{ date('d/m/Y', strtotime($companie->license_start)) }}</p></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4  text-primary" viewBox="0 0 16 16">
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" /></svg>
                                                <div class="ms-2"><h5 class="mb-0 text-body fw-bold">تاريخ إنتهاء الرخصة</h5></div>
                                            </div>
                                            <div>
                                                <div><p class="text-dark mb-0 fw-semibold">{{ date('d/m/Y', strtotime($companie->license_end)) }}</p></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item  px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clock text-primary" viewBox="0 0 16 16">
                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                </svg>
                                                <div class="ms-2">
                                                    <h5 class="mb-0 text-body fw-bold">الشهور المتبقية</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="text-dark mb-0 fw-semibold">{{   now()->diffForHumans($companie->license_end) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item  px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clock text-primary" viewBox="0 0 16 16">
                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                </svg>
                                                <div class="ms-2">
                                                    <h5 class="mb-0 text-body fw-bold">الأيام المتبقية</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="mb-0 fw-semibold" style="color: {{$colorLicense}}" >{{now()->diffInDays($companie->license_end)}} يوم</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>

{{--                    معلوومات الرخصة          --}}

                    <div class="col-12 mb-4 ">
                        <div class="card rounded">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 fw-bold">معلومات التواصل</h4>
                                    </div>
                                    <!-- dropdown  -->
                                    <div>
                            <span class="dropdown dropstart">
                              <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="DropdownTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                              <span class="dropdown-menu" aria-labelledby="DropdownTen">
                                <span class="dropdown-header">الإعدادات</span>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newCatgoryInfoCon">تحديث</a></span>
                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded">

                                <ul class="list-group list-group-flush rounded-3 mb-4">
                                    <li class="list-group-item">
                                        <div class="mb-3"></div>
                                        <div class="text-body fw-bold mb-3">
                                            <span class="text-body fw-bold">رقم الهاتف</span>
                                        </div>
                                        <h5 class="text-body fw-bold "><i class="fa-solid fa-phone fs-4"></i><b class="stand text-body fw-bold ms-2" onclick="copy(this)" title="انقر لنسخ النص">{{$companie->phone_number}}</b></h5>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="mb-3"></div>

                                        <div class="text-body fw-bold mb-3">
                                            <span class="text-body fw-bold">البريد الإلكتروني</span>
                                        </div>
                                        <h5 class="text-body fw-bold "><i class="fa-solid fa-envelope fs-4"></i><b class="stand text-body fw-bold ms-2" onclick="copy(this)" title="انقر لنسخ النص">{{$companie->email}}</b></h5>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="mb-3"></div>

                                        <div class="text-body fw-bold mb-3">
                                            <span class="text-body fw-bold ">العنوان</span>
                                        </div>
                                        <h5 class="text-body fw-bold "><i class="fa-solid fa-location-dot  fs-4"></i><b class="stand text-body fw-bold ms-2" onclick="copy(this)" title="انقر لنسخ النص">{{$companie->address}}</b></h5>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <div class="col-md-4 col-xl-4 col-3">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 fw-bold">الهيئة الاتحادية للهوية والجنسية</h4>
                                    </div>
                                    <!-- dropdown  -->
                                    <div>
                            <span class="dropdown dropstart">
                              <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="DropdownTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                              <span class="dropdown-menu" aria-labelledby="DropdownTen">
                                <span class="dropdown-header">الإعدادات</span>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newCatgoryICP">تجديد</a>
                              </span>
                            </span>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between
                                align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4 text-primary" viewBox="0 0 16 16">
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5  0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0  0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                                                </svg>
                                                <div class="ms-2">
                                                    <h5 class="mb-0 text-body fw-bold">تاريخ إصدار اكونت ICP</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="text-dark mb-0 fw-semibold">{{date('d/m/Y', strtotime($companie->icp_start))}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4  text-primary" viewBox="0 0 16 16">
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                                                </svg>
                                                <div class="ms-2">
                                                    <h5 class="mb-0 text-body fw-bold">تاريخ إنتهاء اكونت ICP</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="text-dark mb-0 fw-semibold">{{date('d/m/Y', strtotime($companie->icp_end))}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item  px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clock text-primary" viewBox="0 0 16 16">
                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                </svg>
                                                <div class="ms-2">
                                                    <h5 class="mb-0 text-body fw-bold">الشهور المتبقية</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="text-dark mb-0 fw-semibold">{{now()->diffForHumans($companie->icp_end)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item  px-0">
                                        <div class="d-flex justify-content-between
                              align-items-center">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clock text-primary" viewBox="0 0 16 16">
                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                </svg>
                                                <div class="ms-2">
                                                    <h5 class="mb-0 text-body fw-bold">الأيام المتبقية</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="mb-0 fw-semibold" style="color: {{$colorIcp}}" >{{now()->diffInDays($companie->icp_end)}} يوم</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>

{{--                    معلومات التواصل           --}}



                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 fw-bold">معلومات الرخصة  </h4>
                                    </div>
                                    <!-- dropdown  -->
                                    <div>
                          <span class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="DropdownTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                            <span class="dropdown-menu" aria-labelledby="DropdownTen">
                              <span class="dropdown-header">الإعدادات</span>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newCatgoryInfo">تحديث</a></span>
                          </span>
                                    </div>
                                </div>


                            </div>
                            <div class="">

                                <ul class="list-group list-group-flush rounded-3 mb-3">
                                    <li class="list-group-item mb-3">
                                        <div class="mb-3"></div>
                                        <div class="text-body fw-bold mb-3">
                                            <span class="text-body fw-bold">رقم الرخصة</span>
                                        </div>
                                        <h5 class="text-body fw-bold"><i class="fa-solid fa-building fs-4 "></i><span class="stand ms-2" onclick="copy(this)" title="انقر لنسخ النص"><b>CN-</b>{{$companie->license_number}}</span></h5>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="text-body fw-bold mb-3">
                                            <span class="text-body fw-bold">الشكل القانوني</span>
                                        </div>
                                        <h5 class="text-body fw-bold mb-3" ><i class="fa-regular fa-copyright fs-4 "></i><span class="ms-2">{{$companie->no_facility}}</span></h5>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>

            </div>





            <div class="col-md-4 col-xl-4 col-4">
                <!-- card  -->
                <div class="card mb-4 bg-primary border-primary">
                    <!-- card body  -->
                    <div class="card-body">

                        <div class="">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="card-title text-white fw-bold">تاريخ انتهاء بوليصة التأمين</h4>
                                </div>
                                <!-- dropdown  -->
                                <div>
                        <span class="dropdown dropstart">
                          <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="DropdownTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                          <span class="dropdown-menu" aria-labelledby="DropdownTen">
                            <span class="dropdown-header">الإعدادات</span>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newCatgoryDaman">تجديد</a></span>
                        </span>
                                </div>
                            </div>
                        </div>


                        <!-- dropdown  -->


                        <div class="d-flex justify-content-between align-items-center mt-8">
                            <div>
                                <h1 class="display-4 " style="color: {{$colorInsurance}}">{{   now()->diffInDays($companie->insurance_end)  }} يوم</h1>
                                <p class="mb-0 text-white">{{ date('d/m/Y', strtotime($companie->insurance_end)) }}</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-5x fa-hospital-user text-light-primary"></i>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- card  -->


                <div dir="ltr" class="col-12 mb-4">
                    <a dir="ltr" href="#" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#newCatgoryAdd" ><i class="fa-regular fa-pen-to-square"></i>إضافة أكونت</a>
                </div>

                @foreach ($account as $key => $accounts)

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0 fw-bold" >{{$accounts->name}}</h4>
                                </div>
                                <!-- dropdown  -->
                                <div>
                        <span class="dropdown dropstart">
                          <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="DropdownTen" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                          <span class="dropdown-menu" aria-labelledby="DropdownTen">
                            <span class="dropdown-header">الإعدادات</span>

                                <form method="POST" action="{{route('DestroyEstablishedAccounts',$accounts->id)}}">
                                    @csrf
                                        <button type="submit" class="btn btn-xs text-danger btn-flat show-alert-delete-box btn-sm dropdown-item" data-toggle="tooltip" title='Delete'  data-template="two" >
                                            حذف
                                            <input  name="_method" type="hidden" value="DELETE">

                                        </button>
                                </form>

                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newCatgoryEdit-{{$accounts->id}}" data-account-id="{{$accounts->id}}">تحديث</a></span>
                        </span>
                          </span>
                                    </span>
                                </div>
                            </div>


                        </div>

                        <div class="">



                            <ul class="list-group list-group-flush rounded-3">


                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-body fw-bold">اسم المستخدم</span>
                                    <span class="stand text-body" onclick="copy(this)" title="انقر لنسخ النص">{{$accounts->user}}</span>
                                    <a href="#" class="text-inherit"><i class="fe fe-user fs-4"></i></a>
                                </li>


                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-body fw-bold">كلمة المرور</span>
                                    <span class="stand text-body" onclick="copy(this)" title="انقر لنسخ النص">{{$accounts->password}}</span>
                                    <a href="#" class="text-inherit"><i class="fa-regular fa-paste"></i></a>
                                </li>

                            </ul>


                        </div>
                    </div>
                </div>

                @endforeach



            </div>





        </div>
        </div>
    </section>
    </main>
    </div>




    <!-- الرخصة -->
    <div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        تجديد بيانات الرخصة
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="{{route('UpdateIicenseCompanies',$companie->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="row">
                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label">تاريخ إصدار الرخصة<span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" type="text" name="license_start" placeholder="Select Date" aria-describedby="basic-addon2" value="{{$companie->license_start}}" >
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label">تاريخ إنتهاء الرخصة<span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" type="text" name="license_end" placeholder="Select Date" aria-describedby="basic-addon2" value="{{$companie->license_end}}">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">تجديد</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->

    <!-- ICP Account -->
    <div class="modal fade" id="newCatgoryICP" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        تجديد  ICP Account
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('UpdateIcpCompanies',$companie->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="row">
                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label">تاريخ إصدار ICP<span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" name="icp_star" type="text" placeholder="Select Date" aria-describedby="basic-addon2" value="{{$companie->icp_start}}">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label">تاريخ إنتهاء ICP<span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" name="icp_end" type="text" placeholder="Select Date" aria-describedby="basic-addon2" value="{{$companie->icp_end}}">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">تجديد</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->

    <!-- تجديد تاريخ انتهاء بوليصة التأمين -->
    <div class="modal fade" id="newCatgoryDaman" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        تجديد  تاريخ انتهاء بوليصة التأمين
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="{{route('UpdateInsuranceEndCompanies',$companie->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="row">


                            <!-- form group -->
                            <div class="mb-3 col-md-12 col-12">
                                <label class="form-label">تاريخ انتهاء بوليصة التأمين<span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" name="insurance_end" type="text" placeholder="تاريخ انتهاء بوليصة التأمين" aria-describedby="basic-addon2" value="{{$companie->insurance_end}}">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>


                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">تجديد</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->

    <!-- تجديد معلومات الرخصة -->
    <div class="modal fade" id="newCatgoryInfo" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        تجديد  معلومات الرخصة
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="{{route('UpdateLicenseNumberCompanies',$companie->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row">

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">رقم الرخصة<span class="text-danger">*</span></label>
                                <input type="text" name="license_number" value="{{$companie->license_number}}" class="form-control" placeholder=" رقم الرخصة " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label">الشكل القانوني<span class="text-danger">*</span></label>
                                <select class="selectpicker" name="no_facility" data-width="100%">
                                    @foreach ($LegalForm as $item)
                                        <option value="{{ $item->name }}" {{ ( $item->name == $companie->no_facility) ? 'selected' : '' }}> {{ $item->name }} </option>

                                    @endforeach

                                </select>
                            </div>


                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">تجديد</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->


    <!-- تجديد معلومات التواصل-->
    <div class="modal fade" id="newCatgoryInfoCon" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        تجديد  معلومات التواصل
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="{{route('UpdateContactInfoCompanies',$companie->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="row">

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">رقم الهاتف<span class="text-danger">*</span></label>
                                <input type="text" name="phone_number" value="{{$companie->phone_number}}" class="form-control" placeholder=" رقم الهاتف " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">البريد الإلكتروني<span class="text-danger">*</span></label>
                                <input  type="text" name="email" value="{{$companie->email}}" class="form-control" placeholder="  البريد الإلكتروني " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-12">
                                <label class="form-label">العنوان<span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{$companie->address}}" class="form-control" placeholder="  العنوان " required>
                            </div>


                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">تجديد</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->


    <!--  إضافة أكونت -->
    <div class="modal fade" id="newCatgoryAdd" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        إضافة أكونت
                    </h4>
                    <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="{{route('StoreEstablishedAccounts')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="row">
                            <input hidden="hidden" type="text" name="companie_id" class="form-control" value="{{$companie->id}}" required>

                            <!-- form group -->
                            <div class="mb-3 col-12">
                                <label class="form-label">اسم المنصة<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="   اسم المنصة   " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">اسم المستخدم<span class="text-danger">*</span></label>
                                <input type="text" name="user" class="form-control" placeholder="   اسم المستخدم  " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">كلمة المرور<span class="text-danger">*</span></label>
                                <input type="text" name="password" class="form-control" placeholder="  ***** " required>
                            </div>


                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">إضافة</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->

    <!--  تعديل أكونت -->
    @foreach ($account as $key => $accounts)

        <div class="modal fade" id="newCatgoryEdit-{{$accounts->id}}" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        تعديل الاكونت
                    </h4>
                    <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="{{route('EditEstablishedAccounts',$accounts->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="row">
{{--                        <input type="hidden" name="account_id" class="form-control" value="{{$companie->id}}" required>--}}
                            <input type="hidden" name="account_id" class="form-control" value="{{$accounts->id}}">

                            <!-- form group -->
                            <div class="mb-3 col-12">
                                <label class="form-label">اسم المنصة<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{$accounts->name}}" placeholder="   اسم المنصة   " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">اسم المستخدم<span class="text-danger">*</span></label>
                                <input type="text" name="user" class="form-control" value="{{$accounts->user}}" placeholder="   اسم المستخدم  " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">كلمة المرور<span class="text-danger">*</span></label>
                                <input type="text" name="password" class="form-control" value="{{$accounts->password}}" placeholder="  ***** " required>
                            </div>


                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">تعديل</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @endforeach

    <!-- تعديل أكونت -->

@endsection

@section('script')









    <script src="{{URL::asset('assets/js/ajax/sweetalert.min.js')}}"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "هل انت تريد حذف الاكونت ؟",
                text: "",
                icon: "warning",
                type: "warning",
                buttons: ["رجوع","حذف !"],
                confirmButtonColor: '#ffffff',
                cancelButtonColor: '#dddddd',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>

    <script>

        $("#kt_datatable_dom_positioning").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });

    </script>

    <script>

        $(document).ready(function () {
            $('#dt-filter-search').dataTable({

                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var search = $(`<input class="form-control form-control-sm" type="text" placeholder="Search">`)
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change input', function () {
                                var val = $(this).val()

                                column
                                    .search( val ? val : '', true, false )
                                    .draw();
                            } );

                    } );
                }
            });
        });


    </script>

    <script>
        function copy(that) {
            var inp = document.createElement('input');
            document.body.appendChild(inp);
            inp.value = that.textContent;
            inp.select();
            document.execCommand('copy', false);
            inp.remove();

            // إظهار رسالة بأنه تم نسخ النص
            var tooltip = document.createElement('span');
            tooltip.innerHTML = "تم النسخ!";
            tooltip.style.position = "absolute";
            tooltip.style.top = "0";
            tooltip.style.left = "50%";
            tooltip.style.transform = "translateX(-50%)";
            tooltip.style.padding = "5px 10px";
            tooltip.style.background = "#333";
            tooltip.style.color = "#fff";
            tooltip.style.borderRadius = "4px";
            tooltip.style.opacity = "0";
            tooltip.style.transition = "opacity 0.3s ease";
            that.appendChild(tooltip);
            setTimeout(function() {
                tooltip.style.opacity = "1";
            }, 100);
            setTimeout(function() {
                tooltip.style.opacity = "0";
                setTimeout(function() {
                    that.removeChild(tooltip);
                }, 300);
            }, 1500);
        }
    </script>



@endsection
