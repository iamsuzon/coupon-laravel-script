<div class="featured-brand-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="btn-wrapper">
                        <a href="<?php echo e($data['view_all_link']); ?>" class="view-all main-color-two"><?php echo e($data['view_all']); ?>

                            <i class="las la-long-arrow-alt-right icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-brand-item-wrap style-01">
                    <?php $__currentLoopData = $data['brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-brand-item">
                            <div class="logo-box">
                                <a href="<?php echo e(route_single_brand($brand->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($brand->image, null, 'grid', false); ?>

                                </a>
                            </div>
                            <div class="details">
                                <a href="<?php echo e(route_single_brand($brand->slug)); ?>" class="title"><?php echo e($brand->title); ?></a>
                                <p class="location"><?php echo e(optional($brand->location)->city_name); ?>, <?php echo e(optional($brand->location)->state_name); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_featured_brands_style_one.blade.php ENDPATH**/ ?>