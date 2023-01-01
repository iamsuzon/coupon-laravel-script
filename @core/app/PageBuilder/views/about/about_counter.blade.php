<div class="counter-area-wrapper bg-ex" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        @foreach(current($data['about_page_counter']) as $title)
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="single-counter-box">
                                        <span class="counter-bg">
                                            <span class="counter">
                                                <span class="count-num">{{$data['about_page_counter']['number'][$loop->index] ?? ''}} </span>{{$data['about_page_counter']['extra_field'][$loop->index] ?? ''}}
                                            </span>
                                        </span>
                                    <h3 class="title">{{$title}}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>