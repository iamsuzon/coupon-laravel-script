<div class="counter-area-wrapper bg-ex" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <?php $__currentLoopData = current($data['about_page_counter']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="single-counter-box">
                                        <span class="counter-bg">
                                            <span class="counter">
                                                <span class="count-num"><?php echo e($data['about_page_counter']['number'][$loop->index] ?? ''); ?> </span><?php echo e($data['about_page_counter']['extra_field'][$loop->index] ?? ''); ?>

                                            </span>
                                        </span>
                                    <h3 class="title"><?php echo e($title); ?></h3>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/about/about_counter.blade.php ENDPATH**/ ?>