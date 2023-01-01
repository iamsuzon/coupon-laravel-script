<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('Change Password')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Change Password')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/custom-dashboard.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>

        <div class="parent my-5">
            <h2 class="title"><?php echo e(__('Change Password')); ?></h2>
            <form action="<?php echo e(route('user.password.change')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="old_password"><?php echo e(__('Old Password')); ?></label>
                    <input type="password" class="form-control" id="old_password" name="old_password"
                           placeholder="<?php echo e(__('Old Password')); ?>">
                </div>
                <div class="form-group">
                    <label for="password"><?php echo e(__('New Password')); ?></label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="<?php echo e(__('New Password')); ?>">
                </div>
                <div class="form-group">
                    <label for="password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                    <input type="password" class="form-control" id="password_confirmation"
                           name="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>">
                </div>
                <div class="btn-wrapper">
                    <button id="save" type="submit" class="btn-default"><?php echo e(__('Save changes')); ?></button>
                </div>
            </form>
        </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.save','data' => []]); ?>
<?php $component->withName('btn.save'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/user/dashboard/change-password.blade.php ENDPATH**/ ?>