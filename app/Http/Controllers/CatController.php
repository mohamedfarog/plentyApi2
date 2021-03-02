<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Cat;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cats = Cat::with(['shops'=>function($shop){
            $products = Product::where('shop_id')->orderBy('sales', 'desc')->get();
            return $shop->with(['style']);
        }])->get();

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
    public function store(Request $request, UploadHelper $helper)
    {
        //
        $cat = '';
        $msg = '';
        if (isset($request->id)) {
            $cat = Cat::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $cat->delete();
                    $msg = 'Cat has been deleted';
                    return response()->json(['success' => !!$cat, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $cat->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $cat->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $cat->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $cat->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->img)) {
                        $cat->img = $helper->store($request->img, 'shops');
                    }
                    $msg = 'Cat has been updated';
                    $cat->save();
                    return response()->json(['success' => !!$cat, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "name_en" => "required",
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
            if (isset($request->img)) {
                $data['img'] = $helper->store($request->img, 'shops');
            }
            $cat = Cat::create($data);
            $msg = 'Cat has been added';
            return response()->json(['success' => !!$cat, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cat $cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        //
    }
}
