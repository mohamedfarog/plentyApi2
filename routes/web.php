<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


use App\Http\Middleware\AuthWeb;


use App\Http\Controllers\WebsiteHomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|z
*/

Route::get('/',  [WebsiteHomeController::class, 'home']);
Route::get('/home',  [WebsiteHomeController::class, 'home']);

/*
Route::get('/delicacy', function () {
    return view('/delicacy');
});
*/

Route::get('/product', function () {
    return view('/product');
});

// Route::get('/profile', function () {
//     return view('/profile');
// });

Route::get('/#', function () {
    return redirect('/');
});

Route::get('/signup', function () {
    return view('/signup');
});

Route::get('/login', function () {
    return view('/login');
});
Route::get('/booking', function () {
    return view('/booking');
});


Route::get('/lang', function () {
    $locale = App::currentLocale();
    if ($locale == 'en') {
        App::setLocale('ar');
        App::setLocale('ar');
        App::setLocale('ar');
        App::setLocale('ar');
        App::setLocale('ar');
        return view('/home');
    } else if ($locale == 'ar') {
        App::setLocale('en');
        App::setLocale('en');
        App::setLocale('en');
        App::setLocale('en');
        return redirect('/');
    }
});

// Route::get('/product/{id}',  [WebsiteHomeController::class, 'product']);
Route::get('/product1/{id}',  [WebsiteProductController::class, 'product']);
Route::get('/delicacy/{shop?}/{category?}',  [WebsiteHomeController::class, 'delicacy']);
Route::get('/product-by-category/{id}',  [WebsiteHomeController::class, 'getDineProduct']);
Route::get('/best-seller/{id}',  [WebsiteHomeController::class, 'getBestSellers']);

// For cookies controller
Route::get('/cookie/set', [CookieController::class, 'setCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/remove', [CookieController::class, 'removeCookie']);
Route::get('/product/{id}',  [WebsiteHomeController::class, 'product']);
Route::get('/shop-category',  [WebsiteHomeController::class, 'shopCategory']);
Route::get('/cart', function () {
    return view('/cart');
});
Route::get('/trackorder', function () {
    return view('/trackorder');
});

Route::get('/checkout', function () {
    return view('/checkout');
});

Route::get('/userlevel', function () {
    return view('/userlevel');
});



Route::get('/aboutus', function () {
    return view('/aboutus');
});

Route::get('/careers', function () {
    return view('/careers');
});

Route::get('/favourites', function () {
    return view('/favourite');
});

//Profile edit
Route::group(['middleware' => [AuthWeb::class, 'auth:api']], function () {
    Route::get('/profile-edit', [WebsiteHomeController::class, 'profileEdit']);
    Route::get('/profile', [WebsiteHomeController::class, 'profile']);
    Route::get('/plenty-points',  [WebsiteHomeController::class, 'getPlentyPoints']);
    Route::post('/coupon', [WebsiteHomeController::class, "cacluateCoupon"]);
});
Route::get('/fashion/{shop?}/{category?}',  [WebsiteHomeController::class, 'fashion']);
Route::get('/beauty/{shop?}/{category?}',  [WebsiteHomeController::class, 'beauty']);
Route::get('/delicay/{shop?}/{category?}',  [WebsiteHomeController::class, 'delicacy']);

Route::get('/featured',  [WebsiteHomeController::class, 'featured']);

Route::get('/brands',  [WebsiteHomeController::class, 'brands']);

Route::get('/favourite-product/{id}',  [WebsiteHomeController::class, 'getFavouiteProduct']);
