<div class="contact-us-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info">
                    <div class="title"><?php echo e($data['title']); ?></div>
                    <p class="phone"><?php echo e($data['phone']); ?></p>
                    <p class="email"><?php echo e($data['email']); ?></p>
                    <p class="info"><?php echo e($data['address']); ?></p>

                    <div class="social-icon">
                        <ul class="social-link-list">
                            <?php $__currentLoopData = current($data['top_cards']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="link-item">
                                    <a href="<?php echo e($data['top_cards']['link'][$loop->index]); ?>">
                                        <i class="<?php echo e($data['top_cards']['icon'][$loop->index]); ?> icon"></i>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="google-map" data-padding-top="50" data-padding-bottom="0">
                    <?php echo $data['location']; ?>

                </div>
            </div>
            <div class="col-md-8">
                <div class="get-in-touch-wrapper">
                    <h3 class="title"><?php echo e($data['title_2']); ?></h3>
                    <?php echo $data['form']; ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/contact/contact_area_top.blade.php ENDPATH**/ ?>