<div class="Popular-deals-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="to-top-row-right main-color-one" id="popd_01"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="4" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="true" data-autoplaySpeed="2500" data-appendArrows="#popd_01"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                        {"breakpoint": 1200,"settings": {"slidesToShow": 3}},
                        {"breakpoint": 992,"settings": {"slidesToShow": 2}},
                        {"breakpoint": 576,"settings": {"slidesToShow": 1}}
                        ]'>
                    <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-item">
                        <div class="single-exclusive-item style-01">
                            <div class="img-box">
                                <a href="<?php echo e(route_single_category(optional($product->category)->slug)); ?>" class="catg-tag top-right border-radius-5"><?php echo e(optional($product->category)->title); ?></a>
                                <a href="<?php echo e(route('frontend.product.single', $product->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($product->image, null, 'grid', false); ?>

                                </a>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="<?php echo e(route('frontend.product.single', $product->slug)); ?>" class="offer">
                                        <?php echo e(Str::words($product->title, 8)); ?>

                                    </a>
                                </div>
                                <div class="middle-content">
                                    <div class="left-content">
                                        <div class="pricing">
                                            <span class="price"><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></span>
                                            <del><?php echo e(site_currency_symbol()); ?><?php echo e($product->regular_price); ?></del>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="left-content">
                                        <div class="btn-wrapper">
                                            <a href="javascript:void(0)" class="btn-default grab-now" data-id="<?php echo e($product->id); ?>"><?php echo e($data['button_1_text'] ?? __('Coupon Code')); ?></a>
                                        </div>
                                    </div>
                                    <div class="right-content">
                                        <span class="offer-duration grab-now" data-id="<?php echo e($product->id); ?>">
                                            <?php echo e($data['button_2_text'] ?? __('Grab Now!')); ?>

                                        </span>
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
</div>
<!-- Exclusive deal area end --><?php /**PATH E:\XAMPP\htdocs\coupon\@core\app\Providers../../PageBuilder/views/home/home_page_exclusive_deal_style_one.blade.php ENDPATH**/ ?>