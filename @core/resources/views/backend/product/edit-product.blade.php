@extends('backend.admin-master')
@section('style')
    <x-summernote.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <x-media.css/>
    <x-blog-inline-css/>
@endsection
@section('site-title')
    {{__('Edit Product')}}
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
                                <h3 class="header-title">{{__('Edit Product Items')}}   </h3>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">

                                    <a href="{{ route('admin.product') }}"
                                       class="btn btn-primary">{{__('All Products')}}
                                    </a>
                                    <a href="{{ route('admin.product.new') }}"
                                       class="btn btn-info">{{__('Create New')}}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <form action="{{route('admin.product.update',$product_post->id)}}" method="post"
                              enctype="multipart/form-data"
                              id="blog_new_form">
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       value="{{$product_post->getTranslation('title',$default_lang)}}">
                            </div>

                            <div class="form-group permalink_label">
                                <label class="text-dark">{{__('Permalink * : ')}}
                                    <span id="slug_show" class="display-inline"></span>
                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="fas fa-edit"></i> </button>
                                          <input type="text" name="slug" value="{{$product_post->slug}}"
                                                 class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>{{__('Product Description')}}</label>
                                <input type="hidden" name="description"
                                       value="{{$product_post->getTranslation('description',$default_lang)}}">
                                <div class="summernote"
                                     data-content="{{$product_post->getTranslation('description',$default_lang)}}"></div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="regular-price">{{__('Regular Price')}}</label>
                                        <input type="text" class="form-control" name="regular_price" id="regular-price"
                                               placeholder="{{__('Regular Price')}}"
                                               value="{{$product_post->regular_price}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sale-price">{{__('Sale Price')}}</label>
                                        <input type="text" class="form-control" name="sale_price" id="sale-price"
                                               placeholder="{{__('Sale Price')}}" value="{{$product_post->sale_price}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="discount">{{__('Discount Up To')}}</label>
                                        <input type="number" class="form-control" name="discount" id="discount"
                                               placeholder="{{__('Discount of to 50$ or 50%')}}"
                                               value="{{$product_post->discount}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="discount_symbol">{{__('Discount Type')}}</label>
                                    <select class="form-control" name="discount_symbol" id="discount_symbol">
                                        <option value="{{site_currency_symbol()}}"  {{$product_post->discount_symbol == site_currency_symbol() ? 'selected' : ''}}>Currency ({{site_currency_symbol()}})</option>
                                        <option value="%" {{$product_post->discount_symbol == '%' ? 'selected' : ''}}>Percent (%)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="coupon_code">{{__('Coupon Code')}}</label>
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code"
                                       placeholder="https://example.com/something"
                                       value="{{$product_post->coupon_code}}">
                            </div>

                            <div class="form-group">
                                <label for="excerpt">{{__('Excerpt')}}</label>
                                <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30"
                                          rows="10">{{$product_post->getTranslation('excerpt',$default_lang)}}</textarea>
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
                                                           value="{{$product_post->meta_data->meta_title ?? ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">{{__('Meta Tags')}}</label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="meta_tags"
                                                           value="{{$product_post->meta_data->meta_tags ?? ''}}">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">{{__('Meta Description')}}</label>
                                                        <textarea name="meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4">{!! $product_post->meta_data->meta_description ?? '' !!}</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                 aria-labelledby="v-pills-profile-tab">
                                                <div class="form-group">
                                                    <label for="title">{{__('Facebook Meta Tag')}}</label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="facebook_meta_tags"
                                                           value="{{$product_post->meta_data->facebook_meta_tags ?? ''}}">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">{{__('Facebook Meta Description')}}</label>
                                                        <textarea name="facebook_meta_description"
                                                                  class="form-control max-height-140 meta-desc"
                                                                  cols="20"
                                                                  rows="4">{!! $product_post->meta_data->facebook_meta_description ?? '' !!}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for="og_meta_image">{{__('Facebook Meta Image')}}</label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap">
                                                            {!! render_attachment_preview_for_admin($product_post->meta_data->facebook_meta_image ?? '') !!}
                                                        </div>
                                                        <input type="hidden" id="facebook_meta_image"
                                                               name="facebook_meta_image"
                                                               value="{{$product_post->meta_data->facebook_meta_image ?? ''}}">
                                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="{{__('Select Image')}}"
                                                                data-modaltitle="{{__('Upload Image')}}"
                                                                data-toggle="modal"
                                                                data-target="#media_upload_modal">
                                                            {{'Change Image'}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                 aria-labelledby="v-pills-messages-tab">
                                                <div class="form-group">
                                                    <label for="title">{{__('Twitter Meta Tag')}}</label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="twitter_meta_tags"
                                                           value=" {{$product_post->meta_data->twitter_meta_tags ?? ''}}">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">{{__('Twitter Meta Description')}}</label>
                                                        <textarea name="twitter_meta_description"
                                                                  class="form-control max-height-140 meta-desc"
                                                                  cols="20"
                                                                  rows="4">{!! $product_post->meta_data->twitter_meta_description ?? '' !!}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="og_meta_image">{{__('Twitter Meta Image')}}</label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap">
                                                            {!! render_attachment_preview_for_admin($product_post->meta_data->twitter_meta_image ?? '') !!}
                                                        </div>
                                                        <input type="hidden" id="twitter_meta_image"
                                                               name="twitter_meta_image"
                                                               value="{{$product_post->meta_data->twitter_meta_image ?? ''}}">
                                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="{{__('Select Image')}}"
                                                                data-modaltitle="{{__('Upload Image')}}"
                                                                data-toggle="modal"
                                                                data-target="#media_upload_modal">
                                                            {{'Change Image'}}
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
                                        <input class="form-check-input post_type" type="radio"
                                               name="inlineRadioOptions" checked
                                               id="radio_general" value="option1"
                                        >
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
                                                        <option value="{{$category->id}}" {{($category->id == $product_post->category_id) ? 'selected' : ''}}>{{$category->getTranslation('title',$default_lang)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong>{{__('Select Brand')}}</strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="brand_id">
                                                    @foreach($all_brands as $brand)
                                                        <option value="{{$brand->id}}" {{($brand->id == $product_post->brand_id) ? 'selected' : ''}}>{{$brand->getTranslation('title',$default_lang)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong>{{__('Select Location')}}</strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="location_id">
                                                    @foreach($all_locations as $location)
                                                        <option value="{{$location->id}}" {{($location->id == $product_post->location_id) ? 'selected' : ''}}>{{$location->getTranslation('city_name',$default_lang)}}
                                                            , {{$location->getTranslation('state_name',$default_lang)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group " id="blog_tag_list">
                                            <label for="title">{{__('Product Tag')}}</label>


                                            @php
                                                $tags_arr = json_decode($product_post->tag_id);
                                                $tags = is_array($tags_arr) ? implode(",", $tags_arr) : "";
                                            @endphp

                                            <input type="text" class="form-control tags_filed" data-role="tagsinput"
                                                   name="tag_id[]" value=" {{ $tags }} ">

                                            <div id="show-autocomplete" style="display: none;">
                                                <ul class="autocomplete-warp"></ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong>{{__('Featured')}}</strong></label>
                                            <label class="switch">
                                                <input type="checkbox" name="featured"
                                                       @if ($product_post->featured ?? '') checked @endif >
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                        <div class="form-group ">
                                            <label for="status">{{__('Status')}}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="draft"
                                                        @if($product_post->status == 'draft') selected @endif>{{__("Draft")}}</option>
                                                <option value="publish"
                                                        @if($product_post->status == 'publish') selected @endif>{{__("Publish")}}</option>
                                                <option value="archive"
                                                        @if($product_post->status == 'archive') selected @endif>{{__("Archive")}}</option>
                                                on>
                                            </select>
                                            @php

                                                    @endphp

                                            <input type="date" name="schedule_date" class="form-control mt-2 date"
                                                   value="{{$product_post->schedule_date ?? ''}}" style="display: none"
                                                   id="edit_schedule">
                                        </div>

                                        <div class="form-group ">
                                            <label for="expire_date">{{__('Product Expire Date')}}</label>
                                            <input type="date" name="expire_date" class="form-control mt-2"
                                                   id="expire_date" value="{{$product_post->expire_date}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="og_meta_image">{{__('Product Image')}}</label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap">
                                                    {!! render_attachment_preview_for_admin($product_post->image ?? '') !!}
                                                </div>
                                                <input type="hidden" id="image" name="image"
                                                       value="{{$product_post->image}}">
                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                        data-btntitle="{{__('Select Image')}}"
                                                        data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                        data-target="#media_upload_modal">
                                                    {{'Change Image'}}
                                                </button>
                                            </div>
                                            <x-recommended_image_size/>
                                        </div>

                                        <div class="form-group">
                                            <label for="og_meta_image">{{__('Product Image Gallery')}}</label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap">
                                                    {!! render_gallery_image_attachment_preview($product_post->image_gallery ?? '') !!}
                                                </div>
                                                <input type="hidden" id="og_meta_image" name="image_gallery"
                                                       value="{{$product_post->image_gallery ?? ''}}">
                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                        data-btntitle="{{__('Select Image')}}"
                                                        data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                        data-mulitple="true"
                                                        data-target="#media_upload_modal">
                                                    {{'Change Image'}}
                                                </button>
                                            </div>
                                            <x-recommended_image_size/>
                                        </div>


                                        <div class="submit_btn mt-5">
                                            <button type="submit"
                                                    class="btn btn-success">{{__('Save Post ')}}</button>
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
        flatpickr('#edit_schedule', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d H:i",
        });
        flatpickr('#expire_date', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d H:i",
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
                            html += '<li class="tag_option" data-id="' + key + '" data-val="' + tag + '">' + tag + '</li>'
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
                //Status Code
                @php
                    $slug = get_page_slug(get_static_option('product_page'),'product');
                @endphp

                if ($('#status').val() == 'schedule') {
                    $('.date').show();
                    $('.date').focus();
                }
                $(document).on('change', '#status', function (e) {
                    e.preventDefault();
                    if ($(this).val() == 'schedule') {
                        $('.date').show();
                        $('.date').focus();
                    } else {
                        $('.date').hide();
                    }
                });

                //Permalink Code
                var sl = $('.blog_slug').val();
                var url = `{{url('/'.$slug.'/')}}/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

                var form = $('#blog_new_form');

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
                    var slug = update_input.trim().toLowerCase().split(' ').join('-').replace(/[\W_]+/g,'-');
                    var url = `{{url('/'.$slug.'/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });
                checkPostStatus();

                function checkPostStatus() {
                    if ($('#status').val() == 'schedule') {
                        $('.date').show();
                        $('.date').focus();
                    } else {
                        $('.date').hide();
                    }
                }

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
                $(document).on('change', '#langchange', function (e) {
                    $('#langauge_change_select_get_form').trigger('submit');
                });
            });


            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function (contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if ($('.summernote').length > 0) {
                $('.summernote').each(function (index, value) {
                    $(this).summernote('code', $(this).data('content'));
                });
            }


        })(jQuery)
    </script>
@endsection
