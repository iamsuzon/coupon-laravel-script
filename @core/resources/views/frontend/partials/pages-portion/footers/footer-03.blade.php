<footer class="footer-area bg-color-02 v-03">
    <div class="footer-top">
        <div class="container custom-container-02">
            <div class="row">
                {!! render_frontend_sidebar('footer_03',['column' => true]) !!}
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
