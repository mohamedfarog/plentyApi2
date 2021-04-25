<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\EjackController;
use App\Http\Controllers\EventcatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FoodicsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\ProdcatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TierController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\UserController;
use App\Models\Addon;
use App\Models\Cat;
use App\Models\Color;
use App\Models\Designer;
use App\Models\Detail;
use App\Models\Image;
use App\Models\Order;
use App\Models\Pass;
use App\Models\Prodcat;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Shop;
use App\Models\Size;
use App\Models\Style;
use App\Models\Support;
use App\Models\Timeslot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Thenextweb\Definitions\StoreCard;
use Thenextweb\PassGenerator;

use function Clue\StreamFilter\fun;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Foodics routes
Route::get('webhooks', [FoodicsController::class, 'webhooks']); // this url is used under foodics webserver
Route::post('webhooks', [FoodicsController::class, 'webhooks']); // this url is used under foodics webserver
Route::post('loyality/reward', [FoodicsController::class, 'loyalityRewards']);
Route::post('loyality/redeem', [FoodicsController::class, 'loyalityRedeem']);
Route::get('testtran', [EjackController::class, 'create']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('events', [EventController::class, 'index']);
Route::get('eventshops', [EventcatController::class, 'index']);
Route::get('eventproducts', [ProductController::class, 'getProducts']);
Route::get('banners', [SliderController::class, 'index']);

Route::post('vendorslogin', [UserController::class, 'vendorslogin']);

Route::resource('otp', OtpController::class);
Route::post('verify', [OtpController::class, 'verify']);
Route::post('register', [UserController::class, 'register'])->middleware('registration');;
Route::get('checkinvitation', [AccessController::class, 'checkList']);
Route::resource('categories', CatController::class);
Route::resource('prodcat', ProdcatController::class);
Route::get('tiers', [TierController::class, 'index']);
Route::post('checkstock', [SizeController::class, 'checkStock']);
Route::get('otpnum', [OtpController::class, 'otpNumber']);
Route::get('invnum', [AccessController::class, 'accessNumber']);
Route::get('getwa', [SupportController::class, 'sendWhatsapp']);
Route::get('timeslots', [TimeslotController::class, 'index']);
Route::post('webLogin', [UserController::class, 'dashLogin']);
Route::get('eventcatlist', [EventcatController::class, 'eventcatlist']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('sliders', SliderController::class);
    Route::post('profile', [UserController::class, 'myProfile']);

    Route::post('autologin', [UserController::class, 'autologin']);
    Route::post('addpoints', function () {
        //TODO
        return response()->json(['Success' =>  true]);
    });
    Route::post('eventshopregister', [UserController::class, 'vendorsRegister']);
    Route::post('eventcatadd', [EventCatController::class, 'eventcatadd']);
    Route::post('toggleFeatured', [ProductController::class, 'toggleFeatured']);
    
    Route::post('invitation', [AccessController::class, 'invite']);
    Route::post('shops', [ShopController::class, 'store']);
    Route::get('invstatus', [AccessController::class, 'checkAccess']);
    Route::resource('support', SupportController::class);
    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
    Route::post('searchProduct', [ProductController::class, "search"]); // This is currently work for vendors in mobile app
    Route::post('tier', [TierController::class, 'store']);
    Route::resource('coupons', CouponController::class);
    Route::post('wallet/topup', [UserController::class, 'topUpWallet']);
});

Route::get('generate', function (Request $request) {
    $len = 24;
    if (isset($request->length)) {
        $len = $request->length;
    }

    return Str::random($len);
});

Route::prefix('v1')->group(function () {
    Route::post('/devices/{deviceLibraryIdentifier}/registrations/{passTypeIdentifier}/{serialNumber}', [PassController::class, 'registerDevice'])->middleware('passed');
    Route::get('/devices/{deviceLibraryIdentifier}/registrations/{passTypeIdentifier}', [PassController::class, 'getPasses']);
    Route::get('/passes/{passTypeIdentifier}/{serialNumber}', [PassController::class, 'getPass'])->middleware('passed');
    Route::delete('/devices/{deviceLibraryIdentifier}/registrations/{passTypeIdentifier}/{serialNumber}', [PassController::class, 'deletePass'])->middleware('passed');
    Route::post('/log', [PassController::class, 'logIt']);
});


