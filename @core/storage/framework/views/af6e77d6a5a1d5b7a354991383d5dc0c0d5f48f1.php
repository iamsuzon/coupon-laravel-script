<?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $custom_class = request()->routeIs('frontend.blog.single') ? 'container-two' : '';
    $breadcrumb_logic =  request()->routeIs('frontend.dynamic.page') || request()->routeIs('frontend.blog.single')
    || request()->routeIs('frontend.blog.category') || request()->routeIs('frontend.blog.tags.page')
    || request()->routeIs('frontend.user.created.blog')  || request()->routeIs('frontend.author.profile')
    || request()->routeIs('frontend.blog.search') || request()->routeIs('frontend.blog.get.search') ? '' : 'custom-container-01';

    $grid_full_page_condition = request()->is('blog-grid-full') ? 'custom-container-01' : '';

?>

<div class="breadcrumb-full
<?php if(
    (in_array(request()->route()->getName(),['homepage','frontend.dynamic.page'])
    && empty($page_post->breadcrumb_status) )
    &&  request()->path() !== get_page_slug(get_static_option('blog_page'),'blog')
    &&  request()->path() !== get_page_slug(get_static_option('product_page'),'product')
    ): ?>
        d-none
<?php endif; ?>">
    <div class="breadcrumb-area position-relative">

        <div class="container custom-container-01">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="content">
                            <?php if(Route::currentRouteName() === 'frontend.dynamic.page'): ?>
                                <h3 class="title"><?php echo $page_post->title ?? ''; ?>  <?php echo $__env->yieldContent('custom-page-title'); ?></h3>
                            <?php else: ?>
                                <?php echo $__env->yieldContent('page-title'); ?>
                            <?php endif; ?>
                            <ul class="page-list">
                                <li class="list-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <?php if(Route::currentRouteName() === 'frontend.dynamic.page' &&  request()->path() !== get_page_slug(get_static_option('blog_page'),'blog') &&  request()->path() !== get_page_slug(get_static_option('product_page'),'product')): ?>
                                    <li class="list-item"><a href="#"><?php echo $page_post->title ?? ''; ?></a></li>
                                <?php else: ?>
                                    <?php echo $__env->yieldContent('page-title'); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon-final/@core/resources/views/frontend/frontend-page-master.blade.php ENDPATH**/ ?>