

<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"> <?php echo e($search); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e($search); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="blog-grid-area-wrapper ctg-brand-product" data-padding-top="0" data-padding-bottom="70">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h3><?php echo e(__('Search Result For:')); ?> <?php echo e($search); ?></h3>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $search_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3" >
                        <div class="single-recent-item style-01" >
                            <div class="img-box">
                                <a href="javascript:void(0)"
                                   class="catg-tag top-right border-radius-5">-<?php echo e($product->discount); ?><?php echo e($product->discount_symbol); ?></a>
                                <a href="<?php echo e(route('frontend.product.single', $product->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($product->image, 'rounded', 'grid', false); ?>

                                </a>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="<?php echo e(route('frontend.product.single', $product->slug)); ?>" class="offer"><?php echo e(Str::words($product->title, 10)); ?></a>
                                </div>
                                <div class="middle-content">
                                    <div class="left-content">

                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="left-content">
                                        <div class="btn-wrapper">
                                            <a href="javascript:void(0)" class="btn-default grab-now" data-id="<?php echo e($product->id); ?>"><?php echo e(__('Coupon Code')); ?></a>
                                        </div>
                                    </div>
                                    <div class="right-content">
                                    <span class="offer-duration grab-now" data-id="<?php echo e($product->id); ?>" style="cursor: pointer">
                                        <?php echo e(__('Grab Now!')); ?>

                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <p class="text-center text-danger my-5"><?php echo e(__('No Search Result Found')); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php echo e($search_results->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/pages/single_search.blade.php ENDPATH**/ ?>