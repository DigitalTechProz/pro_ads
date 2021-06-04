@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')

<section class="content">
    <div class="block-header">
        <div class="row">
            @if (
                count($deposit_notify) > 0 or
                count($invest_notify) > 0 or
                count($ads_notify) > 0 or
                count($withdraw_notify) > 0)
                <div class="alert alert-success" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="zmdi zmdi-thumb-up"></i>
                        </div>
                        <strong data-notify="message">Welcome {{Auth::user()->name}} !</strong> You have received a request from your user client.
                        <br>
                        @if(count($deposit_notify) > 0)
                            <span data-notify="message">You have<b>{{count($deposit_notify)}} </b>Local Deposit Request from your user client.</span>
                        @endif
                        <br>
                        @if(count($invest_notify) > 0)
                            <span data-notify="message">You have <b>{{count($invest_notify)}} </b>Investment  Request from your user client.</span>
                        @endif
                        <br>
                        @if(count($withdraw_notify) > 0)
                        <span data-notify="message">You have <b>{{count($withdraw_notify)}} </b>Withdrawal Request from uuser client.<a href="{{route('admin.withdraw.requests')}}"><span>view requests</span></a></span>
                        @endif
                        <br>
                        @if(count($ads_notify) > 0)
                            <span data-notify="message">You have <b>{{count($ads_notify)}} </b>PTC Ad  Request from your user client .<a href="{{url('user.advert.request')}}"><span>view requests</span></a></span>
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
                    <strong>Heads up  {{Auth::user()->name}} !</strong> There is no pending task.
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
                    <li class="breadcrumb-item active">Users Details</li>
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
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body mb-2">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="category">{{config('app.currency_code')}}</p>
                                            <h5>{{config('app.currency_symbol')}} {{$deposit + 0}}</h5>
                                            <span><i class="zmdi zmdi-balance"></i> Deposit Balance</span>
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
                                            <h5>{{config('app.currency_symbol')}} {{$earn + 0}}</h5>
                                            <span><i class="zmdi zmdi-turning-sign"></i> Main Balance</span>
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
                                            <h5>{{config('app.currency_symbol')}} {{$invest + 0}}</h5>
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
                                            <h5>{{$count->total}}</h5>
                                            <span><i class="zmdi zmdi-print"></i> Total Members</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">7,5,3,8,4,6,2,9</div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="category">{{config('app.currency_code')}}</p>
                                            <h5>{{config('app.currency_symbol')}} {{$pending + 0}}</h5>
                                            <span><i class="zmdi zmdi-print"></i> Total Pending Withdrawals</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">7,5,3,8,4,6,2,9</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
