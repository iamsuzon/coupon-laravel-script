

<?php $__env->startSection('page-title'); ?>
    <h2 class="list-item font-weight-bold"><a href="#"><?php echo e(__('All Products')); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('All Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-meta-data'); ?>
    <?php
        $page_data = \App\Page::where('slug',request()->path())->first();
    ?>

    <?php echo render_page_meta_data($page_data); ?>

    <?php echo render_site_title(__('All Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-page-title'); ?>
    <?php echo e(__('All Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="blog-grid-area-wrapper food-details" data-padding-top="0" data-padding-bottom="100">
        <form action="<?php echo e(route('frontend.products')); ?>" class="search_product_list_form" id="search_product_list_form"
              method="GET">
            <div class="container">
                <div class="row row-reverse">
                    <?php echo $__env->make('frontend.pages.all_product.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="toolbox-wrapper">
                                    <div class="toolbox-left">
                                        <form method="get" id="clear-filter-form">
                                            <?php
                                                $product_page_slug = get_page_slug(get_static_option('product_page'),'product');
                                            ?>
                                            <?php if(!empty(request()->except('_token', '_method'))): ?>
                                                <?php if(isset($filter['category'])): ?>
                                                    <div class="toolbox-item toolbox-tags">
                                                        <button data-type="category" id="category"
                                                                class="clear-button tag"><?php echo e($filter['category']->title); ?>

                                                            <span class="close-btn"><i
                                                                        class="las la-times icon"></i></span>
                                                        </button>
                                                        <input type="hidden" name="category"
                                                               value="<?php echo e($filter['category']->id); ?>">
                                                    </div>
                                                <?php endif; ?>

                                                <?php if(isset($filter['location'])): ?>
                                                    <div class="toolbox-item toolbox-tags">
                                                        <button data-type="location" id="location"
                                                                class="clear-button tag"><?php echo e($filter['location']->city_name); ?>

                                                            , <?php echo e($filter['location']->state_name); ?>

                                                            <span class="close-btn"><i
                                                                        class="las la-times icon"></i></span>
                                                        </button>
                                                        <input type="hidden" name="location"
                                                               value="<?php echo e($filter['location']->id); ?>">
                                                    </div>
                                                <?php endif; ?>

                                                <?php if(isset($filter['brand'])): ?>
                                                    <div class="toolbox-item toolbox-tags ">
                                                        <button data-type="brand" id="brand"
                                                                class="clear-button tag"><?php echo e($filter['brand']->title); ?>

                                                            <span class="close-btn"><i
                                                                        class="las la-times icon"></i></span>
                                                        </button>
                                                        <input type="hidden" name="brand"
                                                               value="<?php echo e($filter['brand']->id); ?>">
                                                    </div>
                                                <?php endif; ?>

                                                <?php if(isset($filter['rating'])): ?>
                                                    <div class="toolbox-item toolbox-tags ">
                                                        <button data-type="rating" id="rating"
                                                                class="clear-button tag"><?php echo e($filter['rating']); ?> Star
                                                            <span class="close-btn"><i
                                                                        class="las la-times icon"></i></span>
                                                        </button>
                                                        <input type="hidden" name="rating"
                                                               value="<?php echo e($filter['rating']); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                    <div class="toolbox-right">
                                        <div class="toolbox-item toolbox-sort">
                                            <select id="item-shows" class="select-box" name="sort">
                                                <option value="default" disabled selected="">Sort by</option>
                                                <option value="popularity" <?php echo e(request()->sort == 'popularity' ? 'selected' : ''); ?>><?php echo e(__('Sort by popularity')); ?></option>
                                                <option value="latest" <?php echo e(request()->sort == 'latest' ? 'selected' : ''); ?>><?php echo e(__('Sort by latest')); ?></option>
                                                <option value="price-low" <?php echo e(request()->sort == 'price-low' ? 'selected' : ''); ?>><?php echo e(__('Sort by price: low to high')); ?></option>
                                                <option value="price-high" <?php echo e(request()->sort == 'price-high' ? 'selected' : ''); ?>><?php echo e(__('Sort by price: high to low')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row two-column">
                            <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="single-featured-item style-01">
                                        <div class="img-box">
                                            <a href="<?php echo e(route_single_category(optional($product->category)->slug)); ?>"
                                               class="catg-tag top-left-02 border-radius-15"
                                               tabindex="0"><?php echo e(optional($product->category)->title); ?></a>
                                            <a href="<?php echo e(route_single_product($product->slug)); ?>" tabindex="0">
                                                <?php echo render_image_markup_by_attachment_id($product->image, 'border-radius-10', 'grid', false); ?>

                                            </a>
                                            <div class="coupon-code-01">
                                                <div class="top-text">
                                                    <p class="text-01"><?php echo e(__('UPTO')); ?></p>
                                                    <p class="price-text"><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></p>
                                                    <p class="dis-text"><?php echo e(__('Discount!')); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="top-content">
                                                <div class="left-content">
                                                    <div class="logo-box">
                                                        <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>"
                                                           tabindex="0">
                                                            <?php echo render_image_markup_by_attachment_id(optional($product->brand)->image, '', 'grid', false); ?>

                                                        </a>
                                                    </div>
                                                    <div class="details">
                                                        <a href="<?php echo e(route_single_brand(optional($product->brand)->slug)); ?>"
                                                           class="title"
                                                           tabindex="0"><?php echo e(optional($product->brand)->title); ?></a>
                                                        <p class="location"><?php echo e(optional($product->location)->city_name); ?>

                                                            , <?php echo e(optional($product->location)->state_name); ?></p>
                                                    </div>
                                                </div>
                                                <div class="right-content">
                                                    <?php if(get_product_rating_average($product->id) > 0): ?>
                                                        <div class="star">
                                                            <?php echo render_ratings(get_product_rating_average($product->id)); ?>

                                                        </div>
                                                        <div class="rating-count">(<?php echo e(count($product->reviews)); ?>)
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="middle-content">
                                                <p class="offer"><?php echo e(Str::words($product->title, 10)); ?></p>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="left-content">
                                                    <div class="pricing">
                                                        <span class="price"><?php echo e(site_currency_symbol()); ?><?php echo e($product->sale_price); ?></span>
                                                        <del><?php echo e(site_currency_symbol()); ?><?php echo e($product->regular_price); ?></del>
                                                    </div>
                                                </div>
                                                <div class="right-content">
                                                    <div class="btn-wrapper">
                                                        <a href="javascript:void(0)" class="btn-default grab-now"
                                                           tabindex="0"
                                                           data-id="<?php echo e($product->id); ?>"><?php echo e(__('Grab Now!')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="row">
                            <!-- pagination area start -->
                            <div class="col-lg-12 text-center">
                                <div class="pagination text-center" data-padding-top="50">
                                    <ul class="pagination-list">
                                        <?php echo e($data['products']->links()); ?>

                                    </ul>
                                </div>
                            </div>
                            <!-- pagination area end -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/frontend/js/nouislider-8.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/jquery.nicescroll.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            var i = document.querySelector(".ui-range-slider");
            if (void 0 !== i && null !== i) {
                var j = parseInt(i.parentNode.getAttribute("data-start-min"), 10),
                    k = parseInt(i.parentNode.getAttribute("data-start-max"), 10),
                    l = parseInt(i.parentNode.getAttribute("data-min"), 10),
                    m = parseInt(i.parentNode.getAttribute("data-max"), 10),
                    n = parseInt(i.parentNode.getAttribute("data-step"), 10),
                    o = document.querySelector(".ui-range-value-min span"),
                    p = document.querySelector(".ui-range-value-max span"),
                    q = document.querySelector(".ui-range-value-min input"),
                    r = document.querySelector(".ui-range-value-max input");

                noUiSlider.create(i, {
                    start: [j, k],
                    connect: !0,
                    step: n,
                    range: {
                        min: l,
                        max: m
                    }
                }), i.noUiSlider.on("update", function(a, b) {
                    var c = a[b];
                    b ? (p.innerHTML = Math.round(c), r.value = Math.round(c)) : (o.innerHTML = Math.round(c), q.value = Math.round(c))
                })
            }
        });
    </script>
    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                $(document).on('keyup', '#search-box', function (e) {
                    e.preventDefault();

                    let default_lang = $('#language').val();
                    let search_query = $('#search-box').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "<?php echo e(route('frontend.product.search')); ?>",
                        method: "post",
                        data: {
                            default_lang: default_lang,
                            search_query: search_query
                        },
                        beforeSend: function (res) {

                        },
                        success: function (res) {
                            $('.two-column').empty();
                            $.each(res, function (key, value) {
                                $('.two-column').append(value);
                            });

                            if ($('#search-box').val() == '') {
                                location.reload();
                            }
                        },
                        error: function (res) {
                            console.log(res);
                        }
                    });
                });

                $(document).on('click', '.clear-button', function (e) {
                    $(this).parent().remove();
                    $("#clear-filter-form").submit();
                });

                $(document).on('change', '.category', function (e) {
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(document).on('change', '.location', function (e) {
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(document).on("click",".noUi-handle-upper,.noUi-handle-lower",function(e){
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                });

                $(document).on('change', 'input[name="rating"]', function (e) {
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(document).on('change', 'input[name="brand"]', function (e) {
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(document).on('change', 'select[name="sort"]', function (e) {
                    e.preventDefault();
                    $('#search_product_list_form').trigger('submit');
                })

                $(".category-wrap").niceScroll({});
            });
        })(jQuery);

        setTimeout(function(){
            var i = document.querySelector(".ui-range-slider");
            var j = parseInt(i.parentNode.getAttribute("data-start-min"), 10),
                k = parseInt(i.parentNode.getAttribute("data-start-max"), 10),
                l = parseInt(i.parentNode.getAttribute("data-min"), 10),
                m = parseInt(i.parentNode.getAttribute("data-max"), 10),
                n = parseInt(i.parentNode.getAttribute("data-step"), 10),
                o = document.querySelector(".ui-range-value-min span"),
                p = document.querySelector(".ui-range-value-max span"),
                q = document.querySelector(".ui-range-value-min input"),
                r = document.querySelector(".ui-range-value-max input");

            q.value = <?php if(isset(request()->min_price)): ?> <?php echo e(request()->min_price); ?> <?php else: ?> l <?php endif; ?>;
            r.value = <?php if(isset(request()->max_price)): ?> <?php echo e(request()->max_price); ?> <?php else: ?> m <?php endif; ?>;
        },500);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/xgenious/Desktop/xgenious/localhost/coupon/@core/resources/views/frontend/pages/all_product/products.blade.php ENDPATH**/ ?>