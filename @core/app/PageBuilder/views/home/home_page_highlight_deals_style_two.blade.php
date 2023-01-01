<div class="featured-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
        <div class="row three-column">
            @foreach($data['deals'] as $deal)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="single-featured-item style-05">
                    <div class="img-box">
                        <a href="{{route_single_product($deal->slug)}}" tabindex="0">
                            {!! render_image_markup_by_attachment_id($deal->image, null, 'full', false) !!}
                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <div class="logo-box">
                                    <a href="{{route_single_brand(optional($deal->brand)->slug)}}" tabindex="0">
                                        {!! render_image_markup_by_attachment_id(optional($deal->brand)->image, null, 'grid', false) !!}
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{route_single_brand(optional($deal->brand)->slug)}}" class="title" tabindex="0">{{optional($deal->brand)->title}}</a>
                                    <p class="location">{{optional($deal->location)->city_name}}, {{optional($deal->location)->state_name}}</p>
                                </div>
                            </div>
                            <div class="right-content">
                                <span class="catg-tag" tabindex="0">{{get_product_discount_with_symbol($deal)}}</span>
                            </div>
                        </div>
                        <div class="middle-content">
                            <p class="offer">
                                <a href="{{route_single_product($deal->slug)}}">{{Str::words($deal->title, 10)}}</a>
                            </p>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="btn-wrapper">
                                        {{-- copy --}}
                                        <div class="copy-box copy-box-inline copy-{{$deal->id}}">
                                            <a href="javascript:void(0)" data-code="{{$deal->coupon_code}}" data-product_id="{{$deal->id}}">
                                            </a>
                                            <p class="copy-text"> {{__('Copied')}} </p>
                                        </div>
                                        <span class="coupon-wrap v-02">
                                            <span class="btn-default coupon-02">
                                                <a class='copy_coupon' href="javascript:void(0)" data-code="{{$deal->coupon_code}}" data-product_id="{{$deal->id}}">{{$deal->coupon_code}}</a>
                                                <span class="overlay">
                                                    <span class="bg overlay-{{$deal->id}}">{{$data['button']}}</span>
                                                </span>
                                            </span>
                                        </span>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="period">
                                    <p class="date"> <span class="name">{{__('Expired:')}}</span> {{$deal->expire_date->format('d M Y')}}</p>
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