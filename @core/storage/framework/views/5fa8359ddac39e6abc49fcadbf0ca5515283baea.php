<div class="grid-item" data-padding-top="85">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title-wrapper style-01">
                <h1 class="section-title-main text-capitalize"><?php echo e(__('You may like')); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="single-featured-item style-01">
                    <div class="img-box">
                        <a href="<?php echo e(route_single_category(optional($product->category)->slug)); ?>"
                           class="catg-tag top-left border-radius-15"
                           tabindex="0"><?php echo e(optional($product->category)->title); ?></a>
                        <a href="<?php echo e(route('frontend.product.single',$product->slug)); ?>" tabindex="0">
                            <?php echo render_image_markup_by_attachment_id($product->image, 'border-radius-10', '',false); ?>

                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <div class="logo-box">
                                    <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>" tabindex="0">
                                        <?php echo render_image_markup_by_attachment_id(optional($product->brand)->image,'','grid',false); ?>

                                    </a>
                                </div>
                                <div class="details">
                                    <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>" class="title"
                                       tabindex="0"><?php echo e(optional($product->brand)->title); ?></a>
                                    <p class="location"><?php echo e(optional($product->location)->city_name); ?>

                                        , <?php echo e(optional($product->location)->state_name); ?></p>
                                </div>
                            </div>
                            <div class="right-content">
                                <?php if(get_product_rating_average($product->id) > 0): ?>
                                    <div class="star">
                                        <?php echo render_ratings(get_product_rating_average($product->id)); ?>

                                    </div>
                                    <div class="rating-count">(<?php echo e(count($product->reviews)); ?>)
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="middle-content">
                            <a href="<?php echo e(route('frontend.product.single',$product->slug)); ?>"
                               class="offer"><?php echo e($product->title); ?></a>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="pricing">
                                    <span class="price"><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></span>
                                    <del><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></del>
                                </div>
                            </div>
                            <div class="right-content">
                                <span class="offer-duration">
                                    <?php if($product->expire_date): ?>
                                        <?php echo render_deal_expire_date_markup($product->expire_date); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/pages/product-single/you_may_like.blade.php ENDPATH**/ ?>