@extends('layouts.admin')
@section('title', 'Create Style')

@section('content')
<section class="content">
    <div class="body-scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="title">Create Investment Return Style</h2>
                    <h5 class="description"></h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Create Style</li>
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
                    <h2><strong>Investment Return</strong> Style</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form action="{{route('styleindex')}}" method="post" class="card auth_form">
                            {{ csrf_field() }}


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Style Name </label>
                                    <input id="name"  name="name" type="text"   class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Style Name">

                                    @error('name')
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
                                        <label> Time (in Hours) </label>
                                        <input id="compound"  name="compound" type="number"  class="form-control @error('compound') is-invalid @enderror" name="compound" value="{{ old('compound') }}" autocomplete="compound" placeholder="Enter number of hours">

                                        @error('compound')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <button class="btn btn-success waves-effect" type="submit" data-type="success" >Save All Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

