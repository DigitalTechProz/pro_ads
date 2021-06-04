@extends('layouts.admin')

@section('title', 'View All Memberships')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Memberships</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">View All Memberships</a></li>
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
                        <h2><strong>All Memberships</strong> Summary</h2>

                    </div>
                    <div class="body">
                        @if (count($memberships) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Details</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $memberships as $membership )
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{$membership->name}}</td>
                                            <td>{!! str_limit($membership->details,60) !!}</td>
                                            <td>
                                                @if($membership->price == 0)

                                                Free

                                                @else
                                                {{config('app.currency_symbol')}} {{$membership->price + 0}}
                                                @endif
                                            </td>
                                            <td>{{$membership->duration}} Days</td>

                                            <td>
                                                <a href="{{route('memberships.edit', $membership->id)}}" type="button" class="btn btn-success">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('memberships.delete', $membership->id)}}" type="button" class="btn btn-danger">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else

                            <h1 class="text-center">No Membership Plan Found</h1>

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
