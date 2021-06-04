@extends('layouts.dashboard')
@section('title','New Referral Stats')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>New Referral Stats</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Activity Summary</a></li>
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Users</strong> Activity</h2>
                    </div>

                    @if(count($referrals) > 0)
                    <div class="hv-item-children">
                        @foreach($referrals as $referral)
                        <div class="hv-item-child">
                            <!-- Key component -->
                            <div class="hv-item">

                                <div class="hv-item-parent">
                                    <div class="person">
                                        <img src="img/default-avatar.jpg"  class="rounded-circle shadow "  alt="">
                                        <p class="name">
                                            {{$referral->user->name}} <b>/ {{$user->address}}</b>
                                        </p>
                                    </div>
                                </div>
                                @if(count($referral->childs))
                                    <div class="hv-item-children">
                                    @include('includes.dashboard.child',['childs' => $referral->childs])
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endforeach

                        @else
                        <h1> There is no Refer You have made.</h1>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

