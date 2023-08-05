@extends('layouts.app_site.app')
@section('title')
     تحديث شركة - {{$companie->name}}
@stop
@section('content')



<!-- Container fluid -->
<section class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-0 h2 fw-bold mb-3">  تحديث بيانات الشركة  </h1>
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
                                <a href="{{url('AllCompanies')}}">جميع الشركات</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                تحديث شركة  | {{$companie->name}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                    <!-- button -->
                    <a href="{{url('AllCompanies')}}" class="btn btn-primary me-2"> الرجوع للخلف  <i class="fa-solid fa-angles-left"></i></a>
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
                <form action="{{route('UpdateNameCompanie',$companie->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <h4 class="mb-4">تحديث أسم الشركة </h4>
                            <!-- row -->
                            <div class="row gx-3">
                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"> اسم الشركة</label>
                                    <input type="text" name="name" class="form-control" placeholder=" اسم الشركة" value="{{$companie->name}}"  >
                                </div>
                                <div class="mb-2 col-md-6">

                                <label class="form-label" for="country"><b>الإمارة</b></label>
                                <select class="form-select" name="emirate" aria-label="Default select example" id="Principality" required>
                                    @foreach ($uae as $item)
                                        <option value="{{ $item->uae }}" {{ ( $item->uae == $companie->emirate) ? 'selected' : '' }}> {{ $item->uae }} </option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <!-- buttons -->
                        <a href="{{url('AllCompanies')}}" class="btn btn-outline-primary me-2">الغاء</a>
                        <button class="btn btn-primary" type="submit"> تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </section>




@endsection
