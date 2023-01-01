<div class="grid-item">
    <div class="container" data-padding-top="85">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main">You may like</h1>
                </div>
            </div>
        </div>
        <div class="row three-column">
            <?php $__currentLoopData = $all_related_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="blog-grid style-01">
                    <div class="img-box">
                        <?php echo render_image_markup_by_attachment_id($blog->image, '', 'grid', false); ?>

                    </div>
                    <div class="content">
                        <h4 class="title">
                            <a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                        </h4>
                        <div class="post-meta">
                            <ul class="post-meta-list">
                                <li class="post-meta-item">
                                    <a href="<?php echo e(route('frontend.blog.category.single', $blog->category_id)); ?>">
                                        <span class="text"><?php echo e(optional($blog->category)->title); ?></span>
                                    </a>
                                </li>
                                <li class="post-meta-item date">
                                    <span class="text"><?php echo e($blog->created_at->format('d F Y')); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/Modules/Blog/Resources/views/frontend/blog/blog-single-variant/partials/details_you_may_like_01.blade.php ENDPATH**/ ?>