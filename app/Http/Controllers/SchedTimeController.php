<?php

namespace App\Http\Controllers;

use App\Models\SchedTime;
use App\Models\Shoptable;
use App\Models\TableBooking;
use App\Models\Tablesched;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchedTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (isset($request->shop_id)) {
            if (isset($request->fromtime)) {
                $tables = SchedTime::where('shop_id', $request->shop_id)->where('from', $request->fromtime)->pluck('table_id')->toArray();
                return Shoptable::find($tables);
            }

            return SchedTime::select(["from", "to"])->distinct('from')->where('shop_id', $request->shop_id)->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->id)) {
            if (isset($request->action)) {
                switch ($request->action) {
                    case 'update':
                        $timeslot = SchedTime::find($request->id);
                        if (isset($request->seatingstatus)) {
                            $timeslot->status = $request->seatingstatus;
                        }
                        $timeslot->save();
                        return response()->json(['success' => !!$timeslot, 'message' => "Status has been updated"]);
                        break;
                }
            }
        }else{
            
        }

        $schedtime = new SchedTime();
        $day = $request->day;
        if ($request->istoday == "true") {
            $istoday = true;
        } else if ($request->istoday == "false") {
            $istoday = false;
        } else {
            $istoday = $request->istoday;
        }
        //Find if the day is today
        //If it is today, then we return the timeslots existing in the database


        if ($istoday == true) {
            //TODO: Instead of assigning the first table, we need to assign one with the fewest amount of bookings


            $tables = Shoptable::with(['timeslots' => function ($timeslots) use ($request) {
                return $timeslots->where('booked', 0);
            }])->where('capacity', $request->capacity)
                ->orWhere('capacity', ($request->capacity + 1))
                ->get();

            // $tables = Shoptable::with(['timeslots' => function ($timeslots) use ($request) {
            //     return $timeslots->where('from', $request->preftime)->where('booked', 0);
            // }])->where('capacity', $request->capacity)
            //     ->orWhere('capacity', ($request->capacity + 1))
            //     ->get();

            $arr = array();

            foreach ($tables as $table) {
                if (count($table->timeslots) > 0) {
                    $table['bookingcount'] = count($table->timeslots);
                    array_push($arr, $table);
                }
            }
            $newarr = array_column($arr, 'bookingcount');

            array_multisort($newarr, SORT_ASC, $arr);
           
            return $newarr;


            if (count($arr) > 0) {
                $tablebookings = TableBooking::where('date', $request->date)->get();
                $schedtimes = SchedTime::where('booked', 0)->get();

                return $schedtimes;
            } else {
                return response()->json(['Error' => 'No tables available'], 400);
            }



            //Return timeslots from the DB with the given slot

        } else {
            // $tablescheds= Tablesched::where('shop_id',$request->shop_id)->where('day',$request->day)->first();  
            // return $schedtime->generateTimeSlots ($tablescheds->opening,$tablescheds->closing,$tablescheds->seating_time,$request->table_id);


            //Fetch tables
            $tables = Shoptable::where('capacity', $request->capacity)->orWhere('capacity', ($request->capacity + 1))->first();
            $ts =  $schedtime->generateTimeSlots('10:00:00', '12:00:00', 15, $tables->id);
            $timeslotarray = array();

            if ($tables) {
                //Generate Time Slots for that ID
                foreach ($ts as $timeslot) {
                    //   return $timeslot;
                    //Find if any prev bookings have been made
                    $booking = TableBooking::where('date', date('YYYY-MM-DD', strtotime($request->date)))->where('table_id', $timeslot['table_id'])->where('preftime', $timeslot['fromtime'])->count();
                    if ($booking > 0) {

                        $timeslot['booked'] = "1";


                        array_push($timeslotarray, $timeslot);
                    } else {
                        $timeslot['booked'] = "0";

                        array_push($timeslotarray, $timeslot);
                    }
                }
                return $timeslotarray;
            } else {
                return response()->json(['Error' => 'No tables available'], 400);
            }
        }
    }



    //API to delete the old time slots and generate a new one(along with assigning the users with a new time slot)
    public function autogenerateslots()
    {
        SchedTime::truncate();
        $schedtime = new SchedTime();
        $day = Carbon::now()->format('l');

        $tablescheds = TableSched::where('day', $day)->get();
        $arr = array();
        foreach ($tablescheds as $tablesched) {

            $tables =   Shoptable::where('shop_id', $tablesched->shop_id)->get();

            foreach ($tables as $table) {

                $tablearr = $schedtime->generateTimeSlots($tablesched->opening, $tablesched->closing, $tablesched->seating_time, $table->id);
                array_push($arr, $tablearr);
            }
        }
        SchedTime::insert($arr[0]);
    }
}
