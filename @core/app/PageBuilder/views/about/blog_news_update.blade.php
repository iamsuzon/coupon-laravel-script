<div class="blog-grid-area-wrapper food-details" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two v-02">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
        <div class="row three-column">
            @foreach($data['blogs'] as $blog)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="blog-grid style-01">
                    <div class="img-box">
                        {!! render_image_markup_by_attachment_id($blog->image,'','', false) !!}
                    </div>
                    <div class="content">
                        <span class="tag">{{$blog->created_at->format('d F Y')}}</span>
                        <h4 class="title">
                            <a href="{{route('frontend.blog.single',$blog->slug)}}">{{$blog->title}}</a>
                        </h4>
                        <div class="post-meta">
                            <ul class="post-meta-list main-color-two style-02">
                                <li class="post-meta-item">
                                    <a href="{{route('frontend.blog.category.single', $blog->category_id)}}">
                                        <span class="text author">{{optional($blog->category)->title}}</span>
                                    </a>
                                </li>
                                <li class="post-meta-item date">
                                    <a href="{{route('frontend.blog.single',$blog->slug)}}">
                                        <span class="text">{{count($blog->comments)}} {{__('Comments')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>