@extends('layouts.admin')
@section('title', 'All Users')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Registered Users</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#userdashboard"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">User Tables</a></li>
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
                        <h2><strong>List</strong>  All Registered Users </h2>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>USERTYPE</th>
                                        <th>Main</th>
                                        <th>Referral</th>
                                        <th>Deposit</th>
                                        <th>Satus</th>
                                        <th>View</th>
                                        <th>EDIT</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users)

                                        @php $id=0;@endphp

                                        @foreach($users as $user)
                                            @php $id++;@endphp

                                                <tr>
                                                    <th>{{ $id }}</th>
                                                    <th>{{ $user->name }}</th>
                                                    <th>{{ $user->email }}</th>
                                                    <th>{{ $user->usertype }}</th>
                                                    <th>{{config('app.currency_symbol')}} {{$user->main_balance + 0}}</th>
                                                    <th>{{config('app.currency_symbol')}} {{$user->referral_balance +0}}</th>
                                                    <th>{{config('app.currency_symbol')}} {{$user->deposit_balance +0}}</</th>
                                                    <th>
                                                        @if($user->active == 0)
                                                            Not Active
                                                        @else
                                                            Active
                                                        @endif
                                                    </th>
                                                    <th> <a href="{{route('showdetails',$user->id) }}"  class="btn btn-info">Show</a></th>
                                                    <td>
                                                        <a href="{{route('edit-registered-users.update',$user->id) }}" class="btn btn-success">EDIT</a>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="btn btn-danger">DELETE</a>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">
                                {{$users->appends(['search'=>$search])->render()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Search -->

        <div id="search">
            <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
            <form action="{{route('registered-users')}}" method="get">
            <input id="search" name="search" type="search" value="{{isset($search) ? $search : ''}}" placeholder="Search..." />
            <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

    </div>
</section>

@endsection
