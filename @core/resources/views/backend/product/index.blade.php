@extends('backend.admin-master')

@section('site-title')
    {{__('All Products')}}
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
                                <h4 class="header-title">{{__('All Product Items')}}   </h4>
                                @can('product-delete')
                                    <x-bulk-action/>
                                @endcan
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <form action="{{route('admin.product')}}" method="get" id="langauge_change_select_get_form">
                                        <x-lang.select :name="'lang'" :selected="$default_lang" :id="'langchange'"/>
                                    </form>
                                    @can('product-create')
                                         <a href="{{route('admin.product.new')}}" class="btn btn-info"> {{__('Add New')}}</a>
                                         <a href="{{route('admin.product.trashed')}}" class="btn btn-danger"> {{__('Trashed Products')}}</a>
                                     @endcan
                                </div>
                            </div>
                        </div>

                                  <div class="table-wrap table-responsive">
                                    <table class="table table-default" id="all_blog_table">
                                        <thead>
                                          <th class="no-sort">
                                           <div class="mark-all-checkbox">
                                               <input type="checkbox" class="all-checkbox">
                                           </div>
                                        </th>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Author')}}</th>
                                        <th>{{__('Views')}}</th>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Image')}}</th>
                                        <th>{{__('Category')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Date')}}</th>
                                        <th>{{__('Action')}}</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('backend.partials.datatable.script-enqueue',['only_js' => true])
<x-media.js/>
<script>
(function ($){
    "use strict";
    $(document).ready(function () {
        <x-bulk-action-js :url="route('admin.product.bulk.action')" />
        $(document).on('change','#langchange',function(e){
            $('#langauge_change_select_get_form').trigger('submit');
        });

        $('.table-wrap > table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.product',['lang' => $default_lang]) }}",
            columns: [
                {data: 'checkbox', name: '', orderable: false, searchable: false},
                {data: 'id', name: 'id'},
                {data: 'author', name: ''},
                {data: 'views', name: ''},
                {data: 'title', name: '', orderable: false, searchable: false},
                {data: 'image', name: '', orderable: false, searchable: false},
                {data: 'category_id', name: ''},
                {data: 'status', name: ''},
                {data: 'date', name: ''},
                {data: 'action', name: '', orderable: false, searchable: true},
            ]
        });
    });
})(jQuery)
</script>
@endsection
