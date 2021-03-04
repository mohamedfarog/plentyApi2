<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
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
        $user = Auth::user();
        $support = '';
        $msg = '';
        if (isset($request->id)) {
            $support = Support::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $support->delete();
                    $msg = 'Support has been deleted';
                    return response()->json(['success' => !!$support, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->title)) {
                        $support->title = $request->title;
                    }
                    if (isset($request->type)) {
                        $support->type = $request->type;
                    }
                    if (isset($request->priority)) {
                        $support->priority = $request->priority;
                    }
                    if (isset($request->description)) {
                        $support->description = $request->description;
                    }
                    if (isset($request->status)) {
                        $support->status = $request->status;
                    }
                    $msg = 'Support has been updated';

                    $support->save();
                    return response()->json(['success' => !!$support, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->title)) {
                $data['title'] = $request->title;
            }
            if (isset($request->type)) {
                $data['type'] = $request->type;
            }
            if (isset($request->priority)) {
                $data['priority'] = $request->priority;
            }
            if (isset($request->description)) {
                $data['description'] = $request->description;
            }
            if (isset($request->status)) {
                $data['status'] = $request->status;
            }
            $data['user_id'] = $user->id;
            $support = Support::create($data);

            $suppordet = Support::with(['user'])->where('id', $support->id)->first();
            $this->sendMail('support',$suppordet,'Plenty Support Request', 'Plenty User', 'noreply@plentyapp.mvp-apps.ae');
            $msg = 'Support has been added';
            return response()->json(['success' => !!$support, 'message' => $msg]);
        }
    }

    function sendMail($view, $data, $subject, $displayname, $to)
    {
        Mail::send($view, ["data"=>$data], function ($m) use ($data, $subject, $displayname,$to) {
            if ($data->user) {

                $m->from($data->user->email, $displayname);
            } else {
                $m->from($data->email, $displayname);
            }
            $m->to($to)->subject($subject);
        });
    }

    public function sendWhatsapp(Request $request)
    {
        $settings = Project::first();

        return response()->json(['whatsapp' => $settings->whatsapp]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }
}
