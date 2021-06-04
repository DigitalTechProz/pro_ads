@extends('layouts.admin')
@section('title', 'View All Instant Gateway')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Instant Gateway</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Crypto Currency Gateways</a></li>
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
                        <h2><strong>Instant Gateway </strong> Summary</h2>

                    </div>
                    <div class="body">
                        @if (count($gateways) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Account Name</th>
                                            <th class="text-center">Account No</th>
                                            <th class="text-center">Fixed Fee</th>
                                            <th class="text-center">Percent Fee</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $gateways as $gateway )
                                        @php $id++;@endphp
                                        <tr>
                                            <td class="text-center">{{ $id }}</td>
                                            <td class="text-center">{{$gateway->name}}</td>
                                            {{--<td width="10%" class="text-center">
                                                <img src="{{asset($gateway->image)}}" class="img-circle" alt="No Photo">

                                            </td>--}}
                                            <td class="text-center">{{$gateway->account}}</td>
                                            <td class="text-center">{{config('app.currency_symbol')}} {{$gateway->fixed}}</td>
                                            <td class="text-center">{{$gateway->percent}} %</td>
                                            <td class="text-center">{{$gateway->status == 1 ? 'Active':'Not Active'}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.gateway.edit', $gateway->id)}}" type="button" class="btn btn-success">
                                                    <i class="material-icons"></i>

                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('admin.gateway.delete', $gateway->id)}}" type="button" class="btn btn-warning">
                                                    <i class="material-icons"></i>

                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else

                            <h1 class="text-center">No  Gateways Found</h1>

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
