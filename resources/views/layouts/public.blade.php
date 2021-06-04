
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>
            @yield('title') - {{config('app.name')}}
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!------CSRF Token-------->


        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="adptc/assets/img/favicon.ico">


		<!-- CSS here -->
            <link rel="stylesheet" href="adptc/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="adptc/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="adptc/assets/css/flaticon.css">
            <link rel="stylesheet" href="adptc/assets/css/slicknav.css">
            <link rel="stylesheet" href="adptc/assets/css/animate.min.css">
            <link rel="stylesheet" href="adptc/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="adptc/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="adptc/assets/css/themify-icons.css">
            <link rel="stylesheet" href="adptc/assets/css/slick.css">
            <link rel="stylesheet" href="adptc/assets/css/nice-select.css">
            <link rel="stylesheet" href="adptc/assets/css/style.css">

   </head>

   <body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="adptc/assets/img/logo-pro-ads.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @yield('content')



	<!-- JS here -->

		<!-- All JS Custom Plugins Link Here here -->
        <script src="adptc/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="adptc/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="adptc/assets/js/popper.min.js"></script>
        <script src="adptc/assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="adptc/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="adptc/assets/js/owl.carousel.min.js"></script>
        <script src="adptc/assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="adptc/assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="adptc/assets/js/wow.min.js"></script>
		<script src="adptc/assets/js/animated.headline.js"></script>
        <script src="adptc/assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="adptc/assets/js/jquery.scrollUp.min.js"></script>
        <script src="adptc/assets/js/jquery.nice-select.min.js"></script>
		<script src="adptc/assets/js/jquery.sticky.js"></script>

        <!-- contact js -->
        <script src="adptc/assets/js/contact.js"></script>
        <script src="adptc/assets/js/jquery.form.js"></script>
        <script src="adptc/assets/js/jquery.validate.min.js"></script>
        <script src="adptc/assets/js/mail-script.js"></script>
        <script src="adptc/assets/js/jquery.ajaxchimp.min.js"></script>

		<!-- Jquery Plugins, main Jquery -->
        <script src="adptc/assets/js/plugins.js"></script>
        <script src="adptc/assets/js/main.js"></script>
        @yield('scripts')

    </body>
</html>

