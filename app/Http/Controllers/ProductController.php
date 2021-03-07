<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Addon;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
    public function store(Request $request, UploadHelper $helper)
    {
        //
        $product = '';
        $msg = '';
        if (isset($request->id)) {
            $product = Product::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $product->delete();
                    $msg = 'Product has been deleted';
                    return response()->json(['success' => !!$product, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $product->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $product->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $product->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $product->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->price)) {
                        $product->price = $request->price;
                    }
                    if (isset($request->offerprice)) {
                        $product->offerprice = $request->offerprice;
                    }
                    if (isset($request->isoffer)) {
                        $product->isoffer = $request->isoffer;
                    }
                    if (isset($request->stocks)) {
                        $product->stocks = $request->stocks;
                    }
                    if (isset($request->shop_id)) {
                        $product->shop_id = $request->shop_id;
                    }
                    if (isset($request->designer_id)) {
                        $product->designer_id = $request->designer_id;
                    }
                    
                    $msg = 'Product has been updated';

                    $product->save();
                    return response()->json(['success' => !!$product, 'message' => $msg]);
                    break;
            }
        } else {

            $validator = Validator::make($request->all(), [
                "name_en" => "required",
                "price" => "required",
                "desc_en" =>"required",
                "prodcat_id" => "required"             
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
            if (isset($request->price)) {
                $data['price'] = $request->price;
            }
            if (isset($request->offerprice)) {
                $data['offerprice'] = $request->offerprice;
            }
            if (isset($request->isoffer)) {
                $data['isoffer'] = $request->isoffer;
            }
            if (isset($request->stocks)) {
                $data['stocks'] = $request->stocks;
            }
            if(isset($request->prodcat_id)){
                $data['prodcat_id'] = $request->prodcat_id;
            }
            if(isset($request->shop_id)){
                $data['shop_id'] = $request->shop_id;
            }
            if(isset($request->designer_id)){
                $data['designer_id'] = $request->designer_id;
            }
            $product = Product::create($data);

            if(isset($request->sizes)){
                foreach ($request->sizes as $size) {
                    $arr = array();
                    $arr['product_id'] = $product->id;
                    $arr['value'] = $size['value'];
                    $arr['others'] = $size['others'];
                    $arr['price'] = $size['price'];
                    $arr['stocks'] = $size['stocks'];

                    $sizes = Size::create($arr);
                }
            }
            if(isset($request->addons)){
                foreach ($request->addons as $addon) {
                    $arr = array();
                    $arr['product_id'] = $product->id;
                    $arr['name_en'] = $addon['name_en'];
                    if(isset($addon['name_ar'])){

                        $arr['name_ar'] = $addon['name_ar'];
                    }
                    
                    $arr['desc_en'] = $addon['desc_en'];
                    if(isset($addon['desc_ar'])){

                        $arr['desc_ar'] = $addon['desc_ar'];
                    }
                    $arr['others'] = $addon['others'];
                    $arr['price'] = $addon['price'];
                    $sizes = Addon::create($arr);
                }
            }
            if(isset($request->colors)){
                foreach ($request->colors as $color) {
                    $arr = array();
                    $arr['product_id'] = $product->id;
                    $arr['value'] = $color;
                    

                    $sizes = Color::create($arr);
                }
            }
            if(isset($request->images)){
                foreach ($request->images as $image) {
                    $arr = array();
                    $arr['product_id'] = $product->id;
                    $arr['url'] = $helper->store($image['img']);
                    

                    $sizes = Image::create($arr);
                }
            }
         
            
            $msg = 'Product has been added';
            return response()->json(['success' => !!$product, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
