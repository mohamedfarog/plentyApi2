<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loyalty extends Model
{
    use HasFactory;

    public static function addPoints($user,$amount_due,$wallet)
    {
        //Check the user's tier list and calculate points accordingly
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
