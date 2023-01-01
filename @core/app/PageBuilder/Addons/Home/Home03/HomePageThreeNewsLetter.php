<?php


namespace App\PageBuilder\Addons\Home\Home03;

use App\Facades\InstagramFeed;
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
use App\ProductReview;
use App\Testimonial;


class HomePageThreeNewsLetter extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'home/home-03/subscribe-newsletter-03.jpg';
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
                'label' => __('Title Text'),
                'value' => $widget_saved_values['title_' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'subtitle_' . $lang->slug,
                'label' => __('Subtitle Text'),
                'value' => $widget_saved_values['subtitle_' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'input_text_' . $lang->slug,
                'label' => __('Input Field Placeholder Text'),
                'value' => $widget_saved_values['input_text_' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'button_text_' . $lang->slug,
                'label' => __('Button Text'),
                'value' => $widget_saved_values['button_text_' . $lang->slug] ?? null,
            ]);

            $output .= $this->admin_language_tab_content_end();
        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

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
        $current_lang = LanguageHelper::user_lang_slug();
        $data['title'] = SanitizeInput::esc_html($this->setting_item('title_' . $current_lang) ?? '');
        $data['subtitle'] = SanitizeInput::esc_html($this->setting_item('subtitle_' . $current_lang) ?? '');
        $data['input_text'] = SanitizeInput::esc_html($this->setting_item('input_text_' . $current_lang) ?? '');
        $data['button_text'] = SanitizeInput::esc_html($this->setting_item('button_text_' . $current_lang) ?? 'Subscribe');

        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        return self::view_render('home.home_page_newsletter', $data);
    }

    public function addon_title()
    {
        return __('Newsletter: 01');
    }
}