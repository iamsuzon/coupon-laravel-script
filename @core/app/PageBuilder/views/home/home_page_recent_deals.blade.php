<div class="recent-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 has-siblings">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                    <div class="recent-name-list-wrapper">
                        <ul class="recent-list main-color-two">
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
            @foreach($data['deals'] as $product)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3" >
                    <div class="single-recent-item style-01" >
                        <div class="img-box">
                            <a href="javascript:void(0)"
                               class="catg-tag top-right border-radius-5">-{{$product->discount}}{{$product->discount_symbol}}</a>
                            <a href="{{route('frontend.product.single', $product->slug)}}">
                                {!! render_image_markup_by_attachment_id($product->image, 'rounded', 'grid', false) !!}
                            </a>
                        </div>
                        <div class="content">
                            <div class="top-content">
                                <a href="{{route('frontend.product.single', $product->slug)}}" class="offer">{{Str::words($product->title, 8)}}</a>
                            </div>
                            <div class="middle-content">
                                <div class="left-content">

                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="left-content">
                                    <div class="btn-wrapper">
                                        <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{__('Coupon Code')}}</a>
                                    </div>
                                </div>
                                <div class="right-content">
                                    <span class="offer-duration grab-now" data-id="{{$product->id}}" style="cursor: pointer">
                                        {{__('Grab Now!')}}
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