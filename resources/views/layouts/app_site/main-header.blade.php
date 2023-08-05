<!-- Page Content -->
<main id="page-content-for-mini">
<div class="header">
    <!-- navbar -->
    <nav class="navbar-default navbar navbar-expand-lg">
        <a id="nav-toggle" href="#">
            <i class="fe fe-menu"></i>
        </a>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center">
                <span class="position-absolute ps-3 search-icon"><i class="fe fe-search"></i></span>
                <input disabled  type="search" class="form-control ps-6 fw-semibold" size="111" placeholder=" “  فَنَادَىٰ فِي الظُّلُمَاتِ أَن لَّا إِلَٰهَ إِلَّا أَنتَ سُبْحَانَكَ إِنِّي كُنتُ مِنَ الظَّالِمِينَ ۝ فَاسْتَجَبْنَا لَهُ وَنَجَّيْنَاهُ مِنَ الْغَمِّ ۚ وَكَذَٰلِكَ نُنجِي الْمُؤْمِنِينَ  ” " >
            </form>
        </div>
        <!--Navbar nav -->
        <div class="ms-auto d-flex">
            <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle ">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>

            </a>
            <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">
                <!-- List -->
                <li class="dropdown ms-2">
                    <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="{{asset('assets/images/avatar/abdelhady360.jpg')}}" rel="stylesheet" class="rounded-circle" >
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <div class="dropdown-item">
                            <div class="d-flex">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{asset('assets/images/avatar/abdelhady360.jpg')}}" class="rounded-circle" >
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="mb-1 p-1">{{Auth::User()->user_name}}</h5>
                                    <p class="mb-1 text-center">{{Auth::User()->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li> <a class="dropdown-item" href="{{url('Settings')}}"> <i class="fe fe-settings me-2"></i> الإعدادات </a> </li>
                        </ul>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fe fe-power me-2"></i> تسجيل الخروج </a> </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
