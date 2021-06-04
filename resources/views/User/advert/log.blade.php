@extends('layouts.dashboard')
@section('title','My Ads History')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>My Ads History</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ads History</a></li>
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
                        <h2><strong>Advert</strong> Details</h2>
                    </div>
                    <div class="body">
                        @if (count($logs) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Ad Type</th>
                                            <th class="text-center">Per Hit</th>
                                            <th class="text-center">Hit Count</th>
                                            <th class="text-center">Total Hit</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $logs as $log )
                                        @php $id++;@endphp
                                        <tr>
                                            <td class="text-center">{{ $id }}</td>
                                            <td class="text-center">{{$log->title}}</td>
                                            <td class="text-center">

                                                @if($log->type == 1)
                                                    Website
                                                @endif

                                            </td>
                                            <td class="text-center">{{config('app.currency_symbol')}} {{ 0}}</td>
                                            <td class="text-center">{{$log->totalHit }}</td>
                                             <td class="text-center">{{$log->hit }}</td>
                                            <td class="text-center">
                                                @if($log->turn ==null)
                                                    <span class="btn btn-primary"><i class="zmdi zmdi-edit"></i> Awaiting for Approval</span>

                                                 @else

                                                    @if($log->status == 1)
                                                        <span class="btn btn-info"><i class="zmdi zmdi-check"></i>Running</span>

                                                    @elseif($log->status == 2)

                                                    <span class="btn btn-success"><i class="zmdi zmdi-close"></i>Limit Reached</span>

                                                     @else
                                                        <span class="btn btn-rose"><i class="zmdi zmdi-close"></i>Not Running</span>
                                                    @endif
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('pShow', $log->id)}}" type="button" rel="tooltip" class="btn btn-warning">
                                                    Preview Ads
                                                </a>

                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h1 class="text-center">You Don't Have any Ads Yet</h1>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
