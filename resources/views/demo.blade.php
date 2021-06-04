<!DOCTYPE html>
<!--
Created using JS Bin
http://jsbin.com

Copyright (c) 2018 by anonymous (http://jsbin.com/vurexorupa/1/edit)

Released under the MIT license: http://jsbin.mit-license.org
-->
<meta name="robots" content="noindex">
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <meta charset=utf-8 />
    <title>Face book Share</title>
</head>
<body>

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
<div id = 'msg'>This message will be replaced using Ajax.
    Click the button to replace the message.
</div>

<div class="well">
    <button class="btn btn-info share-btn">Share</button>
</div>

<script>
    function fb_share() {
        FB.ui( {
            method: 'feed',
            name: "Subscribe To Free Signals",
            link: "https://t.me/IndicesInvestmentGroup",
            caption: "Learn How To trade Synthetic Indices."
        }, function( response ) {

                if (response && !response.error_message) {

                    console.log( response );
                    $.ajax({
                        url: '{{route('fbShare',2)}}',
                        type: 'GET',
                        success:function(data){
                            $("#msg").html(data.msg);
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
</body>
</html>
