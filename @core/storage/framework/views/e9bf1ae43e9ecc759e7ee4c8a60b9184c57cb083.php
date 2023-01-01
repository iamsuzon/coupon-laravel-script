
<?php
    $author = NULL;
     if(!is_null($blog_post->user_id)){
             $author = optional($blog_post->user);
         }else if(!is_null($blog_post->admin_id)){
             $author = optional($blog_post->admin);
         }else{
             $author = optional($blog_post->admin);
         }

  //Author image
  $user_image = render_image_markup_by_attachment_id(optional($author)->image, 'image');
  $avatar_image = render_image_markup_by_attachment_id(get_static_option('single_blog_page_comment_avatar_image'),'image');
  $created_by_image = $user_image ? $user_image : $avatar_image;

  $created_by = $blog_post->author ?? __('Anonymous');

  if ($blog_post->created_by === 'user') {
      $user_id = $blog_post->user_id;
  } else {
      $user_id = $blog_post->admin_id;
  }
?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/toastr.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php $page_slug = get_blog_slug_by_page_id(get_static_option('blog_page')) ?>

    <h2 class="list-item font-weight-bold"><a
                href="#"><?php echo e($blog_post->getTranslation('title',$user_select_lang_slug)); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <?php echo render_site_title($blog_post->getTranslation('title',$user_select_lang_slug)); ?>

    <?php echo render_page_meta_data($blog_post); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="blog-details-area-wrapper style-02" data-padding-top="0" data-padding-bottom="100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner-area">
                        <div class="main-img-box">
                            <div class="background-img" data-width="100%" data-height="700"
                                    <?php echo render_background_image_markup_by_attachment_id($blog_post->image); ?>>
                            </div>
                        </div>

                        <h3 class="main-title">
                            <?php echo e($blog_post->title); ?>

                        </h3>

                        <div class="post-meta-main my-4">
                            <div class="post-meta">
                                <ul class="post-meta-list">
                                    <?php if(!empty($author->id)): ?>
                                    <li class="post-meta-item">
                                        <a href="<?php echo e(route('frontend.author.profile',[$blog_post->created_by,$author->id])); ?>">
                                            <span class="text"><?php echo e($created_by); ?></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="post-meta-item date">
                                        <span class="text"><?php echo e($blog_post->created_at->format('F d, Y')); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <?php echo $blog_post->blog_content; ?>


                        <div class="tag-and-social-link">
                            <div class="tag-wrap">
                                <ul>
                                    <li class="name">tags:</li>
                                        <?php $__currentLoopData = json_decode($blog_post->tag_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(empty($tag)) continue; ?>
                                            <li><a href="<?php echo e(route('frontend.blog.tag.single',$tag)); ?>" class="tag-btn"><?php echo e($tag); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <div class="social-link-wrap">
                                <div class="social-icon">
                                    <ul class="widget-social-link-list">
                                        <li class="name"><?php echo e(__('Share:')); ?></li>
                                        <?php echo single_post_share_two(route('frontend.blog.single',['id' => $blog_post->id, 'slug' => $blog_post->slug]),$blog_post->title,$blog_post->image); ?>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- comment area star -->
                    <?php echo $__env->make('blog::frontend.blog.blog-single-variant.partials.details_comment_area_01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- comment area end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- you may like area start -->
    <?php echo $__env->make('blog::frontend.blog.blog-single-variant.partials.details_you_may_like_01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- you may like area end -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/common/js/toastr.min.js')); ?>"></script>

    <script>
        (function($){
            "use strict";

            $(document).ready(function(){
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "100",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                };

                $(document).on('submit','.comment-form',function(e){
                    e.preventDefault();
                    let blog_id = $('#blog_id').val();
                    let comment = $('textarea#comment').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url:"<?php echo e(route('frontend.blog.comment.store')); ?>",
                        method:"post",
                        data:{
                            blog_id:blog_id,
                            comment:comment,
                        },
                        beforeSend: function (res) {
                            $('#post-comment-btn').text('Posting...');
                        },
                        success:function(res){
                            if (res.status == 'ok' && res.type == 'success') {
                                toastr.success(res.msg);
                                $('#post-comment-btn').text('Post Comment');
                                $("#comment-list").load(location.href + " #comment-list");
                            }
                            else
                            {
                                toastr.error(res.msg);
                                $('#post-comment-btn').text('Post Comment');
                            }
                            $('.comment-form')[0].reset();
                        },
                        error: function(res){
                            $.each(res.responseJSON.errors, function (key, value){
                                toastr.error(value);
                            });
                            $('#post-comment-btn').text('Post Comment');
                        }
                    });
                })

                $('.comment-reply-form').hide();
                $(document).on('click', '.reply-btn', function (e){
                    e.preventDefault();

                    let el = $(this);
                    let comment_id = el.data('reply');

                    let reply_button = $(`[data-reply='${comment_id}']`);
                    reply_button.find('span').text('Reply');

                    $('.comment-' + comment_id).toggle();
                });


                $(document).on('submit','.comment-reply-form',function(e){
                    e.preventDefault();

                    var el = $(this);
                    var comment_id = el.data('comment_id');

                    var form = $('.comment-reply-form');
                    var reply = form.find('#comment-reply-'+comment_id).val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url:"<?php echo e(route('frontend.blog.comment.reply.ajax')); ?>",
                        method:"post",
                        data:{
                            comment_id:comment_id,
                            reply:reply,
                        },
                        beforeSend: function (res){
                            let button = $('#reply-send-button-'+comment_id);
                            button.text('Replying...');
                            button.attr('disabled', true);
                        },
                        success:function(res){
                            if (res.status == 'ok' && res.type == 'success') {
                                $(`[data-reply='${comment_id}']`).find('span').text('Reply');
                                $('.comment-' + comment_id)[0].reset();
                                $('.comment-' + comment_id).toggle();

                                let button = $('#reply-send-button-'+comment_id);
                                button.text('Reply');
                                button.attr('disabled', false);

                                setTimeout(function (){
                                    location.reload(true);
                                }, 1000);

                                toastr.success(res.msg);
                            }
                            else
                            {
                                toastr.error(res.msg);
                            }
                        },
                        error: function (res){
                            $('.comment-section-error').html('');
                            $.each(res.responseJSON.errors, function (key, value){
                                toastr.error(value);
                            });

                            let button = $('#reply-send-button-'+comment_id);
                            button.text('Reply');
                            button.attr('disabled', false);
                        }
                    });
                })
            });

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
                        username : username,
                        password : password,
                        remember : remember,
                    },
                    success: function (data){
                        if(data.status == 'invalid'){
                            el.text('<?php echo e(__("Login")); ?>')
                            formContainer.find('.error-wrap').html('<div class="alert alert-danger">'+data.msg+'</div>');
                        }else{
                            formContainer.find('.error-wrap').html('');
                            el.text('<?php echo e(__("Login Success.. Redirecting ..")); ?>');
                            location.reload();
                        }
                    },
                    error: function (data){
                        console.log(data);
                        var response = data.responseJSON.errors;
                        formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                        $.each(response,function (value,index){
                            formContainer.find('.error-wrap ul').append('<li>'+index+'</li>');
                        });
                        el.text('<?php echo e(__("Login")); ?>');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/coupon/@core/Modules/Blog/Resources/views/frontend/blog/blog-single-variant/details-01.blade.php ENDPATH**/ ?>