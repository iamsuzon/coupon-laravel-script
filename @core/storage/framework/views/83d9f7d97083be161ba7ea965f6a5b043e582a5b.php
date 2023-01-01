<div class="blog-grid-area-wrapper food-details" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row three-column">
            <?php $__currentLoopData = $data['blogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="blog-grid style-01">
                        <div class="img-box">
                            <?php echo render_image_markup_by_attachment_id($blog->image, null, 'grid', false); ?>

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
        <div class="row">
            <!-- pagination area start -->
            <div class="col-lg-12">
                <div class="pagination" data-padding-top="50">
                    <ul class="pagination-list">
                        <?php echo e($data['blogs']->links()); ?>

                    </ul>
                </div>
            </div>
            <!-- pagination area end -->
        </div>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/app/Providers/../PageBuilder/views/blog/blog_grid_style_one.blade.php ENDPATH**/ ?>