<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('User Register')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-page-title'); ?>
    <?php echo e(__('User Register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="sign-in-area-wrapper" data-padding-top="10" data-padding-bottom="110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="sign-up register">
                        <h4 class="title"><?php echo e(__('sign up')); ?></h4>
                        <div class="form-wrapper">
                            <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('backend.partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <form action="<?php echo e(route('user.register')); ?>" method="post" enctype="multipart/form-data" class="contact-page-form style-01">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo e(__('Name')); ?><span
                                                        class="required">*</span></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                                   placeholder="Type your Name" value="<?php echo e(old('name')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo e(__('Username')); ?><span
                                                        class="required">*</span></label>
                                            <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                                                   placeholder="Type Last Name" value="<?php echo e(old('username')); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo e(__('Email Address')); ?><span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Type your mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo e(__('Country')); ?><span class="required">*</span></label>
                                   <?php echo get_country_field('country','country','form-control'); ?>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo e(__('City')); ?><span class="required">*</span></label>
                                    <input type="text" name="city" class="form-control" id="exampleInputEmail1" placeholder="Type your city" value="<?php echo e(old('city')); ?>">
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo e(__('Password')); ?><span
                                                        class="required">*</span></label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                                   placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo e(__('Confirmed Password')); ?><span
                                                        class="required">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1"
                                                   placeholder="Confirmed Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <div class="box-wrap sign-up">
                                        <div class="left w-100">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"> <?php echo e(__('By creating an account')); ?>,
                                                <?php echo e(__('you agree to the')); ?> <a href="<?php echo e(get_static_option('terms_of_service_url')); ?>"><?php echo e(__('terms of service')); ?></a> <?php echo e(__('and')); ?>

                                                <a href="<?php echo e(get_static_option('condition_url')); ?>"><?php echo e(__('Conditions')); ?></a><?php echo e(__(',  and')); ?> <a href="<?php echo e(get_static_option('privacy_policy_url')); ?>"><?php echo e(__('privacy policy')); ?></a> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="submit" class="btn-default rounded-btn"><?php echo e(__('sign up')); ?></button>
                                </div>
                            </form>
                            <p class="info"><?php echo e(__('Already have an Account?')); ?> <a href="<?php echo e(route('user.login')); ?>" class="active"><?php echo e(__('Sign in')); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.custom','data' => ['id' => 'register','title' => __('Please Wait..')]]); ?>
<?php $component->withName('btn.custom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('register'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Please Wait..'))]); ?>
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

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/user/register.blade.php ENDPATH**/ ?>