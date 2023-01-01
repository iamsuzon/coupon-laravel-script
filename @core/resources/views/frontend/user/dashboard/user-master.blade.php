@extends('frontend.frontend-page-master')

@section('page-title')
    <h2 class="list-item font-weight-bold"><a href="#">{{__('User Dashboard')}}</a></h2>
@endsection

@section('site-title')
    {{__('User Dashboard')}}
@endsection

@section('custom-page-title')
    {{__('User Dashboard')}}
@endsection

@section('content')
    <div class="body-overlay"></div>
    <div class="dashboard-area dashboard-padding my-5 py-5">
        <div class="container-fluid">
            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                <div class="dashboard-left-content">
                    <div class="dashboard-close-main">
                        <div class="close-bars"> <i class="las la-times"></i> </div>
                        <div class="dashboard-top padding-top-40">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id(Auth::guard('web')->user()->image ?? render_image_markup_by_attachment_id(get_static_option('single_blog_page_comment_avatar_image')), '','grid', false) !!}
                            </div>
                        </div>
                        <div class="dashboard-bottom margin-top-35 margin-bottom-50">
                            <ul class="dashboard-list ">
                                <li class="list @if(request()->routeIs('user.home')) active @endif">
                                    <a href="{{route('user.home')}}"> <i class="las la-th"></i> {{__('Dashboard')}} </a>
                                </li>
                                <li class="list @if(request()->routeIs('user.product') || request()->routeIs('user.blog.new') || request()->routeIs('user.blog.edit')) active @endif ">
                                    <a href="{{route('user.product')}}"> <i class="las la-cogs"></i> {{__('All Products')}} </a>
                                </li>
                                <li class="list @if(request()->routeIs('user.home.wishlist')) active @endif ">
                                    <a href="{{route('user.home.wishlist')}}"> <i class="far fa-list-alt"></i> {{__('All Wishlist')}} </a>
                                </li>
                                <li class="list @if(request()->routeIs('user.home.edit.profile')) active @endif">
                                    <a href="{{route('user.home.edit.profile')}}"> <i class="las la-tasks"></i> {{__('Edit Profile')}} </a>
                                </li>
                                <li class="list @if(request()->routeIs('user.home.change.password')) active @endif ">
                                    <a href="{{route('user.home.change.password')}}"> <i class="las la-tasks"></i> {{__('Change Password')}} </a>
                                </li>

                                <li class="list">
                                    <a href="{{ route('frontend.user.logout') }}" ><i class="las la-sign-out-alt"></i>{{ __('Logout') }}</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="dashboard-right">

                    <div class="parent">
                        <div class="col-xl-12">
                               <x-msg.success/>
                               <x-msg.error/>
                            @yield('section')
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection


@push('scripts')
        <script>
            $('.close-bars, .body-overlay').on('click', function() {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').removeClass('active');
        });
            $('.sidebar-icon').on('click', function() {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').addClass('active');
        });
    </script>
@endpush


