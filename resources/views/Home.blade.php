<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Multipurpose HTML5 Business Template">
    <meta name="author" content="Shreethemes">
    <!------CSRF Token-------->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="alita/images/favicon.ico">

    <title>
        {{config('app.name')}} - @yield('title')
    </title>

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
    <link rel="stylesheet" href="alita/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="alita/css/owl.theme.css"/>
    <link rel="stylesheet" href="alita/css/owl.transitions.css"/>
    <link rel="stylesheet" href="alita/css/slick.css"/>
    <link rel="stylesheet" href="alita/css/slick-theme.css"/>

    <!-- Custom styles for this template -->
    <link href="alita/css/style.css" rel="stylesheet">
    <link href="alita/css/menu.css" rel="stylesheet">
    <link href="alita/css/default.css" rel="stylesheet">


</head>
<body>

    <!-- Loader -->
    <div id="page-preloader">
    <div class="theme-loader">{{config('app.name')}}</div>
	</div>

    @yield('content')

    <!-- PRICE START -->
    {{--<section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="section-title text-center">
                        <h3>Style One</h3>
                        <div class="spacer-15"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mt-30 pricing-plan-box p-30 bg-white">
                        <div class="pricing-header text-center">
                            <div class="price-name">
                                <h4 class="text-uppercase mb-0">Starter</h4>
                                <div class="pricing-devider mx-auto"></div>
                            </div>
                            <div class="price-tag-heading mt-3 mb-3">
                                <h3 class=""><sub>$</sub>9<span>/month</span></h3>
                            </div>
                        </div>
                        <div class="list-price-features mb-0">
                            <p><i class="mdi mdi-check icon-success-color"></i> Additional Features</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Maximum Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>24/7 Pve Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Custom Domain</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Free Email Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Single User</p>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-custom">Choose Plan</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mt-30 pricing-plan-box p-30 active">
                        <div class="lable">
                            <h6 class="best mb-0 text-uppercase">Business &nbsp;Plan</h6>
                        </div>
                        <div class="pricing-header text-center">
                            <div class="price-name">
                                <h4 class="text-white text-uppercase mb-0">Professional</h4>
                                <div class="pricing-devider bg-white mx-auto"></div>
                            </div>
                            <div class="price-tag-heading mt-3 mb-3">
                                <h3 class="text-white"><sub>$</sub>19<span>/month</span></h3>
                            </div>
                        </div>
                        <div class="list-price-features text-white mb-0">
                            <p><i class="mdi mdi-check icon-success-color"></i>Additional Features</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Maximum Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>24/7 Pve Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Custom Domain</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Free Email Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Single User</p>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-custom-white">Choose Plan</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mt-30 pricing-plan-box p-30 bg-white">
                        <div class="pricing-header text-center">
                            <div class="price-name">
                                <h4 class="text-uppercase mb-0">Ultra</h4>
                                <div class="pricing-devider mx-auto"></div>
                            </div>
                            <div class="price-tag-heading mt-3 mb-3">
                                <h3 class=""><sub>$</sub>39<span>/month</span></h3>
                            </div>
                        </div>
                        <div class="list-price-features mb-0">
                            <p><i class="mdi mdi-check icon-success-color"></i> Additional Features</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Maximum Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>24/7 Pve Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Custom Domain</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Free Email Support</p>
                            <p><i class="mdi mdi-check icon-success-color"></i>Single User</p>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-custom">Choose Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- PRICE END -->

    <!-- Back to top -->
    <a href="#" class="back-to-top" id="back-to-top">
        <i class="mdi mdi-chevron-up"> </i>
    </a>
    <!-- Back to top -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="alita/js/jquery.min.js"></script>
    <script src="alita/js/popper.min.js"></script>
    <script src="alita/js/bootstrap.min.js"></script>
    <!-- Portfolio -->
    <script src="alita/js/jquery.magnific-popup.min.js"></script>
    <script src="alita/js/isotope.js"></script>
    <script src="alita/js/portfolio-filter.js"></script>
    <!-- Carousel -->
    <script src="alita/js/owl.carousel.min.js"></script>
    <script src="alita/js/owlcarousel.init.js"></script>
    <script src="alita/js/slick.min.js"></script>
    <script src="alita/js/slick.init.js"></script>
    <!-- VIDEO ICON -->
    <script src="alita/js/magnific.init.js"></script>
    <!-- COUNTER -->
    <script src="alita/js/counter.init.js"></script>
    <!--custom script-->
    <script src="alita/js/app.js"></script>
    @yield('scripts')
</body>



</html>
