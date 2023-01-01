<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Forget Password')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <li class="list-item"><a href="#"><?php echo e(__('Forget Password')); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-page-title'); ?>
    <?php echo e(__('Forget Password')); ?>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
    <section class="login-page-wrapper my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h2 class="text-center margin-bottom-30"><?php echo e(__('Forget Password ?')); ?></h2>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('backend.partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form action="<?php echo e(route('user.forget.password')); ?>" method="post" enctype="multipart/form-data" class="contact-page-form style-01">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="<?php echo e(__('Username')); ?>">
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" id="send" class="boxed-btn btn-saas btn-block btn-default"><?php echo e(__('Send Reset Mail')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.custom','data' => ['id' => 'send','title' => __('Sending')]]); ?>
<?php $component->withName('btn.custom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('send'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Sending'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/user/forget-password.blade.php ENDPATH**/ ?>