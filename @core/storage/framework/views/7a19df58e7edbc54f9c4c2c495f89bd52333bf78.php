<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Verify Your Account')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('Verify Your Account')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="login-page-wrapper my-5">
        <div class="container">
            <div class="row justify-content-center margin-bottom-90 margin-top-90">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h3 class="text-center margin-bottom-30"><?php echo e(__('Verify Your Account')); ?></h3>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php echo e(__('Check Mail for Verification code.')); ?></strong>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <form action="<?php echo e(route('user.email.verify')); ?>" method="post" enctype="multipart/form-data" class="contact-page-form style-01">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mt-2">
                                <input type="text" name="verification_code" class="form-control" placeholder="<?php echo e(__('Verify Code')); ?>">
                            </div>
                            <div class="form-group btn-wrapper my-3">
                                <button type="submit" id="verify" class="btn-default btn-block"><?php echo e(__('Verify Email')); ?></button>
                            </div>
                            <div class="row mb-4 rmber-area">
                                <div class="col-12 text-center">
                                    <a href="<?php echo e(route('user.resend.verify.mail')); ?>" id="send"><?php echo e(__('Send Verify Code Again?')); ?></a>
                                </div>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.custom','data' => ['id' => 'verify','title' => __('Verifying')]]); ?>
<?php $component->withName('btn.custom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('verify'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Verifying'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.custom','data' => ['id' => 'send','title' => __('Sending Verify Code')]]); ?>
<?php $component->withName('btn.custom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('send'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Sending Verify Code'))]); ?>
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
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/user/email-verify.blade.php ENDPATH**/ ?>