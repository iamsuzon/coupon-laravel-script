<?php


namespace App\PageBuilder\Addons\Home\Home03;

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


class HomePageSpecialDealsStyleThree extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'home/home-03/home-3-special-deals.png';
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
                'name' => 'button_text' . $lang->slug,
                'label' => __('Button Text'),
                'value' => $widget_saved_values['button_text' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'see_all_text' . $lang->slug,
                'label' => __('See All Button Text'),
                'value' => $widget_saved_values['see_all_text' . $lang->slug] ?? null,
            ]);

            $output .= $this->admin_language_tab_content_end();

        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

        $output .= Text::get([
            'name' => 'see_all_link',
            'label' => __('See All Button Link'),
            'value' => $widget_saved_values['see_all_link'] ?? '#',
        ]);

        $products = Product::where('status', 'publish')->pluck('title', 'id')->toArray();

        $output .= NiceSelect::get([
            'multiple'=> true,
            'name' => 'products',
            'label' => __('Select Some Products'),
            'options' => $products,
            'value' => $widget_saved_values['products'] ?? null,
            'info' => __('Select products or leave empty to show all')
        ]);

        $output .= Select::get([
            'name' => 'order_by',
            'label' => __('Order By'),
            'options' => [
                'id' => __('ID'),
                'created_at' => __('Date'),
            ],
            'value' => $widget_saved_values['order_by'] ?? 'id',
            'info' => __('set order by')
        ]);
        $output .= Select::get([
            'name' => 'order',
            'label' => __('Order'),
            'options' => [
                'asc' => __('Accessing'),
                'desc' => __('Decreasing'),
            ],
            'value' => $widget_saved_values['order'] ?? 'DESC',
            'info' => __('set order')
        ]);

        $output .= Text::get([
            'name' => 'limit',
            'label' => __('Limit Deals'),
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
        $current_lang = LanguageHelper::user_lang_slug();
        $data['title'] = SanitizeInput::esc_html($this->setting_item('title_' . $current_lang));
        $data['products'] = $this->setting_item('products');
        $data['button_text'] = $this->setting_item('button_text' . $current_lang);
        $data['see_all_text'] = $this->setting_item('see_all_text' . $current_lang);
        $data['see_all_link'] = $this->setting_item('see_all_link');

        $limit = $this->setting_item('limit');
        $order_by = $this->setting_item('order_by');
        $order = $this->setting_item('order');

        $all_deals = Product::with('category','brand','coupon')->where(['status' => 'publish']);

        if ($data['products'])
        {
            $all_deals->whereIn('id', $data['products']);
        }

        if(!empty($limit)){
            $data['deals'] = $all_deals->orderBy($order_by, $order)->take($limit)->get();
        }else{
            $data['deals'] = $all_deals->orderBy($order_by, $order)->take(3)->get();
        }

        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top') ?? '');
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom') ?? '');

        return self::view_render('home.home_page_special_deals_style_three', $data);
    }


    public function addon_title()
    {
        return __('Home Page Special Deals: 01');
    }
}