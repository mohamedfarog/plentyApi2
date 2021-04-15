<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;

use App\Models\Shop;
use App\Models\Cat;
use App\Models\Coupon;
use App\Models\Prodcat;
use App\Models\Product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

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
            ->select(DB::raw('styles.brandheader,styles.primary,styles.shop_id,shops.cat_id as cat_id'))
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


    private function getProduct($id)
    {
        return  DB::table('products')
            ->select(DB::raw(' products.id as id,
                products.name_ar as name_ar,
                products.name_en as name_en,
                products.price as price,
                products.desc_en as desc_en,
                products.desc_ar as desc_ar,
                products.stocks as stock,
                images.url as image,
                shop_id as shop_id'))
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->where('products.id', '=', $id)
            ->get();
    }


    private function getProductSize($id)
    {
        return  DB::table('sizes')
            ->where('product_id', '=', $id)
            ->get();
    }

    private function getShopCategory()
    {
        return  DB::table('cats')
            ->select('id', 'name_en')
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

    //  Delicacy 
    public function delicacy(Request $request, $shop = null, $category = null)
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
    public function getDineProduct($prodcat_id)
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
    private function getShop($id)
    {
        return  DB::table('shops')
            ->where('id', '=', $id)
            ->get()->first();
    }

    public function product(Request $request, $id)
    {
        $data['product'] = $this->getProduct($id)->first();
        $data['shop'] = $this->getShop($data['product']->shop_id);
        $data['sizes'] = $this->getProductSize($id);
        $data['addons'] = $this->getAddons($id);
        $data['trywith'] = $this->gettry($id);
        return view('/product')->with($data);
    }

    public function shopCategory(Request $request)
    {
        return response()->json(['shop_category' => $this->getShopCategory()]);
    }

    //profile edit
    public function profileEdit(Request $request)
    {
        $user = Auth::user();
        $data['user'] = $user;
        return view('profile_edit')->with($data);
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $data['user'] = $user;
        return view('profile')->with($data);
    } 


    //  Beauty
    public function beauty(Request $request, $shop = null, $category = null)
    {
        // Getting category id  
        $category_id = Cat::select('id', 'name_en')->where('name_en', 'Beauty')->first();
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

        return view('/beauty')->with($data);
    }

    //  Beauty
    public function fashion(Request $request, $shop = null, $category = null)
    {
        // Getting category id  
        $category_id = Cat::select('id', 'name_en')->where('name_en', 'Fashion')->first();
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
        return view('/fashion')->with($data);
    }

    public function featured(Request $request)
    {
        $data['products'] = $this->featuredItems();
        return view('featured')->with($data);
    }

    public function brands(Request $request)
    {
        $data['brands'] = $this->homebrands();
        return view('brands')->with($data);
    }

    // getting plenty points
    public function getPlentyPoints(Request $request)
    {
        $user = Auth::user();
        return response()->json(['Response' => !!$user, 'point' =>  $user->points]);
    }

    // getting coupon code
    public function cacluateCoupon(Request $request)
    {
        $coupon = $request->couponcode;
        $coupon = Coupon::where("code", $coupon)->first();
        if (!$coupon) {
            return response()->json(["type" => "error", "message" => "coupon code not found"], 400);
        }
        $cart = $request->cart;
        if (!$cart)
            return response()->json(["type" => "error", "message" => "You cart is empty"], 400);

        //checking coupon is for shop or all
        // This is when it is for shop
        $totalAmount = 0;
        if ($coupon->shop_id) {
            $totalAmount = $this->calculateTotal($cart['cart_items'], $coupon->shop_id);

            // return response()->json(["type" => "success", "value" => $this->calculateTotal($cart['cart_items'], $coupon->shop_id)], 200);
        } else {
            $totalAmount = $this->calculateTotal($cart['cart_items'], null);
            // return response()->json(["type" => "success", "value" => $this->calculateTotal($cart['cart_items'], null)], 200);
        }
        $amountApplied = 0;
        if ($coupon->ispercentage) {
            $amountApplied = ($totalAmount * ($coupon->value)) / 100;
        } else {
            if ($amountApplied >= $totalAmount)
                $amountApplied = $totalAmount;
        }
        return response()->json(["type" => "success", "value" =>  $amountApplied], 200);
    }
    function calculateTotal($items, $shop_id = null)
    {
        $total = 0;
        foreach ($items as $item) {
            if ($shop_id) {
                if ($item['shop_id'] && $item['shop_id'] == $shop_id)

                    $total += ($item['price'] * $item['quantity']);
            } else
                $total += ($item['price'] * $item['quantity']);
        }
        return $total;
    }

    // getting plenty points
    public function getFavouiteProduct(Request $request, $id)
    {
        $data['product'] =  $this->getProduct($id);
        return response()->json(['Response' => !!count($data['product']), 'product' => $data['product']]);
    }
}
