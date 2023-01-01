<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Advertisement;
use App\Facades\InstagramFeed;
use App\Helpers\FlashMsg;
use App\Helpers\HomePageStaticSettings;
use App\Helpers\LanguageHelper;
use App\Mail\BasicMail;
use App\Newsletter;
use App\Page;
use App\Blog;
use App\BlogCategory;
use App\HeaderSlider;
use App\Language;
use App\Mail\AdminResetEmail;
use App\Poll;
use App\PollInfo;
use App\Product;
use App\ProductLocation;
use App\StaticOption;
use App\Tag;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use function Sodium\increment;


class FrontendController extends Controller

{
    public function index()
    {
        $home_page_id = get_static_option('home_page');
        $page_details = Page::find($home_page_id);
        if (empty($page_details)) {
            // show any notice or
        }

        $static_field_data = StaticOption::whereIn('option_name', HomePageStaticSettings::get_home_field(get_static_option('home_page_variant')))->get()->mapWithKeys(function ($item) {
            return [$item->option_name => $item->option_value];
        })->toArray();

        return view('frontend.frontend-home')->with([
            'static_field_data' => $static_field_data,
            'page_details' => $page_details
        ]);
    }


    public function dynamic_single_page($slug)
    {
        $page_post = Page::usingLocale(get_user_lang())->with('meta_data')->where('slug', $slug)->first();
        if (empty($page_post)) {
            abort(404);
        }

        //check for blog page
        $blog_page_slug = get_page_slug(get_static_option('blog_page'), 'blog');

        if ($slug === $blog_page_slug) {
            $all_blogs = Blog::where(['status' => 'publish'])->paginate(10);
            return view('blog::frontend.blog.blog')->with([
                'all_blogs' => $all_blogs,
                'page_post' => $page_post
            ]);
        }

        //check for product page
        $product_page_slug = get_page_slug(get_static_option('product_page'), 'products');

        if ($slug === $product_page_slug) {
            $data['products'] = Product::where(['status' => 'publish'])->paginate(10);
            return view('frontend.pages.all_product.products')->with(['data' => $data]);
        }

        return view('frontend.pages.dynamic-single')->with([
            'page_post' => $page_post
        ]);
    }


