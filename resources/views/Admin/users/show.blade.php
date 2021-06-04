@extends('layouts.admin')

@section('title', 'Show Member Profile & Activity Summery')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Member Activity Details</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Activity Summary</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <!---------------------- Show USer Profiles ------------------------->

        <!-- Show user Referral Stats -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card small_mcard_1">
                    <div class="user">
                        <img src="assets/images/sm/avatar1.jpg" alt="profile-image">
                        <div class="details">
                            <h6 class="mb-0 mt-2">Eliana Smith</h6>
                            <p class="mb-0"><small>UI/UX Designer</small></p>
                            <button class="btn btn-primary">FOLLOW</button>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="progress-container progress-warning">
                            <span class="progress-badge">Satup your account</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="progress-value">60%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card small_mcard_1">
                    <div class="user">
                        <img src="assets/images/sm/avatar2.jpg" alt="profile-image">
                        <div class="details">
                            <h6 class="mb-0 mt-2">Eliana Smith</h6>
                            <p class="mb-0"><small>Web Developer</small></p>
                            <button class="btn btn-primary">FOLLOW</button>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="progress-container progress-success">
                            <span class="progress-badge">Satup your account</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                    <span class="progress-value">90%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card small_mcard_1">
                    <div class="user">
                        <img src="assets/images/sm/avatar3.jpg" alt="profile-image">
                        <div class="details">
                            <h6 class="mb-0 mt-2">Eliana Smith</h6>
                            <p class="mb-0"><small>Angular</small></p>
                            <button class="btn btn-primary">FOLLOW</button>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="progress-container progress-danger">
                            <span class="progress-badge">Satup your account</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 24%;">
                                    <span class="progress-value">24%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Show User Referral Stats -->
        <!---------------------- End Show User Profiles ---------------------->

        <!--------------------- courusal for investment details------------->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body carousel slide twitter feed" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item text-center active">
                                <div class="user">
                                    <img src="assets/images/xs/avatar1.jpg" alt="avatar" />
                                    <div class="h6 mt-2">@Hossein</div>
                                </div>
                                <span><i class="zmdi zmdi-quote"></i> Lorem Ipsum is simply <a href="javascript:void(0);">@typesetting</a> industry. Lorem <a href="javascript:void(0);">@Ipsum</a> has been the industry's standard</span>

                                <div class="d-flex bd-highlight text-center mt-4">
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-favorite"></i>
                                        <p class="mb-0 text-muted">Like (5K)</p>
                                    </div>
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-comment-text"></i>
                                        <p class="mb-0 text-muted">Twitt (250)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="user">
                                    <img src="assets/images/xs/avatar2.jpg" alt="avatar" />
                                    <div class="h6 mt-2">@Frank</div>
                                </div>
                                <span><i class="zmdi zmdi-quote"></i> Lorem Ipsum is simply <a href="javascript:void(0);">@typesetting</a> industry. Lorem <a href="javascript:void(0);">@Ipsum</a> has been the industry's standard</span>

                                <div class="d-flex bd-highlight text-center mt-4">
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-favorite"></i>
                                        <p class="mb-0 text-muted">Like (1K)</p>
                                    </div>
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-comment-text"></i>
                                        <p class="mb-0 text-muted">Twitt (612)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body carousel slide facebook feed" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item text-center active">
                                <div class="user">
                                    <img src="assets/images/xs/avatar3.jpg" alt="avatar" />
                                    <div class="h6 mt-2">@Hossein</div>
                                </div>
                                <span><i class="zmdi zmdi-quote"></i> Lorem Ipsum is simply <a href="javascript:void(0);">@typesetting</a> industry. Lorem <a href="javascript:void(0);">@Ipsum</a> has been the industry's standard</span>

                                <div class="d-flex bd-highlight text-center mt-4">
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-favorite"></i>
                                        <p class="mb-0 text-muted">Like (10K)</p>
                                    </div>
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-comment-text"></i>
                                        <p class="mb-0 text-muted">Comments (251)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="user">
                                    <img src="assets/images/xs/avatar4.jpg" alt="avatar" />
                                    <div class="h6 mt-2">@Frank</div>
                                </div>
                                <span><i class="zmdi zmdi-quote"></i> Lorem Ipsum is simply <a href="javascript:void(0);">@typesetting</a> industry. Lorem <a href="javascript:void(0);">@Ipsum</a> has been the industry's standard</span>

                                <div class="d-flex bd-highlight text-center mt-4">
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-favorite"></i>
                                        <p class="mb-0 text-muted">Like (5K)</p>
                                    </div>
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-comment-text"></i>
                                        <p class="mb-0 text-muted">Comments (250)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body carousel slide dribbble feed" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item text-center active">
                                <div class="user">
                                    <img src="assets/images/xs/avatar5.jpg" alt="avatar" />
                                    <div class="h6 mt-2">@Hossein</div>
                                </div>
                                <span><i class="zmdi zmdi-quote"></i> Lorem Ipsum is simply <a href="javascript:void(0);">@typesetting</a> industry. Lorem <a href="javascript:void(0);">@Ipsum</a> has been the industry's standard</span>

                                <div class="d-flex bd-highlight text-center mt-4">
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-favorite"></i>
                                        <p class="mb-0 text-muted">Like (10K)</p>
                                    </div>
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-comment-text"></i>
                                        <p class="mb-0 text-muted">Comments (251)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="user">
                                    <img src="assets/images/xs/avatar6.jpg" alt="avatar" />
                                    <div class="h6 mt-2">@Frank</div>
                                </div>
                                <span><i class="zmdi zmdi-quote"></i> Lorem Ipsum is simply <a href="javascript:void(0);">@typesetting</a> industry. Lorem <a href="javascript:void(0);">@Ipsum</a> has been the industry's standard</span>

                                <div class="d-flex bd-highlight text-center mt-4">
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-favorite"></i>
                                        <p class="mb-0 text-muted">Like (5K)</p>
                                    </div>
                                    <div class="flex-fill bd-highlight">
                                        <i class="zmdi zmdi-comment-text"></i>
                                        <p class="mb-0 text-muted">Comments (250)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------- Show User Summary -------->
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Users</strong> Activity</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="table-responsive social_media_table">
                        <table class="table table-hover c_table">
                            <thead>
                                <tr>
                                    <th>Media</th>
                                    <th>Full Name & Email</th>
                                    <th>Main Balance</th>
                                    <th>Deposit Balance</th>
                                    <th>Referral Balance</th>
                                    <th> User Summary</th>
                                </tr>
                            </thead>
                            <tbody>

                                        <tr>
                                            <td><span class="social_icon linkedin"><i class="zmdi zmdi-linkedin"></i></span>
                                            </td>
                                            <td><span class="list-name">{{$user->name}}</span>
                                                <span class="text-muted">{{$user->email}}</span>
                                            </td>
                                            <td>{{$user->main_balance}}</td>
                                            <td>{{$user->deposit_balance}}</td>
                                            <td>{{$user->referral_balance}}</td>
                                            <td>
                                                <span class="badge badge-success">2341</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon twitter-table"><i class="zmdi zmdi-twitter"></i></span>
                                            </td>
                                            <td><span class="list-name">Twitter</span>
                                                <span class="text-muted">Arkansas, United States</span>
                                            </td>
                                            <td>7K</td>
                                            <td>11K</td>
                                            <td>21K</td>
                                            <td>
                                                <span class="badge badge-success">952</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon facebook"><i class="zmdi zmdi-facebook"></i></span>
                                            </td>
                                            <td><span class="list-name">Facebook</span>
                                                <span class="text-muted">Illunois, United States</span>
                                            </td>
                                            <td>15K</td>
                                            <td>18K</td>
                                            <td>8K</td>
                                            <td>
                                                <span class="badge badge-success">6127</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon google"><i class="zmdi zmdi-google-plus"></i></span>
                                            </td>
                                            <td><span class="list-name">Google Plus</span>
                                                <span class="text-muted">Arizona, United States</span>
                                            </td>
                                            <td>15K</td>
                                            <td>18K</td>
                                            <td>154</td>
                                            <td>
                                                <span class="badge badge-success">325</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon youtube"><i class="zmdi zmdi-youtube-play"></i></span>
                                            </td>
                                            <td><span class="list-name">YouTube</span>
                                                <span class="text-muted">Alaska, United States</span>
                                            </td>
                                            <td>15K</td>
                                            <td>18K</td>
                                            <td>200</td>
                                            <td>
                                                <span class="badge badge-success">160</span>
                                            </td>
                                        </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                {{--<div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-success">
                            <h4 class="card-title text-center"><span>User Summery</span></h4>
                        </div>
                        <br>
                        <h5 class="card-title"><span class="text-danger">Joining Date:   </span> <span
                                    class="text-primary"><b>{{ date('F jS, Y \a\t h:i a', strtotime($user->created_at)) }}</b></span>
                        </h5>

                        <h5 class="card-title"><span class="text-danger">Referrer Name:    </span><span
                                    class="text-primary"><b>

                                     @if( $upliner == 1)
                                        {{$referrer->name}}
                                    @else
                                        No One Refer Him
                                    @endif

                                </b></span></h5>
                        <h5 class="card-title"><span class="text-danger">Total Referral:    </span><span
                                    class="text-primary"><b>  @if(count($totalRefer) > 0)
                                        {{count($totalRefer)}}
                                    @else
                                        Didn't Made Any Refer Yet
                                    @endif</b></span></h5>
                        <h5 class="card-title"><span class="text-danger">Total Investment:    </span><span
                                    class="text-primary"><b>${{$invest + 0}}</b></span></h5>

                        <h5 class="card-title"><span class="text-danger">Total Interest:    </span><span
                                    class="text-primary"><b>${{$interest + 0}}</b></span></h5>

                        <h5 class="card-title"><span class="text-danger">Total PTC Earn:    </span><span
                                    class="text-primary"><b>${{$ptc + 0}}</b></span></h5>

                        <h5 class="card-title"><span class="text-danger">Total PPV Earn:    </span><span
                                    class="text-primary"><b>${{$ppv + 0}}</b></span></h5>
                        <div class="row">

                            @if( $upliner == 1)
                                <a href="#" class="btn btn-success">View Referer</a>
                            @else
                                <button class="btn btn-success" disabled>View Referer</button>
                            @endif
                                @if(count($totalRefer) > 0)
                                    <a href="#" class="btn btn-info">View Referral</a>
                                @else
                                    <button class="btn btn-info" disabled>View Referral</button>
                                @endif
                                <a href="#" class="btn btn-rose">View Investment</a>
                                <a href="#" class="btn btn-warning">View Interest</a>

                                <a href="#" class="btn btn-primary">View Deposit</a>
                                <a href="#" class="btn btn-primary">View Withdraw</a>

                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
</section>
@endsection
