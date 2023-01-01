<div class="featured-locations-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02 main-color-two">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
        <div class="row xl-four-column">
            @foreach($data['locations'] as $location)
                <div class="col-sm-11 col-md-6 col-lg-4 col-xl-3">
                <div class="single-featured-location v-03">
                    <div class="img-box">
                        <a href="{{route_single_location($location->slug)}}">
                            {!! render_image_markup_by_attachment_id($location->image, 'image','thumb',false) !!}
                        </a>
                    </div>
                    <div class="content">
                        <a href="{{route('frontend.product.location.single',$location->slug)}}" class="title">
                        <h6 class="title">{{$location->city_name}}</h6>
                        <p class="info">{{$location->products_count}} {{__('Deals Available')}}</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>