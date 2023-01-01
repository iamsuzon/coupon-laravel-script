<div class="recent-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two has-siblings">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="recent-name-list-wrapper">
                        <ul class="recent-list main-color-three">
                            <li data-id="null"
                                data-filter="*"
                                class="active recent-deal"
                                data-route="<?php echo e($data['get_recent_products_ajax']); ?>"><?php echo e(__('All Deals')); ?>

                            </li>
                            <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="recent-deal"
                                    data-id="<?php echo e($category->id); ?>"
                                    data-filter=".<?php echo e($category->title); ?>"
                                    data-product="<?php echo e($data['limit_product']); ?>"
                                    data-route="<?php echo e($data['get_recent_products_ajax']); ?>"
                                ><?php echo e($category->title); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row recent-item-wrap">
            <div class="load-ajax-data"></div>
            <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="single-recent-item style-03">
                    <div class="img-box">
                        <a href="<?php echo e(route_single_category(optional($product->category)->slug)); ?>" class="catg-tag top-right border-radius-15"><?php echo e(optional($product->category)->title); ?></a>
                        <a href="<?php echo e(route_single_product($product->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($product->image, 'border-radius-2', 'full', false); ?>

                        </a>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <p class="offer">
                                    <a href="<?php echo e(route_single_product($product->slug)); ?>"><?php echo e(Str::words($product->title, 8)); ?></a>
                                </p>
                                <div class="details">
                                    <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>" class="title"><?php echo e(optional($product->brand)->title); ?></a>
                                    <p class="location"> <span class="dot">·</span> <?php echo e(optional($product->location)->city_name); ?>, <?php echo e(optional($product->location)->state_name); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="pricing">
                                    <span class="price"><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></span>
                                    <del><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></del>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="btn-wrapper left">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="<?php echo e($product->id); ?>"><?php echo e(__('Coupon Code')); ?></a>
                                </div>

                                <div class="btn-wrapper right">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="<?php echo e($product->id); ?>"><?php echo e(__('Get Offer!')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_recent_deals_style_two.blade.php ENDPATH**/ ?>