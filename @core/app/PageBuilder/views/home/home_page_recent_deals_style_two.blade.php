<div class="recent-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two has-siblings">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="recent-name-list-wrapper">
                        <ul class="recent-list main-color-three">
                            <li data-id="null"
                                data-filter="*"
                                class="active recent-deal"
                                data-route="{{$data['get_recent_products_ajax']}}">{{__('All Deals')}}
                            </li>
                            @foreach($data['categories'] as $category)
                                <li class="recent-deal"
                                    data-id="{{$category->id}}"
                                    data-filter=".{{$category->title}}"
                                    data-product="{{$data['limit_product']}}"
                                    data-route="{{$data['get_recent_products_ajax']}}"
                                >{{$category->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row recent-item-wrap">
            <div class="load-ajax-data"></div>
            @foreach($data['products'] as $product)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="single-recent-item style-03">
                    <div class="img-box">
                        <a href="{{route_single_category(optional($product->category)->slug)}}" class="catg-tag top-right border-radius-15">{{optional($product->category)->title}}</a>
                        <a href="{{route_single_product($product->slug)}}">
                            {!! render_image_markup_by_attachment_id($product->image, 'border-radius-2', 'full', false) !!}
                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <p class="offer">
                                    <a href="{{route_single_product($product->slug)}}">{{Str::words($product->title, 8)}}</a>
                                </p>
                                <div class="details">
                                    <a href="{{route_single_brand(optional($product->brand)->slug)}}" class="title">{{optional($product->brand)->title}}</a>
                                    <p class="location"> <span class="dot">·</span> {{optional($product->location)->city_name}}, {{optional($product->location)->state_name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="pricing">
                                    <span class="price">{{site_currency_symbol()}}{{$product->sale_price}}</span>
                                    <del>{{site_currency_symbol()}}{{$product->sale_price}}</del>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="btn-wrapper left">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{__('Coupon Code')}}</a>
                                </div>

                                <div class="btn-wrapper right">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{__('Get Offer!')}}</a>
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