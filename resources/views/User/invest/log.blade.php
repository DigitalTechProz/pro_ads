@extends('layouts.dashboard')
@section('title','Interest History')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>My Interest History</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Interest History</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Interest</strong> Details</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        @if (count($logs) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Reference</th>
                                            <th>Invest Type</th>
                                            <th>ROI</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $logs as $log )
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{$log->reference_id}}</td>
                                            <td>{{$log->invest->plan->style->name}}</td>
                                            <td>{{$log->invest->plan->percentage +0}}%</td>
                                            <td>{{config('app.currency_symbol')}} {{$log->amount + 0 }}</td>
                                            <td>{{ date("j, n, Y", strtotime($log->created_at)) }}</td>
                                            <td>{{ date("g:i A", strtotime($log->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h1 class="text-center">You Don't Have any Investment Yet</h1>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
