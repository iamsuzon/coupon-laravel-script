@extends('frontend.frontend-page-master')

@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#"> {{$search}}</a></h2>
@endsection

@section('site-title')
    {{$search}}
@endsection

@section('content')
    <div class="blog-grid-area-wrapper ctg-brand-product" data-padding-top="0" data-padding-bottom="70">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h3>{{__('Search Result For:')}} {{$search}}</h3>
                </div>
            </div>
            <div class="row">
                @forelse($search_results as $product)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3" >
                        <div class="single-recent-item style-01" >
                            <div class="img-box">
                                <a href="javascript:void(0)"
                                   class="catg-tag top-right border-radius-5">-{{$product->discount}}{{$product->discount_symbol}}</a>
                                <a href="{{route('frontend.product.single', $product->slug)}}">
                                    {!! render_image_markup_by_attachment_id($product->image, 'rounded', 'grid', false) !!}
                                </a>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="{{route('frontend.product.single', $product->slug)}}" class="offer">{{Str::words($product->title, 10)}}</a>
                                </div>
                                <div class="middle-content">
                                    <div class="left-content">

                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="left-content">
                                        <div class="btn-wrapper">
                                            <a href="javascript:void(0)" class="btn-default grab-now" data-id="{{$product->id}}">{{__('Coupon Code')}}</a>
                                        </div>
                                    </div>
                                    <div class="right-content">
                                    <span class="offer-duration grab-now" data-id="{{$product->id}}" style="cursor: pointer">
                                        {{__('Grab Now!')}}
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-danger my-5">{{__('No Search Result Found')}}</p>
                    </div>
                @endforelse
            </div>

            <div class="row">
                <div class="col-12">
                    {{$search_results->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
