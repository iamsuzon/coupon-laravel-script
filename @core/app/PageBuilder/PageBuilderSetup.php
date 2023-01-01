<?php


namespace App\PageBuilder;


use App\PageBuilder;

class PageBuilderSetup
{
    private static function registerd_widgets(): array
    {
        //check module wise widget by set condition
        return [
            PageBuilder\Addons\ContactArea\ContactArea::class,
            PageBuilder\Addons\Common\CustomFormStyleOne::class,
            PageBuilder\Addons\Common\GoogleMap::class,
            PageBuilder\Addons\Common\Advertise::class,
            PageBuilder\Addons\AboutArea\AboutSectionStyleOne::class,
            PageBuilder\Addons\Faq\FaqStyleOne::class,
            PageBuilder\Addons\Common\BreakingNews::class,
            PageBuilder\Addons\Common\AuthorsFeedback::class,
            PageBuilder\Addons\Common\BrandsPartners::class,
            PageBuilder\Addons\Common\BannerTwo::class,
            PageBuilder\Addons\Blog\BlogGridOne::class,
            PageBuilder\Addons\Common\AdvertiseTwo::class,
            PageBuilder\Addons\AboutArea\AboutSectionOurStory::class,
            PageBuilder\Addons\AboutArea\AboutSectionCounter::class,
            PageBuilder\Addons\AboutArea\AboutSectionBlogNewsUpdate::class,
            PageBuilder\Addons\AboutArea\AboutSectionFaq::class,
            PageBuilder\Addons\Home\Home01\HomePageHeaderSectionStyleOne::class,
            PageBuilder\Addons\Home\Home01\HomePagePopularCategoriesStyleOne::class,
            PageBuilder\Addons\Home\Home01\HomePageFeaturedBrandsStyleOne::class,
            PageBuilder\Addons\Home\Home01\HomePageFeaturedLocation::class,
            PageBuilder\Addons\Home\Home01\HomePageRecentDealsStyleOne::class,
            PageBuilder\Addons\Home\Home01\HomePageExclusiveDealStyleOne::class,
            PageBuilder\Addons\Home\Home02\HomePageHeaderSectionStyleTwo::class,
            PageBuilder\Addons\Home\Home02\HomePageFeaturedProductStyleTwo::class,
            PageBuilder\Addons\Home\Home02\HomePagePopularCategoriesStyleTwo::class,
            PageBuilder\Addons\Home\Home02\HomePageRecentDealsStyleTwo::class,
            PageBuilder\Addons\Home\Home02\HomePageFeaturedBrandsStyleTwo::class,
            PageBuilder\Addons\Home\Home02\HomePageCustomerFeedbackStyleOne::class,
            PageBuilder\Addons\Home\Home02\HomePageCustomerFeedbackStyleTwo::class,
            PageBuilder\Addons\Home\Home03\HomePageHeaderSectionStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageFeaturedProductStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageThreeBanner::class,
            PageBuilder\Addons\Home\Home03\HomePagePopularCategoriesStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageRecentDealsStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageFeaturedBrandsStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageCustomerFeedbackStyleThree::class,
            PageBuilder\Addons\Blog\BlogGridOTwo::class,
            PageBuilder\Addons\Home\Home01\HomePagePopularOffer::class,
            PageBuilder\Addons\Home\Home02\HomePagePopularDealStyleTwo::class,
            PageBuilder\Addons\Home\Home03\HomePagePopularBrandDealsStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageSpecialDealsStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageHighlightDealStyleThree::class,
            PageBuilder\Addons\Home\Home03\HomePageFeaturedLocationStyleThree::class,
            PageBuilder\Addons\Home\Home02\HomePageFeaturedLocationStyleTwo::class,

        ];
    }

    public static function get_admin_panel_widgets(): string
    {
        $widgets_markup = '';
        $widget_list = self::registerd_widgets();
        foreach ($widget_list as $widget){
            try {
                $widget_instance = new  $widget();
            }catch (\Exception $e){
                $msg = $e->getMessage();
                throw new \ErrorException($msg);
            }
            if ($widget_instance->enable()){
                $widgets_markup .= self::render_admin_addon_item([
                    'addon_name' => $widget_instance->addon_name(),
                    'addon_namespace' => $widget_instance->addon_namespace(), // new added
                    'addon_title' => $widget_instance->addon_title(),
                    'preview_image' => $widget_instance->get_preview_image($widget_instance->preview_image())
                ]);
            }

        }
        return $widgets_markup;
    }

    private static function render_admin_addon_item($args): string
    {
        return '<li class="ui-state-default widget-handler" data-name="'.$args['addon_name'].'" data-namespace="'.base64_encode($args['addon_namespace']).'">
                    <h4 class="top-part"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.$args['addon_title'].$args['preview_image'].'</h4>
                </li>';
    }
    public static function render_widgets_by_name_for_admin($args){
        $widget_class = $args['namespace'];
        $instance = new $widget_class($args);
        if ($instance->enable()){
            return $instance->admin_render();
        }
    }

    public static function render_widgets_by_name_for_frontend($args){
        $widget_class = $args['namespace'];
        $instance = new $widget_class($args);
        if ($instance->enable()){
            return $instance->frontend_render();
        }
    }

    public static function render_frontend_pagebuilder_content_by_location($location): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_location' => $location])->orderBy('addon_order', 'ASC')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_frontend([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
                'location' => $location,
                'id' => $widget->id,
                'column' => $args['column'] ?? false
            ]);
        }
        return $output;
    }

    public static function get_saved_addons_by_location($location): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_location' => $location])->orderBy('addon_order','asc')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_admin([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
                'id' => $widget->id,
                'type' => 'update',
                'order' => $widget->addon_order,
                'page_type' => $widget->addon_page_type,
                'page_id' => $widget->addon_page_id,
                'location' => $widget->addon_location
            ]);
        }

        return $output;
    }
    public static function get_saved_addons_for_dynamic_page($page_type,$page_id): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_page_type' => $page_type,'addon_page_id' => $page_id])->orderBy('addon_order','asc')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_admin([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
                'id' => $widget->id,
                'type' => 'update',
                'order' => $widget->addon_order,
                'page_type' => $widget->addon_page_type,
                'page_id' => $widget->addon_page_id,
                'location' => $widget->addon_location
            ]);
        }

        return $output;
    }
    public static function render_frontend_pagebuilder_content_for_dynamic_page($page_type,$page_id): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_page_type' => $page_type,'addon_page_id' => $page_id])->orderBy('addon_order','asc')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_frontend([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
//                'location' => $location,
                'id' => $widget->id,
                'column' => $args['column'] ?? false
            ]);
        }
        return $output;
    }
}