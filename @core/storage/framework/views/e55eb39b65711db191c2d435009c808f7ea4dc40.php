<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('User Dashboard')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-page-title'); ?>
    <?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="body-overlay"></div>
    <div class="dashboard-area dashboard-padding my-5 py-5">
        <div class="container-fluid">
            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                <div class="dashboard-left-content">
                    <div class="dashboard-close-main">
                        <div class="close-bars"> <i class="las la-times"></i> </div>
                        <div class="dashboard-top padding-top-40">
                            <div class="thumb">
                                <?php echo render_image_markup_by_attachment_id(Auth::guard('web')->user()->image ?? render_image_markup_by_attachment_id(get_static_option('single_blog_page_comment_avatar_image')), '','grid', false); ?>

                            </div>
                        </div>
                        <div class="dashboard-bottom margin-top-35 margin-bottom-50">
                            <ul class="dashboard-list ">
                                <li class="list <?php if(request()->routeIs('user.home')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.home')); ?>"> <i class="las la-th"></i> <?php echo e(__('Dashboard')); ?> </a>
                                </li>
                                <li class="list <?php if(request()->routeIs('user.product') || request()->routeIs('user.blog.new') || request()->routeIs('user.blog.edit')): ?> active <?php endif; ?> ">
                                    <a href="<?php echo e(route('user.product')); ?>"> <i class="las la-cogs"></i> <?php echo e(__('All Products')); ?> </a>
                                </li>
                                <li class="list <?php if(request()->routeIs('user.home.wishlist')): ?> active <?php endif; ?> ">
                                    <a href="<?php echo e(route('user.home.wishlist')); ?>"> <i class="far fa-list-alt"></i> <?php echo e(__('All Wishlist')); ?> </a>
                                </li>
                                <li class="list <?php if(request()->routeIs('user.home.edit.profile')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.home.edit.profile')); ?>"> <i class="las la-tasks"></i> <?php echo e(__('Edit Profile')); ?> </a>
                                </li>
                                <li class="list <?php if(request()->routeIs('user.home.change.password')): ?> active <?php endif; ?> ">
                                    <a href="<?php echo e(route('user.home.change.password')); ?>"> <i class="las la-tasks"></i> <?php echo e(__('Change Password')); ?> </a>
                                </li>

                                <li class="list">
                                    <a href="<?php echo e(route('frontend.user.logout')); ?>" ><i class="las la-sign-out-alt"></i><?php echo e(__('Logout')); ?></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="dashboard-right">

                    <div class="parent">
                        <div class="col-xl-12">
                               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
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
                            <?php echo $__env->yieldContent('section'); ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
        <script>
            $('.close-bars, .body-overlay').on('click', function() {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').removeClass('active');
        });
            $('.sidebar-icon').on('click', function() {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').addClass('active');
        });
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/user/dashboard/user-master.blade.php ENDPATH**/ ?>