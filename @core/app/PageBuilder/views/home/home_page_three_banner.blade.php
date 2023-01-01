<div class="ads-banner-area-wrapper leaderboard bg-color-a" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ads-banner-box">
                    <a href="{{$data['banner_url']}}">
                        {!! render_image_markup_by_attachment_id($data['image'], '', 'full', false) !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>