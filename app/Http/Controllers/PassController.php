<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use Illuminate\Http\Request;

class PassController extends Controller
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

        $pass = '';
        $msg = '';
        if (isset($request->id)) {
            $pass = Pass::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $pass->delete();
                    $msg = 'Pass has been deleted';
                    return response()->json(['success' => !!$pass, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->deviceLibraryIdentifier)) {
                        $pass->deviceLibraryIdentifier = $request->deviceLibraryIdentifier;
                    }
                    if (isset($request->passTypeIdentifier)) {
                        $pass->passTypeIdentifier = $request->passTypeIdentifier;
                    }
                    if (isset($request->passesUpdatedSince)) {
                        $pass->passesUpdatedSince = $request->passesUpdatedSince;
                    }
                    if (isset($request->serialNumber)) {
                        $pass->serialNumber = $request->serialNumber;
                    }
                    if (isset($request->pushToken)) {
                        $pass->pushToken = $request->pushToken;
                    }
                    if (isset($request->updateTag)) {
                        $pass->updateTag = $request->updateTag;
                    }
                    $msg = 'Pass has been updated';

                    $pass->save();
                    return response()->json(['success' => !!$pass, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->deviceLibraryIdentifier)) {
                $data['deviceLibraryIdentifier'] = $request->deviceLibraryIdentifier;
            }
            if (isset($request->passTypeIdentifier)) {
                $data['passTypeIdentifier'] = $request->passTypeIdentifier;
            }
            if (isset($request->passesUpdatedSince)) {
                $data['passesUpdatedSince'] = $request->passesUpdatedSince;
            }
            if (isset($request->serialNumber)) {
                $data['serialNumber'] = $request->serialNumber;
            }
            if (isset($request->pushToken)) {
                $data['pushToken'] = $request->pushToken;
            }
            if (isset($request->updateTag)) {
                $data['updateTag'] = $request->updateTag;
            }
            $pass = Pass::create($data);
            $msg = 'Pass has been added';
            return response()->json(['success' => !!$pass, 'message' => $msg]);
        }
    }

    public function registerDevice(Type $var = null)
    {
        # code...
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pass  $pass
     * @return \Illuminate\Http\Response
     */
    public function show(Pass $pass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pass  $pass
     * @return \Illuminate\Http\Response
     */
    public function edit(Pass $pass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pass  $pass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pass $pass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pass  $pass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pass $pass)
    {
        //
    }
}
