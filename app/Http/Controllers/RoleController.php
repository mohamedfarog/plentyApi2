<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Rolescreen;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = 15;
        $col = 'id';
        $sort = 'DESC';
        if(isset($request->per_page)){
            $perpage = $request->per_page;
        }
        if(isset($request->sort_col)){
            $col = $request->sort_col;
        }
        if(isset($request->sort)){
            $sort = $request->sort;
        }


        return response()->json(['roles'=>Role::with(['screens'])->orderBy($col,$sort)->get(), 'sort'=>$sort, 'col'=>$col ]);
        
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
        $role = '';
        $msg = '';
        if (isset($request->id)) {
            $role = Role::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $role->delete();
                    $msg = 'Role has been deleted';
                    return response()->json(['success' => !!$role, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $role->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $role->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $role->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $role->desc_ar = $request->desc_ar;
                    }
                    $msg = 'Role has been updated';

                    $role->save();
                    $newrole = Role::with(['screens'])->find($role->id);
                    return response()->json(['success' => !!$role, 'message' => $msg, 'role' => $role]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->name_en)) {
                $data['name_en'] = $request->name_en;
            }
            if (isset($request->name_ar)) {
                $data['name_ar'] = $request->name_ar;
            }
            if (isset($request->desc_en)) {
                $data['desc_en'] = $request->desc_en;
            }
            if (isset($request->desc_ar)) {
                $data['desc_ar'] = $request->desc_ar;
            }
            $role = Role::create($data);
            if(isset($request->screens)){
                foreach($request->screens as $screen){
                    $arr = array();
                    if(isset($screen['name'])){
                        $arr['name'] = $screen['name'];
                    }
                    if(isset($screen['create_permission'])){
                        $arr['create_permission'] = $screen['create_permission'];
                    }
                    if(isset($screen['update_permission'])){
                        $arr['update_permission'] = $screen['update_permission'];
                    }
                    if(isset($screen['delete_permission'])){
                        $arr['delete_permission'] = $screen['delete_permission'];
                    }
                    if(isset($screen['read_permission'])){
                        $arr['read_permission'] = $screen['read_permission'];
                    }

                    
                    $arr['role_id'] = $role->id;
                    Rolescreen::create($arr);
                }
            }
            $newrole = Role::with(['screens'])->find($role->id);
            $msg = 'Role has been added';
            return response()->json(['success' => !!$newrole, 'message' => $msg, 'role'=>$newrole]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
