
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('RSS Feed Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__("RSS Feed Settings")); ?></h4>

                        <form action="<?php echo e(route('admin.general.rss.feed.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="site_rss_feed_url"><?php echo e(__("RSS Feed URL")); ?></label>
                                <input type="text" name="site_rss_feed_url" id="site_rss_feed_url" class="form-control" value="<?php echo e(get_static_option('site_rss_feed_url')); ?>">
                                <p class="info-text"><?php echo e(__('this url will be add after. www.youdomain.com/')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="site_rss_feed_title"><?php echo e(__('RSS Feed Title')); ?></label>
                                <input type="text" name="site_rss_feed_title" id="site_rss_feed_title" class="form-control" value="<?php echo e(get_static_option('site_rss_feed_title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="site_rss_feed_description"><?php echo e(__('RSS Feed Description')); ?></label>
                                <textarea name="site_rss_feed_description" id="site_rss_feed_description" cols="30" rows="5" class="form-control"><?php echo e(get_static_option('site_rss_feed_description')); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>

                        </form>

                    </div>

                </div>



            </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/backend/general-settings/rss-feed-settings.blade.php ENDPATH**/ ?>