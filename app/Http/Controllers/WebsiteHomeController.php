<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;

class WebsiteHomeController extends Controller
{
    //home

    private function featuredItems()
    {
        return  DB::table('products')
            ->select(DB::raw(' products.id as id,
            products.name_ar as name_ar,
            products.name_en as name_en,
            products.price as price,
            images.url as image'))
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->where('products.featured', '==', 1)->limit(12)
            ->get();
    }
    private function homebrands()
    {
        return  DB::table('shops')
            ->select(DB::raw('styles.brandheader,styles.primary'))
            ->join('styles', 'styles.shop_id', '=', 'shops.id') 
            ->get();
    }


    public function home(Request $request)
    {   
         
        $data['featured_products'] = $this->featuredItems();
        $data['homebrands'] = $this->homebrands();
        return view('home')->with($data);
    }

    //  product

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

    private function gettry($id)
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
            ->where('products.id', '!=', $id)
           ->inRandomOrder()->limit(8)->get();
    }


    private function getAddons($id)
    {

        return  DB::table('addons')
            ->select(DB::raw('*'))
            ->where('product_id', '=', $id)
            ->get();
    }

    private function getshopname($id)
    { 
        return  DB::table('products')
        ->select(DB::raw('shops.name_en as shopsname'))
        ->leftjoin('shops', 'shops.id', '=', 'products.id')
        ->where('products.id', '=', $id)
        ->get();
    }

    public function product(Request $request, $id)
    {
        $data['shopname'] = $this->getshopname($id);
        $data['product'] = $this->getProduct($id);
        $data['addons'] = $this->getAddons($id);
        $data['trywith'] = $this->gettry($id);

        return view('/product')->with($data);
    }

    //
}