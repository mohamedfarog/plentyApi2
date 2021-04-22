<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FoodicsController extends Controller
{
    public $baseUrl = "https://api-sandbox.foodics.com/v5/";
    public $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhkMGEyN2ZhZDdiN2RhYTllNDk5ODE1ZTZjYTJhMjg0MjRiZWQzZTJmZjIxOGQ3Y2Q5YzFjODJkMjQ2M2I0MjRhY2NiYjMwNGZjM2EyZTFhIn0.eyJhdWQiOiI4ZjllYjNmNi02ZWZhLTRmZWYtODk1ZS1kMWJjNDRiYTQ4MWQiLCJqdGkiOiI4ZDBhMjdmYWQ3YjdkYWE5ZTQ5OTgxNWU2Y2EyYTI4NDI0YmVkM2UyZmYyMThkN2NkOWMxYzgyZDI0NjNiNDI0YWNjYmIzMDRmYzNhMmUxYSIsImlhdCI6MTYxOTAwNTYxMSwibmJmIjoxNjE5MDA1NjExLCJleHAiOjE2NTA1NDE2MTEsInN1YiI6IjkzM2Y2OGNjLWZmYzEtNDYwNi04Njk4LTZiMTc2Zjg1YmQ4YiIsInNjb3BlcyI6WyJnZW5lcmFsLnJlYWQiLCJjdXN0b21lcnMuZ2V0IiwiY3VzdG9tZXJzLmxpc3QiXSwiYnVzaW5lc3MiOiI5MzNmNjhjZC0xNjQxLTQxNmEtOTFkYS00NTUzYzQ3NTc4MzYiLCJyZWZlcmVuY2UiOiI1NTgzNzUifQ.N5XVUD2ChgGsbblSCbyiqCUH80SzDd9znJYbBMwIBh-_XpkXd9Vj7CCto76dRh7Wpa-VvtuhRlRo5ieR9_dj67V0Mwu4N3rmiZYss1yILS5dZ96kQfM1130b-C70bI-q4m_eWu1z9AK5QDh3u21-k1yu0wTiqZCrFe0tu85zlKpR7NZigbmFlXy9uU6Y3BkzzteOeNd6G5TnZPCOLC8asMXfa924RRReTwWNFAOPANbobFMVub1eBknvHxFy8zjpEbKzM0IniTNXM66M8B49Uvgw4dZdjKQxqjGDvasqG2kjyCu6ugTkd7usljKuQPB0U5f-Dg88h_krH_EqaQFZMgyy74zysnQ3PMA04fbOAojlYaLkNvDlJzfrEDqQwNY7lsr9fF8kFB03uplTdMK37oLnXkB0XDzsn1lLyvmvg1KwwfWTc0ls3y5tHc3-N0DRNqoZpzJIxqCTDr92ZvKwblgSqPGPVJWUElt07w-r8JrIqnMvgChwLvONDiZQNZORdqSrLk-fg4xQZvaAxXDdVbAmuNdX7I_ufZnLSNqHuWdEJway7LmEQbgNPjwWklLak4f_gLItk8E5t4_Yk7FAdJKGx3Rn0Use_9qcmB1ji476sWUf3NiUoC6zWQhBH5HHZcLV5DqDg1jdDKW8bcS5wyIMhkHHbjiSvcaRhsdcRtE";
    function getAllCustomers( $email = null, $phone = null,$page = 1)
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
            // checking with foodics unique id user is exists in plentyapp database
            $userinfo = User::where("foodics_unique_id", $foodics_unique_id)->first();
            // If exists skip
            if (!$userinfo) {
                $userinfo = User::where("contact", "like", "%" . $customer['phone'])->first();
                if (!$userinfo)
                   {
                        $userinfo = new User();
                        $userinfo->name=$customer['name'];
                        $userinfo->email=$customer['email'];
                        $userinfo->bday=$customer['birth_date'];
                        $userinfo->gender=$customer['gender'];
                        $userinfo->contact="+".$customer['dial_code'].$customer['phone'];
                        $userinfo->invitation_code = 'P-' . time();
                   } 

                $userinfo->foodics_unique_id= $foodics_unique_id;
                $userinfo->save();
            }

            Log::info($customer['id']);
        }
        return response()->json($response->json());
    }
    public function createUser(User $user)
    {
        Log::info("This is started loading");
        Log::info([
            "name"=> $user->name,
            "dial_code"=> 966,
            "phone"=> last(explode("+966",$user->phone)),
            "email"=> $user->email,
            "gender"=> $user->gender=="Male"? 1:0,
            "birth_date"=> $user->bday,
            "house_account_limit"=> 0,
            "house_account_balance"=> 0,
            "is_loyalty_enabled"=> false,
            "is_blacklisted"=> false,
            "is_house_account_enabled"=> true
        ]);
        //When New user created in plenty database sending informaions to foodics
        Http::withToken($this->token)->post($this->baseUrl . "customers",  [
            "name"=> $user->name,
            "dial_code"=> 966,
            "phone"=> last(explode("+966",$user->phone)),
            "email"=> $user->email,
            "gender"=> $user->gender=="Male"? 1:0,
            "birth_date"=> $user->bday,
            "house_account_limit"=> 0,
            "house_account_balance"=> 0,
            "is_loyalty_enabled"=> false,
            "is_blacklisted"=> false,
            "is_house_account_enabled"=> true
        ]);
      
    }
    public function webhooks(Request $request)
    {
        Log::info($request->all());
    }
    public function loyality(Request $request)
    {
        Log::info($request->all());
    }
}
