@extends('backend.admin-master')
@section('style')
    <x-blog-inline-css/>
@endsection
@section('site-title')
    {{__('Product Single Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h3 class="header-title">{{__('Single Product Options')}}   </h3>
                            </div>
                        </div>

                        @php $ad = \App\ProductSingleSettings::first(); @endphp
                        <form class="mt-4" action="{{route('admin.product.single.settings')}}" method="post"
                              id="product_advertisement">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ad_type">{{__('Advertisement Type')}}</label>
                                        <select class="form-control" name="ad_type" id="ad_type">
                                            <option disabled>{{__('Select a Type')}}</option>
                                            <option value="all" {{isset($ad->ad_type) AND $ad->ad_type == 'all' ? 'selected' : ''}}>{{__('All')}}</option>
                                            <option value="image" {{isset($ad->ad_type) AND $ad->ad_type == 'image' ? 'selected' : ''}}>{{__('Image')}}</option>
                                            <option value="scripts" {{isset($ad->ad_type) AND $ad->ad_type == 'scripts' ? 'selected' : ''}}>{{__('Scripts')}}</option>
                                            <option value="google_adsense" {{isset($ad->ad_type) AND $ad->ad_type == 'google_adsense' ? 'selected' : ''}}>{{__('Google Adsense')}}</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="title">{{__('Advertisement Orders')}}</label>
                                        <select class="form-control" name="ad_order" id="ad_order">
                                            <option disabled>{{__('Select a Order')}}</option>
                                            <option value="asc" {{isset($ad->ad_order) AND $ad->ad_order == 'asc' ? 'selected' : ''}}>{{__('Ascending')}}</option>
                                            <option value="desc" {{isset($ad->ad_order) AND $ad->ad_order == 'desc' ? 'selected' : ''}}>{{__('Descending ')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="site_global_currency">Site Global Currency</label>
                                        <select name="site_global_currency" class="form-control" id="site_global_currency">

                                            @foreach($all_currency as $key => $currency)
                                                <option value="{{$key}}" {{get_static_option('site_global_currency') == $key ? "selected" : '' }}>{{$key}} ( {{$currency}} )</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success mt-3" type="submit">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
