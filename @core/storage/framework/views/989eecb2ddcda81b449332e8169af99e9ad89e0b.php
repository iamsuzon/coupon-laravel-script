<div class="recent-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 has-siblings">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="recent-name-list-wrapper">
                        <ul class="recent-list main-color-two">
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
            <?php $__currentLoopData = $data['deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3" >
                    <div class="single-recent-item style-01" >
                        <div class="img-box">
                            <a href="javascript:void(0)"
                               class="catg-tag top-right border-radius-5">-<?php echo e($product->discount); ?><?php echo e($product->discount_symbol); ?></a>
                            <a href="<?php echo e(route('frontend.product.single', $product->slug)); ?>">
                                <?php echo render_image_markup_by_attachment_id($product->image, 'rounded', 'grid', false); ?>

                            </a>
                        </div>
                        <div class="content">
                            <div class="top-content">
                                <a href="<?php echo e(route('frontend.product.single', $product->slug)); ?>" class="offer"><?php echo e(Str::words($product->title, 8)); ?></a>
                            </div>
                            <div class="middle-content">
                                <div class="left-content">

                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="left-content">
                                    <div class="btn-wrapper">
                                        <a href="javascript:void(0)" class="btn-default grab-now" data-id="<?php echo e($product->id); ?>"><?php echo e(__('Coupon Code')); ?></a>
                                    </div>
                                </div>
                                <div class="right-content">
                                    <span class="offer-duration grab-now" data-id="<?php echo e($product->id); ?>" style="cursor: pointer">
                                        <?php echo e(__('Grab Now!')); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH E:\XAMPP\htdocs\coupon\@core\app\Providers../../PageBuilder/views/home/home_page_recent_deals.blade.php ENDPATH**/ ?>