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

// Route::get('/product', function () {
//     return view('/product');
// });

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
    return view('/signup');
});
// Route::get('/booking', function () {
//     return view('/booking');
// });


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
Route::get('/delicacy/{shop?}/{category?}',  [WebsiteHomeController::class, 'delicacy']);
Route::get('/product-by-category/{id}',  [WebsiteHomeController::class, 'getProductFilter']);
Route::get('/best-seller/{id}',  [WebsiteHomeController::class, 'getBestSellers']);

Route::get('/product/{id}',  [WebsiteHomeController::class, 'product']);
Route::get('/shop-category',  [WebsiteHomeController::class, 'shopCategory']);
Route::get('/cart', function () {
    return view('/cart');
});


Route::get('/checkout', function () {
    return view('/checkout');
});



Route::get('/aboutus', function () {
    return view('/aboutus');
});



Route::get('/careers', function () {
    return view('/careers');
});
Route::post('/career-contact', [WebsiteHomeController::class, "career"]);
Route::get('/favourites', function () {
    return view('/favourite');
});

// Route::get('/search', function () {
//     return view('/search');
// });
Route::get('/search/{item?}', [WebsiteHomeController::class, "search"]);


//Profile edit
Route::group(['middleware' => [AuthWeb::class, 'auth:api']], function () {
    Route::get('/profile-edit', [WebsiteHomeController::class, 'profileEdit']);
    Route::get('/user', [WebsiteHomeController::class, "userDetails"]);
    Route::get('/profile', [WebsiteHomeController::class, 'profile']);
    Route::get('/plenty-points',  [WebsiteHomeController::class, 'getPlentyPoints']);
    Route::get('/plenty-balance',  [WebsiteHomeController::class, 'getPlentyBalance']);
    Route::post('/coupon', [WebsiteHomeController::class, "cacluateCoupon"]);
    Route::get('/userlevel', [WebsiteHomeController::class, "userLevel"]);
    Route::post('/place-order', [WebsiteHomeController::class, "placeOreder"]);
    Route::get('/trackorder', [WebsiteHomeController::class, "trackorder"]);
});
Route::get('/fashion/{shop?}/{category?}',  [WebsiteHomeController::class, 'fashion']);
Route::get('/beauty/{shop?}/{category?}',  [WebsiteHomeController::class, 'beauty']);
Route::get('/delicacy/{shop?}/{category?}',  [WebsiteHomeController::class, 'delicacy']);

Route::get('/featured',  [WebsiteHomeController::class, 'featured']);

Route::get('/brands',  [WebsiteHomeController::class, 'brands']);

Route::get('/favourite-product/{id}',  [WebsiteHomeController::class, 'getFavouiteProduct']);


Route::get('/booking/{id}',  [WebsiteHomeController::class, 'booking']);
Route::get('/timeslot/{id}',  [WebsiteHomeController::class, 'timeslot']);
