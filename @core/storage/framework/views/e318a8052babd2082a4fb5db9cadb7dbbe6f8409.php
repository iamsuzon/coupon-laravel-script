<div class="header-area-wrapper" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="header-area index-03 bg-01" <?php echo render_background_image_markup_by_attachment_id($data['background_image']); ?>>
        <div class="container custom-container-02">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content">
                        <div class="content">
                            <h1 class="main-title"><?php echo e($data['title']); ?></h1>
                            <p class="info"><?php echo e($data['subtitle']); ?></p>

                            <div class="search combained v-02 ex solid-border">
                                <form action="<?php echo e(route('frontend.product.search.single')); ?>" method="GET" id="single_search_form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo e($data['search_box_text']); ?>" name="search" id="advanceSearchProduct" autocomplete="off">
                                        <select class="lang" name="location" id="location">
                                            <option value="" selected disabled><?php echo e(__('Select a Location')); ?></option>
                                            <?php $__currentLoopData = $data['location']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($location->id); ?>"><?php echo e($location->city_name); ?>, <?php echo e($location->state_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <button type="submit" class="search-btn main-color-three"><?php echo e($data['button_text']); ?></button>
                                    </div>

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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH E:\XAMPP\htdocs\coupon\@core\app\Providers../../PageBuilder/views/home/home_page_header_style_three.blade.php ENDPATH**/ ?>