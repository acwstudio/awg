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

Route::get('/', 'ShopController@index')->name('shop');

Route::get('/home', 'HomeController@index')->name('home');
