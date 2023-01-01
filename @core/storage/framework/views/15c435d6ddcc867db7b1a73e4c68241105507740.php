<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('User Dashboard')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/custom-dashboard.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>

    <div class="row">
        <div class="col-xl-6 col-md-6 orders-child">
            <div class="single-orders">

                <div class="orders-flex-content">
                    <div class="icon">
                        <i class="las la-tasks"></i>
                    </div>
                    <div class="contents">
                        <h2 class="order-titles">#<?php echo e(auth()->guard('web')->user()->id); ?> </h2>
                        <span class="order-para"> <?php echo e(__('User ID')); ?> </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 orders-child">
            <div class="single-orders">

                <div class="orders-flex-content">

                    <div class="contents">
                        <h2 class="order-titles"> <?php echo e($total_post); ?> </h2>
                        <span class="order-para"><?php echo e(__('Total Created Post')); ?> </span>
                    </div>
                </div>
            </div>
        </div>

         <div class="col-xl-12 col-md-12 orders-child mt-5">
             <div class="dashboard-form-wrapper">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body">
                                 <h4 class="pb-3"><?php echo e(__('Recent Posts')); ?></h4>


                                 <div class="table-wrap table-responsive">
                                     <table class="table table-default" id="all_blog_table">
                                         <thead>
                                         <th><?php echo e(__('ID')); ?></th>
                                         <th><?php echo e(__('Title')); ?></th>
                                         <th><?php echo e(__('View')); ?></th>
                                         <th><?php echo e(__('Status')); ?></th>
                                         <th><?php echo e(__('Action')); ?></th>
                                         </thead>
                                         <tbody>
                                         <?php $__empty_1 = true; $__currentLoopData = $all_auth_user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                             <tr>
                                                 <td><?php echo e($data->id); ?></td>
                                                 <td><?php echo e($data->getTranslation('title',$user_select_lang_slug) ?? ''); ?></td>
                                                 <td><?php echo e($data->views ?? ''); ?></td>

                                                 <td>
                                                     <div class="mt-2">
                                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.status-span','data' => ['status' => $data->status]]); ?>
<?php $component->withName('status-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <a class="btn btn-primary btn-xs mb-3 mr-1" href="<?php echo e(route('user.product.edit',$data->id).'?lang='.$user_select_lang_slug); ?>">
                                                         <i class="las la-edit"></i>
                                                     </a>

                                                     <a class="btn btn-info btn-xs mb-3 mr-1" target="_blank" href="<?php echo e(route('frontend.product.single',$data->slug)); ?>">
                                                         <i class="las la-eye"></i>
                                                     </a>
                                                 </td>
                                             </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                             <tr>
                                                 <td class="text-center" colspan="5"><?php echo e(__('No Data Available')); ?></td>
                                             </tr>
                                         <?php endif; ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/user/dashboard/user-home.blade.php ENDPATH**/ ?>