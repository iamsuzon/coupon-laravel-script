<div class="featured-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                </div>
            </div>
        </div>
        <div class="row three-column">
            <?php $__currentLoopData = $data['deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="single-featured-item style-05">
                    <div class="img-box">
                        <a href="<?php echo e(route_single_product($deal->slug)); ?>" tabindex="0">
                            <?php echo render_image_markup_by_attachment_id($deal->image, null, 'full', false); ?>

                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <div class="logo-box">
                                    <a href="<?php echo e(route_single_brand(optional($deal->brand)->slug)); ?>" tabindex="0">
                                        <?php echo render_image_markup_by_attachment_id(optional($deal->brand)->image, null, 'grid', false); ?>

                                    </a>
                                </div>
                                <div class="details">
                                    <a href="<?php echo e(route_single_brand(optional($deal->brand)->slug)); ?>" class="title" tabindex="0"><?php echo e(optional($deal->brand)->title); ?></a>
                                    <p class="location"><?php echo e(optional($deal->location)->city_name); ?>, <?php echo e(optional($deal->location)->state_name); ?></p>
                                </div>
                            </div>
                            <div class="right-content">
                                <span class="catg-tag" tabindex="0"><?php echo e(get_product_discount_with_symbol($deal)); ?></span>
                            </div>
                        </div>
                        <div class="middle-content">
                            <p class="offer"><?php echo e(Str::words($deal->title, 10)); ?></p>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="btn-wrapper">
                                        
                                        <div class="copy-box copy-box-inline copy-<?php echo e($deal->id); ?>">
                                            <a href="javascript:void(0)" data-code="<?php echo e($deal->coupon_code); ?>" data-product_id="<?php echo e($deal->id); ?>">
                                            </a>
                                            <p class="copy-text"> <?php echo e(__('Copied')); ?> </p>
                                        </div>
                                        <span class="coupon-wrap v-02">
                                            <span class="btn-default coupon-02">
                                                <a class='copy_coupon' href="javascript:void(0)" data-code="<?php echo e($deal->coupon_code); ?>" data-product_id="<?php echo e($deal->id); ?>"><?php echo e($deal->coupon_code); ?></a>
                                                <span class="overlay">
                                                    <span class="bg overlay-<?php echo e($deal->id); ?>"><?php echo e($data['button']); ?></span>
                                                </span>
                                            </span>
                                        </span>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="period">
                                    <p class="date"> <span class="name"><?php echo e(__('Expired:')); ?></span> <?php echo e($deal->expire_date->format('d M Y')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH E:\XAMPP\htdocs\coupon\@core\app\Providers../../PageBuilder/views/home/home_page_highlight_deals_style_two.blade.php ENDPATH**/ ?>