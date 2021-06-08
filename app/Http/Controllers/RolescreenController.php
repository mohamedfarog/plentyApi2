<?php

namespace App\Http\Controllers;

use App\Models\Rolescreen;
use Illuminate\Http\Request;

class RolescreenController extends Controller
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
        $rolescreen = '';
        $msg = '';
        if (isset($request->id)) {
            $rolescreen = Rolescreen::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $rolescreen->delete();
                    $msg = 'Rolescreen has been deleted';
                    return response()->json(['success' => !!$rolescreen, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name)) {
                        $rolescreen->name = $request->name;
                    }
                    if (isset($request->create_permission)) {
                        $rolescreen->create_permission = $request->create_permission;
                    }
                    if (isset($request->read_permission)) {
                        $rolescreen->read_permission = $request->read_permission;
                    }
                    if (isset($request->update_permission)) {
                        $rolescreen->update_permission = $request->update_permission;
                    }
                    if (isset($request->delete_permission)) {
                        $rolescreen->delete_permission = $request->delete_permission;
                    }
                    if (isset($request->role_id)) {
                        $rolescreen->role_id = $request->role_id;
                    }
                    $msg = 'Rolescreen has been updated';

                    $rolescreen->save();
                    return response()->json(['success' => !!$rolescreen, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->name)) {
                $data['name'] = $request->name;
            }
            if (isset($request->create_permission)) {
                $data['create_permission'] = $request->create_permission;
            }
            if (isset($request->read_permission)) {
                $data['read_permission'] = $request->read_permission;
            }
            if (isset($request->update_permission)) {
                $data['update_permission'] = $request->update_permission;
            }
            if (isset($request->delete_permission)) {
                $data['delete_permission'] = $request->delete_permission;
            }
            if (isset($request->role_id)) {
                $data['role_id'] = $request->role_id;
            }
            $rolescreen = Rolescreen::create($data);
            $msg = 'Rolescreen has been added';
            return response()->json(['success' => !!$rolescreen, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rolescreen  $rolescreen
     * @return \Illuminate\Http\Response
     */
    public function show(Rolescreen $rolescreen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rolescreen  $rolescreen
     * @return \Illuminate\Http\Response
     */
    public function edit(Rolescreen $rolescreen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rolescreen  $rolescreen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rolescreen $rolescreen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rolescreen  $rolescreen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rolescreen $rolescreen)
    {
        //
    }
}
