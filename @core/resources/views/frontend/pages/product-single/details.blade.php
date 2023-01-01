@extends('frontend.frontend-page-master')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#">{{$single_product->title}}</a></h2>
@endsection

@section('site-title')
    {{$single_product->title}}
@endsection

@section('page-meta-data')
    {!! render_page_meta_data($single_product) !!}
    {!! render_site_title($single_product->title) !!}
@endsection

@section('content')
    <div class="blog-details-area-wrapper" data-padding-top="0" data-padding-bottom="100">
        <div class="container">
            <x-msg.success/>
            <x-msg.error/>
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-inner-area">
                        <div class="main-img-box">
                            <div class="background-img" data-width="100%" data-height="530"
                                    {!! render_background_image_markup_by_attachment_id($single_product->image, 'full') !!}>
                            </div>
                        </div>


                        <div class="author-and-tag">
                            <div class="left-content">
                                <div class="logo-box">
                                    <a href="{{route_single_brand(optional($single_product->brand)->slug)}}">
                                        {!! render_image_markup_by_attachment_id(optional($single_product->brand)->image, null, 'grid', false) !!}
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{route_single_brand(optional($single_product->brand)->slug)}}"
                                       class="title">{{optional($single_product->brand)->title}}</a>
                                    <p class="location"><span
                                                class="dot">·</span> {{optional($single_product->location)->city_name}}
                                        , {{optional($single_product->location)->state_name}}</p>
                                </div>
                            </div>
                            <div class="right-content">
                                <ul class="tag-list">
                                    <li class="tag-item">
                                        <a href="{{route_single_category(optional($single_product->category)->slug)}}">{{optional($single_product->category)->title}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h2 class="topic-title one">{{__('Overview')}}</h2>
                        <p class="info info-01">
                            {!! $single_product->description !!}
                        </p>

                        <div class="tag-and-social-link">
                            <div class="tag-wrap">
                                <ul>
                                    <li class="name">Tags:</li>
                                    @foreach(json_decode($single_product->tag_id) as $tag)
                                        @continue(empty($tag))
                                        <li><a href="{{route('frontend.product.tag.single', $tag)}}"
                                               class="tag-btn">{{$tag}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="social-link-wrap">
                                <div class="social-icon">
                                    <ul class="widget-social-link-list">
                                        <li class="name">Share:</li>

                                        {!! single_post_share_two(route('frontend.product.single',['id' => $single_product->id, 'slug' => $single_product->slug]),$single_product->title,$single_product->image_1) !!}
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="comment-area-full-wrapper">
                            @include('frontend.pages.product-single.review')
                            @include('frontend.pages.product-single.write_review')
                        </div>

                        @include('frontend.pages.product-single.you_may_like')
                    </div>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <div class="widget-area-wrapper">
                        <div class="widget ex">
                            <div class="widget-add">
                                <div class="add-banner-y-style-01">
                                    {!! render_random_advertisement() !!}
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <div class="widget-offer">
                                <div class="content">
                                    <div class="top-content">
                                        <div class="left-content">
                                            <div class="btn-wrapper">
                                                <a href="javascript:void(0)" class="btn-default main-color-two grab-now" data-id="{{$single_product->id}}">-{{$single_product->discount}} {{__('% off') }}</a>
                                            </div>
                                        </div>
                                        <div class="right-content">
                                            @if(get_product_rating_average($single_product->id) > 0)
                                                <div class="star">
                                                    {!! render_ratings(get_product_rating_average($single_product->id)) !!}
                                                </div>
                                                <div class="rating-count">({{count($single_product->reviews)}})
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="middle-content">
                                        <div class="left-content">
                                            <div class="pricing">
                                                <span class="price">{{site_currency_symbol()}}{{$single_product->sale_price}}</span>
                                                <del>{{site_currency_symbol()}}{{$single_product->regular_price}}</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom-content">
                                        <div class="right-content">
                                            <span class="offer-duration">
                                                {!! render_deal_expire_date_markup($single_product->expire_date) !!}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="bottom-content-last">
                                        <div class="left-content">
                                            <div class="btn-wrapper">
                                                <a href="javascript:void(0)" class="btn-default special-btn grab-now" data-id="{{$single_product->id}}">{{__('Grab his Offer!')}}</a>
                                            </div>
                                        </div>
                                        <div class="right-content">
                                            @guest('admin')
                                                @auth('web')
                                                    @php
                                                        $user = Auth::guard('web')->user();
                                                    @endphp
                                                @endauth
                                                <a href="{{route('user.wishlist.store', $single_product->slug)}}"
                                                   class="fav @if(Auth::guard('web')->check()) {{optional($user->wishlist)->contains('product_id', $single_product->id) ? 'active' : ''}} @endif">
                                                    <i class="lar la-heart icon"></i>
                                                </a>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget-area-wrapper">
                            <div class="widget ex">
                                <div class="widget-add">
                                    <div class="add-banner-y-style-01">
                                        {!! render_random_advertisement() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-area-wrapper mt-4">
                        {!! render_frontend_sidebar('product_sidebar',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('assets/frontend/js/rating.js') }}"></script>
    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {

                $("#review").rating({
                    "value": 3,
                    "click": function (e) {
                        $("#rating").val(e.stars);
                    }
                });

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "100",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                };

                $(document).on('submit', '.comment-form', function (e) {
                    e.preventDefault();
                    let product_id = $('#product_id').val();
                    let rating = $('#rating').val();
                    let review = $('textarea#review').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('frontend.product.review.store') }}",
                        method: "post",
                        data: {
                            product_id: product_id,
                            rating: rating,
                            review: review,
                        },
                        beforeSend: function (res) {
                            $('#post-review-btn').text('Posting...');
                            $('.loderWrapper').css('display','block');
                        },
                        success: function (res) {
                            if (res.status == 'ok' && res.type == 'success') {
                                toastr.success(res.msg);
                                $("#user-review-area").load(location.href + " #user-review-area");
                                $('#post-review-btn').text('Post Review');
                            } else {
                                toastr.error(res.msg);
                                $('#post-review-btn').text('Post Review');
                            }
                            $('.comment-form')[0].reset();

                            $('.loderWrapper').css('display','none');
                        },
                        error: function (res) {
                            $.each(res.responseJSON.errors, function (key, value) {
                                toastr.error(value);
                            });

                            $('.loderWrapper').css('display','none');
                            $('#post-review-btn').text('Post Review');
                        }
                    });
                })

                $('.review-reply-form').hide();
                $(document).on('click', '.reply-btn', function (e) {
                    e.preventDefault();

                    let el = $(this);
                    let review_id = el.data('reply');

                    let reply_button = $(`[data-reply='${review_id}']`);
                    reply_button.find('span').text('Reply');

                    $('.review-' + review_id).toggle();
                });


                $(document).on('submit', '.review-reply-form', function (e) {
                    e.preventDefault();

                    var el = $(this);
                    var review_id = el.data('review_id');

                    var form = $('.review-reply-form');
                    var reply = form.find('#review-reply-' + review_id).val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('frontend.product.review.reply.ajax') }}",
                        method: "post",
                        data: {
                            review_id: review_id,
                            reply: reply,
                        },
                        beforeSend: function (res) {
                            let button = $('#reply-send-button-' + review_id);
                            button.text('Replying...');
                            button.attr('disabled', true);

                            $('.loderWrapper').css('display','block');
                        },
                        success: function (res) {
                            if (res.status == 'ok' && res.type == 'success') {
                                $(`[data-reply='${review_id}']`).find('span').text('Reply');
                                $('.review-' + review_id)[0].reset();
                                $('.review-' + review_id).toggle();

                                let button = $('#reply-send-button-' + review_id);
                                button.text('Reply');
                                button.attr('disabled', false);
                                location.reload(true);

                                toastr.success(res.msg);
                            } else {
                                toastr.error(res.msg);
                            }

                            $('.loderWrapper').css('display','none');
                        },
                        error: function (res) {
                            $('.comment-section-error').html('');
                            $.each(res.responseJSON.errors, function (key, value) {
                                toastr.error(value);
                            });

                            let button = $('#reply-send-button-' + review_id);
                            button.text('Reply');
                            button.attr('disabled', false);

                            $('.loderWrapper').css('display','none');
                        }
                    });
                })

                $(document).on('click', '#login_btn', function (e) {
                    e.preventDefault();
                    var formContainer = $('#login_form_order_page');
                    var el = $(this);
                    var username = formContainer.find('input[name="username"]').val();
                    var password = formContainer.find('input[name="password"]').val();
                    var remember = formContainer.find('input[name="remember"]').val();

                    el.text('{{__("Please Wait..")}}');

                    $.ajax({
                        method: 'post',
                        url: "{{route('user.ajax.login')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            username : username,
                            password : password,
                            remember : remember,
                        },
                        success: function (data){
                            if(data.status == 'invalid'){
                                el.text('{{__("Login")}}')
                                formContainer.find('.error-wrap').html('<div class="alert alert-danger">'+data.msg+'</div>');
                            }else{
                                formContainer.find('.error-wrap').html('');
                                el.text('{{__("Login Success.. Redirecting ..")}}');
                                location.reload();
                            }
                        },
                        error: function (data){
                            console.log(data);
                            var response = data.responseJSON.errors;
                            formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                            $.each(response,function (value,index){
                                formContainer.find('.error-wrap ul').append('<li>'+index+'</li>');
                            });
                            el.text('{{__("Login")}}');
                        }
                    });
                });
            });
        })(jQuery);
    </script>
@endpush
