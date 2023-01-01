<div class="featured-locations-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
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
        <div class="row xl-four-column">
            <?php $__currentLoopData = $data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-9 col-md-6 col-lg-4 col-xl-3">
                    <div class="single-featured-location">
                        <div class="img-box">
                            <a href="<?php echo e(route('frontend.product.location.single',$location->slug)); ?>">
                                <?php echo render_image_markup_by_attachment_id($location->image, 'rounded','thumb',false); ?>

                            </a>
                        </div>
                        <div class="content">
                            <a href="<?php echo e(route('frontend.product.location.single',$location->slug)); ?>" class="title"><?php echo e($location->city_name); ?></a>
                            <p class="info"><?php echo e($location->products_count); ?> <?php echo e(__('offer Available')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_featured_location.blade.php ENDPATH**/ ?>