<?php


namespace App\WidgetsBuilder\Widgets;

use App\Blog;
use App\BlogCategory;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\Language;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\NiceSelect;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Summernote;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\Widgets;
use App\WidgetsBuilder\WidgetBase;
use Illuminate\Support\Str;

class NewsletterWidgetOne extends WidgetBase
{
    use LanguageFallbackForPageBuilder;

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
                'name' => 'title_'.$lang->slug,
                'label' => __('Title'),
                'value' => $widget_saved_values['title_' . $lang->slug] ?? null,
            ]);

            $output .= $this->admin_language_tab_content_end();
        }

        $options = ['option 1', 'option 2'];

        $output .= Select::get([
            'name' => 'style',
            'label' => __('Newsletter Button Color Style'),
            'options' => [
                '1' => __('Style 1'),
                '2' => __('Style 2'),
            ],
            'value' => $widget_saved_values['style'] ?? null,
            'info' => __('set newsletter button color style')
        ]);

        $output .= $this->admin_language_tab_end(); //have to end language tab

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $settings = $this->get_settings();
        $user_selected_language = get_user_lang();
        $newsletter_style = SanitizeInput::esc_html($this->setting_item('style'));
        $widget_title = purify_html($settings['title_' . $user_selected_language] ?? '');
        $form_action = route('frontend.subscribe.newsletter');
        $subscribe_text = __('Subscribe');
        $placeholder_text = __('Email Address');
        $csrf = csrf_token();

        if ($newsletter_style == 1)
        {
            $button_markup = <<<HTML
<button type="submit" class="btn-default" id="subscribe_btn"><i class="lab la-telegram-plane"></i></button>
HTML;

        } else {
            $button_markup = <<<HTML
<button type="submit" class="btn-default main-color-two" id="subscribe_btn"><i class="lab la-telegram-plane"></i></button>
HTML;
        }

        $output = $this->widget_before();

        $output .= <<<HTML
                        <div class="footer-widget">
                            <h4 class="widget-title">{$widget_title}</h4>
                            <div class="subscriber-form">
                                <div id="alert-box"></div>
                                <form action="{$form_action}" class="email-subscribe">
                                    <input type="hidden" name="_token" value="{$csrf}">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control news_email" placeholder="{$placeholder_text}">
                                        <div class="btn-wrapper">
                                            {$button_markup}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
HTML;

    $output .= $this->widget_after();

    return $output;
 }

    public function widget_title()
    {
        return __('Newsletter : 01');
    }
}