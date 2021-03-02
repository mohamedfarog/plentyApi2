<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
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
        $detail = '';
        $msg = '';
        if (isset($request->id)) {
            $detail = Detail::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $detail->delete();
                    $msg = 'Detail has been deleted';
                    return response()->json(['success' => !!$detail, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->product_id)) {
                        $detail->product_id = $request->product_id;
                    }
                    if (isset($request->qty)) {
                        $detail->qty = $request->qty;
                    }
                    if (isset($request->shop_id)) {
                        $detail->shop_id = $request->shop_id;
                    }
                    if (isset($request->order_id)) {
                        $detail->order_id = $request->order_id;
                    }
                    if (isset($request->price)) {
                        $detail->price = $request->price;
                    }
                    if (isset($request->color_id)) {
                        $detail->color_id = $request->color_id;
                    }
                    if (isset($request->addons)) {
                        $detail->addons = $request->addons;
                    }
                    if (isset($request->size_id)) {
                        $detail->size_id = $request->size_id;
                    }
                    if (isset($request->booking_date)) {
                        $detail->booking_date = $request->booking_date;
                    }
                    if (isset($request->booking_time)) {
                        $detail->booking_time = $request->booking_time;
                    }
                    $msg = 'Detail has been updated';

                    $detail->save();
                    return response()->json(['success' => !!$detail, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->product_id)) {
                $data['product_id'] = $request->product_id;
            }
            if (isset($request->qty)) {
                $data['qty'] = $request->qty;
            }
            if (isset($request->shop_id)) {
                $data['shop_id'] = $request->shop_id;
            }
            if (isset($request->order_id)) {
                $data['order_id'] = $request->order_id;
            }
            if (isset($request->price)) {
                $data['price'] = $request->price;
            }
            if (isset($request->color_id)) {
                $data['color_id'] = $request->color_id;
            }
            if (isset($request->addons)) {
                $data['addons'] = $request->addons;
            }
            if (isset($request->size_id)) {
                $data['size_id'] = $request->size_id;
            }
            if (isset($request->booking_date)) {
                $data['booking_date'] = $request->booking_date;
            }
            if (isset($request->booking_time)) {
                $data['booking_time'] = $request->booking_time;
            }
            $detail = Detail::create($data);
            $msg = 'Detail has been added';
            return response()->json(['success' => !!$detail, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
