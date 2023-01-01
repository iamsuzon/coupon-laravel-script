<?php


namespace App\PageBuilder\Addons\Home\Home01;

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
use App\Product;
use App\ProductCategory;
use Illuminate\Support\Facades\Cache;


class HomePageRecentDealsStyleOne extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'home/home-01/home-1-recent-deals.png';
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

            $output .= $this->admin_language_tab_content_end();

        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

        $categories = ProductCategory::where('status', 'publish')->pluck('title', 'id')->toArray();
        $output .= NiceSelect::get([
            'multiple'=> true,
            'name' => 'category',
            'label' => __('Select Some Category'),
            'options' => $categories,
            'value' => $widget_saved_values['category'] ?? null,
            'info' => __('Select categories to show in all products or leave empty to show all')
        ]);

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
            'name' => 'limit_category',
            'label' => __('Limit Category'),
            'value' => $widget_saved_values['limit_category'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'limit_product',
            'label' => __('Limit Products'),
            'value' => $widget_saved_values['limit_product'] ?? null,
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
        $current_lang = LanguageHelper::user_lang_slug();
        $data['title'] = SanitizeInput::esc_html($this->setting_item('title_' . $current_lang));
        $data['view_all'] = SanitizeInput::esc_html($this->setting_item('view_all_' . $current_lang));
        $data['category'] = $this->setting_item('category') ?? null;

        $order_by = SanitizeInput::esc_html($this->setting_item('order_by'));
        $order = SanitizeInput::esc_html($this->setting_item('order'));
        $limit_category = SanitizeInput::esc_html($this->setting_item('limit_category'));
        $data['limit_product'] = SanitizeInput::esc_html($this->setting_item('limit_product')) ?? null;

        $all_category = ProductCategory::where(['status' => 'publish'])->orderBy($order_by, $order);
        if(!empty($limit)){
            $data['categories'] = $all_category->whereHas('products')->take($limit)->get();
        }else{
            $data['categories'] = $all_category->whereHas('products')->take(6)->get();
        }

        $all_deals = Product::where(['status' => 'publish']);

        if ($data['category'])
        {
            $all_deals->whereIn('category_id', $data['category']);
        }

        if(!empty($data['limit_product'])){
            $data['deals'] = $all_deals->orderBy($order_by, $order)->take($data['limit_product'])->get();
        }else{
            $data['deals'] = $all_deals->orderBy($order_by, $order)->take(8)->get();
        }

        $data['get_recent_products_ajax'] = route('frontend.get.products.by.ajax', 1);

        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top') ?? '');
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom') ?? '');

        return self::view_render('home.home_page_recent_deals', $data);
    }


    public function addon_title()
    {
        return __('Home Page Recent Deals: 01');
    }
}