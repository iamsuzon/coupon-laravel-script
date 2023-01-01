<?php


namespace App\PageBuilder\Addons\Blog;

use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\NiceSelect;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\PageBuilder\Traits\RenderFrontendView;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Cache;

class BlogGridOne extends PageBuilderBase
{
    use LanguageFallbackForPageBuilder, RenderFrontendView;

    public function preview_image()
    {
        return 'blog-page/blog-grid-01.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $all_languages = LanguageHelper::all_languages();

        $categories = Blog::usingLocale(LanguageHelper::default_slug())->where(['status' => 'publish'])->get()->pluck('title', 'id')->toArray();

        $output .= NiceSelect::get([
            'multiple' => true,
            'name' => 'blog',
            'label' => __('Select Some Blogs'),
            'placeholder' => __('Select Blog'),
            'options' => $categories,
            'value' => $widget_saved_values['blog'] ?? null,
            'info' => __('you can select your desired blogs or leave it empty')
        ]);

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
        $output .= Number::get([
            'name' => 'items',
            'label' => __('Items'),
            'value' => $widget_saved_values['items'] ?? null,
            'info' => __('enter how many item you want to show in frontend'),
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

    public function frontend_render() : string
    {
        $data = [];
        $current_lang = LanguageHelper::user_lang_slug();
        $blog = $this->setting_item('blog') ?? null;
        $order_by = SanitizeInput::esc_html($this->setting_item('order_by'));
        $order = SanitizeInput::esc_html($this->setting_item('order'));
        $items = SanitizeInput::esc_html($this->setting_item('items'));
        $data['padding_top'] = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $data['padding_bottom'] = SanitizeInput::esc_html($this->setting_item('padding_bottom'));


        $all_blogs = Blog::query();

        if (!empty($blog) AND !empty($items)) {
            $data['blogs']  = $all_blogs->where('status', 'publish')
                                        ->whereIn('id', $blog)
                                        ->orderBy($order_by, $order)
                                        ->take($items)
                                        ->paginate(9);
        } elseif(!empty($blog)) {
            $data['blogs']  = $all_blogs->where('status', 'publish')
                ->whereIn('id', $blog)
                ->orderBy($order_by, $order)
                ->paginate(9);
        }

        if (!empty($items)) {
            $data['blogs'] = $all_blogs->where('status', 'publish')
                                        ->orderBy($order_by, $order)
                                        ->take($items)->paginate(9);
        } else {
            $data['blogs'] = $all_blogs->where('status', 'publish')
                ->orderBy($order_by, $order)
                ->paginate(9);
        }

        return self::view_render('blog.blog_grid_style_one', $data);
    }

    public function addon_title()
    {
        return __('Blog Grid : 01');
    }
}