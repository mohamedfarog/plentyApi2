<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\ApplePass;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Thenextweb\Definitions\StoreCard;
use Thenextweb\PassGenerator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

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

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->email_verified_at != NULL) {
                $success["message"] = "Login successful";
                $success["token"] = $user->createToken('MyApp')->accessToken;
                $u = User::with('shop')->find($user->id);

                return response()->json(["success" => $success, "user" => $u, "status_code" => 1],);
            } else {
                return response()->json(["error" => "Please verify the email"]);
            }
        } else {
            return response()->json(["error" => "Invalid Email/Password"], 400);
        }
    }



    public function register(Request $request)
    {
        $msg = '';
        $token = '';
        $user = User::where('contact', $request->contact)->first();
        $settings = Project::first();


        if ($user) {
            $dbUser = Auth::login($user);
            $dbUser = Auth::user();
            $token = $dbUser->createToken('MyApp')->accessToken;
            $msg = 'User already exists.';
        } else {
            $validator = Validator::make($request->all(), [
                "contact" => "required",


            ]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
            }
            $data = array();
            if (isset($request->name)) {
                $data['name'] = $request->name;
            }
            if (isset($request->email)) {
                $data['email'] = $request->email;
            }
            if (isset($request->password)) {
                $data['password'] = $request->password;
            }
            if (isset($request->contact)) {
                $data['contact'] = $request->contact;
            }
            if (isset($request->eid)) {
                $data['eid'] = $request->eid;
            }
            if (isset($request->passport)) {
                $data['passport'] = $request->passport;
            }
            if (isset($request->others)) {
                $data['others'] = $request->others;
            }
            if (isset($request->apple_id)) {
                $data['apple_id'] = $request->apple_id;
            }
            if (isset($request->google_id)) {
                $data['google_id'] = $request->google_id;
            }
            if (isset($request->active)) {
                $data['active'] = $request->active;
            }
            if (isset($request->verified)) {
                $data['verified'] = $request->verified;
            }
            if (isset($request->typeofuser)) {
                $data['typeofuser'] = $request->typeofuser;
            }
            if (isset($request->gender)) {
                $data['gender'] = $request->gender;
            }
            if (isset($request->invitationcode)) {
                $data['invitationcode'] = $request->invitationcode;
            }
            if (isset($request->invites)) {
                $data['invites'] = $request->invites;
            }

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
                    $data['invitation_code'] = $code;
                    $run = false;
                }
            }
            $data['points'] = $settings->registerpts;

            $user = User::create($data);

            $dbUser = Auth::login($user);
            $dbUser = Auth::user();
            $token = $dbUser->createToken('MyApp')->accessToken;
            $msg = 'User has been added';
        }

        return response()->json(['success' => !!$user, 'message' => $msg, 'token' => $token, 'user' => $user]);
    }

    public function myProfile(Request $request)
    {
        $user = Auth::user();
        if (isset($request->action)) {
            switch ($request->action) {
                case 'get':
                    return $user;
                    break;

                case 'update':
                    $msg = '';
                    if (isset($request->name)) {
                        $user->name = $request->name;
                    }
                    if (isset($request->email)) {
                        $user->email = $request->email;
                    }
                    if (isset($request->bday)) {
                        $user->bday = $request->bday;
                    }
                    // if(isset($request->contact)){
                    //     $user->contact = $request->contact;
                    // }
                    if (isset($request->gender)) {
                        $user->gender = $request->gender;
                    }

                    $user->save();
                    (new ApplePass())->createLoyaltyPass($user);
                    if ($user->accessidentifier != null) {
                        (new ApplePass())->createAccessPassAlt($user->id);
                    }

                    $msg = 'Account details updated successfully.';
                    return response()->json(['success' => !!$user, 'message' => $msg, 'user' => $user]);
                    break;
            }
        }
    }

    public function autologin(Request $request)
    {
        $user = Auth::user();

        return response()->json(['user' => $user]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = '';
        $msg = '';
        if (isset($request->id)) {
            $user = User::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $user->delete();
                    $msg = 'User has been deleted';
                    return response()->json(['success' => !!$user, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name)) {
                        $user->name = $request->name;
                    }
                    if (isset($request->email)) {
                        $user->email = $request->email;
                    }
                    if (isset($request->password)) {
                        $user->password = $request->password;
                    }
                    if (isset($request->contact)) {
                        $user->contact = $request->contact;
                    }
                    if (isset($request->eid)) {
                        $user->eid = $request->eid;
                    }
                    if (isset($request->passport)) {
                        $user->passport = $request->passport;
                    }
                    if (isset($request->others)) {
                        $user->others = $request->others;
                    }
                    if (isset($request->apple_id)) {
                        $user->apple_id = $request->apple_id;
                    }
                    if (isset($request->google_id)) {
                        $user->google_id = $request->google_id;
                    }
                    if (isset($request->active)) {
                        $user->active = $request->active;
                    }
                    if (isset($request->verified)) {
                        $user->verified = $request->verified;
                    }
                    if (isset($request->typeofuser)) {
                        $user->typeofuser = $request->typeofuser;
                    }
                    if (isset($request->gender)) {
                        $user->gender = $request->gender;
                    }
                    if (isset($request->invitationcode)) {
                        $user->invitationcode = $request->invitationcode;
                    }
                    if (isset($request->invites)) {
                        $user->invites = $request->invites;
                    }
                    $msg = 'User has been updated';
                    $user->save();
                    return response()->json(['success' => !!$user, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->name)) {
                $data['name'] = $request->name;
            }
            if (isset($request->email)) {
                $data['email'] = $request->email;
            }
            if (isset($request->password)) {
                $data['password'] = $request->password;
            }
            if (isset($request->contact)) {
                $data['contact'] = $request->contact;
            }
            if (isset($request->eid)) {
                $data['eid'] = $request->eid;
            }
            if (isset($request->passport)) {
                $data['passport'] = $request->passport;
            }
            if (isset($request->others)) {
                $data['others'] = $request->others;
            }
            if (isset($request->apple_id)) {
                $data['apple_id'] = $request->apple_id;
            }
            if (isset($request->google_id)) {
                $data['google_id'] = $request->google_id;
            }
            if (isset($request->active)) {
                $data['active'] = $request->active;
            }
            if (isset($request->verified)) {
                $data['verified'] = $request->verified;
            }
            if (isset($request->typeofuser)) {
                $data['typeofuser'] = $request->typeofuser;
            }
            if (isset($request->gender)) {
                $data['gender'] = $request->gender;
            }
            if (isset($request->invitationcode)) {
                $data['invitationcode'] = $request->invitationcode;
            }
            if (isset($request->invites)) {
                $data['invites'] = $request->invites;
            }
            $user = User::create($data);
            $msg = 'User has been added';
            return response()->json(['success' => !!$user, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
