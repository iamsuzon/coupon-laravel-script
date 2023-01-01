<div class="header-area-wrapper margin-top-110 index-02" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="header-area index-02">
        <div class="container custom-container-01">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container custom-container-02">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="header-content">
                                    <div class="content">
                                        <h1 class="main-title"><?php echo e($data['title_1']); ?> <span
                                                    class="color-02"><?php echo e($data['title_2']); ?></span></h1>
                                        <p class="info"><?php echo e($data['subtitle']); ?></p>

                                        <div class="search combained v-03 main-color-two">
                                            <form action="<?php echo e(route('frontend.product.search.single')); ?>">
                                                <div class="form-group">
                                                    <i class="las la-search ex-icon"></i>
                                                    <input type="text" class="form-control ex-padding"
                                                           placeholder="<?php echo e($data['search_box_text']); ?>" name="search" id="searchProduct" autocomplete="off">
                                                    <button type="submit" class="search-btn"><?php echo e($data['button_text']); ?></button>
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
                                    </div>
                                    <div class="img-box">
                                        <?php echo render_image_markup_by_attachment_id($data['image'],'','',false); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_header_style_two.blade.php ENDPATH**/ ?>