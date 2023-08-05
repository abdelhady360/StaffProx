
@extends('layouts.app_site.app')
@section('title')

    تحديث إقامة  - {{$Accommodation->name}}

@stop
@section('content')


<!-- Container fluid -->
<section class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-0 h2 fw-bold mb-3">  تحديث إقامة |  {{$Accommodation->name}}  </h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('Home')}}"> لوحه القيادة</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('Companies')}}">الشركات</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('WatchCompanies',$Accommodation->companie->slug)}}">{{$Accommodation->companie->name}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('AllAccommodation',$Accommodation->companie->slug)}}">جميع الإقامات</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                تحديث إقامة | {{$Accommodation->name}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                    <!-- button -->
                    <a href="{{route('AllAccommodation',$Accommodation->companie->slug)}}" class="btn btn-primary me-2"> الرجوع للخلف  <i class="fa-solid fa-angles-left"></i></a>
                    <!-- <a href="#" class="btn btn-outline-dark me-2"  >  الرجوع للخلف  <i class="fa-solid fa-angles-left"></i> </a> -->
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-12">

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif

                <!-- card -->
                <form action="{{route('UpdateAccommodation',$Accommodation->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <input hidden="hidden" type="text" name="companie_id" class="form-control" placeholder="اسم الموظف"  value="{{$Accommodation->companie_id}}" required>

                            <!-- row -->
                            <div class="row gx-3">
                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"> اسم الموظف </label>
                                    <input type="text" name="name" class="form-control" placeholder="اسم الموظف"  value="{{$Accommodation->name}}" required>
                                </div>




                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"> الرقم الموحد الاماراتي  </label>
                                    <input type="text" name="unified_no" class="form-control" placeholder="الرقم الموحد الاماراتي"  value="{{$Accommodation->unified_no}}" required>
                                </div>

                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"> رقم الهوية  </label>
                                    <input type="text" name="id_number" class="form-control" placeholder="رقم الهوية"  value="{{$Accommodation->id_number}}" required>
                                </div>

                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"> رقم الجواز  </label>
                                    <input type="text" name="passport_number" class="form-control" placeholder="رقم الجواز"  value="{{$Accommodation->passport_number}}" required>
                                </div>

                                <!-- input -->
                                <div class="mb-2 col-md-3">
                                    <label class="form-label" for="country"><b>النوع</b></label>
                                    <select class="form-select" name="sex" aria-label="Default select example" id="Principality" required>
                                        @foreach ($sex as $item)
                                            <option value="{{ $item->sex }}" {{ ( $item->sex == $Accommodation->sex) ? 'selected' : '' }}> {{ $item->sex }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- input -->


                                <!-- form group -->
                                <div class="mb-3 col-md-6 col-6">
                                    <label class="form-label">تاريخ الميلاد <span class="text-danger"></span></label>
                                    <div class="input-group ">
                                        <input class="form-control flatpickr" value="{{$Accommodation->dob}}" type="text" name="dob" placeholder="تاريخ الميلاد" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>


                                <!-- form group -->
                                <div class="mb-3 col-3">
                                    <label class="form-label"> الجنسية <span class="text-danger"></span></label>
                                    <input type="text" name="nationality" class="form-control" placeholder=" الجنسية" value="{{$Accommodation->nationality}}" required>
                                </div>

                                <!-- form group -->
                                <div class="mb-6 col-md-3 col-12">
                                    <label class="form-label"> تاريخ اصدار الإقامة <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$Accommodation->accommodation_start}}" type="text" name="accommodation_start" placeholder="تاريخ اصدار الإقامة" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-6 col-md-3 col-12">
                                    <label class="form-label"> تاريخ انتهاء الإقامة <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$Accommodation->accommodation_end}}" type="text" name="accommodation_end" placeholder="تاريخ انتهاء الإقامة" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-6 col-md-3 col-12">
                                    <label class="form-label"> تاريخ اصدار تصريح العمل <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$Accommodation->PermitWork_start}}" type="text" name="PermitWork_start" placeholder="تاريخ اصدار تصريح العمل" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-6 col-md-3 col-12">
                                    <label class="form-label"> تاريخ انتهاء تصريح العمل <span class="text-danger"></span></label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" value="{{$Accommodation->PermitWork_end}}" type="text" name="PermitWork_end" placeholder="تاريخ انتهاء تصريح العمل" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                                <!-- form group -->
                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label">تاريخ اصدار الجواز <span class="text-danger"></span></label>
                                    <div class="input-group ">
                                        <input class="form-control flatpickr" value="{{$Accommodation->passpor_start}}" type="text" name="passpor_start" placeholder="تاريخ اصدار الجواز" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>
                                <!-- form group -->
                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label">تاريخ انتهاء الجواز <span class="text-danger"></span></label>
                                    <div class="input-group ">
                                        <input class="form-control flatpickr" value="{{$Accommodation->passpor_end}}" type="text" name="passpor_end" placeholder="تاريخ انتهاء الجواز" aria-describedby="basic-addon2">
                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                    </div>
                                </div>

                                <!-- form group -->





                            </div>
                        </div>
                    </div>




                    <div class="d-flex justify-content-end">
                        <!-- buttons -->
                        <a href="{{route('AllAccommodation',$Accommodation->companie->slug)}}" class="btn btn-outline-primary me-2">رجوع</a>
                        <button class="btn btn-primary" type="submit"> تحديث</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection


