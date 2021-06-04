@extends('layouts.admin')
@section('title', 'View All Local Gateway Payments')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Local Gateway Payments</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">View All Gateway Payments</a></li>
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
                        <h2><strong>All Gateway</strong> Summary</h2>
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
                        @if (count($gateways) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            {{--<th>Photo</th>--}}
                                            <th>Account No</th>
                                            <th>Fixed Fee</th>
                                            <th>Percent Fee</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $gateways as $gateway )
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{$gateway->name}}</td>
                                            {{--<td width="10%" class="text-center">
                                                <img src="{{asset($gateway->image)}}" class="img-circle" alt="No Photo">

                                            </td>--}}
                                            <td>{{$gateway->account}}</td>
                                            <td>{{config('app.currency_symbol')}} {{$gateway->fixed}}</td>
                                            <td>{{$gateway->percent}}%</td>
                                            <td>{{$gateway->status == 1 ? 'Active':'Not Active'}}</td>
                                            <td>
                                                <a hr="#" type="button" class="btn btn-success">
                                                    <i class="material-icons">Edit</i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" type="button" class="btn btn-danger">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else

                            <h1 class="text-center">No Local Gateway Payment Found</h1>

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
