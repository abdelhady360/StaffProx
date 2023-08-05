@extends('layouts.app_site.app')
@section('title')
    جوازات سفر قارب علي انتهائها 30 يوم
@stop
@section('content')


    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold mb-3">جوازات سفر قارب علي انتهائها 30 يوم </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}"> لوحه القيادة </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('Companies')}}"> الشركات </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">      جوازات سفر قارب علي انتهائها 30 يوم ({{$upcomingVisaPasspor->count() + $upcomingAccommodationPasspor->count() }})    </li>
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
                                            <th><b>رقم الجواز</b></th>
                                            <th><b>أسم الشركة</b></th>
                                            <th><b>اسم الموظف</b></th>
                                            <th><b>الجنسية</b></th>
                                            <th ><b>تاريخ انتهاء الجواز</b></th>
                                            <th><b> الإيام المتبقية </b></th>
                                            <th><b>تجديد</b></th>
                                            <th><b>حذف</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($upcomingVisaPasspor as $key => $visas)

                                            @php
                                                if(  now()->diffInDays($visas->accommodation_end) <= 30  ) { $ColorVisaEnd = "rgb(255 175 26)"; }else{ $ColorVisaEnd = "#64748b"; }
                                                if(  now()->diffInDays($visas->passpor_end) <= 30  ) { $ColorPassporEnd = "rgb(255 175 26)"; }else{ $ColorPassporEnd = "#64748b"; }
                                            @endphp
                                                <tr>
                                                    <td class="passport_number"><p class="viewData" data-bs-toggle="modal" data-id="$visas->id" data-bs-target="#newCatgory"><b>{{$visas->passport_number}}</b></p></td>

                                                    <td ><a target="_blank" style="color: #64748b;" href="{{route('WatchCompanies',$visas->companie->slug)}}"><b>{{$visas->companie->name}}</b></a></td>
                                                    <td class="name"><b>{{$visas->name}}</b></td>
                                                    <td class="nationality"><b>{{$visas->nationality}}</b></td>
                                                    <td  class="passpor_end" style="color: {{$ColorPassporEnd}}"><b>{{ now()->parse($visas->passpor_end)->format('Y/m/d') }}</b></td>
                                                    <td  style="color: {{$ColorPassporEnd}}"><b>{{ now()->diffInDays($visas->passpor_end) }} يوم </b></td>
                                                    <td>

                                                        <a href="{{route('ExtensionPassporvExpired',$visas->slug)}}" class=" text-muted text-primary-hover texttooltip" data-template="one">
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

                                        @foreach ($upcomingAccommodationPasspor as $key => $Accommodations)

                                            @php
                                                if(  now()->diffInDays($Accommodations->accommodation_end) <= 30  ) { $ColorVisaEnd = "rgb(255 175 26)"; }else{ $ColorVisaEnd = "#64748b"; }
                                                if(  now()->diffInDays($Accommodations->passpor_end) <= 30  ) { $ColorPassporEnd = "rgb(255 175 26)"; }else{ $ColorPassporEnd = "#64748b"; }
                                            @endphp

                                            <tr>
                                                <td class="id_number"><p class="viewDataAccommodations"><b>{{$Accommodations->passport_number}}</b></p></td>

                                                <td ><a target="_blank" style="color: #64748b;" href="{{route('WatchCompanies',$Accommodations->companie->slug)}}"><b>{{$Accommodations->companie->name}}</b></a></td>
                                                <td class="name"><b>{{$Accommodations->name}}</b></td>
                                                <td class="nationality"><b>{{$Accommodations->nationality}}</b></td>
                                                <td  class="passpor_end" style="color: {{$ColorPassporEnd}}"><b>{{ now()->parse($Accommodations->passpor_end)->format('Y/m/d') }}</b></td>
                                                <td  style="color: {{$ColorPassporEnd}}"><b>{{ now()->diffInDays($Accommodations->passpor_end) }} يوم </b></td>
                                                <td>

                                                    <a href="{{route('ExtensionPassporaExpired',$Accommodations->slug)}}" class=" text-muted text-primary-hover texttooltip" data-template="one">
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
