<?php


namespace App\PageBuilder\Addons\Common;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\PageBuilder\Traits\RenderFrontendView;
use App\ProductCategory;

class BannerTwo extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
       return 'common/banner-02.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();


        $output .= Image::get([
            'name' => 'image',
            'label' => __('Banner'),
            'value' => $widget_saved_values['image'] ?? null,
        ]);
        $output .= Text::get([
            'name' => 'image_url',
            'label' => __(' Banner Url'),
            'value' => $widget_saved_values['image_url'] ?? null,
        ]);

        $output .= Slider::get([
            'name' => 'padding_top',
            'label' => __('Padding Top'),
            'value' => $widget_saved_values['padding_top'] ?? 60,
            'max' => 200,
        ]);
        $output .= Slider::get([
            'name' => 'padding_bottom',
            'label' => __('Padding Bottom'),
            'value' => $widget_saved_values['padding_bottom'] ?? 60,
            'max' => 200,
        ]);


        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $settings = $this->get_settings();
        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom'));
        $data['image_id'] = SanitizeInput::esc_html($this->setting_item('image'));
        $data['image_url'] = SanitizeInput::esc_html($this->setting_item('image_url'));

   return self::view_render('banner.banner', $data);

    }

    public function addon_title()
    {
        return __('Banner: 01');
    }
}