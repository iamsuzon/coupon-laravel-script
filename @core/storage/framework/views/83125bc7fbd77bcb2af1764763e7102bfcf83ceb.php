
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
    <?php echo e(__('Edit Blog Post')); ?>

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
                                <h3 class="header-title"><?php echo e(__('Edit Blog Items')); ?>   </h3>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">

                                    <a href="<?php echo e(route('admin.blog')); ?>"
                                       class="btn btn-primary"><?php echo e(__('All Blog Post')); ?>

                                    </a>
                                    <a href="<?php echo e(route('admin.blog.new')); ?>"
                                       class="btn btn-info"><?php echo e(__('Create New')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>

                        <form action="<?php echo e(route('admin.blog.update',$blog_post->id)); ?>" method="post"
                              enctype="multipart/form-data"
                              id="blog_new_form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="lang" value="<?php echo e($default_lang); ?>">
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control" name="title" id="title"
                                       value="<?php echo e($blog_post->getTranslation('title',$default_lang)); ?>">
                            </div>

                            <div class="form-group permalink_label">
                                <label class="text-dark"><?php echo e(__('Permalink * : ')); ?>

                                    <span id="slug_show" class="display-inline"></span>
                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="fas fa-edit"></i> </button>
                                          <input type="text" name="slug" value="<?php echo e($blog_post->slug); ?>"
                                                 class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  style="display: none"><?php echo e(__('Update')); ?></button>
                                    </span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('Blog Content')); ?></label>
                                <input type="hidden" name="blog_content"
                                       value="<?php echo e($blog_post->getTranslation('blog_content',$default_lang)); ?>">
                                <div class="summernote"
                                     data-content="<?php echo e($blog_post->getTranslation('blog_content',$default_lang)); ?>"></div>
                            </div>

                            <div class="form-group">
                                <label for="title"><?php echo e(__('Excerpt')); ?></label>
                                <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30"
                                          rows="10"><?php echo e($blog_post->getTranslation('excerpt',$default_lang)); ?></textarea>
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
                                                           value="<?php echo e($blog_post->meta_data->meta_title ?? ''); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug"><?php echo e(__('Meta Tags')); ?></label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="meta_tags"
                                                           value="<?php echo e($blog_post->meta_data->meta_tags ?? ''); ?>">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title"><?php echo e(__('Meta Description')); ?></label>
                                                        <textarea name="meta_description"
                                                                  class="form-control max-height-140"
                                                                  cols="20"
                                                                  rows="4"><?php echo $blog_post->meta_data->meta_description ?? ''; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                 aria-labelledby="v-pills-profile-tab">
                                                <div class="form-group">
                                                    <label for="title"><?php echo e(__('Facebook Meta Tag')); ?></label>
                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                           name="facebook_meta_tags"
                                                           value="<?php echo e($blog_post->meta_data->facebook_meta_tags ?? ''); ?>">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title"><?php echo e(__('Facebook Meta Description')); ?></label>
                                                        <textarea name="facebook_meta_description"
                                                                  class="form-control max-height-140 meta-desc"
                                                                  cols="20"
                                                                  rows="4"><?php echo $blog_post->meta_data->facebook_meta_description ?? ''; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for="og_meta_image"><?php echo e(__('Facebook Meta Image')); ?></label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap">
                                                            <?php echo render_attachment_preview_for_admin($blog_post->meta_data->facebook_meta_image ?? ''); ?>

                                                        </div>
                                                        <input type="hidden" id="facebook_meta_image"
                                                               name="facebook_meta_image"
                                                               value="<?php echo e($blog_post->meta_data->facebook_meta_image ?? ''); ?>">
                                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                                data-toggle="modal"
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
                                                           name="twitter_meta_tags"
                                                           value=" <?php echo e($blog_post->meta_data->twitter_meta_tags ?? ''); ?>">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title"><?php echo e(__('Twitter Meta Description')); ?></label>
                                                        <textarea name="twitter_meta_description"
                                                                  class="form-control max-height-140 meta-desc"
                                                                  cols="20"
                                                                  rows="4"><?php echo $blog_post->meta_data->twitter_meta_description ?? ''; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="og_meta_image"><?php echo e(__('Twitter Meta Image')); ?></label>
                                                    <div class="media-upload-btn-wrapper">
                                                        <div class="img-wrap">
                                                            <?php echo render_attachment_preview_for_admin($blog_post->meta_data->twitter_meta_image ?? ''); ?>

                                                        </div>
                                                        <input type="hidden" id="twitter_meta_image"
                                                               name="twitter_meta_image"
                                                               value="<?php echo e($blog_post->meta_data->twitter_meta_image ?? ''); ?>">
                                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                                data-toggle="modal"
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
                                        <?php
                                            $check = $blog_post->video_url || $blog_post->embed_code || $blog_post->video_thumbnail ? 'checked' : ''
                                        ?>
                                        <input class="form-check-input post_type" type="radio"
                                               name="inlineRadioOptions" checked
                                               id="radio_general" value="option1"
                                        >
                                        <i class="ti-settings"></i>
                                        <label class="form-check-label" for="inlineRadio1"><?php echo e(__('General')); ?></label>
                                    </div>
                                    <div class="form-check form-check-inline d-block">

                                        <input class="form-check-input post_type" type="radio" name="inlineRadioOptions"
                                               id="radio_video" value="option2" <?php echo e($check); ?>>
                                        <i class="ti-video-camera"></i>
                                        <label class="form-check-label" for="inlineRadio2"><?php echo e(__('Video')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video_section" style="display: none">
                            <div class="card mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="slug"><?php echo e(__('Video Url')); ?></label>
                                                <input type="text" class="form-control" name="video_url"
                                                       value=" <?php echo $blog_post->video_url ?? ''; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug"><?php echo e(__('Video Duation')); ?></label>
                                                <input type="text" class="form-control" name="video_duration"
                                                       value=" <?php echo $blog_post->video_duration ?? ''; ?>">
                                            </div>
                                        </div>
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
                                                <ul>
                                                    <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <input type="radio" name="category_id"
                                                                   id="exampleCheck1" value="<?php echo e($category->id); ?>"

                                                                    <?php echo e($blog_post->category_id === $category->id ? 'checked' : ''); ?>

                                                            >
                                                            <label class="ml-1">
                                                                <?php echo e(purify_html($category->getTranslation('title',$default_lang))); ?>

                                                            </label>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="form-group " id="blog_tag_list">
                                            <label for="title"><?php echo e(__('Blog Tag')); ?></label>


                                            <?php
                                                $tags_arr = json_decode($blog_post->tag_id);
                                                $tags = is_array($tags_arr) ? implode(",", $tags_arr) : "";
                                            ?>

                                            <input type="text" class="form-control tags_filed" data-role="tagsinput"
                                                   name="tag_id[]" value=" <?php echo e($tags); ?> ">

                                            <div id="show-autocomplete" style="display: none;">
                                                <ul class="autocomplete-warp"></ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured"><strong><?php echo e(__('Featured')); ?></strong></label>
                                            <label class="switch">
                                                <input type="checkbox" name="featured"
                                                       <?php if($blog_post->featured ?? ''): ?> checked <?php endif; ?> >
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label for="breaking_news"><strong><?php echo e(__('Breaking News')); ?></strong></label>
                                            <label class="switch">
                                                <input type="checkbox" name="breaking_news"
                                                       <?php if($blog_post->breaking_news ?? ''): ?> checked <?php endif; ?> >
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                        <div class="form-group ">
                                            <label for="slug"><?php echo e(__('Order')); ?></label>
                                            <input type="number" class="form-control" name="order_by"
                                                   value="<?php echo e($blog_post->order_by ?? ''); ?>">
                                        </div>
                                        <div id="visibility_list" class="form-group ">
                                            <label for="visibility"><?php echo e(__('Visibility')); ?></label>
                                            <select name="visibility" class="form-control" id="visibility">
                                                <option value="public"
                                                        <?php if($blog_post->visibility == 'public'): ?> selected <?php endif; ?> ><?php echo e(__('Public')); ?></option>
                                                <option value="logged_user"
                                                        <?php if($blog_post->visibility == 'logged_user'): ?> selected <?php endif; ?> ><?php echo e(__('Logged User')); ?></option>
                                                <option value="password"
                                                        <?php if($blog_post->visibility == 'password'): ?> selected <?php endif; ?> ><?php echo e(__('Password')); ?></option>
                                            </select>
                                        </div>

                                        <div class="form-group d-none password-section">
                                            <label for="title"><?php echo e(__('Blog Password')); ?></label>
                                            <div class="d-flex justify-content-between">
                                                <input type="password" class="form-control password" name="password">
                                                <span href="" class="btn btn-primary btn-sm mr-1 password-show"> <i
                                                            class="las la-eye show-icon d-none"></i> <i
                                                            class="las la-low-vision close-icon"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="status"><?php echo e(__('Status')); ?></label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="draft"
                                                        <?php if($blog_post->status == 'draft'): ?> selected <?php endif; ?>><?php echo e(__("Draft")); ?></option>
                                                <option value="publish"
                                                        <?php if($blog_post->status == 'publish'): ?> selected <?php endif; ?>><?php echo e(__("Publish")); ?></option>
                                                <option value="archive"
                                                        <?php if($blog_post->status == 'archive'): ?> selected <?php endif; ?>><?php echo e(__("Archive")); ?></option>
                                                <option class="selected_schedule"
                                                        value="schedule"
                                                        <?php if($blog_post->status == 'schedule'): ?> selected <?php endif; ?>><?php echo e(__("Schedule")); ?></option>
                                            </select>
                                            <?php

                                                    ?>

                                            <input type="date" name="schedule_date" class="form-control mt-2 date"
                                                   value="<?php echo e($blog_post->schedule_date ?? ''); ?>" style="display: none"
                                                   id="edit_schedule">

                                        </div>

                                        <div class="form-group">
                                            <label for="og_meta_image"><?php echo e(__('Blog Image')); ?></label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap">
                                                    <?php echo render_attachment_preview_for_admin($blog_post->image ?? ''); ?>

                                                </div>
                                                <input type="hidden" id="image" name="image"
                                                       value="<?php echo e($blog_post->image); ?>">
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
                                            <label for="og_meta_image"><?php echo e(__('Blog Image Gallery')); ?></label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap">
                                                    <?php echo render_gallery_image_attachment_preview($blog_post->image_gallery ?? ''); ?>

                                                </div>
                                                <input type="hidden" id="og_meta_image" name="image_gallery"
                                                       value="<?php echo e($blog_post->image_gallery ?? ''); ?>">
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


                                        <div class="submit_btn mt-5">
                                            <button type="submit"
                                                    class="btn btn-success"><?php echo e(__('Save Post ')); ?></button>
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
        flatpickr('#edit_schedule', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d H:i",
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
                url: "<?php echo e(route('admin.get.tags.by.ajax')); ?>",
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
                            html += '<li class="tag_option" data-id="' + key + '" data-val="' + tag + '">' + tag + '</li>'
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
                //Status Code

                if ($('#status').val() == 'schedule') {
                    $('.date').show();
                    $('.date').focus();
                }
                $(document).on('change', '#status', function (e) {
                    e.preventDefault();
                    if ($(this).val() == 'schedule') {
                        $('.date').show();
                        $('.date').focus();
                    } else {
                        $('.date').hide();
                    }
                });

                //Permalink Code
                var sl = $('.blog_slug').val();
                var url = `<?php echo e(url('/blog/')); ?>/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

                var form = $('#blog_new_form');

                $(document).on('keyup', '#title', function (e) {
                    var slug = $(this).val().trim().toLowerCase().split(' ').join('-');
                    var url = `<?php echo e(url('/'.get_page_slug(get_static_option('blog_page'),'blog').'/')); ?>/` + slug;
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
                    var slug = update_input.trim().toLowerCase().split(' ').join('-');
                    var url = `<?php echo e(url('/blog/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });
                checkPostStatus();

                function checkPostStatus() {
                    if ($('#status').val() == 'schedule') {
                        $('.date').show();
                        $('.date').focus();
                    } else {
                        $('.date').hide();
                    }
                }

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
                $(document).on('change', '#langchange', function (e) {
                    $('#langauge_change_select_get_form').trigger('submit');
                });

                $(document).on('change', '.post_type', function () {
                    var val = $(this).val();
                    if (val === 'option2') {
                        $('.video_section').show();
                    } else {
                        $('.video_section').hide();
                    }
                })

            });

            if ('<?php echo e($check); ?>') {
                $('.video_section').show();
            }


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


        //Visibility Password Code
        $(document).on('change', '#visibility', function (e) {
            if ($(this).val() === 'password') {
                $('.password-section').removeClass('d-none');
            } else {
                $('.password-section').addClass('d-none');
            }
        });

        $(document).on('mousedown', '.password-show', function (e) {
            e.preventDefault();
            let paswd = $('.password');
            paswd.attr("type", "text");
            $('.password-show').attr("value", "hide");
            $('.show-icon').removeClass('d-none');
            $('.close-icon').addClass('d-none');
        });

        $(document).on('mouseup', '.password-show', function (e) {
            e.preventDefault();
            let paswd = $('.password');
            paswd.attr("type", "password");
            $('.password-show').attr("value", "show");
            $('.show-icon').addClass('d-none');
            $('.close-icon').removeClass('d-none');
        });

        let exist_password_value = '<?php echo e($blog_post->password); ?>';
        let password = $('.password');

        if ($('#visibility').val() == 'password') {
            $('.password-section').removeClass('d-none');
            password.val(exist_password_value);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/Modules/Blog/Resources/views/backend/blog/edit.blade.php ENDPATH**/ ?>