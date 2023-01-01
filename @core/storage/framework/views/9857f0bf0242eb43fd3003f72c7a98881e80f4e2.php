
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.summernote.css','data' => []]); ?>
<?php $component->withName('summernote.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/flatpickr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/custom-dashboard.css')); ?>">
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
    <?php echo e(__('Edit Blog Post')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('User Dashboard')); ?></a></h2>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('Edit Blog Post')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(route('user.product.update',$product->id)); ?>" method="post" enctype="multipart/form-data"
                      id="blog_new_form">
                    <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h3 class="header-title"><?php echo e(__('Edit Product Item')); ?>   </h3>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">

                                    <a href="<?php echo e(route('user.product')); ?>"
                                       class="btn btn-primary"><?php echo e(__('All Product')); ?>

                                    </a>
                                    <a href="<?php echo e(route('user.product.new')); ?>"
                                       class="btn btn-info"><?php echo e(__('Create New')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>


                            <input type="hidden" name="lang" value="<?php echo e($default_lang); ?>">
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control" name="title" id="title"
                                       value="<?php echo e($product->getTranslation('title',$default_lang)); ?>">
                            </div>

                            <div class="form-group permalink_label">
                                <label class="text-dark"><?php echo e(__('Permalink * : ')); ?>

                                    <span id="slug_show" class="display-inline"></span>
                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i class="las la-edit"></i> </button>
                                          <input type="text" name="slug" value="<?php echo e($product->slug); ?>" class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2" style="display: none"><?php echo e(__('Update')); ?></button>
                                    </span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('Product Content')); ?></label>
                                <input type="hidden" name="description" value="<?php echo e($product->getTranslation('description',$default_lang)); ?>">
                                <div class="summernote" data-content="<?php echo e($product->getTranslation('description',$default_lang)); ?>"></div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="regular_price"><?php echo e(__('Regular Price')); ?></label>
                                    <input class="form-control" type="text" name="regular_price" id="regular_price" placeholder="Enter product regular price" value="<?php echo e($product->regular_price); ?>">
                                </div>

                                <div class="col-6">
                                    <label for="sale_price"><?php echo e(__('Sale Price')); ?></label>
                                    <input class="form-control" type="text" name="sale_price" id="sale_price" placeholder="Enter product sale price" value="<?php echo e($product->sale_price); ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <label for="discount"><?php echo e(__('Discount Up To')); ?> <span
                                                class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="discount" id="discount" placeholder="Discount up to 50$ or 5%" value="<?php echo e($product->discount); ?>">
                                </div>

                                <div class="col-6">
                                    <label for="discount_symbol"><?php echo e(__('Discount Type')); ?> <span
                                                class="text-danger">*</span></label>

                                    <select class="form-control" name="discount_symbol" id="discount_symbol">
                                        <option value="<?php echo e(site_currency_symbol()); ?>" <?php echo e($product->discount_symbol == site_currency_symbol() ? 'selected' : ''); ?>>Currency (<?php echo e(site_currency_symbol()); ?>)</option>
                                        <option value="%" <?php echo e($product->discount_symbol == '%' ? 'selected' : ''); ?>>Percent (%)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="coupon_code"><?php echo e(__('Coupon Code')); ?> <span
                                            class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="coupon_code" id="coupon_code" placeholder="Ex: KD68452" value="<?php echo e($product->coupon_code); ?>">
                            </div>

                            <div class="form-group">
                                <label for="title"><?php echo e(__('Excerpt')); ?></label>
                                <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30"
                                          rows="10"><?php echo e($product->getTranslation('excerpt',$default_lang)); ?></textarea>
                            </div>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <div class="post_type_radio">
                            <h6><?php echo e(__('Post Type')); ?></h6>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input post_type" type="radio"
                                       name="inlineRadioOptions" checked
                                       id="radio_general" value="option1"

                                >
                                <i class="ti-settings"></i>
                                <label class="form-check-label" for="inlineRadio1"><?php echo e(__('General')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="featured"><strong><?php echo e(__('Select Categories')); ?></strong></label>
                                    <div class="category-section">
                                        <select class="form-control" name="category_id">
                                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"
                                                <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>

                                                ><?php echo e(purify_html($category->getTranslation('title',$default_lang))); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="featured"><strong><?php echo e(__('Select Brand')); ?></strong></label>
                                    <div class="brand-section">
                                        <select class="form-control" name="brand_id" id="brand">
                                            <?php $__currentLoopData = $all_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand->id); ?>"
                                                <?php echo e($product->brand_id == $brand->id ? 'selected' : ''); ?>

                                                ><?php echo e(purify_html($brand->getTranslation('title',$default_lang))); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="featured"><strong><?php echo e(__('Select Location')); ?></strong></label>
                                    <div class="location-section">
                                        <select class="form-control" name="location_id" id="location">
                                            <?php $__currentLoopData = $all_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($location->id); ?>"
                                                <?php echo e($product->location_id == $location->id ? 'selected' : ''); ?>

                                                ><?php echo e(purify_html($location->getTranslation('city_name',$default_lang))); ?>, <?php echo e(purify_html($location->getTranslation('state_name',$default_lang))); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group " id="blog_tag_list">
                                            <label for="title"><?php echo e(__('Product Tag')); ?></label>
                                            <?php
                                                $tags_arr = json_decode($product->tag_id);
                                                $tags = is_array($tags_arr) ? implode(",", $tags_arr) : "";
                                            ?>
                                            <input type="text" class="form-control tags_filed" data-role="tagsinput"
                                                   name="tag_id[]"  value=" <?php echo e($tags); ?>">

                                            <div id="show-autocomplete-dashboard" style="display: none;">
                                                <ul class="autocomplete-warp-dashboard" ></ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="expire_date"><?php echo e(__('Product Expire Date')); ?></label>
                                            <input type="date" name="expire_date" class="form-control mt-2 expire_date" id="expire_date" value="<?php echo e($product->expire_date); ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="og_meta_image"><?php echo e(__('Product Image')); ?></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php echo render_attachment_preview_for_admin($product->image ?? ''); ?>

                                        </div>
                                        <input type="hidden" id="image" name="image"
                                               value="<?php echo e($product->image); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                data-target="#media_upload_modal">
                                            <?php echo e('Change Image'); ?>

                                        </button>
                                    </div>
                                    <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="og_meta_image"><?php echo e(__('Product Image Gallery')); ?></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php echo render_gallery_image_attachment_preview($product->image_gallery ?? ''); ?>

                                        </div>
                                        <input type="hidden" id="og_meta_image" name="image_gallery"
                                               value="<?php echo e($product->image_gallery ?? ''); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                data-mulitple="true"
                                                data-target="#media_upload_modal">
                                            <?php echo e('Change Image'); ?>

                                        </button>
                                    </div>
                                    <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                </div>

                                <div class="card">
                                    <div class="card-body meta">
                                        <h5 class="header-title my-3"><?php echo e(__('Meta Section')); ?></h5>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                     role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active" id="v-pills-home-tab"
                                                       data-toggle="pill" href="#v-pills-home" role="tab"
                                                       aria-controls="v-pills-home"
                                                       aria-selected="true"><?php echo e(__('Product Meta')); ?></a>
                                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                                       href="#v-pills-profile" role="tab"
                                                       aria-controls="v-pills-profile"
                                                       aria-selected="false"><?php echo e(__('Facebook Meta')); ?></a>
                                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                                       href="#v-pills-messages" role="tab"
                                                       aria-controls="v-pills-messages"
                                                       aria-selected="false"><?php echo e(__('Twitter Meta')); ?></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="tab-content" id="v-pills-tabContent">

                                                    <div class="tab-pane fade show active" id="v-pills-home"
                                                         role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                        <div class="form-group">
                                                            <label for="title"><?php echo e(__('Meta Title')); ?></label>
                                                            <input type="text" class="form-control" name="meta_title"
                                                                   value="<?php echo e($product->meta_data->meta_title ?? ''); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="slug"><?php echo e(__('Meta Tags')); ?></label>
                                                            <input type="text" class="form-control"  data-role="tagsinput" name="meta_tags"
                                                                   value="<?php echo e($product->meta_data->meta_tags ?? ''); ?>">
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="title"><?php echo e(__('Meta Description')); ?></label>
                                                                <textarea name="meta_description"
                                                                          class="form-control max-height-140"
                                                                          cols="20"
                                                                          rows="4"><?php echo $product->meta_data->meta_description ?? ''; ?></textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                         aria-labelledby="v-pills-profile-tab">
                                                        <div class="form-group">
                                                            <label for="title"><?php echo e(__('Facebook Meta Tag')); ?></label>
                                                            <input type="text" class="form-control" data-role="tagsinput"
                                                                   name="facebook_meta_tags" value="<?php echo e($product->meta_data->facebook_meta_tags ?? ''); ?>">
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="title"><?php echo e(__('Facebook Meta Description')); ?></label>
                                                                <textarea name="facebook_meta_description"
                                                                          class="form-control max-height-140 meta-desc"
                                                                          cols="20"
                                                                          rows="4"><?php echo $product->meta_data->facebook_meta_description ?? ''; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="og_meta_image"><?php echo e(__('Facebook Meta Image')); ?></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php echo render_attachment_preview_for_admin($product->meta_data->facebook_meta_image ?? ''); ?>

                                                                </div>
                                                                <input type="hidden" id="facebook_meta_image" name="facebook_meta_image"
                                                                       value="<?php echo e($product->meta_data->facebook_meta_image ?? ''); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                                        data-target="#media_upload_modal">
                                                                    <?php echo e('Change Image'); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                         aria-labelledby="v-pills-messages-tab">
                                                        <div class="form-group">
                                                            <label for="title"><?php echo e(__('Twitter Meta Tag')); ?></label>
                                                            <input type="text" class="form-control" data-role="tagsinput"
                                                                   name="twitter_meta_tags" value=" <?php echo e($product->meta_data->twitter_meta_tags ?? ''); ?>">
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="title"><?php echo e(__('Twitter Meta Description')); ?></label>
                                                                <textarea name="twitter_meta_description"
                                                                          class="form-control max-height-140 meta-desc"
                                                                          cols="20"
                                                                          rows="4"><?php echo $product->meta_data->twitter_meta_description ?? ''; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="og_meta_image"><?php echo e(__('Twitter Meta Image')); ?></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php echo render_attachment_preview_for_admin($product->meta_data->twitter_meta_image ?? ''); ?>

                                                                </div>
                                                                <input type="hidden" id="twitter_meta_image" name="twitter_meta_image"
                                                                       value="<?php echo e($product->meta_data->twitter_meta_image ?? ''); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                                        data-target="#media_upload_modal">
                                                                    <?php echo e('Change Image'); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit_btn mt-5">
                                    <button type="submit"
                                            class="btn btn-success"><?php echo e(__('Save Post ')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => ['type' => 'web']]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('web')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.summernote.js','data' => []]); ?>
