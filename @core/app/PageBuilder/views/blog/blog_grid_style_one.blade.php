<div class="blog-grid-area-wrapper food-details" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row three-column">
            @foreach($data['blogs'] as $blog)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="blog-grid style-01">
                        <div class="img-box">
                            {!! render_image_markup_by_attachment_id($blog->image, null, 'grid', false) !!}
                        </div>
                        <div class="content">
                            <h4 class="title">
                                <a href="{{route('frontend.blog.single', $blog->slug)}}">{{$blog->title}}</a>
                            </h4>
                            <div class="post-meta">
                                <ul class="post-meta-list">
                                    <li class="post-meta-item">
                                        <a href="{{route('frontend.blog.category.single', $blog->category_id)}}">
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
            @endforeach
        </div>
        <div class="row">
            <!-- pagination area start -->
            <div class="col-lg-12">
                <div class="pagination" data-padding-top="50">
                    <ul class="pagination-list">
                        {{$data['blogs']->links()}}
                    </ul>
                </div>
            </div>
            <!-- pagination area end -->
        </div>
    </div>
</div>