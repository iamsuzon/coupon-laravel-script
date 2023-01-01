@extends('backend.admin-master')
@section('style')
    <x-blog-inline-css/>
@endsection
@section('site-title')
    {{__('Product Single Popup Settings')}}
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
                                <h3 class="header-title">{{__('Single Product Popup Options')}}   </h3>
                            </div>
                        </div>

                        <form class="mt-4" action="{{route('admin.product.single.popup.settings')}}" method="post"
                              id="product_advertisement">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="button_text">{{__('Go to Single Product Page Button Text')}}</label>
                                        <input class="form-control" type="text" name="popup_button_text" id="button_text" placeholder="Popup go to post text" value="{{get_static_option('popup_button_text') ?? ''}}">
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="pop_footer_text">{{__('Popup Footer Text')}}</label>
                                        <input class="form-control" type="text" name="popup_footer_text" id="pop_footer_text" placeholder="Popup footer text" value="{{get_static_option('popup_footer_text') ?? ''}}">
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="pop_footer_link">{{__('Popup Footer Text Redirection Link')}}</label>
                                        <input class="form-control" type="text" name="popup_footer_link" id="pop_footer_link" placeholder="Popup footer text link" value="{{get_static_option('popup_footer_link') ?? ''}}">
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
