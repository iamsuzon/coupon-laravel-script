<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('User Login')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-page-title'); ?>
    <?php echo e(__('User Login')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- sign-in area start -->
    <div class="sign-in-area-wrapper" data-padding-top="0" data-padding-bottom="110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="sign-in register">
                        <h4 class="title">Log In</h4>
                        <div class="form-wrapper">
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
                            <form action="<?php echo e(route('user.login')); ?>" method="post" enctype="multipart/form-data"
                                  class="account-form" id="login_form_order_page">
                                <?php echo csrf_field(); ?>
                                <div class="error-wrap"></div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo e(__(' Username')); ?><span class="required">*</span></label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                           placeholder="Type your username">
                                </div>
                                <div class="form-group iconPosition">
                                    <label for="exampleInputEmail1"><?php echo e(__('Password')); ?><span
                                                class="required">*</span></label>
                                    <input type="password" name="password" class="form-control"
                                           id="exampleInputPassword1" placeholder="Password">
                                    <button type="button" class="icon" id="togglePassView"><i class="fas fa-eye"></i></button>
                                </div>

                                <div class="form-group form-check">
                                    <div class="box-wrap">
                                        <div class="left">
                                            <input type="checkbox" name="remember" class="form-check-input"
                                                   id="exampleCheck1">
                                            <label class="form-check-label"
                                                   for="exampleCheck1"><?php echo e(__('Remember me')); ?></label>
                                        </div>
                                        <div class="right">
                                            <a href="<?php echo e(route('user.forget.password')); ?>"><?php echo e(__('Forgot Password?')); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="submit" id="login_btn"
                                            class="btn-default rounded-btn"><?php echo e(__('Sign In')); ?></button>
                                </div>
                                <div class="or">
                                    <p class="text"><?php echo e(__('or')); ?></p>
                                </div>
                                <div class="sign-in-with">
                                    <?php if(get_static_option('enable_facebook_login')): ?>
                                        <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="special-account google">
                                            <div class="icon-box">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18"
                                                     viewBox="0 0 18 18">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                                        gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#18acfe"/>
                                                            <stop offset="1" stop-color="#0163e0"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <g id="Facebook_icon" data-name="Facebook icon"
                                                       transform="translate(-2 -2)">
                                                        <circle id="Ellipse_342" data-name="Ellipse 342" cx="9" cy="9"
                                                                r="9"
                                                                transform="translate(2 2)"
                                                                fill="url(#linear-gradient)"/>
                                                        <path id="Path_11691" data-name="Path 11691"
                                                              d="M17.2,15.883l.4-2.536H15.1V11.7a1.285,1.285,0,0,1,1.467-1.371H17.7V8.171A14.2,14.2,0,0,0,15.687,8a3.136,3.136,0,0,0-3.4,3.414v1.933H10v2.536h2.286v6.131a9.368,9.368,0,0,0,2.814,0V15.883Z"
                                                              transform="translate(-2.865 -2.149)" fill="#fff"/>
                                                    </g>
                                                </svg>

                                            </div>
                                            <?php echo e(__(' Sign in with Google')); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if(get_static_option('enable_google_login')): ?>
                                        <a href="<?php echo e(route('login.google.redirect')); ?>" class="special-account facebook">
                                            <div class="icon-box">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                     viewBox="0 0 18 18">
                                                    <g id="google_icon" data-name="google icon"
                                                       transform="translate(-2.001 -2)">
                                                        <path id="Path_11687" data-name="Path 11687"
                                                              d="M25.1,15.289a7.564,7.564,0,0,0-.194-1.84H16.287v3.34h5.061a4.386,4.386,0,0,1-1.878,2.92l-.017.112,2.726,2.07.189.018A8.712,8.712,0,0,0,25.1,15.289Z"
                                                              transform="translate(-5.102 -4.089)" fill="#4285f4"/>
                                                        <path id="Path_11688" data-name="Path 11688"
                                                              d="M11.728,25.989a8.858,8.858,0,0,0,6.082-2.18l-2.9-2.2a5.515,5.515,0,0,1-3.184.9A5.518,5.518,0,0,1,6.5,18.769l-.108.009-2.835,2.15-.037.1A9.2,9.2,0,0,0,11.728,25.989Z"
                                                              transform="translate(-0.544 -5.989)" fill="#34a853"/>
                                                        <path id="Path_11689" data-name="Path 11689"
                                                              d="M5.961,15.511a5.44,5.44,0,0,1-.306-1.78,5.716,5.716,0,0,1,.3-1.78l-.005-.119L3.075,9.647l-.094.044a8.821,8.821,0,0,0,0,8.08Z"
                                                              transform="translate(0 -2.731)" fill="#fbbc05"/>
                                                        <path id="Path_11690" data-name="Path 11690"
                                                              d="M11.728,5.48a5.145,5.145,0,0,1,3.551,1.34l2.592-2.48A8.922,8.922,0,0,0,11.728,2a9.2,9.2,0,0,0-8.2,4.96L6.494,9.22A5.541,5.541,0,0,1,11.728,5.48Z"
                                                              transform="translate(-0.544)" fill="#eb4335"/>
                                                    </g>
                                                </svg>
                                            </div>
                                            <?php echo e(__('Sign in with Facebook')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </form>
                            <p class="info"><?php echo e(__("Don'/t have an account")); ?> <a href="<?php echo e(route('user.register')); ?>"
                                                                                class="active"><?php echo e(__('Sign up')); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sign-in area end -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        (function ($) {
            "use strict";
            $(document).on('click', '#login_btn', function (e) {
                e.preventDefault();
                var formContainer = $('#login_form_order_page');
                var el = $(this);
                var username = formContainer.find('input[name="username"]').val();
                var password = formContainer.find('input[name="password"]').val();
                var remember = formContainer.find('input[name="remember"]').val();

                el.text('<?php echo e(__("Please Wait..")); ?>');

                $.ajax({
                    method: 'post',
                    url: "<?php echo e(route('user.ajax.login')); ?>",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        username: username,
                        password: password,
                        remember: remember,
                    },
                    success: function (data) {
                        if (data.status == 'invalid') {
                            el.text('<?php echo e(__("Login")); ?>')
                            formContainer.find('.error-wrap').html('<div class="alert alert-danger">' + data.msg + '</div>');
                        } else {
                            formContainer.find('.error-wrap').html('');
                            el.text('<?php echo e(__("Login Success.. Redirecting ..")); ?>');
                            location.reload();
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        var response = data.responseJSON.errors;
                        formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                        $.each(response, function (value, index) {
                            formContainer.find('.error-wrap ul').append('<li>' + index + '</li>');
                        });
                        el.text('<?php echo e(__("Login")); ?>');
                    }
                });
            });


            $(document).on('click', '#togglePassView', function (e) {
                e.preventDefault();

                let password = document.getElementById("exampleInputPassword1");
                let togglePassView = document.getElementById("togglePassView");

                if (password.type == "password") {
                    password.type = "text"
                    togglePassView.innerHTML = `<i class="fas fa-eye-slash"></i>`
                } else if (password.type == "text") {
                    password.type = "password"
                    togglePassView.innerHTML = `<i class="fas fa-eye"></i>`
                }
            });
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/resources/views/frontend/user/login.blade.php ENDPATH**/ ?>