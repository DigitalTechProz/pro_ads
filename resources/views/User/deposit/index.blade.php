@extends('layouts.dashboard')
@section('title', 'My Deposits')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>My Deposits</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Deposits Summary</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <!--<a href="profile-edit.html" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a> -->

                </div>
            </div>


            <!-- Include content -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Deposits</strong> Summary</h2>
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
                            @if (count($deposits) > 0)

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Transaction ID</th>
                                                <th>Gateway Name</th>
                                                <th>Amount</th>
                                                <th>Charge</th>
                                                <th>Funded Amount</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $id=0;@endphp
                                            @foreach ( $deposits as $deposit)
                                            @php $id++;@endphp
                                            <tr>
                                                <td>{{ $id }}</td>
                                                <td>{{$deposit->transaction_id}}</td>
                                                <td>{{$deposit->gateway_name}}</td>
                                                <td>{{config('app.currency_symbol')}} {{$deposit->amount + 0}}</td>
                                                <td>{{config('app.currency_symbol')}} {{$deposit->charge + 0}}</td>
                                                <td>{{config('app.currency_symbol')}} {{$deposit->net_amount + 0}}</td>
                                                @if ($deposit->status == 1)
                                                <td>{{$deposit->updated_at->diffForHumans()}}</td>
                                                    @else
                                                    <td>{{$deposit->created_at->diffForHumans()}}</td>
                                                @endif
                                                <td>
                                                    @if ($deposit->status == 1)
                                                        <button class="btn btn-success">
                                                            <span class="btn-label">
                                                                <i class="material-icons"></i>
                                                            </span>
                                                            completed
                                                        </button>
                                                    @elseif($deposit->status == 2)
                                                        <button class="btn btn-danger">
                                                            <span class="btn-label">
                                                                <i class="material-icons"></i>
                                                            </span>
                                                            Fraud
                                                        </button>

                                                    @else

                                                        <button class="btn btn-warning ">
                                                            <span class="btn-label">
                                                                <i class="material-icons"></i>
                                                            </span>
                                                            Pending
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                            <h1 class="text-center">No Deposit Request</h1>
                            @endif
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-5">

                                    {{$deposits->render()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
