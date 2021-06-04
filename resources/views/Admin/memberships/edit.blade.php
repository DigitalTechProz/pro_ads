@extends('layouts.admin')

@section('title', 'Edit Membership')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Create New Membership</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Create Membership</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Table to create gateway method-->
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="body">
                <!-- create table-->
                <div class="header">
                    <h2><strong>Membership</strong> Settings</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{route('memberships.update',['id'=>$membership->id])}}" method="post" class="card auth_form">
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
                                    <label>Membership Name </label>
                                    <input id="name"  name="name" type="text" value="{{$membership->name}}"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Membership Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Membership Duration </label>
                                    <input id="duration"  name="duration" type="number" value="{{$membership->duration}}"  class="form-control" placeholder="Membership Duration">
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Membership Price </label>
                                        <input id="price"  name="price" type="number" value="{{$membership->price +0}}"  class="form-control" placeholder="Membership Price">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Daily User Ad Limit </label>
                                        <input id="ad_limit"  name="ad_limit" type="number" value="{{$membership->ad_limit}}"  class="form-control" placeholder="Daily Ad Limit">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Membership Details </label>
                                        <textarea class="form-control"  name="details" id="details" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <a href="{{route('memberships.index')}}" class="btn btn-danger ">Cancel </a>

                            <button class="btn btn-info pull-right" type="submit">Update Membership</button>

                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

