@extends('layouts.admin')

@section('title', 'Edit Advert Plan')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title"> Edit Advert Plan</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Plan</li>
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
                    <h2><strong>Advert Plan</strong> Settings</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{route('admin.advert.planUpdate',['id'=>$style->id])}}" method="post" class="card auth_form">
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
                                    <label>Style Name </label>
                                    <input id="name"  name="name" type="text" value="{{$style->name}}" class="form-control" placeholder="Enter Style Name">
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="type" data-style="btn btn-primary btn-round" title="Select Advert Plan Type" data-size="7">
                                            <option value="1"
                                                @if($style->type == 1)
                                                    selected
                                                @endif
                                                >For Website Ads
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Advert Price Plan (example : 100.00</label>
                                        <input id="price"  name="price" type="text" value="{{$style->price}}"  class="form-control" placeholder="Enter Advert Price">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Advert Duration (in Seconds, Example: 60)</label>
                                        <input id="duration"  name="duration" type="number" value="{{$style->duration}}"  class="form-control" placeholder="Enter Advert Duration">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Website Traffic Hit (Example: 10000)</label>
                                        <input id="hit"  name="hit" type="number" value="{{$style->hit}}"  class="form-control" placeholder=" Enter Website Traffic Hit">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="status" data-style="btn btn-primary btn-round" title="Select Advert Plan Status" data-size="7">
                                            <option value="0"
                                                @if($style->status == 0)
                                                selected
                                                @endif
                                                >Not Active
                                            </option>

                                            <option value="1"
                                                @if($style->status == 1)
                                                selected
                                                @endif
                                                >Active
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <a href="{{route('admin.advert.planIndex')}}" class="btn btn-danger ">Cancel </a>

                            <button class="btn btn-info pull-right" type="submit">Update Advert Plan</button>

                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
