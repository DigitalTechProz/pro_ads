@extends('layouts.admin')
@section('title','All User Ad Requests')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All User Ad Requests</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"> User Ad Requests</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <!-----************************** View Ad Requests ********************---->

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>View All User Ad </strong> Requests</h2>

                    </div>
                    <div class="body">
                        @if(count($logs) >0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Hit</th>
                                            <th>Request</th>
                                            <th>User</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach($logs as $log)
                                            @php $id++;@endphp
                                            <tr>
                                                <td>{{ $id }}</td>
                                                <td>{{$log->title}}</td>
                                                <td>

                                                    @if($log->type == 1)
                                                        Website
                                                    @else
                                                        Link Share
                                                    @endif

                                                </td>
                                                <td>{{config('app.currency_symbol')}} {{$log->scheme->price + 0}}</td>
                                                 <td>{{$log->scheme->hit }}</td>
                                                <td>{{ date("j/ n/ Y", strtotime($log->created_at)) }}</td>
                                                <td>
                                                    <a href="{{route('showdetails', $log->user->id)}}" type="button"
                                                       rel="tooltip" class="btn btn-rose btn-raised">Details</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('pShow', $log->id)}}" type="button" rel="tooltip" class="btn btn-warning">
                                                        Preview
                                                    </a>
                                                </td>
                                                <td class="text-center td-actions">
                                                    @if($log->status == 1)

                                                        <span class="btn btn-success">Running</span>

                                                    @elseif($log->status == 0)
                                                        <span class="btn btn-success">Paused</span>
                                                    @else
                                                        <span class="btn btn-danger">Stopped</span>
                                                    @endif

                                                </td>
                                                <td class="text-center td-actions">
                                                    <a href="{{route('admin.user.advertEdit', $log->id)}}" type="button" rel="tooltip" class="btn btn-info">
                                                       Edit
                                                    </a>

                                                    @if($log->status == 1)

                                                        <a href="{{route('admin.user.advertPR', $log->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                            Pause It
                                                        </a>
                                                    @elseif($log->status == 0)
                                                        <a href="{{route('admin.user.advertPR', $log->id)}}" type="button" rel="tooltip" class="btn btn-primary">
                                                            Resume It
                                                        </a>
                                                    @else
                                                        <span class="btn btn-danger">Limit Reached</span>
                                                    @endif

                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else

                            <h1 class="text-center">No  User Ads Request Yet</h1>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
