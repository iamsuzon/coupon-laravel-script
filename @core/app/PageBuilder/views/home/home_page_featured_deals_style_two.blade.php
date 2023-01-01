<div class="featured-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two">
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
            @foreach($data['deals'] as $deal)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="single-featured-item style-03 bg-white">
                    <div class="img-box">
                        <a href="{{route_single_category(optional($deal->category)->slug)}}" class="catg-tag top-right border-radius-15">{{optional($deal->category)->title}}</a>
                        <a href="{{route_single_product($deal->slug)}}">
                            {!! render_image_markup_by_attachment_id($deal->image, 'border-radius-15', 'grid', false) !!}
                        </a>
                        <span class="logo">
                            {!! render_image_markup_by_attachment_id(optional($deal->brand)->image, null, 'grid', false) !!}
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
                            <div class="right-content">
                                <div class="star" style="color: gold;font-size: 13px">
                                    {!! render_ratings(get_product_rating_average($deal->id)) !!}
                                </div>
                                @if(get_product_rating_average($deal->id) > 0)
                                    <div class="rating-count">({{count($deal->reviews)}})</div>
                                @else
                                    <div class="rating-count">

                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="middle-content">
                            <p class="offer">
                                <a href="{{route_single_product($deal->slug)}}">{{Str::words($deal->title, 10)}}</a>
                            </p>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="pricing">
                                    <span class="price">{{site_currency_symbol()}}{{$deal->sale_price}}</span>
                                    <del>{{site_currency_symbol()}}{{$deal->regular_price}}</del>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$deal->id}}">{{$data['button']}}</a>
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