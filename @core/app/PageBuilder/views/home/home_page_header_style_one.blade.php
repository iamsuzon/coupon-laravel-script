<div class="header-area-wrapper" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="header-area index-01 bg-color-a">
        <div class="shape-bg-01">
            {!! render_image_markup_by_attachment_id($data['shape_1'],'','',false) !!}
        </div>

        <div class="shape-bg-02">
            {!! render_image_markup_by_attachment_id($data['shape_2'],'','',false) !!}
        </div>

        <div class="shape-bg-03">
            {!! render_image_markup_by_attachment_id($data['shape_3'],'','',false) !!}
        </div>
        <div class="container custom-container-04">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content">
                        <div class="content">
                            <h1 class="main-title">{{$data['title']}}</h1>
                            <p class="info">{{$data['subtitle']}}</p>

                            @if($data['search_box_status'] == 'on')
                                <div class="search combained">
                                    <form action="{{route('frontend.product.search.single')}}" method="GET" id="single_search_form">
                                        <div class="form-group">
                                            <i class="las la-search ex-icon"></i>
                                            <input type="text" class="form-control ex-padding" name="search" id="searchProduct"
                                                   placeholder="{{$data['search_box_text']}}" autocomplete="off">
                                            <button type="submit"
                                                    class="search-btn text-capitalize">{{$data['button_text']}}</button>
                                        </div>
                                        <div class="load-ajax-data"></div>
                                        <div class="autocomplete-search-data">
                                            <div class="account">
                                                <div id="show-autocomplete" style="display: none;">
                                                    <div id="search-close">
                                                        <i class="las la-times"></i>
                                                    </div>
                                                    <ul class="autocomplete-warp"></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <x-msg.error/>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div class="img-box-01">
                            {!! render_image_markup_by_attachment_id($data['image_1'],'','',false) !!}
                        </div>
                        <div class="img-box-02">
                            {!! render_image_markup_by_attachment_id($data['image_2'],'','',false) !!}
                        </div>
                        <div class="img-box-03">
                            {!! render_image_markup_by_attachment_id($data['image_3'],'','',false) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>