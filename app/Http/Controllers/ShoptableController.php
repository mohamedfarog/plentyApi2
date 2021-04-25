<?php

namespace App\Http\Controllers;

use App\Models\Shoptable;
use Illuminate\Http\Request;

class ShoptableController extends Controller
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
        $shoptable = '';
        $msg = '';
        if (isset($request->id)) {
            $shoptable = Shoptable::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $shoptable->delete();
                    $msg = 'Shoptable has been deleted';
                    return response()->json(['success' => !!$shoptable, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $shoptable->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $shoptable->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_ar)) {
                        $shoptable->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->desc_en)) {
                        $shoptable->desc_en = $request->desc_en;
                    }
                    if (isset($request->capacity)) {
                        $shoptable->capacity = $request->capacity;
                    }
                    if (isset($request->shop_id)) {
                        $shoptable->shop_id = $request->shop_id;
                    }
                    if (isset($request->zone_id)) {
                        $shoptable->zone_id = $request->zone_id;
                    }
                    $msg = 'Shoptable has been updated';

                    $shoptable->save();
                    return response()->json(['success' => !!$shoptable, 'message' => $msg]);
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
            if (isset($request->desc_ar)) {
                $data['desc_ar'] = $request->desc_ar;
            }
            if (isset($request->desc_en)) {
                $data['desc_en'] = $request->desc_en;
            }
            if (isset($request->capacity)) {
                $data['capacity'] = $request->capacity;
            }
            if (isset($request->shop_id)) {
                $data['shop_id'] = $request->shop_id;
            }
            if (isset($request->zone_id)) {
                $data['zone_id'] = $request->zone_id;
            }
            $shoptable = Shoptable::create($data);
            $msg = 'Shoptable has been added';
            return response()->json(['success' => !!$shoptable, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoptable  $shoptable
     * @return \Illuminate\Http\Response
     */
    public function show(Shoptable $shoptable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoptable  $shoptable
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoptable $shoptable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoptable  $shoptable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoptable $shoptable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoptable  $shoptable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoptable $shoptable)
    {
        //
    }
}
