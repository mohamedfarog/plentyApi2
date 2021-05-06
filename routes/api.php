<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EjackController;
use App\Http\Controllers\EventcatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FoodicsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableBookingController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\ProdcatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SchedTimeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TableCapacityController;
use App\Http\Controllers\TableschedController;
use App\Http\Controllers\TierController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\TransactionController;
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
use App\Models\Report;
use App\Models\Schedule;
use App\Models\Shop;
use App\Models\Size;
use App\Models\Style;
use App\Models\Support;
use App\Models\Tablesched;
use App\Models\Timeslot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Moathdev\Tap\Tap;
use NotificationChannels\Apn\ApnVoipMessage;
use Thenextweb\Definitions\StoreCard;
use Thenextweb\PassGenerator;

use function Clue\StreamFilter\fun;
use Pushok\AuthProvider;
use Pushok\Client;
use Pushok\Notification;
use Pushok\Payload;
use Pushok\Payload\Alert;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('analytics', function (Request $request) {
    $users = User::where('typeofuser', "U")->get()->count();
    $earnings = floatval(Order::where('order_status', 3)->sum('total_amount'));
    $sales = Order::where('order_status', 3)->get()->count();
    $brands = Shop::whereNotNull('cat_id')->where('active', 1)->get()->count();
    //graphs
    $earningsgraph = (new Report())->createGraph($request, 'earnings');
    $transactions = (new Report())->createGraph($request, 'transactions');
    $genders = (new Report())->createGraph($request, 'genders');
    $ages = (new Report())->createGraph($request, 'ages');
    $shopearnings = (new Report())->createGraph($request, 'shopearnings');
    $shopcustomers = (new Report())->createGraph($request, 'shopcustomers');
    //tables









    return response()->json(['users' => $users, 'earnings' => $earnings, 'sales' => $sales, 'brands' => $brands, 'earninggraph' => $earningsgraph, 'transgraph' => $transactions, 'gendergraph' => $genders, 'agegraph' => $ages, 'shopearninggraph' => $shopearnings, 'shopcustomersgraph' => $shopcustomers]);
});

Route::get('events', [EventController::class, 'index']);
Route::get('eventshops', [EventcatController::class, 'index']);
Route::get('eventproducts', [ProductController::class, 'getProducts']);
Route::post('stockcheck', [ProductController::class, 'stockcheck']);
Route::get('banners', [SliderController::class, 'index']);
Route::resource('success', TransactionController::class);


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
Route::resource('tabletimeslots', SchedTimeController::class);
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('sizes', SizeController::class);

    Route::resource('tablebooking', TableBookingController::class);
    Route::resource('orderdetails', DetailController::class);
    Route::post("/fcm", [UserController::class, "updateFCM"]);
    Route::resource('tablecapacity', TableCapacityController::class);
    Route::resource('sliders', SliderController::class);
    Route::post('profile', [UserController::class, 'myProfile']);
    Route::post('sendnotifications', [UserController::class, 'sendNotifications']);


    Route::post('autologin', [UserController::class, 'autologin']);
    Route::post('addpoints', function () {
        //TODO
        return response()->json(['Success' =>  true]);
    });
    Route::get('ordersandreservations', [TableBookingController::class, 'ordersandreservations']);
    Route::post('eventshopregister', [UserController::class, 'vendorsRegister']);
    Route::post('eventcatadd', [EventCatController::class, 'eventcatadd']);
    Route::post('toggleFeatured', [ProductController::class, 'toggleFeatured']);

    Route::post('invitation', [AccessController::class, 'invite']);
    Route::resource('shops', ShopController::class);
    Route::get('invstatus', [AccessController::class, 'checkAccess']);
    Route::resource('support', SupportController::class);
    Route::get('/createCharge', [OrderController::class, 'pay']);
    Route::resource('users', UserController::class);
    Route::resource('cart', CartController::class);
    Route::resource('orders', OrderController::class);
    Route::post('deleteproduct', [ProductController::class, 'deleteproduct']);
    Route::resource('products', ProductController::class);
    Route::post('autogenerateslots', [SchedTimeController::class, 'autogenerateslots']);
    Route::resource('tableschedules', TableschedController::class);
    Route::resource('tabletimes', SchedTimeController::class);
    Route::post('searchProduct', [ProductController::class, "search"]); // This is currently working for vendors in mobile app
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

    $options = [
        'key_id' => env('APN_KEY_ID'), // The Key ID obtained from Apple developer account
        'team_id' => env('APN_TEAM_ID'), // The Team ID obtained from Apple developer account
        'app_bundle_id' => env('APN_BUNDLE_ID'), // The bundle ID for app obtained from Apple developer account
        'private_key_path' =>  '../AuthKey_6B79HKA3UL.p8', // Path to private key
        'private_key_secret' => null // Private key secret
    ];
    $authProvider = AuthProvider\Token::create($options);
    $alert = Alert::create()->setTitle('Hello!');
    $alert = $alert->setBody('First push notification');

    $payload = Payload::create()->setAlert($alert);
    //set notification sound to default
    $payload->setSound('default');
    $deviceTokens = ["1381f1abe861d9e70b20afb6628261dd19983e123afcd4e351e2803ec3a6ad2e"];
    $notifications = [];
    foreach ($deviceTokens as $deviceToken) {
        $notifications[] = new Notification($payload, $deviceToken);
    }

    $client = new Client($authProvider, $production = true);
    $client->addNotifications($notifications);
    $responses = $client->push(); // returns an array of ApnsResponseInterface (one Response per Notification)  
    foreach ($responses as $response) {
        error_log($response->get410Timestamp());
        // The device token
        error_log($response->getDeviceToken());
        // A canonical UUID that is the unique ID for the notification.  E.g. 123e4567-e89b-12d3-a456-4266554400a0
        error_log($response->getApnsId());

        // Status code. E.g. 200 (Success), 410 (The device token is no longer active for the topic.)
        error_log($response->getStatusCode());
        // E.g. The device token is no longer active for the topic.
        error_log($response->getReasonPhrase());
        // E.g. Unregistered
        error_log($response->getErrorReason());
        // E.g. The device token is inactive for the specified topic.
        error_log($response->getErrorDescription());
        error_log($response->get410Timestamp());
    }


    // $ap= ApnVoipMessage::create()->pushType('background')->badge(2)
    // ->title('Account approved')
    // ->body("Your  account was approved!");
    return response()->json(['success' => $responses]);
    if (isset($request->user)) {
        $user = User::first();
        return '{"customer_name":"' . $user->name . '","customer_mobile_number":"' . substr($user->contact, 4) . '","mobile_country_code":' . intval(substr($user->contact, 1, 3)) . ',"reward_code":"' . $user->invitation_code . "-" . $user->id . '"}';
    }
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
