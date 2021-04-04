<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;

class WebsiteHomeController extends Controller
{
    private function featuredItems()
    {
        return  DB::table('products')
            ->select(DB::raw(' products.id as id,
            products.name_ar as name_ar,
            products.name_en as name_en,
            products.price as price,
            images.url as image'))
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->where('products.featured', '=', 1)
            ->get();
    }

    public function home(Request $request)
    {
        $data['featured_products'] = $this->featuredItems();
        return view('/home1')->with($data);
    }
}
