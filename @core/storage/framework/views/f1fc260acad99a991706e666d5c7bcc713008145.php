<?php $__env->startSection('style'); ?>
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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <style>
        #slug_edit .form-control {
            height: 30px;
            width: 100%;
        }

        .slug_edit_button {
            line-height: 0px;
            margin: 0;
            padding: 8px 8px;
        }

        .slug_update_button {
            line-height: 0px;
            margin: 0;
            padding: 12px;
        }

        .meta .flex-column{
            background-color: #f2f2f2;
        }

        .meta .flex-column a{
            color: #0c0c0c;
        }


    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Page')); ?>

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
                                <h4 class="header-title"><?php echo e(__('Edit Page')); ?>   </h4>
                            </div>
                            <div class="header-title d-flex">
                                <div class="btn-wrapper-inner">
                                    <a href="<?php echo e(route('admin.page')); ?>" class="btn btn-primary"><?php echo e(__('All Pages')); ?></a>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo e(route('admin.page.update',$page_post->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="lang" value="<?php echo e($default_lang); ?>">
                            <div class="tab-content margin-top-40">

                                <div class="form-group">
                                    <label for="title"><?php echo e(__('Title')); ?></label>
                                    <input type="text" class="form-control" name="title" value="<?php echo e($page_post->getTranslation('title',$default_lang)); ?>" id="title">
                                </div>

                                <div class="form-group permalink_label">
                                    <label class="text-dark"><?php echo e(__('Permalink * : ')); ?>

                                        <span id="slug_show" class="display-inline"></span>
                                        <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i class="fas fa-edit"></i> </button>
                                          <input type="text" name="slug" value="<?php echo e($page_post->slug); ?>" class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2" style="display: none"><?php echo e(__('Update')); ?></button>
                                    </span>
                                    </label>
                                </div>

                                <div class="form-group classic-editor-wrapper <?php if(!empty($page_post->page_builder_status)): ?> d-none <?php endif; ?> ">
                                    <label><?php echo e(__('Content')); ?></label>
                                    <input type="hidden" name="page_content" value="<?php echo e($page_post->getTranslation('page_content',$default_lang)); ?>">
                                    <div class="summernote" data-content="<?php echo e($page_post->getTranslation('page_content',$default_lang)); ?>"></div>
                                </div>

                            </div>

                            <div class="row mt-5">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.backend.page-meta-data-edit','data' => ['sidebarHeading' => 'Page Meta','pagepost' => $page_post]]); ?>
<?php $component->withName('backend.page-meta-data-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['sidebarHeading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Page Meta'),'pagepost' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page_post)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Navbar Variant')); ?></h4>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="navbar_variant" value="<?php echo e($page_post->navbar_variant); ?>" name="navbar_variant">
                        </div>
                        <div class="row">
                            <?php for($i = 1; $i < 4; $i++): ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="img-select img-select-nav <?php if($page_post->navbar_variant == $i ): ?> selected <?php endif; ?>">
                                        <div class="img-wrap">
                                            <img src="<?php echo e(asset('assets/frontend/navbar-variant/'.$i.'.png')); ?>" data-nav_id="0<?php echo e($i); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Footer Variant')); ?></h4>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="footer_variant" value="<?php echo e($page_post->footer_variant); ?>" name="footer_variant">
                        </div>
                        <div class="row">
                            <?php for($i = 1; $i < 4; $i++): ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="img-select img-select-footer <?php if($page_post->footer_variant == $i ): ?> selected <?php endif; ?>">
                                        <div class="img-wrap">
                                            <img src="<?php echo e(asset('assets/frontend/footer-variant/'.$i.'.png')); ?>" data-foot_id="0<?php echo e($i); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body meta">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="page_builder_status"><strong><?php echo e(__('Page Builder Enable/Disable')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="page_builder_status"  <?php if(!empty($page_post->page_builder_status)): ?> checked <?php endif; ?> >
                                    <span class="slider onff"></span>
                                </label>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="page_builder_status"><strong><?php echo e(__('Breadcrumb Show/Hide')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="breadcrumb_status"  <?php if(!empty($page_post->breadcrumb_status)): ?> checked <?php endif; ?> >
                                    <span class="slider onff"></span>
                                </label>
                            </div>

                            <div class="form-group">
                                <div class="btn-wrapper page-builder-btn-wrapper <?php if(empty($page_post->page_builder_status)): ?> d-none <?php endif; ?> ">
                                    <a href="<?php echo e(route('admin.dynamic.page.builder',['type' =>'dynamic-page','id' => $page_post->id])); ?>" target="_blank" class="btn btn-primary"> <i class="fas fa-external-link-alt"></i> <?php echo e(__('Open Page Builder')); ?></a>
                                </div>
                            </div>

                            <div class="form-group col-md-12 layout d-none">
                                <label><?php echo e(__('Page Layout')); ?></label>
                                <select name="layout" class="form-control">
                                    <option value="normal_layout" <?php if($page_post->layout == 'normal_layout'): ?> selected <?php endif; ?>><?php echo e(__('Normal Layout')); ?></option>
                                    <option value="home_page_layout" <?php if($page_post->layout == 'home_page_layout'): ?>selected  <?php endif; ?>><?php echo e(__('Home Page')); ?></option>
                                    <option value="home_page_layout_two" <?php if($page_post->layout == 'home_page_layout_two'): ?>selected  <?php endif; ?>><?php echo e(__('Home Page Layout Two')); ?></option>
                                    <option value="home_page_layout_three" <?php if($page_post->layout == 'home_page_layout_three'): ?>selected  <?php endif; ?>><?php echo e(__('Home Page Layout Three')); ?></option>
                                    <option value="sidebar_layout" <?php if($page_post->layout == 'sidebar_layout'): ?>selected  <?php endif; ?>><?php echo e(__('Sidebar Layout')); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 page_class d-none">
                                <label><?php echo e(__('Page Class')); ?></label>
                                <select name="page_class" class="form-control">
                                    <option ><?php echo e(__('Default')); ?></option>
                                    <option value="mixed-area-wrapper index-04"<?php if($page_post->page_class == 'mixed-area-wrapper index-04'): ?> selected <?php endif; ?> ><?php echo e(__('Default Wrapper')); ?></option>
                                    <option value="mixed-area-wrapper-01 index-05"<?php if($page_post->page_class == 'mixed-area-wrapper-01 index-05'): ?> selected <?php endif; ?> ><?php echo e(__(' Wrapper Two')); ?></option>
                                    <option value="blog-grid-wrapper video"<?php if($page_post->page_class == 'blog-grid-wrapper video'): ?> selected <?php endif; ?>><?php echo e(__(' Wrapper Three')); ?></option>
                                    <option value="blog-list-wrapper sports-blog-list-wrapper"<?php if($page_post->page_class == 'blog-list-wrapper sports-blog-list-wrapper'): ?> selected <?php endif; ?>><?php echo e(__(' Wrapper Four')); ?></option>
                                    <option value="blog-list-wrapper blog-standard-wrapper"<?php if($page_post->page_class == 'blog-list-wrapper blog-standard-wrapper'): ?> selected <?php endif; ?>><?php echo e(__(' Wrapper Five')); ?></option>
                                    <option value="blog-grid-wrapper video"<?php if($page_post->page_class == 'blog-grid-wrapper video'): ?> selected <?php endif; ?>><?php echo e(__(' Wrapper Six')); ?></option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label><?php echo e(__('Breadcrumb Class')); ?></label>
                                <select name="widget_style" class="form-control">
                                    <option value=""><?php echo e(__('Default')); ?></option>
                                    <option value="container-two"<?php if($page_post->widget_style == 'container-two'): ?> selected <?php endif; ?>><?php echo e(__('Container Two')); ?></option>
                                </select>
                            </div>


                            <div class="form-group col-md-12">
                                <label><?php echo e(__('Sidebar Layout')); ?></label>
                                <select name="sidebar_layout" class="form-control">
                                    <option selected disabled><?php echo e(__('Select Sidebar')); ?></option>
                                    <option value="none"<?php if($page_post->sidebar_layout == 'none'): ?> selected <?php endif; ?>><?php echo e(__('None')); ?></option>
                                    <option value="footer"<?php if($page_post->sidebar_layout == 'footer'): ?> selected <?php endif; ?>><?php echo e(__('Footer Widget Area')); ?></option>
                                    <option value="sidebar_01"<?php if($page_post->sidebar_layout == 'sidebar_01'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 01 Area')); ?></option>
                                    <option value="sidebar_02"<?php if($page_post->sidebar_layout == 'sidebar_02'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 02 Area')); ?></option>
                                    <option value="sidebar_03"<?php if($page_post->sidebar_layout == 'sidebar_03'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 03 Area')); ?></option>
                                    <option value="sidebar_04"<?php if($page_post->sidebar_layout == 'sidebar_04'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 04 Area')); ?></option>
                                    <option value="sidebar_05"<?php if($page_post->sidebar_layout == 'sidebar_05'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 05 Area')); ?></option>
                                    <option value="sidebar_06"<?php if($page_post->sidebar_layout == 'sidebar_06'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 06 Area')); ?></option>
                                    <option value="blogs_tags"<?php if($page_post->sidebar_layout == 'blogs_tags'): ?> selected <?php endif; ?>><?php echo e(__(' Blogs Tags Area')); ?></option>
                                    <option value="blogs_tags_two"<?php if($page_post->sidebar_layout == 'blogs_tags_two'): ?> selected <?php endif; ?>><?php echo e(__(' Blogs Tags Two Area')); ?></option>
                                    <option value="newsletter_banner"<?php if($page_post->sidebar_layout == 'newsletter_banner'): ?> selected <?php endif; ?>><?php echo e(__(' Newsletter Banner Area')); ?></option>
                                    <option value="banner_newsletter_tags"<?php if($page_post->sidebar_layout == 'banner_newsletter_tags'): ?> selected <?php endif; ?>><?php echo e(__('Banner Newsletter Tags')); ?></option>
                                    <option value="details_page_sidebar"<?php if($page_post->sidebar_layout == 'details_page_sidebar'): ?> selected <?php endif; ?>><?php echo e(__('Details Page Sidebar')); ?></option>

                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="page_builder_status"><strong><?php echo e(__('Sidebar Layout Two Enable/Disable')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="sidebar_layout_two_status"  <?php if(!empty($page_post->sidebar_layout_two_status)): ?> checked <?php endif; ?> >
                                    <span class="slider onff"></span>
                                </label>
                            </div>

                            <div class="form-group col-md-12 sidebar_layout_two d-none">
                                <label><?php echo e(__('Sidebar Layout Two')); ?></label>
                                <select name="sidebar_layout_two" class="form-control">
                                    <option selected disabled><?php echo e(__('Select Sidebar Two')); ?></option>
                                    <option value="footer"<?php if($page_post->sidebar_layout_two == 'footer'): ?> selected <?php endif; ?>><?php echo e(__('Footer Widget Area')); ?></option>
                                    <option value="sidebar_01"<?php if($page_post->sidebar_layout_two == 'sidebar_01'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 01 Area')); ?></option>
                                    <option value="sidebar_02"<?php if($page_post->sidebar_layout_two == 'sidebar_02'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 02 Area')); ?></option>
                                    <option value="sidebar_03"<?php if($page_post->sidebar_layout_two == 'sidebar_03'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 03 Area')); ?></option>
                                    <option value="sidebar_04"<?php if($page_post->sidebar_layout_two == 'sidebar_04'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 04 Area')); ?></option>
                                    <option value="sidebar_05"<?php if($page_post->sidebar_layout_two == 'sidebar_05'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 05 Area')); ?></option>
                                    <option value="sidebar_06"<?php if($page_post->sidebar_layout_two == 'sidebar_06'): ?> selected <?php endif; ?>><?php echo e(__('Page Sidebar 06 Area')); ?></option>
                                    <option value="blogs_tags"<?php if($page_post->sidebar_layout_two == 'blogs_tags'): ?> selected <?php endif; ?>><?php echo e(__(' Blogs Tags Area')); ?></option>
                                    <option value="blogs_tags_two"<?php if($page_post->sidebar_layout_two == 'blogs_tags_two'): ?> selected <?php endif; ?>><?php echo e(__(' Blogs Tags Two Area')); ?></option>
                                    <option value="newsletter_banner"<?php if($page_post->sidebar_layout_two == 'newsletter_banner'): ?> selected <?php endif; ?>><?php echo e(__(' Newsletter Banner Area')); ?></option>
                                    <option value="banner_newsletter_tags"<?php if($page_post->sidebar_layout_two == 'banner_newsletter_tags'): ?> selected <?php endif; ?>><?php echo e(__('Banner Newsletter Tags')); ?></option>
                                </select>
                            </div>


                            <div class="form-group col-md-12">
                                <label><?php echo e(__('Visibility')); ?></label>
                                <select name="visibility" class="form-control">
                                    <option value="all" <?php if($page_post->visibility == 'all'): ?>selected  <?php endif; ?>><?php echo e(__('All')); ?></option>
                                    <option value="user" <?php if($page_post->visibility == 'user'): ?>selected  <?php endif; ?>><?php echo e(__('Only Logged In User')); ?></option>
                                </select>
                            </div>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.fields.status','data' => ['name' => 'status','title' => __('Status')]]); ?>
<?php $component->withName('fields.status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('status'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <button type="submit" id="submit" class="btn btn-info mt-4 pr-4 pl-4"><?php echo e(__('Update')); ?></button>
                    </div>
                    </form>
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
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                let builder_status = '<?php echo e($page_post->page_builder_status == "on"); ?>';
                if(builder_status){
                    $('.layout').removeClass('d-none');
                    $('.page_class').removeClass('d-none');
                }
                $(document).on('change','input[name="page_builder_status"]',function(){
                    if($(this).is(':checked')){
                        $('.classic-editor-wrapper').addClass('d-none');
                        $('.page-builder-btn-wrapper').removeClass('d-none');
                        $('.layout').removeClass('d-none');
                        $('.page_class').removeClass('d-none');
                    }else {
                        $('.classic-editor-wrapper').removeClass('d-none');
                        $('.page-builder-btn-wrapper').addClass('d-none');
                        $('.layout').addClass('d-none');
                        $('.page_class').addClass('d-none');
                    }
                });

                let sidebar_layout_two_status = '<?php echo e($page_post->sidebar_layout_two_status == "on"); ?>';
                if(sidebar_layout_two_status){
                    $('.sidebar_layout_two').removeClass('d-none');
                }

                $(document).on('change','input[name="sidebar_layout_two_status"]',function(){
                    if($(this).is(':checked')){
                        $('.sidebar_layout_two').removeClass('d-none');
                    }else{
                        $('.sidebar_layout_two').addClass('d-none');
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
                //Permalink Code
                var sl =  $('.blog_slug').val();
                var url = `<?php echo e(url('/')); ?>/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

                var form = $('#blog_new_form');

                $(document).on('keyup', '#title', function (e) {
                    var slug = $(this).val().trim().toLowerCase().split(' ').join('-');
                    var url = `<?php echo e(url('/')); ?>/` + slug;
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
                    var url = `<?php echo e(url('/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });


                $(document).on('change','#langchange',function(e){
                    $('#langauge_change_select_get_form').trigger('submit');
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
            });

            //For Navbar
            var imgSelect1 = $('.img-select-nav');
            var id = $('#navbar_variant').val();
            imgSelect1.removeClass('selected');
            $('img[data-nav_id="'+id+'"]').parent().parent().addClass('selected');
            $(document).on('click','.img-select-nav img',function (e) {
                e.preventDefault();
                imgSelect1.removeClass('selected');
                $(this).parent().parent().addClass('selected').siblings();
                $('#navbar_variant').val($(this).data('nav_id'));
            })

            //For Footer
            var imgSelect2 = $('.img-select-footer');
            var id = $('#footer_variant').val();
            imgSelect2.removeClass('selected');
            $('img[data-foot_id="'+id+'"]').parent().parent().addClass('selected');
            $(document).on('click','.img-select-footer img',function (e) {
                e.preventDefault();
                imgSelect2.removeClass('selected');
                $(this).parent().parent().addClass('selected').siblings();
                $('#footer_variant').val($(this).data('foot_id'));
            })

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/backend/pages/page/edit.blade.php ENDPATH**/ ?>