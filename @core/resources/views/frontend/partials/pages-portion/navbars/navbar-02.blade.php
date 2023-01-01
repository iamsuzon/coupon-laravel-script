@include('frontend.partials.pages-portion.supports.support-02')

<div class="navbar-main-wrap">
    <nav class="navbar navbar-area navbar-expand-lg has-topbar-65 nav-style-02 v-02 full-bg-white">
        <div class="container nav-container custom-container-02">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="{{url('/')}}" class="logo">
                        {!! render_image_markup_by_attachment_id(get_static_option('site_logo_two'),'','',false) !!}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                <ul class="navbar-nav">
                    {!! render_frontend_menu($primary_menu) !!}
                </ul>
            </div>
            <div class="nav-right-content">
                <ul>
                    <li>
                        <div class="btn-wrapper">
                            @if(Auth::guard('web')->check() || Auth::guard('admin')->check())
                                @php
                                    $route = auth()->guest() == 'admin' ? route('admin.home') : route('user.home');
                                @endphp

                                <a class="btn-default btn-outline register border-radius-70 main-color-two" href="{{$route}}"
                                   style="padding: 5px 25px 5px;font-size: 15px">{{__('Dashboard')}}</a>
                            @else
                                @if(!empty(get_static_option('register_show_hide')))
                                    <a class="btn-default btn-outline register border-radius-70 main-color-two" href="{{route('user.register')}}"
                                       style="padding: 5px 25px 5px;font-size: 15px">{{__('Register')}}</a>
                                @endif
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>