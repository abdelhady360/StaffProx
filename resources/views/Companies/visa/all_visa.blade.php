@extends('layouts.app_site.app')
@section('title')
    جميع التأشيرات
@stop
@section('content')


    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">جميع التأشيرات </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}"> لوحه القيادة </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('Companies')}}"> الشركات </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('WatchCompanies',$companie->slug)}}"> {{$companie->name}} </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">      جميع التأشيرات ({{$visa->count()}})    </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- button -->
                        <a href="#" class="btn btn-primary me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" > <i class="fa-solid fa-plus"></i> إضافة تأشيرة  </a>
                        <!-- <a href="#" class="btn btn-outline-dark me-2"  >  الرجوع للخلف  <i class="fa-solid fa-angles-left"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card rounded-3">
                    <!-- Card Header -->
                    <!-- Container fluid -->
                    <section class="card-body p-lg-6">
                        <div class="row">
                            <!-- table  -->
                            <div class="card-body">
                                <div class="table-card">
                                    <table id="dt-filter-search" class="table table-hover table-row-bordered  border rounded">
                                        <thead>
                                        <tr class="table-light">
                                            <th><b>رقم الجواز</b></th>
                                            <th><b>اسم الموظف</b></th>
                                            <th><b>الجنسية</b></th>
                                            <th hidden="hidden"><b>تاريخ بداء التأشيرة</b></th>
                                            <th><b>تاريخ انتهاء التأشيرة</b></th>
                                            <th hidden="hidden"><b>تاريخ بداء الجواز</b></th>
                                            <th><b>تاريخ انتهاء الجواز</b></th>
                                            <th hidden="hidden"><b>تاريخ الميلاد</b></th>
                                            <th><b>العمر</b></th>
                                            <th hidden="hidden"><b>النوع</b></th>
                                            <th><b>تعديل</b></th>
                                            <th><b>حذف</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($visa as $key => $visas)

                                            @php

                                                ///////////////////////////////////////////////
                                                $today = now();
                                                $visaEndDate = \Illuminate\Support\Carbon::parse($visas->visa_end);
                                                $visadaysDifference = $today->diffInDays($visaEndDate, false);

                                                if ($visadaysDifference >= 0 && $visadaysDifference <= 15)
                                                {$ColorVisaEnd = "rgb(255, 175, 26)";}
                                                elseif ($visadaysDifference < 0) {$ColorVisaEnd = "red";}
                                                else {$ColorVisaEnd = "#64748b";}

                                                ///////////////////////////////////////////////
                                                $todays = now();
                                                $passporEndDate = \Illuminate\Support\Carbon::parse($visas->passpor_end);
                                                $passpordaysDifference = $todays->diffInDays($passporEndDate, false);

                                                if ($passpordaysDifference >= 0 && $passpordaysDifference <= 30)
                                                {$ColorPassporEnd = "rgb(255, 175, 26)";}
                                                elseif ($passpordaysDifference < 0) {$ColorPassporEnd = "red";}
                                                else {$ColorPassporEnd = "#64748b";}

                                            @endphp

                                            <tr>
                                                <td class="passport_number"><p class="viewData" data-bs-toggle="modal" data-id="$visas->id" data-bs-target="#newCatgory"><b>{{$visas->passport_number}}</b></p></td>
                                                <td class="name">{{$visas->name}}</td>
                                                <td class="nationality">{{$visas->nationality}}</td>
                                                <td hidden="hidden" class="visa_start">{{ now()->parse($visas->visa_start)->format('Y/m/d') }}</td>
                                                <td class="visa_end" style="color: {{$ColorVisaEnd}}">{{ now()->parse($visas->visa_end)->format('Y/m/d') }}</td>
                                                <td hidden="hidden" class="passpor_start">{{now()->parse($visas->passpor_start)->format('Y/m/d') }}</td>
                                                <td class="passpor_end" style="color: {{$ColorPassporEnd}}">{{ now()->parse($visas->passpor_end)->format('Y/m/d') }}</td>
                                                <td class="dob">{{ now()->diffInYears($visas->dob)  }} سنه</td>
                                                <td hidden="hidden" class="dob1">{{now()->parse($visas->dob)->format('Y/m/d') }} </td>
                                                <td hidden="hidden" class="sex">{{ $visas->sex }}</td>
                                                <td>

                                                    <a href="{{route('EditVisa',$visas->slug)}}" class=" text-muted text-primary-hover texttooltip" data-template="one">
                                                        <i class="fe fe-edit fs-3"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightEdit" ></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('destroyVisa', $visas->id) }}">
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

    </section>






    </main>
    </div>

    <!-- Offcanvas -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" style="width: 600px;">

        <div class="offcanvas-body " data-simplebar >
            <div class="offcanvas-header px-2 pt-0">
                <h3 class="offcanvas-title" id="offcanvasExampleLabel">إضافة تأشيرة</h3>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- card -->
            <form action="{{route('StoreVisa')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                    <!-- card body -->
                    <div class="container">
                        <!-- form -->
                        <div class="row" >
                            <input hidden="hidden" type="text" name="companie_id" class="form-control" value="{{$companie->id}}" required>

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label">اسم الموظف <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="اسم الموظف" required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-6">
                                <label class="form-label"> رقم الجواز <span class="text-danger">*</span></label>
                                <input type="text" name="passport_number" value="{{ old('passport_number') }}" class="form-control" placeholder=" رقم الجواز " required>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label"> تاريخ اصدار الجواز <span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" type="text" name="passpor_start" value="{{ old('passpor_start') }}" placeholder="تاريخ اصدار الجواز" aria-describedby="basic-addon2">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label"> تاريخ انتهاء الجواز <span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" type="text" name="passpor_end" value="{{ old('passpor_end') }}" placeholder="تاريخ انتهاء الجواز" aria-describedby="basic-addon2">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-5 col-12">
                                <label class="form-label"> تاريخ  الميلاد <span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" type="text" name="dob" value="{{ old('dob') }}" placeholder="تاريخ  الميلاد" aria-describedby="basic-addon2">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-3 col-12">
                                <label class="form-label">  النوع <span class="text-danger">*</span></label>
                                <select class="selectpicker" value="{{ old('sex') }}" name="sex" data-width="100%">
                                    @foreach ($sex as $item)
                                        <option value="{{ $item->sex }}"> {{ $item->sex }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- form group -->
                            <div class="mb-3 col-4">
                                <label class="form-label"> الجنسية <span class="text-danger">*</span></label>
                                <input type="text" name="nationality" value="{{ old('nationality') }}" class="form-control" placeholder=" الجنسية" required>
                            </div>



                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label"> تاريخ اصدار التأشيرة <span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" type="text" name="visa_start" value="{{ old('visa_start') }}" placeholder="تاريخ اصدار التأشيرة" aria-describedby="basic-addon2">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>

                            <!-- form group -->
                            <div class="mb-3 col-md-6 col-12">
                                <label class="form-label"> تاريخ انتهاء التأشيرة <span class="text-danger">*</span></label>
                                <div class="input-group me-3">
                                    <input class="form-control flatpickr" type="text" name="visa_end" value="{{ old('visa_end') }}" placeholder="تاريخ انتهاء التأشيرة" aria-describedby="basic-addon2">
                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                </div>
                            </div>

                            <div class="col-md-8"></div>
                            <!-- button -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">إضافة</button>
                                <button type="button" class="btn btn-outline-primary ms-2" data-bs-dismiss="offcanvas" aria-label="Close">رجوع</button>
                            </div>
                        </div>

                    </div>
            </form>
        </div>
    </div>


                <!-- الرخصة -->
                <div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
                    <input hidden="hidden" id="v_id" name="id" value="">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                                    <h4 >تفاصيل الموظف</h4>
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row">

                                    <!-- form group -->
                                    <div class="mb-6 col-md-6 col-6">
                                        <label class="form-label"> اسم الموظف<span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="name" id="v_name"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> رقم الجواز<span class="text-danger"></span></label>
                                        <div class="input-group ">
                                            <input disabled class="form-control" type="text" name="passport_number" id="v_passport_number"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> الجنسية <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="nationality" id="v_nationality"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ بداء التأشيرة <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="visa_start" id="v_visa_start"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ انتهاء التأشيرة <span class="text-danger"></span></label>
                                        <div class="input-group ">
                                            <input disabled class="form-control" type="text" name="visa_end" id="v_visa_end"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ بداء الجواز <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="passpor_start" id="v_passpor_start"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ انتهاء الجواز <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="passpor_end" id="v_passpor_end"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label">  العمر <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="dob" id="v_dob"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ الميلاد <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="dob1" id="v_dob1"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-6 col-md-6 col-6">
                                        <label class="form-label"> النوع <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="sex" id="v_sex"  value="" >
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Scripts -->

@endsection
@section('script')

    <script>

        $(document).on('click','.viewData',function (){

            var _this = $(this).parents('tr');
            $('#v_name').val(_this.find('.name').text());
            $('#v_nationality').val(_this.find('.nationality').text());
            $('#v_passport_number').val(_this.find('.passport_number').text());
            $('#v_visa_start').val(_this.find('.visa_start').text());
            $('#v_visa_end').val(_this.find('.visa_end').text());
            $('#v_passpor_start').val(_this.find('.passpor_start').text());
            $('#v_passpor_end').val(_this.find('.passpor_end').text());
            $('#v_dob').val(_this.find('.dob').text());
            $('#v_dob1').val(_this.find('.dob1').text());
            $('#v_sex').val(_this.find('.sex').text());

        });

    </script>






    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>--}}
    <script src="{{URL::asset('assets/js/ajax/sweetalert.min.js')}}"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "هل انت تريد حذف الموظف ؟",
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
