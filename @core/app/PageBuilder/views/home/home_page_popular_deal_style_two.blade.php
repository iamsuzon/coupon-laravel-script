<div class="popular-category-area-start" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="to-top-row-right main-color-three" id="pctg_02"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="4" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="false" data-autoplaySpeed="2500" data-appendArrows="#pctg_02"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                    {"breakpoint": 1200,"settings": {"slidesToShow": 3}},
                    {"breakpoint": 992,"settings": {"slidesToShow": 2}},
                    {"breakpoint": 576,"settings": {"slidesToShow": 1}}
                    ]'>
                    @foreach($data['products'] as $product)
                        <div class="slick-item">
                        <div class="single-recent-item style-03 v-02">
                            <div class="img-box">
                                <a href="{{route_single_category(optional($product->category)->slug)}}" class="catg-tag top-right border-radius-15">{{optional($product->category)->title}}</a>
                                <a href="{{route_single_product($product->slug)}}">
                                    {!! render_image_markup_by_attachment_id($product->image, '', 'grid', false) !!}
                                </a>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <div class="left-content">
                                        <p class="offer">
                                            <a href="{{route_single_product($product->slug)}}">{{Str::words($product->title, 10)}}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="right-content">
                                        <div class="btn-wrapper left">
                                            <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{$data['button_one_text']}}</a>
                                        </div>

                                        <div class="btn-wrapper right">
                                            <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{$data['button_two_text']}}</a>
                                        </div>
                                    </div>
                                    <div class="left-content">
                                        <div class="left">
                                            <p class="info">{{$product->coupon != null ? optional($product->coupon)->coupon_used : 0}} {{__('Used Total')}}</p>
                                        </div>
                                        <div class="right">
                                            @if(get_product_rating_average($product->id) > 0)
                                                <div class="star">
                                                    {!! render_ratings(get_product_rating_average($product->id)) !!}
                                                </div>
                                                <div class="rating-count">({{count($product->reviews)}})
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>