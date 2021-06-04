@extends('layouts.admin')
@section('title', 'Admin Pages')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All  Pages</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Created Pages</a></li>
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
                        <h2><strong>All</strong> Pages</h2>
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
                        @if (count($pages) > 0)
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>View Page</th>
                                            <th>Edit Post</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id=0;@endphp
                                        @foreach ( $pages as $page )
                                        @php $id++;@endphp
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{str_limit($page->title, 60)}}</td>
                                            <td class="td-actions text-center">
                                                <a href="{{route('viewPage',['slug'=>$page->slug])}}" type="button" rel="tooltip" class="btn btn-info">
                                                    <i class="material-icons">search</i>
                                                </a>
                                            </td>
                                            <td class="td-actions text-center">
                                                <a href="{{route('editpage',['id'=>$page->id])}}" type="button" rel="tooltip" class="btn btn-primary">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                            <td class="text-center">

                                                @if($page->status == 1)
                                                    <span type="button" class="btn btn-success"> Already Published </span>
                                                 @else
                                                    <span type="button" class="btn btn-danger"> Not Published </span>
                                                 @endif
    
                                            </td>
                                            <td class="text-center">
                                                @if($page->status == 1)
                                                <a href="{{route('pageunpublish',['id'=>$page->id])}}" type="button" rel="tooltip" class="btn btn-danger">
                                                    Un-Publish
                                                </a>
                                                @else
                                                    <a href="{{route('pagepublish',['id'=>$page->id])}}" type="button" rel="tooltip" class="btn btn-rose">
                                                        Publish
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else

                            <h1 class="text-center">No Website Page Found</h1>
    
                        @endif
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection