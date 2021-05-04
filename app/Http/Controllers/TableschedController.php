<?php

namespace App\Http\Controllers;

use App\Models\Tablesched;
use Illuminate\Http\Request;

class TableschedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->shop_id)) {
            $tablesched = Tablesched::whereNull('day')->where('shop_id', $request->shop_id)->paginate();

            $defaulttablesched = Tablesched::whereNull('date')->where('shop_id', $request->shop_id)->get();


            return response()->json(['scheds' => $tablesched, 'defaults' => $defaulttablesched]);
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
        //
        $tablesched = '';
        $msg = '';
        if (isset($request->id)) {
            $tablesched = Tablesched::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $tablesched->delete();
                    $msg = 'Tablesched has been deleted';
                    return response()->json(['success' => !!$tablesched, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->day)) {
                        $tablesched->day = $request->day;
                    }
                    if (isset($request->date)) {
                        $tablesched->date = $request->date;
                    }
                    if (isset($request->seating_time)) {
                        $tablesched->seating_time = $request->seating_time;
                    }
                    if (isset($request->opening)) {
                        $tablesched->opening = $request->opening;
                    }
                    if (isset($request->closing)) {
                        $tablesched->closing = $request->closing;
                    }
                    if (isset($request->shop_id)) {
                        $tablesched->shop_id = $request->shop_id;
                    }
                    $msg = 'Tablesched has been updated';

                    $tablesched->save();
                    return response()->json(['success' => !!$tablesched, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->day)) {
                $data['day'] = $request->day;
            }
            if (isset($request->date)) {
                $data['date'] = $request->date;
            }
            if (isset($request->seating_time)) {
                $data['seating_time'] = $request->seating_time;
            }
            if (isset($request->opening)) {
                $data['opening'] = $request->opening;
            }
            if (isset($request->closing)) {
                $data['closing'] = $request->closing;
            }
            if (isset($request->shop_id)) {
                $data['shop_id'] = $request->shop_id;
            }
            $tablesched = Tablesched::create($data);
            $msg = 'Tablesched has been added';
            return response()->json(['success' => !!$tablesched, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tablesched  $tablesched
     * @return \Illuminate\Http\Response
     */
    public function show(Tablesched $tablesched)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tablesched  $tablesched
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablesched $tablesched)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tablesched  $tablesched
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablesched $tablesched)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tablesched  $tablesched
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablesched $tablesched)
    {
        //
    }
}
