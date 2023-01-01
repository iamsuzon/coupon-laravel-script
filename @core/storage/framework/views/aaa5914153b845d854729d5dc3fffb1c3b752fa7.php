<div class="col-md-6 col-lg-4">
    <div class="widget-area-wrapper">
        <div class="widget ex">
            <div class="widget-search">
                <form class="search-from">
                    <div class="form-group">
                        <button type="submit" class="widget-search-btn" disabled>
                            <i class="las la-search icon"></i>
                        </button>
                        <input type="hidden" name="language" id="language" value="<?php echo e(get_user_lang()); ?>">
                        <input type="text" name="search" id="search-box" placeholder="search...">
                    </div>
                </form>
            </div>
        </div>

        <div class="widget">
            <div class="widget-category">
                <h5 class="widget-title"><?php echo e(__('Categories')); ?></h5>
                <div class="category-wrap">
                    <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-category-item">
                            <label class="checkbox-wrapper">
                                <input type="radio" name="category"
                                       <?php echo e(request()->category == $category->id ? "checked" : ""); ?> value="<?php echo e($category->id); ?>"
                                       class="checkbox category">
                                <span class="checkmark"></span>
                                <span class="content">
                                                    <span class="left"><?php echo e($category->title); ?></span>
                                                    <span class="right"><?php echo e(count($category->products)); ?></span>
                                                </span>
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-category">
                <h5 class="widget-title"><?php echo e(__('Locations')); ?></h5>
                <div class="category-wrap">
                    <?php $__currentLoopData = $data['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-category-item">
                            <label class="checkbox-wrapper">
                                <input type="radio" name="location"
                                       <?php echo e($location->id == request()->location ? "checked" : ""); ?> class="checkbox location"
                                       value="<?php echo e($location->id); ?>">
                                <span class="checkmark"></span>
                                <span class="content">
                                                    <span class="left"><?php echo e($location->city_name); ?>, <?php echo e($location->state_name); ?></span>
                                                </span>
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-price-range">
                <h5 class="widget-title"><?php echo e(__('filter by price')); ?></h5>

                <div style="margin:30px auto" class="price-range-slider" data-start-min="<?php echo e(isset(request()->min_price) ? request()->min_price : 0); ?>" data-start-max="<?php echo e(isset(request()->max_price) ? request()->max_price : 10000); ?>" data-min="0" data-max="10000" data-step="5">
                    <div class="ui-range-slider"></div>
                    <div class="ui-range-slider-footer">
                        <div class="ui-range-values">
                            <span class="ui-price-title"> Price: </span>
                            <div class="ui-range-value-min"><?php echo e(site_currency_symbol()); ?><span class="min_price">0</span>
                                <input type="hidden" value="0" name="min_price" id="min_price">
                            </div>-
                            <div class="ui-range-value-max"><?php echo e(site_currency_symbol()); ?><span class="max_price">10000</span>
                                <input type="hidden" value="10000" name="max_price" id="max_price">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="widget">
            <div class="widget-rating">
                <h5 class="widget-title"><?php echo e(__('rating')); ?></h5>
                <div class="rating-wrap">
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="5" <?php echo e(request()->rating == 5 ? 'checked' : ''); ?>>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="4" <?php echo e(request()->rating == 4 ? 'checked' : ''); ?>>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="3" <?php echo e(request()->rating == 3 ? 'checked' : ''); ?>>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="2" <?php echo e(request()->rating == 2 ? 'checked' : ''); ?>>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                    <div class="single-rating-item">
                        <label class="radio-btn-wrapper">
                            <input type="radio" name="rating" class="checkbox"
                                   value="1" <?php echo e(request()->rating == 1 ? 'checked' : ''); ?>>
                            <span class="checkmark"></span>
                            <span class="icon-wrap">
                                                    <i class="las la-star icon active"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                    <i class="las la-star icon"></i>
                                                </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-brand">
                <h5 class="widget-title"><?php echo e(__('brand')); ?></h5>
                <div class="category-wrap">
                    <?php $__currentLoopData = $data['brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-category-item">
                            <label class="checkbox-wrapper">
                                <input type="radio" name="brand"
                                       <?php echo e($brand->id == request()->brand ? "checked" : ""); ?> class="checkbox brand"
                                       value="<?php echo e($brand->id); ?>">
                                <span class="checkmark"></span>
                                <span class="content">
                                    <span class="left ml-2"><?php echo e($brand->title); ?></span>
                                </span>
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>


        <div class="widget ex mt-4">
            <div class="widget-add">
                <div class="add-banner-y-style-01">
                    <?php echo render_random_advertisement(); ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/pages/all_product/filter.blade.php ENDPATH**/ ?>