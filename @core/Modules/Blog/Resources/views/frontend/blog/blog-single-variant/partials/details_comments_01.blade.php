<div class="user-comment-area" id="user-review-area" data-padding-top="85">
    <div class="comment-section-title section-title-style-02">
        <h3 class="title">Comments<span class="total">({{count($blog_post->comments)}})</span></h3>
    </div>
    <ul class="comment-list" id="comment-list">
        @forelse($blog_post->comments as $comment)
            <li>
                <div class="single-comment-wrap">
                    <div class="thumb">
                        {!! render_image_markup_by_attachment_id(optional($comment->user)->image, null, 'grid', false) !!}
                    </div>
                    <div class="content">
                        <div class="content-top">
                            <div class="left">
                                <h4 class="title">{{$comment->commented_by}}</h4>
                                <ul class="post-meta">
                                    <li class="meta-item">
                                        {{$comment->created_at->format('d M Y, h.m A')}}
                                    </li>
                                </ul>
                            </div>
                            @auth('web')
                                <div class="right">
                                    <div class="reply">
                                        <a href="#" class="reply-btn" data-reply="{{$comment->id}}">
                                            <i class="las la-reply icon"></i>
                                            <span class="text">Reply</span>
                                        </a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                        <p class="comment">
                            {{$comment->comment_content}}
                        </p>

                        @auth('web')
                            <form class="mt-3 comment-reply-form comment-{{$comment->id}}" data-comment_id="{{$comment->id}}" style="display: none" action="">
                                <textarea class="form-control comment_reply" name="comment_reply" id="comment-reply-{{$comment->id}}" cols="30"></textarea>
                                <button type="submit" class="btn btn-success btn-sm mt-3 px-4 float-right" id="reply-send-button-{{$comment->id}}">Reply</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </li>
            @continue($comment->replies == null)
                @foreach($comment->replies as $reply)
                    <li class="has-children mt-4">
                        <ul>
                            <li>
                                <div class="single-comment-wrap">
                                    <div class="thumb">
                                        {!! render_image_markup_by_attachment_id($reply->user->image, null, 'grid', false) !!}
                                    </div>
                                    <div class="content">
                                        <div class="content-top">
                                            <div class="left">
                                                <h4 class="title">{{$reply->user->name}}</h4>
                                                <ul class="post-meta">
                                                    <li class="meta-item">
                                                        {{$reply->created_at->format('d M Y, h.m A')}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="comment">{{$reply->reply}}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endforeach
        @empty
            <li>
                <div class="single-comment-wrap">
                    No Comment Available
                </div>
            </li>
        @endforelse
    </ul>
</div>