<div class="user-comment-area" id="user-review-area" data-padding-top="85">
    <div class="comment-section-title section-title-style-02">
        <h3 class="title">Comments<span class="total">(<?php echo e(count($blog_post->comments)); ?>)</span></h3>
    </div>
    <ul class="comment-list" id="comment-list">
        <?php $__empty_1 = true; $__currentLoopData = $blog_post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li>
                <div class="single-comment-wrap">
                    <div class="thumb">
                        <?php echo render_image_markup_by_attachment_id(optional($comment->user)->image, null, 'grid', false); ?>

                    </div>
                    <div class="content">
                        <div class="content-top">
                            <div class="left">
                                <h4 class="title"><?php echo e($comment->commented_by); ?></h4>
                                <ul class="post-meta">
                                    <li class="meta-item">
                                        <?php echo e($comment->created_at->format('d M Y, h.m A')); ?>

                                    </li>
                                </ul>
                            </div>
                            <?php if(auth()->guard('web')->check()): ?>
                                <div class="right">
                                    <div class="reply">
                                        <a href="#" class="reply-btn" data-reply="<?php echo e($comment->id); ?>">
                                            <i class="las la-reply icon"></i>
                                            <span class="text">Reply</span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <p class="comment">
                            <?php echo e($comment->comment_content); ?>

                        </p>

                        <?php if(auth()->guard('web')->check()): ?>
                            <form class="mt-3 comment-reply-form comment-<?php echo e($comment->id); ?>" data-comment_id="<?php echo e($comment->id); ?>" style="display: none" action="">
                                <textarea class="form-control comment_reply" name="comment_reply" id="comment-reply-<?php echo e($comment->id); ?>" cols="30"></textarea>
                                <button type="submit" class="btn btn-success btn-sm mt-3 px-4 float-right" id="reply-send-button-<?php echo e($comment->id); ?>">Reply</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <?php if($comment->replies == null) continue; ?>
                <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="has-children mt-4">
                        <ul>
                            <li>
                                <div class="single-comment-wrap">
                                    <div class="thumb">
                                        <?php echo render_image_markup_by_attachment_id($reply->user->image, null, 'grid', false); ?>

                                    </div>
                                    <div class="content">
                                        <div class="content-top">
                                            <div class="left">
                                                <h4 class="title"><?php echo e($reply->user->name); ?></h4>
                                                <ul class="post-meta">
                                                    <li class="meta-item">
                                                        <?php echo e($reply->created_at->format('d M Y, h.m A')); ?>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="comment"><?php echo e($reply->reply); ?></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li>
                <div class="single-comment-wrap">
                    No Comment Available
                </div>
            </li>
        <?php endif; ?>
    </ul>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/Modules/Blog/Resources/views/frontend/blog/blog-single-variant/partials/details_comments_01.blade.php ENDPATH**/ ?>