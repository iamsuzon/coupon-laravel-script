<div class="popular-category-area-start" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="btn-wrapper">
                        <a href="{{$data['view_all_link']}}" class="view-all main-color-two">{{$data['view_all_text']}}
                            <i class="las la-long-arrow-alt-right icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row three-column">
            @foreach($data['categories'] as $category)
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="{{route_single_category($category->slug)}}" class="single-popular-catg-item style-01">
                        <span class="left-content">
                            <span class="icon-wrap">
                                {!! render_image_markup_by_attachment_id($category->image, '', 'thumb', false) !!}
                            </span>
                            <span class="content">
                                <span class="title">{{$category->title}}</span>
                                <span class="info">{{($category->products_count)}} {{__('offer available')}}</span>
                            </span>
                        </span>
                        <span class="right-content">
                            <span class="icon-wrap">
                                <i class="las la-arrow-right icon"></i>
                            </span>
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>