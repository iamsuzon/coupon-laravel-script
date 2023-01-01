
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.blog-inline-css','data' => []]); ?>
<?php $component->withName('blog-inline-css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Product Single Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
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
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h3 class="header-title"><?php echo e(__('Single Product Options')); ?>   </h3>
                            </div>
                        </div>

                        <?php $ad = \App\ProductSingleSettings::first(); ?>
                        <form class="mt-4" action="<?php echo e(route('admin.product.single.settings')); ?>" method="post"
                              id="product_advertisement">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ad_type"><?php echo e(__('Advertisement Type')); ?></label>
                                        <select class="form-control" name="ad_type" id="ad_type">
                                            <option disabled><?php echo e(__('Select a Type')); ?></option>
                                            <option value="all" <?php echo e(isset($ad->ad_type) AND $ad->ad_type == 'all' ? 'selected' : ''); ?>><?php echo e(__('All')); ?></option>
                                            <option value="image" <?php echo e(isset($ad->ad_type) AND $ad->ad_type == 'image' ? 'selected' : ''); ?>><?php echo e(__('Image')); ?></option>
                                            <option value="scripts" <?php echo e(isset($ad->ad_type) AND $ad->ad_type == 'scripts' ? 'selected' : ''); ?>><?php echo e(__('Scripts')); ?></option>
                                            <option value="google_adsense" <?php echo e(isset($ad->ad_type) AND $ad->ad_type == 'google_adsense' ? 'selected' : ''); ?>><?php echo e(__('Google Adsense')); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="title"><?php echo e(__('Advertisement Orders')); ?></label>
                                        <select class="form-control" name="ad_order" id="ad_order">
                                            <option disabled><?php echo e(__('Select a Order')); ?></option>
                                            <option value="asc" <?php echo e(isset($ad->ad_order) AND $ad->ad_order == 'asc' ? 'selected' : ''); ?>><?php echo e(__('Ascending')); ?></option>
                                            <option value="desc" <?php echo e(isset($ad->ad_order) AND $ad->ad_order == 'desc' ? 'selected' : ''); ?>><?php echo e(__('Descending ')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="site_global_currency">Site Global Currency</label>
                                        <select name="site_global_currency" class="form-control" id="site_global_currency">

                                            <?php $__currentLoopData = $all_currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php echo e(get_static_option('site_global_currency') == $key ? "selected" : ''); ?>><?php echo e($key); ?> ( <?php echo e($currency); ?> )</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success mt-3" type="submit">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/backend/product/single-settings.blade.php ENDPATH**/ ?>