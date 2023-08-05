@extends('layouts.app_site.app')
@section('title')
    إقامات قاربت على الانتهاء
@stop
@section('content')


    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-lg-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold"> إقامات قاربت على الانتهاء   </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"> الشركات</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    إقامات قاربت على الانتهاء
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex">
                        <div class="input-group me-3  ">
                            <input class="form-control flatpickr" type="datetime" placeholder="Select Date" aria-describedby="basic-addon2">

                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>

                        </div>
                        <a href="#" class="btn btn-primary me-2">الشركات</a>
                        <a href="#" class="btn btn-primary me-2">الاستعلام </a>
                        <a href="#" class="btn btn-primary me-2">الخدمات</a>
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
                                <span class="fs-6 text-uppercase fw-semibold">إقامات قاربت على الانتهاء</span>
                            </div>
                            <div>
                                <span class="fa-regular fa-compass fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">0</span> إقامة </h2>

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
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">0</span> تأشيرة </h2>

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
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">0</span> جواز </h2>

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
                        <h2 class="fw-bold mb-1" > <span style="color:rgb(255 175 26);">0</span> بالوصية </h2>
                    </div>
                </div>
            </div>

        </div>


        <div class="d-flex justify-content-between border-bottom  mt-2">

        </div>

        <br>
        <div class="row">


            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <!-- Card -->
                <a href="#">
                    <div class="card mb-4">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="text-center">
                                <div class="position-relative">
                                    <div class="icon-shape icon-lg rounded-3 border p-4 mb-4"><i class=" fa-regular fa-circle-user text-primary fa-2x"></i></div></div>
                                <h3 class="mb-0 mb-3">  عبدالهادي محمد</h3>
                                <p class="mb-0"><i class=" fa-regular fa-building fa-6"></i> مكتب ملفاتي للطباعة </p>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                <span class="fw-bold">عدد الايام المتبقية    </span>
                                <span class="text-dark fw-bold" >يوم 5</span>
                            </div>

                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span class="fw-bold">تاريخ انتهاء الاقامات </span>
                                <span class="text-danger fw-bold"> 25/06/2023 </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <!-- Card -->
                <a href="#">
                    <div class="card mb-4">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="text-center">
                                <div class="position-relative">
                                    <div class="icon-shape icon-lg rounded-3 border p-4 mb-4"><i class=" fa-regular fa-circle-user text-primary fa-2x"></i></div></div>
                                <h3 class="mb-0 mb-3">  عبدالهادي محمد</h3>
                                <p class="mb-0"><i class=" fa-regular fa-building fa-6"></i> مكتب ملفاتي للطباعة </p>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                <span class="fw-bold">عدد الايام المتبقية    </span>
                                <span class="text-dark fw-bold" >يوم 5</span>
                            </div>

                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span class="fw-bold">تاريخ انتهاء الاقامات </span>
                                <span class="text-danger fw-bold"> 25/06/2023 </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-lg-12 col-md-12 col-12">
                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled"><a class="page-link mx-1 rounded" href="#" ><i class="fa fa-chevron-right"></i></a> </li>
                        <li class="page-item active"> <a class="page-link mx-1 rounded" href="#">1</a> </li>
                        <li class="page-item"><a class="page-link mx-1 rounded" href="#"><i class="fa fa-chevron-left"></i></a></li>
                    </ul>
                </nav>
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

    </main>
    </div>




@endsection
