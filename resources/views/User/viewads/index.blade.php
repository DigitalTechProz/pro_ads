@extends('layouts.dashboard')
@section('title', 'View All Available Ads')
@section('content')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Available Ads</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">View All Available Ads</a></li>
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

                    <!---- *********** View New PTC Ads *********------>

                    <div class="header">
                        <h2><strong> New Available Ads</strong> To View & Earn</h2>

                    </div>
                    <br>
                    <div class="card">
                    @if(count($adverts) > 0)
                        <div class="container-fluid">

                            <div class="row clearfix">
                                @foreach($adverts as $advert)
                                @if($advert->status == 0)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="body product_item">
                                            <span class="label onsale">Sale!</span>
                                            <img src="assets/images/ecommerce/1.png" alt="Product" class="img-fluid cp_img" />
                                            <div class="product_details">
                                                <a href="ec-product-detail.html">{{ $advert->ptc->title }}</a>
                                                <ul class="product_price list-unstyled">
                                                    <li class="old_price">{{config('app.currency_symbol')}} {{ $advert->ptc->rewards +0 }}</li>

                                                </ul>
                                            </div>
                                            <div class="action">

                                                <a href="javascript:void(0);" class="btn btn-info waves-effect"><i class="zmdi zmdi-eye"></i></a>




                                                <a href="{{route('userCashLinks.show', $advert->id)}}" class="btn btn-primary waves-effect">VIEW AD</a>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @endif
                                @endforeach

                                {{--@if($advert->status == 1)
                                <div class="alert alert-info" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="zmdi zmdi-alert-circle-o"></i>
                                        </div>
                                        <strong>Hey! {{$user->name}}</strong> There are no new ads for today.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="zmdi zmdi-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @endif--}}


                            </div>

                        </div>



                        <br>

                        <!-- ********** View Already Viewed Ads ****** --->


                        <div class="header">
                            <h2><strong> Viewed Ads</strong> Already Earned</h2>

                        </div>
                        <br>
                        <div class="container-fluid">

                            <div class="row clearfix">
                                @foreach($adverts as $advert)
                                @if($advert->status == 1)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="body product_item">
                                            <span class="label onsale">Sale!</span>
                                            <img src="assets/images/ecommerce/1.png" alt="Product" class="img-fluid cp_img" />
                                            <div class="product_details">
                                                <a href="ec-product-detail.html">{{ $advert->ptc->title }}</a>
                                                <ul class="product_price list-unstyled">
                                                    <li class="new_price">{{config('app.currency_symbol')}} {{ $advert->ptc->rewards +0 }}</li>
                                                </ul>
                                            </div>
                                            <div class="action">
                                                <a href="javascript:void(0);" class="btn btn-danger waves-effect"><i class="zmdi zmdi-eye-off"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect">Viewed</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endif
                                @endforeach


                            </div>
                        </div>



                        {{--<div class="container-fluid">
                            <div class="row clearfix">
                                    @if($advert->status == 1)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="body product_item">
                                                    <img src="assets/images/ecommerce/2.png" alt="Product" class="img-fluid cp_img" />
                                                        <div class="product_details">
                                                            <a href="ec-product-detail.html">{{ $advert->ptc->title }}</a>
                                                            <ul class="product_price list-unstyled">
                                                                <li class="new_price">{{config('app.currency_symbol')}} {{ $advert->ptc->rewards +0 }}</li>
                                                            </ul>

                                                            <div class="action">
                                                                <a href="javascript:void(0);" class="btn btn-danger waves-effect"><i class="zmdi zmdi-eye-off"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect">Viewed</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    @endif


                            </div>
                        </div>--}}



                    @endif



                    {{--<div class="body">
                        @if(count($adverts) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ad Title</th>
                                            <th>Ad Rewards</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $id=0;@endphp
                                        @foreach($adverts as $advert)
                                            @php $id++;@endphp

                                            <tr>
                                                <td>{{ $id }}</td>
                                                <td>{{ $advert->ptc->title }}</td>
                                                <td>{{config('app.currency_symbol')}} {{ $advert->ptc->rewards +0 }}</td>
                                                <td>
                                                    @if($advert->status == 0)
                                                        <span class="btn btn-danger"><i class="material-icons"></i> Not Viewed</span>
                                                    @else
                                                        <span class="btn btn-primary"><i class="material-icons"></i> Viewed</span>
                                                    @endif
                                                </td>

                                                <td >
                                                    @if($advert->status == 0)
                                                        <a href="{{route('userCashLinks.show', $advert->id)}}" type="button" rel="tooltip" class="btn btn-info">
                                                            <i class="material-icons"></i>
                                                            View Ads
                                                        </a>
                                                    @else
                                                        <span class="btn btn-primary"><i class="material-icons"></i> Already Viewed</span>
                                                    @endif
                                                </td>

                                            </tr>

                                        @endforeach


                                    </tbody>

                                </table>

                            </div>
                        @else

                            <h1 class="text-center">No Advertisement Right Now</h1>
                        @endif
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">

                                {{$adverts->render()}}

                            </div>
                        </div>

                    </div>--}}

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
