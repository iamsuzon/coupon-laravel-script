<div class="featured-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-02">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                </div>
            </div>
        </div>
        <div class="row three-column">
            <?php $__currentLoopData = $data['deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="single-featured-item style-04">
                    <div class="img-box">
                        <span class="catg-tag top-right" tabindex="0">
                            <?php echo e(get_product_discount_with_symbol($product)); ?>

                        </span>
                        <a href="<?php echo e(route_single_product($product->slug)); ?>" tabindex="0">
                            <?php echo render_image_markup_by_attachment_id($product->image, '', 'grid', false); ?>

                        </a>
                    </div>
                    <div class="content">
                        <div class="middle-content">
                            <p class="offer">
                                <a href="<?php echo e(route_single_product($product->slug)); ?>"><?php echo e(Str::words($product->title, 10)); ?></a>
                            </p>
                            <div class="period">
                                <p class="date"> <span class="name"><?php echo e(__('Expired:')); ?></span> <?php echo e($product->expire_date->format('d M Y')); ?></p>
                            </div>
                        </div>
                        <div class="top-content">
                            <div class="left-content">
                                <div class="logo-box">
                                    <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>" tabindex="0">
                                        <?php echo render_image_markup_by_attachment_id(optional($product->brand)->image, 'recent-deal-brand-image', 'thumb', false); ?>

                                    </a>
                                </div>
                                <div class="details">
                                    <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>" class="title" tabindex="0"><?php echo e(optional($product->brand)->title); ?></a>
                                    <p class="location"><?php echo e(optional($product->location)->city_name); ?>, <?php echo e(optional($product->location)->state_name); ?></p>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="<?php echo e($product->id); ?>"><?php echo e($data['button_text']); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_recent_deals_style_three.blade.php ENDPATH**/ ?>