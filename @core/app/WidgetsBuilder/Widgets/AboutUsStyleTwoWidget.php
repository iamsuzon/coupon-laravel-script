<?php

namespace App\WidgetsBuilder\Widgets;


use App\Helpers\LanguageHelper;
use App\Language;
use App\PageBuilder\Fields\Repeater;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\Helpers\RepeaterField;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\Widgets;
use App\WidgetsBuilder\WidgetBase;
use Mews\Purifier\Facades\Purifier;

class AboutUsStyleTwoWidget extends WidgetBase
{
    use LanguageFallbackForPageBuilder;
    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $image_val = $widget_saved_values['site_logo'] ?? '';
        $image_preview = '';
        $image_field_label = __('Upload Image');
        if (!empty($widget_saved_values)) {
            $image_markup = render_image_markup_by_attachment_id($widget_saved_values['site_logo']);
            $image_preview = '<div class="attachment-preview"><div class="thumbnail"><div class="centered">' . $image_markup . '</div></div></div>';
            $image_field_label = __('Change Image');
        }

        $output .= '<div class="form-group"><label for="site_logo"><strong>' . __('Logo') . '</strong></label>';
        $output .= '<div class="media-upload-btn-wrapper"><div class="img-wrap">' . $image_preview . '</div><input type="hidden" name="site_logo" value="' . $image_val . '">';
        $output .= '<button type="button" class="btn btn-info btn-xs media_upload_form_btn" data-btntitle="Select Image" data-modaltitle="Upload Image" data-toggle="modal" data-target="#media_upload_modal">';
        $output .= $image_field_label . '</button></div>';
        $output .= '<small class="form-text text-muted">' . __('allowed image format: jpg,jpeg,png. Recommended image size 160x50') . '</small></div>';
        //start multi langual tab option

        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        $all_languages = Language::all();
        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);

            $output .= Textarea::get([
                'name' => 'text_'. $lang->slug,
                'label' => __('About Text'),
                'value' => $widget_saved_values['text_'. $lang->slug] ?? null,
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $current_lang = LanguageHelper::user_lang_slug() ?? null;
        $widget_saved_values = $this->get_settings();
        $text = $widget_saved_values['text_' . $current_lang] ?? '';
        $image_val = $widget_saved_values['site_logo'] ?? '';
        $foot_logo1 = render_image_markup_by_attachment_id($image_val, '', '', false);
        $root_url = url('/');

  $markup = $this->widget_before();
        $markup .= <<<HTML
    <div class="footer-widget">
        <div class="logo-wrapper">
            <a href="{$root_url}" class="logo">
                {$foot_logo1}
            </a>
        </div>
        <div class="content">
            <p class="info">{$text}</p>
        </div>
    </div>
HTML;
        $markup .= $this->widget_after();

        return $markup;
    }

    public function widget_title()
    {
        return __('About Us : 02');
    }

}