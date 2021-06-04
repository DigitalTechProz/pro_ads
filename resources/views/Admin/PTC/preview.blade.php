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
    <style>
        #myProgress {
            width: 100%;
            background-color: #ddd;
            margin-top: 10px;
        }

        #myBar {
            width: 10%;
            height: 30px;
            background-color: #00bcd4;
            text-align: center;
            line-height: 30px;
            color: white;
        }
    </style>

</head>
<body>
    <!--- Primary Nav ---->
    <nav class="navbar navbar-primary">
        <div class="container">
            <div class="navbar-header">

            </div>
            <div >
                <div class="col-md-4">
                    <div id="myProgress">
                        <div id="myBar">0%</div>
                    </div>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a type="button" id="confirm" class="btn btn-danger" disabled>
                            Loading Ads
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <!-- Back to top -->
    <a href="#" class="back-to-top" id="back-to-top">
        <i class="mdi mdi-chevron-up"> </i>
    </a>
    <!-- Back to top -->

    <!-- Scripts -->
    <script>
        function move() {
            var elem = document.getElementById("myBar");
            var width = 0;
            var id = setInterval(frame,{{$log->duration *10}});
            function frame() {
                if (width >= 100) {

                    var confirmButton = document.getElementById("confirm");
                    confirmButton.className = "btn btn-success";
                    confirmButton.innerHTML = "Back";
                    confirmButton.removeAttribute('disabled');
                    confirmButton.setAttribute('href','{{route('admin.ptcs.index')}}');
                    clearInterval(id);

                } else {
                    width++;
                    elem.style.width = width + '%';
                    elem.innerHTML = width * 1  + '%';
                }
            }
        }
        window.onload = move;
    </script>
    <iframe src="{{$log->ad_link}}" style="border: 0; position:absolute; top: 14%; left:0; right:0; bottom:0; width:100%; height:100%"></iframe>

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
</body>



</html>