Route::post('test', function (Request $request) {
    if (isset($request->mail)) {

        $suppordet = Support::with(['user'])->where('id', $request->id)->first();
        $mail = Mail::send('support', ["data" => $suppordet], function ($m) use ($suppordet) {
            if ($suppordet->user) {

                $m->from('noreply@plenty.mvp-apps.ae', 'Plenty Support Request');
            } else {
                $m->from('noreply@plenty.mvp-apps.ae', 'Plenty User');
            }
            $m->to('riveraeric19@gmail.com')->subject('Plenty Support Request');
        });

        return $suppordet;
    }

    if (isset($request->pass)) {
        if (isset($request->serial)) {
            $pkpass = PassGenerator::getPass($request->serial);
            return $pkpass;
        }
        if (isset($request->passid)) {
            $passes = Pass::where('serialNumber', $request->passid)->update(['passesUpdatedSince' => Carbon::now()]);
            return $passes;
        }
        if (isset($request->getpass)) {
            $pkpass = PassGenerator::getPass($request->passide);
            $pass = Pass::where('serialNumber', $request->passide)->first();
            $arr = array();
            if ($pass) {
                if ($pass->passesUpdatedSince == null) {
                    return response()->json(['message' => 'No changed passes available.'], 304);
                } else {
                    // if($pass->passesUpdatedSince == null)


                    if (Carbon::parse($pass->passesUpdatedSince)->lt(Carbon::now())) {
                        return response()->json(['message' => 'No changed passes available.'], 304);
                    } else {
                        return new Response($pkpass, 200, [
                            'Content-Transfer-Encoding' => 'binary',
                            'Content-Description' => 'File Transfer',
                            'Content-Disposition' => 'attachment; filename="pass.pkpass"',
                            'Content-length' => strlen($pkpass),
                            "Last-Modified" => Carbon::now(),
                            'Content-Type' => PassGenerator::getPassMimeType(),
                            'Pragma' => 'no-cache',
                        ]);
                    }
                }
            } else {
                return response()->json(['message' => 'No passes were found.'], 400);
            }
        }
        if (isset($request->passupdated)) {
            $passes = Pass::where('deviceLibraryIdentifier', $request->passupdated)->where('passesUpdatedSince', ">=", $request->passesUpdatedSince)->get();
            return $passes;
        }
    }
    if (isset($request->orderdetails)) {
        $orders = Order::with(['details' => function ($details) {
            return $details->with(['product', 'size', 'color']);
        }, 'user'])->where('id', $request->id)->first();
        return $orders;
    }
    if (isset($request->order)) {
        $orders = Order::where('id', $request->id)->first();
        return $orders;
    }
});
Route::get('test', function (Request $request) {
    if (isset($request->mail)) {

        $suppordet = Support::with(['user'])->where('id', $request->id)->first();
        return view('support', ["data" => $suppordet]);
    }
    if (isset($request->order)) {

        $order = Order::with(['details' => function ($details) {
            return $details->with(['product', 'size', 'color']);
        }, 'user'])->where('id', $request->id)->first();
        return view('bill', ["data" => $order]);
    }
    if (isset($request->timeslot)) {

        $timeslots = Timeslot::where('product_id', $request->product_id)->get();
        $slotsarray = array();
        foreach ($timeslots as $timeslot) {
            $bookingcount = Detail::where('product_id', $request->product_id)->where('booking_date', $request->date)->where('timeslot_id', $timeslot->id)->count();
            $timeslot->setAttribute('bookingcount', $bookingcount);
            array_push($slotsarray, $timeslot);
        }
        return $slotsarray;


        //timeslot_id
        // Date, PRODUCT ID
        // Get the day and find the count of booking for each timeslot
        //bookignd_date, booking_time, booking_
        //timeslot_id
        //
        // if(iss)




    }
    if (isset($request->generattime)) {
        return (new Schedule())->generateTimes();
    }

    return  $user = User::with(['tier'])->where('id', $request->userid)->first();
});

Route::get('models', function (Request $request) {
    return response()->json(['addon' => Addon::first(), 'category' => Cat::first(), 'color' => Color::first(), 'designer' => Designer::first(), 'image' => Image::first(), 'prodcat' => Prodcat::first(), 'product' => Product::first(), 'shop' => Shop::first(), 'size' => Size::first(), 'style' => Style::first(), 'user' => User::first()]);
});

Route::get('/updates', function () {
    $output = shell_exec('cd ../ && git pull && php artisan migrate');
    echo "<pre>$output</pre>";;
});