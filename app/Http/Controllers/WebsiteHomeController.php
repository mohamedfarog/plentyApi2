<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;

use App\Models\Shop;
use App\Models\Cat;
use App\Models\Coupon;
use App\Models\Prodcat;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Project;
use App\Http\Controllers\OrderController;

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
                products.id as prodid,
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
    public function getProductFilter($prodcat_id)
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

    function loyalityPointSAR($user)
    {
        switch (true) {
            case $user['totalpurchases'] > 29999:
                $sar = $user['totalpurchases'];
                break;
            case $user['totalpurchases'] > 19999:
                $sar = $user['totalpurchases'];
                break;
            case $user['totalpurchases'] > 0:
                $sar = $user['totalpurchases'];
                break;
            default:
                $sar = $user['totalpurchases'];
                break;
        }
        return 1;
    }

    // getting coupon code
    public function cacluateCoupon(Request $request)
    {
        $coupon = $request->couponcode;
        $coupon = Coupon::where("code", $coupon)->first();
        $date = Carbon::now();
        if ($coupon->expiry >= $date) {
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
                $amountApplied = $coupon->value;
            }
            if ($amountApplied >= $totalAmount) {
                $amountApplied = $totalAmount;
            }
            return response()->json(["type" => "success", "value" =>  $amountApplied], 200);
        } else {
            return response()->json(["type" => "error", "message" => "coupon expired!"], 400);
        }
    }
    function calculateTotal($items, $shop_id = null)
    {
        $total = 0;
        foreach ($items as $item) {
            if ($shop_id) {
                if ($item['shop_id'] && $item['shop_id'] == $shop_id) {
                    $total += ($item['price'] * $item['quantity']);
                }
            } else {
                $total += ($item['price'] * $item['quantity']);
            }
        }
        return $total;
    }

    // getting plenty points
    public function getFavouiteProduct(Request $request, $id)
    {
        $data['product'] =  $this->getProduct($id)->first();
        return response()->json(['Response' => !!$data['product'], 'product' => $data['product']]);
    }

    // User Level
    public function userLevel(Request $request)
    {
        $user = Auth::user();
        if (isset($user)) {
            $data['totalpurchases'] = $user->totalpurchases;

            $data['percentage'] =  $data['totalpurchases'] * 100 / 40000;
            switch (true) {
                case $data['totalpurchases'] > 29999:
                    $data['userlevel'] = 'Topaz';
                    break;
                case $data['totalpurchases'] > 19999:
                    $data['userlevel'] = 'Emerald';
                    break;
                case $data['totalpurchases'] > 0:
                    $data['userlevel'] = 'Sapphire';
                    break;
                default:
                    $data['userlevel'] = 'NA';
                    break;
            }
            return view('userlevel')->with($data);
        } else {
            return Redirect::to('/signup');
        }
    }






    function userDetails(Request $request)
    {
        $user = Auth::user();
        $data['id'] = $user['id'];
        $data['name'] =  $user['name'];
        $data['typeofuser'] = $user['typeofuser'];
        return response()->json(['Response' => !!$user, 'user' => $data]);
    }

    private function getStyle($id)
    {
        return  DB::table('styles')
            ->where('shop_id', '=', $id)
            ->get()->first();
    }

    public function booking(Request $request, $id)
    {
        $data['product'] = $this->getProduct($id)->first();
        $data['style'] = $this->getStyle($data['product']->shop_id);
        $data['shop'] = $this->getShop($data['product']->shop_id);
        return view('/booking')->with($data);
    }

    private function getTimeSlot($id)
    {
        return  DB::table('timeslots')
            ->where('id', '=', $id)
            ->get()->first();
    }

    public function timeslot(Request $request, $id)
    {
        $data = $this->getTimeSlot($id);
        return response()->json(['Response' => !!$data, 'timeslot' => $data]);
    }
    //trackorder
    function trackorder(Request $request)
    {
        $user = Auth::user();
        $data['id'] = $user['id'];
        $data['name'] =  $user['name'];
        $data['typeofuser'] = $user['typeofuser'];
        $userid = $user['id'];


        // $data['orders'] = Order::with('details')
        // ->where('user_id',$userid)->get(); 
        $data['orders'] = Order::with(['details' => function ($details) {
            return $details->with(['product' => function ($product) {
                return $product->with(['images']);
            }, 'size', 'color']);
        }, 'user'])->where('user_id', $userid)->get();
        $data['ordermodal'] = Order::with(['details' => function ($details) {
            return $details->with(['product' => function ($product) {
                return $product->with(['images']);
            }, 'size', 'color']);
        }, 'user'])->where('user_id', $userid)->get();
        // Booking::with('services')->get();
        return view('trackorder')->with($data);
    }


    //career
    private function uploadCV($file)
    {
        $allowedfileExtensions = array('doc', 'docx', 'pdf');
        $fileExtension = $file->extension();
        $fileName = md5(time() . $file->getClientOriginalName()) . '.' . $fileExtension;
        if (in_array($fileExtension, $allowedfileExtensions)) {
            try {
                $file->move(public_path('cv'), $fileName);
            } catch (\Exception $e) {
                $err['status'] = false;
                $err['error'] = 'There was some error moving the file to upload directory. ' . $e;
                return $err;
            }
            $msg['status'] = true;
            $msg['url'] = url('/cv') . '/' . $fileName;
            return $msg;
        } else {
            $err['status'] = false;
            $err['error'] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            return $err;
        }
    }

    private function sendEmail($userName, $senderEmail, $senderNum, $message, $cmessage)
    {
        //Headers
        $to = ""; // Your email address goes here
        $subject = 'Plenty Website - Careers Form';
        $headers = "From: Career Form <noreply@plentyofthings.com>";
        $headers .= "\nMIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        if (isset($userName) && isset($senderEmail) && isset($senderNum) && isset($cmessage)) {
            //body message
            $message = "Name: " . $userName . "<br>
            Email: " . $senderEmail . "<br>
            Phone Number: " . $senderNum . "<br>
            Message: " . $message . "" . "<br><br>CV: " . $cmessage . "<br>";

            //Email Send Function
            try {
                mail($to, $subject, $message, $headers);
            } catch (\Exception $e) {
                $err['status'] = false;
                $err['error'] = 'Email is not sent !';
                return $err;
            }
        }
        $msg['status'] = true;
        $msg['message'] = 'Email send successfully.';
        return $msg;
    }

    public function career(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^\+?\d+$/',
            'uploadedFile' => 'required|max:10000|mimes:doc,docx,pdf'
        ]);

        if ($validator->fails()) {
            $err['status'] = false;
            $err['error'] = $validator->errors();
            return response()->json(['Response' => $err], 400);
        }

        $data = $request->all();
        $file = $request->file('uploadedFile');
        $userName = isset($data['name']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $data['name']) : "";
        $senderEmail = isset($data['email']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $data['email']) : "";
        $senderNum = isset($data['mobile']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $data['mobile']) : "";
        $message = isset($data['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|mobile-Type:)/", "", $data['message']) : "";
        $uploadResponse = $this->uploadCV($file);
        if ($uploadResponse['status'] == true) {
            $emailResponse = $this->sendEmail($userName, $senderEmail, $senderNum, $message, $uploadResponse['url']);
            if ($emailResponse['status'] == false) {
                return response()->json(['Response' => $emailResponse], 500);
            }
        } else {
            return response()->json(['Response' => $uploadResponse], 500);
        }
        return response()->json(['Response' => $emailResponse], 200);
    }

    //Searching
    public function search(Request $request, $item)
    {
        switch (strtolower($item)) {
            case 'delicacy':
                return redirect('delicacy');
                break;
            case 'beauty':
                return redirect('beauty');
                break;
            case 'fashion':
                return redirect('fashion');
                break;
            default:
                break;
        }
        //Cheking brand
        $brand = DB::table('shops')
            ->where(DB::raw('lower(name_en)'), 'like',  strtolower($item))
            ->get()->first();
        if (isset($brand)) {
            switch ($brand->cat_id) {
                case '1':
                    return redirect('delicacy/' . $brand->id);
                    break;
                case '2':
                    return redirect('beauty/' . $brand->id);
                    break;
                case '3':
                    return redirect('fashion/' . $brand->id);
                    break;
                default:
                    break;
            }
        }
        $data['item'] = $item;
        $data['products'] = $this->searchProduct($item);
        return view('/search')->with($data);
    }

    private function searchProduct($item)
    {
        return DB::table('products')
            ->where(DB::raw('lower(name_en)'), 'like', '%' . strtolower($item) . '%')
            ->leftjoin('images', 'images.product_id', '=', 'products.id')
            ->get()
            ->take(20);
    }

    function getPlentyBalance(Request $request)
    {
        $user = Auth::user();
        $data['wallet'] = $user['wallet'];
        return response()->json(['Response' => !!$user, 'wallet' =>  $data['wallet']]);
    }

    /**
     * Check out start here
     * parm :  cart
     * return total amount
     */
    function filterProducts($cart)
    {
        $ids['slots'] = array();
        $ids['sizes'] = array();
        $ids['products'] = array();
        foreach ($cart["cart_items"] as $prd) {
            if ($prd["category"] == 'Beauty') {
                array_push($ids['slots'], $prd);
            } else {
                if ($prd["size_id"]) {
                    array_push($ids['sizes'], $prd);
                } else {
                    array_push($ids['products'], $prd);
                }
            }
        }
        return $ids;
    }
    function placeOreder(Request $request)
    {
        $cart = $request->cart;
        //  $products_filter = $this->filterProducts($cart);
        // $a = $this->validateShedule($products_filter);
        //$b = $this->validateProduct($products_filter);
        //$c = $this->validateSize($products_filter);

        $items = array();
        foreach ($cart["cart_items"] as $item) {
            array_push($items, array(
                'product_id' => $item['id'],
                'shop_id' => $item['shop_id'],
                'price' => $item['price'],
                'color_id' => $item['color'],
                'size_id' => $item['size_id'],
                'booking_date' => $item['date'],
                'timeslot_id' => $item['timeslot_id'],
                'qty' => $item['quantity'],
            ));
        }

        $pay_mode = 'cash';
        if (!$cart["is_cash_on_delivery"]) {
            $pay_mode = 'card';
        }


        $m_request = new Request([

            'delivery_location' => $request->address,
            'city' => $request->city,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'label' => $request->addresslabel,
            'delivery_note' => $request->othernotes,
            'contact_number' => $request->contact,

            'total_amount'   => 100,
            'amount_due' => 0,

            'payment_method' =>  $pay_mode,
            'points' => $cart["loyality_point"],
            'wallet' => $cart["plenty_pay"],
            'coupon_value' => $cart["coupon_value"],

            'orderdetails' => $items,

        ]);
        $order = new OrderController();
        try {
            $order->store($m_request);
        } catch (Exception $e) {
            return response()->json(['Response' => $e]);
        }

        return response()->json(['Response' => $m_request]);
    }



    // Checkout proceed
    function checkoutProceed()
    {
        return;
    }


    function validateShedule($products_filter)
    {
        $settings = Project::first();
        $booking_date = array_column($products_filter["slots"], 'date');
        $product_id = array_column($products_filter["slots"], 'id');
        $timeslot_id = array_column($products_filter["slots"], 'timeslot_id');
        $slots = DB::table('details')
            ->select("product_id,booking_date,timeslot_id")
            ->whereIn('booking_date', $booking_date, 'and')
            ->whereIn('product_id',  $product_id, 'and')
            ->whereIn('timeslot_id',  $timeslot_id)
            ->get();

        $booked = array();
        if (count($slots) > 0) {
            foreach ($slots as $slt) {

                array_push($booked, "$slt->product_id-null-$slt->timeslot_id");
            }
            return  $booked;
        }
        //$timeslot = ($bookingcount < $settings->reserve);

        // $booked_slots =
        //     $slot_ids = array_column($products_filter["slots"], 'timeslot_id');
        // $timeslots =  DB::table('details')
        //     ->whereIn('id', $slot_ids)
        //     ->get();

        // foreach ($products_filter as $prd) {
        //     //$prd["qi"]
        // }

        return $slots;
    }
    function validateProduct($products_filter)
    {
        $product_ids = array_column($products_filter["products"], 'id');
        $products =  DB::table('products')
            ->whereIn('id', $product_ids)
            ->get();
        foreach ($products_filter as $prd) { }
        return $products;
    }
    function validateSize($products_filter)
    {
        $size_ids = array_column($products_filter["sizes"], 'size_id');
        $sizes =  DB::table('sizes')
            ->whereIn('id', $size_ids)
            ->get();
        foreach ($products_filter as $prd) { }
        return $sizes;
    }
}
