@extends('layouts.admin')
@section('title', 'View All User Invest Requests')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All User Investment Requests</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Investment Requests</a></li>
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
                        <h2><strong>All Investment Requests </strong> Summary</h2>
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
                        @if (count($investments) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Reference Id</th>
                                            <th>Invest Type</th>
                                            <th>ROI</th>
                                            <th>Interest System</th>
                                            <th>Amount</th>
                                            <th>Time</th>
                                            <th>User</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $investments as $investment )
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{$investment->reference_id}}</td>
                                            {{--<td width="10%" class="text-center">
                                                <img src="{{asset($gateway->image)}}" class="img-circle" alt="No Photo">

                                            </td>--}}
                                            <td>{{$investment->plan->style->name}}</td>
                                            <td>{{$investment->plan->percentage +0}}%</td>
                                            <td>
                                                @if($investment->plan->repeat == 0)
                                                {{$investment->plan->style->compound}} Hours Later Lifetime
                                                @else
                                                {{$investment->plan->style->compound}} Hours Later {{$investment->plan->repeat}} Times
                                                @endif
                                            </td>
                                            <td>{{config('app.currency_symbol')}} {{$investment->amount + 0 }}</td>
                                            <td>{{$investment->created_at->diffForHumans()}}</td>
                                            
                                            <td>
                                                <a hr="#" type="button" class="btn btn-success">
                                                    <i class="material-icons"></i> Active
                                                </a>
                                            </td>
                                            <td>
                                                @if ($investment->status == 1)
                                                    <button class="btn btn-success btn-sm">
                                                        <span class="btn-label">
                                                            <i class="material-icons"></i>
                                                        </span> Completed
                                                    </button>
                                                @else
                                                    <button class="btn btn-primary btn-sm">
                                                        <span class="btn-label">
                                                            <i class="material-icons"></i>
                                                        </span> Pending
                                                    </button>
                                                    
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else

                            <h1 class="text-center">No  Investment Requests Found</h1>

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