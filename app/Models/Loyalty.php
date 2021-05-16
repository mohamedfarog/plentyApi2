<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Pushok\AuthProvider;
use Pushok\Client;
use Pushok\Notification;
use Pushok\Payload;
use Pushok\Payload\Alert;
class Loyalty extends Model
{
    use HasFactory;

    public static function notifyApple($serialNumber)
    {

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
        // $deviceTokens = Pass::where('serialNumber', $serialNumber)->pluck('pushToken')->toArray();
        $deviceTokens = ["1381f1abe861d9e70b20afb6628261dd19983e123afcd4e351e2803ec3a6ad2e"];
        // return $deviceTokens;
        $notifications = [];
        foreach ($deviceTokens as $deviceToken) {
            $notifications[] = new Notification($payload, $deviceToken);
        }

        $client = new Client($authProvider, $production = true);
        $client->addNotifications($notifications);
        $responses = $client->push(); // returns an array of ApnsResponseInterface (one Response per Notification)  
        foreach ($responses as $response) {
            Log::info("started");
            Log::info($response->get410Timestamp());
            // The device token
            Log::info($response->getDeviceToken());
            // A canonical UUID that is the unique ID for the notification.  E.g. 123e4567-e89b-12d3-a456-4266554400a0
            Log::info($response->getApnsId());

            // Status code. E.g. 200 (Success), 410 (The device token is no longer active for the topic.)
            Log::info($response->getStatusCode());
            // E.g. The device token is no longer active for the topic.
            Log::info($response->getReasonPhrase());
            // E.g. Unregistered
            Log::info($response->getErrorReason());
            // E.g. The device token is inactive for the specified topic.
            Log::info($response->getErrorDescription());
            Log::info($response->get410Timestamp());
            Log::info("ended");
        }


        // $ap= ApnVoipMessage::create()->pushType('background')->badge(2)
        // ->title('Account approved')
        // ->body("Your  account was approved!");
        return  $responses;
    }

    public static function addPoints($user, $amount_due, $wallet, $shoplist = null)
    {
        //Check the user's tier list and calculate points accordingly

        // ShopList- List of Shop Ids to keep a log
        $tier = Tier::find($user->tier_id);
        $acquisition = $tier->acquisition;
        $amount = $amount_due + $wallet;          //Including wallet amount for points calculation
        $pointsearned = $acquisition * $amount;
        return $pointsearned;







        //update user points
        // $user = User::with(['tier'])->where('id', $data['user_id'])->first();


        //add translog

        // Translog::create($data);

        //add user_points

        //update loyalty card
    }

    //Function  to update the user's tier based on the points
    public  static function calculateTier($user, $amount_due, $wallet)
    {
        $purchases = $user->totalpurchases;
        $purchases = $user->totalpurchases + $amount_due;

        if ($user->tier_id != null) {
            if ($user->tier_id > 0) {
                $tierid = $user->tier_id;
                $tiers = Tier::get();
                foreach ($tiers as $tier) {
                    if ($purchases >= $tier->requirement) {
                        $tierid = $tier->id;
                    }
                }

                User::find($user->id)->update(['tier_id' => $tierid, 'totalpurchases' => $purchases]);
            } else {

                User::find($user->id)->update(['tier_id' => 1, 'totalpurchases' => $purchases]);
            }
        } else {
            User::find($user->id)->update(['tier_id' => 1, 'totalpurchases' => $purchases]);
        }
    }

    public static function redeemPoints($user, $points)
    {
        // $user - User
        // $points
        // redeem Login
        $user->points -= $points;
        $user->save();
    }

    public static function convertToPoints($tier = 1, $amount)
    {
        //Converting amount to points
        $tierData = Tier::find($tier);
        if ($tierData) {
            return $amount * 100 / ($tierData->value);
        }
        return 0.0;
    }
    public static function convertPurchaseAmountToPoints($tier = 1, $amount)
    {
        //Converting amount to points
        $tierData = Tier::find($tier);
        if ($tierData) {
            return $amount * ($tierData->value);
        }
        return $amount;
    }

    public static function convertToCurrency($tier = 1, $points)
    {
        //Converting points to amount
        $tierData = Tier::find($tier);
        if ($tierData) {
            $tierValueInPerc = ($tierData->value) / 100;
            return $points * $tierValueInPerc;
        }
        return 0.0;
    }
}
