<div class="featured-brand-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-brand-item-wrap style-01">
                    @foreach($data['brands'] as $brand)
                        <div class="single-brand-item">
                        <div class="logo-box">
                            <a href="{{route_single_brand($brand->slug)}}">
                                {!! render_image_markup_by_attachment_id($brand->image, '', 'grid', false) !!}
                            </a>
                        </div>
                        <div class="details">
                            <a href="{{route_single_brand($brand->slug)}}" class="title">{{$brand->title}}</a>
                            <p class="location">{{optional($brand->location)->city_name}}, {{optional($brand->location)->state_name}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>