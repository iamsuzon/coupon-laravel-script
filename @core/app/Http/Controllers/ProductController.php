<?php

namespace App\Http\Controllers;

use App\Actions\Blog\BlogAction;
use App\Actions\Product\ProductAction;
use App\Advertisement;
use App\Blog;
use App\Helpers\DataTableHelpers\General;
use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\MetaData;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductLocation;
use App\ProductReview;
use App\ProductSingleSetiings;
use App\ProductSingleSettings;
use App\ProductTag;
use App\ReviewReply;
use App\Tag;
use App\UserWishlist;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    private const BASE_PATH = 'backend.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:appearance-menubar-settings',['only'=>['menubar_settings','update_menubar_settings']]);
        $this->middleware('permission:appearance-home-variant',['only'=>['home_variant','update_home_variant']]);
        $this->middleware('permission:product-list',['only'=>['index']]);
        $this->middleware('permission:product-create',['only'=>['new_product','store_new_product','clone_product']]);
        $this->middleware('permission:product-edit|product-update',['only'=>['edit_product','update_product']]);
        $this->middleware('permission:product-delete',['only'=>['delete_product_all_lang','bulk_action_product']]);
        $this->middleware('permission:product-trashed-list',['only'=>['trashed_products']]);
        $this->middleware('permission:product-trashed-delete|product-trashed-restore',['only'=>['restore_trashed_product','delete_trashed_product','trashed_bulk_action_product']]);
        $this->middleware('permission:product-settings',['only'=>['product_single_settings','product_single_settings_update']]);
    }

    public function index(Request $request)
    {
        $default_lang = $request->lang ?? LanguageHelper::default_slug();

        if ($request->ajax()) {

            $data = Product::usingLocale($default_lang)->select('*')->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('author', function ($row) {
                    return $row->author_data()->name ?? __('Anonymous');
                })
                ->addColumn('views', function ($row) {
                    return $row->views ?? 0;
                })
                ->addColumn('title', function ($row) use ($default_lang) {
                    $video_post = $row->video_url ? '<span class="badge badge-primary ml-2">' . __("Video Post") . '</span>' : '';
                    $gallery_post = strlen($row->image_gallery) ? '<span class="badge badge-warning ml-2">' . __("Gallery Post") . '</span>' : '';

                    return $row->getTranslation('title', $default_lang, true) . $video_post . $gallery_post;
                })
                ->addColumn('image', function ($row) use ($default_lang) {
                    return General::image($row->image);
                })
                ->addColumn('category_id', function ($row) use ($default_lang) {
                    $color = ['badge-primary', 'badge-danger', 'badge-warning', 'badge-info', 'badge-success'];
                    return '<span class="badge badge-primary">' . optional($row->category)->getTranslation('title', $default_lang) . '</span>';
                })
                ->addColumn('status', function ($row) {
                    return General::statusSpan($row->status);
                })
                ->addColumn('date', function ($row) {
                    return date_format($row->created_at, 'd-M-Y');
                })
                ->addColumn('action', function ($row) use ($default_lang) {
                    $action = '';
                    $action .= General::viewIcon(route('frontend.product.single', $row->slug));
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('product-delete')) {
                        $action .= General::deletePopover(route('admin.product.delete.all.lang', $row->id));
                    }
                    if ($admin->can('product-edit')) {
                        $action .= General::editIcon(route('admin.product.edit', $row->id) . '?lang=' . $default_lang);
                        $action .= General::cloneIcon(route('admin.product.clone'), $row->id);
                    }

                    if ($row->created_by == 'user' && $row->status == 'pending') {
                        $action .= General::blogApprove($row->id);
                    }

                    return $action;
                })
                ->rawColumns(['action', 'checkbox', 'image', 'status', 'category_id', 'title'])
                ->make(true);
        }

        return view(self::BASE_PATH . 'product.index', compact('default_lang'));
    }

    public function new_product(Request $request)
    {
        $all_category = ProductCategory::all();
        $all_tags = ProductTag::all();
        $all_brands = ProductBrand::all();
        $all_locations = ProductLocation::all();

        return view(self::BASE_PATH . 'product.new-product')->with([
            'all_category' => $all_category,
            'all_tags' => $all_tags,
            'all_brands' => $all_brands,
            'all_locations' => $all_locations,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function store_new_product(Request $request, ProductAction $productAction): RedirectResponse
    {
        $rule = [
            'title' => 'required',
            'description' => 'required',
            'regular_price' => 'numeric|required',
            'sale_price' => 'numeric|required',
            'discount' => 'numeric|nullable',
            'coupon_code' => 'required',
            'image' => 'required',
        ];

        $this->validate($request, $rule);

        $productAction->store_execute($request);
        return back()->with(FlashMsg::item_new('Product Created Successfully..'));
    }

    public function clone_product(Request $request, ProductAction $productAction)
    {
        $productAction->clone_product_execute($request);
        return back()->with(FlashMsg::item_clone('Product Cloned..'));
    }

    public function edit_product(Request $request, $id)
    {
        $product_post = Product::find($id);
        $all_category = ProductCategory::select(['id', 'title'])->get();
        $all_tags = ProductTag::select(['id', 'name'])->get();
        $all_brands = ProductBrand::select(['id', 'title'])->get();
        $all_locations = ProductLocation::select(['id', 'city_name', 'state_name'])->get();

        return view(self::BASE_PATH . 'product.edit-product')->with([
            'all_category' => $all_category,
            'all_tags' => $all_tags,
            'all_brands' => $all_brands,
            'product_post' => $product_post,
            'all_locations' => $all_locations,
            'default_lang' => $request->lang ?? LanguageHelper::default_slug(),
        ]);
    }

    public function update_product($id, Request $request, ProductAction $productAction): RedirectResponse
    {
        $rule = [
            'title' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'discount' => 'numeric|nullable',
            'coupon_code' => 'required',
            'image' => 'required',
        ];

        $this->validate($request, $rule);

        $productAction->update_execute($request, $id);
        return back()->with(FlashMsg::item_update('Product Updated Successfully..'));
    }

    public function delete_product_all_lang(Request $request, ProductAction $productAction, $id)
    {
        $productAction->delete_execute($request, $id, 'delete');
        return redirect()->back()->with(FlashMsg::item_delete('Product Deleted Successfully..'));
    }

    public function get_tags_by_ajax(Request $request)
    {
        $query = $request->get('query');
        $filterResult = ProductTag::Where('name', 'LIKE', '%' . $query . '%')->get();
        $html_markup = '';
        $result = [];
        foreach ($filterResult as $data) {

            $fdata = $data->getTranslation('name', get_user_lang());
            array_push($result, $fdata);
        }
        return response()->json(['result' => $result]);
    }

    public function bulk_action_product(Request $request)
    {
        Product::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function product_single_settings()
    {
        $data = Advertisement::select('id', 'type')->get();
        $all_currency = [
            'USD' => '$', 'EUR' => '€', 'INR' => '₹', 'IDR' => 'Rp', 'AUD' => 'A$', 'SGD' => 'S$', 'JPY' => '¥', 'GBP' => '£', 'MYR' => 'RM', 'PHP' => '₱', 'THB' => '฿', 'KRW' => '₩', 'NGN' => '₦', 'GHS' => 'GH₵', 'BRL' => 'R$',
            'BIF' => 'FBu', 'CAD' => 'C$', 'CDF' => 'FC', 'CVE' => 'Esc', 'GHP' => 'GH₵', 'GMD' => 'D', 'GNF' => 'FG', 'KES' => 'K', 'LRD' => 'L$', 'MWK' => 'MK', 'MZN' => 'MT', 'RWF' => 'R₣', 'SLL' => 'Le', 'STD' => 'Db', 'TZS' => 'TSh', 'UGX' => 'USh', 'XAF' => 'FCFA', 'XOF' => 'CFA', 'ZMK' => 'ZK', 'ZMW' => 'ZK', 'ZWD' => 'Z$',
            'AED' => 'د.إ', 'AFN' => '؋', 'ALL' => 'L', 'AMD' => '֏', 'ANG' => 'NAf', 'AOA' => 'Kz', 'ARS' => '$', 'AWG' => 'ƒ', 'AZN' => '₼', 'BAM' => 'KM', 'BBD' => 'Bds$', 'BDT' => '৳', 'BGN' => 'Лв', 'BMD' => '$', 'BND' => 'B$', 'BOB' => 'Bs', 'BSD' => 'B$', 'BWP' => 'P', 'BZD' => '$',
            'CHF' => 'CHf', 'CNY' => '¥', 'CLP' => '$', 'COP' => '$', 'CRC' => '₡', 'CZK' => 'Kč', 'DJF' => 'Fdj', 'DKK' => 'Kr', 'DOP' => 'RD$', 'DZD' => 'دج', 'EGP' => 'E£', 'ETB' => 'ብር', 'FJD' => 'FJ$', 'FKP' => '£', 'GEL' => 'ლ', 'GIP' => '£', 'GTQ' => 'Q',
            'GYD' => 'G$', 'HKD' => 'HK$', 'HNL' => 'L', 'HRK' => 'kn', 'HTG' => 'G', 'HUF' => 'Ft', 'ILS' => '₪', 'ISK' => 'kr', 'JMD' => '$', 'KGS' => 'Лв', 'KHR' => '៛', 'KMF' => 'CF', 'KYD' => '$', 'KZT' => '₸', 'LAK' => '₭', 'LBP' => 'ل.ل.', 'LKR' => 'ரூ', 'LSL' => 'L',
            'MAD' => 'MAD', 'MDL' => 'L', 'MGA' => 'Ar', 'MKD' => 'Ден', 'MMK' => 'K', 'MNT' => '₮', 'MOP' => 'MOP$', 'MRO' => 'MRU', 'MUR' => '₨', 'MVR' => 'Rf', 'MXN' => 'Mex$', 'NAD' => 'N$', 'NIO' => 'C$', 'NOK' => 'kr', 'NPR' => 'रू', 'NZD' => '$', 'PAB' => 'B/.', 'PEN' => 'S/', 'PGK' => 'K',
            'PKR' => '₨', 'PLN' => 'zł', 'PYG' => '₲', 'QAR' => 'QR', 'RON' => 'lei', 'RSD' => 'din', 'RUB' => '₽', 'SAR' => 'SR', 'SBD' => 'Si$', 'SCR' => 'SR', 'SEK' => 'kr', 'SHP' => '£', 'SOS' => 'Sh.so.', 'SRD' => '$', 'SZL' => 'E', 'TJS' => 'ЅM',
            'TRY' => '₺', 'TTD' => 'TT$', 'TWD' => 'NT$', 'UAH' => '₴', 'UYU' => '$U', 'UZS' => 'so\'m', 'VND' => '₫', 'VUV' => 'VT', 'WST' => 'WS$', 'XCD' => '$', 'XPF' => '₣', 'YER' => '﷼', 'ZAR' => 'R'
        ];

        return view(self::BASE_PATH . 'product.single-settings', compact('data', 'all_currency'));
    }

    public function product_single_settings_update(Request $request)
    {
        $request->validate([
            'ad_type' => 'required',
            'ad_order' => 'required',
        ]);

        $advertisement = ProductSingleSettings::first();

        if (empty($advertisement)) {
            ProductSingleSettings::insert([
                'ad_type' => $request->ad_type,
                'ad_order' => $request->ad_order,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            ProductSingleSettings::first()->update([
                'ad_type' => $request->ad_type,
                'ad_order' => $request->ad_order,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        update_static_option('site_global_currency', $request->site_global_currency);

        return redirect()->back()->with(FlashMsg::item_update('Product Settings Updated Successfully..'));
    }


    // Popup Settings
    public function product_single_popup_settings()
    {
        return view(self::BASE_PATH . 'product.single-popup-settings');
    }

    public function product_single_popup_settings_update(Request $request)
    {
        $request->validate([
            'popup_button_text' => 'nullable',
            'popup_footer_text' => 'nullable',
            'popup_footer_link' => 'nullable',
        ]);

        $all_fields = [
            'popup_button_text',
            'popup_footer_text',
            'popup_footer_link'
        ];

        foreach ($all_fields as $field) {
            update_static_option($field, $request->$field);
        }

        return redirect()->back()->with(FlashMsg::item_update('Product Popup Settings Updated Successfully..'));
    }


    //=============================== FORCE DELETE AND RESTORE FUNCTIONS =================================

    public function trashed_products(Request $request)
    {
        $trashed_products = Product::onlyTrashed()->get();
        $default_lang = $request->lang ?? LanguageHelper::default_slug();
        return view(self::BASE_PATH . 'product.trashed', compact('trashed_products', 'default_lang'));
    }

    public function restore_trashed_product($id)
    {
        Product::onlyTrashed()->find($id)->restore();
        return back()->with(FlashMsg::settings_update('Trashed Product Restored Successfully..'));
    }

    public function delete_trashed_product(Request $request, ProductAction $productAction, $id)
    {
        $productAction->delete_execute($request, $id, 'trashed_delete');
        return back()->with(FlashMsg::item_delete('Product Item Deleted Forever'));
    }

    public function trashed_bulk_action_product(Request $request)
    {
        MetaData::whereIn('meta_taggable_id', $request->ids)->delete();
        foreach ($request->ids as $id)
        {
            $review_ids = [];
            $review = ProductReview::with('replies')->where('product_id', $id)->get();

            if ($review != null)
            {
                foreach ($review as $r)
                {
                    $review_ids[] = $r->id;
                }

                ReviewReply::whereIn('review_id',$review_ids)->delete();
                ProductReview::where('product_id', $id)->delete();
                UserWishlist::where('product_id', $id)->delete();
            }
            Product::withTrashed()->find($id)->forceDelete();
        }

        return response()->json(['status' => 'ok']);
    }
}
