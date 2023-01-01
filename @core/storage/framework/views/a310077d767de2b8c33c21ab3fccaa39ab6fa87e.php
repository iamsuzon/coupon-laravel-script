<div class="popular-category-area-start" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="btn-wrapper">
                        <a href="<?php echo e($data['view_all_link']); ?>" class="view-all main-color-two"><?php echo e($data['view_all_text']); ?>

                            <i class="las la-long-arrow-alt-right icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row three-column">
            <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="<?php echo e(route_single_category($category->slug)); ?>" class="single-popular-catg-item style-01">
                        <span class="left-content">
                            <span class="icon-wrap">
                                <?php echo render_image_markup_by_attachment_id($category->image, '', 'thumb', false); ?>

                            </span>
                            <span class="content">
                                <span class="title"><?php echo e($category->title); ?></span>
                                <span class="info"><?php echo e(($category->products_count)); ?> <?php echo e(__('offer available')); ?></span>
                            </span>
                        </span>
                        <span class="right-content">
                            <span class="icon-wrap">
                                <i class="las la-arrow-right icon"></i>
                            </span>
                        </span>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH E:\XAMPP\htdocs\coupon\@core\app\Providers../../PageBuilder/views/home/home_page_popular_categories_style_two.blade.php ENDPATH**/ ?>