@extends('layouts.dashboard')
@section('title','Confrim Investment')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Confirm Your Order</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Preview Order</li>
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
                <div class="col-lg-4">
                    <div class="card pricing pricing-item">
                        <div class="pricing-deco l-blue">
                            <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                            </svg>

                            <h3 class="pricing-title">Order Confirmation</h3>
                        </div>
                        <div class="body">
                                <ul class="feature-list list-unstyled">
                                    <span>Your Balance :</span><li>{{config('app.currency_symbol')}} {{Auth::user()->deposit_balance + 0}}</li>
                                    <span>Invest Amount :</span><li>{{config('app.currency_symbol')}} {{$invest->amount}}</li>
                                    <span>{{$plan->style->name}} Profit:</span><li>{{config('app.currency_symbol')}} {{$invest->return}}</li>
                                    @if ($plan->repeat == 0)
                                        <span>Net Profit:</span><li>Unlimited</li>
                                        <span>Total Return:</span><li>{{config('app.currency_symbol')}} {{$invest->amount}} + Unlimited</li>
                                     @else
                                    <span>Net Profit:</span><li>{{config('app.currency_symbol')}} {{$invest->profit}}</li>
                                    <span>Total Return::</span><li>{{config('app.currency_symbol')}} {{$invest->total}}</li>
                                    @endif
                                    <li><button class="btn btn-primary waves-effect" type="submit" data-toggle="modal" data-target="#investModal{{$invest->id}}">Confrim Order</button></li>
                                </ul>
                        </div>
                    </div>
                </div>
                <!-- Modal Default Size -->
                <div class="modal fade" id="investModal{{$invest->id}}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="title" id="defaultModalLabel">Purchase CryptoTrade Bot</h4>
                            </div>
                            <form action="{{route('investconfirm')}}" method="POST" class="card auth_form">
                                {{ csrf_field() }}
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                                        <i class="material-icons" data-notify="icon">notifications</i>
                                        <span data-notify="message">

                                            @foreach($errors->all() as $error)
                                                <li><strong> {{$error}} </strong></li>
                                            @endforeach

                                        </span>
                                    </div>
                                @endif
                                <div class="modal-body">
                                    <h4> Are You Sure?</h4>
                                    <input type="hiden" name="plan_id" value="{{$invest->id}}" >
                                    <input type="hidden" name="amount" value="{{$invest->amount}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-simple" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success btn-sm">Confirm Investment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection
