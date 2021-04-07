<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
   

use App\Http\Controllers\CookieController;
use App\Http\Middleware\AuthTest;
  
use App\Http\Controllers\WebsiteHomeController;
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

Route::get('/profile', function () {
    return view('/profile');
});

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
Route::get('/home1',  [WebsiteHomeController::class, 'home'])->middleware(AuthTest::class);
Route::get('/product1/{id}',  [WebsiteProductController::class, 'product']);
Route::get('/delicacy/{shop?}/{category?}',  [WebsiteHomeController::class, 'delicacy']);
Route::get('/product-by-category/{id}',  [WebsiteHomeController::class, 'getDineProduct']);
Route::get('/best-seller/{id}',  [WebsiteHomeController::class, 'getBestSellers']);

// For cookies controller
Route::get('/cookie/set', [CookieController::class, 'setCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/remove', [CookieController::class, 'removeCookie']);
Route::get('/product/{id}',  [WebsiteHomeController::class, 'product']);
Route::get('/cart', function () {
    return view('/cart');
});