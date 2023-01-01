<div class="featured-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="to-top-row-right main-color-one" id="fdeal_01"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="3" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="false" data-autoplaySpeed="2500" data-appendArrows="#fdeal_01"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                    {"breakpoint": 1200,"settings": {"slidesToShow": 2}},
                    {"breakpoint": 992,"settings": {"slidesToShow": 2}},
                    {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                    ]'>

                    <?php $__currentLoopData = $data['deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-item">
                            <div class="single-featured-item style-01">
                                <div class="img-box">
                                    <a href="<?php echo e(route_single_category(optional($deal->category)->slug)); ?>" class="catg-tag top-left-02 border-radius-15"><?php echo e(optional($deal->category)->title); ?></a>
                                    <a href="<?php echo e(route_single_product($deal->slug)); ?>">
                                        <?php echo render_image_markup_by_attachment_id($deal->image, 'border-radius-10', 'grid', false); ?>

                                    </a>
                                    <?php if($deal->discount): ?>
                                        <div class="coupon-code-01">
                                            <div class="top-text">
                                                <p class="text-01"><?php echo e(__('UPTO')); ?></p>
                                                <p class="price-text"><?php echo e($deal->discount); ?><?php echo e($deal->discount_symbol); ?></p>
                                                <p class="dis-text"><?php echo e(__('Discount!')); ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="content">
                                    <div class="top-content">
                                        <div class="left-content">
                                            <div class="logo-box">
                                                <a href="<?php echo e(route_single_brand(optional($deal->brand)->slug)); ?>">
                                                    <?php echo render_image_markup_by_attachment_id(optional($deal->brand)->image, '', 'thumb', false); ?>

                                                </a>
                                            </div>
                                            <div class="details">
                                                <a href="<?php echo e(route_single_brand(optional($deal->brand)->slug)); ?>" class="title"><?php echo e(optional($deal->brand)->title); ?></a>
                                                <p class="location"><?php echo e(optional($deal->location)->city_name); ?>, <?php echo e(optional($deal->location)->state_name); ?></p>
                                            </div>
                                        </div>
                                        <div class="right-content">
                                            <?php if(get_product_rating_average($deal->id) > 0): ?>
                                                <div class="star">
                                                    <?php echo render_ratings(get_product_rating_average($deal->id)); ?>

                                                </div>
                                                <div class="rating-count">(<?php echo e(count($deal->reviews)); ?>)
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
                                                <a href="javascript:void(0)" class="btn-default grab-now"
                                                data-id="<?php echo e($deal->id); ?>"
                                                ><?php echo e(__('Grab Now!')); ?></a>
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
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_popular_offer.blade.php ENDPATH**/ ?>