$('a#tag_view_all').hide();
    $(document).on('keyup','#advanceSearchProduct',function (e){
        e.preventDefault();

        let el_val = $(this).val()
        let location_val = $('#location').find(":selected").val()

        $('#show-autocomplete ul').html('');
        $.ajax({
            type: 'get',
            url :  "{{ route('frontend.product.advance.autocomplete.search') }}",
            data: {
                query: $(this).val(),
                location: location_val
            },
            beforeSend: function (){
                $('.loderWrapper').css('display','block');
            },
            success: function (data){
            
                $('#show-autocomplete ul').html('');
                if($('#advanceSearchProduct').val() != '' && data != ''){
                    $('#show-autocomplete ul').html(data);
                    $('#show-autocomplete').show();

                    $('.loderWrapper').fadeOut();
                }else{
                    $('#show-autocomplete').hide();
                    $('.loderWrapper').fadeOut();
                }
            },
            error: function (res){

            }
        });
        
        $(document).on('click','#search-close',function(e){
            e.preventDefault();
             $('#show-autocomplete').hide();
            $('#advanceSearchProduct').val('');
        });
    });

$(document).on('click','#search-close',function(e){
    e.preventDefault();
     $('#show-autocomplete').hide();
            $('#advanceSearchProduct').val('');
});
