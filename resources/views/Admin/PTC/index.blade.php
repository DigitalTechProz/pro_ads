@extends('layouts.admin')

@section('title', 'View All PTC Ads')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All PTC Ads</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">View All PTC Ads</a></li>
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
                        <h2><strong> PTC Ads</strong> Summary</h2>

                    </div>
                    <div class="body">
                        @if (count($advertisements) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Membership</th>
                                            <th>Per Click</th>
                                            <th>Hit</th>
                                            <th>Count</th>
                                            <th>Status</th>
                                            <th>URL</th>
                                            <th>Edit</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $advertisements as $advertisement )
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{$advertisement->title}}</td>
                                            <td>{{$advertisement->membership->name}}</td>
                                            <td>{{config('app.currency_symbol')}} {{$advertisement->rewards + 0}}</td>
                                            <td>{{$advertisement->hit}}</td>
                                            <td>{{$advertisement->count}}</td>
                                            <td>
                                                @if($advertisement->status == 1)
                                                    Active
                                                @elseif($advertisement->status == 2)
                                                    Limit Reached
                                                @else
                                                    Not Active
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.ptc.preview', $advertisement->id)}}" type="button" rel="tooltip" class="btn btn-warning">
                                                    Preview
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.ptc.edit', $advertisement->id)}}" type="button" rel="tooltip" class="btn btn-info">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.ptc.delete', $advertisement->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">close</i>
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
