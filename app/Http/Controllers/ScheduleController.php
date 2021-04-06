<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
        //
        $schedule = '';
        $msg = '';
        if (isset($request->id)) {
            $schedule = Schedule::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $schedule->delete();
                    $msg = 'Schedule has been deleted';
                    return response()->json(['success' => !!$schedule, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->day)) {
                        $schedule->day = $request->day;
                    }
                    if (isset($request->opening)) {
                        $schedule->opening = $request->opening;
                    }
                    if (isset($request->closing)) {
                        $schedule->closing = $request->closing;
                    }
                    if (isset($request->interval)) {
                        $schedule->interval = $request->interval;
                    }
                    $msg = 'Schedule has been updated';

                    $schedule->save();
                    return response()->json(['success' => !!$schedule, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->day)) {
                $data['day'] = $request->day;
            }
            if (isset($request->opening)) {
                $data['opening'] = $request->opening;
            }
            if (isset($request->closing)) {
                $data['closing'] = $request->closing;
            }
            if (isset($request->interval)) {
                $data['interval'] = $request->interval;
            }
            $schedule = Schedule::create($data);
            $msg = 'Schedule has been added';
            return response()->json(['success' => !!$schedule, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
