<div class="featured-deals-area-wrapper bg-color-a" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 v-02">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="btn-wrapper">
                        <a href="{{$data['view_all_link']}}" class="view-all main-color-two">{{$data['view_all']}}
                            <i class="las la-long-arrow-alt-right icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row three-column">
            @foreach($data['deals'] as $deal)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-featured-item style-03 bg-white">
                        <div class="img-box">
                            <a href="{{route_single_category(optional($deal->category)->slug)}}" class="catg-tag bottom-right border-radius-20">{{optional($deal->category)->title}}</a>
                            <a href="{{route_single_product($deal->slug)}}">
                                {!! render_image_markup_by_attachment_id($deal->image, 'border-radius-15', 'grid', false) !!}
                            </a>
                            <span class="logo">
                                <a href="{{route_single_brand(optional($deal->brand)->slug)}}">
                                    {!! render_image_markup_by_attachment_id(optional($deal->brand)->image, '', 'grid', false) !!}
                                </a>
                            </span>
                        </div>
                        <div class="content">
                            <div class="top-content">
                                <div class="left-content">
                                    <div class="details">
                                        <a href="{{route_single_brand(optional($deal->brand)->slug)}}" class="title">{{optional($deal->brand)->title}}</a>
                                        <p class="location">
                                            <span class="dot">·</span>
                                            {{optional($deal->location)->city_name}}, {{optional($deal->location)->state_name}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="middle-content">
                                <a href="{{route_single_product($deal->slug)}}" class="offer">{{Str::words($deal->title, 8)}}</a>
                            </div>
                            <div class="bottom-content bottom-new-content">
                                <div class="left-content">
                                    <div class="pricing">
                                        <span class="price">{{site_currency_symbol()}}{{$deal->regular_price}}</span>
                                        <del>{{site_currency_symbol()}}{{$deal->sale_price}}</del>
                                    </div>
                                </div>
                                <div class="right-content new-right-content">
                                    <div class="star" style="color: gold;font-size: 13px">
                                        {!! render_ratings(get_product_rating_average($deal->id)) !!}
                                    </div>
                                    @if(get_product_rating_average($deal->id) > 0)
                                        <div class="rating-count ml-1">({{get_product_rating_average($deal->id)}})</div>
                                    @endif
                                </div>
                            </div>

                            <div class="btn-wrapper mt-3">
                                <a href="javascript:void(0)" class="btn-default grab-now w-100" data-id="{{$deal->id}}">{{__('Grab Now')}}!</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

