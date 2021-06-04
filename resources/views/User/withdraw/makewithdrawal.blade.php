@extends('layouts.dashboard')
@section('title','Make Withdrawal')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Make Withdrawal</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Withdrawal Section</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>

     <!-- Show Users Main Balance-->
     <div class="row clearfix">
        <div class="col-lg-8 col-md-12">
            <div class="card info-box-2">
                <div class="body bg-blue">
                    <div class="icon col-12 m-t-5">
                        <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                    </div>
                    <div class="content col-12">
                        <div class="text">My Main Account Balance</div>
                        <h3 class="card-title">{{config('app.currency_symbol')}} {{$user->main_balance +0}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- withdraw table section-->
    <div class="col-lg-8 col-md-12">
       <div class="card">
           <div class="body">
                <div class="header">
                    <h2><strong>Deposit</strong> Funds</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                    <div class="alert alert-info">
                        <span class="text-center">Read before you deposit your balance. You need to know gateway fee:</span><br>
                        @php $id=0;@endphp
                        @foreach($gateways as $gateway)
                        @php $id++;@endphp
                        <span>{{$id}}. <b>
                            @if($gateway->name){{$gateway->name}}
                        </b> will be charged <b>{{config('app.currency_symbol')}} {{$gateway->withdraw_fixed}}</b> fixed + <b>{{$gateway->withdraw_percent}}%</b> in every Withdraw.
                        @endif
                        </span>
                        @endforeach
                    </div>

                    <form action="{{route('makewithdrawal.post')}}" method="POST" class="auth-form">
                        {{csrf_field()}}

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
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Select Withdraw Gateway" data-size="7">

                                        @if($gateway->status == 1)
                                        <option value="1000">{{$gateway->name}}</option>
                                        @endif

                                        @foreach($gateways as $gateway)
                                            <option value="{{$gateway->id}}">{{$gateway->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="account">Your Account</label>
                                    <input id="account" name="account" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="amount">Withdraw Amount</label>
                                    <input id="amount" name="amount" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <a href="/userdashboard" class="btn btn-danger">Cancel Withdraw</a>

                        <button type="submit" class="btn btn-success pull-right">Withdraw Now</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
