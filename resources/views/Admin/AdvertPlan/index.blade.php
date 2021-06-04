@extends('layouts.admin')

@section('title', 'All Advert Plan or Create Advert Plan')


@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Advert Plans</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Advert Plans</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <!-----************************** View Advert Plans ********************---->

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>View All Advert Plans or </strong> Create New Advert Plan</h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Hit</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($styles)
                                        @foreach($styles as $style)
                                        <tr>
                                            <td>{{$style->id}}</td>
                                            <td>{{$style->name}}</td>
                                            <td>{{$style->price}}</td>
                                            <td>{{$style->hit}}</td>
                                            <td>
                                                @if($style->type == 1)
                                                    For Website
                                                @endif

                                            </td>
                                            <td class="text-center td-actions">
                                                <a href="{{route('admin.advert.planEdit', $style->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                                    Edit
                                                </a>

                                                <a href="{{route('admin.advert.planDestroy', $style->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>

                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-----************************** Create New Advert Plan ********************---->

        <div class="col-md-8 col-lg-12 ">
            <div class="card">
                <div class="body">
                    <!-- create table-->
                    <div class="header">
                        <h2><strong>Create New Advert Plan</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <form action="{{route('admin.advert.plan.store')}}" method="post" class="card auth_form">
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
                                        <label>Style Name</label>
                                        <input id="name"  name="name" type="text"   class="form-control" placeholder="Enter Style Name">
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group label-info">
                                            <select class="selectpicker" name="type" data-style="btn btn-primary btn-round" title="Select Advert Plan Type" data-size="7">

                                                <option value="1">For Website Ads</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Advert Price Plan (example : 100.00</label>
                                            <input id="price"  name="price" type="text"   class="form-control" placeholder="Enter Advert Price">
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

                                <button class="btn btn-info pull-right" type="submit">Create Advert Style</button>

                                <div class="clearfix"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
