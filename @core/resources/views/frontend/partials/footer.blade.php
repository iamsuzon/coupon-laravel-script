@include('frontend.partials.pages-portion.footers.footer-'.get_footer_style())

<x-frontend.product-pop-up />
<x-frontend.loader/>

<div class="scroll-to-top">
    <i class="las la-chevron-up"></i>
</div>


<script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min-v4.6.0.js')}}"></script>
<script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/nouislider-8.5.1.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/isotope.pkgd-v3.0.6.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/price_range_script.js')}}"></script>
<script src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/main.js')}}"></script>



    @include('frontend.partials.inline-scripts')
@stack('scripts')




</body>
</html>
