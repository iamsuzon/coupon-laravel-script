<div class="topbar-area bg-color-d">
    <div class="container custom-container-04">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar-inner">
                    <div class="left-content">
                        <div class="topbar-item">
                            <div class="contact">
                                <ul class="contact-list">
                                    @foreach($all_topbar_infos as $info)
                                        <li class="contact-item phone">
                                            <a href="{{$info->url}}">
                                                <i class="{{$info->icon}} icon"></i>
                                                {{$info->title}}
                                            </a>
                                        </li>
                                    @endforeach

                                        @if(Auth::guard('web')->check() || Auth::guard('admin')->check())
                                            @php
                                                $route = auth()->guest() == 'admin' ? route('admin.home') : route('user.home');
                                            @endphp

                                            <li class="dashboard-mobile-btn">
                                                <div class="btn-wrapper">
                                                    <a class="btn-default btn-outline register border-radius-70 main-color-two" href="{{$route}}"
                                                       style="padding: 5px 25px 5px;font-size: 15px">{{__('Dashboard')}}</a>
                                                </div>
                                            </li>
                                        @else
                                            @if(!empty(get_static_option('register_show_hide')))
                                                <li class="dashboard-mobile-btn">
                                                    <div class="btn-wrapper">
                                                        <a href="{{route('user.login')}}"
                                                           class="btn-default btn-outline register"> {{__('Login')}} </a>
                                                    </div>
                                                </li>
                                            @endif
                                        @endif
                                </ul>
                            </div>
                        </div>
                        <div class="topbar-item d-none">
                            <div class="social-icon">
                                <ul class="social-link-list">
                                    @foreach($all_social_icons as $icon)
                                        <li class="link-item">
                                            <a href="{{$icon->url}}" class="facebook">
                                                <i class="{{$icon->icon}} icon"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-content">
                        <div class="topbar-item">
                            <div class="social-icon">
                                <ul class="social-link-list">
                                    @foreach($all_social_icons as $icon)
                                        <li class="link-item">
                                            <a href="{{$icon->url}}" class="facebook">
                                                <i class="{{$icon->icon}} icon"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if(!empty(get_static_option('language_select_option')))
                            <div class="topbar-item">
                                <div class="single-select">
                                    <select class="lang" id="langchange">
                                        @foreach($all_language as $lang)
                                            @php
                                                $lang_name = explode('(',$lang->name);
                                                $data = array_shift($lang_name);
                                            @endphp
                                            <option @if(get_user_lang() == $lang->slug) selected
                                                    @endif value="{{$lang->slug}}">{{$data}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>