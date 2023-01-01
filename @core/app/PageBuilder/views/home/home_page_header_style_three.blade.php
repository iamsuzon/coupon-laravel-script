<div class="header-area-wrapper" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="header-area index-03 bg-01" {!! render_background_image_markup_by_attachment_id($data['background_image']) !!}>
        <div class="container custom-container-02">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content">
                        <div class="content">
                            <h1 class="main-title">{{$data['title']}}</h1>
                            <p class="info">{{$data['subtitle']}}</p>

                            <div class="search combained v-02 ex solid-border">
                                <form action="{{route('frontend.product.search.single')}}" method="GET" id="single_search_form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{$data['search_box_text']}}" name="search" id="advanceSearchProduct" autocomplete="off">
                                        <select class="lang" name="location" id="location">
                                            <option value="" selected disabled>{{__('Select a Location')}}</option>
                                            @foreach($data['location'] as $location)
                                                <option value="{{$location->id}}">{{$location->city_name}}, {{$location->state_name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="search-btn main-color-three">{{$data['button_text']}}</button>
                                    </div>

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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>