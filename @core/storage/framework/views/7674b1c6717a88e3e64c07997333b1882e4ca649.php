<!DOCTYPE html>
<html lang="<?php echo e(get_user_lang()); ?>" dir="<?php echo e(get_user_lang_direction()); ?>">
<head>

   <?php if(!empty(get_static_option('site_google_analytics'))): ?>
        <?php echo get_static_option('site_google_analytics'); ?>

    <?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo render_favicon_by_id(get_static_option('site_favicon')); ?>

    <?php echo load_google_fonts(); ?>


       <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap"
               rel="stylesheet">

       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min-v4.6.0.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/line-awesome.min-v1.0.3.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/fontawesome.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/price_range_style.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/slick.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jquery-ui.css')); ?>" type="text/css" media="all" />
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/main-style.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/developer.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/helper.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/responsive.css')); ?>">

       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/dynamic-style.css')); ?>">


    
    <?php if(get_static_option('site_frontend_dark_mode') === 'on'): ?>
           <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/dark.css')); ?>">
    <?php endif; ?>
   <?php if(!empty(get_static_option('site_rtl_enabled')) || get_user_lang_direction() === 'rtl'): ?>
       <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/rtl.css')); ?>">
   <?php endif; ?>

    <link rel="canonical" href="<?php echo e(request()->url()); ?>" />
    <script src="<?php echo e(asset('assets/common/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/common/js/jquery-migrate-3.3.2.min.js')); ?>"></script>

    <?php echo $__env->make('frontend.partials.root-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>


      <?php if(request()->routeIs('homepage') || request()->is('/') ): ?>
        <title><?php echo e(get_static_option('site_'.$user_select_lang_slug.'_title')); ?> - <?php echo e(get_static_option('site_'.$user_select_lang_slug.'_tag_line')); ?></title>
           <?php echo render_site_meta(); ?>

       <?php else: ?>
            <?php echo $__env->yieldContent('page-meta-data'); ?>
           <title> <?php echo $__env->yieldContent('site-title'); ?> - <?php echo e(get_static_option('site_'.$user_select_lang_slug.'_tag_line')); ?> </title>
        <?php endif; ?>


</head>

<body>

<?php echo $__env->make('frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon-final/@core/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>