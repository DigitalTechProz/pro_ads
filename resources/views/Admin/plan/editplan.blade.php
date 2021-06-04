@extends('layouts.admin')
@section('title', 'Edit Investment Plan')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title">Edit Investment Plan</h2>
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
    <!-- Table to create invest style-->
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="body">
                <!-- create table-->
                <div class="header">
                    <h2><strong>Investment Plan</strong> Edit Settings</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{route('editplan.update',['id'=>$plan->id])}}" method="post" class="card auth_form" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PUT')}}


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
                                    <label>Plan Name </label>
                                    <input id="name"  name="name" type="text" value="{{$plan->name}}"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Plan Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <!-- Select ROI Style-->
                            <div class="row xlearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="style_id" data-style="btn btn-primary btn-round" title="Select ROI Style" data-size="5">>
                                            @foreach ($styles as $style)
                                             <option value="{{ $style->id}}"
                                            @if ($plan->style->id == $style->id)
                                            selected
                                            @endif
                                            >{{$style->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- End Select ROI Style-->

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Minimum To Invest (in {{config('app.currency_code')}}) </label>
                                        <input id="minimum"  name="minimum" type="number" value="{{$plan->minimum +0}}"  class="form-control @error('minimum') is-invalid @enderror" name="minimum" value="{{ old('minimum') }}" autocomplete="minimum" autofocus placeholder="Enter Minimum Amount">

                                        @error('minimum')
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
                                        <label>Miximum To Invest (in {{config('app.currency_code')}}) </label>
                                        <input id="maximum"  name="maximum" type="number" value="{{$plan->maximum +0}}"  class="form-control @error('maximum') is-invalid @enderror" name="maximum" value="{{ old('maximum') }}" autocomplete="maximum" autofocus placeholder="Enter Miximum Amount">

                                        @error('maximum')
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
                                        <label>ROI Interest (in Percentage) </label>
                                        <input id="percentage"  name="percentage" type="text" value="{{$plan->percentage}}"  class="form-control @error('percentage') is-invalid @enderror" name="percentage" value="{{ old('percentage') }}" autocomplete="percentage" autofocus placeholder="Enter number">

                                        @error('percentage')
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
                                        <label>Total Repeat (Interest return compounding)* Write 0 for no compound ROI </label>
                                        <input id="repeat"  name="repeat" type="number" value="{{$plan->repeat}}"  class="form-control @error('repeat') is-invalid @enderror" name="repeat" value="{{ old('repeat') }}" autocomplete="repeat" autofocus placeholder="Enter ROI compoud period">

                                        @error('repeat')
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
                                        <label>Invest Start Delay(Time) </label>
                                        <input id="start_duration"  name="start_duration" type="number" value="{{$plan->start_duration}}"  class="form-control @error('start_duration') is-invalid @enderror" name="start_duration" value="{{ old('start_duration') }}" autocomplete="start_duration" autofocus placeholder="Enter Start Duration Time">

                                        @error('start_duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row xlearfix">
                                <div class="col-sm-12">
                                    <div class="form-group label-info">
                                        <select class="selectpicker" name="status" data-style="btn btn-primary btn-round" title="Select Plan Status" data-size="5">>

                                            <option value="0"
                                                 @if($plan->status == 0)
                                                selected
                                                @endif
                                                 >Not Active
                                            </option>
                                            <option value="1"
                                                @if($plan->status == 1)
                                                selected
                                                @endif
                                                >Active
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                            <a href="{{route('createinvestplan')}}" class="btn btn-danger ">Cancel Changes</a>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-info pull-right" type="submit" data-type="success">Save All Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
