<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TableBooking;
use App\Models\TableBookingDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TableBookingController extends Controller
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

    public function index(Request $request)
    {
        $user_id = Auth::id();
        $dt = Carbon::now();
        

        $data = TableBooking::where('user_id', $user_id)->with(['details' => function ($details) {
            return $details->with('product');
        }]);
        return $data->get();
        

        
        if (isset($request->shop_id)) {
            $shopid = $request->shop_id;
            $orders = TableBooking::with(['details' => function ($details) use ($shopid, $dt) {
                return $details->where('shop_id', $shopid)->whereDate('created_at', '=', $dt->toDateString());
            }, 'user'])->get();
            $arr = array();
            foreach ($orders as $order) {

                if (count($order->details) > 0) {
                    foreach ($order->details as $detail) {
                        if ($detail->shop_id == $request->shop_id) {
                            if(!in_array($order,$arr,true)){
                                array_push($arr, $order);

                            }
                        }
                    }
                }
            }
            
            if (count($arr[0]) > 0) {
                $data = $this->paginate($arr[0]);
                return $data;
            } else {
                return response()->json(['Errors' => 'No orders found']);
            }
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableBooking  $tableBooking
     * @return \Illuminate\Http\Response
     */
    public function show(TableBooking $tableBooking)
    {
        //
    }
    public function ordersandreservations(Request $request)
    {
        if (isset($request->user_id)) {
            $userid = $request->user_id;
            $bookings = TableBookingDetail::where('user_id',$userid)->with(['product','user'])->get();
            $orders = TableBookingDetail::whereNotNull('booking_date',$userid)->with(['product','user'])->get();
            
      
         
         
        }
    }
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $order = '';
        $msg = '';

        if (isset($request->id)) {
            $order = TableBooking::where('id', $request->id)->first();
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
                    if (isset($request->date)) {
                        $order->date = $request->date;
                    }
                    if (isset($request->preftime)) {
                        $order->preftime = $request->preftime;
                    }
                    if (isset($request->table_id)) {
                        $order->table_id = $request->table_id;
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

            $data = new TableBooking();

            $data->user_id = Auth::id();
            $data->ref = Str::uuid();
            $data->total_amount = $request->total_amount;
            $data->amount_due = $request->amount_due;


            if (isset($request->status)) {
                $data->status = $request->status;
            }
            if (isset($request->coupon_value)) {
                $data->coupon_value = $request->coupon_value;
            }
            if (isset($request->coupon_code)) {
                $data->coupon_code = $request->coupon_code;
            }
            if (isset($request->points)) {
                $data->points = $request->points;
            }
            if (isset($request->date)) {
                $data->date = $request->date;
            }
            if (isset($request->preftime)) {
                $data->preftime = $request->preftime;
            }
            if (isset($request->table_id)) {
                $data->table_id = $request->table_id;
            }

            $order = $data->save();
            if (isset($request->orderdetails)) {
                foreach ($request->orderdetails as $orderdetails) {
                    $details = new TableBookingDetail();
                    $details->tablebookingid = $data->id;

                    if (isset($orderdetails['qty'])) {
                        $details->qty = $orderdetails['qty'];
                    }

                    if (isset($orderdetails['product_id'])) {
                        $details->product_id = $orderdetails['product_id'];
                    }
                    if (isset($orderdetails['shop_id'])) {
                        $details->shop_id = $orderdetails['shop_id'];
                    }
                    if (isset($orderdetails['size_id'])) {
                        $details->size_id = $orderdetails['size_id'];
                    }

                    if (isset($orderdetails['addons'])) {
                        $details->addons = implode(',', $orderdetails['addons']);
                    }
                    if (isset($orderdetails['price'])) {
                        $details->price = $orderdetails['price'];
                    }


                    $details->save();
                }
            }





            $msg = 'Order has been added';




            return response()->json(['success' => !!$order, 'message' => $msg, 'user' => Auth::user(), "order" => $data]);
        }
    }
}
