@extends('layouts.app_site.app')
@section('title')
    جميع الأسئلة المتكررة
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
                        <h1 class="mb-0 h2 fw-bold mb-3">جميع الأسئلة المتكررة </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('Home')}}"> لوحة القيادة </a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">      جميع الأسئلة المتكررة ({{$faq->count()}})    </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- button -->
                        <a href="{{url('AddFaqs')}}" class="btn btn-primary me-2" > <i class="fa-solid fa-plus"></i> إضافة السؤال    </a>
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
                <!-- Card -->
                <div class="card rounded-3">
                    <!-- Card Header -->
                    <!-- Card Header -->
                    <div class="card-header border-bottom-0 p-0">
                        <!-- nav -->
                    </div>


                    <!-- Container fluid -->
                    <section class="card-body p-lg-6">
                        <div class="row">
                            <!-- table  -->
                            <div class="card-body">
                                <div class="table-card">
                                    <table id="dt-filter-search" class="table table-hover table-row-bordered  border rounded">
                                        <thead>
                                        <tr class="table-light">
                                            <th><b>السؤال ؟</b></th>
                                            <th><b>تعديل</b></th>
                                            <th><b>حذف</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($faq as $key => $faqs)
                                            <tr>
                                                <td>{{$faqs->faq}}</td>
                                                <td>
                                                    <a href="{{route('EditFaq', $faqs->slug)}}" class=" text-muted text-primary-hover texttooltip" data-template="one">
                                                        <i class="fe fe-edit fs-3"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightEdit" ></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{route('DestroyFaq', $faqs->id)}}">
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
    </section>



                </div>
            </div>
        </div>
        </div>
    </section>




@endsection

@section('script')


    <!-- START ckeditor5 js -->
    <script>
        ClassicEditor

            .create( document.querySelector( '#editor' ), { language: 'ar' } )
            .catch( error => { console.error( error ); });
    </script>
    <!-- END ckeditor5 js -->


    <script src="{{URL::asset('assets/js/ajax/sweetalert.min.js')}}"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "هل انت تريد حذف السؤال ؟",
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
