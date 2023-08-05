@extends('layouts.app_site.app')
@section('title')
    الإعدادات
@stop
@section('content')

    <main>
        <section class="pt-5 pb-5">
            <div class="container">
                <!-- User info -->
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Bg -->
                        <div class="pt-16 rounded-top" style="
								background: url({{URL::asset('assets/images/background/profile-bg.jpg')}}) no-repeat;
								background-size: cover;
							"></div>
                        <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2">
                            <div
                                class="d-flex align-items-end justify-content-between  ">
                                <div class="d-flex align-items-center">
                                    <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                        <img src="{{URL::asset('assets/images/avatar/abdelhady360.jpg')}}" class="avatar-xl rounded-circle border border-4 border-white"
                                             alt="">
                                    </div>
                                    <div class="lh-1">
                                        <h2 class="mb-0">{{$user->user_name}}
                                            <a href="#" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top" title="القائد">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                                                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
                                                </svg>
                                            </a>
                                        </h2>
                                        <p class=" mb-0 d-block">{{$user->name}}@</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <!-- button -->
                                        <a href="{{url('Home')}}" class="btn btn-primary me-2"> الرجوع للخلف  <i class="fa-solid fa-angles-left"></i></a>
                                        <!-- <a href="#" class="btn btn-outline-dark me-2"  >  الرجوع للخلف  <i class="fa-solid fa-angles-left"></i> </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="row mt-0 mt-md-4">
                    <div class="col-lg-3 col-md-4 col-12">
                        <!-- Side navbar -->
                        <nav class="navbar navbar-expand-md  shadow-sm mb-4 mb-lg-0 sidenav">
                            <!-- Menu -->
                            <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
                            <!-- Button -->
                            <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fe fe-menu"></span>
                            </button>
                            <!-- Collapse navbar -->
                            <div class="collapse navbar-collapse" id="sidenav">
                                <div class="navbar-nav flex-column">
                                    <span class="navbar-header">الإعدادات</span>

                                    <!-- List -->
                                    <ul class="list-unstyled ms-n2 mb-0">
                                        <!-- Nav item -->
                                        <li class="nav-item active">
                                            <a class="nav-link" href=""><i class="fe fe-settings nav-icon"></i>تحديث البيانات الشخصية</a>
                                        </li>

                                        <!-- Nav item -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fe fe-power nav-icon"></i>تسجيل الخروج</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </nav>
                        <br>

                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ $error }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="col-lg-9 col-md-8 col-12">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">تفاصيل الملف الشخصي</h3>
                                <p class="mb-0">
                                    لديك سيطرة كاملة لإدارة إعدادات حسابك الخاص.
                                </p>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">

                                <div>
                                    <!-- Form -->
                                    <form class="row gx-3" action="{{route('UpdateSettings', $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <!-- First name -->
                                        <div class="mb-3 col-6 col-md-6">
                                            <label class="form-label" for="fname"> الأسم كامل </label>
                                            <input disabled type="text" id="fname" value="{{$user->user_name}}" class="form-control" placeholder=" الأسم كامل " required>
                                        </div>

                                        <!-- First name -->
                                        <div class="mb-3 col-6 col-md-6">
                                            <label class="form-label" for="fname"> اسم المستخدم </label>
                                            <input disabled type="text" id="fname" class="form-control" value="{{$user->name}}" placeholder="@ اسم المستخدم " required>
                                        </div>

                                        <!-- Phone -->
                                        <div class="mb-3 col-12 col-md-12">
                                            <label class="form-label" for="phone">البريد الإلكتروني</label>
                                            <input disabled type="text" id="phone" value="{{$user->email}}" class="form-control" placeholder="البريد الإلكتروني" required>
                                        </div>

                                        <!-- Address -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="address"> كلمة المرور</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder=" كلمة المرور">

                                            <div class="col-md-6">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Address -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="address2"> تأكيد كلمة المرور </label>
                                            <input type="password"  class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" placeholder="تأكيد كلمة المرور">

                                            <div class="col-md-6">
                                                @error('confirm-password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                                تحديث الملف
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>




@endsection

@section('script')

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
