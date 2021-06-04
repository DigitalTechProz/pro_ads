@extends('layouts.admin')
@section('title','Show Member Investment Details')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Member Investment Details</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Investment History</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>User Investment</strong> Details</h2>                        
                </div>
                <div class="body">
                    <h5 class="card-title"><span class="text-danger">Investment Reference ID:    </span><span
                        class="text-primary"><b>{{$investment->reference_id}}</b></span></h5>
                    <h5 class="card-title"><span class="text-danger">Investment Created:   </span> <span
                        class="text-primary"><b>{{ date('F jS, Y \a\t h:i a', strtotime($investment->created_at)) }}</b></span>
                    </h5>
                    <h5 class="card-title"><span class="text-danger">Investment Type:    </span><span
                        class="text-primary"><b>{{$investment->plan->style->name}}</b></span></h5>
                    <h5 class="card-title"><span class="text-danger">Interest Rate:    </span><span
                        class="text-primary"><b>{{$investment->plan->percentage +0}}%</b></span></h5>
                    <h5 class="card-title"><span class="text-danger">Recent Interest:    </span><span
                                class="text-primary"><b>{{ date('F jS, Y \a\t h:i a', strtotime($interest->made_time)) }}</b></span></h5>
                    <h5 class="card-title"><span class="text-danger">Next Interest:    </span><span
                                class="text-primary"><b>{{ date('F jS, Y \a\t h:i a', strtotime($interest->start_time)) }}</b></span></h5>
                    {{--<h5 class="card-title"><span class="text-danger">Investment End:    </span><span
                                class="text-primary"><b>{{ date('F jS, Y \a\t h:i a', strtotime($trialExpires)) }}</b></span></h5>--}}
                    <h5 class="card-title"><span class="text-danger">Investment Amount:    </span><span
                                class="text-primary"><b>${{$investment->amount +0}}</b></span></h5>
                    <h5 class="card-title"><span class="text-danger">Total Profit:    </span><span
                                class="text-primary"><b>${{$profit +0}}</b></span></h5>
                    <div class="row">
                    <a href="#" class="btn btn-info">View User</a>
                    <a href="#" class="btn btn-primary">Pause Investment</a>
                    <a href="#" class="btn btn-danger">Stop Totally</a>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection