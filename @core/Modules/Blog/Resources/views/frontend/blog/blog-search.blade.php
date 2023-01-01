@extends('frontend.frontend-page-master')

@section('site-title')
     {{$search_term}}
@endsection

@section('custom-page-title')
    {{$search_term}}
@endsection

@section('page-meta-data')
    {!! render_site_meta() !!}
    {!! render_site_title($search_term) !!}
@endsection

@section('content')
    <div class="blog-area-wrapper Political-blog-grid-wrapper" data-padding-top="100" data-padding-bottom="100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>{{__('Search For: ')}} {{$search_term}}</h2>
                    @if(count($all_blogs) < 1)
                        <div class="alert alert-danger">
                            {{__('Nothing found related to').' '.$search_term}}
                        </div>
                    @endif
                    <div class="row">
                        @foreach($all_blogs as $data)
                            @php
                                $video_url =  $data->video_url;
                                $icon_color = get_static_option('blog_search_video_icon_color');
                            @endphp
                            <div class="col-md-6 col-lg-6 mt-5">
                                <div class="blog-grid-style-03 small-02">
                                    <div class="img-box">
                                        {!! render_image_markup_by_attachment_id($data->image, '', 'grid', false) !!}
                                    </div>
                                    <div class="content">
                                        <div class="post-meta">
                                            <ul class="post-meta-list style-02 mt-3 mb-2">
                                                @if($data->created_by == 'user')
                                                    @php $user = $data->user; @endphp
                                                @else
                                                    @php $user = $data->admin; @endphp
                                                @endif
                                                <li class="post-meta-item">
                                                    <a @if(!empty($user->id))  href="{{route('frontend.user.created.blog', ['user'=> $data->created_by, 'id'=>$user->id])}}" @endif>
                                                        <span class="text author"> {{$data->author ?? __('Anonymous')}}</span>
                                                    </a>
                                                </li>
                                                <li class="post-meta-item date">
                                                    <span class="text"> {{date('d M Y',strtotime($data->created_at))}} </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h4 class="title">
                                            <a href="{{route('frontend.blog.single',$data->slug)}}">{{ Str::words($data->getTranslation('title',$user_select_lang_slug),6 ?? '') }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <div class="col-lg-12">
                            <div class="pagination " data-padding-top="50">
                                <div class="pagination-wrapper">
                                    {{$all_blogs->links()}}
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-sm-7 col-md-6 col-lg-4">
                    <div class="widget-area-wrapper">
                        {!! render_frontend_sidebar('details_page_sidebar',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
