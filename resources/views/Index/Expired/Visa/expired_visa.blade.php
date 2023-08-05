@extends('layouts.app_site.app')
@section('title')
    تأشيرات قارب علي انتهائها 15 يوم
@stop
@section('content')


    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">تأشيرات قارب علي انتهائها 15 يوم </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}"> لوحه القيادة </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('Companies')}}"> الشركات </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">      تأشيرات قارب علي انتهائها 15 يوم ({{$upcomingVisas->count() }})    </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- button -->
                        <a href="{{url('Home')}}" class="btn btn-primary me-2"  >  الرجوع للخلف  <i class="fa-solid fa-angles-left"></i> </a>
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
                                        <thead class="table-light table-lg">

                                        <tr class="table-light">
                                            <th><b>رقم الجواز</b></th>
                                            <th><b>أسم الشركة</b></th>
                                            <th><b>اسم الموظف</b></th>
                                            <th><b>الجنسية</b></th>
                                            <th hidden="hidden"><b>تاريخ بداء التأشيرة</b></th>
                                            <th><b>تاريخ انتهاء التأشيرة</b></th>
                                            <th><b> الإيام المتبقية </b></th>
                                            <th hidden="hidden"><b>تاريخ بداء الجواز</b></th>
                                            <th hidden="hidden"><b>تاريخ انتهاء الجواز</b></th>
                                            <th hidden="hidden"><b>تاريخ الميلاد</b></th>
                                            <th hidden="hidden"><b>العمر</b></th>
                                            <th hidden="hidden"><b>النوع</b></th>
                                            <th><b>تمديد</b></th>
                                            <th><b>حذف</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($upcomingVisas as $key => $visas)

                                            @php
                                                if(  now()->diffInDays($visas->accommodation_end) <= 15  ) { $ColorVisaEnd = "rgb(255 175 26)"; }else{ $ColorVisaEnd = "#64748b"; }
                                                if(  now()->diffInDays($visas->passpor_end) <= 15  ) { $ColorPassporEnd = "rgb(255 175 26)"; }else{ $ColorPassporEnd = "#64748b"; }
                                            @endphp
                                            @if ($visas->companie)
                                            <tr>
                                                <td class="passport_number"><p class="viewData" data-bs-toggle="modal" data-id="$visas->id" data-bs-target="#newCatgory"><b>{{$visas->passport_number}}</b></p></td>

                                                <td ><a target="_blank" style="color: #64748b;" href="{{route('WatchCompanies',$visas->companie->slug)}}"><b>{{$visas->companie->name}}</b></a></td>
                                                <td class="name"><b>{{$visas->name}}</b></td>
                                                <td class="nationality"><b>{{$visas->nationality}}</b></td>
                                                <td hidden="hidden" class="visa_start">{{ now()->parse($visas->visa_start)->format('Y/m/d') }}</td>
                                                <td class="visa_end" style="color: {{$ColorVisaEnd}}"><b>{{ now()->parse($visas->visa_end)->format('Y/m/d') }}</b></td>
                                                <td style="color: {{$ColorVisaEnd}}"><b>{{ now()->diffInDays($visas->visa_end) }} يوم</b></td>
                                                <td hidden="hidden" class="passpor_start">{{now()->parse($visas->passpor_start)->format('Y/m/d') }}</td>
                                                <td hidden="hidden" class="passpor_end" style="color: {{$ColorPassporEnd}}"><b>{{ now()->parse($visas->passpor_end)->format('Y/m/d') }}</b></td>
                                                <td class="dob" hidden="hidden">{{ now()->diffInYears($visas->dob)  }} سنه</td>
                                                <td hidden="hidden" class="dob1">{{now()->parse($visas->dob)->format('Y/m/d') }} </td>
                                                <td hidden="hidden" class="sex">{{ $visas->sex }}</td>
                                                <td>

                                                    <a href="{{route('ExtensionVisaExpired',$visas->slug)}}" class=" text-muted text-primary-hover texttooltip" data-template="one">
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
                                            @endif
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




                <!-- تفاصيل الموظف -->
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
                title: "هل انت تريد حذف التأشيرة ؟",
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
