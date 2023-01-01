<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use App\Admin;
use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\CommentReplies;
use App\Helpers\FlashMsg;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Illuminate\Routing\Controller;
use App\Mail\BasicMail;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isNull;

class BlogCommentController extends Controller
{

    private const BASE_PATH = 'blog::frontend.';

    public function blog_comment_store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'blog_id' => 'required',
        ]);

        abort_if(Blog::find($request->blog_id) === null, 404);

        $comment = BlogComment::where(['blog_id' => $request->blog_id, 'user_id' => Auth::user()->id])->first();
        if (!empty($comment))
        {
            return response()->json([
                'msg' => __('Your have already placed a comment'),
                'type' => 'error',
                'status' => 'ok',
            ]);
        }

        $content = BlogComment::create([
            'blog_id' => $request->blog_id,
            'user_id' => Auth::guard('web')->user()->id,
            'commented_by' => Auth::guard('web')->user()->name,
            'comment_content' => purify_html($request->comment),
        ]);

        try {
            Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                'subject' => __('You have a comment from') . ' ' . get_static_option('site_title'),
                'message' => __('You have a new comment submitted by') . ' ' . Auth::guard('web')->user()->name . ' ' . __('Email'). ':' . ' ' . Auth::guard('web')->user()->email . ' .' . __('check dashboard for more info'),
            ]));

        } catch (\Exception $e) {
            return redirect()->back()->with(FlashMsg::error($e->getMessage()));
        }

        return response()->json([
            'msg' => __('Your comment sent successfully'),
            'type' => 'success',
            'status' => 'ok',
            'content' => $content,
        ]);
    }

    public function blog_comment_reply_ajax(Request $request)
    {
        $request->validate([
            'comment_id' => 'required',
            'reply' => 'required',
        ]);

        $content = CommentReplies::create([
            'comment_id' => $request->comment_id,
            'user_id' => Auth::guard('web')->user()->id,
            'reply' => purify_html($request->reply),
        ]);

        try {
            Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                'subject' => __('You have a reply from') . ' ' . get_static_option('site_title'),
                'message' => __('You have a new reply on your comment submitted by') . ' ' . Auth::guard('web')->user()->name,
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
