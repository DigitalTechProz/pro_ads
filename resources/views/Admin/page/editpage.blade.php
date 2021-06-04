@extends('layouts.admin')
@section('title', 'Create Blog Page')

@section('content')
<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Post</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                        <li class="breadcrumb-item active">New Post</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('pageupdate',['id'=>$page->id])}}" method="post">
                    {{csrf_field()}}

                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="zmdi zmdi-thumb-up"></i>
                            </div>
                            <strong>Well done!</strong> {{ session('success')}}
                                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input id="title" name="title" type="text" value="{{$page->title}}" class="form-control" placeholder="Enter Blog title" />
                                </div>
                                <select class="form-control show-tick">
                                    <option> Select Page Visibility --</option>
                                    <option value="1" @if($page->status == 1) selected @endif >Published</option>
                                    <option value="0" @if($page->status == 0) selected @endif >Un - Published</option>
                                </select>
                            </div>
                        </div>
                        <div class="card">
                            <div class="body">
                                <div class="summernote">
                                    <label  class="control-label" for="content">Post Content</label>
                                    {{$page->content}}
                                </div>
                                <a href="{{route('pageindex')}}" class="btn btn-rose">Cancel Edit</a>

                                <button type="submit" class="btn btn-info waves-effect m-t-20">POST</button>
                            </div>
                        </div>
                    </div>  
                </form>          
            </div>
        </div>
    </div>
</section>

@endsection
