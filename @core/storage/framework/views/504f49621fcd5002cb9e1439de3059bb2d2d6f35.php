<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('All Widgets')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jquery-ui.min.css')); ?>">
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-message','data' => []]); ?>
<?php $component->withName('error-message'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash-msg','data' => []]); ?>
<?php $component->withName('flash-msg'); ?>
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
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('All Widgets')); ?></h4>
                        <ul id="sortable_02" class="available-form-field all-widgets sortable_02">
                            <?php echo render_admin_panel_widgets_list(); ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="sidebar-list-wrap">
                    <?php echo get_admin_sidebar_list(); ?>

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
    <script src="<?php echo e(asset('assets/frontend/js/jquery-ui.min.js')); ?>"></script>
    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {

                /*-------------------------------------------
               *   REPEATER SCRIPT
               * ------------------------------------------*/
                $(document).on('click','.all-field-wrap .action-wrap .add',function (e){
                    e.preventDefault();

                    var el = $(this);
                    var parent = el.parent().parent();
                    var container = $('.all-field-wrap');
                    var clonedData = parent.clone();
                    var containerLength = container.length;
                    clonedData.find('#myTab').attr('id','mytab_'+containerLength);
                    clonedData.find('#myTabContent').attr('id','myTabContent_'+containerLength);
                    var allTab =  clonedData.find('.tab-pane');
                    allTab.each(function (index,value){
                        var el = $(this);
                        var oldId = el.attr('id');
                        el.attr('id',oldId+containerLength);
                    });
                    var allTabNav =  clonedData.find('.nav-link');
                    allTabNav.each(function (index,value){
                        var el = $(this);
                        var oldId = el.attr('href');
                        el.attr('href',oldId+containerLength);
                    });

                    parent.parent().append(clonedData);

                    if (containerLength > 0){
                        parent.parent().find('.remove').show(300);
                    }
                    parent.parent().find('.iconpicker-popover').remove();
                    parent.parent().find('.icp-dd').iconpicker('destroy');
                    parent.parent().find('.icp-dd').iconpicker();

                });

                $(document).on('click','.all-field-wrap .action-wrap .remove',function (e){
                    e.preventDefault();
                    var el = $(this);
                    var parent = el.parent().parent();
                    var container = $('.all-field-wrap');

                    if (container.length > 1){
                        el.show(300);
                        parent.hide(300);
                        parent.remove();
                    }else{
                        el.hide(300);
                    }
                });


                /*------------------------------------------
                *   ICON PICKET INIT
                * ----------------------------------------*/
                $('.icp-dd').iconpicker();
                $('body').on('iconpickerSelected','.icp-dd', function (e) {
                    var selectedIcon = e.iconpickerValue;
                    $(this).parent().parent().children('input').val(selectedIcon);
                    $('body .dropdown-menu.iconpicker-container').removeClass('show');
                });



                $(".sortable").sortable({
                    axis: "y",
                    placeholder: "sortable-placeholder",
                    receive : function(event,ui){
                        resetOrder(this.id);
                    },
                    stop: function( event, ui ){
                        resetOrder(this.id);
                    }
                }).disableSelection();

                $(".sortable_02").sortable({
                    connectWith: '.sortable_widget_location',
                    helper: "clone",
                    remove: function (e, li) {
                        var Item = li.item.length > 0 ? li.item[0] : li.item;
                        var widgetName = Item.getAttribute('data-name');
                        var markup = '';
                        $.ajax({
                            'url' : "<?php echo e(route('admin.widgets.markup')); ?>",
                            'type' : "POST",
                            'data' : {
                                '_token' : "<?php echo csrf_token(); ?>",
                                'widget_name' : widgetName,
                            },
                            async: false,
                            success: function (data) {
                                markup = data;
                            }
                        });

                        // markup += '</div>'; //end content div

                        li.item.clone()
                            .html(markup)
                            .insertAfter(li.item);
                        $(this).sortable('cancel');
                        return markup;
                    }
                }).disableSelection();

                $('body').on('click', '.remove-widget', function (e) {
                    $(this).parent().remove();
                    $( ".sortable_02" ).sortable( "refreshPositions" );
                    var parent =  $(this).parent();
                    var widgetType = parent.find('input[name="widget_type"]').val();
                    resetOrder();

                    if(widgetType == 'update'){
                        var widget_id = parent.find('input[name="id"]').val();
                        $.ajax({
                            'url' : "<?php echo e(route('admin.widgets.delete')); ?>",
                            'type' : "POST",
                            'data' : {
                                '_token' : "<?php echo csrf_token(); ?>",
                                'id' : widget_id
                            },
                            success: function (data) {
                            }
                        });
                    }
                });
                $('body').on('click', '.expand', function (e) {
                    $(this).parent().find('.content-part').toggleClass('show');
                    var expand = $(this).children('i');
                    if(expand.hasClass('ti-angle-down')){
                        expand.attr('class', 'ti-angle-up');
                    }else{
                        expand.attr('class', 'ti-angle-down');
                    }
                    $('.icp-dd').iconpicker();
                });

                $('body').on('click', '.widget_save_change_button', function (e) {
                    e.preventDefault();
                    var parent = $(this).parent().find('.widget_save_change_button');
                    parent.text('Saving...').attr('disabled',true);
                    var formClass =  $(this).parent();
                    var formData = formClass.serializeArray();
                    var widgetType = $(this).parent().find('input[name="widget_type"]').val();
                    var formAction = $(this).parent().attr('action');
                    var udpateId = '';
                    var formContainer = $(this).parent();

                    $.ajax({
                        type: "POST",
                        url:  formAction,
                        data: formClass.serializeArray() ,
                        success:function (data) {
                            udpateId = data.id;
                            if(widgetType == 'new'){
                                formContainer.attr('action',"<?php echo e(route('admin.widgets.update')); ?>")
                                formContainer.find('input[name="widget_type"]').val('update');
                                formContainer.prepend('<input type="hidden" name="id" value="'+udpateId+'">');
                            }
                        }
                    });
                    parent.text('saved..');
                    setTimeout(function () {
                        parent.text('Save Changes').attr('disabled',false);
                    },1000);
                });

                /**
                 * reset order function
                 * */
                function resetOrder(dropedOn) {
                    var allItems = $('#'+dropedOn+' li');
                    $.each(allItems,function (index,value) {
                        $(this).find('input[name="widget_order"]').val(index+1);
                        $(this).find('input[name="widget_location"]').val(dropedOn);
                        var id = $(this).find('input[name="id"]').val();
                        var widget_order = index+1;
                        if(typeof id != 'undefined'){
                            reset_db_order(id,widget_order);
                        }
                    });
                }

                /**
                 * reorder funciton
                 * */
                function reset_db_order(id,widget_order){
                    $.ajax({
                        type: "POST",
                        url:  "<?php echo e(route('admin.widgets.update.order')); ?>",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
                            id : id,
                            widget_order: widget_order
                        },
                        success:function (data) {
                            //response ok if it saved success
                        }
                    });
                }
            });
            $(document).on('click','.widget-area-expand',function (e) {
                e.preventDefault();
                var widgetbody = $(this).parent().parent().find('.widget-area-body');
                widgetbody.toggleClass('hide');
                var expand = $(this).children('i');
                if(expand.hasClass('ti-angle-down')){
                    expand.attr('class', 'ti-angle-up');
                }else{
                    expand.attr('class', 'ti-angle-down');
                    var allWidgets =  $(this).parent().parent().find('.widget-area-body ul li');
                    $.each(allWidgets,function (value){
                        $(this).find('.content-part').removeClass('show');
                    });
                }
            });
        }(jQuery));
    </script>
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

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/backend/widgets/widget-index.blade.php ENDPATH**/ ?>