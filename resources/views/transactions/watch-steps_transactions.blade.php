@extends('layouts.app_site.app')
@section('title')
    {{$transaction->name}}
@stop
@section('content')

    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">خدمة | {{$transaction->name}}</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}">لوحة القيادة</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('InfoTransactions',$transaction->slug)}}">  {{$transaction->name}} </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    خطوات الخدمة
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="javascript:history.back()" class="btn btn-primary me-2">  الرجوع للخلف  <i class="fa-solid fa-angles-left"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- card -->
                <div class="card mb-4">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- img -->
                            <div class="icon-shape icon-lg rounded-3 border p-4 "> <i class="fa-regular fa-bookmark fs-3 text-primary"></i> </div>
                            <div class="ms-4">
                                <!-- text -->
                                <h1 class="mb-1 fw-bold mb-2">{{$transaction->name}}</h1>
                                <div>
                                    <span class="ms-3"><i class="fa-brands fa-nfc-directional  me-2"></i>    {{$transaction->authority}}</span>
                                    <span class="ms-3"><i class="fe fe-map-pin text-muted me-2"></i> تابع لــإمارة {{$transaction->emirate}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card body -->
                    <div class="card-body border-top">
                        <div class="hstack gap-2 justify-content-between d-md-flex d-inline">
                            <!-- text -->
                            <div class="mb-3">
                                <span class="fw-semibold"><b>الرسوم</b></span>
                                <div class="mt-2">
                                    <h5 class="h3 fw-bold mb-0">  AED {{ number_format( $transaction->lfees, 2, ',', '.')}}  </h5>
                                    <span>رسوم المعاملة القانونية  </span>
                                </div>
                            </div>
                            <!-- text -->
                            <div class="mb-3">
                                <span class="fw-semibold"> <b>الفايدة</b> </span>
                                <div class="mt-2">
                                    <h5 class="h3 fw-bold mb-0"> AED {{ number_format( $transaction->ofees, 2, ',', '.') }} </h5>
                                    <span>رسوم فايدة المكتب </span>
                                </div>
                            </div>
                            <!-- text -->
                            <div>
                                <span class="fw-semibold"><b>إجمالي</b></span>
                                <div class="mt-2">
                                    <h5 class="h3 fw-bold mb-0"> AED {{number_format( $transaction->ofees + $transaction->lfees , 2, ',', '.')}} </h5>
                                    <span>إجمالي رسوم المعاملة </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card -->
                <div class="mb-4">
                    <div class="card">
                        <!-- card body -->
                        <div class="card-header "><h4 class="mb-0 fw-bold"> خطوات الخدمة </h4></div>
                        <div class="card-body">
                            <p class="h4"> {!! $transaction->sinfo !!}</p>
                        </div>
                    </div>
                </div>

                <!-- card -->
                <div class="mb-4">
                    <div class="card">
                        <!-- card body -->
                        <div class="card-header "><h4 class="mb-0 fw-bold"> ملحوظات </h4></div>
                        <div class="card-body">
                            <p class="h4"> {!! $transaction->note !!}</p>
                        </div>
                    </div>
                </div>

                <!-- card -->
                <div class="mb-4">
                    <div class="card">
                        <!-- card body -->
                        <div class="card-header "><h4 class="mb-0 fw-bold"> المستندات المطلوبة </h4></div>
                        <div class="card-body">
                            <p class="h4"> {!! $transaction->doc !!}</p>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-4">
                <!-- card -->
                <div class="card mt-4 mt-lg-0 mb-5">
                    <!-- card body -->
                    <div class="card-body ">
                        <div style="width:100%;text-align:center" class="d-flex justify-content-between align-items-center ">
                            <!-- <h4 class="mb-0 "> <b>ابدأ الأن</b> </h4> -->
                            <a style="width:100%;text-align:center" title="ابدأ الأن" href="{{$transaction->url}}" target="_blank" class="btn center"><i class="fa-regular fa-paper-plane  fa-5x"></i></a>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="card mt-4 mt-lg-0 mb-5">
                    <!-- card body -->
                    <div class="card-body ">
                        <div style="width:100%;text-align:center" class="d-flex justify-content-between align-items-center ">
                            <h4 class="mb-0 " style="color: #64748b;"> <b>
                                    <p class="">" قَالَ َ رسولَ اللهِ صلَّى اللهُ عليه وسلَّم "</p>
                                    <p class=" lh-lg">كَلِمَتانِ خَفِيفَتانِ علَى اللِّسانِ، ثَقِيلَتانِ في المِيزانِ، حَبِيبَتانِ إلى الرَّحْمَنِ</p>
                                    <p class="">" سُبْحانَ اللَّهِ وبِحَمْدِهِ، سُبْحانَ اللَّهِ العَظِيمِ "</p>
                                </b> </h4>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="card mt-4 mt-lg-0 mb-5">
                    <!-- card body -->
                    <div class="card-body ">
                        <div style="width:100%;text-align:center" class="d-flex justify-content-between align-items-center ">
                            <h4 class="mb-0 "> <b>
                                    <p class="lh-lg" style="color: #64748b;" >"لا تتوقف عن الحلم حتى لو بات حلمك مستحيلاً فالإصرار على التفاؤل قد يصنع ما كان مستحيلاً "</p>

                                </b> </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
