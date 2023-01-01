$(document).on('click','#save',function () {
    $(this).addClass("disabled")
    $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Saving")); ?>');
});<?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/components/btn/save.blade.php ENDPATH**/ ?>