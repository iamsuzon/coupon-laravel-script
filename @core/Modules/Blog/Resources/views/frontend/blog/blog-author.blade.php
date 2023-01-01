@extends('frontend.frontend-page-master')

@section('site-title')
    {{$author_info->name}}
@endsection

@section('page-title')

    <h2 class="list-item font-weight-bold"><a href="#">{{__('Author')}}</a></h2>
    <h2 class="list-item font-weight-bold"><a href="#">{{$author_info->name}}</a></h2>
@endsection

@section('custom-page-title')
    {{$author_info->name}}
@endsection

@section('page-meta-data')
    {!! render_site_meta() !!}
    {!! render_site_title($author_info->name) !!}
@endsection

@section('content')
    <div class="blog-grid-area-wrapper food-details" data-padding-top="50" data-padding-bottom="50">
        <div class="container">
            <div class="row three-column">
                @forelse($all_blogs as $blog)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="blog-grid style-01">
                            <div class="img-box">
                                {!! render_image_markup_by_attachment_id($blog->image, '','grid',false) !!}
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    <a href="{{route('frontend.blog.single',$blog->slug)}}">{{$blog->title}}</a>
                                </h4>
                                <div class="post-meta">
                                    <ul class="post-meta-list">
                                        <li class="post-meta-item">
                                            <a href="{{route('frontend.blog.category.single',$blog->category_id)}}">
                                                <span class="text">{{optional($blog->category)->title}}</span>
                                            </a>
                                        </li>
                                        <li class="post-meta-item date">
                                            <span class="text">{{$blog->created_at->format('d F Y')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
            <div class="row">
                <!-- pagination area start -->
                <div class="col-lg-12">
                    <div class="pagination" data-padding-top="50">
                        <ul class="pagination-list">
                            {{$all_blogs->links()}}
                        </ul>
                    </div>
                </div>
                <!-- pagination area end -->
            </div>
        </div>
    </div>

@endsection
