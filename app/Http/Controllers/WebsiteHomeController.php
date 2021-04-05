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

    // private function getProduct($id)
    // {
    //     return  DB::table('products')
    //         ->select(DB::raw(' products.id as id,
    //             products.name_ar as name_ar,
    //             products.name_en as name_en,
    //             products.price as price,
    //             products.desc_en as desc_en,
    //             products.desc_ar as desc_ar,
    //             images.url as image'))
    //         ->leftjoin('images', 'images.product_id', '=', 'products.id')
    //         ->where('products.id', '=', $id)
    //         ->get();
    // }

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
    public function getProduct($prodcat_id)
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

        // if not getting products then by sales
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
}
