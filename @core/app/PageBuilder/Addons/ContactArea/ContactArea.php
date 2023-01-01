<?php

namespace App\PageBuilder\Addons\ContactArea;

use App\FormBuilder;
use App\Helpers\FormBuilderCustom;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\Email;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Repeater;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\Helpers\RepeaterField;
use App\PageBuilder\Helpers\Traits\RepeaterHelper;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\PageBuilder\Traits\RenderFrontendView;
use App\TopbarInfo;

class ContactArea extends PageBuilderBase
{
    use RepeaterHelper, LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'contact-page/contacts.png';
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
                'name' => 'title_'.$lang->slug,
                'label' => __('Title'),
                'value' => $widget_saved_values['title_' . $lang->slug] ?? null,
            ]);
            $output .= Text::get([
                'name' => 'title_2_'.$lang->slug,
                'label' => __('Title 2'),
                'value' => $widget_saved_values['title_2_' . $lang->slug] ?? null,
            ]);
            $output .= Textarea::get([
                'name' => 'address_'.$lang->slug,
                'label' => __('Address'),
                'value' => $widget_saved_values['address_' . $lang->slug] ?? null,
            ]);
            $output .= $this->admin_language_tab_content_end();
        }

        $output .= $this->admin_language_tab_end(); //have to end language tab

        $output .= Text::get([
            'name' => 'phone',
            'label' => __('Phone'),
            'value' => $widget_saved_values['phone'] ?? null,
        ]);

        $output .= Email::get([
            'name' => 'email',
            'label' => __('Email'),
            'value' => $widget_saved_values['email'] ?? null,
        ]);

        $output .= Repeater::get([
            'multi_lang' => true,
            'settings' => $widget_saved_values,
            'id' => 'contact_page_contact_info',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'link',
                    'label' => __('Link')
                ],
                [
                    'type' => RepeaterField::ICON_PICKER,
                    'name' => 'icon',
                    'label' => __('Icon'),
                ],

            ]
        ]);


        $output .= Select::get([
           'name' => 'custom_form_id',
           'label' => __('Custom Form'),
           'placeholder' => __('Select form'),
           'options' => FormBuilder::all()->pluck('title','id')->toArray(),
           'value' =>   $widget_saved_values['custom_form_id'] ?? []
        ]);

        $output .= Text::get([
            'name' => 'location',
            'label' => __('Google Map Location'),
            'value' => $widget_saved_values['location'] ?? null,
        ]);
        $output .= Slider::get([
            'name' => 'map_height',
            'label' => __('Map Height'),
            'value' => $widget_saved_values['map_height'] ?? 500,
            'max' => 2000,
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
        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom'));
        $data['custom_form_id'] = SanitizeInput::esc_html($this->setting_item('custom_form_id'));
        $data['title'] = SanitizeInput::esc_html($this->setting_item('title_' . $current_lang));
        $data['title_2'] = SanitizeInput::esc_html($this->setting_item('title_2_' . $current_lang));
        $data['address'] = SanitizeInput::esc_html($this->setting_item('address_' . $current_lang));

        $data['phone'] = $this->setting_item('phone');
        $data['email'] = strtolower($this->setting_item('email'));

        $data['top_cards'] = [
            'link' => $all_settings['contact_page_contact_info']['link_'.$current_lang] ?? [],
            'icon' => $all_settings['contact_page_contact_info']['icon_'.$current_lang] ?? [],
        ];

        $form_details = FormBuilder::find($data['custom_form_id']);
        $data['form'] = FormBuilderCustom::render_form(optional($form_details)->id,null,null,'btn-default');

        $location = SanitizeInput::esc_html($this->setting_item('location'));
        $map_height = SanitizeInput::esc_html($this->setting_item('map_height'));

        $data['location'] =  sprintf(
            '<iframe frameborder="0" scrolling="no" marginheight="0" height="'.$map_height.'px" marginwidth="0" src="https://maps.google.com/maps?q=%s&amp;t=m&amp;z=%d&amp;output=embed&amp;iwloc=near" aria-label="%s"></iframe>',
            rawurlencode($location),
            10,
            $location
        );

        return self::view_render('contact.contact_area_top', $data);
    }

    public function addon_title()
    {
        return __('Contact Area');
    }




}