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
        $date = Carbon::today()->format('Y-m-d');
        $sched = Schedule::where('day', $day)->first();
        if ($sched) {
            if($sched->opening != null && $sched->closing != null){
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
    
                        // $p = ($fromhour < 10 && $fromhour > 0 ? "0" . $fromhour : $fromhour) . ':' . $fromminute;
                        $p =  $fromhour . ':' . $fromminute;
                        if($fromhour<12){
                            $sched= 'M';
                         }
                         else if($fromhour<=17 && $fromhour>=12){
                            $sched= 'A';
                         }
                         else{
                             $sched='E';
                         }

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
                        $newarr['sched'] = $sched;

                        array_push($arr, $newarr);
                    }
                } else {
                    while ($fromhour < $tohour || ($fromhour == $tohour && $fromminute <= $tominute)) {
                        // $p = ($fromhour < 10 && $fromhour > 0 ? "0" . $fromhour : $fromhour) . ':' . $fromminute;
                        $p =  $fromhour . ':' . $fromminute;
                        if($fromhour<12){
                            $sched= 'M';
                         }
                         else if($fromhour<=17 && $fromhour>=12){
                            $sched= 'A';
                         }
                         else{
                             $sched='E';
                         }
                        $fromminute += $duration;
                        if ($fromminute >= 60) {
                            $fromminute = ($fromminute - 60) == 0 ? '00' : ($fromminute - 60 < 10 ? "0" . ($fromminute - 60) : $fromminute - 60);
                            $fromhour++;
                        }
                        if ($fromhour >= 24) {
                            $fromhour = "00";
                        }
                       

                        $newarr = array();
                        $newarr['timeslot'] = $p;
                        $newarr['sched'] = $sched;
                        array_push($arr, $newarr);
                    }
                }
    
                if(count($arr) > 0){
                    $success = 0;
                    $services = Product::where('isservice', 1)->get();
                    if($services){
                        foreach ($services as $service) {

                            foreach ($arr as $timeslot) {
                                $timeslot['product_id'] = $service->id;
                                $time = Timeslot::create($timeslot);
                                if (!!$time) {
                                    $success++;
                                }
                            }
                        }
                        
            
                        return $success . "/" . (count($services)*count($arr)) . " timeslots added successfully!";
                    }else{
                        return "No timeslots for today!";
                    }
                    
                }
            }
           
            return "No timeslots for today!";
        }
    }
}
