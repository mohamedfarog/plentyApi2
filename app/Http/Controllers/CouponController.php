<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{

    public function index(Request $request)
    {
        $user= Auth::user();
        if($user->typeofuser=='S'){
            $coupons= Coupon::with('shop')->paginate(2);
            return $coupons;
        }
            
        $today = Carbon::now();
        if (isset($request->code)) {
            $couponexist = Coupon::where('code', strtoupper($request->code))->first();
        } else {
            return response()->json(['Response' => false,   'Coupon' => 'Coupon Code is required']);
        }
        if (!$couponexist) {
            return response()->json(['Response' => false,   'Coupon' => 'Coupon Code does not exist']);
        }

        $q = Coupon::with('shop');
        if (isset($request->isexpired))
            $q = $q->where('expiry', '<', Carbon::now());
        if (isset($request->shop_id))
            $q = $q->where('shop_id', '=', $request->shop_id);
        if (isset($request->code) && $request->code != '') {
            $q = $q->where('code', 'like', "%" . $request->code . "%",);
        }

        if ($today->gt($q->first()->expiry)) {
            return response()->json(['Response' => false,   'Coupon' => 'Coupon is expired']);
        }
        return response()->json(['Response' => !!$q, 'Coupon' => $q->first()]);
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "action" => "required|string"
        ]);
        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);
        }

        if (isset($request->action)) {
            switch ($request->action) {
                case 'delete':
                    $coupon = Coupon::find($request->id);
                    $coupon->delete();
                    return response()->json(['success' => "Coupons added",'message' => "Coupon Deleted"]);


                case 'create':

                    $coupon = new Coupon();



                    if (Coupon::where('code', '=', strtoupper($request->code))->first()) {

                        return response()->json(["error" => 'The coupon already exists',  "status_code" => 0]);
                    } else {
                        $coupon->code = strtoupper($request->code);
                        $coupon->value = $request->value;
                    }
                    if (isset($request->shop_id)) {
                        if ($request->shop_id == '0') { } else {
                            $coupon->shop_id = $request->shop_id;
                        }
                    } else { }
                    if (isset($request->expiry)) {
                        $coupon->expiry = $request->expiry;
                    }
                    if (isset($request->ispercentage)) {
                        $coupon->ispercentage = $request->ispercentage;
                    }

                    $coupon->save();

                    return response()->json(['success' => "Coupons added",'message' => "Coupon added"]);
                    break;

                case "activate":

                    if (isset($request->id)) {
                        $coupon = Coupon::where('id', $request->id)->first();
                        $coupon->update(['expiry' =>  $coupon->expiry->addDays(7)]);
                        

                        // return response()->json(['status' => !!$coupon, 'data' => $coupon]);
                    }
                    return response()->json(['error' => "something went wrong"]);
                    break;

                case "update":
                    if (isset($request->id)) {

                        $coupon =  Coupon::findorfail($request->id);
                        if (isset($request->expiry)) {
                            $coupon->expiry = $request->expiry;
                        }
                        if (isset($request->value)) {
                            $coupon->value = $request->value;
                        }
                        if (isset($request->code)) {
                            $coupon->code = strtoupper($request->code);
                        }
                        if (isset($request->shop_id)) {
                          
                                $coupon->shop_id = $request->shop_id;
                            
                        } 

                        
                        if (isset($request->expiry)) {
                            $coupon->expiry = $request->expiry;
                        }
                        $coupon->ispercentage = $request->ispercentage;

                        $coupon->save();
                        return response()->json(['success' => "Coupons added",'message' => "Coupon updated"]);

                    }

                case 'expire':
                    if (isset($request->id)) {
                        $coupon = Coupon::where('id', $request->id)->update(['expiry' => Carbon::now()]);
                        
                    }
                    return response()->json(['message' => "Coupon expired"]);

                    break;
                    
                case 'coupon':

                    $c = Coupon::with('shop')->where('code', '=', strtoupper($request->coupon))->first();
                    if ($c)
                        return $c;
                    return response()->json(["error" => "Not found"]);
                    break;
                default:
                    return response()->json(['error' => "something went wrong"]);
            }
        }
    }
}
