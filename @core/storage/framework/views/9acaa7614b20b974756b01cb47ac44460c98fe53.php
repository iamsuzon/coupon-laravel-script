<div class="topbar-area bg-color-d">
    <div class="container custom-container-04">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar-inner">
                    <div class="left-content">
                        <div class="topbar-item">
                            <div class="contact">
                                <ul class="contact-list">
                                    <?php $__currentLoopData = $all_topbar_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="contact-item phone">
                                            <a href="<?php echo e($info->url); ?>">
                                                <i class="<?php echo e($info->icon); ?> icon"></i>
                                                <?php echo e($info->title); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if(Auth::guard('web')->check() || Auth::guard('admin')->check()): ?>
                                            <?php
                                                $route = auth()->guest() == 'admin' ? route('admin.home') : route('user.home');
                                            ?>

                                            <li class="dashboard-mobile-btn">
                                                <div class="btn-wrapper">
                                                    <a class="btn-default main-color-three border-radius-0" href="<?php echo e($route); ?>"
                                                       style="padding: 5px 25px 5px;font-size: 15px"><?php echo e(__('Dashboard')); ?></a>
                                                </div>
                                            </li>
                                        <?php else: ?>
                                            <?php if(!empty(get_static_option('register_show_hide'))): ?>
                                                <li class="dashboard-mobile-btn">
                                                    <div class="btn-wrapper">
                                                        <a href="<?php echo e(route('user.login')); ?>"
                                                           class="btn-default btn-outline register"> <?php echo e(__('Login')); ?> </a>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="topbar-item d-none">
                            <div class="social-icon">
                                <ul class="social-link-list">
                                    <?php $__currentLoopData = $all_social_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="link-item">
                                            <a href="<?php echo e($icon->url); ?>" class="facebook">
                                                <i class="<?php echo e($icon->icon); ?> icon"></i>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-content">
                        <div class="topbar-item">
                            <div class="social-icon">
                                <ul class="social-link-list">
                                    <?php $__currentLoopData = $all_social_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="link-item">
                                            <a href="<?php echo e($icon->url); ?>" class="facebook">
                                                <i class="<?php echo e($icon->icon); ?> icon"></i>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <?php if(!empty(get_static_option('language_select_option'))): ?>
                            <div class="topbar-item">
                                <div class="single-select">
                                    <select class="lang" id="langchange">
                                        <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $lang_name = explode('(',$lang->name);
                                                $data = array_shift($lang_name);
                                            ?>
                                            <option <?php if(get_user_lang() == $lang->slug): ?> selected
                                                    <?php endif; ?> value="<?php echo e($lang->slug); ?>"><?php echo e($data); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/partials/pages-portion/supports/support-03.blade.php ENDPATH**/ ?>