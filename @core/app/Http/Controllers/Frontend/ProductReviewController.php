<?php

namespace App\Http\Controllers\Frontend;

use App\BlogComment;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Product;
use App\ProductReview;
use App\ReviewReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductReviewController extends Controller
{
    public function product_review_store(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'review' => 'required',
            'product_id' => 'required',
        ]);

        abort_if(Product::find($request->product_id) === null, 404);

        $review = ProductReview::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->first();
        if (!empty($review))
        {
            return response()->json([
                'msg' => __('Your have already placed a review'),
                'type' => 'error',
                'status' => 'ok',
            ]);
        }

        $content = ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::guard('web')->user()->id,
            'review_by' => Auth::guard('web')->user()->name,
            'rating' => $request->rating,
            'review' => purify_html($request->review),
        ]);

        try {
            Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                'subject' => __('You have a review from') . ' ' . get_static_option('site_title'),
                'message' => __('You have a new review submitted by') . ' ' . Auth::guard('web')->user()->name . ' ' . __('Email'). ':' . ' ' . Auth::guard('web')->user()->email . ' .' . __('check admin panel for more info'),
            ]));

        } catch (\Exception $e) {
            return redirect()->back()->with(FlashMsg::error($e->getMessage()));
        }

        return response()->json([
            'msg' => __('Your review sent successfully'),
            'type' => 'success',
            'status' => 'ok',
            'content' => $content,
        ]);
    }

    public function product_review_reply_ajax(Request $request)
    {
        $this->validate($request,[
           'review_id' => 'required',
           'reply' => 'required'
        ]);

        $content = new ReviewReply();
        $content->review_id = $request->review_id;

        if (Auth::guard('admin')->check())
        {
            $content->admin_id = Auth::guard('admin')->user()->id;
        } else {
            $content->user_id = Auth::guard('web')->user()->id;
        }

        $content->reply = purify_html($request->reply);
        $content->save();

        try {
            Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                'subject' => __('You have a feedback from') . ' ' . get_static_option('site_title'),
                'message' => __('You have a new reply on your review submitted by') . ' ' . Auth::guard('admin')->user()->name,
            ]));

        } catch (\Exception $e) {
            return redirect()->back()->with(FlashMsg::error($e->getMessage()));
        }

        return response()->json([
            'msg' => __('Your reply sent successfully'),
            'type' => 'success',
            'status' => 'ok',
            'content' => $content,
        ]);
    }
}
