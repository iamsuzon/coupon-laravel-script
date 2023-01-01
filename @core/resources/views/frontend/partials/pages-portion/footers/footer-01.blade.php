<footer class="footer-area bg-color-01">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                {!! render_frontend_sidebar('footer_01',['column' => true]) !!}
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-area-inner">
                            <div class="content">
                                <p class="copyright">{!! purify_html_raw(get_footer_copyright_text()) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
    <script>
        $(document).ready(function (){
            $('#alert-box').hide();

            $('.email-subscribe').on('submit', function (e){
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
                    url: "{{route('frontend.subscribe.newsletter')}}",
                    data: {
                        email : email,
                        token : '{{csrf_token()}}',
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
                        $('.email-subscribe')[0].reset();
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
    </script>
@endpush
