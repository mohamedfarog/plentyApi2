<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loyalty extends Model
{
    use HasFactory;

    public static function addPoints($user,$amount_due,$wallet,$shoplist)
    {
        //Check the user's tier list and calculate points accordingly

        // ShopList- List of Shop Ids to keep a log
        $tier= Tier::find($user->tier_id);
        $acquisition= $tier-> acquisition;
        $amount= $amount_due+ $wallet;          //Including wallet amount for points calculation
        $pointsearned= $acquisition* $amount;
        return $pointsearned;


        
        
        


        //update user points
        // $user = User::with(['tier'])->where('id', $data['user_id'])->first();

        
        //add translog

        // Translog::create($data);

        //add user_points

        //update loyalty card
    }

    //Function  to update the user's tier based on the points
    public  static function calculateTier ($user,$amount_due,$wallet)
    {   $purchases = $user->totalpurchases;
        $tierid = $user->tier_id;
        $tiers= Tier::get();
        foreach($tiers as $tier){
            if($purchases>= $tier->requirement){
                $tierid= $tier->id;
            }
        }
        $purchases= $user->totalpurchases + $amount_due+ $wallet ; 
        User::find($user->id)->update(['tier_id'=>$tierid,'totalpurchases'=>$purchases  ]);
        
    }

    public static function redeemPoints($user, $points)
    {
        // $user - User
        // $points
        // redeem Login
        $user->points=$points;
        $user->save();
    }

    public static function convertToPoints($tier=1, $amount)
    {
        //Converting amount to points
        $tierData= Tier::find($tier);
        if($tierData)
        {
            return$amount*100/ ($tierData->value);
        }
        return 0.0;
    }
    public static function convertPurchaseAmountToPoints($tier=1, $amount)
    {
        //Converting amount to points
        $tierData= Tier::find($tier);
        if($tierData)
        {
            return$amount*($tierData->value);
        }
        return $amount;
    }

    public static function convertToCurrency($tier=1, $points)
    {
         //Converting points to amount
        $tierData= Tier::find($tier);
        if($tierData)
        {
            $tierValueInPerc= ($tierData->value)/100;
            return $points*$tierValueInPerc;    
        }
        return 0.0;
    }
}
