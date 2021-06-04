@extends('layouts.admin')

@section('title', 'Create New PTC Ad')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Create New PTC Ad</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Create New PTC Ad</li>
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
    <div class="col-md-8 col-lg-12 ">
        <div class="card">
            <div class="body">
                <!-- create table-->
                <div class="header">
                    <h2><strong>PTC Ad</strong> Settings</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{route('admin.ptc.store')}}" method="post" class="card auth_form">
                             {{csrf_field()}}

                            @if(count($errors) > 0)
                                <div class="alert alert-danger alert-with-icon" data-notify="container">
                                    <i class="material-icons" data-notify="icon"></i>
                                    <span data-notify="message">
                                        @foreach($errors->all() as $error)
                                            <li><strong> {{$error}} </strong></li>
                                        @endforeach
                                    </span>
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Title </label>
                                    <input id="title"  name="title" type="text"   class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Website Link </label>
                                    <input id="ptc"  name="ad_link" type="url"   class="form-control" placeholder="Enter Website Link">
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="membership_id" data-style="btn btn-primary btn-round" title="Select Membership" data-size="7">

                                            @foreach($memberships as $membership)

                                            <option value="{{$membership->id}}"> {{$membership->name}} </option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Rewards</label>
                                        <input id="rewards"  name="rewards" type="text"   class="form-control" placeholder="Enter Rewards">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Advert Duration (in Seconds, Example: 60)</label>
                                        <input id="duration"  name="duration" type="number"   class="form-control" placeholder="Enter Advert Duration">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Website Traffic Hit (Example: 10000)</label>
                                        <input id="hit"  name="hit" type="number"   class="form-control" placeholder=" Enter Website Traffic Hit">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="status" data-style="btn btn-primary btn-round" title="Select Status" data-size="7">
                                            <option value="1" selected> Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Details </label>
                                        <textarea class="form-control"  name="details" id="details" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <a href="{{route('admin.ptcs.index')}}" class="btn btn-danger ">Cancel </a>

                            <button class="btn btn-info pull-right" type="submit">Create PTC Ad</button>

                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
