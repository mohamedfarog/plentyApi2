<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;

use App\Models\Shop;
use App\Models\Cat;
use App\Models\Prodcat;
use App\Models\Product;

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


    //  Delicacy 
    public function delicacy($shop = null, $category = null, Request $request)
    {
        // Getting category id  
        $category_id = Cat::select('id', 'name_en')->where('name_en', 'Fine Dining')->first();
        $data['shops'] = Shop::where('cat_id', $category_id->id)->get();

        // getting shop details
        if (isset($shop)) {
            $data['shop'] = $data['shops']->filter(function ($value, $key) use ($shop) {
                if ($value['id'] == $shop) {
                    return true;
                }
            })->first();
        } else {
            $data['shop'] = $data['shops']->first();
        }
        $data['product_categories'] = Prodcat::where('shop_id', $data['shop']->id)->get();

        return view('/delicacy')->with($data);
    }


    //API for filtering products
    /**
     * @param  prodcat_id
     * @return products
     */
    public function getProduct($prodcat_id, Request $request)
    {
        $products = DB::table('products')
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->where('prodcat_id', $prodcat_id)->get();
        return $products;
    }


    //API for getting best seller
    /**
     * @param  shop_id
     * @return products(8)
     */

    public function getBestSellers($shop_id, Request $request)
    {
        // Checking for popular products 
        $popular_products = DB::table('products')
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->where('shop_id', $shop_id)
            ->where('popular', true)
            ->take(8)->get();

        $no_products = $popular_products->count();

        // if not getting products by sales
        if ($no_products < 8) {
            $topsale_products = DB::table('products')
                ->orderBy('sales', 'DESC')
                ->leftjoin('images', 'images.product_id', '=', 'products.id')
                ->where('shop_id', $shop_id)
                ->take(8 - $no_products)->get();
        }


        // combining products to a single collection
        $products = $popular_products->concat($topsale_products);
        return $products;
    }
}
