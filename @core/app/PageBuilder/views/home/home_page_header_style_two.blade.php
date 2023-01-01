<div class="header-area-wrapper margin-top-110 index-02" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="header-area index-02">
        <div class="container custom-container-01">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container custom-container-02">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="header-content">
                                    <div class="content">
                                        <h1 class="main-title">{{$data['title_1']}} <span
                                                    class="color-02">{{$data['title_2']}}</span></h1>
                                        <p class="info">{{$data['subtitle']}}</p>

                                        <div class="search combained v-03 main-color-two">
                                            <form action="{{route('frontend.product.search.single')}}">
                                                <div class="form-group">
                                                    <i class="las la-search ex-icon"></i>
                                                    <input type="text" class="form-control ex-padding"
                                                           placeholder="{{$data['search_box_text']}}" name="search" id="searchProduct" autocomplete="off">
                                                    <button type="submit" class="search-btn">{{$data['button_text']}}</button>
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
                                    </div>
                                    <div class="img-box">
                                        {!! render_image_markup_by_attachment_id($data['image'],'','',false) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>