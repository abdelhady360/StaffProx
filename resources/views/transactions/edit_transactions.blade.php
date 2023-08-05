
@extends('layouts.app_site.app')
@section('title')
    تحديث خدمة - {{$edittransaction->name}}
@stop
<!-- START section -->
@section('stylesheet')
    <!-- START ckeditor5 js -->
    <script src="{{URL::asset('assets/libs/ckeditor5/38.0.1/classic/ckeditor.js')}}"></script>
@endsection
<!-- END section -->
@section('content')


<!-- Container fluid -->
<section class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-0 h2 fw-bold mb-3"> تحديث الخدمة</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('Home')}}">لوحة القايدة</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('AllTransactions')}}">جميع الخدمات</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$edittransaction->name}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                    <!-- button -->
                    <a href="{{url('AllTransactions')}}" class="btn btn-primary me-2"> الرجوع للخلف  <i class="fa-solid fa-angles-left"></i></a>
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
                <form action="{{route('UpdateTransactions',$edittransaction->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <h4 class="mb-4">تحديث خدمة | {{$edittransaction->name}} </h4>
                            <!-- row -->
                            <div class="row gx-3">
                                <!-- input -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="firstName"><b>اسم الخدمة</b></label>
                                    <input type="text" name="name" class="form-control" placeholder="اسم الخدمة"  value="{{$edittransaction->name}}" required>
                                </div>

                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"><b> الرسوم القانونية</b></label>
                                    <input type="number" name="lfees" class="form-control" placeholder="AED 00.000" id="governmentFees" value="{{$edittransaction->lfees}}" required>
                                </div>
                                <!-- input -->

                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"><b> فايدة المكتب</b></label>
                                    <input type="number" name="ofees" class="form-control" placeholder="AED 00.000" id="officeFees"value="{{$edittransaction->ofees}}" required>
                                </div>
                                <!-- input -->

                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">

                        <!-- card body -->
                        <div class="card-body">

                            <!-- row -->
                            <div class="row gx-3">
                                <!-- input -->

                                <!-- input -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="firstName"><b>تقديــم الطلـب</b></label>
                                    <input type="url" name="url" class="form-control" placeholder="URL" id="url" value="{{$edittransaction->url}}" required>
                                </div>
                                <!-- input -->

                                <!-- input -->
                                <div class="mb-2 col-md-2">
                                    <label class="form-label" for="country"><b>الإمارة</b></label>
                                    <select class="form-select" name="emirate" aria-label="Default select example" id="Principality" required>
                                        @foreach ($uae as $item)
                                            <option value="{{ $item->uae }}" {{ ( $item->uae == $edittransaction->emirate) ? 'selected' : '' }}> {{ $item->uae }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- input -->

                                <!-- input -->
                                <div class="mb-2 col-md-4">
                                    <label class="form-label" for="country"><b>الهيئة</b></label>
                                    <select class="form-select" name="authority" aria-label="Default select example" id="Principality" required>
                                        @foreach ($authority as $item)
                                            <option value="{{ $item->authority }}" {{ ( $item->authority == $edittransaction->authority) ? 'selected' : '' }}> {{ $item->authority }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- input -->

                                <!-- input -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="firstName"> الوصف </label>
                                    <textarea type="text" name="info" class="form-control" placeholder="الوصف"  required>{{$edittransaction->info}}</textarea>
                                </div>



                        </div>
                    </div>

                    </div>

                    <div class="card mb-4">

                        <!-- card body -->
                        <div class="card-body">

                            <!-- row -->
                            <div class="row gx-3">

                                <!-- input -->
                                    <div class="mb-3 col-12">
                                        <label class="form-label">  خطوات المعاملة   <span class="text-danger">*</span></label>

                                        <textarea name="sinfo" id="editor">{{$edittransaction->sinfo}}</textarea>

                                    </div>
                                <!-- input -->
                                <!-- input -->
                                <div class="mb-3 col-12">
                                    <label class="form-label"> ملحوظات   <span class="text-danger">*</span></label>

                                    <textarea name="note" id="editor1">{{$edittransaction->note}}</textarea>

                                </div>
                                <!-- input -->
                                <!-- input -->
                                <div class="mb-3 col-12">
                                    <label class="form-label"> الوثائق المطلوبة   <span class="text-danger">*</span></label>

                                    <textarea name="doc" id="editor2">{{$edittransaction->doc}}</textarea>


                                </div>
                                <!-- input -->

                            </div>
                        </div>

                    </div>



                    <div class="d-flex justify-content-end">
                        <!-- buttons -->
                        <a href="{{url('AllTransactions')}}" class="btn btn-outline-primary me-2">رجوع</a>
                        <button class="btn btn-primary" type="submit"> تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


{{--    <div class="mb-3 col-12">--}}

{{--        <div id="editor"></div>--}}
{{--        <input type="hidden" id="quill_html" name="name">--}}

{{--    </div>--}}
@endsection

<!-- START section -->
@section('script')

    <!-- START ckeditor5 js -->
    <script>
        ClassicEditor

            .create( document.querySelector( '#editor' ), { language: 'ar' } )
            .catch( error => { console.error( error ); });
    </script>
    <!-- END ckeditor5 js -->

    <!-- START ckeditor5 js -->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ), { language: 'ar' } )
            .catch( error => { console.error( error ); });
    </script>
    <!-- END ckeditor5 js -->

    <!-- START ckeditor5 js -->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor2' ), { language: 'ar' } )
            .catch( error => { console.error( error ); });
    </script>
    <!-- END ckeditor5 js -->

    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script> -->

@endsection
<!-- END section -->
