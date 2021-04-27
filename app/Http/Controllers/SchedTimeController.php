<?php

namespace App\Http\Controllers;

use App\Models\SchedTime;
use App\Models\Tablesched;
use Illuminate\Http\Request;

class SchedTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $schedtime= new SchedTime();
        $day= $request->day;
        $istoday= $request->istoday;
        //Find if the day is today
        //If it is today, then we return the timeslots existing in the database
        

        if($istoday==true){

        }
        else{
            $tablescheds= Tablesched::where('shop_id',$request->shop_id)->where('day',$request->day)->first();  
            return $schedtime->generateTimeSlots ($tablescheds->opening,$tablescheds->closing,$tablescheds->seating_time,0);

        }
        //Generate Time Slots for that ID
        return $schedtime->generateTimeSlots ('10:00:00','12:00:00',15,1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchedTime  $schedTime
     * @return \Illuminate\Http\Response
     */
    public function show(SchedTime $schedTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchedTime  $schedTime
     * @return \Illuminate\Http\Response
     */
    public function edit(SchedTime $schedTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchedTime  $schedTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchedTime $schedTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchedTime  $schedTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchedTime $schedTime)
    {
        //
    }
}
