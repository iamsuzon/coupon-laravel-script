@extends('frontend.user.dashboard.user-master')

@section('site-title')
    {{__('All Products')}}
@endsection

@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#">{{__('All Products')}}</a></h2>
@endsection


@section('style')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom-dashboard.css')}}">
    <x-datatable.css/>
    <x-media.css/>

    <style>
        .table-wrap .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 3px 7px;
        }

        .table-wrap .btn-info {
            padding: 3px 7px;
        }

        .table-wrap .alert-primary {
            padding: 6px 8px;
        }

        .dashboard-form-wrapper .form-control {
            padding: 5px 15px;
        }
    </style>
@endsection

@section('section')

    <div class="dashboard-form-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex flex-wrap justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title">{{__('All Product Items')}}</h4>
                            </div>
                            <div class="header-title d-flex mb-4">
                                <div class="btn-wrapper-inner custom-front-control">
                                    <form action="{{route('user.product')}}" method="get"
                                          id="langauge_change_select_get_form">
                                        <x-lang.frontend-lang-select :name="'lang'" :selected="$default_lang"
                                                                     :id="'langchange'"/>
                                    </form>
                                    <a href="{{route('user.product.new')}}" class="btn btn-info"> {{__('Add New')}}</a>
                                    <a href="{{route('user.product.trashed')}}"
                                       class="btn btn-danger"> {{__('Trashed Blogs')}}</a>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Information')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @forelse($all_user_product as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->getTranslation('title',$default_lang,true)}}</td>
                                        <td>
                                            <ul>
                                                <li></li>
                                                <li>{{__('Author :')}}{{$data->author}}</li>
                                                <li>{{__(' Date : ')}} {{date_format($data->created_at,'d-M-Y')}}</li>
                                                <li>{{__(' Category : ')}}
                                                    {{$data->category->getTranslation('title',$default_lang)}}
                                                </li>
                                            </ul>
                                        </td>
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
                                            <div class="mt-2">
                                                <x-status-span :status="$data->status"/>
                                            </div>
                                        </td>

                                        <td>
                                            <x-delete-popover-all-lang :type="'lineawesome'"
                                                                       :url="route('user.product.delete.all.lang',$data->id)"/>

                                            <a class="btn btn-lg btn-primary btn-sm mb-3 mr-1"
                                               href="{{route('user.product.edit',$data->id).'?lang='.$default_lang}}">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <form action="{{route('user.product.clone')}}" method="post"
                                                  style="display: inline-block">
                                                @csrf
                                                <input type="hidden" name="item_id" value="{{$data->id}}">
                                                <button type="submit" title="clone this to new draft"
                                                        class="btn btn-xs btn-secondary btn-sm mb-3 mr-1"><i
                                                            class="las la-copy"></i></button>
                                            </form>

                                            <a class="btn btn-info btn-xs mb-3 mr-1" target="_blank"
                                               href="{{route('frontend.product.single',$data->slug)}}">
                                                <i class="las la-eye"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">{{__('No Data Available')}}</td>
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
            <div class="col-lg-12">
                {{$all_user_product->links()}}
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    <script src="{{asset('assets/common/js/sweetalert2.js')}}"></script>
    <x-media.js/>
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
                        text: '{{__("It will delete All language data..!")}}',
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


    <script>

        $(document).on('click', '.mobile-nav-click', function (e) {
            e.preventDefault()
            $('.nav-pills-open').toggleClass('active');
        });

    </script>

    <x-datatable.js/>
@endpush
