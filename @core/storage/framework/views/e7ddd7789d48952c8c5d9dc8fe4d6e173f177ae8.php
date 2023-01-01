
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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
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
    <?php echo e(__('New Product')); ?>

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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h3 class="header-title"><?php echo e(__('Add New Item')); ?>   </h3>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <form action="<?php echo e(route('admin.product.new')); ?>" method="get"
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
                                    <a href="<?php echo e(route('admin.blog')); ?>"
                                       class="btn btn-primary"><?php echo e(__('All Products')); ?></a>
                                </div>
                            </div>
                        </div>

                        <form action="<?php echo e(route('admin.product.new')); ?>" method="post" enctype="multipart/form-data"
                              id="blog_new_form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="lang" value="<?php echo e($default_lang); ?>">
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title')); ?>">
                            </div>

                            <div class="form-group permalink_label">
                                <label class="text-dark"><?php echo e(__('Permalink * : ')); ?>

                                    <span id="slug_show" class="display-inline"></span>
                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="fas fa-edit"></i> </button>

                                        <input type="text" name="slug" class="form-control blog_slug mt-2"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  style="display: none"><?php echo e(__('Update')); ?></button>
                                    </span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('Product Description')); ?> <span class="text-danger">*</span></label>
                                <input type="hidden" name="description">
                                <div class="summernote"></div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Regular Price')); ?> <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="regular_price" id="regular-price"
                                               placeholder="<?php echo e(__('Regular Price')); ?>" value="<?php echo e(old('regular_price')); ?>">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Sale Price')); ?> <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="sale_price" id="sale-price"
                                               placeholder="<?php echo e(__('Sale Price')); ?>" value="<?php echo e(old('sale_price')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="discount"><?php echo e(__('Discount Up To')); ?></label>
                                        <input type="number" class="form-control" name="discount" id="discount"
                                               placeholder="<?php echo e(__('Discount of to 50$ or 50%')); ?>" value="<?php echo e(old('discount')); ?>">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="discount_symbol">Discount Type</label>
                                    <select class="form-control" name="discount_symbol" id="discount_symbol">
                                        <option value="<?php echo e(site_currency_symbol()); ?>" selected>Currency (<?php echo e(site_currency_symbol()); ?>)</option>
                                        <option value="%">Percent (%)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="coupon-code"><?php echo e(__('Coupon Code')); ?> <span
                                            class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="coupon_code" id="coupon-code"
                                       placeholder="Ex: KD68452" value="<?php echo e(old('coupon_code')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="title"><?php echo e(__('Excerpt')); ?></label>
                                <textarea name="excerpt" class="form-control max-height-150" cols="20"
                                          rows="5"><?php echo e(old('excerpt')); ?></textarea>
                            </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body meta">
                                <h5 class="header-title"><?php echo e(__('Meta Section')); ?></h5>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab"
                                             role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab"
                                               data-toggle="pill" href="#v-pills-home" role="tab"
                                               aria-controls="v-pills-home"
                                               aria-selected="true"><?php echo e(__('Blog Meta')); ?></a>
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
                                                           placeholder="<?php echo e(__('Title')); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug"><?php echo e(__('Meta Tags')); ?></label>
                                                    <input type="text" class="form-control" name="meta_tags"
                                                           placeholder="Slug" data-role="tagsinput">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title"><?php echo e(__('Meta Description')); ?></label>
                                                        <textarea name="meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                 aria-labelledby="v-pills-profile-tab">
                                                <div class="form-group">
                                                    <label for="title"><?php echo e(__('Facebook Meta Tag')); ?></label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="facebook_meta_tags">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title"><?php echo e(__('Facebook Meta Description')); ?></label>
                                                        <textarea name="facebook_meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image"><?php echo e(__('Facebook Meta Image')); ?></label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap"></div>
                                                        <input type="hidden" name="facebook_meta_image">
                                                        <button type="button"
                                                                class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                                data-toggle="modal"
                                                                data-target="#media_upload_modal">
                                                            <?php echo e(__('Upload Image')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                 aria-labelledby="v-pills-messages-tab">
                                                <div class="form-group">
                                                    <label for="title"><?php echo e(__('Twitter Meta Tag')); ?></label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="twitter_meta_tags">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title"><?php echo e(__('Twitter Meta Description')); ?></label>
                                                        <textarea name="twitter_meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image"><?php echo e(__('Twitter Meta Image')); ?></label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap"></div>
                                                        <input type="hidden" name="twitter_meta_image">
                                                        <button type="button"
                                                                class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                                data-toggle="modal"
                                                                data-target="#media_upload_modal">
                                                            <?php echo e(__('Upload Image')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="post_type_radio">
                                    <h6><?php echo e(__('Post Type')); ?></h6>
                                    <div class="form-check form-check-inline d-block">

                                        <input class="form-check-input post_type" type="radio" checked
                                               name="inlineRadioOptions"
                                               id="radio_general" value="option1">
                                        <i class="ti-settings"></i>
                                        <label class="form-check-label" for="inlineRadio1"><?php echo e(__('General')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="featured"><strong><?php echo e(__('Select Categories')); ?></strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="category_id">
                                                    <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->getTranslation('title',$default_lang)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong><?php echo e(__('Select Brand')); ?></strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="brand_id">
                                                    <?php $__currentLoopData = $all_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id') == $brand->id ? 'selected' : ''); ?>><?php echo e($brand->getTranslation('title',$default_lang)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong><?php echo e(__('Select Location')); ?></strong></label>
                                            <div class="category-section">
                                                <select class="form-control" name="location_id">
                                                    <?php $__currentLoopData = $all_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($location->id); ?>" <?php echo e(old('location_id') == $location->id ? 'selected' : ''); ?>><?php echo e($location->getTranslation('city_name',$default_lang)); ?>

                                                            , <?php echo e($location->getTranslation('state_name',$default_lang)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group " id="blog_tag_list">
                                            <label for="title"><?php echo e(__('Product Tag')); ?></label>
                                            <input type="text" class="form-control tags_filed"
                                                   name="tag_id[]" id="datetimepicker1">
                                            <div id="show-autocomplete" style="display: none;">
                                                <ul class="autocomplete-warp"></ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong><?php echo e(__('Featured')); ?></strong></label>
                                            <label class="switch">
                                                <input type="checkbox" name="featured">
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                        <div class="form-group ">
                                            <label for="status"><?php echo e(__('Status')); ?></label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="draft"><?php echo e(__("Draft")); ?></option>
                                                <option value="publish"><?php echo e(__("Publish")); ?></option>
                                                <option value="archive"><?php echo e(__("Archive")); ?></option>
                                            </select>
                                            <input type="date" name="schedule_date" class="form-control mt-2 date"
                                                   style="display: none" id="tag_data">
                                        </div>

                                        <div class="form-group ">
                                            <label for="expire_date"><?php echo e(__('Product Expire Date')); ?></label>
                                            <input type="date" name="expire_date" class="form-control mt-2"
                                                   id="expire_date">
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="image"><?php echo e(__('Product Image')); ?></label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap"></div>
                                                <input type="hidden" name="image">
                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                        data-target="#media_upload_modal">
                                                    <?php echo e(__('Upload Image')); ?>

                                                </button>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.recommended_image_size','data' => []]); ?>
<?php $component->withName('recommended_image_size'); ?>
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
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="image"><?php echo e(__('Galley Image')); ?></label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap"></div>
                                                <input type="hidden" name="image_gallery">
                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                        data-toggle="modal"
                                                        data-mulitple="true"
                                                        data-target="#media_upload_modal">
                                                    <?php echo e(__('Upload Image')); ?>

                                                </button>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.recommended_image_size','data' => []]); ?>
<?php $component->withName('recommended_image_size'); ?>
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
                                        </div>

                                        <div class="submit_btn mt-5">
                                            <button type="submit"
                                                    class="btn btn-success pull-right"><?php echo e(__('Submit New Product ')); ?></button>
                                        </div>
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
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
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

    <script>
        //Date Picker
        flatpickr('#tag_data', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });
        flatpickr('#expire_date', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });


        var blogTagInput = $('#blog_tag_list .tags_filed');
        var oldTag = '';
        blogTagInput.tagsinput();
        //For Tags
        $(document).on('keyup', '#blog_tag_list .bootstrap-tagsinput input[type="text"]', function (e) {
            e.preventDefault();
            var el = $(this);
            var inputValue = $(this).val();
            $.ajax({
                type: 'get',
                url: "<?php echo e(route('admin.get.product.tags.by.ajax')); ?>",
                async: false,
                data: {
                    query: inputValue
                },

                success: function (data) {
                    oldTag = inputValue;
                    let html = '';
                    var showAutocomplete = '';
                    $('#show-autocomplete').html('<ul class="autocomplete-warp"></ul>');
                    if (el.val() != '' && data.markup != '') {


                        data.result.map(function (tag, key) {
                            html += '<li class="tag_option" data-id="' + key + '"  data-val="' + tag + '">' + tag + '</li>'
                        })

                        $('#show-autocomplete ul').html(html);
                        $('#show-autocomplete').show();


                    } else {
                        $('#show-autocomplete').hide();
                        oldTag = '';
                    }

                },
                error: function (res) {

                }
            });
        });

        $(document).on('click', '.tag_option', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let tag = $(this).data('val');
            blogTagInput.tagsinput('add', tag);
            $(this).parent().remove();
            blogTagInput.tagsinput('remove', oldTag);
        });

    </script>

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                <?php
                    $slug = get_page_slug(get_static_option('product_page'),'product');
                ?>

                //Permalink Code
                $('.permalink_label').hide();
                $(document).on('keyup', '#title', function (e) {
                    var slug = $(this).val().trim().toLowerCase().split(' ').join('-').replace(/[\W_]+/g,'-');
                    slug = slug.toLowerCase().split('%').join('-');
                    var url = `<?php echo e(url('/'.$slug.'/')); ?>/` + slug;
                    $('.permalink_label').show();
                    var data = $('#slug_show').text(url).css('color', 'blue');
                    $('.blog_slug').val(slug);

                });

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
                    var slug = update_input.trim().toLowerCase().replace(/[\W_]+/g,'-').split(' ').join('-');
                    var url = `<?php echo e(url('/'.$slug.'/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });

                $(document).on('change', '#status', function (e) {
                    e.preventDefault();
                    if ($(this).val() == 'schedule') {
                        $('.date').show();
                        $('.date').focus();
                    } else {
                        $('.date').hide();
                    }
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
            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/backend/product/new-product.blade.php ENDPATH**/ ?>