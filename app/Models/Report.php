<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public static function createGraph($request, $query, $type, $col)
    {
        $months = 1;
        if (isset($request->earning_months)) {
            $months = $request->earning_months;
        }

        $period = now()->subMonths($months)->monthsUntil(now());

        $data = [];
        foreach ($period as $date) {
            $earning = $query->whereMonth('created_at', $date->month)->whereYear('created_at', $date->year);
            switch ($type) {
                case 'sum':
                    $earning=   $earning->sum($col);
                    break;
                case 'count':
                    $earning=  $earning->sum($col);
                    break;
                default:
                    # code...
                    break;
            }

            $data[$date->shortMonthName . " " . $date->year] =
                $earning;
        }

        return $data;
    }
}
