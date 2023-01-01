<div class="featured-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="btn-wrapper">
                        <a href="<?php echo e($data['view_all_link']); ?>" class="view-all main-color-two"><?php echo e($data['view_all_text']); ?>

                            <i class="las la-long-arrow-alt-right icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row three-column">
            <?php $__currentLoopData = $data['deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="single-featured-item style-03 bg-white">
                    <div class="img-box">
                        <a href="<?php echo e(route_single_category(optional($deal->category)->slug)); ?>" class="catg-tag top-right border-radius-15"><?php echo e(optional($deal->category)->title); ?></a>
                        <a href="<?php echo e(route_single_product($deal->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($deal->image, 'border-radius-15', 'grid', false); ?>

                        </a>
                        <span class="logo">
                            <?php echo render_image_markup_by_attachment_id(optional($deal->brand)->image, null, 'grid', false); ?>

                        </span>
                    </div>
                    <div class="content">
                        <div class="top-content">
                            <div class="left-content">
                                <div class="details">
                                    <a href="<?php echo e(route_single_brand(optional($deal->brand)->slug)); ?>" class="title"><?php echo e(optional($deal->brand)->title); ?></a>
                                    <p class="location">
                                        <span class="dot">·</span>
                                        <?php echo e(optional($deal->location)->city_name); ?>, <?php echo e(optional($deal->location)->state_name); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="star" style="color: gold;font-size: 13px">
                                    <?php echo render_ratings(get_product_rating_average($deal->id)); ?>

                                </div>
                                <?php if(get_product_rating_average($deal->id) > 0): ?>
                                    <div class="rating-count">(<?php echo e(count($deal->reviews)); ?>)</div>
                                <?php else: ?>
                                    <div class="rating-count">

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="middle-content">
                            <p class="offer">
                                <a href="<?php echo e(route_single_product($deal->slug)); ?>"><?php echo e(Str::words($deal->title, 10)); ?></a>
                            </p>
                        </div>
                        <div class="bottom-content">
                            <div class="left-content">
                                <div class="pricing">
                                    <span class="price"><?php echo e(site_currency_symbol()); ?><?php echo e($deal->sale_price); ?></span>
                                    <del><?php echo e(site_currency_symbol()); ?><?php echo e($deal->regular_price); ?></del>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="btn-default grab-now" data-id="<?php echo e($deal->id); ?>"><?php echo e($data['button']); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_featured_deals_style_two.blade.php ENDPATH**/ ?>