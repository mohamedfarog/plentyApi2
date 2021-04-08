<?php

namespace App\Http\Controllers;

use App\Models\Eventcat;
use Illuminate\Http\Request;

class EventcatController extends Controller
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
        $eventcat = '';
        $msg = '';
        if (isset($request->id)) {
            $eventcat = Eventcat::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $eventcat->delete();
                    $msg = 'Eventcat has been deleted';
                    return response()->json(['success' => !!$eventcat, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $eventcat->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $eventcat->name_ar = $request->name_ar;
                    }
                    if (isset($request->image)) {
                        $eventcat->image = $request->image;
                    }
                    if (isset($request->event_id)) {
                        $eventcat->event_id = $request->event_id;
                    }
                    $msg = 'Eventcat has been updated';

                    $eventcat->save();
                    return response()->json(['success' => !!$eventcat, 'message' => $msg]);
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
            if (isset($request->image)) {
                $data['image'] = $request->image;
            }
            if (isset($request->event_id)) {
                $data['event_id'] = $request->event_id;
            }
            $eventcat = Eventcat::create($data);
            $msg = 'Eventcat has been added';
            return response()->json(['success' => !!$eventcat, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventcat  $eventcat
     * @return \Illuminate\Http\Response
     */
    public function show(Eventcat $eventcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eventcat  $eventcat
     * @return \Illuminate\Http\Response
     */
    public function edit(Eventcat $eventcat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eventcat  $eventcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventcat $eventcat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eventcat  $eventcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventcat $eventcat)
    {
        //
    }
}
