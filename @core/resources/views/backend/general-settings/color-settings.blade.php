@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/colorpicker.css')}}">
@endsection
@section('site-title')
    {{__('Color Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.success/>
                  <x-msg.error/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Color Settings")}}</h4>
                        <form action="{{route('admin.general.color.settings')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="site_main_color_one">{{__('Site Main Color One')}}</label>
                                <input type="text" name="main-color-one" style="background-color: {{get_static_option('main-color-one')}};" class="form-control"
                                       value="{{get_static_option('main-color-one')}}" id="main-color-one">
                                <small class="form-text text-muted">{{__('you can change -site main color- from here, it will replace the website main color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_main_color_two">{{__('Site Main Color Two')}}</label>
                                <input type="text" name="main-color-two" style="background-color: {{get_static_option('main-color-two')}};" class="form-control"
                                       value="{{get_static_option('main-color-two')}}" id="main-color-two">
                                <small class="form-text text-muted">{{__('you can change -site base color- from here, it will replace the website base color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_main_color_two">{{__('Site Main Color Three')}}</label>
                                <input type="text" name="main-color-three" style="background-color: {{get_static_option('main-color-three')}};" class="form-control"
                                       value="{{get_static_option('main-color-three')}}" id="main-color-three">
                                <small class="form-text text-muted">{{__('you can change -site base color- from here, it will replace the website base color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_secondary_color">{{__('Site Secondary Color')}}</label>
                                <input type="text" name="secondary-color" style="background-color: {{get_static_option('secondary-color')}};" class="form-control"
                                       value="{{get_static_option('secondary-color')}}" id="secondary-color">
                                <small class="form-text text-muted">{{__('you can change -site Secondary color- from here, it will replace the website Secondary color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="tertiary-color">{{__('Site Tertiary Color')}}</label>
                                <input type="text" name="tertiary-color" style="background-color: {{get_static_option('secondary-color')}};" class="form-control"
                                       value="{{get_static_option('tertiary-color')}}" id="tertiary-color">
                                <small class="form-text text-muted">{{__('you can change -site Tertiary color- from here, it will replace the website Tertiary color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_main_color_two">{{__('Site Heading Color')}}</label>
                                <input type="text" name="heading-color" style="background-color: {{get_static_option('heading-color')}};" class="form-control"
                                       value="{{get_static_option('heading-color')}}" id="heading-color">
                                <small class="form-text text-muted">{{__('you can change -heading color- from here, it will replace the website heading color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_paragraph_color">{{__('Site Paragraph Color')}}</label>
                                <input type="text" name="paragraph-color" style="background-color: {{get_static_option('paragraph-color')}};" class="form-control"
                                       value="{{get_static_option('paragraph-color')}}" id="paragraph-color">
                                <small class="form-text text-muted">{{__('you can change -site paragraph color- from here, it will replace the website paragraph color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_bg_light_one">{{__('Site Background Light Color One')}}</label>
                                <input type="text" name="bg-light-one" style="background-color: {{get_static_option('bg-light-one')}};" class="form-control"
                                       value="{{get_static_option('bg-light-one')}}" id="bg-light-one">
                                <small class="form-text text-muted">{{__('you can change -site light color- from here, it will replace the light color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_bg_light_two">{{__('Site Background Light Color Two')}}</label>
                                <input type="text" name="bg-light-two" style="background-color: {{get_static_option('bg-light-two')}};" class="form-control"
                                       value="{{get_static_option('bg-light-two')}}" id="bg-light-two">
                                <small class="form-text text-muted">{{__('you can change - site light color two- from here, it will replace the website base color')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_bg_dark_one">{{__('Site Background Dark One')}}</label>
                                <input type="text" name="bg-dark-one" style="background-color: {{get_static_option('bg-dark-one')}};" class="form-control"
                                       value="{{get_static_option('bg-dark-one')}}" id="bg-dark-one">
                                <small class="form-text text-muted">{{__('you can change - site dark one - from here, it will replace the website site dark one')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="site_bg_dark_two">{{__('Site Background Dark Two')}}</label>
                                <input type="text" name="bg-dark-two" style="background-color: {{get_static_option('bg-dark-two')}};" class="form-control"
                                       value="{{get_static_option('bg-dark-two')}}" id="bg-dark-two">
                                <small class="form-text text-muted">{{__('you can change - site dark two- from here, it will replace the website site dark two')}}</small>
                            </div>

                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{asset('assets/backend/js/colorpicker.js')}}"></script>
    <script>
        (function($){
            "use strict";

            $(document).ready(function(){
                <x-icon-picker/>
                <x-btn.update/>
                initColorPicker('#main-color-one');
                initColorPicker('#main-color-two');
                initColorPicker('#main-color-three');
                initColorPicker('#secondary-color');
                initColorPicker('#tertiary-color');
                initColorPicker('#bg-light-one');
                initColorPicker('#bg-light-two');
                initColorPicker('#bg-dark-one');
                initColorPicker('#bg-dark-two');
                initColorPicker('#heading-color');
                initColorPicker('#paragraph-color');

                function initColorPicker(selector){
                    $(selector).ColorPicker({
                        color: '#852aff',
                        onShow: function (colpkr) {
                            $(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            $(colpkr).fadeOut(500);
                            return false;
                        },
                        onChange: function (hsb, hex, rgb) {
                            $(selector).css('background-color', '#' + hex);
                            $(selector).val('#' + hex);
                        }
                    });
                }
            });
        }(jQuery));
    </script>
@endsection
