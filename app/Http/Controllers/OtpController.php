<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\Project;
use App\Models\SMS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "contact" => "required",
            "otp" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
        }
        $otp = Otp::where('contact', $request->contact)->where('verified', 0)->first();
        $verified = false;
        $msg = '';

        if ($otp != null) {
            if (isset($request->otp)) {
                if ($otp->otp == $request->otp) {
                    $verified  = true;
                    $otp->verified = true;
                    $msg = 'OTP has been verified.';
                    $otp->save();

                    $user = User::with(['tier'])->where('contact', $request->contact)->first();

                    if ($user) {
                        Auth::login($user);
                        $dbuser = Auth::user();
                        $token = $dbuser->createToken('MyApp')->accessToken;
                        return response()->json(['success' => $verified, 'message' => $msg, 'user' => $user, 'token' => $token]);
                    }
                    return response()->json(['success' => $verified, 'message' => $msg, 'authtoken' => $otp->code]);
                } else {
                    $verified = false;
                    $msg = 'OTP entered is incorrect.';
                }
            }
        }
        return response()->json(['success' => $verified, 'message' => $msg]);
    }

    public function otpNumber(Request $request)
    {
        $project = Project::first();

        return response()->json(['otplength' => $project->otp]);
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
        $settings = Project::first();
        $validator = Validator::make($request->all(), [
            "contact" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
        }
        $otp = '';
        $msg = '';
        if (isset($request->id)) {
            $otp = Otp::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $otp->delete();
                    $msg = 'Otp has been deleted';
                    return response()->json(['success' => !!$otp, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->contact)) {
                        $otp->contact = $request->contact;
                    }
                    if (isset($request->otp)) {
                        $otp->otp = $request->otp;
                    }
                    if (isset($request->verified)) {
                        $otp->verified = $request->verified;
                    }

                    $otp->save();
                    $msg = 'Otp has been updated';
                    return response()->json(['success' => !!$otp, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->contact)) {
                $data['contact'] = $request->contact;
            }
            $data['verified'] = false;
            $start = '1';
            $end = '';

            for ($i = 0; $i < $settings->otp - 1; $i++) {

                $start .= '0';
            }
            for ($i = 0; $i < $settings->otp; $i++) {

                $end .= '9';
            }
            $data['otp'] = rand(intval($start), intval($end));
            $data['code'] = Str::random(30);
            // return $start . ' ----- '. $end . ' ----- '.  $data['otp'];

            $otp = Otp::updateOrCreate(['contact' => $request->contact], $data);;

            //send code -- waiting for client's SMS gateway.

            $msg = (new SMS())->sendSms(substr($otp->contact, 1), 'Hello, thank you for using Plenty of Things, use this OTP ' . $otp->otp . ' This OTP is valid for 30 minutes.');
            $msg = 'Otp has been added';
            return response()->json(['success' => !!$otp, 'message' => $msg,  'otp' => $otp->otp]);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function show(Otp $otp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function edit(Otp $otp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Otp $otp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Otp $otp)
    {
        //
    }
}
