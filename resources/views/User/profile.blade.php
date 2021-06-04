@extends('layouts.dashboard')
@section('title', 'My Profile')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <!--<a href="profile-edit.html" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a> -->

                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="/profile"> <img src="img/default-avatar.jpg"  class="rounded-circle shadow " alt="profile-image"></a>
                            <h4 class="m-t-10">{{ Auth::user()->name }}</h4>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="social-links list-unstyled">
                                        <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                    </ul>
                                    <p class="text-muted">{{ Auth::user()->address}}</p>

                                </div>
                                <div class="col-4">
                                    <small>Following</small>
                                    <h5>852</h5>
                                </div>
                                <div class="col-4">
                                    <small>Followers</small>
                                    <h5>13k</h5>
                                </div>
                                <div class="col-4">
                                    <small>Post</small>
                                    <h5>234</h5>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="body">
                                <small class="text-muted">Email address: </small>
                                <p>{{ Auth::user()->email }}</p>
                                <hr>
                                <small class="text-muted"> Full Name: </small>
                                <p>{{ Auth::user()->name }}</p>
                                <hr>
                                <small class="text-muted"> Country: </small>
                                <p>{{ Auth::user()->country }}</p>
                                <hr>
                                <small class="text-muted"> Wallet Address: </small>
                                <p>{{ Auth::user()->bitcoinaddress }}</p>

                                {{--<ul class="list-unstyled">
                                    <li>
                                        <div>Photoshop</div>
                                        <div class="progress m-b-20">
                                            <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">62% Complete</span> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>Wordpress</div>
                                        <div class="progress m-b-20">
                                            <div class="progress-bar l-green " role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">87% Complete</span> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>HTML 5</div>
                                        <div class="progress m-b-20">
                                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>Angular</div>
                                        <div class="progress m-b-20">
                                            <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"> <span class="sr-only">56% Complete</span> </div>
                                        </div>
                                    </li>
                                </ul>--}}
                                <!--<span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</span>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="body">
                                <!-- create table-->
                                <div class="header">
                                    <h2><strong>Account</strong> Settings</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <form action="{{route('profileupdate')}}" method="post" class="card auth_form">
                                            {{ csrf_field() }}


                                                 {{--<div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <input id="name" name="name" type="text" class="form-control" placeholder="Full Name">
                                                </div>
                                                </div>--}}
                                            <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <input id="name"  name="name" type="text"   class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Full Name">

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            {{--<div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input id="city" name="city" type="text" value="{{ $user->profile->city}}" class="form-control" placeholder="City">
                                                </div>
                                            </div>--}}
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input id="email"  name="email" type="text"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="E-mail">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <input id="country" name="country" type="text"  class="form-control" placeholder="Country">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea rows="4" id="address" name="address" type="text"   class="form-control no-resize" placeholder="Address "></textarea>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="header">
                                                    <h2><strong>Security</strong> Settings</h2>
                                                </div>
                                                <div class="body">
                                                    <div class="row">
                                                        {{--<div class="col-lg-4 col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Username">
                                                            </div>
                                                        </div>--}}
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Current Password">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="New Password">
                                                                <span class="text-warning"> Leave Blank if you don't want to change password</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="header">
                                                    <h2><strong>Wallet</strong> Settings</h2>
                                                </div>
                                                <div class="body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-4 col-form-label-sm">{{__('Bitcoin Address') }}</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="bitcoinaddress" name="bitcoinaddress" type="text" class="form-control @error('bitcoinaddress') is-invalid @enderror" name="bitcoinaddress" value="{{ old('bitcoinaddress') }}" autocomplete="bitcoinaddress" placeholder="Enter bitcoin wallet">

                                                                @error('bitcoinaddress')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#smallModal">Save All Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Small Modal confrim-->
                                            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">Are you sure?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                                {{--<div class="input-group masked-input mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="zmdi zmdi-money"></i></span>
                                                                    </div>
                                                                    <input id="amount" name="amount" value="{{$invest}}" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" autocomplete="amount" placeholder="Enter amount">

                                                                    @error('amount')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>--}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-round waves-effect" data-dismiss="modal">CANCEL</button>
                                                            <button type="submit" class="btn btn-success waves-effect">Confirm Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
