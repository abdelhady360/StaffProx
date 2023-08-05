<nav class="navbar-vertical-compact ">
    <div class="h-100 " data-simplebar="">
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{url('/Home')}}">
            <i class="fa-solid fa-user-astronaut text-secondary fa-3x"></i>
        </a>

        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="nav-icon fe fe-home fs-3"></i> </a>
                <ul class="dropdown-menu " aria-labelledby="dashboardDropdown">
                    <li><span class="dropdown-header ">Dashboard</span></li>
                    <li><a class="dropdown-item"  href="{{url('/Home')}}"> لوحة القيادة </a></li>
                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-regular fa-bookmark fs-3 "></i> </a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> الخدمات </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllTransactions')}}"> جميع الخدمات </a> </li>
                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-magnifying-glass fs-3 "></i> </a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> الاستعلامات  </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllResearchs')}}"> جميع الاستعلامات  </a> </li>
                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-regular fa-comments fs-3 "></i> </a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> الأسئلة المتكررة </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllFaqs')}}">جميع الأسئلة المتكررة </a> </li>
                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-regular fa-building fs-3 "></i> </a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> الأسئلة المتكررة </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllCompanies')}}">جميع الشركات </a> </li>
                </ul>
            </li>



            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">  <i class="fa-regular fa-copyright fs-3 "></i></a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> جميع الاشكال القانونية </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllLegalForm')}}"> جميع الاشكال القانونية </a> </li>
                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-brands fa-nfc-directional  fs-3"></i></a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> جميع الهيئات </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllAuthority')}}"> جميع الهيئات </a> </li>
                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">  <i class="fa-solid fa-location-dot fs-3 "></i></a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> جميع الإمارات </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllUae')}}"> جميع الإمارات </a> </li>
                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">  <i class="fa-regular fa-calendar-minus fs-3 "></i></a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> قاربت علي الانتهاء </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllAccommodationExpired')}}">  الإقامات </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllVisaExpired')}}">  التأشيرات </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllPassporExpired')}}">  جوازات السفر </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllDamanExpired')}}">  بالوصية ضمان </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllWorkPermitExpired')}}">   تصاريح العمل </a> </li>

                </ul>
            </li>

            <li class="nav-item dropdown dropend">
                <a class="nav-link " href="#" id="menulevelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-regular fa-calendar-xmark fs-3"></i></a>
                <ul class="dropdown-menu" aria-labelledby="menulevelDropdown">
                    <li><span class="dropdown-header"> إنتهت </span></li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllAccommodationEnd')}}">  الإقامات </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllVisaEnd')}}">  التأشيرات </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllPassporEnd')}}">  جوازات السفر </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllDamanEnd')}}">  بالوصية ضمان </a> </li>
                    <li class="nav-item"> <a class="dropdown-item" target="_blank" href="{{url('AllWorkPermitEnd')}}">   تصاريح العمل </a> </li>
                </ul>
            </li>




{{--            <li class="nav-item">--}}
{{--                <a class="nav-link dropdownTooltip" href="#" data-template="helpCenter"> <i class="nav-icon fe fe-help-circle"></i> <div id="helpCenter" class="d-none"> <span class="fw-semibold fs-6">Help Center </span> </div></a>--}}
{{--            </li>--}}

        </ul>

    </div>
</nav>
