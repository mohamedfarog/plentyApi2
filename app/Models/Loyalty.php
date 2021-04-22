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

    public static function redeemPoints($id, $points)
    {
    }

    public static function convertToPoints($tier, $amount)
    {
    }

    public static function convertToCurrency($tier, $points)
    {
    }
}
