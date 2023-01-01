<div class="ads-banner-area-wrapper leaderboard" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ads-banner-box">
                    <a href="{{$data['image_url']}}">
                        {!! render_image_markup_by_attachment_id($data['image_id'],null,'full',false) !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>