@extends('layouts.admin')

@section('title', 'View All Link Share Ads')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Link Share Ads</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">View All Link Ads</a></li>
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
                        <h2><strong> Link Ads</strong> Summary</h2>

                    </div>
                    <div class="body">
                        @if (count($advertisements) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>URL</th>
                                            <th>Membership</th>
                                            <th>Per Click</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $advertisements as $advertisement )
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{$advertisement->title}}</td>
                                            <td>{!! str_limit($advertisement->details,60) !!}</td>
                                            <td>
                                                <a href="{{$advertisement->link}}" target="_blank" type="button" rel="tooltip" class="btn btn-info">Visit</a>
                                            </td>
                                            <td>{{$advertisement->membership->name}}</td>

                                            <td>
                                                {{config('app.currency_symbol')}} {{$advertisement->rewards + 0}}
                                            </td>
                                            <td>
                                                {{$advertisement->status == 1 ? 'Active':'Not Active'}}
                                            </td>
                                            <td>
                                                <a href="{{route('links.edit', $advertisement->id)}}" type="button" class="btn btn-success">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('links.delete', $advertisement->id)}}" type="button" class="btn btn-danger">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else

                            <h1 class="text-center">No advertisement Found</h1>

                        @endif
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">

                                {{$advertisements->render()}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
