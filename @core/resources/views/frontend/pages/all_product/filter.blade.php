<div class="col-md-6 col-lg-4">
    <div class="widget-area-wrapper">
        <div class="widget ex">
            <div class="widget-search">
                <form class="search-from">
                    <div class="form-group">
                        <button type="submit" class="widget-search-btn" disabled>
                            <i class="las la-search icon"></i>
                        </button>
                        <input type="hidden" name="language" id="language" value="{{get_user_lang()}}">
                        <input type="text" name="search" id="search-box" placeholder="search...">
                    </div>
                </form>
            </div>
        </div>

        <div class="widget">
            <div class="widget-category">
                <h5 class="widget-title">{{__('Categories')}}</h5>
                <div class="category-wrap">
                    @foreach($data['categories'] as $category)
                        <div class="single-category-item">
                            <label class="checkbox-wrapper">
                                <input type="radio" name="category"
                                       {{ request()->category == $category->id ? "checked" : "" }} value="{{$category->id}}"
                                       class="checkbox category">
                                <span class="checkmark"></span>
                                <span class="content">
                                                    <span class="left">{{$category->title}}</span>
                                                    <span class="right">{{count($category->products)}}</span>
                                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-category">
                <h5 class="widget-title">{{__('Locations')}}</h5>
                <div class="category-wrap">
                    @foreach($data['locations'] as $location)
                        <div class="single-category-item">
                            <label class="checkbox-wrapper">
                                <input type="radio" name="location"
                                       {{ $location->id == request()->location ? "checked" : "" }} class="checkbox location"
                                       value="{{$location->id}}">
                                <span class="checkmark"></span>
                                <span class="content">
                                                    <span class="left">{{$location->city_name}}, {{$location->state_name}}</span>
                                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-price-range">
                <h5 class="widget-title">{{__('filter by price')}}</h5>

                <div style="margin:30px auto" class="price-range-slider" data-start-min="{{isset(request()->min_price) ? request()->min_price : 0}}" data-start-max="{{isset(request()->max_price) ? request()->max_price : 10000}}" data-min="0" data-max="10000" data-step="5">
                    <div class="ui-range-slider"></div>
                    <div class="ui-range-slider-footer">
                        <div class="ui-range-values">
                            <span class="ui-price-title"> Price: </span>
                            <div class="ui-range-value-min">{{site_currency_symbol()}}<span class="min_price">0</span>
                                <input type="hidden" value="0" name="min_price" id="min_price">
                            </div>-
                            <div class="ui-range-value-max">{{site_currency_symbol()}}<span class="max_price">10000</span>
                                <input type="hidden" value="10000" name="max_price" id="max_price">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="widget">
            <div class="widget-rating">
                <h5 class="widget-title">{{__('rating')}}</h5>
                <div class="rating-wrap">
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="5" {{request()->rating == 5 ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="4" {{request()->rating == 4 ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="3" {{request()->rating == 3 ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="2" {{request()->rating == 2 ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="1" {{request()->rating == 1 ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-brand">
                <h5 class="widget-title">{{__('brand')}}</h5>
                <div class="category-wrap">
                    @foreach($data['brands'] as $brand)
                        <div class="single-category-item">
                            <label class="checkbox-wrapper">
                                <input type="radio" name="brand"
                                       {{ $brand->id == request()->brand ? "checked" : "" }} class="checkbox brand"
                                       value="{{$brand->id}}">
                                <span class="checkmark"></span>
                                <span class="content">
                                    <span class="left ml-2">{{$brand->title}}</span>
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="widget ex mt-4">
            <div class="widget-add">
                <div class="add-banner-y-style-01">
                    {!! render_random_advertisement() !!}
                </div>
            </div>
        </div>
    </div>
</div>