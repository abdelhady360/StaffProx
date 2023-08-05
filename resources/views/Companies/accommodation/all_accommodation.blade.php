@extends('layouts.app_site.app')
@section('title')
    جميع الإقامات
@stop
@section('content')



    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">جميع الإقامات </h1>
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
                                <li class="breadcrumb-item active" aria-current="page">      جميع الإقامات ({{$Accommodation->count()}})    </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- button -->
                        <a href="#" class="btn btn-primary me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" > <i class="fa-solid fa-plus"></i> إضافة إقامة  </a>
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
                                            <th><b>رقم الهوية</b></th>
                                            <th hidden="hidden"><b>رقم الهويه</b></th>
                                            <th hidden="hidden"><b>الرقم الموحد الاماراتي</b></th>
                                            <th><b>اسم الموظف</b></th>
                                            <th><b>الجنسية</b></th>
                                            <th hidden="hidden"><b>تاريخ بداء الإقامة</b></th>
                                            <th><b>تاريخ انتهاء الإقامة</b></th>
                                            <th hidden="hidden"><b>تاريخ اصدار تصريح العمل</b></th>
                                            <th hidden="hidden"><b>تاريخ انتهاء تصريح العمل</b></th>
                                            <th hidden="hidden"><b>تاريخ بداء الجواز</b></th>
                                            <th><b>تاريخ انتهاء الجواز</b></th>
                                            <th hidden="hidden"><b>تاريخ الميلاد</b></th>
                                            <th><b>تاريخ انتهاء تصريح العمل</b></th>
                                            <th hidden="hidden"><b>تاريخ الميلاد</b></th>
                                            <th hidden="hidden"><b>النوع</b></th>
                                            <th><b>تعديل</b></th>
                                            <th><b>حذف</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($Accommodation as $key => $Accommodations)

                                            @php


                                                ///////////////////////////////////////////////
                                                $today = now();
                                                $accommodationEndDate = \Illuminate\Support\Carbon::parse($Accommodations->accommodation_end);
                                                $accommodationdaysDifference = $today->diffInDays($accommodationEndDate, false);

                                                if ($accommodationdaysDifference >= 0 && $accommodationdaysDifference <= 30)
                                                {$ColorAccommodationEnd = "rgb(255, 175, 26)";}
                                                elseif ($accommodationdaysDifference < 0) {$ColorAccommodationEnd = "red";}
                                                else {$ColorAccommodationEnd = "#64748b";}

                                                ///////////////////////////////////////////////
                                                $todays = now();
                                                $passporEndDate = \Illuminate\Support\Carbon::parse($Accommodations->passpor_end);
                                                $passpordaysDifference = $todays->diffInDays($passporEndDate, false);

                                                if ($passpordaysDifference >= 0 && $passpordaysDifference <= 30)
                                                {$ColorPassporEnd = "rgb(255, 175, 26)";}
                                                elseif ($passpordaysDifference < 0) {$ColorPassporEnd = "red";}
                                                else {$ColorPassporEnd = "#64748b";}

                                                ///////////////////////////////////////////////
                                                $todaysP = now();
                                                $PermitWorkEndDate = \Illuminate\Support\Carbon::parse($Accommodations->PermitWork_end);
                                                $PermitWorkDifference = $todaysP->diffInDays($PermitWorkEndDate, false);

                                                if ($PermitWorkDifference >= 0 && $PermitWorkDifference <= 30)
                                                {$ColorPermitWorkEnd = "rgb(255, 175, 26)";}
                                                elseif ($PermitWorkDifference < 0) {$ColorPermitWorkEnd = "red";}
                                                else {$ColorPermitWorkEnd = "#64748b";}


