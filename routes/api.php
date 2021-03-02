<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ProdcatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
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
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('profile', [UserController::class, 'myProfile']);
    Route::post('autologin', [UserController::class, 'autologin']);
    Route::post('invitation', [AccessController::class, 'invite']);
    Route::post('shops', [ShopController::class, 'store']);
    Route::get('invstatus', [AccessController::class, 'checkAccess']);
    Route::resource('prodcat', ProdcatController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
});


Route::post('hello', function (Request $request) {

    // $user = env('SMSUSER');
    // $password = env('SMSPASS');
    $response = Http::post("http://basic.unifonic.com/rest/SMS/messages", [
        'AppSid' => 'tLy1HllsdQT97Q5oyfk9GT3Ev1vYGt',
        'SenderID' => 'Plenty',
        'Body' => 'Hello, thank you',
        'Recipient' => '971566419450'
    ]);
    return $response;
    // if (strcmp($response, 'Send Successful')) {
    //     return true;
    // } else {
    //     return false;
    // }
});

// Route::get('hello', function (Request $request) {
//     $pass_identifier = Str::uuid();
//     $pass = new PassGenerator($pass_identifier);

//     // $storeCard = new StoreCard();
//     // $storeCard->setDescription('Plenty Loyalty Rewards Card');
//     // $storeCard->setSerialNumber('4672406960748644506');
//     // $storeCard->setOrganizationName('MVP Application and Game Design L.L.C');
//     // $storaCard->set

//     $pass_definition = [
//         "description"       => "Plenty Loyalty Rewards Card",
//         "formatVersion"     => 1,
//         "organizationName"  => "MVP Application and Game Design L.L.C",
//         "passTypeIdentifier" => "pass.com.mvp.plenty",
//         "serialNumber"      =>  "4672406960748644506",
//         "teamIdentifier"    => "24MFDW278S",
//         // "logoText" => "Loyalty Card",
//         "foregroundColor"   => "rgb(37,48,108)",
//         "backgroundColor"   => "rgb(250, 243, 241)",
//         "barcode" => [
//             "message"   => $pass_identifier,
//             "format"    => "PKBarcodeFormatQR",
//             "altText"   => $pass_identifier,
//             "messageEncoding" => "utf-8",
//         ],

//         "storeCard" => [
//             "headerFields" => [
//                 [
//                     "key" => "points",
//                     "label" => "POINTS",
//                     "value" => "100.0"
//                 ]
//             ],
          
//             "secondaryFields" => [
//                 [
//                     "key" => "cust-name",
//                     "label" => "Name",
//                     "value" => "Eric Rivera Jr",

//                 ],
//             ],
//             "backFields"=> [
//                 [
//                     "key"=>"c-name",
//                     "label"=>"Customer Name",
//                     "value"=>"Eric Rivera Jr"
//                 ],
//                 [
//                     "key"=>"c-balance",
//                     "label"=>"Loyalty Points",
//                     "value"=>"100.0"
//                 ],
//                 [
//                     "key"=>"c-joind",
//                     "label"=>"Join Date",
//                     "value"=>"2/2021"
//                 ],
                
//                 [
//                     "key"=>"c-txt",
//                     "label"=>"Description",
//                     "value"=>"Official loyalty card of Plenty of Things members.\n\nEarn points and enjoy exclusive rewards only on Plenty of Things stores."
//                 ],
                
//                 [
//                     "key"=>"c-txt2",
//                     "label"=>"For more information visit",
//                     "attributedValue"=>"<a href='http://plentyofthings.com/'>www.plentyofthings.com</a>"
//                 ],
//             ],
            


//         ]

//     ];








//     $pass->setPassDefinition($pass_definition);


//     $pass->addAsset(base_path('resources/assets/wallet/icon.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/logo.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/strip.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/icon@2x.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/logo@2x.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/strip@2x.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/icon@3x.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/logo@3x.png'));
//     $pass->addAsset(base_path('resources/assets/wallet/strip@3x.png'));
//     $pkpass = $pass->create();

//     return new Response($pkpass, 200, [
//         'Content-Transfer-Encoding' => 'binary',
//         'Content-Description' => 'File Transfer',
//         'Content-Disposition' => 'attachment; filename="pass.pkpass"',
//         'Content-length' => strlen($pkpass),
//         'Content-Type' => PassGenerator::getPassMimeType(),
//         'Pragma' => 'no-cache',
//     ]);
// });

// Route::get('hi', function (Request $request) {
//     $pkpass = PassGenerator::getPass('01c5a15d-f4a6-41cb-9fbe-3d3dd997f74f');
//     if (!$pkpass) {
//         $pkpass = $this->createWalletPass();
//     }

//     return $pkpass;
// });
