<div class="faq-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 v-03">
                    <h1 class="section-title-main"><?php echo e($data['title']); ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- faq accordion start -->
                <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                        <?php $__currentLoopData = $data['faqs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-header" id="headingOne_<?php echo e($key); ?>">
                                    <h5 class="mb-0">
                                        <a href="#" class="accordion-btn btn-link collapsed" data-toggle="collapse"
                                           data-target="#collapseOne_<?php echo e($key); ?>" aria-expanded="false"
                                           aria-controls="collapseOne">
                                            <?php echo e($faq->title); ?>

                                            <span class="color-1">
                                                <i class="las la-plus open"></i>
                                                <i class="las la-minus close"></i>
                                            </span>
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne_<?php echo e($key); ?>" class="collapse" aria-labelledby="headingOne_<?php echo e($key); ?>"
                                     data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <?php echo $faq->description; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php if($data['pagination_status'] == 'on'): ?>
                        <div class="mt-4">
                            <?php echo e($data['faqs']->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/about/faq_section.blade.php ENDPATH**/ ?>