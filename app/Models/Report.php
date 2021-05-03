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
        if (isset($request->earning_months)) {
            $months = intval($request->earning_months);
        }

        $period = now()->subMonths($months)->monthsUntil(now());
        $data = [];
        switch ($type) {
            case 'earnings':
                $data = [];
                foreach ($period as $date) {
                    $earning = Order::where('order_status', 3)->whereMonth('created_at', $date->month)->whereYear('created_at', $date->year)->sum('total_amount');;


                    $data[$date->shortMonthName . " " . $date->year] =
                        floatval($earning);
                }
                break;
            default:
                # code...
                break;
        }



        return $data;
    }
}
