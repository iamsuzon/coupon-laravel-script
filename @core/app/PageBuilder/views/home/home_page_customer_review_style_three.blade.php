<div class="testimonial-area-wrapper" data-padding-top="{{$data['padding_top']}}"
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
                <div class="slick-main global-slick-init arrow-style-02 dots-style-02" data-infinite="true"
                     data-arrows="true" data-dots="true" data-slidesToShow="3" data-slidesToScroll="1"
                     data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="3000" data-centerMode="true"
                     data-centerPadding="500" data-appendArrows="#test_01"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                    {"breakpoint": 1800,"settings": {"slidesToShow": 3}},
                    {"breakpoint": 1200,"settings": {"slidesToShow": 2}},
                    {"breakpoint": 992,"settings": {"slidesToShow": 2}},
                    {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                    ]'>
                    @foreach($data['review'] as $review)
                        <div class="slick-item">
                        <div class="single-testimonial-item style-03 v-02">
                            <div class="quote">
                                <i class="flaticon-left-quote icon"></i>
                            </div>
                            <p class="info">{{$review->review}}</p>
                            <div class="client-details">
                                <h6 class="title">{{$review->review_by}}</h6>
                                <div class="star">
                                    {!! render_ratings($review->rating) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>