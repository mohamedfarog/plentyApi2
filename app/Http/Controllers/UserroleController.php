<?php

namespace App\Http\Controllers;

use App\Models\Userrole;
use Illuminate\Http\Request;

class UserroleController extends Controller
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
        $userrole = '';
        $msg = '';
        if (isset($request->id)) {
            $userrole = Userrole::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $userrole->delete();
                    $msg = 'Userrole has been deleted';
                    return response()->json(['success' => !!$userrole, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->user_id)) {
                        $userrole->user_id = $request->user_id;
                    }
                    if (isset($request->role_id)) {
                        $userrole->role_id = $request->role_id;
                    }
                    $msg = 'Userrole has been updated';

                    $userrole->save();
                    return response()->json(['success' => !!$userrole, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->user_id)) {
                $data['user_id'] = $request->user_id;
            }
            if (isset($request->role_id)) {
                $data['role_id'] = $request->role_id;
            }
            $userrole = Userrole::create($data);
            $msg = 'Userrole has been added';
            return response()->json(['success' => !!$userrole, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function show(Userrole $userrole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function edit(Userrole $userrole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userrole $userrole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userrole $userrole)
    {
        //
    }
}
