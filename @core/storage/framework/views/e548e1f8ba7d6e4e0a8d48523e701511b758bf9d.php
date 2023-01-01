<div class="header-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="header-area index-01 bg-color-a">
        <div class="shape-bg-01">
            <?php echo render_image_markup_by_attachment_id($data['shape_1'],'','',false); ?>

        </div>

        <div class="shape-bg-02">
            <?php echo render_image_markup_by_attachment_id($data['shape_2'],'','',false); ?>

        </div>

        <div class="shape-bg-03">
            <?php echo render_image_markup_by_attachment_id($data['shape_3'],'','',false); ?>

        </div>
        <div class="container custom-container-04">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content">
                        <div class="content">
                            <h1 class="main-title"><?php echo e($data['title']); ?></h1>
                            <p class="info"><?php echo e($data['subtitle']); ?></p>

                            <?php if($data['search_box_status'] == 'on'): ?>
                                <div class="search combained">
                                    <form action="<?php echo e(route('frontend.product.search.single')); ?>" method="GET" id="single_search_form">
                                        <div class="form-group">
                                            <i class="las la-search ex-icon"></i>
                                            <input type="text" class="form-control ex-padding" name="search" id="searchProduct"
                                                   placeholder="<?php echo e($data['search_box_text']); ?>" autocomplete="off">
                                            <button type="submit"
                                                    class="search-btn text-capitalize"><?php echo e($data['button_text']); ?></button>
                                        </div>
                                        <div class="load-ajax-data"></div>
                                        <div class="autocomplete-search-data">
                                            <div class="account">
                                                <div id="show-autocomplete" style="display: none;">
                                                    <div id="search-close">
                                                        <i class="las la-times"></i>
                                                    </div>
                                                    <ul class="autocomplete-warp"></ul>
                                                </div>
                                            </div>
                                        </div>
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
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="img-box-01">
                            <?php echo render_image_markup_by_attachment_id($data['image_1'],'','',false); ?>

                        </div>
                        <div class="img-box-02">
                            <?php echo render_image_markup_by_attachment_id($data['image_2'],'','',false); ?>

                        </div>
                        <div class="img-box-03">
                            <?php echo render_image_markup_by_attachment_id($data['image_3'],'','',false); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH E:\XAMPP\htdocs\coupon\@core\app\Providers../../PageBuilder/views/home/home_page_header_style_one.blade.php ENDPATH**/ ?>