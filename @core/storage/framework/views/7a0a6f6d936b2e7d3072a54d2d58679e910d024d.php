

<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e($location->city_name); ?>, <?php echo e($location->state_name); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e($location->city_name); ?>

    <?php echo e($location->state_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <?php echo render_site_meta(); ?>

    <?php echo render_site_title($location->city_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="blog-grid-area-wrapper ctg-brand-product" data-padding-top="0" data-padding-bottom="100">
        <div class="container">
            <div class="row three-column">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="single-featured-item style-01">
                        <div class="img-box">
                            <a href="<?php echo e(route_single_category(optional($product->category)->slug)); ?>" class="catg-tag top-left-02 border-radius-15"
                               tabindex="0"><?php echo e(optional($product->category)->title); ?></a>
                            <a href="<?php echo e(route('frontend.product.single',$product->slug)); ?>" tabindex="0">
                                <?php echo render_image_markup_by_attachment_id($product->image,'border-radius-10', 'grid',false); ?>

                            </a>
                        </div>
                        <div class="content">
                            <div class="top-content">
                                <div class="left-content">
                                    <div class="logo-box">
                                        <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>" tabindex="0">
                                            <?php echo render_image_markup_by_attachment_id(optional($product->brand)->image, null, 'grid', false); ?>

                                        </a>
                                    </div>
                                    <div class="details">
                                        <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>" class="title" tabindex="0"><?php echo e(optional($product->brand)->title); ?></a>
                                        <p class="location"><?php echo e(optional($product->location)->city_name); ?>, <?php echo e(optional($product->location)->state_name); ?></p>
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
                                <a href="<?php echo e(route('frontend.product.single',$product->slug)); ?>" class="offer"><?php echo e($product->title); ?></a>
                            </div>
                            <div class="bottom-content">
                                <div class="left-content">
                                    <div class="pricing">
                                        <span class="price"><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></span>
                                        <del><?php echo e(site_currency_symbol()); ?><?php echo e($product->regular_price); ?></del>
                                    </div>
                                </div>
                                <div class="right-content">
                                    <span class="offer-duration">
                                        <?php echo render_deal_expire_date_markup($product->expire_date); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <?php echo e(__('No Data Available')); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination" data-padding-top="50">
                        <ul class="pagination-list">
                            <?php echo e($products->links()); ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/location.blade.php ENDPATH**/ ?>