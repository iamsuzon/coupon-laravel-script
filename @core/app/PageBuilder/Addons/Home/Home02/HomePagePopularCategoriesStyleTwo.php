<?php


namespace App\PageBuilder\Addons\Home\Home02;

use App\Blog;
use App\BlogCategory;
use App\Faq;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\ColorPicker;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\NiceSelect;
use App\PageBuilder\Fields\Notice;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Repeater;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Summernote;
use App\PageBuilder\Fields\Switcher;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\Helpers\RepeaterField;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\PageBuilder\Traits\RenderFrontendView;
use App\ProductCategory;
use Illuminate\Support\Facades\Cache;


class HomePagePopularCategoriesStyleTwo extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'home/home-02/home-2-popular-categories.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= $this->admin_language_tab(); //have to start language tab from here on
        $output .= $this->admin_language_tab_start();
        $all_languages = LanguageHelper::all_languages();

        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);

            $output .= Text::get([
                'name' => 'title_' . $lang->slug,
                'label' => __('Title'),
                'value' => $widget_saved_values['title_' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'view_all_text' . $lang->slug,
                'label' => __('View All Button Text'),
                'value' => $widget_saved_values['view_all_text' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'view_all_link' . $lang->slug,
                'label' => __('View All Button Link'),
                'value' => $widget_saved_values['view_all_link' . $lang->slug] ?? '#',
            ]);

            $output .= $this->admin_language_tab_content_end();

        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

        $product_categories = ProductCategory::usingLocale(LanguageHelper::default_slug())->where(['status' => 'publish'])->get()->pluck('title', 'id')->toArray();

        $output .= Select::get([
            'name' => 'order_by',
            'label' => __('Order By'),
            'options' => [
                'id' => __('ID'),
                'created_at' => __('Date'),
            ],
            'value' => $widget_saved_values['order_by'] ?? null,
            'info' => __('set order by')
        ]);
        $output .= Select::get([
            'name' => 'order',
            'label' => __('Order'),
            'options' => [
                'asc' => __('Accessing'),
                'desc' => __('Decreasing'),
            ],
            'value' => $widget_saved_values['order'] ?? null,
            'info' => __('set order')
        ]);

        $output .= Text::get([
            'name' => 'limit',
            'label' => __('Limit Categories'),
            'value' => $widget_saved_values['limit'] ?? null,
        ]);

        $output .= Slider::get([
            'name' => 'padding_top',
            'label' => __('Padding Top'),
            'value' => $widget_saved_values['padding_top'] ?? 110,
            'max' => 200,
        ]);
        $output .= Slider::get([
            'name' => 'padding_bottom',
            'label' => __('Padding Bottom'),
            'value' => $widget_saved_values['padding_bottom'] ?? 110,
            'max' => 200,
        ]);

        // add padding option

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $data = [];
        $all_settings = $this->get_settings();
        $current_lang = LanguageHelper::user_lang_slug();
        $data['title'] = SanitizeInput::esc_html($this->setting_item('title_' . $current_lang));
        $data['view_all_text'] = SanitizeInput::esc_html($this->setting_item('view_all_text' . $current_lang));
        $data['view_all_link'] = SanitizeInput::esc_html($this->setting_item('view_all_link' . $current_lang));

        $order_by = SanitizeInput::esc_html($this->setting_item('order_by'));
        $order = SanitizeInput::esc_html($this->setting_item('order'));
        $limit = SanitizeInput::esc_html($this->setting_item('limit'));


        $all_category = ProductCategory::query();


        if(!empty($limit)){
            $data['categories'] = $all_category->whereHas('products')->withCount('products')->where('status', 'publish')
                ->whereHas('products')->orderBy($order_by, $order)->take($limit)->get();
        }else{
            $data['categories'] = $all_category->whereHas('products')->withCount('products')->where('status', 'publish')
                ->whereHas('products')->orderBy($order_by, $order)->take(4)->get();
        }

        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top') ?? '');
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom') ?? '');

        return self::view_render('home.home_page_popular_categories_style_two', $data);
    }


    public function addon_title()
    {
        return __('Home Page Popular Categories: 02');
    }
}