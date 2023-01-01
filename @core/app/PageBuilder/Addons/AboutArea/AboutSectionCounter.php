<?php


namespace App\PageBuilder\Addons\AboutArea;


use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Repeater;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Summernote;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\Helpers\RepeaterField;
use App\PageBuilder\Helpers\Traits\RepeaterHelper;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\PageBuilder\Traits\RenderFrontendView;
use Illuminate\Support\Str;

class AboutSectionCounter extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'about-section/about-03.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= Repeater::get([
            'multi_lang' => true,
            'settings' => $widget_saved_values,
            'id' => 'about_page_counter',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'title',
                    'label' => __('Title'),
                    'placeholder' => __('example: Happy Clients')
                ],
                [
                    'type' => RepeaterField::NUMBER,
                    'name' => 'number',
                    'label' => __('Number'),
                    'placeholder' => __('example: 1000')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'extra_field',
                    'label' => __('Extra Field'),
                    'placeholder' => __('example: k / + / K+')
                ],
            ]
        ]);

        $output .= Slider::get([
            'name' => 'padding_top',
            'label' => __('Padding Top'),
            'value' => $widget_saved_values['padding_top'] ?? 120,
            'max' => 500,
        ]);
        $output .= Slider::get([
            'name' => 'padding_bottom',
            'label' => __('Padding Bottom'),
            'value' => $widget_saved_values['padding_bottom'] ?? 120,
            'max' => 500,
        ]);

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render(): string
    {
        $all_settings = $this->get_settings();
        $current_lang = LanguageHelper::user_lang_slug();
        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top') ?? '');
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom') ?? '');

        $data['about_page_counter'] = [
            'title' => $all_settings['about_page_counter']['title_'.LanguageHelper::user_lang_slug()] ?? [],
            'number' => $all_settings['about_page_counter']['number_'.LanguageHelper::user_lang_slug()] ?? [],
            'extra_field' => $all_settings['about_page_counter']['extra_field_'.LanguageHelper::user_lang_slug()] ?? [],
        ];

        return self::view_render('about.about_counter', $data);

    }

    public function addon_title()
    {
        return __('About Area Counter');
    }
}