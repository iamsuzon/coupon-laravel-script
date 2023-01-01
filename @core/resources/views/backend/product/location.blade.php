@extends('backend.admin-master')
@section('site-title')
    {{__('Product Location')}}
@endsection
@section('style')
    <x-datatable.css/>
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title">{{__('All Location')}}  </h4>
                                @can('product-location-delete')
                                    <x-bulk-action/>
                                @endcan
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <form action="{{route('admin.product.location')}}" method="get"
                                          id="langauge_change_select_get_form">
                                        <x-lang.select :name="'lang'" :selected="$default_lang" :id="'langchange'"/>
                                    </form>
                                </div>
                                <div class="btn-wrapper-inner ml-2">
                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#location_add_modal">{{__('Add New')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('City')}}</th>
                                <th>{{__('State')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_location as $data)
                                    <tr>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]"
                                                       value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->getTranslation('city_name',$default_lang,true)}}</td>
                                        <td>{{$data->getTranslation('state_name',$default_lang,true)}}</td>
                                        <td>
                                            {!! render_attachment_preview_for_admin($data->image) !!}
                                        </td>

                                        <td>
                                            @if($data->status == 'draft')
                                                <span class="alert alert-primary">{{__('Draft')}}</span>
                                            @else
                                                <span class="alert alert-success">{{__('Publish')}}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @can('product-location-delete')
                                                <x-delete-popover-all-lang
                                                        :url="route('admin.product.location.delete.all.lang',$data->id)"/>
                                            @endcan



                                            @can('product-location-edit')

                                                @php
                                                    $img = get_attachment_image_by_id($data->image,null,true);
                                                    $img_url = $img['img_url'];
                                                @endphp

                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#location_edit_modal"
                                                   class="btn btn-lg btn-primary btn-sm mb-3 mr-1 location_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-city_name="{{$data->getTranslation('city_name',$default_lang )}}"
                                                   data-state_name="{{$data->getTranslation('state_name',$default_lang )}}"
                                                   data-slug="{{$data->slug}}"
                                                   data-status="{{$data->status}}"
                                                   data-imageid="{{$data->image}}"
                                                   data-image="{{$img_url}}"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <div class="modal fade" id="location_add_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Create Tag')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('admin.product.location.store')}}" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <div class="form-group">
                                <label for="edit_name">{{__('City Name')}}</label>
                                <input type="text" class="form-control" id="edit_city" name="city_name">
                            </div>

                            <div class="form-group">
                                <label for="edit_name">{{__('State Name')}}</label>
                                <input type="text" class="form-control" id="edit_state" name="state_name">
                            </div>

                            <div class="form-group">
                                <label for="slug">{{__('Slug')}} <sup style="font-size: 10px">optional</sup></label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>


                            <div class="form-group ">
                                <label for="image">{{__('Location Image')}}</label>
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

                            <div class="form-group">
                                <label for="edit_status">{{__('Status')}}</label>
                                <select name="status" class="form-control" id="edit_status">
                                    <option value="draft">{{__("Draft")}}</option>
                                    <option value="publish">{{__("Publish")}}</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="location_edit_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Update Tag')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('admin.product.location.update')}}" method="post" id="location_edit_form">
                        <input type="hidden" name="id" id="location_id">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <div class="form-group">
                                <label for="edit_name">{{__('City Name')}}</label>
                                <input type="text" class="form-control" id="edit_city" name="city_name">
                            </div>

                            <div class="form-group">
                                <label for="edit_name">{{__('State Name')}}</label>
                                <input type="text" class="form-control" id="edit_state" name="state_name">
                            </div>

                            <div class="form-group">
                                <label for="edit_slug">{{__('Slug')}} <sup style="font-size: 10px">optional</sup></label>
                                <input type="text" class="form-control" id="edit_slug" name="slug">
                            </div>

                            <div class="form-group ">
                                <label for="image">{{__('Location Image')}}</label>
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

                            <div class="form-group">
                                <label for="edit_status">{{__('Status')}}</label>
                                <select name="status" class="form-control" id="edit_status">
                                    <option value="draft">{{__("Draft")}}</option>
                                    <option value="publish">{{__("Publish")}}</option>
                                </select>
                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{__('Close')}}</button>
                                    <button id="update" type="submit"
                                            class="btn btn-primary">{{__('Save Change')}}</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <x-media.markup/>
@endsection
@section('script')
    <x-media.js/>
    <x-datatable.js/>

    <script>
        $(document).on('click', '.location_edit_btn', function () {

            var el = $(this);
            var id = el.data('id');
            var city_name = el.data('city_name');
            var state_name = el.data('state_name');
            var slug = el.data('slug');
            var status = el.data('status');
            var order_by = el.data('order');
            var image = el.data('image');
            var imageid = el.data('imageid');
            var form = $('#location_edit_form');
            var modal = $('#location_edit_modal');

            modal.find('#location_id').val(id);
            modal.find('#edit_status option[value="' + status + '"]').attr('selected', true);
            modal.find('#edit_city').val(city_name);
            modal.find('#edit_state').val(state_name);
            modal.find('#edit_slug').val(slug);
            $('#edit_order_by').val(order_by);
            if (imageid != '') {
                modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                modal.find('.media-upload-btn-wrapper input').val(imageid);
                modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
            }
        });
    </script>
 <x-bulk-action-js :url = "route('admin.product.location.bulk.action')"/>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                    <x-btn.submit/>
                    <x-btn.save/>
                    <x-btn.update/>

                    $(document).on('change', '#langchange', function (e) {
                        $('#langauge_change_select_get_form').trigger('submit');
                    });
            });
        })(jQuery)
    </script>

@endsection
