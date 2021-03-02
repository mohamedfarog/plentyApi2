<?php

namespace App\Http\Controllers;

use App\Models\Prodcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cats = Prodcat::with(['products'=>function($prod){
            return $prod->with(['sizes', 'colors', 'addons', 'images']);
        }])->where('shop_id', $request->shop_id)->get();
        return $cats;
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
        $prodcat = '';
        $msg = '';
        if (isset($request->id)) {
            $prodcat = Prodcat::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $prodcat->delete();
                    $msg = 'Prodcat has been deleted';
                    return response()->json(['success' => !!$prodcat, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $prodcat->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $prodcat->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $prodcat->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $prodcat->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->shop_id)) {
                        $prodcat->shop_id = $request->shop_id;
                    }
                    $msg = 'Prodcat has been updated';

                    $prodcat->save();
                    return response()->json(['success' => !!$prodcat, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "name_en" => "required",
                "shop_id" => "required",         
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
            if (isset($request->shop_id)) {
                $data['shop_id'] = $request->shop_id;
            }
            $prodcat = Prodcat::create($data);
            $msg = 'Prodcat has been added';
            return response()->json(['success' => !!$prodcat, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodcat  $prodcat
     * @return \Illuminate\Http\Response
     */
    public function show(Prodcat $prodcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodcat  $prodcat
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodcat $prodcat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodcat  $prodcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodcat $prodcat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodcat  $prodcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodcat $prodcat)
    {
        //
    }
}
