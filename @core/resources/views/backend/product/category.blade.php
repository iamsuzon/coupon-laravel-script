@extends('backend.admin-master')
@section('site-title')
    {{__('Product Category')}}
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
                                <h4 class="header-title">{{__('All Categories')}}  </h4>
                                @can('product-category-delete')
                                    <x-bulk-action/>
                                @endcan
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <form action="{{route('admin.product.category')}}" method="get"
                                          id="langauge_change_select_get_form">
                                        <x-lang.select :name="'lang'" :selected="$default_lang" :id="'langchange'"/>
                                    </form>
                                </div>
                                <div class="btn-wrapper-inner ml-2">
                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#category_add_modal">{{__('Add New')}}</button>
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
                                <th>{{__('Name')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_category as $data)
                                    <tr>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]"
                                                       value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->getTranslation('title',$default_lang,true)}}</td>
                                        <td>
                                            <img src="{{get_attachment_image_by_id($data->image,null,true)['img_url']}}" alt="" style="width: 50px;height: auto">
                                        </td>
                                        <td>
                                            @if($data->status == 'draft')
                                                <span class="alert alert-primary">{{__('Draft')}}</span>
                                            @else
                                                <span class="alert alert-success">{{__('Publish')}}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @can('product-category-delete')
                                                <x-delete-popover-all-lang
                                                        :url="route('admin.product.category.delete.all.lang',$data->id)"/>
                                            @endcan



                                            @can('product-category-edit')
                                                @php
                                                    $img = get_attachment_image_by_id($data->image,null,true);
                                                    $img_url = $img['img_url'];
                                                @endphp

                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#category_edit_modal"
                                                   class="btn btn-lg btn-primary btn-sm mb-3 mr-1 category_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-title="{{$data->getTranslation('title',$default_lang )}}"
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

            @can('product-category-create')
                <div class="modal fade" id="category_add_modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{__('Create Category')}}</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            </div>
                            <form action="{{route('admin.product.category.store')}}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="lang" value="{{$default_lang}}">
                                    <div class="form-group">
                                        <label for="edit_name">{{__('Title')}}</label>
                                        <input type="text" class="form-control" name="title"
                                               placeholder="{{__('Title')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="lug">{{__('Slug')}} <sup
                                                    style="font-size: 10px">optional</sup></label>
                                        <input type="text" class="form-control" name="slug"
                                               placeholder="{{__('Slug')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">{{__('Category Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="image">
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
            @endcan

        </div>
    </div>

    @can('product-category-edit')
        <div class="modal fade" id="category_edit_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Update Category')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('admin.product.category.update')}}" method="post" id="category_edit_form">
                        <input type="hidden" name="id" id="category_id">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <div class="form-group">
                                <label for="edit_name">{{__('Title')}}</label>
                                <input type="text" class="form-control" id="edit_title" name="title">
                            </div>

                            <div class="form-group">
                                <label for="edit_slug">{{__('Slug')}} <sup
                                            style="font-size: 10px">optional</sup></label>
                                <input type="text" class="form-control" id="edit_slug" name="slug">
                            </div>

                            <div class="form-group">
                                <label for="image">{{__('Category Image')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
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
                            <button id="update" type="submit" class="btn btn-primary">{{__('Save Change')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    <x-media.markup/>
@endsection

@section('script')
    <x-datatable.js/>
    <x-media.js/>
    <x-bulk-action-js :url = "route('admin.product.category.bulk.action')"/>
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

                $(document).on('click', '.category_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var slug = el.data('slug');
                    var status = el.data('status');
                    var order_by = el.data('order');
                    var image = el.data('image');
                    var imageid = el.data('imageid');
                    var form = $('#category_edit_form');

                    form.find('#category_id').val(id);
                    form.find('#edit_status option[value="' + status + '"]').attr('selected', true);
                    form.find('#edit_title').val(title);
                    form.find('#edit_slug').val(slug);
                    $('#edit_order_by').val(order_by);
                    if (imageid != '') {
                        form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                        form.find('.media-upload-btn-wrapper input').val(imageid);
                        form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                    }
                });
            });
        })(jQuery)
    </script>
@endsection
