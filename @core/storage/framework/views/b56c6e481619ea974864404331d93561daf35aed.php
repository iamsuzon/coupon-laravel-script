<?php $__env->startSection('style'); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('SEO Settings')); ?>

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
                        <h4 class="header-title"><?php echo e(__("SEO Settings")); ?></h4>
                        <form action="<?php echo e(route('admin.general.seo.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('backend.partials.languages-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="nav-home-<?php echo e($lang->slug); ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="site_meta_<?php echo e($lang->slug); ?>_tags"><?php echo e(__('Site Meta Tags')); ?></label>
                                            <input type="text" name="site_meta_<?php echo e($lang->slug); ?>_tags"  class="form-control" data-role="tagsinput" value="<?php echo e(get_static_option('site_meta_'.$lang->slug.'_tags')); ?>" id="site_meta_<?php echo e($lang->slug); ?>_tags">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_meta_<?php echo e($lang->slug); ?>_description"><?php echo e(__('Site Meta Description')); ?></label>
                                            <textarea name="site_meta_<?php echo e($lang->slug); ?>_description"  class="form-control" id="site_meta_<?php echo e($lang->slug); ?>_description"><?php echo e(get_static_option('site_meta_'.$lang->slug.'_description')); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="og_meta_<?php echo e($lang->slug); ?>_title"><?php echo e(__('Og Meta Title')); ?></label>
                                            <input type="text" name="og_meta_<?php echo e($lang->slug); ?>_title"  class="form-control"  value="<?php echo e(get_static_option('og_meta_'.$lang->slug.'_title')); ?>" id="og_meta_<?php echo e($lang->slug); ?>_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="og_meta_<?php echo e($lang->slug); ?>_description"><?php echo e(__('Og Meta Description')); ?></label>
                                            <textarea name="og_meta_<?php echo e($lang->slug); ?>_description"  class="form-control" id="og_meta_<?php echo e($lang->slug); ?>_description"><?php echo e(get_static_option('og_meta_'.$lang->slug.'_description')); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="og_meta_<?php echo e($lang->slug); ?>_site_name"><?php echo e(__('Og Meta Site Name')); ?></label>
                                            <input type="text" name="og_meta_<?php echo e($lang->slug); ?>_site_name"  class="form-control"  value="<?php echo e(get_static_option('og_meta_'.$lang->slug.'_site_name')); ?>" id="og_meta_<?php echo e($lang->slug); ?>_site_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="og_meta_<?php echo e($lang->slug); ?>_url"><?php echo e(__('Og Meta URL')); ?></label>
                                            <input type="text" name="og_meta_<?php echo e($lang->slug); ?>_url"  class="form-control"  value="<?php echo e(get_static_option('og_meta_'.$lang->slug.'_url')); ?>" id="og_meta_<?php echo e($lang->slug); ?>_url">
                                        </div>
                                        <div class="form-group">
                                            <label for="og_meta_<?php echo e($lang->slug); ?>_image"><?php echo e(__('Og Meta Image Image')); ?></label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap">
                                                    <?php
                                                        $og_meta_image = get_attachment_image_by_id(get_static_option('og_meta_'.$lang->slug.'_image'),null,true);
                                                        $og_meta_image_btn_label =__( 'Upload Image');
                                                    ?>
                                                    <?php if(!empty($og_meta_image)): ?>
                                                        <div class="attachment-preview">
                                                            <div class="thumbnail">
                                                                <div class="centered">
                                                                    <img class="avatar user-thumb" src="<?php echo e($og_meta_image['img_url']); ?>" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php  $site_breadcrumb_bg_btn_label = __('Change Image'); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <input type="hidden" id="og_meta_<?php echo e($lang->slug); ?>_image" name="og_meta_<?php echo e($lang->slug); ?>_image" value="<?php echo e(get_static_option('og_meta_'.$lang->slug.'_image')); ?>">
                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                    <?php echo e(__($site_breadcrumb_bg_btn_label)); ?>

                                                </button>
                                            </div>
                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png, Recommended image size 1920x600')); ?></small>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
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
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.update','data' => []]); ?>
<?php $component->withName('btn.update'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/backend/general-settings/seo.blade.php ENDPATH**/ ?>