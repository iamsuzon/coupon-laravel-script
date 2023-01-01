<div class="blog-grid-area-wrapper food-details" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two v-02">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                </div>
            </div>
        </div>
        <div class="row three-column">
            <?php $__currentLoopData = $data['blogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="blog-grid style-01">
                    <div class="img-box">
                        <?php echo render_image_markup_by_attachment_id($blog->image,'','', false); ?>

                    </div>
                    <div class="content">
                        <span class="tag"><?php echo e($blog->created_at->format('d F Y')); ?></span>
                        <h4 class="title">
                            <a href="<?php echo e(route('frontend.blog.single',$blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                        </h4>
                        <div class="post-meta">
                            <ul class="post-meta-list main-color-two style-02">
                                <li class="post-meta-item">
                                    <a href="<?php echo e(route('frontend.blog.category.single', $blog->category_id)); ?>">
                                        <span class="text author"><?php echo e(optional($blog->category)->title); ?></span>
                                    </a>
                                </li>
                                <li class="post-meta-item date">
                                    <a href="<?php echo e(route('frontend.blog.single',$blog->slug)); ?>">
                                        <span class="text"><?php echo e(count($blog->comments)); ?> <?php echo e(__('Comments')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/app/Providers/../PageBuilder/views/about/blog_news_update.blade.php ENDPATH**/ ?>