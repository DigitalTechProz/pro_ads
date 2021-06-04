@extends('layouts.admin')

@section('title', 'Edit PTC Ads')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Edit PTC Ads</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit PTC Ad</li>
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
                    <h2><strong>PTC Ads</strong> Settings</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{route('admin.user.advertEditSubmit', ['id'=>$advertisement->id])}}" method="post" class="card auth_form">
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
                                    <label>Title </label>
                                    <input id="title"  name="title" type="text" value="{{$advertisement->title}}" class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Website Link </label>
                                        <input id="ptc"  name="ptc" type="url" value="{{$advertisement->ptc->ad_link}}" class="form-control" placeholder="Enter Link">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="membership_id" data-style="btn btn-primary btn-round" title="Select Membership" data-size="7">
                                            @foreach($memberships as $membership)

                                                <option value="{{$membership->id}}"

                                                        @if($advertisement->membership->id == $membership->id)

                                                        selected

                                                        @endif

                                                > {{$membership->name}} </option>

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
                                        <input id="rewards"  name="rewards" type="text" value="{{$advertisement->ptc->rewards}}"  class="form-control" placeholder="Enter Rewards">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Total Hit</label>
                                        <input id="hit"  name="hit" type="number" value="{{$advertisement->ptc->hit}}"  class="form-control" placeholder=" Enter Website Traffic Hit">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Advert Duration (in Seconds)</label>
                                        <input id="duration"  name="duration" type="number"  value="{{$advertisement->ptc->duration}}" class="form-control" placeholder="Enter Advert Duration">
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="status" data-style="btn btn-primary btn-round" title="Select Status" data-size="7">
                                            <option value="1"
                                                @if($advertisement->status == 1)
                                                selected
                                                @endif
                                                > Active
                                            </option>

                                            <option value="0"
                                                @if($advertisement->status == 0)
                                                selected
                                                @endif
                                                >Not Active
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Details </label>
                                        <textarea class="form-control"  name="details" id="details" rows="10">{{$advertisement->ptc->details}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <a href="{{route('admin.user.advertAll')}}" class="btn btn-danger ">Cancel </a>

                            <button class="btn btn-info pull-right" type="submit">Save Changes</button>

                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
