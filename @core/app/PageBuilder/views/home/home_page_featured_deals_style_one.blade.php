<div class="featured-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="to-top-row-right main-color-one" id="fdeal_01"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="3" data-slidesToScroll="1" data-swipeToSlide="true" data-rtl="false"
                     data-autoplay="true" data-autoplaySpeed="2500" data-appendArrows="#fdeal_01"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                    {"breakpoint": 1200,"settings": {"slidesToShow": 2}},
                    {"breakpoint": 992,"settings": {"slidesToShow": 2}},
                    {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                    ]'>

                    @foreach($data['deals'] as $deal)
                        <div class="slick-item">
                            <div class="single-featured-item style-01">
                                <div class="img-box">
                                    <a href="{{route_single_category(optional($deal->category)->slug)}}"
                                       class="catg-tag top-left border-radius-15">{{optional($deal->category)->title}}</a>
                                    <a href="{{route('frontend.product.single', $deal->slug)}}" class="deal-image">
                                        {!! render_image_markup_by_attachment_id($deal->image_1, null, 'grid', false) !!}
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="top-content">
                                        <div class="left-content">
                                            <div class="logo-box">
                                                <a href="{{route_single_brand(optional($deal->brand)->slug)}}">
                                                    {!! render_image_markup_by_attachment_id(optional($deal->brand)->image, null, 'thumb', false) !!}
                                                </a>
                                            </div>
                                            <div class="details">
                                                <a href="{{route_single_brand(optional($deal->brand)->slug)}}"
                                                   class="title">{{optional($deal->brand)->title}}</a>
                                                <p class="location">{{optional($deal->location)->city_name}}, {{optional($deal->location)->state_name}}</p>
                                            </div>
                                        </div>
                                        <div class="right-content">
                                            @if(get_product_rating_average($deal->id) > 0)
                                                <div class="star">
                                                    <i class="las la-star icon"></i>
                                                </div>
                                                <div class="rating-count">({{get_product_rating_average($deal->id)}})
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="middle-content">
                                        <a href="{{route('frontend.product.single', $deal->slug)}}" class="offer">{{$deal->title}}</a>
                                    </div>
                                    <div class="bottom-content">
                                        <div class="left-content">
                                            <div class="pricing">
                                                <span class="price">{{site_currency_symbol()}}{{$deal->sale_price}}</span>
                                                <del>{{site_currency_symbol()}}{{$deal->regular_price}}</del>
                                            </div>
                                        </div>
                                        <div class="right-content">
                                            <span class="offer-duration">
                                                @if(get_deal_expire_date($deal->expire_date) <= 0)
                                                    {{__('The Deal is Expired')}}
                                                @else
                                                    {{get_deal_expire_date($deal->expire_date)}} {{__('Days Left')}}
                                                @endif
                                            </span>
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