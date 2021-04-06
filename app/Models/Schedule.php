<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'day', 'opening', 'closing', 'interval',
    ];

    public static function generateTimes()
    {
        $day = Carbon::now()->format('l');
        $sched = Schedule::where('day', $day)->first();
        if ($sched) {
            $from = explode(":", $sched->opening);
            $to = explode(":", $sched->closing);
            $fromhour = $from[0];
            $duration = $sched->interval;
            $fromminute = $from[1];
            $tohour = $to[0];
            $tominute = $to[1];
            $arr = array();
            if ($fromhour > $tohour) {
              
                while ($fromhour > $tohour || $fromhour < $tohour || (($fromhour == $tohour) && ($fromminute <= $tominute))) {
                    
                    $p = ($fromhour <10 && $fromhour >0 ? "0".$fromhour : $fromhour) . ':' . $fromminute;
                    $fromminute += $duration;
                    while ($fromminute >= 60) {
                        $fromminute = ($fromminute - 60) == 0 ? '00' : ($fromminute - 60 < 10 ? "0" . ($fromminute - 60) : $fromminute - 60);
                        $fromhour++;
                    }
                    if ($fromhour >= 24) {
                        $fromhour = "00";
                    }
                    $newarr = array();
                    $newarr['timeslot'] = $p;
                    $newarr['sched'] = $day;
                    $newarr['avaialble']
                    array_push($arr, $p);
                }
            } else {
                while ($fromhour < $tohour || ($fromhour == $tohour && $fromminute <= $tominute)) {
                    $p = ($fromhour <10 && $fromhour >0 ? "0".$fromhour : $fromhour) . ':' . $fromminute;
                    $fromminute += $duration;
                    if ($fromminute >= 60) {
                        $fromminute = ($fromminute - 60) == 0 ? '00' : ($fromminute - 60 < 10 ? "0" . ($fromminute - 60) : $fromminute - 60);
                        $fromhour++;
                    }
                    if ($fromhour >= 24) {
                        $fromhour = "00";
                    }
                    array_push($arr, $p);
                }
            }


            return $arr;
        }
    }
}
