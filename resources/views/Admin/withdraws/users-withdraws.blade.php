@extends('layouts.admin')
@section('title', 'All User Withdrawal Requests')

@section('content')
<section class= "content">

 <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Local Withdrawal Requests</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Withdrawal Requests</a></li>
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
                        <h2><strong>Withdrawal Requests</strong> Summary</h2>

                    </div>
                    <div class="body">
                        @if (count($withdraws) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <<th>SN</th>
                                            <th>Gateway</th>
                                            <th>Amount</th>
                                            <th>Need to Send</th>
                                            <th>Account</th>
                                            <th>Requested</th>
                                            <th>Set As</th>
                                            <th>Set As</th>
                                            <th>User</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $withdraws as $withdraw )
                                        @php $id++;@endphp
                                        <tr>
                                            <td class="text-center">{{ $id }}</td>
                                            <td class="text-center">{{$withdraw->gateway_name}}</td>
                                            <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount}}</td>
                                            <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->net_amount}}</td>
                                            <td class="text-center">{{$withdraw->account}}</td>
                                            <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                            <td class="text-center td-actions">

                                                @if($withdraw->status == 0)

                                                    <a href="{{route('admin.withdraw.update', $withdraw->id)}}"
                                                       type="button" class="btn btn-success">
                                                        <i class="material-icons"></i> Complete
                                                    </a>
                                                @endif

                                            </td>

                                            <td class="text-center td-actions">

                                                @if($withdraw->status == 0)
                                                    <a href="{{route('admin.withdraw.fraud', $withdraw->id)}}" type="button"
                                                       class="btn btn-warning">
                                                        <i class="material-icons"></i> Refund
                                                    </a>
                                                @endif

                                            </td>
                                            <td class="text-center td-actions">
                                                    <a href="{{route('showdetails', $withdraw->user->id)}}" type="button"
                                                       class="btn btn-info">
                                                        <i class="material-icons"></i> Details
                                                    </a>
                                            </td>

                                            <td class="text-center td-actions">

                                                @if($withdraw->status == 1)
                                                    <button class="btn btn-success btn-sm">
                                                        <span class="btn-label">
                                                            <i class="material-icons"></i>
                                                        </span>Completed
                                                    </button>

                                                @else

                                                    <button class="btn btn-primary btn-sm">
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

                            <h1 class="text-center">No Deposit Requests Yet</h1>

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>




</section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
        });
    </script>

@endsection
