<?php


namespace App\PageBuilder\Addons\Home\Home02;

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


class HomePageCustomerFeedbackStyleTwo extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'home/home-02/home-2-customer-feedback.png';
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
                'name' => 'title_text_' . $lang->slug,
                'label' => __('Title Text'),
                'value' => $widget_saved_values['title_text_' . $lang->slug] ?? null,
            ]);


            $output .= $this->admin_language_tab_content_end();
        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

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
            'name' => 'item_show',
            'label' => __('Item Show'),
            'value' => $widget_saved_values['item_show'] ?? null,
        ]);

        $output .= Select::get([
            'name' => 'rating_show',
            'label' => __('Limit Rating'),
            'options' => [
                '1' => __('1 Star'),
                '2' => __('2 Star'),
                '3' => __('3 Star'),
                '4' => __('4 Star'),
                '5' => __('5 Star')
            ],
            'value' => $widget_saved_values['rating_show'] ?? null,
            'info' => __('Star rating will be shown selected number to five star')
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
        $current_lang = LanguageHelper::user_lang_slug();
        $data['title'] = SanitizeInput::esc_html($this->setting_item('title_text_' . $current_lang) ?? '');
        $item_show = SanitizeInput::esc_html($this->setting_item('item_show') ?? '');
        $rating_show = SanitizeInput::esc_html($this->setting_item('rating_show'));
        $order_by = SanitizeInput::esc_html($this->setting_item('order_by'));
        $order = SanitizeInput::esc_html($this->setting_item('order'));
        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $review = ProductReview::query();
        $review = $review->where('rating', '>=', $rating_show)->orderBy($order_by, $order);

        if (!empty($item_show)) {
            $data['review'] = $review->take($item_show)->get();
        } else {
            $data['review'] = $review->get();
        }

        return self::view_render('home.home_page_customer_review_style_two', $data);
    }

    public function addon_title()
    {
        return __('Customers Feedback: 02');
    }
}