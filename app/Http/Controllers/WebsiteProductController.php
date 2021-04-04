<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;

class WebsiteProductController extends Controller
{

    private function getProduct($id)
    {

        return  DB::table('products')
            ->select(DB::raw(' products.id as id,
                products.name_ar as name_ar,
                products.name_en as name_en,
                products.price as price,
                products.desc_en as desc_en,
                products.desc_ar as desc_ar,
                images.url as image'))
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->where('products.id', '=', $id)
            ->get();
    }
    private function getAddons($id)
    {

        return  DB::table('addons')
            ->select(DB::raw('*'))
            ->where('product_id', '=', $id)
            ->get();
    }

    public function product(Request $request, $id)
    {
        $data['product'] = $this->getProduct($id);
        $data['addons'] = $this->getAddons($id);
        return view('/product1')->with($data);
    }
}
