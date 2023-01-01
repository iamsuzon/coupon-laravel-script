@extends('backend.admin-master')
@section('style')
    <x-summernote.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <x-media.css/>
    <x-blog-inline-css/>
@endsection
@section('site-title')
    {{__('New Product')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h3 class="header-title">{{__('Add New Item')}}   </h3>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <form action="{{route('admin.product.new')}}" method="get"
                                          id="langauge_change_select_get_form">
                                        <x-lang.select :name="'lang'" :selected="$default_lang" :id="'langchange'"/>
                                    </form>
                                    <a href="{{ route('admin.blog') }}"
                                       class="btn btn-primary">{{__('All Products')}}</a>
                                </div>
                            </div>
                        </div>

                        <form action="{{route('admin.product.new')}}" method="post" enctype="multipart/form-data"
                              id="blog_new_form">
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <div class="form-group">
                                <label for="title">{{__('Title')}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="{{__('Title')}}" value="{{old('title')}}">
                            </div>

                            <div class="form-group permalink_label">
                                <label class="text-dark">{{__('Permalink * : ')}}
                                    <span id="slug_show" class="display-inline"></span>
                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="fas fa-edit"></i> </button>

                                        <input type="text" name="slug" class="form-control blog_slug mt-2"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>{{__('Product Description')}} <span class="text-danger">*</span></label>
                                <input type="hidden" name="description">
                                <div class="summernote"></div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title">{{__('Regular Price')}} <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="regular_price" id="regular-price"
                                               placeholder="{{__('Regular Price')}}" value="{{old('regular_price')}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title">{{__('Sale Price')}} <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="sale_price" id="sale-price"
                                               placeholder="{{__('Sale Price')}}" value="{{old('sale_price')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="discount">{{__('Discount Up To')}}</label>
                                        <input type="number" class="form-control" name="discount" id="discount"
                                               placeholder="{{__('Discount of to 50$ or 50%')}}" value="{{old('discount')}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="discount_symbol">Discount Type</label>
                                    <select class="form-control" name="discount_symbol" id="discount_symbol">
                                        <option value="{{site_currency_symbol()}}" selected>Currency ({{site_currency_symbol()}})</option>
                                        <option value="%">Percent (%)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="coupon-code">{{__('Coupon Code')}} <span
                                            class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="coupon_code" id="coupon-code"
                                       placeholder="Ex: KD68452" value="{{old('coupon_code')}}">
                            </div>

                            <div class="form-group">
                                <label for="title">{{__('Excerpt')}}</label>
                                <textarea name="excerpt" class="form-control max-height-150" cols="20"
                                          rows="5">{{old('excerpt')}}</textarea>
                            </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body meta">
                                <h5 class="header-title">{{__('Meta Section')}}</h5>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab"
                                             role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab"
                                               data-toggle="pill" href="#v-pills-home" role="tab"
                                               aria-controls="v-pills-home"
                                               aria-selected="true">{{__('Blog Meta')}}</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                               href="#v-pills-profile" role="tab"
                                               aria-controls="v-pills-profile"
                                               aria-selected="false">{{__('Facebook Meta')}}</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                               href="#v-pills-messages" role="tab"
                                               aria-controls="v-pills-messages"
                                               aria-selected="false">{{__('Twitter Meta')}}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="tab-content" id="v-pills-tabContent">

                                            <div class="tab-pane fade show active" id="v-pills-home"
                                                 role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <div class="form-group">
                                                    <label for="title">{{__('Meta Title')}}</label>
                                                    <input type="text" class="form-control" name="meta_title"
                                                           placeholder="{{__('Title')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">{{__('Meta Tags')}}</label>
                                                    <input type="text" class="form-control" name="meta_tags"
                                                           placeholder="Slug" data-role="tagsinput">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">{{__('Meta Description')}}</label>
                                                        <textarea name="meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                 aria-labelledby="v-pills-profile-tab">
                                                <div class="form-group">
                                                    <label for="title">{{__('Facebook Meta Tag')}}</label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="facebook_meta_tags">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">{{__('Facebook Meta Description')}}</label>
                                                        <textarea name="facebook_meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image">{{__('Facebook Meta Image')}}</label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap"></div>
                                                        <input type="hidden" name="facebook_meta_image">
                                                        <button type="button"
                                                                class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="{{__('Select Image')}}"
                                                                data-modaltitle="{{__('Upload Image')}}"
                                                                data-toggle="modal"
                                                                data-target="#media_upload_modal">
                                                            {{__('Upload Image')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                 aria-labelledby="v-pills-messages-tab">
                                                <div class="form-group">
                                                    <label for="title">{{__('Twitter Meta Tag')}}</label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="twitter_meta_tags">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">{{__('Twitter Meta Description')}}</label>
                                                        <textarea name="twitter_meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image">{{__('Twitter Meta Image')}}</label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap"></div>
                                                        <input type="hidden" name="twitter_meta_image">
                                                        <button type="button"
                                                                class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="{{__('Select Image')}}"
                                                                data-modaltitle="{{__('Upload Image')}}"
                                                                data-toggle="modal"
                                                                data-target="#media_upload_modal">
                                                            {{__('Upload Image')}}
                                                        </button>
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
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="post_type_radio">
                                    <h6>{{__('Post Type')}}</h6>
                                    <div class="form-check form-check-inline d-block">

                                        <input class="form-check-input post_type" type="radio" checked
                                               name="inlineRadioOptions"
                                               id="radio_general" value="option1">
                                        <i class="ti-settings"></i>
                                        <label class="form-check-label" for="inlineRadio1">{{__('General')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="featured"><strong>{{__('Select Categories')}}</strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="category_id">
                                                    @foreach($all_category as $category)
                                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->getTranslation('title',$default_lang)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong>{{__('Select Brand')}}</strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="brand_id">
                                                    @foreach($all_brands as $brand)
                                                        <option value="{{$brand->id}}" {{old('brand_id') == $brand->id ? 'selected' : ''}}>{{$brand->getTranslation('title',$default_lang)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong>{{__('Select Location')}}</strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="location_id">
                                                    @foreach($all_locations as $location)
                                                        <option value="{{$location->id}}" {{old('location_id') == $location->id ? 'selected' : ''}}>{{$location->getTranslation('city_name',$default_lang)}}
                                                            , {{$location->getTranslation('state_name',$default_lang)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group " id="blog_tag_list">
                                            <label for="title">{{__('Product Tag')}}</label>
                                            <input type="text" class="form-control tags_filed"
                                                   name="tag_id[]" id="datetimepicker1">
                                            <div id="show-autocomplete" style="display: none;">
                                                <ul class="autocomplete-warp"></ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong>{{__('Featured')}}</strong></label>
                                            <label class="switch">
                                                <input type="checkbox" name="featured">
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                        <div class="form-group ">
                                            <label for="status">{{__('Status')}}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="draft">{{__("Draft")}}</option>
                                                <option value="publish">{{__("Publish")}}</option>
                                                <option value="archive">{{__("Archive")}}</option>
                                            </select>
                                            <input type="date" name="schedule_date" class="form-control mt-2 date"
                                                   style="display: none" id="tag_data">
                                        </div>

                                        <div class="form-group ">
                                            <label for="expire_date">{{__('Product Expire Date')}}</label>
                                            <input type="date" name="expire_date" class="form-control mt-2"
                                                   id="expire_date">
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="image">{{__('Product Image')}}</label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap"></div>
                                                <input type="hidden" name="image">
                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                        data-btntitle="{{__('Select Image')}}"
                                                        data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                        data-target="#media_upload_modal">
                                                    {{__('Upload Image')}}
                                                </button>
                                                <x-recommended_image_size/>
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="image">{{__('Galley Image')}}</label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap"></div>
                                                <input type="hidden" name="image_gallery">
                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                        data-btntitle="{{__('Select Image')}}"
                                                        data-modaltitle="{{__('Upload Image')}}"
                                                        data-toggle="modal"
                                                        data-mulitple="true"
                                                        data-target="#media_upload_modal">
                                                    {{__('Upload Image')}}
                                                </button>
                                                <x-recommended_image_size/>
                                            </div>
                                        </div>

                                        <div class="submit_btn mt-5">
                                            <button type="submit"
                                                    class="btn btn-success pull-right">{{__('Submit New Product ')}}</button>
                                        </div>
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
    <x-media.markup/>
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <x-summernote.js/>
    <x-media.js/>

    <script>
        //Date Picker
        flatpickr('#tag_data', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });
        flatpickr('#expire_date', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });


        var blogTagInput = $('#blog_tag_list .tags_filed');
        var oldTag = '';
        blogTagInput.tagsinput();
        //For Tags
        $(document).on('keyup', '#blog_tag_list .bootstrap-tagsinput input[type="text"]', function (e) {
            e.preventDefault();
            var el = $(this);
            var inputValue = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{ route('admin.get.product.tags.by.ajax') }}",
                async: false,
                data: {
                    query: inputValue
                },

                success: function (data) {
                    oldTag = inputValue;
                    let html = '';
                    var showAutocomplete = '';
                    $('#show-autocomplete').html('<ul class="autocomplete-warp"></ul>');
                    if (el.val() != '' && data.markup != '') {


                        data.result.map(function (tag, key) {
                            html += '<li class="tag_option" data-id="' + key + '"  data-val="' + tag + '">' + tag + '</li>'
                        })

                        $('#show-autocomplete ul').html(html);
                        $('#show-autocomplete').show();


                    } else {
                        $('#show-autocomplete').hide();
                        oldTag = '';
                    }

                },
                error: function (res) {

                }
            });
        });

        $(document).on('click', '.tag_option', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let tag = $(this).data('val');
            blogTagInput.tagsinput('add', tag);
            $(this).parent().remove();
            blogTagInput.tagsinput('remove', oldTag);
        });

    </script>

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                @php
                    $slug = get_page_slug(get_static_option('product_page'),'product');
                @endphp

                //Permalink Code
                $('.permalink_label').hide();
                $(document).on('keyup', '#title', function (e) {
                    var slug = $(this).val().trim().toLowerCase().split(' ').join('-').replace(/[\W_]+/g,'-');
                    slug = slug.toLowerCase().split('%').join('-');
                    var url = `{{url('/'.$slug.'/')}}/` + slug;
                    $('.permalink_label').show();
                    var data = $('#slug_show').text(url).css('color', 'blue');
                    $('.blog_slug').val(slug);

                });

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.blog_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.blog_slug').val();
                    var slug = update_input.trim().toLowerCase().replace(/[\W_]+/g,'-').split(' ').join('-');
                    var url = `{{url('/'.$slug.'/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });

                $(document).on('change', '#status', function (e) {
                    e.preventDefault();
                    if ($(this).val() == 'schedule') {
                        $('.date').show();
                        $('.date').focus();
                    } else {
                        $('.date').hide();
                    }
                });


                <x-btn.submit/>
            });
        })(jQuery)
    </script>
@endsection
