<div class="newsletter-area-wrapper bg-color-a" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container custom-container-03">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-8 col-lg-5">
                <div class="content">
                    <h3 class="title"><?php echo e($data['title']); ?></h3>
                    <p class="info"><?php echo e($data['subtitle']); ?></p>
                    <div class="search combained v-02">
                        <form action="" method="POST" id="news_letter">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="<?php echo e($data['input_text']); ?>">
                                <button type="submit" class="search-btn" id="subscribe_btn"><?php echo e($data['button_text']); ?></button>
                            </div>
                        </form>
                        <div id="alert-box"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-box">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/01.png')); ?>" alt="" class="shape-01">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/02.png')); ?>" alt="" class="shape-02">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/03.png')); ?>" alt="" class="shape-03">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/04.png')); ?>" alt="" class="shape-04">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/05.png')); ?>" alt="" class="shape-05">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/06.png')); ?>" alt="" class="shape-06">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/07.png')); ?>" alt="" class="shape-07">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/08.png')); ?>" alt="" class="shape-08">
            <img src="<?php echo e(asset('assets/frontend/img/newsletter/09.png')); ?>" alt="" class="shape-09">
        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        $('#alert-box').hide();

        $('#news_letter').on('submit', function (e){
            e.preventDefault();

            $('#alert-box').empty();
            let email = $('input[name=email]').val();
            console.log(email);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('frontend.subscribe.newsletter')); ?>",
                data: {
                    email : email,
                    token : '<?php echo e(csrf_token()); ?>',
                },

                beforeSend: function ()
                {
                    $('#subscribe_btn').attr('disabled', true);
                    $('#subscribe_btn').text('Subscribing...');
                },
                success: function (res)
                {
                    let alert = `<div class="alert alert-success">`+res.msg+`</div>`
                    $('#alert-box').show();
                    $('#alert-box').append(alert);
                    $('#subscribe_btn').attr('disabled', false);
                    $('#subscribe_btn').text('Subscribe Now');
                },
                error: function (res)
                {
                    $('#alert-box').show();
                    $.each(res.responseJSON.errors, function (key, value){
                        let alert = `<div class="alert alert-danger">`+value+`</div>`
                        $('#alert-box').append(alert);
                    });
                    $('#subscribe_btn').attr('disabled', false);
                    $('#subscribe_btn').text('Subscribe Now');
                }
            })
        })
    })
</script><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/app/Providers/../PageBuilder/views/home/home_page_newsletter.blade.php ENDPATH**/ ?>