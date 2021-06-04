@extends('layouts.dashboard')
@section('title','Pick The Best Advert Plan')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title">Choose Advert Plan</h2>
                    <h5 class="description"> Start earning by viewing and posting Ads!</h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Choose Advert Plan</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <!-- Advert Plans-->
        <div class="container-fluid">

            @if($settings->buy_traffic == 1)

                @if($uPlans)
                    @foreach($uPlans as $membership)
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card pricing pricing-item">
                                    <div class="pricing-deco l-slategray">
                                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                        </svg>

                                        <h3 class="pricing-title">{{$membership->name}}</h3>
                                    </div>
                                    <div class="body">
                                        <ul class="feature-list list-unstyled">
                                            @if($membership->type == 1)

                                                <li><h2>This Package is For Website Ads Only</h2></li>

                                            @endif

                                            <li>
                                                <h3 class="card-title">

                                                    @if($membership->price == 0)

                                                        Free

                                                    @else
                                                        {{config('app.currency_symbol')}} {{$membership->price + 0}}
                                                    @endif


                                                </h3>
                                                <p class="card-description">
                                                    <span class="btn btn-success">Total Hit: {{$membership->hit}}</span>
                                                    <span class="btn btn-info">Duration: {{$membership->duration}} sec</span>
                                                </p>

                                            </li>
                                            <li><button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#smallModal{{$membership->id}}">Buy This Plan</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Start Small Modal-->
                        <div class="modal fade" id="smallModal{{$membership->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="title" id="smallModalLabel">Enter Advertisement Information</h4>
                                    </div>
                                    <form action="{{route('userAdPlan.activation', $membership->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                                            <i class="zmdi zmdi-money" data-notify="icon"></i>
                                            <span data-notify="message">
                                                @foreach($errors->all() as $error)
                                                    <li><strong> {{$error}} </strong></li>
                                                @endforeach
                                            </span>
                                        </div>

                                        @endif
                                        <div class="modal-body">
                                            <label for="name" class="control-label">Advert Title</label>
                                            <input id="name" name="name" type="text" class="form-control">
                                            <br>
                                            <div class="form-group label-floating">
                                                <select class="selectpicker" name="membership" data-style="btn btn-warning btn-round" title="Target Membership" data-size="7">

                                                    @foreach($memberships as $gateway)
                                                        <option value="{{$gateway->id}}">{{$gateway->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            @if($membership->type == 1)
                                                <div class="form-group label-floating">
                                                    <label  class="control-label" for="url">Website Address</label>
                                                    <input id="url" name="url" type="url" class="form-control">
                                                </div>
                                            @endif
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default btn-round waves-effect">Confirm Purchase</button>
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- End Small Modal-->
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</section>
@endsection
