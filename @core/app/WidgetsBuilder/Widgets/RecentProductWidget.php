<?php


namespace App\WidgetsBuilder\Widgets;

use App\Blog;
use App\Language;
use App\Menu;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\Product;
use App\WidgetsBuilder\WidgetBase;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class RecentProductWidget extends WidgetBase
{
    use LanguageFallbackForPageBuilder;

    /**
     * @inheritDoc
     */
    public function admin_render()
    {
        // TODO: Implement admin_render() method.
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        //render language tab
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        $all_languages = Language::all();
        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);
            $widget_title = $widget_saved_values['widget_title_' . $lang->slug] ?? '';
            $output .= '<div class="form-group"><input type="text" name="widget_title_' . $lang->slug . '" class="form-control" placeholder="' . __('Widget Title') . '" value="' . purify_html($widget_title) . '"></div>';

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();
        //end multi langual tab option
        $post_items = $widget_saved_values['post_items'] ?? '';
        $output .= '<div class="form-group"><input type="number" name="post_items" class="form-control" placeholder="' . __('Post Items') . '" value="' . $post_items . '"></div>';

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    /**
     * @inheritDoc
     */
    public function frontend_render()
    {
        //Implement frontend_render() method.
        $icon_class = (get_user_lang_direction() == 'rtl') ? 'ml-2' : '';
        $user_selected_language = get_user_lang();
        $widget_saved_values = $this->get_settings();

        $widget_title = purify_html($this->setting_item('widget_title_' . $user_selected_language) ?? '');
        $post_items = $this->setting_item('post_items') ?? 3;

        $products = Product::where(['status' => 'publish'])->orderBy('views', 'DESC')->take($post_items)->get();

        $output = $this->widget_before(); //render widget before content
        $extra_class = 'wow bounceInUp';
        $animation_attr = 'data-wow-duration="1.5s"';
        if ($this->args['location'] === 'footer_three') {
            $extra_class = '';
            $animation_attr = '';
        }
        $output .= ' <div class="footer-widget">';
        if (!empty($widget_title)) {
            $output .= '<h4 class="widget-title">' . purify_html($widget_title) . '</h4>';
        }
        $output .= '<div class="sidebar-contents">';

        foreach ($products as $post) {
            $image_markup = render_image_markup_by_attachment_id($post->image, 'rounded', 'thumb', false);
            $category = optional($post->category)->getTranslation('title', $user_selected_language);
            $category_route = route('frontend.product.category.single', ['slug' => optional($post->category)->slug]);

            $output .= '<div class="recent-contents">
                        <div class="recent-image">'.$image_markup.'</div>
                        <div class="content">
                            <span class="span-title"><a href="' . $category_route . '">' . $category . '</a></span>
                            <h4 class="common-title"><a href="' . route('frontend.product.single', $post->slug) . '">' . purify_html(Str::words($post->getTranslation('title', $user_selected_language), 6)) . '</a></h4>
                        </div>
                    </div>';
        }
        $output .= '</div>';
        $output .= '</div>';

        $output .= $this->widget_after(); // render widget after content
        return $output;
    }

    /**
     * @inheritDoc
     */
    public function widget_title()
    {
        // TODO: Implement widget_title() method.
        return __('Recent Product');
    }
}
