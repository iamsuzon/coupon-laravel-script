@extends('frontend.user.dashboard.user-master')
@section('site-title')
    {{__('New Product')}}
@endsection

@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#">{{__('User Dashboard')}}</a></h2>
    <h2 class="list-item font-weight-bold"><a href="#">{{__('Add New Product')}}</a></h2>
@endsection


@section('style')
    <x-summernote.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom-dashboard.css')}}">
    <x-media.css/>
    <x-blog-inline-css/>
@endsection

@section('section')
    <div class="dashboard-form-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h3 class="header-title">{{__('New Product')}}   </h3>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <form action="{{route('user.product')}}" method="get"
                                          id="langauge_change_select_get_form">
                                        <x-lang.select :name="'lang'" :selected="$default_lang" :id="'langchange'"/>
                                    </form>
                                    <a href="{{ route('user.product') }}"
                                       class="btn btn-primary">{{__('All Blog Post')}}</a>
                                </div>
                            </div>
                        </div>

                        <form action="{{route('user.product.new')}}" method="post" enctype="multipart/form-data"
                              id="blog_new_form">
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <div class="form-group">
                                <label for="title">{{__('Title')}} <span
                                            class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="{{__('Title')}}">
                            </div>

                            <div class="form-group permalink_label">
                                <label class="text-dark">{{__('Permalink * : ')}}
                                    <span id="slug_show" class="display-inline"></span>
                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="las la-edit"></i> </button>

                                        <input type="text" name="slug" class="form-control blog_slug mt-2"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>{{__('Description')}}</label>
                                <input type="hidden" name="description">
                                <div class="summernote"></div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="regular_price">{{__('Regular Price')}}</label>
                                    <input class="form-control" type="number" name="regular_price" id="regular_price" placeholder="Enter product regular price">
                                </div>

                                <div class="col-6">
                                    <label for="sale_price">{{__('Sale Price')}} <span
                                                class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="sale_price" id="sale_price" placeholder="Enter product sale price">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label for="discount">{{__('Discount Up To')}} <span
                                                class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="discount" id="discount" placeholder="Discount up to 50$ or 5%">
                                </div>

                                <div class="col-6">
                                    <label for="discount_symbol">{{__('Discount Type')}} <span
                                                class="text-danger">*</span></label>

                                    <select class="form-control" name="discount_symbol" id="discount_symbol">
                                        <option value="{{site_currency_symbol()}}" selected>Currency ({{site_currency_symbol()}})</option>
                                        <option value="%">Percent (%)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="coupon_code">{{__('Coupon Code')}} <span
                                            class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="coupon_code" id="coupon_code" placeholder="Ex: KD68452">
                            </div>

                            <div class="form-group">
                                <label for="title">{{__('Excerpt')}}</label>
                                <textarea name="excerpt" class="form-control max-height-150" cols="20"
                                          rows="5"></textarea>
                            </div>
                    </div>
                </div>
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="featured"><strong>{{__('Select Categories')}}</strong></label>
                                    <div class="category-section">
                                       <select class="form-control" name="category_id">
                                            @foreach($all_category as $category)
                                               <option value="{{$category->id}}">{{purify_html($category->getTranslation('title',$default_lang))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="featured"><strong>{{__('Select Brand')}}</strong></label>
                                    <div class="brand-section">
                                        <select class="form-control" name="brand_id" id="brand">
                                            @foreach($all_brand as $brand)
                                                <option value="{{$brand->id}}">{{purify_html($brand->getTranslation('title',$default_lang))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="featured"><strong>{{__('Select Location')}}</strong></label>
                                    <div class="location-section">
                                        <select class="form-control" name="location_id" id="location">
                                            @foreach($all_location as $location)
                                                <option value="{{$location->id}}">{{purify_html($location->getTranslation('city_name',$default_lang))}}, {{purify_html($location->getTranslation('state_name',$default_lang))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group" id="product_tag_list">
                                            <label for="tags" class="mt-3">{{__('Product Tag')}}</label>
                                            <input type="text" id="tags" class="form-control tags_filed"
                                                   name="tag_id[]">

                                            <div id="show-autocomplete-dashboard" style="display: none;">
                                                <ul class="autocomplete-warp-dashboard"></ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="expire_date">{{__('Product Expire Date')}}</label>
                                                <input type="date" name="expire_date" class="form-control mt-2 expire_date">
                                            </div>

                                    </div>
                                </div>

                                <div class="form-group ">
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
                                    </div>
                                </div>

                                <div class="form-group ">
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
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body meta">
                                                <h5 class="header-title my-3">{{__('Meta Section')}}</h5>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                             role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-pills-home-tab"
                                                               data-toggle="pill" href="#v-pills-home" role="tab"
                                                               aria-controls="v-pills-home"
                                                               aria-selected="true">{{__('Product Meta')}}</a>
                                                            <a class="nav-link" id="v-pills-profile-tab"
                                                               data-toggle="pill"
                                                               href="#v-pills-profile" role="tab"
                                                               aria-controls="v-pills-profile"
                                                               aria-selected="false">{{__('Facebook Meta')}}</a>
                                                            <a class="nav-link" id="v-pills-messages-tab"
                                                               data-toggle="pill"
                                                               href="#v-pills-messages" role="tab"
                                                               aria-controls="v-pills-messages"
                                                               aria-selected="false">{{__('Twitter Meta')}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class=" meta tab-content" id="v-pills-tabContent">

                                                            <div class="tab-pane fade show active" id="v-pills-home"
                                                                 role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                <div class="form-group">
                                                                    <label for="title">{{__('Meta Title')}}</label>
                                                                    <input type="text" class="form-control"
                                                                           name="meta_title"
                                                                           placeholder="{{__('Title')}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="slug">{{__('Meta Tags')}}</label> <br>
                                                                    <input type="text" class="form-control"
                                                                           name="meta_tags"
                                                                           placeholder="Slug" data-role="tagsinput">
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="title">{{__('Meta Description')}}</label>
                                                                        <textarea name="meta_description"
                                                                                  class="form-control max-height-140"
                                                                                  cols="20"
                                                                                  rows="5"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="tab-pane fade" id="v-pills-profile"
                                                                 role="tabpanel"
                                                                 aria-labelledby="v-pills-profile-tab">
                                                                <div class="form-group">
                                                                    <label for="title">{{__('Facebook Meta Tag')}}</label><br>
                                                                    <input type="text" class="form-control"
                                                                           data-role="tagsinput"
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

                                                            <div class="tab-pane fade" id="v-pills-messages"
                                                                 role="tabpanel"
                                                                 aria-labelledby="v-pills-messages-tab">
                                                                <div class="form-group">
                                                                    <label for="title">{{__('Twitter Meta Tag')}}</label><br>
                                                                    <input type="text" class="form-control"
                                                                           data-role="tagsinput"
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

                                <div class="submit_btn mt-5">
                                    <button type="submit"
                                            class="btn btn-success pull-right">{{__('Submit New Post ')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup :type="'web'"/>
@endsection

@push('scripts')
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/backend/js/flatpickr.js')}}"></script>
    <script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>
    <x-summernote.js/>
    <x-media.js :type="'web'"/>

    <script>
        flatpickr('.expire_date', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });

        (function ($) {
            "use strict";
            $(document).ready(function () {

                //For Tags
                var blogTagInput = $('#product_tag_list .tags_filed');
                var oldTag = '';
                blogTagInput.tagsinput();

                $(document).on('keyup', '#product_tag_list .bootstrap-tagsinput input[type="text"]', function (e) {
                    e.preventDefault();

                    var el = $(this);
                    var inputValue = $(this).val();
                    $.ajax({
                        type: 'get',
                        url: "{{ route('user.get.product.tags.by.ajax') }}",
                        async: false,
                        data: {
                            query: inputValue
                        },

                        success: function (data) {
                            oldTag = inputValue;
                            let html = '';
                            var showAutocomplete = '';
                            $('#show-autocomplete-dashboard').html('<ul class="autocomplete-warp-dashboard"></ul>');
                            if (el.val() != '' && data.markup != '') {

                                data.result.map(function (tag, key) {
                                    html += '<li class="tag_option p-2 mr-1" data-id="' + key + '" data-val="' + tag + '">' + tag + '</li>'
                                })

                                $('#show-autocomplete-dashboard ul').html(html);
                                $('#show-autocomplete-dashboard').show();


                            } else {
                                $('#show-autocomplete-dashboard').hide();
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


                //Permalink Code
                $('.permalink_label').hide();
                $(document).on('keyup', '#title', function (e) {
                    var slug = $(this).val().trim().toLowerCase().replace(/[^a-z0-9]|\s+|\r?\n|\r/gmi, "-").split(' ').join('-');
                    var url = `{{url('/'.get_blog_slug_by_page_id(get_static_option('product_page')).'/')}}/` + slug;
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
                    var slug = update_input.trim().toLowerCase().replace(/[^a-z0-9]|\s+|\r?\n|\r/gmi, "-").split(' ').join('-');
                    var url = `{{url('/product/')}}/` + slug;
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
                $(document).on('change', '#langchange', function (e) {
                    $('#langauge_change_select_get_form').trigger('submit');
                });

                var el = $('.post_type_radio');
                $(document).on('change', '.post_type', function () {
                    var val = $(this).val();
                    if (val === 'option2') {
                        $('.video_section').show();
                    } else {
                        $('.video_section').hide();
                    }
                })

            });
        })(jQuery)
    </script>


    <script>
        $(document).ready(function () {
            $(document).on('click', '.mobile-nav-click', function (e) {
                e.preventDefault()

                $('.nav-pills-open').toggleClass('active');
            });
        });
    </script>
@endpush
