@extends('layouts.dashboard')
@section('title', 'My Account Dashboard')

@section('content')
<section class="content">
<div class="block-header">
    <div class="row">
        @if (
            count($referral_notify) > 0 or
            count($withdraw_approved_notify) >  0 )

            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-thumb-up"></i>
                    </div>
                    <strong data-notify="message">Welcome {{Auth::user()->name}} !</strong> You have a new notification.
                    <br>
                    @if(count($referral_notify) > 0)
                        <span data-notify="message">There is a <b>{{count($referral_notify)}} </b>New Referral.</span>
                    @endif

                    @if(count($withdraw_approved_notify) > 0)
                        <span data-notify="message">You have <b>{{count($withdraw_approved_notify)}} </b>Aproved Withdrawal.<a href="{{url('withdraw.history')}}"><span>view history</span></a></span>
                    @endif
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>
            @else
            <div class="alert alert-info" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-alert-circle-o"></i>
                    </div>
                    <strong>Hey  {{Auth::user()->name}} !</strong> There are no new notifications.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            </div>


        @endif
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Dashboard</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i>Home</a></li>
                <li class="breadcrumb-item active">My Porfolio</li>
            </ul>

            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
        </div>
    </div>
</div>
<div class="container-fluid">
     <div class="row clearfix">
            <div class="col-lg-12">
               <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Financial</strong> Reports</h2>
                    </div>
                    <div class="body mb-2">
                        <div class="row clearfix">


                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="state_w1 mb-1 mt-1">
                                            <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="category">{{config('app.currency_code')}}</p>
                                                <h5>{{config('app.currency_symbol')}} {{$user->deposit_balance + 0}}</h5>
                                                <span><i class="zmdi zmdi-balance"></i> My Deposit Balance</span>
                                            </div>
                                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#868e96">5,2,3,7,6,4,8,1</div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="state_w1 mb-1 mt-1">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="category">{{config('app.currency_code')}}</p>
                                                    <h5>{{config('app.currency_symbol')}} {{$user->main_balance + 0}}</h5>
                                                    <span><i class="zmdi zmdi-turning-sign"></i> My Main Balance</span>
                                                </div>
                                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#2bcbba">8,2,6,5,1,4,4,3</div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="state_w1 mb-1 mt-1">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="category">{{config('app.currency_code')}}</p>
                                                    <h5>{{config('app.currency_symbol')}} {{$Invest + 0}}</h5>
                                                    <span><i class="zmdi zmdi-alert-circle-o"></i> Total Invested Amount</span>
                                                </div>
                                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">4,4,3,9,2,1,5,7</div>
                                            </div>
                                        </div>
                                    </div>







                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="state_w1 mb-1 mt-1">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="category">{{config('app.currency_code')}}</p>
                                                    <h5>{{config('app.currency_symbol')}} {{$user->referral_balance + 0}}</h5>
                                                    <span><i class="zmdi zmdi-print"></i> My Referral Balance</span>
                                                </div>
                                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">7,5,3,8,4,6,2,9</div>
                                            </div>
                                        </div>
                                    </div>




                        </div>
                    </div>

                    <div class="body mb-2">
                        <div class="row clearfix">



                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="state_w1 mb-1 mt-1">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="category">{{config('app.currency_code')}}</p>
                                                    <h5>{{config('app.currency_symbol')}} {{$Withdrawal + 0}}</h5>
                                                    <span><i class="zmdi zmdi-alert-circle-o"></i> My Withdrawals</span>
                                                </div>
                                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">4,4,3,9,2,1,5,7</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="state_w1 mb-1 mt-1">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="category">{{config('app.currency_code')}}</p>
                                                    <h5>{{config('app.currency_symbol')}} {{$pending + 0}}</h5>
                                                    <span><i class="zmdi zmdi-hourglass"></i> My Pending Withdrawals</span>
                                                </div>
                                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">4,4,3,9,2,1,5,7</div>
                                            </div>
                                        </div>
                                    </div>





                        </div>
                    </div>

                    @if($settings->login == 1)
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-sm-offset-3">
                                <div class="card">
                                    <div class="col-lg-offset-1">
                                        <h3> You can claim daily rewards after:</h3>
                                        <a type="button" id="bonus" class="btn btn-primary waves-effect btn-lg"></a>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var countDownDate = new Date({!! $rewards !!}).getTime();
                                var x = setInterval(function() {
                                    var now = new Date().getTime();
                                    var distance = countDownDate - now;
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                    var confirmButton = document.getElementById("bonus");
                                    confirmButton.innerHTML = hours + " Hours " + minutes + " Minutes " + seconds + " Second Later";
                                    if (distance < 0) {
                                        clearInterval(x);
                                        confirmButton.className = "btn btn-success btn-raised btn-lg";
                                        confirmButton.innerHTML = "Claim Your Rewards Now";
                                        confirmButton.setAttribute('href','{{route('userDailyBonus')}}');
                                    }
                                }, 1000);
                            </script>
                        </div>
                        <br>
                    @endif
                    <br>
                    <!-- Include Charts/ API graph-->
                    <div class="body">
                        <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                    </div>
                </div>
        </div>
</section>

@endsection
{{--<div class="container">
    {{--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="navbar"> Dashboard



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}

{{--<div class="row justify-navbar-right">
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
          @endif
          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>


</div>--}}