    public function ajax_login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:6'
        ], [
            'username.required' => __('Username required'),
            'password.required' => __('Password required'),
            'password.min' => __('Password length must be 6 characters')
        ]);
        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return response()->json([
                'msg' => __('Login Success Redirecting'),
                'type' => 'danger',
                'status' => 'valid'
            ]);
        }
        return response()->json([
            'msg' => __('User name and password do not match'),
            'type' => 'danger',
            'status' => 'invalid'
        ]);
    }

    public function showAdminForgetPasswordForm()
    {
        return view('auth.admin.forget-password');
    }

    public function sendAdminForgetPasswordMail(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string:max:191'
        ]);
        $user_info = Admin::where('username', $request->username)->orWhere('email', $request->username)->first();
        $token_id = Str::random(30);
        $existing_token = DB::table('password_resets')->where('email', $user_info->email)->delete();
        if (empty($existing_token)) {
            DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
        }
        $message = __('Here is you password reset link, If you did not request to reset your password just ignore this mail.') . ' <a style="background-color:#d0f1ff;color:#fff;text-decoration:none;padding: 10px 15px;border-radius: 3px;display: block;width: 130px;margin-top: 20px;" href="' . route('admin.reset.password', ['user' => $user_info->username, 'token' => $token_id]) . '">' . __('Click Reset Password') . '</a>';
        if (sendEmail($user_info->email, $user_info->username, __('Reset Your Password'), $message)) {
            return redirect()->back()->with([
                'msg' => __('Check Your Mail For Reset Password Link'),
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => __('Something Wrong, Please Try Again!!'),
            'type' => 'danger'
        ]);
    }

    public function showAdminResetPasswordForm($username, $token)
    {
        return view('auth.admin.reset-password')->with([
            'username' => $username,
            'token' => $token
        ]);
    }

    public function AdminResetPassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = Admin::where('username', $request->username)->first();
        $user = Admin::findOrFail($user_info->id);
        $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email, 'token' => $request->token])->first();
        if (!empty($token_iinfo)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }
        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }

    public function lang_change(Request $request)
    {
        session()->put('lang', $request->lang);
        return redirect()->route('homepage');
    }


    public function showUserForgetPasswordForm()
    {
        return view('frontend.user.forget-password');
    }

    public function sendUserForgetPasswordMail(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string:max:191'
        ]);
        $user_info = User::where('username', $request->username)->orWhere('email', $request->username)->first();
        if (!empty($user_info)) {
            $token_id = Str::random(30);
            $existing_token = DB::table('password_resets')->where('email', $user_info->email)->delete();
            if (empty($existing_token)) {
                DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
            }
            $message = __('Here is you password reset link, If you did not request to reset your password just ignore this mail.') . ' <a class="btn" href="' . route('user.reset.password', ['user' => $user_info->username, 'token' => $token_id]) . '">' . __('Click Reset Password') . '</a>';
            $data = [
                'username' => $user_info->username,
                'message' => $message
            ];
            try {
                Mail::to($user_info->email)->send(new AdminResetEmail($data));
            } catch (\Exception $e) {
                return redirect()->back()->with([
                    'msg' => $e->getMessage(),
                    'type' => 'danger'
                ]);
            }

            return redirect()->back()->with([
                'msg' => __('Check Your Mail For Reset Password Link'),
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => __('Your Username or Email Is Wrong!!!'),
            'type' => 'danger'
        ]);
    }

    public function showUserResetPasswordForm($username, $token)
    {
        return view('frontend.user.reset-password')->with([
            'username' => $username,
            'token' => $token
        ]);
    }

    public function UserResetPassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = User::where('username', $request->username)->first();
        $user = User::findOrFail($user_info->id);
        $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email, 'token' => $request->token])->first();
        if (!empty($token_iinfo)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('user.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }
        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }


    public function user_logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function home_advertisement_click_store(Request $request)
    {
        Advertisement::where('id', $request->id)->increment('click');
        return response()->json('success');
    }

    public function home_advertisement_impression_store(Request $request)
    {
        Advertisement::where('id', $request->id)->increment('impression');
        return response()->json('success');
    }


    public function subscribe_newsletter(Request $request)
    {
        dd($request);
        $this->validate($request, [
            'email' => 'required|string|email|max:191|unique:newsletters'
        ]);

        $verify_token = Str::random(32);

        Newsletter::create([
            'email' => $request->email,
            'verified' => 0,
            'token' => $verify_token
        ]);
        $message = __('verify your email to get all news from ') . get_static_option('site_' . get_default_language() . '_title') . '<div class="btn-wrap"> <a class="anchor-btn" href="' . route('subscriber.verify', ['token' => $verify_token]) . '">' . __('verify email') . '</a></div>';
        $data = [
            'message' => $message,
            'subject' => __('verify your email')
        ];

        //send verify mail to newsletter subscriber
        try {
            Mail::to($request->email)->send(new BasicMail($data));
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'type' => 'danger'
            ]);
        }

        return response()->json([
            'msg' => __('Thanks for Subscribe Our Newsletter'),
            'type' => 'success'
        ]);
    }

    public function subscriber_verify(Request $request)
    {
        $newsletter = Newsletter::where('token', $request->token)->first();
        $title = __('Sorry');
        $description = __('your token is expired');
        if (!empty($newsletter)) {
            Newsletter::where('token', $request->token)->update([
                'verified' => 1
            ]);
            $title = __('Thanks');
            $description = __('we are really thankful to you for subscribe our newsletter');
        }
        return view('frontend.thankyou', compact('title', 'description'));
    }


    public function dark_mode_toggle(Request $request)
    {
        if ($request->mode == 'off') {
            update_static_option('site_frontend_dark_mode', 'on');
        }
        if ($request->mode == 'on') {
            update_static_option('site_frontend_dark_mode', 'off');
        }

        return response()->json(['status' => 'done']);
    }


    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $all_data = Product::where('status', 'publish')
            ->where('title', 'LIKE', "%$query%")
            ->orWhere('sale_price', 'LIKE', "%$query%")
            ->orderBy('created_at', 'DESC')
            ->select('title', 'slug', 'image', 'sale_price')
            ->limit(5)->get();

        $html_markup = '';
        foreach ($all_data as $data) {
            $route = route('frontend.product.single', ['slug' => $data->slug]);
            $image = render_image_markup_by_attachment_id($data->image, '', 'thumb', false);
            $html_markup .= '<li class="article-wrap"><a class="font-weight-bold" href="' . $route . '"> ' . $image . '<span class="ml-3">' . Str::words($data->title, 10) . '</span>' . '</a></li>';
        }
        return response()->json($html_markup);
    }

    public function autocompleteSearchByLocation(Request $request)
    {
        $query = $request->get('query');
        $product_query = Product::where('status', 'publish')
            ->where('title', 'LIKE', "%$query%");

        if ($request->location != null) {
            $product_query->where('location_id', $request->location);
        }

        $all_data = $product_query->take(5)->get();

        $html_markup = '';
        foreach ($all_data as $data) {
            $route = route('frontend.product.single', ['slug' => $data->slug]);
            $image = render_image_markup_by_attachment_id($data->image, '', 'thumb', false);
            $html_markup .= '<li class="article-wrap"><a class="font-weight-bold" href="' . $route . '"> ' . $image . '<span class="ml-3 search-title">' . Str::words($data->title, 10) . '</span>' . '</a></li>';
        }

        return response()->json($html_markup);
    }

    public function search_single(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $search = $request->search;
        $search_query = Product::where('status', 'publish');

        if ($request->location) {
            $search_results = $search_query->where('location_id', $request->location)->where('title', 'LIKE', "%$request->search%")->paginate(10)->withQueryString();
        } else {
            $search_results = $search_query->where('title', 'LIKE', "%$request->search%")
                ->orWhere('sale_price', 'LIKE', "%$request->search%")
                ->paginate(10)->withQueryString();
        }

        return view('frontend.pages.single_search', compact('search', 'search_results'));
    }

    //========================================== Recent Products by Ajax - PageBuilder ===========================================
    public function get_recent_product_by_ajax(Request $request, $type)
    {
        $product_markup = '';
        $current_lang = LanguageHelper::user_lang_slug();
        $product = Product::query();

        if ($request->id != null) {
            if (!empty($request['product_limit'])) {
                $products = $product->where('status', 'publish')->where('category_id', $request->id)->take($request->product_limit)->with('category')->get();
            } else {
                $products = $product->where('status', 'publish')->where('category_id', $request->id)->with('category')->get();
            }
        } else {
            $products = $product->where('status', 'publish')->orderBy('created_at', 'DESC')->with('category')->take(8)->get();
        }

        foreach ($products as $key => $product_item) {
            $product_id = $product_item->id;
            $image_markup = render_image_markup_by_attachment_id($product_item->image, 'border-radius-10', 'full', false);
            $discount = $product_item->discount . $product_item->discount_symbol;

            $category_name = optional($product_item->category)->getTranslation('title', $current_lang);
            $category_route = route_single_category(optional($product_item->category)->slug);

            $product_title = Str::words($product_item->getTranslation('title', $current_lang), 10);
            $product_regular_price = site_currency_symbol() . $product_item->regular_price;
            $product_sale_price = site_currency_symbol() . $product_item->sale_price;
            $product_route = route('frontend.product.single', $product_item->slug);

            $brand_name = optional($product_item->brand)->getTranslation('title', $current_lang);

            $brand_image_markup = render_image_markup_by_attachment_id(optional($product_item->brand)->image, 'border-radius-0', 'grid', false);
            $brand_route = route_single_brand(optional($product_item->brand)->slug);

            $location_name = optional($product_item->location)->getTranslation('city_name', $current_lang) . ', ' . optional($product_item->location)->getTranslation('state_name', $current_lang);

            $product_expire_date = render_deal_expire_date_markup($product_item->expire_date);

            $button_text = __('Coupon Code');
            $expire_on = __('Expire on:');
            $grab_now = __('Get Now!');

            if ($type == 1) {
                $product_markup .= <<<HTML

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3" >
                            <div class="single-recent-item style-01">
                                <div class="img-box">
                                    <a href="javascript:void(0)"
                                       class="catg-tag top-right border-radius-5">-{$discount}</a>
                                    <a href="{$product_route}">
                                        {$image_markup}
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="top-content">
                                        <a href="{$product_route}" class="offer">{$product_title}</a>
                                    </div>
                                    <div class="middle-content">
                                        <div class="left-content">
                                            
                                        </div>
                                    </div>
                                    <div class="bottom-content">
                                        <div class="left-content">
                                            <div class="btn-wrapper">
                                                <a href="{$product_route}" class="btn-default grab-now" data-id="{$product_id}">{$button_text}</a>
                                            </div>
                                        </div>
                                        <div class="right-content">
                                            <span class="offer-duration grab-now" style="cursor: pointer" data-id="{$product_id}">
                                                {$grab_now}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

HTML;
            }
            if ($type == 2) {
                $image_markup = render_image_markup_by_attachment_id($product_item->image, '', 'large', false);
                $product_markup .= <<<HTML

    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="single-recent-item style-03">
                    <div class="img-box">
                        <a href="{$category_route}" class="catg-tag top-right border-radius-15">{$category_name}</a>
                        <a href="{$product_route}">
                            {$image_markup}
                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <p class="offer">
                                    <a href="{$product_route}">{$product_title}</a>
                                </p>
                                <div class="details">
                                    <a href="{$brand_route}" class="title">{$brand_name}</a>
                                    <p class="location"> <span class="dot">·</span> {$location_name}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="pricing">
                                    <span class="price">{$product_sale_price}</span>
                                    <del>{$product_regular_price}</del>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="btn-wrapper left">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="{$product_id}">{$button_text}</a>
                                </div>

                                <div class="btn-wrapper right">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="{$product_id}">{$grab_now}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
HTML;
            }
            if ($type == 3) {
                $product_markup .= <<<HTML

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="single-recent-item style-03">
                        <div class="img-box">
                            <a href="{$category_route}" class="catg-tag top-left border-radius-15">{$category_name}</a>
                            <a href="{$product_route}">
                                {$image_markup}
                            </a>
                        </div>
                        <div class="content">
                            <div class="top-content">
                                <div class="left-content">
                                    <a href="{$product_route}" class="offer">{$product_title}</a>
                                    <div class="details">
                                        <a href="{$brand_route}" class="title">{$brand_name}</a>
                                        <p class="location"> <span class="dot">·</span>{$location_name}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="left-content">
                                    <div class="pricing">
                                        <span class="price">{$product_sale_price}</span>
                                        <del>{$product_regular_price}</del>
                                    </div>
                                </div>
                                <div class="right-content">
                                    <div class="btn-wrapper">
                                        <a href="{$product_route}" class="btn-default">{$button_text}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

HTML;
            }
        }

        return response()->json(['markup' => $product_markup]);
    }
}
