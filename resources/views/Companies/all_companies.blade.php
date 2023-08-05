@extends('layouts.app_site.app')
@section('title')
    جميع الشركات
@stop
@section('content')

    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">جميع الشركات </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}"> لوحة القياده </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('Companies')}}"> الشركات </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">      جميع الشركات ({{$companie->count()}})    </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- button -->
                        <a href="#" class="btn btn-primary me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" > <i class="fa-solid fa-plus"></i> إضافة شركة  </a>
                        <!-- <a href="#" class="btn btn-outline-dark me-2"  >  الرجوع للخلف  <i class="fa-solid fa-angles-left"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="offset-xl-1 col-xl-10 col-md-12 col-12">

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <div class="card">
                    <!-- Card Header -->
                    <div>
                        <!-- Tab -->


                        <!-- Container fluid -->
                        <section class="card-body p-lg-6">
                            <div class="row">
                                <!-- table  -->
                                <div class="card-body">
                                    <div class="table-card">



                                    <br>
                                    <!-- Table -->
                                    <table id="dt-filter-search" class="table table-hover table-row-bordered  border rounded">
                                        <!-- Table Head -->
                                        <thead class="table-light table-lg">
                                        <tr>
                                            <th>#</th>
                                            <th scope="col"><b>الشركة</b></th>
                                            <th scope="col"><b>اللإمارة</b></th>
                                            <th scope="col"><b>تعديل</b></th>
                                            <th scope="col"><b>حذف</b></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($companie as $key => $companies)
                                            <tr>
                                                <td><div class="form-check"><input type="checkbox" class="form-check-input" id="checkAll" ><label class="form-check-label" for="checkAll"></label></div></td>
                                                <td><b><a style="color: #64748b;" href="{{route('WatchCompanies',$companies->slug)}}">{{$companies->name}}</a> </b></td>
                                                <td> <i class="fe fe-map-pin text-muted me-2 fa-lg"></i> <b> {{$companies->emirate}} </b> </td>

                                                <td>
                                                    <a href="{{route('EditNameCompanie',$companies->slug)}}" class=" text-muted text-primary-hover texttooltip" data-template="one">
                                                        <i class="fe fe-edit fs-3"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightEdit" ></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('DestroyCompanies', $companies->id) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-xs text-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'  data-template="two" >
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <i class="fe fe-trash-2 fs-3" data-bs-toggle="offcanvas"  data-bs-target="#offcanvasRightDelete"></i>
                                                        </button>
                                                    </form>
                                                </td>

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
        </div>

    </section>



    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" style="width: 1000px;">

        <div class="offcanvas-body " data-simplebar >
            <div class="offcanvas-header px-2 pt-0">
                <h3 class="offcanvas-title" id="offcanvasExampleLabel">إضافة شركة</h3>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- card body -->
            <div class="container">
                <!-- form -->
                <form class="row gx-3" action="{{route('StoreCompanies')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="row" >

                    <!-- form group -->
                    <div class="mb-3 col-12">
                        <label class="form-label">اسم المنشأة <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="اسم المنشأة" required>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-md-6 col-12">
                        <label class="form-label"> تاريخ إصدار رخصة المنشأة <span class="text-danger">*</span></label>
                        <div class="input-group me-3">
                            <input class="form-control flatpickr" name="license_start" value="{{ old('license_start') }}" type="text" placeholder="تاريخ إصدار رخصة المنشأة" aria-describedby="basic-addon2">

                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-md-6 col-12">
                        <label class="form-label"> تاريخ إنتهاء رخصة المنشأة <span class="text-danger">*</span></label>
                        <div class="input-group me-3">
                            <input class="form-control flatpickr" name="license_end" value="{{ old('license_end') }}" type="text" placeholder="تاريخ إنتهاء رخصة المنشأة" aria-describedby="basic-addon2">
                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-md-6 col-12">
                        <label class="form-label"> تاريخ اشتراك ICP <span class="text-danger">*</span></label>
                        <div class="input-group me-3">
                            <input class="form-control flatpickr" name="icp_start" value="{{ old('icp_start') }}" type="text" placeholder="تاريخ اشتراك ICP" aria-describedby="basic-addon2">
                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-md-6 col-12">
                        <label class="form-label">  تاريخ انهاء الاشتراك ICP  <span class="text-danger">*</span></label>
                        <div class="input-group me-3">
                            <input class="form-control flatpickr" name="icp_end" value="{{ old('icp_end') }}" type="text" placeholder="تاريخ انهاء الاشتراك ICP" aria-describedby="basic-addon2">
                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-md-6 col-12">
                        <label class="form-label"> تاريخ انتهاء بولصية التامين <span class="text-danger">*</span></label>
                        <div class="input-group me-3">
                            <input class="form-control flatpickr" name="insurance_end" value="{{ old('insurance_end') }}" type="text" placeholder="تاريخ انتهاء بولصية التامين" aria-describedby="basic-addon2">
                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
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

                        <!-- form group -->
                        <div class="mb-3 col-md-3 col-12">
                            <label class="form-label">  الشكل القانوني  <span class="text-danger">*</span></label>
                            <select class="selectpicker" name="no_facility" data-width="100%">
                                @foreach ($LegalForm as $item)
                                    <option class="form-control flatpickr" value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>

                    <!-- form group -->
                    <div class="mb-3 col-6">
                        <label class="form-label"> رقم الرخصة  <span class="text-danger">*</span></label>
                        <input type="text" name="license_number" value="{{ old('license_number') }}" class="form-control" placeholder="رقم الرخصة" required>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-6">
                        <label class="form-label"> رقم الهاتف  <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="رقم الهاتف" required>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-6">
                        <label class="form-label"> البريد الإلكتروني <span class="text-danger">*</span></label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder=" البريد الإلكتروني  " required>
                    </div>

                    <!-- form group -->
                    <div class="mb-3 col-6">
                        <label class="form-label"> العنوان   <span class="text-danger">*</span></label>
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder=" العنوان " required>
                    </div>









                    <div class="col-md-8"></div>
                    <!-- button -->
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">إضافة</button>
                        <button type="button" class="btn btn-outline-primary ms-2" data-bs-dismiss="offcanvas" aria-label="Close">رجوع</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>



@endsection
@section('script')




    <script src="{{URL::asset('assets/js/ajax/sweetalert.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "هل انت تريد حذف الشركة ؟",
                text: "",
                icon: "warning",
                type: "warning",
                buttons: ["رجوع","حذف !"],
                confirmButtonColor: '#ffffff',
                cancelButtonColor: '#dddddd',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>


    <script>

        $("#kt_datatable_dom_positioning").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });

    </script>

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
<!-- END section -->
