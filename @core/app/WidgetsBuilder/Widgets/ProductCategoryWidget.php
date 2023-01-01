<?php


namespace App\WidgetsBuilder\Widgets;


use App\Blog;
use App\BlogCategory;
use App\EventCategory;
use App\Language;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Text;
use App\Product;
use App\ProductCategory;
use App\WidgetsBuilder\WidgetBase;
use Illuminate\Support\Str;

class ProductCategoryWidget extends WidgetBase
{

    public function admin_render()
    {
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
            $output .= '<div class="form-group"> <label>' .__('Widget Title').' </label><input type="text" name="widget_title_' . $lang->slug . '" class="form-control" placeholder="' . __('Widget Title') . '" value="' . $widget_title . '"></div>';

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();
        //end multi langual tab option

        $output .= Number::get([
            'name' => 'category_items',
            'label' => __('Category Items'),
            'value' => $widget_saved_values['category_items'] ?? null,
        ]);



        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $settings = $this->get_settings();
        $user_selected_language = get_user_lang();
        $widget_title = purify_html($settings['widget_title_' . $user_selected_language]);
        $category_items = $settings['category_items'] ?? '';

        $product_categories = ProductCategory::withCount('products')->where('status','publish')->whereHas('products')->orderBy('id', 'DESC')->take($category_items)->get();

        $category_markup = '';
        foreach ($product_categories as $item){
            $title = purify_html($item->getTranslation('title',$user_selected_language));
            $category_image = render_image_markup_by_attachment_id($item->image, 'sidebar_category_image', 'thumb',false);
            $url = route('frontend.product.category.single', $item->slug);
            $count = $item->products_count;


$category_markup.=  <<<LIST
      <li class="single-item">
        <span class="wrap">
            <a href="{$url}" class="left-content">
                {$category_image}
                {$title}
            </a>
            <a href="{$url}" class="right-content ml-3">
                <span class="count">({$count})</span>
            </a>
        </span>
    </li>

LIST;

}

  return <<<HTML

    <div class="widget">
        <div class="category style-02 border-round">
            <h4 class="widget-title style-03">{$widget_title}</h4>
            <ul class="widget-category-list round-pic catPadding ">
                {$category_markup}
            </ul>
        </div>
    </div>

      

HTML;
    }

    public function widget_title()
    {
        return __('Product Category : 01');
    }
}