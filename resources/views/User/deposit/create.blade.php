@extends('layouts.dashboard')
@section('title', 'Make Deposit')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Make Deposit</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Deposit Section</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
     <!-- Table to create gateway method Instant-->
     <div class="col-md-8 col-lg-12">
        <div class="card">
            <div class="body">
                <!-- create table-->
                <div class="header">
                    <h2><strong>Make Crypto</strong> Deposit</h2>
                </div>


                <div class="tab-pane" id="local">
                    <div class="alert alert-info">
                        <span class="text-center">Read before deposit your balance. You need to know gateway fee:</span><br>
                        @php $id=0;@endphp
                        @foreach($gateways as $gateway)
                            @php $id++;@endphp
                            <span>
                                <ol class="justify-content center">
                                    {{$id}}. <b>{{$gateway->name}}</b>
                                    <p> Will be charged <b>{{config('app.currency_symbol')}} {{$gateway->fixed}}</b> fixed + <b>{{$gateway->percent}}%</b> for every deposit.</p>
                                </ol>
                            </span>
                        @endforeach
                    </div>

                    <form action="{{route('instantPreview')}}"  method="post">
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
                            <br>
                        @endif

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Select Deposit Gateway" data-size="7">

                                        @foreach($gateways as $gateway)
                                            <option value="{{$gateway->id}}">{{$gateway->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">

                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="amount">Deposit Amount</label>
                                    <input id="amount" name="amount" type="text" class="form-control">

                                </div>
                            </div>
                        </div>


                        <br>
                        <br>
                        <a href="#" class="btn btn-danger">Cancel Deposit</a>

                        <button type="submit" class="btn btn-success pull-right">Deposit Now</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
     <!-- Table to create gateway method Local-->
     <div class="col-md-8 col-lg-12">
        <div class="card">
            <div class="body">
                <!-- create table-->
                <div class="header">
                    <h2><strong>Make</strong> Deposit</h2>
                </div>


                <div class="tab-pane" id="local">
                    <div class="alert alert-info">
                        <span class="text-center">Read before deposit your balance. You need to know gateway fee:</span><br>
                        @php $id=0;@endphp
                        @foreach($local_gateways as $local)
                            @php $id++;@endphp
                            <span>
                                <ol class="justify-content center">
                                    {{$id}}. <b>{{$local->name}}</b>
                                    <p> Will be charged <b>{{config('app.currency_symbol')}} {{$local->fixed}}</b> fixed + <b>{{$local->percent}}%</b> for every deposit.</p>
                                </ol>
                            </span>
                        @endforeach
                    </div>

                    <form action="{{route('depositpreview')}}" method="post">
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
                            <br>
                        @endif

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Select Deposit Gateway" data-size="7">

                                        @foreach($local_gateways as $local)
                                            <option value="{{$local->id}}">{{$local->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">

                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="amount">Deposit Amount</label>
                                    <input id="amount" name="amount" type="text" class="form-control">

                                </div>
                            </div>
                        </div>


                        <br>
                        <br>
                        <a href="#" class="btn btn-danger">Cancel Deposit</a>

                        <button type="submit" class="btn btn-success pull-right">Deposit Now</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</section>
@endsection

