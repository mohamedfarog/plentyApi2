<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\PushNotification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $user = User::find($order->user_id);
        if ($user->fcm != null) {

            switch ($order->order_status) {
                case 0:
                    PushNotification::sendFCM($user->fcm, 'Your order has been placed', 'Order Number: ' . $order->id);
                    break;
                case 1:
                    PushNotification::sendFCM($user->fcm, 'Order being prepared for shipment', 'Order Number: ' . $order->id);
                    break;
                case 2:
                    PushNotification::sendFCM($user->fcm, 'Order out for delivery', 'Order Number: ' . $order->id);
                    break;
                case 3:
                    PushNotification::sendFCM($user->fcm, 'Your order has been successfully delivered', 'Order Number: ' . $order->id);
                    break;
                case 4:
                    PushNotification::sendFCM($user->fcm, 'Your order has been rejected', 'Order Number: ' . $order->id);
                    break;
                default:
                    break;    
            }
        }
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        $user = User::find($order->user_id);
        if ($user->fcm != null) {

            switch ($order->order_status) {
                case 0:
                    PushNotification::sendFCM($user->fcm, 'Your order has been placed', 'Order Number: ' . $order->id);
                    break;
                case 1:
                    PushNotification::sendFCM($user->fcm, 'Order being prepared for shipment', 'Order Number: ' . $order->id);
                    break;
                case 2:
                    PushNotification::sendFCM($user->fcm, 'Order out for delivery', 'Order Number: ' . $order->id);
                    break;
                case 3:
                    PushNotification::sendFCM($user->fcm, 'Your order has been successfully delivered', 'Order Number: ' . $order->id);
                    break;
                case 4:
                    PushNotification::sendFCM($user->fcm, 'Your order has been rejected', 'Order Number: ' . $order->id);
                    break;
                default:
                    break;    
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
