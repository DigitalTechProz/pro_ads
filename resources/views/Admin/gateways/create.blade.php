@extends('layouts.admin')
@section('title', 'Create Instant Gateway')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Create Instant Gateway Payment</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Create Instant Gateway</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- **** Table *** ----->

    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="body">
                <!-- create table-->
                <div class="header">
                    <h2><strong>Instant Gateway</strong> Settings</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{route('admin.storeInstant')}}" method="post" class="card auth_form">
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Gateway Name </label>
                                    <input id="name"  name="name" type="text"   class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Gateway Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            {{--<div class="row clearfix">

                                    <div class="col-lg-3 col-md-4 col-sm-12" data-provides="fileinput">
                                        <div class="card">

                                                <div class="hover">
                                                    <a href="#" class="btn btn-icon btn-icon-mini btn-round btn-danger" >
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{asset('img/coinpay.png')}}"  class="rounded-circle shadow " alt="...">
                                                </div>
                                                <div>
                                                    <span class="btn btn-round btn-info">
                                                        <input id="image" type="file" name="image"/>
                                                    </span>
                                                    <small>Maxium File Size: 5MB </small>
                                                </div>

                                        </div>
                                    </div>


                            </div>--}}
                            <hr>
                             <!-- Select Satus-->
                             <div class="row xlearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="status" data-style="btn btn-primary btn-round" title="Select Status" data-size="7">

                                            <option value="0"

                                                >Not Active
                                            </option>

                                            <option value="1"

                                                selected


                                                >Already Active
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- End Select Status-->

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <label>Gateway Account Name </label>
                                    <input id="account"  name="account" type="text"    class="form-control @error('account') is-invalid @enderror" name="account" value="{{ old('account') }}" autocomplete="account" autofocus placeholder="Gateway Account Name">

                                    @error('account')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Gateway IPN Secret Key</label>
                                            <input id="val3" name="val3" type="text"   class="form-control @error('fixed') is-invalid @enderror" name="fixed" value="{{ old('fixed') }}" autocomplete="fixed" autofocus placeholder="Enter Fixed Fee">

                                            @error('val3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Gateway Fixed Fee</label>
                                            <input id="fixed" name="fixed" type="number"  class="form-control @error('fixed') is-invalid @enderror" name="fixed" value="{{ old('fixed') }}" autocomplete="fixed" autofocus placeholder="Enter Fixed Fee">

                                            @error('fixed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gateway Percentage Fee </label>
                                        <input id="percent"  name="percent" type="number"   class="form-control @error('percent') is-invalid @enderror" name="percent" value="{{ old('percent') }}" autocomplete="percent" autofocus placeholder="Enter Gateway Percentage Fee">

                                        @error('percent')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gateway Withdraw Fixed Fee </label>
                                        <input id="withdraw_fixed"  name="withdraw_fixed" type="number"   class="form-control @error('withdraw_fixed') is-invalid @enderror" name="withdraw_fixed" value="{{ old('withdraw_fixed') }}" autocomplete="withdraw_fixed" autofocus placeholder="Enter Withdraw Fixed fee">

                                        @error('withdraw_fixed')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gateway Withdraw Percentage Fee </label>
                                        <input id="withdraw_percent"  name="withdraw_percent" type="number"   class="form-control @error('withdraw_percent') is-invalid @enderror" name="withdraw_percent" value="{{ old('withdraw_percent') }}" autocomplete="withdraw_percent" autofocus placeholder="Enter withdraw percentage fee">

                                        @error('withdraw_percent')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gateway Minimum Deposit </label>
                                        <input id="mini_deposit"  name="mini_deposit" type="number"   class="form-control @error('mini_deposit') is-invalid @enderror" name="mini_deposit" value="{{ old('mini_deposit') }}" autocomplete="mini_deposit" autofocus placeholder="Enter Minimum Deposit">

                                        @error('mini_deposit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gateway Minimum Withdrawal </label>
                                        <input id="mini_withdraw"  name="mini_withdraw" type="number"   class="form-control @error('mini_withdraw') is-invalid @enderror" name="mini_withdraw" value="{{ old('mini_withdraw') }}" autocomplete="mini_withdraw" autofocus placeholder="Enter Minimum Withdrawal">

                                        @error('mini_withdraw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="mode" data-style="btn btn-primary btn-round" title="Select Status" data-size="7">

                                            <option value="0"

                                                selected

                                                >Sand Box
                                            </option>
                                            <option value="1"

                                                selected


                                                >Go Live
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <label  class="control-label" for="account">Gateway Public Key</label>


                                    <input id="val1"  name="val1" type="text"   class="form-control @error('val1') is-invalid @enderror" name="val1" value="{{ old('val1') }}" autocomplete="val1" autofocus placeholder="Enter Public Key">

                                    @error('val1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <label  class="control-label" for="account">Gateway Private Key</label>


                                    <input id="val2"  name="val2" type="text"   class="form-control @error('val2') is-invalid @enderror" name="val2" value="{{ old('val2') }}" autocomplete="val2" autofocus placeholder="Enter Public Key">

                                    @error('val2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                                <a href="{{route('admin.gateways.index')}}" class="btn btn-danger ">Cancel Changes</a>



                                <button class="btn btn-info pull-right" type="submit">Save All Changes</button>
                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
