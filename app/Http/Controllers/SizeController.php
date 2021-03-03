<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
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
        $size = '';
        $msg = '';
        if (isset($request->id)) {
            $size = Size::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $size->delete();
                    $msg = 'Size has been deleted';
                    return response()->json(['success' => !!$size, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->product_id)) {
                        $size->product_id = $request->product_id;
                    }
                    if (isset($request->value)) {
                        $size->value = $request->value;
                    }
                    if (isset($request->others)) {
                        $size->others = $request->others;
                    }
                    $msg = 'Size has been updated';

                    $size->save();
                    return response()->json(['success' => !!$size, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "product_id" => "required",
                "value" => "required",

            ]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
            }
            $data = array();
            if (isset($request->product_id)) {
                $data['product_id'] = $request->product_id;
            }
            if (isset($request->value)) {
                $data['value'] = $request->value;
            }
            if (isset($request->others)) {
                $data['others'] = $request->others;
            }
            if (isset($request->stocks)) {
                $data['stocks'] = $request->stocks;
            }
            $size = Size::create($data);
            $msg = 'Size has been added';
            return response()->json(['success' => !!$size, 'message' => $msg]);
        }
    }

    public function checkStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "size_id" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
        }
        $size = Size::where('id', $request->size_id)->first();
        if(isset($request->qty)){
            return response()->json(['available' =>!!($request->qty <= $size->stocks), 'currentqty'=>$size->stocks]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //
    }
}
