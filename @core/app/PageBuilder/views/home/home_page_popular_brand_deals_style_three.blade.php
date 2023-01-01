<div class="exclusive-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
        <div class="row four-column">
            @foreach($data['deals'] as $deal)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="single-recent-item style-04">
                    <div class="img-box">
                        <span class="catg-tag top-right">{{get_product_discount_with_symbol($deal)}}</span>
                        <a href="{{route_single_product($deal->slug)}}">
                            {!! render_image_markup_by_attachment_id($deal->image, '', 'full', false) !!}
                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
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

                                    <span class="btn-default coupon-01">
                                        <a class="copy_coupon" href="javascript:void(0)" data-code="{{$deal->coupon_code}}" data-product_id="{{$deal->id}}">{{$deal->coupon_code}}</a>
                                        <span class="overlay overlay-{{$deal->id}}">{{$data['button_text']}}</span>
                                    </span>

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

