<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $access = '';
        $msg = '';
        if (isset($request->id)) {
            $access = Access::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $access->delete();
                    $msg = 'Access has been deleted';
                    return response()->json(['success' => !!$access, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->inviter_id)) {
                        $access->inviter_id = $request->inviter_id;
                    }
                    if (isset($request->invitee_id)) {
                        $access->invitee_id = $request->invitee_id;
                    }
                    if (isset($request->invcode)) {
                        $access->invcode = $request->invcode;
                    }
                    $msg = 'Access has been updated';
                    $access->save();
                    return response()->json(['success' => !!$access, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->inviter_id)) {
                $data['inviter_id'] = $request->inviter_id;
            }
            if (isset($request->invitee_id)) {
                $data['invitee_id'] = $request->invitee_id;
            }
            if (isset($request->invcode)) {
                $data['invcode'] = $request->invcode;
            }
            $access = Access::create($data);
            $msg = 'Access has been added';
            return response()->json(['success' => !!$access, 'message' => $msg]);
        }
    }

    public function invite(Request $request)
    {
        $loggeduser = Auth::user();
        $validator = Validator::make($request->all(), [
            "invitation_code" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
        }
        $settings = Project::first();
        $user = User::where('invitation_code', $request->invitation_code)->first();
        if ($settings->currentinv < $settings->invlimit) {
            if ($user->invites < $settings->invperuser) {
                $data = array();
                $data['inviter_id'] = $user->id;
                $data['invitee_id'] = $loggeduser->id;
                $data['invcode'] = $request->invitation_code;
                $accessuser = Access::where('invitee_id', $loggeduser->id)->first();
                if ($accessuser != null) {
                    return response()->json(['error' => 'You have already been invited by another user.']);
                } else {
                    $access = Access::create($data);
                    $msg = 'You have been invited successfully! You now have access.';
                    $user->invites += 1;
                    $user->points += $settings->invitepts;
                    $settings->currentinv += 1;
                    $settings->save();
                    $user->save();

                    return response()->json(['success' => !!$access, 'message' => $msg]);
                }
            } else {
                return response()->json(['error' => 'This invitation code is not valid.']);
            }
        } else {
            return response()->json(['error' => 'Sorry, the Plenty Gold Access list is currently full.']);
        }
    }

    public function checkList(Request $request)
    {
        $settings = Project::first();

        return response()->json(['available' => $settings->currentinv < $settings->invlimit]);
    }

    public function checkAccess(Request $request)
    {
        $user = Auth::user();
        $access = Access::where('invitee_id', $user->id)->first();

        if ($access) {
            return response()->json(['available' => true]);
        } else {
            return response()->json(['available' => false]);
        }
    }

    public function info(Request $request)
    {
        $user = Auth::user();
        if (isset($request->user_id)) {
        } else {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy(Access $access)
    {
        //
    }
}
