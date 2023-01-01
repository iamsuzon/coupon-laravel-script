@extends('frontend.frontend-page-master')

@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#">{{__('All Products')}}</a></h2>
@endsection

@section('site-title')
    {{__('All Products')}}
@endsection

@section('page-meta-data')
    {!! render_site_meta() !!}
    {!! render_site_title(__('All Products')) !!}
@endsection

@section('content')
    <div class="blog-grid-area-wrapper food-details" data-padding-top="100" data-padding-bottom="100">
        <div class="container">
            <div class="row row-reverse">
                @include('frontend.pages.all_product.filter')

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="toolbox-wrapper">
                                <div class="toolbox-left">
                                    <div class="toolbox-item toolbox-tags">
                                        <a href="#" class="tag">Online Course
                                            <span class="close-btn"><i class="las la-times icon"></i></span>
                                        </a>
                                        <a href="#" class="tag">Los Angeles
                                            <span class="close-btn"><i class="las la-times icon"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-sort">
                                        <select id="item-shows" class="select-box">
                                            <option value="Default" disabled selected="">Sort by</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="latest">Sort by latest</option>
                                            <option value="price-low">Sort by pric: low to high</option>
                                            <option value="price-high">Sort by pric: high to low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row two-column">
                        @foreach($data['products'] as $product)
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="single-featured-item style-01">
                                    <div class="img-box">
                                        <a href="{{route_single_catgeory(optional($product->category)->id)}}"
                                           class="catg-tag top-left border-radius-15"
                                           tabindex="0">{{optional($product->category)->title}}</a>
                                        <a href="{{route_single_product($product->slug)}}" tabindex="0">
                                            {!! render_image_markup_by_attachment_id($product->image_1, 'border-radius-10', 'grid', false) !!}
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="top-content">
                                            <div class="left-content">
                                                <div class="logo-box">
                                                    <a href="{{route_single_brand(optional($product->brand)->id)}}"
                                                       tabindex="0">
                                                        {!! render_image_markup_by_attachment_id(optional($product->brand)->image, '', 'grid', false) !!}
                                                    </a>
                                                </div>
                                                <div class="details">
                                                    <a href="{{route_single_brand(optional($product->brand)->id)}}"
                                                       class="title"
                                                       tabindex="0">{{optional($product->brand)->title}}</a>
                                                    <p class="location">{{optional($product->location)->city_name}}
                                                        , {{optional($product->location)->state_name}}</p>
                                                </div>
                                            </div>
                                            <div class="right-content">
                                                <div class="star">
                                                    <i class="las la-star icon"></i>
                                                </div>
                                                <div class="rating-count">({{get_product_rating_average($product->id)}}</div>
                                            </div>
                                        </div>
                                        <div class="middle-content">
                                            <a href="{{route_single_product($product->slug)}}"
                                               class="offer">{{Str::words($product->title, 10)}}</a>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="left-content">
                                                <div class="pricing">
                                                    <span class="price">{{$product->sale_price}}</span>
                                                    <del>{{$product->regular_price}}</del>
                                                </div>
                                            </div>
                                            <div class="right-content">
                                                <span class="offer-duration">
                                                    {!! render_deal_expire_date_markup($product->expire_date) !!}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <!-- pagination area start -->
                        <div class="col-lg-12">
                            <div class="pagination" data-padding-top="50">
                                <ul class="pagination-list">
                                    {{$data['products']->links()}}
                                </ul>
                            </div>
                        </div>
                        <!-- pagination area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                $(document).on('keyup', '#search-box', function (e) {
                    e.preventDefault();

                    let default_lang = $('#language').val();
                    let search_query = $('#search-box').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('frontend.products') }}",
                        method: "post",
                        data: {
                            default_lang: default_lang,
                            search_query: search_query
                        },
                        beforeSend: function (res) {

                        },
                        success: function (res) {
                            $('.two-column').empty();
                            $.each(res, function (key, value) {
                                $('.two-column').append(value);
                            });
                        },
                        error: function (res) {
                            console.log(res);
                        }
                    });
                })

                $(document).on('change','.category',function(e){
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(document).on('change','.location',function(e){
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(document).on('change','.price',function(e){
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(document).on('change','.rating',function(e){
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })
            });
        })(jQuery);
    </script>
@endpush