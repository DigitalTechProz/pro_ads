@extends('layouts.dashboard')
@section('title', 'Write Us A Review')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Post</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> home</a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="card-content">
            <h4 class="card-title">User Testimonial Section -
                <small class="category">Write a review to us</small>
            </h4>
            <br>
        </div>

            @if(count($review) == 0)

        <form action="{{route('userReiview.post')}}" method="post">
                {{ csrf_field() }}
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">notifications</i>
                        <span data-notify="message">

                            @foreach($errors->all() as $error)
                                <li><strong> {{$error}} </strong></li>
                            @endforeach

                    </span>
                    </div>
                @endif


                <div class="row">

                    <div class="col-md-10">
                        <div class="form-group label-floating">
                            <label  class="control-label" for="title">Subject</label>
                            <input id="title" name="title" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group label-floating">
                            <label  class="control-label" for="comment">Your Comment</label>
                            <textarea name="comment" class="form-control" id="comment" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <br> <br>
                <a href="{{route('userdashboard')}}" class="btn btn-rose">Cancel Create</a>
                <button type="submit" class="btn btn-success pull-right">Submit Review</button>
                <div class="clearfix"></div>
            </form>
            @else

            <h4 class="text-center text-success"> You are already submitted review</h4>

            @endif

        </div>
    </div>

</section>


@endsection
