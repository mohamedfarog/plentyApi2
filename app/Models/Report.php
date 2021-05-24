<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public static function createGraph($request, $type)
    {
        $months = 1;
        $data = [];
        switch ($type) {
            case 'earnings':
                if (isset($request->earning_months)) {
                    $months = intval($request->earning_months);
                }
                $period = now()->subMonths($months)->monthsUntil(now());
                $data = [];
                foreach ($period as $date) {
                    $earning = Order::where('order_status', 3)->whereMonth('created_at', $date->month)->whereYear('created_at', $date->year)->sum('total_amount');


                    $data[$date->shortMonthName . " " . $date->year] =
                        floatval($earning);
                }
                break;
            case 'transactions':
                if (isset($request->trans_months)) {
                    $months = intval($request->trans_months);
                }
                $period = now()->subMonths($months)->monthsUntil(now());
                $data = [];
                foreach ($period as $date) {
                    $earning = Order::whereMonth('created_at', $date->month)->whereYear('created_at', $date->year)->count();


                    $data[$date->shortMonthName . " " . $date->year] =
                        intval($earning);
                }
                // $data = ;
                break;
            case 'genders':

                $data['Male'] = User::where('typeofuser', "U")->where('gender', 'Male')->get()->count();
                $data['Female'] = User::where('typeofuser', "U")->where('gender', 'Female')->get()->count();
                $data['Did Not Set'] = User::where('typeofuser', "U")->whereNull('gender')->get()->count();

                break;
            case 'ages':
                $users = User::where('typeofuser', "U")->get();
                $data['17 & Below'] = $users->filter(function ($user) {
                    if ($user->age <= 17) {
                        return true;
                    }
                })->count();
                $data['18 - 24'] = $users->filter(function ($user) {
                    if ($user->age >= 18 && $user->age <= 24) {
                        return true;
                    }
                })->count();
                $data['25 - 35'] = $users->filter(function ($user) {
                    if ($user->age >= 25 && $user->age <= 35) {
                        return true;
                    }
                })->count();
                $data['36 - 45'] = $users->filter(function ($user) {
                    if ($user->age >= 36 && $user->age <= 45) {
                        return true;
                    }
                })->count();
                $data['46 - 55'] = $users->filter(function ($user) {
                    if ($user->age >= 46 && $user->age <= 55) {
                        return true;
                    }
                })->count();
                $data['56 - 65'] = $users->filter(function ($user) {
                    if ($user->age >= 56 && $user->age <= 65) {
                        return true;
                    }
                })->count();
                $data['66+'] = $users->filter(function ($user) {
                    if ($user->age >= 66) {
                        return true;
                    }
                })->count();
                break;


            case 'shopearnings':
                $brands = Shop::whereNotNull('cat_id')->where('active', 1)->get();

                foreach ($brands as $brand) {
                    $data[$brand->name_en] = floatval(Order::join('details', 'orders.id', '=', 'details.order_id')->where('details.shop_id', $brand->id)->where('order_status', 3)->sum('details.price'));
                    if ($brand->cat_id == 1) {
                        $data[$brand->name_en] = floatval(TableBooking::join('table_booking_details', 'table_bookings.id', '=', 'table_booking_details.tablebookingid')->where('table_booking_details.shop_id', $brand->id)->where('status', 3)->whereNull('date')->sum('table_bookings.total_amount'));
                    }
                }
                break;

            case 'shopcustomers':
                $brands = Shop::whereNotNull('cat_id')->where('active', 1)->get();

                foreach ($brands as $brand) {
                    $data[$brand->name_en] = floatval(Order::join('details', 'orders.id', '=', 'details.order_id')->where('details.shop_id', $brand->id)->where('order_status', 3)->count('details.price'));
                    if ($brand->cat_id == 1) {
                        $data[$brand->name_en] = floatval(TableBooking::join('table_booking_details', 'table_bookings.id', '=', 'table_booking_details.tablebookingid')->where('table_booking_details.shop_id', $brand->id)->where('status', 3)->whereNull('date')->count('table_bookings.total_amount'));
                    }
                }
                break;

            case 'topten':
                $data = User::where('typeofuser', "U")->orderBy('points', 'desc')->take(10)->get();

                break;
            case 'topbrand':
                $brands = Shop::whereNotNull('cat_id')->where('active', 1)->get();

                $data = $brands->sortByDesc('earnings');

                break;
            case 'topprod':

                $data = Product::with(['sizes', 'colors', 'addons', 'images', 'designer'])->orderBy('sales', 'desc')->take(10)->get();

                break;
            default:
                # code...

                break;
        }



        return $data;
    }
}
