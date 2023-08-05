
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Codescandy">


    <script>
        // Render blocking JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/images/favicon/favicon.ico')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{URL::asset('assets/css/fonts/cairo.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">




    <!-- Libs CSS -->
    <link href="{{URL::asset('/assets/fonts/feather/feather.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('/assets/libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('/assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('/assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" />






    <!-- Theme CSS -->
    <link href="{{URL::asset('/assets/css/theme-rtl.min.css')}}" rel="stylesheet" />

    <title> 404 - الصفحة غير موجودة </title>
</head>

<body class="bg-white">
<!-- Page Content -->
<main>
    <section class="container d-flex flex-column">
        <div class="row">
            <div class="offset-xl-1 col-xl-2 col-lg-12 col-md-12 col-12">
                <div class="mt-4">
                    <a href="../index.html"><img src="../assets/images/brand/logo/logo.svg" alt="" class="logo-inverse"></a>
                    <!-- theme switch -->
                    <div class="form-check form-switch theme-switch d-none ">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center g-0 py-lg-22 py-10">
            <!-- Docs -->
            <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-12 col-12 text-center text-lg-start">
                <h1 class="display-1 mb-3" title="@yield('code')">404</h1>

                <p class="mb-5 lead px-4 px-md-0">
                    أُووبس! معذرةً ، لم تتمكن من العثور على الصفحة التي تبحث عنها. إذا كنت تعتقد أنها مشكلة ، من فضلك
                    <a href="https://abdelhady360.github.io/" target="_blank" class="btn-link">تواصل معنا</a>
                </p>

                <a href="{{url('Home')}}" class="btn btn-primary me-2"> <i class="fa-solid fa-house"></i> لوحه القيادة </a>
            </div>
            <!-- img -->
            <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
                <img src="{{URL::asset('/assets/images/brand/brand.svg')}}" alt="" class="w-100" />
            </div>
        </div>
        <div class="row">
            <div class="offset-xl-1 col-xl-10 col-lg-12 col-md-12 col-12">
                <div class="row align-items-center mt-6">
                    <div class="col-md-6 col-8">
                        <p class="pull-right">&copy;   <a href="https://abdelhady360.github.io/" target="_blank" >AbdelHady Mohamed</a>  <script>document.write(new Date().getFullYear())</script>. All rights reserved .</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Scripts -->
<!-- Libs JS -->
<link href="{{URL::asset('/assets/libs/jquery/dist/jquery.min.js')}}" rel="stylesheet" />
<link href="{{URL::asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}" rel="stylesheet" />
<link href="{{URL::asset('/assets/libs/simplebar/dist/simplebar.min.js')}}" rel="stylesheet" />



<!-- Theme JS -->
<link href="{{URL::asset('/assets/js/theme.min.js')}}" rel="stylesheet" />

</body>

</html>
