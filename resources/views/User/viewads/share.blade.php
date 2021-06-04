@extends('layouts.dashboard')
@section('title', 'View All Available Link Share Ads')

@section('styles')
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
@endsection
@section('shares')


    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            // init the FB JS SDK
            FB.init({
                appId      : '244692093061189',                        // App ID from the app dashboard
                channelUrl : '//upcoming.io', // Channel file for x-domain comms
                status     : true,                                 // Check Facebook Login status
                xfbml      : true                                  // Look for social plugins on the page
            });

            // Additional initialization code such as adding Event Listeners goes here
        };

        // Load the SDK asynchronously
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>


@endsection

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Available Link Share Ads</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">View All Available Link Share Ads</a></li>
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
                        <h2><strong> Available Link Share Ads</strong> Summary</h2>

                    </div>

                    <div class="body">
                        @if(count($adverts) > 0)

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Rewards</th>
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
                                                <td>{{ $advert->link->title }}</td>
                                                <td>{{config('app.currency_symbol')}} {{ $advert->link->rewards +0 }}</td>
                                                <td>
                                                    @if($advert->status == 0)
                                                        <span class="btn btn-danger"><i class="zmdi zmdi-edit "></i> Not Viewed</span>
                                                    @else
                                                        <span class="btn btn-primary"><i class="zmdi zmdi-edit "></i> Viewed</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($advert->status == 0)

                                                        <button id="digitech{{$advert->id}}" class="btn btn-info share-btn">Share</button>

                                                        <script>
                                                            function fb_share() {
                                                                FB.ui( {
                                                                        method: 'feed',
                                                                        name: "{{$advert->link->title}}",
                                                                        link: "{{$advert->link->link}}",
                                                                        caption: "{{$advert->link->details}}"
                                                                    }, function( response ) {

                                                                        if (response && !response.error_message) {

                                                                            console.log( response );
                                                                            $.ajax({
                                                                                url: '{{route('fbShare',$advert->id)}}',
                                                                                type: 'GET',
                                                                                success:function(){
                                                                                    location.reload();
                                                                                }
                                                                            });

                                                                        } else {
                                                                            console.log( response );
                                                                            alert('Error while posting.');
                                                                        }
                                                                    }

                                                                );

                                                            }

                                                            $(document).ready(function(){
                                                                $('button.share-btn').on( 'click', fb_share );
                                                            });
                                                        </script>

                                                    @else
                                                        <span class="btn btn-primary"><i class="zmdi zmdi-edit "></i> Viewed</span>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
