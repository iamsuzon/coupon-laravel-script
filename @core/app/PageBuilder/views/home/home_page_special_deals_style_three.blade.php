<div class="special-deal-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    {{--   Put Section Title Somewhere--}}
    <div class="container">
        <div class="row two-column">
            @foreach($data['deals'] as $deal)
                <div class="col-lg-6">
                    <div class="single-special-item">
                        <div class="left-content">
                            <div class="logo-box">
                                <a href="{{route_single_brand(optional($deal->brand)->slug)}}">
                                    {!! render_image_markup_by_attachment_id(optional($deal->brand)->image, '', 'grid', false) !!}
                                </a>
                            </div>
                            <div class="content">
                                    <span class="catg">{{optional($deal->category)->title}}</span>
                                <h5 class="title">
                                    <a href="{{route_single_product($deal->slug)}}">{{Str::words($deal->title, 5)}}</a>
                                </h5>
                                <p class="used">
                                    <sapn class="color-text">{{optional($deal->coupon)->coupon_used ?? 0}} {{__('People')}}</sapn> {{__('Used Total')}}
                                </p>
                            </div>
                            <span class="round-01"></span>
                            <span class="round-02"></span>
                        </div>
                        <div class="right-content">
                            <div class="btn-wrapper">
                                {{-- copy --}}
                                <div class="copy-box copy-box-inline copy-{{$deal->id}}">
                                    <a href="javascript:void(0)" data-code="{{$deal->coupon_code}}"
                                       data-product_id="{{$deal->id}}">
                                    </a>
                                    <p class="copy-text"> {{__('Copied')}} </p>
                                </div>
                                <span class="coupon-wrap">
                                    <span class="btn-default coupon-02">
                                        <a class="copy_coupon" href="javascript:void(0)" data-code="{{$deal->coupon_code}}"
                                           data-product_id="{{$deal->id}}">{{$deal->coupon_code}}</a>
                                        <span class="overlay overlay-{{$deal->id}}">{{$data['button_text']}}</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-wrapper text-center" data-margin-top="50">
                    <a href="{{$data['see_all_link']}}"
                       class="btn-default main-color-three border-radius-0"> {{$data['see_all_text']}} </a>
                </div>
            </div>
        </div>
    </div>
</div>