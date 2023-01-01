<script>
    $(document).on('click', '.grab-now',function(e) {
        e.preventDefault();
        let el = $(this);
        let id = el.data('id');

        $.ajax({
            type: 'get',
            url: '<?php echo e(route('frontend.product.popup.ajax')); ?>',
            data: {
                id: id
            },

            beforeSend: function (){
                $('.loderWrapper').css('display','block');
            },
            success: function (res) {
                $('.product-modal-wrap').html(res.markup);
                $('.product-modal-wrap').addClass('show');

                $('.loderWrapper').fadeOut();
            },
            error: function (res) {
                $('.loderWrapper').css('display','none');
            }
        });
    });

    $('#close').on('click', function(e) {
        $('.product-modal-wrap').removeClass('show');
    });

    $(document).on('click', '.copy-box a, span.modal-code',function(e) {
        e.preventDefault();

        var product_id = $(this).attr('data-product_id');
        var copyText = $(this).attr('data-code');

        var textarea = document.createElement("textarea");
        textarea.style.displey = 'none';
        textarea.textContent = copyText;
        document.body.appendChild(textarea);

        textarea.select();
        document.execCommand("copy");

        $('.copy-box').addClass('copied');

        document.body.removeChild(textarea);

        CountCoupon(product_id);

        setTimeout(function (){
            $('.copy-box').removeClass('copied');
        }, 10000);
    });

    function CountCoupon(product_id){
        $.ajax({
            type: 'post',
            url: '<?php echo e(route('frontend.product.coupon_used.ajax')); ?>',
            data: {
                product_id: product_id,
                _token: "<?php echo e(csrf_token()); ?>",
            },

            beforeSend: function (){
                $('.loderWrapper').css('display','block');
            },
            success: function (res) {
                $('.loderWrapper').fadeOut();
            },
            error: function (res) {
                $('.loderWrapper').css('display','none');
            }
        });
    }

    // non modal
    $(document).on('click', '.copy_coupon',function(e) {
        e.preventDefault();

        var product_id = $(this).attr('data-product_id');
        var copyText = $(this).attr('data-code');

        var textarea = document.createElement("textarea");
        textarea.style.displey = 'none';
        textarea.textContent = copyText;
        document.body.appendChild(textarea);

        textarea.select();
        document.execCommand("copy");

        $('.copy-'+product_id).addClass('copied');
        $('.overlay-'+product_id).text('Coupon Copied');

        $('.overlay-'+product_id).parent().css('background-color','#00fa9a');
        $('.overlay-'+product_id).prev().css('color','#000');

        document.body.removeChild(textarea);

        CountCoupon(product_id);

        setTimeout(function (){
            $('.copy-box').removeClass('copied');
        }, 10000);
    });
</script><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/components/frontend/product-pop-up-js.blade.php ENDPATH**/ ?>