@extends('layouts.app_site.app')
@section('title')
    الخدمات
@stop

<!-- START section -->
@section('stylesheet')
    <!-- START ckeditor5 js -->
    <script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
@endsection
<!-- END section -->

@section('content')

    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-lg-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="mb-3 h2 fw-bold"> الخدمات </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}">لوحة القيادة</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    الخدمات
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex">
                        <div class="input-group me-3  ">
                            <input class="form-control flatpickr" type="datetime" placeholder="{{now()->toFormattedDateString()}}" aria-describedby="basic-addon2">

                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>

                        </div>
                        <a href="{{url('Companies')}}" class="btn btn-primary me-2">الشركات</a>

                        <a href="{{url('Faqs')}}" class="btn btn-primary me-2">الأسئلة </a>

                        <a href="{{url('Researchs')}}" class="btn btn-primary me-2">الإستعلامات </a>

                        <a href="{{url('Transactions')}}" class="btn btn-primary me-2">الخدمات </a>

                        <a href="{{url('Home')}}" class="btn btn-primary me-2"> لوحةالقيادة</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">الخدمات المتوفرة</span>
                            </div>
                            <div>
                                <span class="fa-regular fa-bookmark fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">
                            {{$transaction->count()}} خدمة
                        </h2>
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
                                <span class="fs-6 text-uppercase fw-semibold">الاستعلامات المتوفرة</span>
                            </div>
                            <div>
                                <span class=" fa-solid fa-magnifying-glass fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">
                            {{$research->count()}} إستعلام
                        </h2>
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
                                <span class="fs-6 text-uppercase fw-semibold">الأسئلة المتكررة المتوفرة</span>
                            </div>
                            <div>
                                <span class=" fa-regular fa-comments fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">
                            {{$faq->count()}} سؤال
                        </h2>
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
                                <span class="fs-6 text-uppercase fw-semibold">عدد الشركات</span>
                            </div>
                            <div>
                                <span class=" fa-regular fa-building fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">
                            {{$companie->count()}} شركات
                        </h2>

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

                            <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpAccommodations}}</span> إقامة </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpAccommodations}}</span> إقامة إنتهت </span>


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
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpVisas}}</span> تأشيرة </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpAccommodations}}</span> تأشيرات إنتهت </span>


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
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpVisaPasspors + $CountExpAccommodationPasspors}}</span> جواز </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpAccommodations}}</span> جوزات سفر إنتهت </span>


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
                                <span class="fs-6 text-uppercase fw-semibold">بالوصية ضمان قاربت علي الانتهاء</span>
                            </div>
                            <div>
                                <span class=" fa-regular fa-hospital fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpCompanieInsurances}}</span> بالوصية </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$CountExpAccommodations}}</span> بالوصية تأمن إنتهت </span>

                    </div>
                </div>
            </div>

        </div>

                <div class="row">

                <!-- Card -->
                <div class="card rounded-3">
                                <!-- Table -->
                                    <br>
                                        <table id="dt-filter-search" class="table table-hover table-row-bordered  border rounded">
                                            <thead>
                                            <tr class="table-light">
                                                <th scope="col"><b>#</b></th>
                                                <th scope="col"><b>الخدمة</b></th>
                                                <th scope="col"><b>الرسوم</b></th>
                                                <th scope="col"><b>اللإمارة</b></th>
                                                <th scope="col"><b>ابدأ</b></th>
                                                <th scope="col"><b>التفاصيل</b></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($transaction as $key => $transactions)
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="orderTwo" ><label class="form-check-label" for="orderTwo"></label></div></td>
                                                    <td> <a href="{{route('InfoTransactions',$transactions->slug)}}" target="_blank" class="fw-bold" style="color: #64748b;"> <b> {{$transactions->name}} </b> </a> </td>
                                                    <td> AED <b> {{number_format(  $transactions->ofees + $transactions->lfees , 2, ',', '.')}} </b> </td>
                                                    <td> <i class="fe fe-map-pin text-muted fa-lg"></i> <b> {{$transactions->emirate}} </b> </td>
                                                    <td> <a href="{{$transactions->url}}" target="_blank" class="btn "><i class="fa-regular fa-paper-plane  fa-lg"></i></a> </td>
                                                    <td> <a href="{{route('InfoTransactions',$transactions->slug)}}" class="btn "><i class="fa-regular fa-eye  fa-lg"></i></a> </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection


@section('script')

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

@endsection
