@extends('frontend.user.dashboard.user-master')
@section('site-title')
    {{__('All Trashed Blogs')}}
@endsection

@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#">{{__('User Dashboard')}}</a></h2>
    <h2 class="list-item font-weight-bold"><a href="#">{{__('Trashed Blogs')}}</a></h2>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom-dashboard.css')}}">
    <x-datatable.css/>
    <x-media.css/>

    <style>
        .table-wrap .alert-primary {
            padding: 6px 8px;
        }

    </style>
@endsection

@section('section')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">

                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title">  {{__('All Trashed Products')}}   </h4>

                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <a href="{{route('user.product')}}" class="btn btn-info mb-3"> {{__('Go Back')}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Category')}}</th>
                                <th>{{__('Author')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @forelse($trashed_blogs as $data)
                                    <tr>

                                        <td>{{$data->id}}</td>
                                        <td>{{$data->getTranslation('title',$default_lang,true)}}</td>
                                        <td>
                                            @php
                                                $product_img = get_attachment_image_by_id($data->image,null,true);
                                            @endphp
                                            @if (!empty($product_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                 src="{{$product_img['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            {{$data->category->getTranslation('title',$default_lang)}}
                                        </td>
                                        <td>{{$data->author}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>{{date_format($data->created_at,'d-M-Y')}}</td>
                                        <td>

                                            <x-delete-popover-all-lang
                                                    :url="route('user.product.trashed.delete',$data->id)"/>


                                            <a class="btn btn-lg btn-primary btn-sm mb-3 mr-1"
                                               href="{{route('user.product.trashed.restore',$data->id)}}">
                                                {{__('Restore')}}
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="8">{{__('No Data in Trash')}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                {{$trashed_blogs->links()}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/common/js/sweetalert2.js')}}"></script>
    <x-datatable.js/>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $(document).on('change', '#langchange', function (e) {
                    $('#langauge_change_select_get_form').trigger('submit');
                });

                $(document).on('click', '.swal_delete_all_lang_data_button', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: '{{__("Are you sure?")}}',
                        text: '{{__("It will delete All language data Permanently!")}}',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).next().find('.swal_form_submit_btn').trigger('click');
                        }
                    });
                });
            });
        })(jQuery)
    </script>
@endpush
