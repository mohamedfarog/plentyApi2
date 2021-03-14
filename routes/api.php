<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\ProdcatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Pass;
use App\Models\Support;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Thenextweb\Definitions\StoreCard;
use Thenextweb\PassGenerator;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('otp', OtpController::class);
Route::post('verify', [OtpController::class, 'verify']);
Route::post('register', [UserController::class, 'register']);
Route::get('checkinvitation', [AccessController::class, 'checkList']);
Route::resource('categories', CatController::class);
Route::resource('prodcat', ProdcatController::class);
Route::resource('products', ProductController::class);
Route::post('checkstock', [SizeController::class, 'checkStock']);
Route::get('otpnum', [OtpController::class, 'otpNumber']);
Route::get('invnum', [AccessController::class, 'accessNumber']);
Route::get('getwa', [SupportController::class, 'sendWhatsapp']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('profile', [UserController::class, 'myProfile']);
    Route::post('autologin', [UserController::class, 'autologin']);
    Route::post('invitation', [AccessController::class, 'invite']);
    Route::post('shops', [ShopController::class, 'store']);
    Route::get('invstatus', [AccessController::class, 'checkAccess']);
    Route::resource('support', SupportController::class);
    Route::resource('orders', OrderController::class);
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
});
