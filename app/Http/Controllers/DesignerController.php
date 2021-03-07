<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignerController extends Controller
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
        $designer = '';
        $msg = '';
        if (isset($request->id)) {
            $designer = Designer::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $designer->delete();
                    $msg = 'Designer has been deleted';
                    return response()->json(['success' => !!$designer, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $designer->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $designer->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $designer->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $designer->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->shop_id)) {
                        $designer->shop_id = $request->shop_id;
                    }
                    $msg = 'Designer has been updated';

                    $designer->save();
                    return response()->json(['success' => !!$designer, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "name_en" => "required",
            ]);

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
            if (isset($request->shop_id)) {
                $data['shop_id'] = $request->shop_id;
            }
            $designer = Designer::create($data);
            $msg = 'Designer has been added';
            return response()->json(['success' => !!$designer, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function show(Designer $designer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function edit(Designer $designer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designer $designer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designer $designer)
    {
        //
    }
}
