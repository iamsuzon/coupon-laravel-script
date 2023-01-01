$('a#tag_view_all').hide();
    $(document).on('keyup','#searchProduct',function (e){
        e.preventDefault();

        let el_val = $(this).val()

        $.ajax({
            type: 'get',
            url :  "<?php echo e(route('frontend.product.autocomplete.search')); ?>",
            data: {
                query: $(this).val()
            },
            beforeSend: function (){
                $('.loderWrapper').show();
            },
            success: function (data){

                $('#show-autocomplete ul').html('');
                if($('#searchProduct').val() != '' && data != ''){
                    $('#show-autocomplete ul').html(data);
                    $('#show-autocomplete').show();

                    $('.loderWrapper').fadeOut();
                }else{
                    $('#show-autocomplete').hide();
                    $('.loderWrapper').fadeOut();
                }
            },
            error: function (res){
                $('.loderWrapper').fadeOut();
            }
        });

        $(document).on('click','#search-close',function(e){
            e.preventDefault();
             $('#show-autocomplete').hide();
            $('#searchProduct').val('');
        });
    });

$(document).on('click','#search-close',function(e){
    e.preventDefault();
     $('#show-autocomplete').hide();
            $('#searchProduct').val('');
});

<?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon-final/@core/resources/views/components/frontend/product-search.blade.php ENDPATH**/ ?>