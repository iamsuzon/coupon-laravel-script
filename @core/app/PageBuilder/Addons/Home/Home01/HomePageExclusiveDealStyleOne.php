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
use App\ProductBrand;
use App\ProductCategory;
use Illuminate\Support\Facades\Cache;


class HomePageExclusiveDealStyleOne extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'home/home-01/home-1-exclusive-deals.png';
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

        $products = Product::usingLocale(LanguageHelper::default_slug())->where(['status' => 'publish'])->get()->pluck('title', 'id')->toArray();

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
                'name' => 'button_1_text' . $lang->slug,
                'label' => __('Button 1 Text'),
                'value' => $widget_saved_values['button_1_text'  . $lang->slug] ?? '',
            ]);

            $output .= Text::get([
                'name' => 'button_2_text' . $lang->slug,
                'label' => __('Button 2 Text'),
                'value' => $widget_saved_values['button_2_text' . $lang->slug] ?? '',
            ]);

            $output .= $this->admin_language_tab_content_end();

        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

        $output .= NiceSelect::get([
            'multiple'=> true,
            'name' => 'products',
            'label' => __('Select Some Products'),
            'placeholder' => __('Select Products'),
            'options' => $products,
            'value' => $widget_saved_values['products'] ?? null,
            'info' => __('you can select your desired products or leave it empty')
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
        $data['button_1_text'] = SanitizeInput::esc_html($this->setting_item('button_1_text' . $current_lang));
        $data['button_2_text'] = SanitizeInput::esc_html($this->setting_item('button_2_text' . $current_lang));

        $product_ids = $this->setting_item('products') ?? null;

        $data['products'] = Cache::remember('all_products', 600, function () use ($product_ids) {
            return Product::with('category','reviews')->where(['status' => 'publish'])
                ->whereIn('id', $product_ids)->get();
        });

        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top') ?? '');
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom') ?? '');

        return self::view_render('home.home_page_exclusive_deal_style_one', $data);
    }


    public function addon_title()
    {
        return __('Home Page Exclusive Deal: 01');
    }
}