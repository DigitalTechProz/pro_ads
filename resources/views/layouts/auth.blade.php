<!DOCTYPE html>
<html lang="en">


<!-- signup14-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Multipurpose HTML5 Business Template">
    <meta name="author" content="Shreethemes">
     <!--- CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="alita/images/favicon.ico">

    <title>{{config('app.name')}} </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="alita/css/bootstrap.min.css" rel="stylesheet">

    <!-- Magnificpopup Css -->
    <link rel="stylesheet" type="text/css" href="alita/css/magnific-popup.css">

    <!-- Bootstrap core CSS -->
    <link href="alita/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="alita/css/fontawesome.css" rel="stylesheet">
    <link href="alita/css/pe-icon-7-stroke.css" rel="stylesheet">

    <!--Slider-->
        <link rel="stylesheet" href="alita/css/slick.css"/>
    <link rel="stylesheet" href="alita/css/slick-theme.css"/>

    <!-- Custom styles for this template -->
    <link href="alita/css/style.css" rel="stylesheet">
    <link href="alita/css/menu.css" rel="stylesheet">
    <link href="alita/css/default.css" rel="stylesheet">

</head>
<body>
     <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="adptc/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <!---- Main Content --->
    <main>
        @yield('content')
    </main>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="alita/js/jquery.min.js"></script>
    <script src="alita/js/popper.min.js"></script>
    <script src="alita/js/bootstrap.min.js"></script>
    <!-- Portfolio -->
    <script src="alita/js/jquery.magnific-popup.min.js"></script>
    <script src="alita/js/isotope.js"></script>
    <!-- Carousel -->
    <script src="alita/js/slick.min.js"></script>
    <script src="alita/js/slick.init.js"></script>
    <!--custom script-->
    <script src="alita/js/app.js"></script>
    <!-- Sweet Altert Js -->
    <script src="assets/js/sweetalert2.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js -->
<script src="assets/js/pages/ui/sweetalert.js"></script>
<script>
    @if (session()->has('message'))
    swal({
        title: "{!! session()->get('title')  !!}",
        text: "{!! session()->get('message')  !!}",
        type: "{!! session()->get('type')  !!}",
        buttonsStyling: false,
        icon: "{!! session()->get('icon') !!}",
        animation: true,
        confirmButtonClass: "btn btn-success",
        confirmButtonText: "OK"
    });
     @endif
</script>






</body>
</html>
