<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// MyStore Route(s)
Route::namespace('MyStore')->group(function () {

    Route::prefix('mystore')->group(function () {

        Route::name('mystore.')->group(function () {

            Route::get('/products', 'ProductController@syncProductsCatalog')->name('sync.product');
            Route::get('/categories', 'CategoryController@syncProductsCategory')->name('sync.category');
            Route::get('/images', 'ImageController@syncProductsImage')->name('sync.image');
            Route::post('/webhook-handler', 'WebhookHandlerController@handle')->name('webhook.handler');
            Route::get('/webhooks', 'WebhookController@createWebhook')->name('webhook.create');

            Route::get('/init-catalog', 'InitController@initCatalog')->name('init.catalog');

//            Route::get('/init-categories', 'InitController@initCategory')->name('ini_category');
//            Route::get('/init-products', 'InitController@initProduct')->name('ini_product');
//            Route::get('/init-product-images', 'InitController@initProductImage')->name('ini_product_image');
            Route::get('/init-webhooks', 'InitController@initWebhook')->name('ini_webhook');

        });
    });
});

// Admin part
Route::namespace('Admin')->group(function () {

    Route::prefix('/admin')->group(function () {

        Route::name('admin.')->group(function () {

            /**
             * Admin Auth Route(s)
             */
            Route::namespace('Auth')->group(function () {

                //Login Routes
                Route::get('/login', 'LoginController@showLoginForm')->name('login');
                Route::post('/login', 'LoginController@login');
                Route::post('/logout', 'LoginController@logout')->name('logout');

                //Register Routes
                Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
                Route::post('/register', 'RegisterController@register');

                //Forgot Password Routes
                Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
                Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

                //Reset Password Routes
                Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
                Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

            });
        });

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/stream/{entity}', 'StreamController@getEventStream')->name('stream');
    });
});

//Customer part
Route::namespace('Customer')->group(function () {

    Route::prefix('/customer')->group(function () {

        Route::name('customer.')->group(function () {

            /**
             * Customer Auth Route(s)
             */
            Route::namespace('Auth')->group(function () {

                //Login Routes
                Route::get('/login', 'LoginController@showLoginForm')->name('login');
                Route::post('/login', 'LoginController@login');
                Route::post('/logout', 'LoginController@logout')->name('logout');

                //Register Routes
                Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
                Route::post('/register', 'RegisterController@register');

                //Forgot Password Routes
                Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
                Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

                //Reset Password Routes
                Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
                Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

                //Email Verification Route(s)
//        Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
//        Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
//        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');

            });

        });

        Route::get('/', 'AccountController@index')->name('customer');

    });
});

// Shop part
Route::namespace('Shop')->group(function () {

    Route::prefix('/shop')->group(function () {

        Route::name('shop.')->group(function () {

            Route::get('/product/{id}', 'HomeController@show')->name('product');
            Route::get('/catalog/{category_id?}', 'CatalogController@index')->name('catalog');

        });

    });

});

Route::get('/', 'Shop\HomeController@index')->name('shop.home');
