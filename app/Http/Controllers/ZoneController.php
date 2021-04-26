<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
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
        $zone = '';
        $msg = '';
        if (isset($request->id)) {
            $zone = Zone::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $zone->delete();
                    $msg = 'Zone has been deleted';
                    return response()->json(['success' => !!$zone, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $zone->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $zone->name_ar = $request->name_ar;
                    }
                    if (isset($request->shop_id)) {
                        $zone->shop_id = $request->shop_id;
                    }
                    $msg = 'Zone has been updated';

                    $zone->save();
                    return response()->json(['success' => !!$zone, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->name_en)) {
                $data['name_en'] = $request->name_en;
            }
            if (isset($request->name_ar)) {
                $data['name_ar'] = $request->name_ar;
            }
            if (isset($request->shop_id)) {
                $data['shop_id'] = $request->shop_id;
            }
            $zone = Zone::create($data);
            $msg = 'Zone has been added';
            return response()->json(['success' => !!$zone, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        //
    }
}
