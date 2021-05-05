<?php

namespace App;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class PushNotification
{
    /// How To use
    /// Import use App\PushNotification; in the top
    /// Create an instance of PushNotification Class
    /// for example
    /// PushNotification::sendSms('971564475626','This is from MVP','High');
    /// NB: Set the credentials in .env
    public static function sendFCM($fcm, $title, $subtitle)
    {

        if (!isset($fcm)) {
            return null;
        }
        $messaging = (new Factory())->createMessaging();

        $message = CloudMessage::FromArray(['token' => $fcm, 'notification' => ["title" => $title, "body" => $subtitle]]);

        return $messaging->send($message);
    }

    public static function sendAllFCM($title, $subtitle)
    {
            $messaging = (new Factory())->createMessaging();
    
            $message = CloudMessage::fromArray(["topic" => "PROMOTIONS", 'notification' => ["title" => $title, "body" => $subtitle]]);
    
            return $messaging->send($message);
        }
}

