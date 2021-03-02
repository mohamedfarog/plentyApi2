<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddonController extends Controller
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
        $addon = '';
        $msg = '';
        if (isset($request->id)) {
            $addon = Addon::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $addon->delete();
                    $msg = 'Addon has been deleted';
                    return response()->json(['success' => !!$addon, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $addon->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $addon->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $addon->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $addon->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->others)) {
                        $addon->others = $request->others;
                    }
                    if (isset($request->price)) {
                        $addon->price = $request->price;
                    }
                    if (isset($request->product_id)) {
                        $addon->product_id = $request->product_id;
                    }
                    $msg = 'Addon has been updated';

                    $addon->save();
                    return response()->json(['success' => !!$addon, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "name_en" => "required",
                "desc_en" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
            }
            $data = array();
            if (isset($request->name_en)) {
                $data['name_en'] = $request->name_en;
            }
            if (isset($request->name_ar)) {
                $data['name_ar'] = $request->name_ar;
            }
            if (isset($request->desc_en)) {
                $data['desc_en'] = $request->desc_en;
            }
            if (isset($request->desc_ar)) {
                $data['desc_ar'] = $request->desc_ar;
            }
            if (isset($request->others)) {
                $data['others'] = $request->others;
            }
            if (isset($request->price)) {
                $data['price'] = $request->price;
            }
            if (isset($request->product_id)) {
                $data['product_id'] = $request->product_id;
            }
            $addon = Addon::create($data);
            $msg = 'Addon has been added';
            return response()->json(['success' => !!$addon, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function show(Addon $addon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function edit(Addon $addon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addon $addon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addon $addon)
    {
        //
    }
}
