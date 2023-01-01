<div class="grid-item" data-padding-top="85">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title-wrapper style-01">
                <h1 class="section-title-main text-capitalize">{{__('You may like')}}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($related_products as $product)
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="single-featured-item style-01">
                    <div class="img-box">
                        <a href="{{route_single_category(optional($product->category)->slug)}}"
                           class="catg-tag top-left border-radius-15"
                           tabindex="0">{{optional($product->category)->title}}</a>
                        <a href="{{route('frontend.product.single',$product->slug)}}" tabindex="0">
                            {!! render_image_markup_by_attachment_id($product->image, 'border-radius-10', '',false) !!}
                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <div class="logo-box">
                                    <a href="{{route_single_brand(optional($product->brand)->slug)}}" tabindex="0">
                                        {!! render_image_markup_by_attachment_id(optional($product->brand)->image,'','grid',false) !!}
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{route_single_brand(optional($product->brand)->slug)}}" class="title"
                                       tabindex="0">{{optional($product->brand)->title}}</a>
                                    <p class="location">{{optional($product->location)->city_name}}
                                        , {{optional($product->location)->state_name}}</p>
                                </div>
                            </div>
                            <div class="right-content">
                                @if(get_product_rating_average($product->id) > 0)
                                    <div class="star">
                                        {!! render_ratings(get_product_rating_average($product->id)) !!}
                                    </div>
                                    <div class="rating-count">({{count($product->reviews)}})
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="middle-content">
                            <a href="{{route('frontend.product.single',$product->slug)}}"
                               class="offer">{{$product->title}}</a>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="pricing">
                                    <span class="price">{{site_currency_symbol()}}{{$product->sale_price}}</span>
                                    <del>{{site_currency_symbol()}}{{$product->sale_price}}</del>
                                </div>
                            </div>
                            <div class="right-content">
                                <span class="offer-duration">
                                    @if($product->expire_date)
                                        {!! render_deal_expire_date_markup($product->expire_date) !!}
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