<div class="Popular-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="to-top-row-right main-color-one" id="popd_01"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="4" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="true" data-autoplaySpeed="2500" data-appendArrows="#popd_01"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                        {"breakpoint": 1200,"settings": {"slidesToShow": 3}},
                        {"breakpoint": 992,"settings": {"slidesToShow": 2}},
                        {"breakpoint": 576,"settings": {"slidesToShow": 1}}
                        ]'>
                    @foreach($data['products'] as $product)
                        <div class="slick-item">
                        <div class="single-exclusive-item style-01">
                            <div class="img-box">
                                <a href="{{route_single_category(optional($product->category)->slug)}}" class="catg-tag top-right border-radius-5">{{optional($product->category)->title}}</a>
                                <a href="{{route('frontend.product.single', $product->slug)}}">
                                    {!! render_image_markup_by_attachment_id($product->image, null, 'grid', false) !!}
                                </a>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="{{route('frontend.product.single', $product->slug)}}" class="offer">
                                        {{Str::words($product->title, 8)}}
                                    </a>
                                </div>
                                <div class="middle-content">
                                    <div class="left-content">
                                        <div class="pricing">
                                            <span class="price">{{site_currency_symbol()}}{{$product->sale_price}}</span>
                                            <del>{{site_currency_symbol()}}{{$product->regular_price}}</del>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="left-content">
                                        <div class="btn-wrapper">
                                            <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{$data['button_1_text'] ?? __('Coupon Code')}}</a>
                                        </div>
                                    </div>
                                    <div class="right-content">
                                        <span class="offer-duration grab-now" data-id="{{$product->id}}">
                                            {{$data['button_2_text'] ?? __('Grab Now!')}}
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
<!-- Exclusive deal area end -->