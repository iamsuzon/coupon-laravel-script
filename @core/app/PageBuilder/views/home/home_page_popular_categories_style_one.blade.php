<div class="popular-category-area-start" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 v-02">
                    <h1 class="section-title-main">{{$data['title'] ?? __('Popular Categories')}}</h1>
                    <div class="to-top-row-right main-color-three" id="pctg_02"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="5" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="true" data-autoplaySpeed="2500" data-appendArrows="#pctg_02"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                        {"breakpoint": 992,"settings": {"slidesToShow": 3}},
                        {"breakpoint": 768,"settings": {"slidesToShow": 2}},
                        {"breakpoint": 376,"settings": {"slidesToShow": 1}}
                        ]'>

                    @foreach($data['categories'] as $category)
                        <div class="slick-item">
                            <a href="{{route_single_category($category->slug)}}" class="single-popular-catg-item style-03">
                                <span class="left-content">
                                    <span class="icon-wrap image">
                                        {!! render_image_markup_by_attachment_id($category->image, 'grid', '', false) !!}
                                    </span>
                                    <span class="content">
                                        <span class="title">{{$category->title}}</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>