<?php $component->withName('summernote.js'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => ['type' => 'web']]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('web')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <script>
        flatpickr('.expire_date', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });

        (function ($) {
            "use strict";
            $(document).ready(function () {

                var blogTagInput = $('#blog_tag_list .tags_filed');
                var oldTag = '';
                blogTagInput.tagsinput();
                //For Tags
                $(document).on('keyup','#blog_tag_list .bootstrap-tagsinput input[type="text"]',function (e) {
                    e.preventDefault();
                    var el = $(this);
                    var inputValue = $(this).val();
                    $.ajax({
                        type: 'get',
                        url :  "<?php echo e(route('user.get.product.tags.by.ajax')); ?>",
                        async: false,
                        data: {
                            query: inputValue
                        },

                        success: function (data){
                            oldTag = inputValue;
                            let html = '';
                            var showAutocomplete = '';
                            $('#show-autocomplete-dashboard').html('<ul class="autocomplete-warp-dashboard"></ul>');
                            if(el.val() != '' && data.markup != ''){


                                data.result.map(function (tag, key) {
                                    html += '<li class="tag_option" data-id="'+key+'" data-val="'+tag+'">' + tag + '</li>'
                                })

                                $('#show-autocomplete-dashboard ul').html(html);
                                $('#show-autocomplete-dashboard').show();


                            } else {
                                $('#show-autocomplete-dashboard').hide();
                                oldTag = '';
                            }

                        },
                        error: function (res){

                        }
                    });
                });

                $(document).on('click', '.tag_option', function(e) {
                    e.preventDefault();

                    let id = $(this).data('id');
                    let tag = $(this).data('val');
                    blogTagInput.tagsinput('add', tag);
                    $(this).parent().remove();
                    blogTagInput.tagsinput('remove', oldTag);
                });




          //Status Code
            if($('#status').val() == 'schedule') {
                $('.date').show();
                $('.date').focus();
            }
                $(document).on('change','#status',function(e){
                    e.preventDefault();
                    if ($(this).val() == 'schedule') {
                        $('.date').show();
                        $('.date').focus();
                    } else {
                        $('.date').hide();
                    }
                });

                //Permalink Code
                var sl =  $('.blog_slug').val();
                var url = `<?php echo e(url('/product/')); ?>/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

                var form = $('#blog_new_form');

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.blog_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.blog_slug').val();
                    var slug = update_input.trim().toLowerCase().replace(/[^a-z0-9]|\s+|\r?\n|\r/gmi, "-").split(' ').join('-');
                    var url = `<?php echo e(url('/product/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });

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
                $(document).on('change', '#langchange', function (e) {
                    $('#langauge_change_select_get_form').trigger('submit');
                });

            });

            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function (contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if ($('.summernote').length > 0) {
                $('.summernote').each(function (index, value) {
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        })(jQuery)
    </script>


    <script>
        $(document).ready(function(){
            $(document).on('click','.mobile-nav-click', function (e){
                e.preventDefault()

                $('.nav-pills-open').toggleClass('active');
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/user/dashboard/user-post/edit.blade.php ENDPATH**/ ?>