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
                    $earning = Order::where('order_status', 3)->whereMonth('created_at', $date->month)->whereYear('created_at', $date->year)->sum('total_amount');;


                    $data[$date->shortMonthName . " " . $date->year] =
                        floatval($earning);
                }
                break;
            case 'transactions':
                if(isset($request->trans_months)){
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
                    return $users;
    
                    break;
            default:
                # code...
                break;
        }



        return $data;
    }
}
