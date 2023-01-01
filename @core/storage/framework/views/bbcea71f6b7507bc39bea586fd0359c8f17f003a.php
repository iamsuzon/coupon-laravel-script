<div class="featured-locations-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02 main-color-two">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                </div>
            </div>
        </div>
        <div class="row xl-four-column">
            <?php $__currentLoopData = $data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-11 col-md-6 col-lg-4 col-xl-3">
                <div class="single-featured-location v-03">
                    <div class="img-box">
                        <a href="<?php echo e(route_single_location($location->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($location->image, 'image','thumb',false); ?>

                        </a>
                    </div>
                    <div class="content">
                        <a href="<?php echo e(route('frontend.product.location.single',$location->slug)); ?>" class="title">
                        <h6 class="title"><?php echo e($location->city_name); ?></h6>
                        <p class="info"><?php echo e($location->products_count); ?> <?php echo e(__('Deals Available')); ?></p>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_featured_location_style_three.blade.php ENDPATH**/ ?>