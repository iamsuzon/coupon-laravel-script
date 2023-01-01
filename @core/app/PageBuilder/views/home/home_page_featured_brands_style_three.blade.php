<div class="featured-brand-area-wrapper bg-color-a" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 v-02">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="to-top-row-right main-color-one" id="fbrand_01"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="6" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="true" data-autoplaySpeed="2500" data-appendArrows="#fbrand_01"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                            {"breakpoint": 992, "settings": {"slidesToShow": 4}},
                            {"breakpoint": 768, "settings": {"slidesToShow": 4}},
                            {"breakpoint": 576, "settings": {"slidesToShow": 3}},
                            {"breakpoint": 415, "settings": {"slidesToShow": 2}}
                            ]'>
                    @foreach($data['brands'] as $brand)
                        <div class="slick-item">
                            <div class="single-brand-item style-02">
                                <div class="logo-box">
                                    <a href="{{route_single_brand($brand->slug)}}">
                                        {!! render_image_markup_by_attachment_id($brand->image, '', 'grid', false) !!}
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{route_single_brand($brand->slug)}}" class="title">{{$brand->title}}</a>
                                    <p class="location">{{optional($brand->location)->city_name}}, {{optional($brand->location)->state_name}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>