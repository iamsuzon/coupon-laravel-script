<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::feeds();

/*----------------------------------------------------------------------------------------------------------------------------
| FRONTEND
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware' => ['setlang', 'globalVariable', 'maintains_mode', 'banned']], function () {
    /*----------------------------------------------------------------------------------------------------------------------------
    | FRONTEND ROUTES
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/', 'FrontendController@index')->name('homepage');
    Route::get('/dark-mode-toggle', 'FrontendController@dark_mode_toggle')->name('frontend.dark.mode.toggle');
    Route::post('poll/vote/store', 'FrontendController@poll_vote_store')->name('frontend.poll.vote.store');
    Route::get('home/advertisement/click/store', 'FrontendController@home_advertisement_click_store')->name('frontend.home.advertisement.click.store');
    Route::get('home/advertisement/impression/store', 'FrontendController@home_advertisement_impression_store')->name('frontend.home.advertisement.impression.store');

//Newsletter
    Route::get('/subscriber/email-verify/{token}', 'FrontendController@subscriber_verify')->name('subscriber.verify');
    Route::post('/subscribe-newsletter', 'FrontendController@subscribe_newsletter')->name('frontend.subscribe.newsletter');

// Home Search
    Route::get('product/autocomplete-search', 'FrontendController@autocompleteSearch')->name('frontend.product.autocomplete.search');
    Route::get('product/autocomplete-advance-search', 'FrontendController@autocompleteSearchByLocation')->name('frontend.product.advance.autocomplete.search');

    Route::get('product/search/single', 'FrontendController@search_single')->name('frontend.product.search.single');

    /*------------------------------
        SOCIAL LOGIN CALLBACK
    ------------------------------*/
    Route::group(['prefix' => 'facebook', 'namespace' => 'Frontend'], function () {
        Route::get('callback', 'SocialLoginController@facebook_callback')->name('facebook.callback');
        Route::get('redirect', 'SocialLoginController@facebook_redirect')->name('login.facebook.redirect');
    });
    Route::group(['prefix' => 'google', 'namespace' => 'Frontend'], function () {
        Route::get('callback', 'SocialLoginController@google_callback')->name('google.callback');
        Route::get('redirect', 'SocialLoginController@google_redirect')->name('login.google.redirect');
    });

    /*----------------------------------------
      FRONTEND: CUSTOM FORM BUILDER ROUTES
    -----------------------------------------*/
    Route::post('submit-custom-form', 'FrontendFormController@custom_form_builder_message')->name('frontend.form.builder.custom.submit');
    /*----------------------------------------------------------------------------------------------------------------------------
    | USER DASHBOARD
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::prefix('user-home')->middleware(['userEmailVerify', 'setlang', 'globalVariable', 'banned'])->group(function () {

        Route::get('/', 'UserDashboardController@user_index')->name('user.home')->middleware('user_post');
        Route::get('/change-password', 'UserDashboardController@change_password')->name('user.home.change.password');
        Route::get('/edit-profile', 'UserDashboardController@edit_profile')->name('user.home.edit.profile');
        Route::post('/profile-update', 'UserDashboardController@user_profile_update')->name('user.profile.update');
        Route::post('/password-change', 'UserDashboardController@user_password_change')->name('user.password.change');

        //product wishlist
        Route::get('/wishlist', 'UserDashboardController@user_wishlist')->name('user.home.wishlist');
        Route::get('/wishlist/{slug}', 'UserDashboardController@store_user_wishlist')->name('user.wishlist.store');

        // media upload routes for User
        Route::group(['namespace' => 'User'], function () {
            Route::post('/media-upload/all', 'MediaUploadController@all_upload_media_file')->name('web.upload.media.file.all');
            Route::post('/media-upload', 'MediaUploadController@upload_media_file')->name('web.upload.media.file');
            Route::post('/media-upload/alt', 'MediaUploadController@alt_change_upload_media_file')->name('web.upload.media.file.alt.change');
            Route::post('/media-upload/delete', 'MediaUploadController@delete_upload_media_file')->name('web.upload.media.file.delete');
            Route::post('/media-upload/loadmore', 'MediaUploadController@get_image_for_loadmore')->name('web.upload.media.file.loadmore');
        });


        //User Product Post
        Route::group(['namespace' => 'User', 'prefix' => 'user-posts', 'middleware' => 'user_post'], function () {
            Route::get('/', 'UserProductController@user_index')->name('user.product');
            Route::get('/new', 'UserProductController@user_new_product')->name('user.product.new');
            Route::post('/new', 'UserProductController@user_store_new_product');
            Route::get('/edit/{id}', 'UserProductController@user_edit_product')->name('user.product.edit');
            Route::post('/update/{id}', 'UserProductController@user_update_product')->name('user.product.update');
            Route::post('/clone', 'UserProductController@user_clone_product')->name('user.product.clone');
            Route::post('/delete/all/lang/{id}', 'UserProductController@user_delete_product_all_lang')->name('user.product.delete.all.lang');
//        Trashed & Restore
            Route::get('/trashed', 'UserProductController@trashed_blogs')->name('user.product.trashed');
            Route::get('/trashed/restore/{id}', 'UserProductController@user_restore_trashed_product')->name('user.product.trashed.restore');
            Route::post('/trashed/delete/{id}', 'UserProductController@user_delete_trashed_product')->name('user.product.trashed.delete');

            Route::get('/get/tags', 'UserProductController@get_tags_by_ajax')->name('user.get.product.tags.by.ajax');
        });

    });

    //Products
    Route::group(['prefix' => 'product', 'namespace' => 'Frontend', 'middleware' => ['setlang', 'globalVariable', 'maintains_mode', 'banned']], function () {
        Route::get('/{slug}', 'ProductController@product_single')->name('frontend.product.single');
        Route::get('/category/{slug}', 'ProductController@category_single')->name('frontend.product.category.single');
        Route::get('/brand/{slug}', 'ProductController@brand_single')->name('frontend.product.brand.single');
        Route::get('/location/{slug}', 'ProductController@location_single')->name('frontend.product.location.single');
        Route::get('/tags/{any}', 'ProductController@tag_single')->name('frontend.product.tag.single');

        Route::post('/product/review/store', 'ProductReviewController@product_review_store')->name('frontend.product.review.store');
        Route::post('/product/review/reply', 'ProductReviewController@product_review_reply_ajax')->name('frontend.product.review.reply.ajax');
    });
    Route::get('/get/products/by/ajax/{type}', 'FrontendController@get_recent_product_by_ajax')->name('frontend.get.products.by.ajax');

    Route::get('products', 'Frontend\AllProductController@index')->name('frontend.products');
    Route::post('products', 'Frontend\AllProductController@search')->name('frontend.product.search');

    Route::get('products/popup', 'Frontend\AllProductController@product_popup_by_ajax')->name('frontend.product.popup.ajax');

    Route::post('product/coupon/used', 'Frontend\ProductController@product_coupon_used_by_ajax')->name('frontend.product.coupon_used.ajax');

    /*----------------------------------------------------------------------------------------------------------------------------
    | USER LOGIN - REGISTRATION
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/ajax-login', 'FrontendController@ajax_login')->name('user.ajax.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/login/forget-password', 'FrontendController@showUserForgetPasswordForm')->name('user.forget.password');
    Route::get('/login/reset-password/{user}/{token}', 'FrontendController@showUserResetPasswordForm')->name('user.reset.password');
    Route::post('/login/reset-password', 'FrontendController@UserResetPassword')->name('user.reset.password.change');
    Route::post('/login/forget-password', 'FrontendController@sendUserForgetPasswordMail');
    Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');
    Route::get('/user-logout', 'FrontendController@user_logout')->name('frontend.user.logout');
    //user register
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
    //user email verify
    Route::get('/user/email-verify', 'UserDashboardController@user_email_verify_index')->name('user.email.verify');
    Route::get('/user/resend-verify-code', 'UserDashboardController@reset_user_email_verify_code')->name('user.resend.verify.mail');
    Route::post('/user/email-verify', 'UserDashboardController@user_email_verify');
    Route::post('/package-user/generate-invoice', 'FrontendController@generate_package_invoice')->name('frontend.package.invoice.generate');
});


/*----------------------------------------------------------------------------------------------------------------------------
| LANGUAGE CHANGE
|----------------------------------------------------------------------------------------------------------------------------*/
Route::get('/lang', 'FrontendController@lang_change')->name('frontend.langchange');
Route::get('/subscriber/email-verify/{token}', 'FrontendController@subscriber_verify')->name('subscriber.verify');

/*----------------------------------------------------------------------------------------------------------------------------
| ADMIN LOGIN
|----------------------------------------------------------------------------------------------------------------------------*/
Route::middleware(['setlang'])->group(function () {
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::get('/login/admin/forget-password', 'FrontendController@showAdminForgetPasswordForm')->name('admin.forget.password');
    Route::get('/login/admin/reset-password/{user}/{token}', 'FrontendController@showAdminResetPasswordForm')->name('admin.reset.password');
    Route::post('/login/admin/reset-password', 'FrontendController@AdminResetPassword')->name('admin.reset.password.change');
    Route::post('/login/admin/forget-password', 'FrontendController@sendAdminForgetPasswordMail');
    Route::get('/logout/admin', 'AdminDashboardController@adminLogout')->name('admin.logout');
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
});


Route::group(['middleware' => ['setlang', 'globalVariable', 'maintains_mode', 'banned']], function () {
    Route::get('/{slug}', 'FrontendController@dynamic_single_page')->name('frontend.dynamic.page');
});

