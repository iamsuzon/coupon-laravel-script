
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Product Brands')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.css','data' => []]); ?>
<?php $component->withName('datatable.css'); ?>
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
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title"><?php echo e(__('All Brands')); ?>  </h4>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-brand-delete')): ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bulk-action','data' => []]); ?>
<?php $component->withName('bulk-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <form action="<?php echo e(route('admin.product.brand')); ?>" method="get"
                                          id="langauge_change_select_get_form">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.lang.select','data' => ['name' => 'lang','selected' => $default_lang,'id' => 'langchange']]); ?>
<?php $component->withName('lang.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('lang'),'selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($default_lang),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('langchange')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </form>
                                </div>
                                <div class="btn-wrapper-inner ml-2">
                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#category_add_modal"><?php echo e(__('Add New')); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Location')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Image')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $all_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]"
                                                       value="<?php echo e($data->id); ?>">
                                            </div>
                                        </td>
                                        <td><?php echo e($data->id); ?></td>
                                        <td><?php echo e($data->getTranslation('title',$default_lang,true)); ?></td>
                                        <td><?php echo e(optional($data->location)->city_name); ?>, <?php echo e(optional($data->location)->state_name); ?></td>
                                        <td>
                                            <?php if($data->status == 'draft'): ?>
                                                <span class="alert alert-primary"><?php echo e(__('Draft')); ?></span>
                                            <?php else: ?>
                                                <span class="alert alert-success"><?php echo e(__('Publish')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php echo render_attachment_preview_for_admin($data->image); ?>

                                        </td>

                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-brand-delete')): ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-popover-all-lang','data' => ['url' => route('admin.product.brand.delete.all.lang',$data->id)]]); ?>
<?php $component->withName('delete-popover-all-lang'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.product.brand.delete.all.lang',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php endif; ?>

                                            <?php
                                                $img = get_attachment_image_by_id($data->image,null,true);
                                                $img_url = $img['img_url'];
                                            ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-brand-edit')): ?>
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#brand_edit_modal"
                                                   class="btn btn-lg btn-primary btn-sm mb-3 mr-1 brand_edit_btn"
                                                   data-id="<?php echo e($data->id); ?>"
                                                   data-title="<?php echo e($data->getTranslation('title',$default_lang )); ?>"
                                                   data-slug="<?php echo e($data->slug); ?>"
                                                   data-status="<?php echo e($data->status); ?>"
                                                   data-location="<?php echo e($data->location_id); ?>"
                                                   data-action="<?php echo e(route('admin.product.brand.update')); ?>"
                                                   data-imageid="<?php echo e($data->image); ?>"
                                                   data-image="<?php echo e($img_url); ?>"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-brand-create')): ?>
                <div class="modal fade" id="category_add_modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo e(__('Create Brand')); ?></h5>
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            </div>
                            <form action="<?php echo e(route('admin.product.brand.store')); ?>" method="post">
                                <div class="modal-body">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="lang" value="<?php echo e($default_lang); ?>">
                                    <div class="form-group">
                                        <label for="edit_name"><?php echo e(__('Title')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                               placeholder="<?php echo e(__('Title')); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug"><?php echo e(__('Slug')); ?> <sup style="font-size: 10px">optional</sup></label>
                                        <input type="text" class="form-control" name="slug"
                                               placeholder="<?php echo e(__('Slug')); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <select class="form-control" name="location_id" id="location">
                                            <?php $__currentLoopData = \App\ProductLocation::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($location->id); ?>"><?php echo e($location->city_name); ?>, <?php echo e($location->state_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="edit_status"><?php echo e(__('Status')); ?></label>
                                        <select name="status" class="form-control" id="edit_status">
                                            <option value="draft"><?php echo e(__("Draft")); ?></option>
                                            <option value="publish"><?php echo e(__("Publish")); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        <label for="image"><?php echo e(__('Brand Image')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="image">
                                            <button type="button" class="btn btn-info media_upload_form_btn"
                                                    data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                    data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                    data-target="#media_upload_modal">
                                                <?php echo e(__('Upload Image')); ?>

                                            </button>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                    <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-brand-edit')): ?>
        <div class="modal fade" id="brand_edit_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Update Category')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="#" method="post" id="brand_edit_modal_form">
                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="lang" value="<?php echo e($default_lang); ?>">
                            <input type="hidden" name="id" id="brand_id" value="">
                            <div class="form-group">
                                <label for="edit_name"><?php echo e(__('Title')); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_title" name="title">
                            </div>

                            <div class="form-group">
                                <label for="edit_slug"><?php echo e(__('Slug')); ?> <sup style="font-size: 10px">optional</sup></label>
                                <input type="text" class="form-control" id="edit_slug" name="slug">
                            </div>

                            <div class="form-group">
                                <label for="edit_location">Location</label>
                                <select class="form-control" name="location_id" id="edit_location">
                                    <?php $__currentLoopData = \App\ProductLocation::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($location->id); ?>"><?php echo e($location->city_name); ?>, <?php echo e($location->state_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_status"><?php echo e(__('Status')); ?></label>
                                <select name="status" class="form-control" id="edit_status">
                                    <option value="draft"><?php echo e(__("Draft")); ?></option>
                                    <option value="publish"><?php echo e(__("Publish")); ?></option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="image"><?php echo e(__('Brand Image')); ?></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
                                    <button type="button" class="btn btn-info media_upload_form_btn"
                                            data-btntitle="<?php echo e(__('Select Image')); ?>"
                                            data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                            data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button id="update" type="submit" class="btn btn-primary"><?php echo e(__('Save Change')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
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

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bulk-action-js','data' => ['url' => route('admin.product.brand.bulk.action')]]); ?>
<?php $component->withName('bulk-action-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.product.brand.bulk.action'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.submit','data' => []]); ?>
<?php $component->withName('btn.submit'); ?>
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

                    $(document).on('change','#langchange',function(e){
                        $('#langauge_change_select_get_form').trigger('submit');
                    });

                $(document).on('click', '.brand_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var slug = el.data('slug');
                    var status = el.data('status');
                    var location = el.data('location');
                    var action = el.data('action');
                    var image = el.data('image');
                    var imageid = el.data('imageid');

                    var form = $('#brand_edit_modal_form');
                    form.attr('action', action);
                    form.find('#brand_id').val(id);
                    form.find('#edit_title').val(title);
                    form.find('#edit_slug').val(slug);
                    form.find('#edit_languages option[value="' + el.data('lang') + '"]').attr('selected', true);
                    form.find('#edit_status option[value="' + el.data('status') + '"]').attr('selected', true);
                    form.find('#edit_location option[value="' + el.data('location') + '"]').attr('selected', true);
                    if (imageid != '') {
                        form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                        form.find('.media-upload-btn-wrapper input').val(imageid);
                        form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                    }
                });
            });
        })(jQuery)
    </script>


    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.js','data' => []]); ?>
<?php $component->withName('datatable.js'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/backend/product/brand.blade.php ENDPATH**/ ?>