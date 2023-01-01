<div class="Testimonial-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 main-color-two">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                    <div class="to-top-row-right main-color-one" id="test_01"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="3" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="true" data-autoplaySpeed="2500" data-appendArrows="#test_01"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                {"breakpoint": 1800,"settings": {"slidesToShow": 3}},
                {"breakpoint": 1200,"settings": {"slidesToShow": 2}},
                {"breakpoint": 992,"settings": {"slidesToShow": 2}},
                {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                ]'>
                    <?php $__currentLoopData = $data['review']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-item">
                        <div class="single-testimonial-item style-01">
                            <div class="quote">
                                <i class="flaticon-left-quote icon"></i>
                            </div>
                            <p class="info"><?php echo e($review->review); ?></p>
                            <div class="client-details">
                                <h6 class="title"><?php echo e($review->review_by); ?></h6>
                                <div class="star">
                                    <?php echo render_ratings($review->rating); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_customer_review_style_two.blade.php ENDPATH**/ ?>