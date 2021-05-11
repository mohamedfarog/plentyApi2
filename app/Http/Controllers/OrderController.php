<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Logistics;
use App\Models\Loyalty;
use App\Models\Order;
use App\Models\Shop;
use App\Models\ShopInfo;
use App\Models\TableBooking;
use App\Models\Tier;
use App\Models\Transaction;
use App\Models\User;
use App\PushNotification;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Moathdev\Tap\Facades\Tap;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function orderReady(Request $request)
    {
        if(isset($request->order_id)){
            $order = TableBooking::where('id', $request->order_id)->first();
            $order->ready = 1;
            $order->save();
            $user = User::find($order->user_id);
            if($user->fcm != null){
                PushNotification::sendFCM($user->fcm, 'Your order is ready for pickup.', 'Order Number: ' . $order->id);

            }
            return response()->json(['success'=>!!$order, 'message'=>'Order is ready for pickup.']);
        }
    }

    public function index(Request $request)
    {
        $dt = Carbon::now();

        $user = Auth::user();
        $shopid = $request->shop_id;



        $orders = Order::with(['details' => function ($details) {
            return $details->with(['product' => function ($product) {
                return $product->with(['images']);
            }, 'size', 'color']);
        }, 'user']);

        switch ($user->typeofuser) {
            case 'U':
            case 'u':
                $orders = $orders->where('user_id', $user->id);
                break;
            case 'V':
            case 'v':

                $shop = ShopInfo::where('user_id', $user->id)->first();
                if (!$shop)
                    return response()->json(['success' => false, 'message' => "You dont't have enough perimission to access the data",], 400);

                $orders = Order::join('details', 'details.order_id', 'orders.id')->where('details.status', 0)->where('shop_id', $shop->id)->select("orders.*", "details.shop_id")->with(['details' => function ($details) use ($shop) {
                    return $details->where('shop_id', $shop->id)->with(['product' => function ($product) {
                        return $product->with(['images']);
                    }, 'size', 'color']);
                },]);
                if (isset($request->forshipment)) {
                    $orders = Order::join('details', 'details.order_id', 'orders.id')->where('details.status', 1)->where('shop_id', $shop->id)->select("orders.*", "details.shop_id")->with(['details' => function ($details) use ($shop) {
                        return $details->where('shop_id', $shop->id)->with(['product' => function ($product) {
                            return $product->with(['images']);
                        }, 'size', 'color']);
                    },]);
                }

                // if (isset($request->order_status) && in_array($request->order_status, [0, 1, 2, 3, 4])) {
                //     $orders = $orders->where('order_status', $request->order_status);
                // }

                // return response()->json(['success' => !!$orders, 'order' => $orders->orderBy('orders.id', 'desc')->paginate()]);

                break;
            case 'S':
            case 's':
                if (isset($request->user_id))
                    $orders = $orders->where('user_id', $request->user_id);
                break;
            default:
                break;
        }
        if (isset($request->order_status) && in_array($request->order_status, [0, 1, 2, 3, 4])) {
            $orders = $orders->where('order_status', $request->order_status);
        }
        return $orders->orderBy('orders.id', 'desc')->paginate();
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
        $user = Auth::user();
        $order = '';
        $msg = '';
        if (isset($request->id)) {
            $order = Order::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $order->delete();
                    $msg = 'Order has been deleted';
                    return response()->json(['success' => !!$order, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->ref)) {
                        $order->ref = $request->ref;
                    }
                    if (isset($request->total_amount)) {
                        $order->total_amount = $request->total_amount;
                    }
                    if (isset($request->amount_due)) {
                        $order->amount_due = $request->amount_due;
                    }
                    if (isset($request->order_status)) {
                        $order->order_status = $request->order_status;
                        if ($request->order_status == 2) {
                            $logistics = (new Logistics())->create($request->id);
                        }
                        if ($request->order_status == 3) {
                            //TODO
                            //Increment user s total purchases
                            // Tier List Obsever to check the user's tier and update accordingly
                            //Add Points to the User
                            //Total Purchases
                            $user = User::find($order->user_id);
                            // $user->totalpurchases += $order->amount_due;
                            $user->save();
                            $loyalty = new Loyalty();



                            $loyalty->calculateTier($user, $request->amount_due, $request->wallet ?? 0);
                            $pointsearned = $loyalty->addPoints(User::find($user->id), 0, $request->amount_due);
                            $order->points_earned = $pointsearned;
                        }
                    }
                    if (isset($request->coupon_value)) {
                        $order->coupon_value = $request->coupon_value;
                    }

                    if (isset($request->payment_method)) {
                        $order->payment_method = $request->payment_method;
                    }
                    if (isset($request->tax)) {
                        $order->tax = $request->tax;
                    }
                    if (isset($request->delivery_charge)) {
                        $order->delivery_charge = $request->delivery_charge;
                    }
                    if (isset($request->delivery_location)) {
                        $order->delivery_location = $request->delivery_location;
                    }
                    if (isset($request->user_id)) {
                        $order->user_id = $request->user_id;
                    }
                    if (isset($request->lat)) {
                        $order->lat = $request->lat;
                    }
                    if (isset($request->lng)) {
                        $order->lng = $request->lng;
                    }
                    if (isset($request->delivery_note)) {
                        $order->delivery_note = $request->delivery_note;
                    }
                    if (isset($request->contact_number)) {
                        $order->contact_number = $request->contact_number;
                    }
                    if (isset($request->city)) {
                        $order->city = $request->city;
                    }
                    if (isset($request->label)) {
                        $order->label = $request->label;
                    }


                    $msg = 'Order has been updated';

                    $order->save();
                    return response()->json(['success' => !!$order, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "total_amount" => "required",
                "amount_due" => "required",
                "delivery_location" => "required",
                "orderdetails" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
            }
            $data = array();
            $data['user_id'] = $user->id;
            $data['ref'] = Str::uuid();
            $data['total_amount'] = $request->total_amount;
            $data['amount_due'] = $request->amount_due;
            $data['delivery_location'] = $request->delivery_location;

            //  addPoints

            if (isset($request->order_status)) {
                $data['order_status'] = $request->order_status;
                if ($request->payment_method == 'CARD') {
                    $data['order_status'] = 99;
                }
            }
            if (isset($request->payment_method)) {
                $data['payment_method'] = $request->payment_method;
            }

            if (isset($request->lat)) {
                $data['lat'] = $request->lat;
            }
            if (isset($request->lng)) {
                $data['lng'] = $request->lng;
            }
            if (isset($request->delivery_note)) {
                $data['delivery_note'] = $request->delivery_note;
            }
            if (isset($request->contact_number)) {
                $data['contact_number'] = $request->contact_number;
            }
            if (isset($request->city)) {
                $data['city'] = $request->city;
            }
            if (isset($request->label)) {
                $data['label'] = $request->label;
            }

            if (isset($request->points)) {
                //TODO POINT DEDUCTION (CHECK AGAIN)

                $customer = User::with(['tier'])->find($user->id);           //for updating the user model
                $customer->points = $user->points - $request->points;
            }
            if (isset($request->wallet)) {
                //TODO WALLET DEDUCTION (CHECK AGAIN)
                $customer->wallet = $user->wallet  - $request->wallet;
            }

            $loyalty = new Loyalty();


            if (isset($request->tax)) {
                $data['tax'] = $request->tax;
            }
            if (isset($request->delivery_charge)) {
                $data['delivery_charge'] = $request->delivery_charge;
            }
            if (isset($request->coupon_value)) {
                $data['coupon_value'] = $request->coupon_value;
            }
            $shoplist =  array();                // List of Shop Ids


            $order = Order::create($data);


            // $trans->amount;   //todo
            // reg,order_id,ref,status,type,



            //TODO
            //    $pointsearned= $loyalty->addPoints($customer,$request->amount_due,$request->wallet??0 ,$shoplist);
            //         if($pointsearned){
            //             $data['points_earned'] = $pointsearned;
            //         }

            foreach ($request->orderdetails as $orderdetails) {
                $arr = array();
                if (isset($orderdetails['product_id'])) {
                    $arr['product_id'] = $orderdetails['product_id'];
                }
                if (isset($orderdetails['qty'])) {
                    $arr['qty'] = $orderdetails['qty'];
                }
                if (isset($orderdetails['booking_time'])) {
                    $arr['booking_time'] = $orderdetails['booking_time'];
                }
                if (isset($orderdetails['shop_id'])) {
                    $arr['shop_id'] = $orderdetails['shop_id'];
                }
                // if (isset($orderdetails['shop_id'])) {
                //     $arr['shop_id'] = $orderdetails['shop_id'];
                //     if(!in_array($shoplist,$orderdetails['shop_id'])){
                //         array_push($shoplist,['shop_id'=> $orderdetails['shop_id'] ,'price' => $orderdetails['price'] ]);
                //     }
                //     else{
                //         $shoplist['price']= $shoplist['price'] + $orderdetails['price'];
                //     }
                //     return $shoplist;
                // }
                if (isset($orderdetails['price'])) {
                    $arr['price'] = $orderdetails['price'];
                }
                if (isset($orderdetails['color_id'])) {
                    if ($orderdetails['color_id'] == -1) {
                    } else
                        $arr['color_id'] = $orderdetails['color_id'];
                }
                if (isset($orderdetails['size_id'])) {
                    $arr['size_id'] = $orderdetails['size_id'];
                }
                if (isset($orderdetails['booking_date'])) {
                    $arr['booking_date'] = $orderdetails['booking_date'];
                }
                if (isset($orderdetails['timeslot_id'])) {
                    $arr['timeslot_id'] = $orderdetails['timeslot_id'];
                }
                if (isset($orderdetails['addons'])) {

                    $arr['addons'] = implode(',', $orderdetails['addons']);
                }
                $arr['order_id'] =  $order->id;
                $detail = Detail::create($arr);
            }
            if ($request->payment_method == 'CARD') {
                $trans = new Transaction();
                $trans->amount = $request->amount_due;
                $trans->ref = Str::uuid();
                $trans->order_id =  $order->id;
                $trans->status = 0;
                $trans->type = 'Order';
                $trans->user_id = $customer->id;
                $trans->save();
                $paygateway = $trans->createpayment($user, $request->amount_due, $order->id, $trans->id);
                return response()->json(['success' => !!$order, 'message' => $paygateway, 'user' => User::find($customer->id)]);
            }


            // $customer->points+=$pointsearned;

            $customer->save();
            $loyalty->calculateTier($customer, $request->amount_due, $request->wallet);
            $msg = 'Order has been added';




            return response()->json(['success' => !!$order, 'message' => $msg, 'user' => User::with(['tier'])->find($customer->id)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Order::with(['details' => function ($details) {
            return $details->with(['product' => function ($product) {
                return $product->with(['images']);
            }, 'size', 'color']);
        }, 'user'])->find($order->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    public function viewreceipt(Request $request)
    {
        if($request->order_id){
            $order= Order::with(['user','details'])->find($request->order_id);
            return view('receipt')->with(['data'=>$order]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
