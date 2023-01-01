

<?php $__env->startSection('custom-page-title'); ?>
    <?php echo __('All Blogs'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php $page_slug = get_blog_slug_by_page_id(get_static_option('blog_page')) ?>
    <li class="list-item"><a href="#">  <?php echo App\Page::where('id',get_static_option('blog_page'))->first()->getTranslation('title',$user_select_lang_slug); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo App\Page::where('id',get_static_option('blog_page'))->first()->getTranslation('title',$user_select_lang_slug); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <?php echo render_site_meta(); ?>

    <?php echo render_site_title(App\Page::where('id',get_static_option('blog_page'))->first()->getTranslation('title',$user_select_lang_slug)); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if($page_post->page_builder_status === 'on'): ?>
        <?php echo $__env->make('frontend.partials.pages-portion.dynamic-page-builder-part',['page_post' => $page_post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <div class="blog-grid-area-wrapper food-details" data-padding-top="100" data-padding-bottom="100">
        <div class="container">
            <div class="row three-column">
                <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="blog-grid style-01">
                            <div class="img-box">
                                <?php echo render_image_markup_by_attachment_id($blog->image, null, 'grid', false); ?>

                            </div>
                            <div class="content">
                                <h4 class="title">
                                    <a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                                </h4>
                                <div class="post-meta">
                                    <ul class="post-meta-list">
                                        <li class="post-meta-item">
                                            <a href="<?php echo e(route('frontend.blog.category.single', $blog->category_id)); ?>">
                                                <span class="text"><?php echo e(optional($blog->category)->title); ?></span>
                                            </a>
                                        </li>
                                        <li class="post-meta-item date">
                                            <span class="text"><?php echo e($blog->created_at->format('d F Y')); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row">
                <!-- pagination area start -->
                <div class="col-lg-12">
                    <div class="pagination" data-padding-top="50">
                        <ul class="pagination-list">
                            <?php echo e($all_blogs->links()); ?>

                        </ul>
                    </div>
                </div>
                <!-- pagination area end -->
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/Modules/Blog/Resources/views/frontend/blog/blog.blade.php ENDPATH**/ ?>