<?php echo $__env->make('frontend.partials.pages-portion.supports.support-03', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="navbar-main-wrap">
    <nav class="navbar navbar-area navbar-expand-lg has-topbar-65 nav-style-02 v-04 index-03">
        <div class="container nav-container custom-container-04">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="<?php echo e(url('/')); ?>" class="logo">
                        <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo'),'','',false); ?>

                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                <ul class="navbar-nav">
                    <?php echo render_frontend_menu($primary_menu); ?>

                </ul>
            </div>
            <div class="nav-right-content">
                <ul>
                    <li>
                    </li>
                    <li>
                        <div class="btn-wrapper">
                            <?php if(Auth::guard('web')->check() || Auth::guard('admin')->check()): ?>
                                <?php
                                    $route = auth()->guest() == 'admin' ? route('admin.home') : route('user.home');
                                ?>

                                <a class="btn-default main-color-three border-radius-0" href="<?php echo e($route); ?>"
                                   style="padding: 5px 25px 5px;font-size: 15px"><?php echo e(__('Dashboard')); ?></a>
                            <?php else: ?>
                                <?php if(!empty(get_static_option('register_show_hide'))): ?>
                                    <a class="btn-default main-color-three border-radius-0" href="<?php echo e(route('user.register')); ?>"
                                       style="padding: 5px 25px 5px;font-size: 15px"><?php echo e(__('Register')); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/partials/pages-portion/navbars/navbar-03.blade.php ENDPATH**/ ?>