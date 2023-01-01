$('.load-ajax-data').hide();
    $(document).on('click','.recent-deal',function(e){
    
        e.preventDefault();
        let el = $(this);
        var id = $(this).data('id');
        var limit = $(this).data('product');
        var route = $(this).data('route');

        $(this).addClass('active').siblings().removeClass('active');

        $.ajax({
        url: route,
        type: 'get',
        data:{
                id:id,
                product_limit:limit
            },

            beforeSend: function (){
                $('.recent-item-wrap').fadeOut();
                $('.loderWrapper').css('display','block');
            },
              success: function(data){
                $('.recent-item-wrap').html(data.markup).fadeIn();
                $('.loderWrapper').fadeOut();
            },
            error: function(data){
                $('.loderWrapper').css('display','none');
            }

      });


});
<?php /**PATH E:\XAMPP\htdocs\coupon\@core\resources\views/components/frontend/recent-product-by-ajax.blade.php ENDPATH**/ ?>