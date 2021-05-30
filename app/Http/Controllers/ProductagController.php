<?php

namespace App\Http\Controllers;

use App\Models\Productag;
use Illuminate\Http\Request;

class ProductagController extends Controller
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
        $productag = '';
        $msg = '';
        if (isset($request->id)) {
            $productag = Productag::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $productag->delete();
                    $msg = 'Productag has been deleted';
                    return response()->json(['success' => !!$productag, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->product_id)) {
                        $productag->product_id = $request->product_id;
                    }
                    if (isset($request->tag_id)) {
                        $productag->tag_id = $request->tag_id;
                    }
                    if (isset($request->active)) {
                        $productag->active = $request->active;
                    }
                    if (isset($request->deleted_at)) {
                        $productag->deleted_at = $request->deleted_at;
                    }
                    $msg = 'Productag has been updated';

                    $productag->save();
                    return response()->json(['success' => !!$productag, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->product_id)) {
                $data['product_id'] = $request->product_id;
            }
            if (isset($request->tag_id)) {
                $data['tag_id'] = $request->tag_id;
            }
            if (isset($request->active)) {
                $data['active'] = $request->active;
            }
            if (isset($request->deleted_at)) {
                $data['deleted_at'] = $request->deleted_at;
            }
            
            $productag = Productag::create($data);
            $msg = 'Productag has been added';
            return response()->json(['success' => !!$productag, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productag  $productag
     * @return \Illuminate\Http\Response
     */
    public function show(Productag $productag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productag  $productag
     * @return \Illuminate\Http\Response
     */
    public function edit(Productag $productag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productag  $productag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productag $productag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productag  $productag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productag $productag)
    {
        //
    }
}
