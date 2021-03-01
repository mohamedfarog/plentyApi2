<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
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
        $color = '';
        $msg = '';
        if (isset($request->id)) {
            $color = Color::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $color->delete();
                    $msg = 'Color has been deleted';
                    return response()->json(['success' => !!$color, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->product_id)) {
                        $color->product_id = $request->product_id;
                    }
                    if (isset($request->value)) {
                        $color->value = $request->value;
                    }
                    if (isset($request->others)) {
                        $color->others = $request->others;
                    }
                    $msg = 'Color has been updated';

                    $color->save();
                    return response()->json(['success' => !!$color, 'message' => $msg]);
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
            $color = Color::create($data);
            $msg = 'Color has been added';
            return response()->json(['success' => !!$color, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
