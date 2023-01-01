<div class="featured-deals-area-wrapper" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
        <div class="row three-column">
            @foreach($data['deals'] as $product)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="single-featured-item style-04">
                    <div class="img-box">
                        <span class="catg-tag top-right" tabindex="0">
                            {{get_product_discount_with_symbol($product)}}
                        </span>
                        <a href="{{route_single_product($product->slug)}}" tabindex="0">
                            {!! render_image_markup_by_attachment_id($product->image, '', 'grid', false) !!}
                        </a>
                    </div>
                    <div class="content">
                        <div class="middle-content">
                            <p class="offer">
                                <a href="{{route_single_product($product->slug)}}">{{Str::words($product->title, 10)}}</a>
                            </p>
                            <div class="period">
                                <p class="date"> <span class="name">{{__('Expired:')}}</span> {{$product->expire_date->format('d M Y')}}</p>
                            </div>
                        </div>
                        <div class="top-content">
                            <div class="left-content">
                                <div class="logo-box">
                                    <a href="{{route_single_brand(optional($product->brand)->slug)}}" tabindex="0">
                                        {!! render_image_markup_by_attachment_id(optional($product->brand)->image, 'recent-deal-brand-image', 'thumb', false) !!}
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{route_single_brand(optional($product->brand)->slug)}}" class="title" tabindex="0">{{optional($product->brand)->title}}</a>
                                    <p class="location">{{optional($product->location)->city_name}}, {{optional($product->location)->state_name}}</p>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{$data['button_text']}}</a>
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