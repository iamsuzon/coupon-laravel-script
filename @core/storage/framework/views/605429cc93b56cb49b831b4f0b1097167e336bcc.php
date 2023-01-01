<?php $__env->startSection('style'); ?>
    <?php echo $__env->make('backend.partials.datatable.style-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Top Bar Settings')); ?>

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
            <div class="col-lg-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title"><?php echo e(__('Support Info Items for Topbar')); ?>  </h4>

                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal"
                                        data-target="#add_support_info"><?php echo e(__('Add New Support Info')); ?></button>
                            </div>
                        </div>

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>

                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('Icon')); ?></th>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('URL')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $all_topbar_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo e($data->id); ?></td>
                                        <td><i class="<?php echo e($data->icon); ?>"></i></td>
                                        <td><?php echo e($data->title); ?></td>
                                        <td><?php echo e($data->url); ?></td>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-popover','data' => ['url' => route('admin.delete.support.info',$data->id)]]); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.delete.support.info',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#support_info_item_edit_modal"
                                               class="btn btn-primary btn-xs mb-3 mr-1 support_info_edit_btn"
                                               data-id="<?php echo e($data->id); ?>"
                                               data-action="<?php echo e(route('admin.update.support.info')); ?>"
                                               data-title="<?php echo e($data->title); ?>"
                                               data-infourl="<?php echo e($data->url); ?>"
                                               data-iconsocial="<?php echo e($data->icon); ?>">
                                                <i class="ti-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Social Icons for Tob Bar Right / Left Bar Inner Bar')); ?></h4>
                        <div class="right-cotnent margin-bottom-40">
                            <a class="btn btn-primary"
                               data-target="#add_social_icon"
                               data-toggle="modal"
                               href="#"><?php echo e(__('Add New Social Item')); ?></a>
                        </div>
                        <table class="table table-default">
                            <thead>
                            <th><?php echo e(__('ID')); ?></th>
                            <th><?php echo e(__('Icon')); ?></th>
                            <th><?php echo e(__('URL')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $all_social_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->id); ?></td>
                                    <td><i class="<?php echo e($data->icon); ?>"></i></td>
                                    <td><?php echo e($data->url); ?></td>
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-popover','data' => ['url' => route('admin.delete.social.item',$data->id)]]); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.delete.social.item',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <a href="#"
                                           data-toggle="modal"
                                           data-target="#social_item_edit_modal"
                                           class="btn btn-primary btn-xs mb-3 mr-1 social_item_edit_btn"
                                           data-id="<?php echo e($data->id); ?>"
                                           data-url="<?php echo e($data->url); ?>"
                                           data-iconsocial="<?php echo e($data->icon); ?>">
                                            <i class="ti-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_support_info" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Add New Support Info')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.new.support.info')); ?>" method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="social_item_icon" class="d-block"><?php echo e(__('Add New Icon')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-instagram"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-instagram" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only"><?php echo e(__('Toggle Dropdown')); ?></span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="social_item_icon" value="fab fa-instagram"
                                   name="icon">
                        </div>

                        <div class="form-group">
                            <label for="title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="<?php echo e(__('Title')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="details"><?php echo e(__('URL')); ?></label>
                            <input type="text" class="form-control" id="url" name="url"
                              placeholder="<?php echo e(__('URL')); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="support_info_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Support Info')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.update.support.info')); ?>" id="support_info_item_edit_modal_form"
                      method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="support_info_id" name="id" value="">
                        <input type="hidden" name="id" id="social_item_id" value="">

                        <div class="form-group">
                            <label for="edit_icon" class="d-block"><?php echo e(__('Change Icons')); ?></label>
                            <div class="btn-group edit_icon">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only"><?php echo e(__('Toggle Dropdown')); ?></span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_social_icon" value="fas fa-exclamation-triangle"
                                   name="icon">
                        </div>

                        <div class="form-group">
                            <label for="edit_title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control" id="edit_title" name="title"
                                   placeholder="<?php echo e(__('Title')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="edit_details"><?php echo e(__('URL')); ?></label>
                            <input type="text" class="form-control edit_info_url" name="url"
                                   placeholder="<?php echo e(__('URL')); ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="update" type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_social_icon" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Add Social Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.new.social.item')); ?>" method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="social_item_icon" class="d-block"><?php echo e(__('Add New Social Icon')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-instagram"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-instagram" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only"><?php echo e(__('Toggle Dropdown')); ?></span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="social_item_icon" value="fab fa-instagram"
                                   name="icon">
                        </div>
                        <div class="form-group">
                            <label for="social_item_link"><?php echo e(__('URL')); ?></label>
                            <input type="text" name="url" id="social_item_link" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Add Social Item')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="social_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Social Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.update.social.item')); ?>" method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="social_item_id" value="">
                        <div class="form-group">
                            <label for="edit_icon" class="d-block"><?php echo e(__('Social Icons')); ?></label>
                            <div class="btn-group edit_icon">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only"><?php echo e(__('Toggle Dropdown')); ?></span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_social_icon" value="fas fa-exclamation-triangle"
                                   name="icon">
                        </div>
                        <div class="form-group">
                            <label for="social_item_edit_url"><?php echo e(__('Url')); ?></label>
                            <input type="text" class="form-control" id="social_item_edit_url" name="url"
                                   placeholder="<?php echo e(__('Url')); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="update" type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('backend.partials.datatable.script-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon-picker','data' => []]); ?>
<?php $component->withName('icon-picker'); ?>
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
                $(document).on('click', '.support_info_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var url = el.data('infourl');
                    var social_icon = el.data('iconsocial');
                    var form = $('#support_info_item_edit_modal_form');
                    form.find('#support_info_id').val(id);
                    form.find('#edit_title').val(title);
                    form.find('.edit_info_url').val(url);
                    form.find('#social_item_id').val(id);
                    form.find('#edit_social_icon').val(social_icon);
                    form.find('#edit_icon').val(el.data('iconsocial'));
                    form.find('.edit_icon .icp-dd').attr('data-selected', el.data('iconsocial'));
                    form.find('.edit_icon .iconpicker-component i').attr('class', el.data('iconsocial'));
                });

                $(document).on('click', '.social_item_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var url = el.data('url');
                    var social_icon = el.data('iconsocial');
                    var form = $('#social_item_edit_modal');
                    form.find('#social_item_id').val(id);
                    form.find('#edit_social_icon').val(social_icon);
                    form.find('#social_item_edit_url').val(url);
                    form.find('#edit_icon').val(el.data('iconsocial'));
                    form.find('.edit_icon .icp-dd').attr('data-selected', el.data('iconsocial'));
                    form.find('.edit_icon .iconpicker-component i').attr('class', el.data('iconsocial'));
                });
            });

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/backend/pages/topbar-settings.blade.php ENDPATH**/ ?>