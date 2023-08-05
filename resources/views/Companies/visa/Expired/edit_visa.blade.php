@extends('layouts.app_site.app')
@section('title')
       تجديد التأشيرة | {{$Visa->name}}
@stop
@section('content')


<!-- Container fluid -->
<section class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-0 h2 fw-bold mb-3">  تجديد التأشيرة  </h1>
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
                                <a href="{{url('AllVisaExpired')}}">تأشيرات قاربت علي انتهائها 30 يوم</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                تجديد التأشيرة  | {{$Visa->name}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                    <!-- button -->
                    <a href="{{url('AllVisaExpired')}}" class="btn btn-primary me-2"> الرجوع للخلف  <i class="fa-solid fa-angles-left"></i></a>
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
                <form action="{{route('UpdateVisaExpired',$Visa->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <h4 class="mb-4 mb-5"><b>تجديد التأشيرة</b></h4>
                            <!-- row -->
                            <div class="row gx-3">

                                <!-- form group -->
                                <div class="mb-6 col-md-6 col-6">
                                    <label class="form-label"> أسم الموظف <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input disabled class="form-control flatpickr fs-5 fw-bold" value="{{$Visa->name}}">
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-6 col-md-6 col-6">
                                    <label class="form-label"> أسم الشركة <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input disabled class="form-control flatpickr fs-5 fw-bold" value="{{$Visa->companie->name}}">
                                    </div>
                                </div>
                                <!-- form group -->
                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label"> تاريخ اصدار التأشيرة <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$Visa->visa_start}}" type="text" name="visa_start" placeholder="تاريخ اصدار التأشيرة" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label"> تاريخ انتهاء التأشيرة <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$Visa->visa_end}}" type="text" name="visa_end" placeholder="تاريخ انتهاء التأشيرة" aria-describedby="basic-addon2">
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
