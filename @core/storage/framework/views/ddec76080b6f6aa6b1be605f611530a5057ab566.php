<div class="special-deal-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    
    <div class="container">
        <div class="row two-column">
            <?php $__currentLoopData = $data['deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6">
                    <div class="single-special-item">
                        <div class="left-content">
                            <div class="logo-box">
                                <a href="<?php echo e(route_single_brand(optional($deal->brand)->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id(optional($deal->brand)->image, '', 'grid', false); ?>

                                </a>
                            </div>
                            <div class="content">
                                    <span class="catg"><?php echo e(optional($deal->category)->title); ?></span>
                                <h5 class="title">
                                    <a href="<?php echo e(route_single_product($deal->slug)); ?>"><?php echo e(Str::words($deal->title, 5)); ?></a>
                                </h5>
                                <p class="used">
                                    <sapn class="color-text"><?php echo e(optional($deal->coupon)->coupon_used ?? 0); ?> <?php echo e(__('People')); ?></sapn> <?php echo e(__('Used Total')); ?>

                                </p>
                            </div>
                            <span class="round-01"></span>
                            <span class="round-02"></span>
                        </div>
                        <div class="right-content">
                            <div class="btn-wrapper">
                                
                                <div class="copy-box copy-box-inline copy-<?php echo e($deal->id); ?>">
                                    <a href="javascript:void(0)" data-code="<?php echo e($deal->coupon_code); ?>"
                                       data-product_id="<?php echo e($deal->id); ?>">
                                    </a>
                                    <p class="copy-text"> <?php echo e(__('Copied')); ?> </p>
                                </div>
                                <span class="coupon-wrap">
                                    <span class="btn-default coupon-02">
                                        <a class="copy_coupon" href="javascript:void(0)" data-code="<?php echo e($deal->coupon_code); ?>"
                                           data-product_id="<?php echo e($deal->id); ?>"><?php echo e($deal->coupon_code); ?></a>
                                        <span class="overlay overlay-<?php echo e($deal->id); ?>"><?php echo e($data['button_text']); ?></span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-wrapper text-center" data-margin-top="50">
                    <a href="<?php echo e($data['see_all_link']); ?>"
                       class="btn-default main-color-three border-radius-0"> <?php echo e($data['see_all_text']); ?> </a>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon-final/@core/app/Providers/../PageBuilder/views/home/home_page_special_deals_style_three.blade.php ENDPATH**/ ?>