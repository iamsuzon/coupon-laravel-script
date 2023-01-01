<div class="contact-us-area-wrapper" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info">
                    <div class="title">{{$data['title']}}</div>
                    <p class="phone">{{$data['phone']}}</p>
                    <p class="email">{{$data['email']}}</p>
                    <p class="info">{{$data['address']}}</p>

                    <div class="social-icon">
                        <ul class="social-link-list">
                            @foreach(current($data['top_cards']) as $card)
                                <li class="link-item">
                                    <a href="{{$data['top_cards']['link'][$loop->index]}}">
                                        <i class="{{$data['top_cards']['icon'][$loop->index]}} icon"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="google-map" data-padding-top="50" data-padding-bottom="0">
                    {!! $data['location'] !!}
                </div>
            </div>
            <div class="col-md-8">
                <div class="get-in-touch-wrapper">
                    <h3 class="title">{{$data['title_2']}}</h3>
                    {!! $data['form'] !!}
                </div>
            </div>
        </div>
    </div>
</div>