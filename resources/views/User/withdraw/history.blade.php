@extends('layouts.dashboard')
@section('title','Withdraw | History')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>My Withdrawal History</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Withdrawal History</a></li>
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
                        <h2><strong>My Withdrawal</strong> Details</h2>

                    </div>
                    <div class="body">
                        @if (count($withdraws) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Transaction Id</th>
                                            <th class="text-center">Gateway Name</th>
                                            <th class="text-center">Account</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Charge</th>
                                            <th class="text-center">Funded Amount</th>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $withdraws as $withdraw )
                                        @php $id++;@endphp
                                        <tr>
                                            <td class="text-center">{{ $id }}</td>
                                            <td class="text-center">{{$withdraw->transaction_id}}</td>
                                            <td class="text-center">{{$withdraw->gateway_name}}</td>
                                            <td class="text-center">{{$withdraw->account}}</td>
                                            <td class="text-center">$ {{$withdraw->amount +0}}</td>
                                            <td class="text-center">$ {{$withdraw->charge+0}}</td>
                                            <td class="text-center">$ {{$withdraw->net_amount+0}}</td>
                                            @if($withdraw->status == 1)
                                                <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>
                                            @else
                                                <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                            @endif
                                            <td >

                                                @if($withdraw->status == 1)

                                                    <button class="btn btn-success">
                                                    <span class="btn-label">
                                                        <i class="material-icons"></i>
                                                    </span>
                                                        Completed
                                                    </button>
                                                @elseif($withdraw->status == 2)

                                                    <button class="btn btn-danger">
                                                    <span class="btn-label">
                                                        <i class="material-icons"></i>
                                                    </span>
                                                        Fraud
                                                    </button>

                                                @else

                                                    <button class="btn btn-warning">
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
                            <h1 class="text-center">No Withdraw Request</h1>
                        @endif
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">

                                {{$withdraws->render()}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
