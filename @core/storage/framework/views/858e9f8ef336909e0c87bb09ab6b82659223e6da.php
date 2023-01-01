<div class="exclusive-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                </div>
            </div>
        </div>
        <div class="row four-column">
            <?php $__currentLoopData = $data['deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="single-recent-item style-04">
                    <div class="img-box">
                        <span class="catg-tag top-right"><?php echo e(get_product_discount_with_symbol($deal)); ?></span>
                        <a href="<?php echo e(route_single_product($deal->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($deal->image, '', 'full', false); ?>

                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <p class="offer">
                                <a href="<?php echo e(route_single_product($deal->slug)); ?>"><?php echo e(Str::words($deal->title, 10)); ?></a>
                            </p>
                        </div>

                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="btn-wrapper">
                                    
                                    <div class="copy-box copy-box-inline copy-<?php echo e($deal->id); ?>">
                                        <a href="javascript:void(0)" data-code="<?php echo e($deal->coupon_code); ?>" data-product_id="<?php echo e($deal->id); ?>">
                                        </a>
                                        <p class="copy-text"> <?php echo e(__('Copied')); ?> </p>
                                    </div>

                                    <span class="btn-default coupon-01">
                                        <a class="copy_coupon" href="javascript:void(0)" data-code="<?php echo e($deal->coupon_code); ?>" data-product_id="<?php echo e($deal->id); ?>"><?php echo e($deal->coupon_code); ?></a>
                                        <span class="overlay overlay-<?php echo e($deal->id); ?>"><?php echo e($data['button_text']); ?></span>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_popular_brand_deals_style_three.blade.php ENDPATH**/ ?>