<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Shop;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->shop_id)){
            return Shop::with(['style','designers'])->find($request->shop_id);
        }
        
        
    }
    public function allBrands(Request $request)
    {
        return Shop::whereNotNull('cat_id')->where('isvendor', 1)->get();
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
        $shop = '';
        $msg = '';
        if (isset($request->id)) {
            $shop = Shop::where('id', $request->id)->first();
            $style = Style::where('shop_id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $style->delete();
                    $shop->delete();
                    
                    $msg = 'Shop has been deleted';
                    return response()->json(['success' => !!$shop, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $shop->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $shop->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $shop->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $shop->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->cat_id)) {
                        $shop->cat_id = $request->cat_id;
                    }
                    if (isset($request->active)) {
                        $shop->active = $request->active;
                    }
                    if (isset($request->status)) {
                        $shop->status = $request->status;
                    }
                    if(isset($request->primary)){
                        $style->primary = $request->primary;
                    }
                    if(isset($request->secondary)){
                        $style->secondary = $request->secondary;
                    }
                    if (isset($request->posterimg)) {
                        $style->posterimg = $helper->store($request->posterimg, 'styles');
                    }
                    if (isset($request->brandheader)) {
                        $style->brandheader = $helper->store($request->brandheader, 'styles');
                    }
                    if (isset($request->backgroundimg)) {
                        $style->backgroundimg = $helper->store($request->backgroundimg, 'styles');
                    }
                    if (isset($request->banner)) {
                        $style->banner = $helper->store($request->banner, 'styles');
                    }
                    if (isset($request->backgroundvid)) {
                        $style->backgroundvid = $helper->store($request->backgroundvid, 'styles');
                    }
                    if(isset($request->textcolor1)){
                        $style->txtcolor1 = $request->textcolor1;
                    }
                    if(isset($request->textcolor2)){
                        $style->txtcolor2 = $request->textcolor2;
                    }
                    if(isset($request->textcolor3)){
                        $style->txtcolor3= $request->textcolor3;
                    }
                    if(isset($request->textcolor4)){
                        $style->txtcolor4 = $request->textcolor4;
                    }
                    $msg = 'Shop has been updated';
                    $style->save();
                    $shop->save();  
                    return response()->json(['success' => !!$shop, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "name_en" => "required",
                "cat_id" => "required",
                "primary" => "required",
                "secondary" => "required",                
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
            if (isset($request->cat_id)) {
                $data['cat_id'] = $request->cat_id;
            }
            if (isset($request->active)) {
                $data['active'] = $request->active;
            }
            if (isset($request->status)) {
                $data['status'] = $request->status;
            }
            $shop = Shop::create($data);
            $styledata = array();
            $styledata['primary'] = $request->primary;
            $styledata['secondary'] = $request->primary;
            $styledata['shop_id'] = $shop->id;
            $style = Style::create($styledata);

            $msg = 'Shop has been added';
            return response()->json(['success' => !!$shop, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
