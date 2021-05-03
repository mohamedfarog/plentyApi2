<?php

namespace App\Http\Controllers;

use App\Models\ApplePass;
use App\Models\Loyalty;
use App\Models\Project;
use App\Models\Tier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FoodicsController extends Controller
{
    public $baseUrl = "https://api-sandbox.foodics.com/v5/";
    public $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkzYzkyODY1MjdjNjM1OTI5MGVhOGU1MTQzMWY3ZWM5MTkzYjA4OGE5ODkxMjIwNTIyYTIwZjVmMzRkOTQzNTMyYTI5MjhhNjQ2YzYxNmMxIn0.eyJhdWQiOiI5MzQ1YTAyNy0xZDI4LTQwN2UtYjU4ZS0yNjFjYzYzMzc1MGEiLCJqdGkiOiI5M2M5Mjg2NTI3YzYzNTkyOTBlYThlNTE0MzFmN2VjOTE5M2IwODhhOTg5MTIyMDUyMmEyMGY1ZjM0ZDk0MzUzMmEyOTI4YTY0NmM2MTZjMSIsImlhdCI6MTYxOTI3MjYwMiwibmJmIjoxNjE5MjcyNjAyLCJleHAiOjE3NzcwMzkwMDIsInN1YiI6IjkzM2Y2OGNjLWZmYzEtNDYwNi04Njk4LTZiMTc2Zjg1YmQ4YiIsInNjb3BlcyI6W10sImJ1c2luZXNzIjoiOTMzZjY4Y2QtMTY0MS00MTZhLTkxZGEtNDU1M2M0NzU3ODM2IiwicmVmZXJlbmNlIjoiNTU4Mzc1In0.WFLBvGPKsY6v_tql9fTlxx0eV0L8kmYotHGdtkshcWAfdpVbfHBKjAhr8IhhSxftAPt0jfRTFCwJyiRuhwkX_q0k5YHgN4lnHce1aAWbsFqbAWw0-rxmi8RAjYDoTus4iw1dVmYxpN_Mss4oJx-Tm-RSMTIHf86f4bnhAgMLebrFxgBYz9FKcxI8d9FFAxNYGkr-KFBPADhZE1W4MO8FBomc--liIvtpjHGp6YKgJ5ynaS-n-NSxYnsodGSSrAB4ChtIQ5COaJ7LcFeyYChBK31TOSI8wNpct4JkEcbGpJ2abaIQF3Iz0VNkMyE0DMmrbiP0jje2wk93lWqK8FES4DV0EP6QFVS3rAHsJwNeF0XUQEtHjjySwazwG5B08y_T56KKgRr8oWNm-Mn8bkI0TpByv3A-VpswNRIts8vFuCihOZ2lOv-MkaLhKZIxcslrfdNqMbNc2LOrI8pRrV6G8lkiy0HvV7jW19TJiAzsXegueY5RatTWfqDdNMjjPHhj4S_bFu7g3aQa8uNRb9uvPSOfAM2pNvRofbw9GiXD41_k0-Qz4g2YgSUC7LK15sukX0q1IY-8-ENRBB0n0mfb-YoPMzST0Ie4DqwgZZ2uZfIJWiOOoyjkbaHn366oUO9kHODkFO48xXgEilOWNrMyJK1rH3z3xEm49jal8bO8igA";
    function getAllCustomers($email = null, $phone = null, $page = 1)
    {
        //include=tags,addresses TODO
        $query = [
            "page" => $page
        ];
        // Filerting part
        if (isset($email))
            $query["filter[email]"] = $email;
        if (isset($phone))
            $query["filter[phone]"] = $phone;

        $response = Http::withToken($this->token)->get($this->baseUrl . "customers", $query);
        $data = $response->json()['data'];
        foreach ($data as $customer) {
            $foodics_unique_id = $customer['id'];
            $this->getUserInfoByFoodicID($foodics_unique_id);
        }
        return ($response->json());
    }
    public function getUserInfoByFoodicID($foodics_unique_id)
    {
        $userinfo = User::where("foodics_unique_id", $foodics_unique_id)->first();
        if ($userinfo)
            return $userinfo;
        $response = Http::withToken($this->token)->get($this->baseUrl . "customers/" . $foodics_unique_id,);
        if ($response->ok()) {
            $customer = $response->json()['data'];

            $userinfo = User::where("contact", "like", "%" . $customer['dial_code'] . $customer['phone'])->first();
            if ($userinfo) {
                $userinfo->foodics_unique_id = $foodics_unique_id;
                $userinfo->save();
                return $userinfo;
            }
            $userinfo = new User();
            $userinfo->tier_id = 1;
            $userinfo->name = $customer['name'];
            $userinfo->email = $customer['email'];
            $userinfo->bday = $customer['birth_date'];
            $userinfo->gender = $customer['gender'];
            $userinfo->contact = "+" . $customer['dial_code'] . $customer['phone'];

            $settings = Project::first();
            $start = '1';
            $end = '';
            for ($i = 0; $i < $settings->invcode - 1; $i++) {

                $start .= '0';
            }
            for ($i = 0; $i < $settings->invcode; $i++) {

                $end .= '9';
            }
            $run = true;
            $code = 'P-' . rand(intval($start), intval($end));

            while ($run) {

                $user = User::where('invitation_code', $code)->first();
                if ($user != null) {
                    $code = 'P-' . rand(intval($start), intval($end));
                } else {
                    $userinfo->invitation_code = $code;
                    $run = false;
                }
            }
            $userinfo->points = 100;
            $userinfo->foodics_unique_id = $foodics_unique_id;
            $userinfo->save();
            (new ApplePass())->createLoyaltyPass($userinfo);
            if ($userinfo->accessidentifier != null) {
                (new ApplePass())->createAccessPass($userinfo->id, null);
            }
            return $userinfo;
        } else
            throw ("there is some errors while getUserInfoByFoodicID" . $foodics_unique_id);
    }
    public function createUser(User $user)
    {
        //When New user created in plenty database sending informaions to foodics

        $response = Http::withToken($this->token)->post($this->baseUrl . "customers",  [
            "name" => $user->name,
            "dial_code" => 966,
            "phone" => last(explode("+966", $user->contact)),
            "email" => $user->email,
            "gender" => $user->gender == "Male" ? 1 : 0,
            "birth_date" => $user->bday,
            "house_account_limit" => 0,
            "house_account_balance" => 0,
            "is_loyalty_enabled" => false,
            "is_blacklisted" => false,
            "is_house_account_enabled" => true
        ]);
        if ($response->ok()) {
            // $user->foodics_unique_id = $response->json()['id'];
            $user->save();
        } else {
            Log::error(
                "there is some errors while CreateUser" .
                    "name" . $user->name
            );
        }
    }
    public function webhooks(Request $request)
    {

        switch ($request->event) {
            case 'customer.order.created':
                $foodics_unique_id = $request->order['customer']['id'];
                $amount = $request->order['total_price'];
                $userinfo = $this->getUserInfoByFoodicID($foodics_unique_id);
                if (!$userinfo->tier_id) {
                    $userinfo->tier_id = 1;
                }
                $userinfo->points += Loyalty::convertPurchaseAmountToPoints($userinfo->tier_id, $amount);
                $userinfo->totalpurchases += $amount;
                $userinfo->save();
                break;
            case "customer.created":
                $foodics_unique_id = $request->customer['id'];
                $this->getUserInfoByFoodicID($foodics_unique_id);
                break;
            default:
                Log::info($request->all());
                break;
        }
    }
    public function loyalityRewards(Request $request)
    {
        Log::info($request->all());
        $this->access($request);
        $res = [];
        if ($request->customer_mobile_number) {

            $contact = "" . $this->findCountryISOBYCODE($request->mobile_country_code) . $request->customer_mobile_number;
            $userinfo = User::where("contact", "like", "%" . $contact)->first();
            if ($userinfo) {
                if (!($userinfo->tier_id)) {
                    $userinfo->tier_id = 1;
                    $userinfo->save();
                }
                $amount = Loyalty::convertToCurrency($userinfo->tier_id, $userinfo->points);
                return response()->json([
                    "type" => 1,
                    "discount_amount" => $amount,
                    "is_percent" => false,
                    "customer_mobile_number" => $request->customer_mobile_number,
                    "mobile_country_code" => $request->mobile_country_code,
                    "reward_code" => $request->reward_code,
                    "business_reference" => $request->business_reference,
                    "max_discount_amount" => $amount,
                    "discount_includes_modifiers" => false,
                    "allowed_products" => null,
                    "is_discount_taxable" => false
                ]);
            }
            $this->getAllCustomers(null, $request->customer_mobile_number);
        }
        $res = [
            "type" => 1,
            "discount_amount" => 0,
            "is_percent" => false,
            "customer_mobile_number" => $request->customer_mobile_number,
            "mobile_country_code" =>  $request->mobile_country_code,
            "reward_code" => $request->reward_code,
            "business_reference" => $request->business_reference,
            "max_discount_amount" => 0,
            "discount_includes_modifiers" => false,
            "allowed_products" => null,
            "is_discount_taxable" => false
        ];
        return response()->json($res);
    }
    public function findCountryISOBYCODE($code)
    {
        switch ($code) {
            case 'AE':
                return "971";
                break;
            case 'SA':
                return "966";
                break;
            default:
                return '';
                break;
        }
    }
    public function loyalityRedeem(Request $request)
    {
        Log::info($request->all());
        $this->access($request);
        if ($request->customer_mobile_number) {
            $contact = "" . $this->findCountryISOBYCODE($request->mobile_country_code) . $request->customer_mobile_number;
            $userinfo = User::where("contact", "like", "%" . $contact)->first();
            if ($userinfo) {
                $points = Loyalty::convertToPoints($userinfo->tier_id, $request->discount_amount);
                Loyalty::redeemPoints($userinfo, $points);
            }
        }
    }
    public function access(Request $request)
    {
        $authToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZGU1NjczOGU1YTEzNGE2ZDY3N2Y1YWY4OTJiMWEyM2NkOTVmN2FmODg3Y2Q1MGMyZWEzMDVhOWU5YTNmYzUxYzUwZGIxOTE0YzEzNDhhYWMiLCJpYXQiOiIxNjE4OTgzOTY4LjgwNTc5OCIsIm5iZiI6IjE2MTg5ODM5NjguODA1ODAyIiwiZXhwIjoiMTY1MDUxOTk2OC43OTY2MTAiLCJzdWIiOiIxNzEiLCJzY29wZXMiOltdfQ.g1yuIuzGXBBzoT-slu0dIAF0IATy4iJImoEcPPGdWuMpmsT6y0QIyqpYqMc1fNg-IbmmgbLhmoG29kaoqukWCTd1p-r0gORVtuCmsMju89IKIZHCj_RYmFJ7vsbV_5cALGdZ9FlHxU67jFr_p5RPqKnD70R5G7HIcyuiR8I6kVvuy9cLKPTD4-zaD6RPON4PNkU2Iyv0qHxnEkRHD_pSMgxJYqsiXPfMgosbpEecoRRg_h-hfTu3HQhxkg0jv6ianRhqJEftMi340xfQIc1IvDRLuEqBtNzrlrmfNbTzLsO0G3QTG4_XjHmX9IOtjjtADv0sdmb-436VhU45l7O-pdNX7DIVyLyio8oFZw6MmGVMl2R33kkJRUmi5p1sB6lpGYTvLXvzyAQrmyGCDON-pY5TZutOoIARQNG8xeIy1QtHFVl-zOI4o3x3dLGqPGa769_ZVqZVkPjGyH3WlN6k2h5uq7R9JLHrVxBYPShJIC2duBrhpMFAIuSVzeCUzH85KsJlaW0_gyhtJZvSFg_Hvtn-2a3JuLWuC7DldTkEVH735CVCPpTOCttkT7cKA9d6100pCtzP89KQZrzMUUWR64u8JImVxAOf5RWqMFOSLrndqkem6DBWNZtUUXXWzSlalhSpigEtGBUA8wIkFolZ-OWDp49cqv8U291nsCfs1MQ";
        if ($request->header('Authorization') != null && $request->header("Authorization") == $authToken) {
        } else {
            return response()->json('unauthorized', 403);
            die();
        }
    }
}
