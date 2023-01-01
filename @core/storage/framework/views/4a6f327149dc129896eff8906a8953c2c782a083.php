<script>
    // Newsletter Insert

    $(document).on('click', '#subscribe_btn', function (e) {
        e.preventDefault();

        var email = $('.news_email').val();

        var errrContaner = $(this).parent().parent().parent().parent().find('#alert-box');
        errrContaner.show();

        errrContaner.html('');
        var paperIcon = 'lab la-telegram-plane';
        var spinnerIcon = 'fas fa-spinner';
        var el = $(this);

        el.find('i').removeClass(paperIcon).addClass(spinnerIcon);
        $.ajax({
            url: "<?php echo e(route('frontend.subscribe.newsletter')); ?>",
            type: "POST",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                email: email
            },

            beforeSend: function() {
                el.find('i').addClass(spinnerIcon).removeClass(paperIcon);
                $('.loderWrapper').css('display','block');
            },

            success: function (data) {
                console.log(data);
                errrContaner.html('<div class="alert alert-'+data.type+'">' + data.msg + '</div>');
                el.find('i').addClass(paperIcon).removeClass(spinnerIcon);

                $('.loderWrapper').css('display','none');
            },
            error: function (data) {
                el.find('i').addClass(paperIcon).removeClass(spinnerIcon);
                var errors = data.responseJSON.errors;
                errrContaner.html('<div class="alert alert-danger">' + errors.email[0] + '</div>');

                $('.loderWrapper').css('display','none');
            }
        });
    });

</script><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon-final/@core/resources/views/components/frontend/newsletter-store.blade.php ENDPATH**/ ?>