<div class="user-comment-area" id="user-review-area" data-padding-top="85">
    <div class="comment-section-title section-title-style-02">
        <h3 class="title"><?php echo e(__('Review')); ?> <span class="total">(<?php echo e(count($single_product->reviews)); ?>)</span></h3>
    </div>
    <ul class="comment-list" id="comment-list">
        <?php $__empty_1 = true; $__currentLoopData = $single_product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li>
            <div class="single-comment-wrap">
                <div class="thumb">
                    <?php echo render_image_markup_by_attachment_id(optional($review->user)->image, null, 'grid', false); ?>

                </div>
                <div class="content">
                    <div class="content-top">
                        <div class="left">
                            <h4 class="title"><?php echo e($review->review_by); ?></h4>
                            <ul class="post-meta">
                                <li class="meta-item">
                                    <?php echo e($review->created_at->format('d M Y, h.m A')); ?>

                                </li>
                            </ul>
                        </div>
                        <?php if(auth()->guard('admin')->check()): ?>
                            <div class="right">
                                <div class="reply">
                                    <a href="#" class="reply-btn" data-reply="<?php echo e($review->id); ?>">
                                        <i class="las la-reply icon"></i>
                                        <span class="text"><?php echo e(__('Reply')); ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php elseif(auth()->guard('web')->check()): ?>
                            <?php if(Auth::guard('web')->user()->id == $single_product->user_id): ?>
                                <div class="right">
                                    <div class="reply">
                                        <a href="#" class="reply-btn" data-reply="<?php echo e($review->id); ?>">
                                            <i class="las la-reply icon"></i>
                                            <span class="text"><?php echo e(__('Reply')); ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <p class="comment">
                        <?php for($i=0; $i<$review->rating; $i++): ?> <i class="rating-star fas fa-star"></i> <?php endfor; ?>
                            <br>
                        <?php echo e($review->review); ?>

                    </p>

                    <?php
                        if (Auth::guard('web')->check())
                        {
                            $user_id = Auth::guard('web')->user()->id;
                        }
                    ?>
                    <?php if(Auth::guard('admin')->check()): ?>
                        <form class="mt-3 review-reply-form review-<?php echo e($review->id); ?>" data-review_id="<?php echo e($review->id); ?>" action="">
                            <textarea class="form-control review_reply" name="review_reply" id="review-reply-<?php echo e($review->id); ?>" cols="30"></textarea>
                            <button type="submit" class="btn btn-success btn-sm mt-3 px-4 float-right" id="reply-send-button-<?php echo e($review->id); ?>">Reply</button>
                        </form>
                    <?php elseif(Auth::guard('web')->check() AND Auth::guard('web')->user()->id == $single_product->user_id): ?>
                        <form class="mt-3 review-reply-form review-<?php echo e($review->id); ?>" data-review_id="<?php echo e($review->id); ?>" action="">
                            <textarea class="form-control review_reply" name="review_reply" id="review-reply-<?php echo e($review->id); ?>" cols="30"></textarea>
                            <button type="submit" class="btn btn-success btn-sm mt-3 px-4 float-right" id="reply-send-button-<?php echo e($review->id); ?>">Reply</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </li>
            <?php $__currentLoopData = $review->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="has-children mt-4">
                        <ul>
                            <li>
                                <div class="single-comment-wrap">
                                    <div class="thumb">
                                        <?php
                                            if ($reply->admin_id != null)
                                            {
                                                $user = 'admin';
                                            } else {
                                                $user = 'user';
                                            }
                                        ?>
                                        <?php echo render_image_markup_by_attachment_id(optional($reply->$user)->image, null, 'grid', false); ?>

                                    </div>
                                    <div class="content">
                                        <div class="content-top">
                                            <div class="left">
                                                <h4 class="title"><?php echo e(optional($reply->admin)->name); ?></h4>
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
                    <?php echo e(__('No Review Available')); ?>

                </div>
            </li>
        <?php endif; ?>
    </ul>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/pages/product-single/review.blade.php ENDPATH**/ ?>