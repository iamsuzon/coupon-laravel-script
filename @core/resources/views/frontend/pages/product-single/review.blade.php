<div class="user-comment-area" id="user-review-area" data-padding-top="85">
    <div class="comment-section-title section-title-style-02">
        <h3 class="title">{{__('Review')}} <span class="total">({{count($single_product->reviews)}})</span></h3>
    </div>
    <ul class="comment-list" id="comment-list">
        @forelse($single_product->reviews as $review)
        <li>
            <div class="single-comment-wrap">
                <div class="thumb">
                    {!! render_image_markup_by_attachment_id(optional($review->user)->image, null, 'grid', false) !!}
                </div>
                <div class="content">
                    <div class="content-top">
                        <div class="left">
                            <h4 class="title">{{$review->review_by}}</h4>
                            <ul class="post-meta">
                                <li class="meta-item">
                                    {{$review->created_at->format('d M Y, h.m A')}}
                                </li>
                            </ul>
                        </div>
                        @auth('admin')
                            <div class="right">
                                <div class="reply">
                                    <a href="#" class="reply-btn" data-reply="{{$review->id}}">
                                        <i class="las la-reply icon"></i>
                                        <span class="text">{{__('Reply')}}</span>
                                    </a>
                                </div>
                            </div>
                        @elseauth('web')
                            @if(Auth::guard('web')->user()->id == $single_product->user_id)
                                <div class="right">
                                    <div class="reply">
                                        <a href="#" class="reply-btn" data-reply="{{$review->id}}">
                                            <i class="las la-reply icon"></i>
                                            <span class="text">{{__('Reply')}}</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                    <p class="comment">
                        @for($i=0; $i<$review->rating; $i++) <i class="rating-star fas fa-star"></i> @endfor
                            <br>
                        {{$review->review}}
                    </p>

                    @php
                        if (Auth::guard('web')->check())
                        {
                            $user_id = Auth::guard('web')->user()->id;
                        }
                    @endphp
                    @if(Auth::guard('admin')->check())
                        <form class="mt-3 review-reply-form review-{{$review->id}}" data-review_id="{{$review->id}}" action="">
                            <textarea class="form-control review_reply" name="review_reply" id="review-reply-{{$review->id}}" cols="30"></textarea>
                            <button type="submit" class="btn btn-success btn-sm mt-3 px-4 float-right" id="reply-send-button-{{$review->id}}">Reply</button>
                        </form>
                    @elseif(Auth::guard('web')->check() AND Auth::guard('web')->user()->id == $single_product->user_id)
                        <form class="mt-3 review-reply-form review-{{$review->id}}" data-review_id="{{$review->id}}" action="">
                            <textarea class="form-control review_reply" name="review_reply" id="review-reply-{{$review->id}}" cols="30"></textarea>
                            <button type="submit" class="btn btn-success btn-sm mt-3 px-4 float-right" id="reply-send-button-{{$review->id}}">Reply</button>
                        </form>
                    @endif
                </div>
            </div>
        </li>
            @foreach($review->replies as $reply)
                    <li class="has-children mt-4">
                        <ul>
                            <li>
                                <div class="single-comment-wrap">
                                    <div class="thumb">
                                        @php
                                            if ($reply->admin_id != null)
                                            {
                                                $user = 'admin';
                                            } else {
                                                $user = 'user';
                                            }
                                        @endphp
                                        {!! render_image_markup_by_attachment_id(optional($reply->$user)->image, null, 'grid', false) !!}
                                    </div>
                                    <div class="content">
                                        <div class="content-top">
                                            <div class="left">
                                                <h4 class="title">{{optional($reply->admin)->name}}</h4>
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
                    {{__('No Review Available')}}
                </div>
            </li>
        @endforelse
    </ul>
</div>