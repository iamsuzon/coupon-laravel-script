<?php

namespace App\Providers;


use App\Helpers\InstagramFeedHelper;
use App\Language;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        app()->bind('InstagramFeed',function (){
            return new InstagramFeedHelper();
        });
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        //load page builder views

        $this->loadViewsFrom(__DIR__.'/../PageBuilder/views','pagebuilder');

        $all_language = Language::all();
        Paginator::useBootstrap();
        if (get_static_option('site_force_ssl_redirection') === 'on'){
            URL::forceScheme('https');
        }
    }
}
