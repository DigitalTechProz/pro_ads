@extends('layouts.dashboard')
@section('title', 'My Referral & Link')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> My Referrals</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Referral Stats</a></li>
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
                        <h2><strong>My Referral</strong> Stats</h2>
                    </div>
                    <div class="body">
                        <h5> My Referral Link</h5>
                        <span class="justify-content center">
                            <code class="text-center">
                                {{ $link }}
                            </code>
                        </span>
                        @if(count($referrals) > 0)

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Total Earnings</th>
                                            <th>Today's Earnings</th>
                                            <th>Interest System</th>
                                            <th>Status</th>
                                            <th>Joined Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach($referrals as $referral)
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{$referral->user->name}}</td>
                                            <td>$ {{$referral->total + 0}}</td>
                                            <td>$ {{$referral->today +0}}</td>
                                            <td>
                                                @if($referral->user->active == 0)
                                                    Not Active
                                                @else
                                                    Active
                                                @endif
                                            </td>

                                            <td>{{ date("j/ n/ Y", strtotime($referral->user->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <h1> There is no Refer You have made.</h1>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
