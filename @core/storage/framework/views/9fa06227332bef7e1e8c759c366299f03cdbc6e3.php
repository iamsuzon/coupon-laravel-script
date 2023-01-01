<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('User Wishlist')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('User Wishlist')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/custom-dashboard.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>

    <div class="row">
         <div class="col-xl-12 col-md-12 orders-child mt-5">
             <div class="dashboard-form-wrapper">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body">
                                 <h4 class="pb-3"><?php echo e(__('Saved Posts')); ?></h4>


                                 <div class="table-wrap table-responsive">
                                     <table class="table table-default" id="all_blog_table">
                                         <thead>
                                         <th><?php echo e(__('ID')); ?></th>
                                         <th><?php echo e(__('Title')); ?></th>
                                         <th><?php echo e(__('Image')); ?></th>
                                         <th><?php echo e(__('Action')); ?></th>
                                         </thead>
                                         <tbody>
                                         <?php $__empty_1 = true; $__currentLoopData = $all_wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                             <tr>
                                                 <td><?php echo e(optional($data->product)->id); ?></td>
                                                 <td><?php echo e(optional($data->product)->getTranslation('title',$user_select_lang_slug) ?? ''); ?></td>
                                                 <td>
                                                     <?php
                                                         $product_img = get_attachment_image_by_id(optional($data->product)->image,'thumb',true);
                                                     ?>
                                                     <?php if(!empty($product_img)): ?>
                                                         <div class="attachment-preview">
                                                             <div class="thumbnail">
                                                                 <div class="centered">
                                                                     <img class="avatar user-thumb rounded" src="<?php echo e($product_img['img_url']); ?>" alt="" style="width: 100px">
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     <?php endif; ?>
                                                </td>
                                                 <td>
                                                     <a class="btn btn-info btn-xs mb-3 mr-1" target="_blank" href="<?php echo e(route('frontend.product.single',optional($data->product)->slug)); ?>">
                                                         <i class="las la-eye"></i>
                                                     </a>
                                                     <a class="btn btn-danger btn-xs mb-3 mr-1" href="<?php echo e(route('user.wishlist.store', optional($data->product)->slug)); ?>">
                                                         <i class="lar la-heart icon"></i>
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
                 <div class="row mt-4">
                     <div class="col-12">
                         <?php echo e($all_wishlist->links()); ?>

                     </div>
                 </div>
             </div>
         </div>
    </div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/user/dashboard/user-wishlist.blade.php ENDPATH**/ ?>