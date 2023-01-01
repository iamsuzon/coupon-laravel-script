@extends('frontend.user.dashboard.user-master')
@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#">{{__('User Wishlist')}}</a></h2>
@endsection

@section('site-title')
    {{__('User Wishlist')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom-dashboard.css')}}">
@endsection

@section('section')

    <div class="row">
         <div class="col-xl-12 col-md-12 orders-child mt-5">
             <div class="dashboard-form-wrapper">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body">
                                 <h4 class="pb-3">{{__('Saved Posts')}}</h4>


                                 <div class="table-wrap table-responsive">
                                     <table class="table table-default" id="all_blog_table">
                                         <thead>
                                         <th>{{__('ID')}}</th>
                                         <th>{{__('Title')}}</th>
                                         <th>{{__('Image')}}</th>
                                         <th>{{__('Action')}}</th>
                                         </thead>
                                         <tbody>
                                         @forelse($all_wishlist as $data)
                                             <tr>
                                                 <td>{{optional($data->product)->id}}</td>
                                                 <td>{{optional($data->product)->getTranslation('title',$user_select_lang_slug) ?? ''}}</td>
                                                 <td>
                                                     @php
                                                         $product_img = get_attachment_image_by_id(optional($data->product)->image,'thumb',true);
                                                     @endphp
                                                     @if (!empty($product_img))
                                                         <div class="attachment-preview">
                                                             <div class="thumbnail">
                                                                 <div class="centered">
                                                                     <img class="avatar user-thumb rounded" src="{{$product_img['img_url']}}" alt="" style="width: 100px">
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     @endif
                                                </td>
                                                 <td>
                                                     <a class="btn btn-info btn-xs mb-3 mr-1" target="_blank" href="{{route('frontend.product.single',optional($data->product)->slug)}}">
                                                         <i class="las la-eye"></i>
                                                     </a>
                                                     <a class="btn btn-danger btn-xs mb-3 mr-1" href="{{route('user.wishlist.store', optional($data->product)->slug)}}">
                                                         <i class="lar la-heart icon"></i>
                                                     </a>
                                                 </td>
                                             </tr>
                                         @empty
                                             <tr>
                                                 <td class="text-center" colspan="5">{{__('No Data Available')}}</td>
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
                         {{$all_wishlist->links()}}
                     </div>
                 </div>
             </div>
         </div>
    </div>
@endsection





