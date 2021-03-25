<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {  
    return view('/home');
});

Route::get('/delicacy', function () {  
    return view('/delicacy');
});

Route::get('/product', function () {  
    return view('/product');
});

Route::get('/#', function () { 
    return redirect('/');
});


Route::get('/lang', function () {
    $locale = App::currentLocale();
    if ($locale == 'en'){
        App::setLocale('ar');
        App::setLocale('ar');
        App::setLocale('ar');
        App::setLocale('ar');
        App::setLocale('ar');
        return view('/home');
    }
    else if ($locale == 'ar'){
        App::setLocale('en');
        App::setLocale('en');
        App::setLocale('en');
        App::setLocale('en');
        return redirect('/');
    }

}); 