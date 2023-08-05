@extends('layouts.app_site.app')
@section('title')
    بالوصية ضمان إنتهت
@stop
@section('content')


    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">بالوصية ضمان إنتهت </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}"> لوحه القيادة </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('Companies')}}"> الشركات </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">      بالوصية ضمان إنتهت ({{$upcomingInsurance->count() }})    </li>
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
                                            <th><b>أسم الشركة</b></th>
                                            <th><b> تاريخ انتهاء بوليصة التأمين </b></th>
                                            <th><b> منتهي من </b></th>
                                            <th><b> تجديد </b></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($upcomingInsurance as $key => $insurances)

                                            @php
                                                if(  now()->diffInDays($insurances->accommodation_end) <= 30  ) { $ColorInsuranceEnd = "rgb(255 175 26)"; }else{ $ColorInsuranceEnd = "#64748b"; }
                                            @endphp
                                                <tr>
                                                    <td ><a target="_blank" style="color: #64748b;" href="{{route('WatchCompanies',$insurances->slug)}}"><b>{{$insurances->name}}</b></a></td>
                                                    <td class="name" style="color: red"><b>{{$insurances->insurance_end}}</b></td>
                                                    <td style="color: red"><b>{{ now()->diffInDays($insurances->insurance_end) }} يوم </b></td>

                                                    <td>

                                                        <a target="_blank" style="color: #64748b;" href="{{route('WatchCompanies',$insurances->slug)}}"><i class="fe fe-edit fs-3"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightEdit" ></i></a>
                                                        </a>
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





                    @endsection
                    @section('script')




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
