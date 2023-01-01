<?php $formates = isset($formates) ? 'jpg,jpeg,png,'.$formates : 'jpg,jpeg,png'; ?>
<?php $sizes = isset($sizes) ? '1920x1018,'.$sizes : '1920x1018'; ?>

<small class="form-text text-muted">
    <?php echo e(__('allowed image format :'  ). $formates ?? ''); ?>

    <?php echo e(__('and image size :'  ). $sizes ?? ''); ?>

</small><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/components/recommended_image_size.blade.php ENDPATH**/ ?>