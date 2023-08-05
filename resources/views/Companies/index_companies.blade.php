@extends('layouts.app_site.app')
@section('title')
     الشركات
@stop
@section('content')



    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-lg-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3"> الشركات  </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}">لوحة القيادة</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    الشركات
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

{{--                        <a href="#" class="btn btn-primary me-2">كُفَلاَءُ</a>--}}

                        <a href="{{url('Faqs')}}" class="btn btn-primary me-2">الأسئلة </a>

                        <a href="{{url('Researchs')}}" class="btn btn-primary me-2">الاستعلام </a>

                        <a href="{{url('Home')}}" class="btn btn-primary me-2">الخدمات </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-4 col-12">
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

            <div class="col-xl-3 col-lg-6 col-md-4 col-12">
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

            <div class="col-xl-3 col-lg-6 col-md-4 col-12">
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

            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
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

                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpAccommodations}}</span> إقامة عمل </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$EXPAccommodation->count()}}</span> إقامة إنتهت </span>


                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
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
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpVisas}}</span> تأشيرة عمل </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$EXPVesa->count()}}</span> تأشيرة إنتهت </span>


                    </div>
                </div>
            </div>



            <div class="col-xl-2 col-lg-4 col-md-4 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">تصاريح قاربت علي الانتهاء</span>
                            </div>
                            <div>
                                <span class="fa-regular fa-file-lines fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$EXPPermitWorkExpired->count()}}</span> تصريح عمل </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$EXPPermitWorkEnd->count()}}</span> تصاريح إنتهت </span>

                    </div>
                </div>
            </div>



            <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">جوازات قاربت علي الانتهاء</span>
                            </div>
                            <div>
                                <span class="fa-regular fa-address-card fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpVisaPasspors + $CountExpAccommodationPasspors}}</span> جواز سفر </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$EXPVisaPasspors->count() + $EXPAccommodationPasspors->count()}}</span> جوازات إنتهت </span>


                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="fs-6 text-uppercase fw-semibold">بالوصية قاربت علي الانتهاء</span>
                            </div>
                            <div>
                                <span class=" fa-regular fa-hospital fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">{{$CountExpCompanieInsurances}}</span> بالوصية ضمان </h2>
                        <span class="fs-6 text-uppercase fw-semibold" > <span style="color:red">{{$EXPInsurance->count()}}</span> بالوصية إنتهت </span>

                    </div>
                </div>
            </div>

        </div>




        <br>


        <div class="row">

            <!-- Card -->
            <div class="card rounded-3">
                <!-- Table -->
                <br>
                <table id="dt-filter-search" class="table table-hover table-row-bordered  border rounded">
                    <thead>
                    <tr class="table-light">
                        <th scope="col"><b>#</b></th>
                        <th scope="col"><b>الشركة</b></th>
                        <th scope="col"><b>اللإمارة</b></th>
                        <th scope="col"><b>التفاصيل</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($companie as $key => $companies)
                        <tr>

                            <td><div class="form-check"><input type="checkbox" class="form-check-input" id="orderTwo" ><label class="form-check-label" for="orderTwo"></label></div></td>
                            <td> <a href="{{route('WatchCompanies',$companies->slug)}}" class="fw-bold" style="color: #64748b;" title="{{$companies->name}}"> <b> {{$companies->name}} </b> </a> </td>
                            <td title="{{$companies->emirate}}"> <i class="fe fe-map-pin text-muted fa-lg"></i> <b> {{$companies->emirate}} </b> </td>
                            <td> <a href="{{route('WatchCompanies',$companies->slug)}}" title="تفاصيل الشركة" target="_blank" class="btn "><i class="fa-regular fa-eye  fa-lg"></i></a> </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>


        </div>
        </div>












        </div>
        </div>
        <!-- Tab Pane -->
        <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
            <!-- Card -->
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <input type="search" class="form-control" placeholder="Search Students" >
                </div>



    </section>


@endsection
@section('script')

    <script>

        $(document).ready(function () {
            $('#dt-filter-search').dataTable({

                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var search = $(`<input class="form-control form-control-sm" type="text" placeholder="بحث">`)
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
