<?php


namespace App\PageBuilder\Addons\Home\Home02;
use App\Faq;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\ColorPicker;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Notice;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Summernote;
use App\PageBuilder\Fields\Switcher;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\PageBuilder\Traits\RenderFrontendView;


class HomePageHeaderSectionStyleTwo extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'home/home-02/home-2-header.png';
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
                'name' => 'title_1' . $lang->slug,
                'label' => __('Title 1'),
                'value' => $widget_saved_values['title_1' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'title_2' . $lang->slug,
                'label' => __('Title 2'),
                'value' => $widget_saved_values['title_2' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'subtitle_' . $lang->slug,
                'label' => __('Subtitle'),
                'value' => $widget_saved_values['subtitle_' . $lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'button_text_' . $lang->slug,
                'label' => __('Search Button Text'),
                'value' => $widget_saved_values['button_text_'.$lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'search_placeholder_' . $lang->slug,
                'label' => __('Search Field Text'),
                'value' => $widget_saved_values['search_placeholder_'.$lang->slug] ?? null,
            ]);

            $output .= $this->admin_language_tab_content_end();

        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

        $output .= Switcher::get([
            'name' => 'search_box_status',
            'label' => __('Show/Hide Search Box'),
            'value' => $widget_saved_values['search_box_status'] ?? null,
            'info' => __('your can show/hide search box'),
        ]);

        $output .= Image::get([
            'name' => 'image',
            'label' => __('Image'),
            'value' => $widget_saved_values['image'] ?? null,
            'dimensions' => '480 x 634px'
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
        $current_lang = LanguageHelper::user_lang_slug();
        $data['title_1'] = SanitizeInput::esc_html($this->setting_item('title_1' . $current_lang));
        $data['title_2'] = SanitizeInput::esc_html($this->setting_item('title_2' . $current_lang));
        $data['subtitle'] = SanitizeInput::esc_html($this->setting_item('subtitle_' . $current_lang));
        $data['search_box_text'] = SanitizeInput::esc_html($this->setting_item('search_placeholder_' . $current_lang) ?? '');
        $data['button_text'] = SanitizeInput::esc_html($this->setting_item('button_text_' . $current_lang) ?? '');
        $data['search_box_status'] = $this->setting_item('search_box_status') ?? '';
        $data['background_image'] = SanitizeInput::esc_html($this->setting_item('background_image'));
        $data['image'] = SanitizeInput::esc_html($this->setting_item('image'));

        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top') ?? '');
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom') ?? '');

        return self::view_render('home.home_page_header_style_two', $data);
    }



    public function addon_title()
    {
        return __('Home Page Header: 02');
    }
}