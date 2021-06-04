<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
 <!--- CSRF Token-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{asset('alita/images/favicon.ico')}}"> <!-- Favicon-->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />

<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
{{--<link rel="stylesheet" href="adptc/assets/css/style.css">--}}
@yield('styles')

</head>

<body class="theme-blush">
<!-- Page Loader -->
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


<!-- Serach Side Bar -->

<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form action="{{route('registered-users')}}" method="get">
    <input id="search" name="search" type="search" value="{{isset($search) ? $search : ''}}" placeholder="Search..." />
    <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>


<!-- Right Icon menu Sidebar -->
@include('includes.rightsidebar')


<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="/admindashboard"><img src="img/logo.png" width="25" alt="Aero"><span class="m-l-10"></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div>
                    <a href="/userdashboard" class="btn btn-info">Access User Dashboard</a>
                </div>
            </li>
            <hr>
            <li>
                <div class="user-info">
                    <a class="image" href="/admindashboard"><img src="img/default-avatar.jpg" alt="User"></a>
                    <div class="detail">
                        <h4> {{ Auth::user()->name }}</h4>
                        <small>Admin Panel</small>
                    </div>
                </div>
            </li>
            <li class="{{ Request::is('admindashboard') ? "active open" :"" }}"><a href="/admindashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Financials</span></a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('styleindex') ? "active open" :"" }}"><a href="/styleindex">Create Investment Style</a></li>
                    <li class="{{ Request::is('createinvestplan') ? "active open" :"" }}"><a href="/createinvestplan">Create Investment Plan</a></li>
                    <li class="{{ Request::is('planindex') ? "active open" :"" }}"><a href="/planindex">View All Investment Plans</a></li>
                    {{--<li class="{{ Request::is('editplan/{id}') ? "active open" :"" }}"><a href="/editplan/{id}">Edit Investment Plan</a></li>--}}
                    <li class="{{ Request::is('registered-users') ? "active open" :"" }}"><a href="/registered-users">Total Users</a></li>
                    {{--<li class="{{ Request::is('invest.withdraw') ? "active open" :"" }}"><a href="/invest.withdraw">Request Withdrawal</a></li>--}}
                    <li><a href="#">Referral Balances</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('pageindex') ? "active open" :"" }}"><a href="/pageindex"><i class="zmdi zmdi-home"></i><span>View All Pages</span></a></li>

           <li><a href="javascript::void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>All User Investments</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.users.investmentrequest')}}">All User Investments</a></li>
                    <li><a href="{{route('admin.users.local.investmentrequest')}}">User Local Investment Requests</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Payment Gateways</span></a>
                <ul class="ml-menu">
                    <li> <a href="/creategateway">Create Local Gateway</a></li>
                    <li> <a href="/localgateways">View All Local Gateways</a></li>
                    <li> <a href="{{route('admin.create.instant')}}">Create Instant Gateway</a></li>
                    <li> <a href="{{route('admin.gateways.index')}}">"Instant Gateways</a></li>


                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Membership Plans</span></a>
                <ul class="ml-menu">
                    <li> <a href="/memberships.create">Create Membership</a></li>
                    <li> <a href="/memberships.index">View All Memberships</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Link Share</span></a>
                <ul class="ml-menu">
                    <li> <a href="/links.create">Create Link Share</a></li>
                    <li> <a href="/links.index">View Link Share</a></li>
                </ul>
            <li><a href="javascript::void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span> PTC Ads</span></a>
                <ul class="ml-menu">
                    <li> <a href="/ptc.create">Create PTC Ads</a></li>
                    <li> <a href="/ptc">All PTC Ads</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Advert Plans</span></a>
                <ul class="ml-menu">
                    <li> <a href="/admin.advert.planIndex">Create Advert Plan</a></li>
                <li> <a href="{{route('admin.user.advert.request')}}">User Ad Requests</a></li>
                <li> <a href="{{route('admin.user.advertAll')}}">All User Ad Requests</a></li>
                </ul>
            </li>
            <li><a href="javascript::void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>User Deposits</span></a>
                <ul class="ml-menu">
                     <li> <a href="{{route('admin.users.deposits')}}">All Users Deposits</a></li>
                      <li> <a href="{{route('admin.deposit.local')}}">Local Users Deposit Requests</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('websitesettings') ? "active open" :"" }}"><a href="/websitesettings"><i class="zmdi zmdi-home"></i><span>Website Settings</span></a></li>
        </ul>
    </div>
</aside>

<!-- Main Content -->

@yield('content')

<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<!--<script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>  Input Mask Plugin Js -->
<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js -->
<script src="{{asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js -->
<script src="{{asset('assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
<script src="{{asset('assets/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script> <!-- Jquery Spinner Plugin Js -->
<script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js -->
<script src="{{asset('assets/plugins/nouislider/nouislider.js')}}"></script> <!-- noUISlider Plugin Js -->

<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>



<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('assets/js/sweetalert2.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js -->
<script src="{{asset('assets/js/pages/ui/sweetalert.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/js/bootstap-datetimepicker.js')}}"></script>
<script src="adptc/assets/js/main.js"></script>
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
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
            }
        });
    });

</script>

@yield('scripts')
</body>

</html>