//                                                if(  now()->diffInDays($Accommodations->accommodation_end) < 30  ) { $ColorAccommodationEnd = "rgb(255 175 26)"; }else{ $ColorAccommodationEnd = "#64748b"; }
//                                                if(  now()->diffInDays($Accommodations->passpor_end) < 30  ) { $ColorPassporEnd = "rgb(255 175 26)"; }else{ $ColorPassporEnd = "#64748b"; }




                                            @endphp


                                            <tr>
                                                <td class="id_number"><p class="viewData" data-bs-toggle="modal" data-id="$Accommodations->id" data-bs-target="#newCatgory"><b>{{$Accommodations->id_number}}</b></p></td>
                                                <td hidden="hidden" class="passport_number">{{$Accommodations->passport_number}}</td>
                                                <td hidden="hidden" class="unified_no">{{$Accommodations->unified_no}}</td>
                                                <td class="name">{{$Accommodations->name}}</td>
                                                <td class="nationality">{{$Accommodations->nationality}}</td>
                                                <td hidden="hidden" class="accommodation_start">{{ now()->parse($Accommodations->accommodation_start)->format('Y/m/d') }}</td>
                                                <td class="accommodation_end" style="color: {{$ColorAccommodationEnd}}">{{ now()->parse($Accommodations->accommodation_end)->format('Y/m/d') }}</td>
                                                <td hidden="hidden" class="passpor_start">{{now()->parse($Accommodations->passpor_start)->format('Y/m/d') }}</td>


                                                <td hidden="hidden" class="PermitWork_start">{{now()->parse($Accommodations->PermitWork_start)->format('Y/m/d') }}</td>
                                                <td hidden="hidden" class="PermitWork_end">{{now()->parse($Accommodations->PermitWork_end)->format('Y/m/d') }}</td>


                                                <td class="passpor_end" style="color: {{$ColorPassporEnd}}">{{ now()->parse($Accommodations->passpor_end)->format('Y/m/d') }}</td>

                                                <td style="color: {{$ColorPermitWorkEnd}}">{{now()->parse($Accommodations->PermitWork_end)->format('Y/m/d') }}</td>

                                                <td hidden="hidden" class="dob1">{{now()->parse($Accommodations->dob)->format('Y/m/d') }} </td>
                                                <td hidden="hidden" class="sex">{{ $Accommodations->sex }}</td>
                                                <td hidden="hidden" class="dob">{{ now()->diffInYears($Accommodations->dob)  }} سنه</td>

                                                <td>

                                                    <a href="{{route('EditAccommodation',$Accommodations->slug)}}" class=" text-muted text-primary-hover texttooltip" data-template="one">
                                                        <i class="fe fe-edit fs-3"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightEdit" ></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('destroyAccommodation', $Accommodations->id) }}">
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

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" style="width: 1000px;">

                    <div class="offcanvas-body " data-simplebar >
                        <div class="offcanvas-header px-2 pt-0">
                            <h3 class="offcanvas-title" id="offcanvasExampleLabel">إضافة إقامة</h3>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <!-- card -->
                        <form action="{{route('StoreAccommodation')}}" method="post" enctype="multipart/form-data">
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
                                        <select class="selectpicker" name="sex" data-width="100%">
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
                                        <label class="form-label"> تاريخ اصدار الإقامة <span class="text-danger">*</span></label>
                                        <div class="input-group me-3">
                                            <input class="form-control flatpickr" type="text" name="accommodation_start" value="{{ old('accommodation_start') }}" placeholder="تاريخ اصدار الإقامة" aria-describedby="basic-addon2">
                                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-12">
                                        <label class="form-label"> تاريخ انتهاء الإقامة <span class="text-danger">*</span></label>
                                        <div class="input-group me-3">
                                            <input class="form-control flatpickr" type="text" name="accommodation_end" value="{{ old('accommodation_end') }}" placeholder="تاريخ انتهاء الإقامة" aria-describedby="basic-addon2">
                                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                        </div>
                                    </div>



                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-12">
                                        <label class="form-label"> تاريخ اصدار تصريح العمل <span class="text-danger">*</span></label>
                                        <div class="input-group me-3">
                                            <input class="form-control flatpickr" type="text" name="PermitWork_start" value="{{ old('PermitWork_start') }}" placeholder="تاريخ اصدار تصريح العمل" aria-describedby="basic-addon2">
                                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-12">
                                        <label class="form-label"> تاريخ انتهاء تصريح العمل <span class="text-danger">*</span></label>
                                        <div class="input-group me-3">
                                            <input class="form-control flatpickr" type="text" name="PermitWork_end" value="{{ old('PermitWork_end') }}" placeholder="تاريخ انتهاء تصريح العمل" aria-describedby="basic-addon2">
                                            <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-12 col-6">
                                        <label class="form-label"> رقم الهوية <span class="text-danger">*</span></label>
                                        <input type="text" name="id_number" value="{{ old('id_number') }}" class="form-control" placeholder=" رقم الهوية " required>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-12 col-6">
                                        <label class="form-label"> الرقم الموحد الاماراتي <span class="text-danger">*</span></label>
                                        <input type="text" name="unified_no" value="{{ old('unified_no') }}" class="form-control" placeholder=" الرقم الموحد الاماراتي " required>
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
                                    <div class="mb-3 col-md-6 col-6">
                                        <label class="form-label"> اسم الموظف<span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="name" id="v_name"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> رقم الهوية <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="id_number" id="v_id_number"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> الرقم الموحد الاماراتي <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="unified_no" id="v_unified_no"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-6">
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
                                        <label class="form-label"> تاريخ الميلاد <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="dob1" id="v_dob1"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ بداء الإقامة <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="accommodation_start" id="v_accommodation_start"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ انتهاء الإقامة <span class="text-danger"></span></label>
                                        <div class="input-group ">
                                            <input disabled class="form-control" type="text" name="accommodation_end" id="v_accommodation_end"  value="" >
                                        </div>
                                    </div>


                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ اصدار تصريح العمل <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="PermitWork_start" id="v_PermitWork_start"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-3 col-3">
                                        <label class="form-label"> تاريخ انتهاء تصريح العمل <span class="text-danger"></span></label>
                                        <div class="input-group ">
                                            <input disabled class="form-control" type="text" name="PermitWork_end" id="v_PermitWork_end"  value="" >
                                        </div>
                                    </div>


                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-6">
                                        <label class="form-label"> تاريخ بداء الجواز <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="passpor_start" id="v_passpor_start"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-6">
                                        <label class="form-label"> تاريخ انتهاء الجواز <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="passpor_end" id="v_passpor_end"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-6">
                                        <label class="form-label"> النوع <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="sex" id="v_sex"  value="" >
                                        </div>
                                    </div>

                                    <!-- form group -->
                                    <div class="mb-3 col-md-6 col-6">
                                        <label class="form-label">  العمر <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <input disabled class="form-control" type="text" name="dob" id="v_dob"  value="" >
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
                                $('#v_id_number').val(_this.find('.id_number').text());
                                $('#v_unified_no').val(_this.find('.unified_no').text());
                                $('#v_passport_number').val(_this.find('.passport_number').text());
                                $('#v_passpor_start').val(_this.find('.passpor_start').text());
                                $('#v_passpor_end').val(_this.find('.passpor_end').text());
                                $('#v_accommodation_start').val(_this.find('.accommodation_start').text());
                                $('#v_accommodation_end').val(_this.find('.accommodation_end').text());
                                $('#v_PermitWork_start').val(_this.find('.PermitWork_start').text());
                                $('#v_PermitWork_end').val(_this.find('.PermitWork_end').text());
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
                                            var search = $(`<input class="form-control form-control-sm" type="text" placeholder="Search">`)
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
