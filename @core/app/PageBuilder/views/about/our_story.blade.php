<div class="about-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-wrap row-reverse">
                    <div class="content pr-100">
                        <h4 class="title">{{$data['title']}}</h4>

                        <p class="info">{{purify_html($data['description'])}}</p>
                        @if(!empty($data['button_url']) OR $data['button_url'] != null)
                            <div class="btn-wrapper">
                                <a href="{{$data['button_url']}}" class="btn-default">{{$data['button_text']}}</a>
                            </div>
                        @endif
                    </div>
                    <div class="img-box">
                        <div class="background-img" {!! $data['bg_image'] !!} data-width="100%" data-height="660"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>