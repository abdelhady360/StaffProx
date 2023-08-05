
@extends('layouts.app_site.app')
@section('title')
    إضافة إستعلام
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
                    <h1 class="mb-0 h2 fw-bold mb-3">إضافة إستعلام</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('Home')}}">لوحة القايدة</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('AllResearchs')}}">جميع الإستعلامات</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                إضافة استعلام
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                    <!-- button -->
                    <a href="{{url('AllResearchs')}}" class="btn btn-primary me-2"> الرجوع للخلف  <i class="fa-solid fa-angles-left"></i></a>
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
                <form action="{{route('StoreResearchs')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <h4 class="mb-4">إضافة إستعلام </h4>
                            <!-- row -->
                            <div class="row gx-3">
                                <!-- input -->
                                <!-- form group -->
                                <div class="mb-3 col-12">
                                    <label class="form-label">اسم الإستعلام <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="اسم الإستعلام" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">

                        <!-- card body -->
                        <div class="card-body">

                            <!-- row -->
                            <div class="row gx-3">
                                <!-- form group -->
                                <div class="mb-3 col-12">
                                    <label class="form-label">  وصف الإستعلام  <span class="text-danger">*</span></label>
                                    <textarea class="form-control"  name="info" placeholder="وصف الإستعلام..." rows="1">{{old('info')}}</textarea>
                                </div>

                                <!-- form group -->
                                <div class="mb-3 col-9">
                                    <label class="form-label">   موقع الإستعلام  <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" value="{{old('url')}}" name="url" placeholder="الموقع الالكتروني">
                                </div>

                                <!-- form group -->
                                <div class="mb-2 col-md-3 col-12">
                                    <label class="form-label">الإمارة</label>
                                    <select class="selectpicker" name="emirate" data-width="100%">

                                        @foreach ($uae as $item)
                                            <option value="{{ $item->uae }}"> {{ $item->uae }}</option>
                                        @endforeach

                                    </select>
                                </div>
                        </div>
                    </div>
                    </div>
                    <div class="card mb-4">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- row -->
                            <div class="row gx-3">
                                <!-- form group -->
                                <!-- Editor -->
                                <div class="mt-2 mb-4">
                                    <label class="form-label">  خطوات الإستعلام   <span class="text-danger">*</span></label>
                                    <textarea name="sinfo" id="editor">{{ old('sinfo') }}</textarea>
                                </div>

                                <!-- Editor -->
                                <div class="mt-2 mb-4">
                                    <label class="form-label"> الوثائق المطلوبة   <span class="text-danger">*</span></label>

                                    <textarea name="doc" id="editor1">{{ old('doc') }}</textarea>

                                </div>
                                <!-- input -->
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <!-- buttons -->
                        <a href="{{url('AllResearchs')}}" class="btn btn-outline-primary me-2">رجوع</a>
                        <button class="btn btn-primary" type="submit"> إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


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
