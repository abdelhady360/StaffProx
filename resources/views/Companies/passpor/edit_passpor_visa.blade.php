@extends('layouts.app_site.app')
@section('title')
       تجديد جواز السفر | {{$passpor->name}}
@stop
@section('content')



    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">  تجديد جواز السفر  </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}"> لوحه القايدة</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('Companies')}}"> الشركات</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('AllPassporExpired')}}">جوزات سفر قارب علي انتهائها 30 يوم</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    تجديد جواز السفر  | {{$passpor->name}}
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- button -->
                        <a href="{{url('AllPassporExpired')}}" class="btn btn-primary me-2"> الرجوع للخلف  <i class="fa-solid fa-angles-left"></i></a>
                        <!-- <a href="#" class="btn btn-outline-dark me-2"  >  الرجوع للخلف  <i class="fa-solid fa-angles-left"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-xl-3 col-xl-6 col-12">

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif

                <!-- card -->
                <form action="{{route('UpdatePassporVisaExpired',$passpor->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <h4 class="mb-4 mb-5"><b>تجديد جواز السفر</b></h4>
                            <!-- row -->
                            <div class="row gx-3">
                                <!-- form group -->
                                <div class="mb-6 col-md-6 col-6">
                                    <label class="form-label"> أسم الموظف <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input disabled class="form-control flatpickr fs-5 fw-bold" value="{{$passpor->name}}">
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-6 col-md-6 col-6">
                                    <label class="form-label"> أسم الشركة <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input disabled class="form-control flatpickr fs-5 fw-bold" value="{{$passpor->companie->name}}">
                                    </div>
                                </div>
                                <!-- form group -->
                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label"> تاريخ اصدار جواز السفر <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$passpor->passpor_start}}" type="text" name="passpor_start" placeholder="تاريخ اصدار جواز السفر" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label"> تاريخ انتهاء جواز السفر <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$passpor->passpor_end}}" type="text" name="passpor_end" placeholder="تاريخ انتهاء جواز السفر" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <!-- buttons -->
                        <a href="{{url('Home')}}" class="btn btn-outline-primary me-2">الغاء</a>
                        <button class="btn btn-primary" type="submit"> تجديد</button>
                    </div>
                </form>
            </div>
        </div>
    </section>




@endsection
