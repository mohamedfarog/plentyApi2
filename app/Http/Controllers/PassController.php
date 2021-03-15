<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Pass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDO;
use Thenextweb\PassGenerator;

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

    public function registerDevice($deviceLibraryIdentifier, $passTypeIdentifier, $serialNumber, Request $request)
    {
        $pass = Pass::where('deviceLibraryIdentifier', $deviceLibraryIdentifier)->where('serialNumber', $serialNumber)->first();
        if ($pass) {
            return response()->json(['error' => 'This pass is already registered with the same device'], 200);
        } else {
            $arr = array();
            $arr['pushToken'] = $request->pushToken;
            $arr['deviceLibraryIdentifier'] = $deviceLibraryIdentifier;
            $arr['passTypeIdentifier'] = $passTypeIdentifier;
            $arr['serialNumber'] = $serialNumber;
            $cpass = Pass::create($arr);

            return response()->json(['success' => !!$cpass, 'message' => 'Device successfully registered!'], 201);
        }
    }

    public function getPasses($deviceLibraryIdentifier, $passTypeIdentifier, Request $request)
    {
        $serials = array();
        if (isset($request->passesUpdatedSince)) {
            //
            if ($request->passesUpdatedSince != null) {

                $passes = Pass::where('deviceLibraryIdentifier', $deviceLibraryIdentifier)->where('passesUpdatedSince', ">=", $request->passesUpdatedSince)->get();
                if (count($passes) > 0) {
                    foreach ($passes as $pass) {
                        array_push($serials, $pass->serialNumber);
                    }

                    return new Response(['lastUpdated' => $passes[0]->passesUpdatedSince, 'serialNumbers' => $serials], 200, [
                        'Content-Type' => 'application/json',
                        'Pragma' => 'no-cache',
                    ]);
                } else {
                    return response()->json(['message' => 'No passes registered with this device.'], 204);
                }
            } else {
                $passes = Pass::where('deviceLibraryIdentifier', $deviceLibraryIdentifier)->get();
                if (count($passes) > 0) {
                    foreach ($passes as $pass) {
                        array_push($serials, $pass->serialNumber);
                    }

                    return new Response(['lastUpdated' => $passes[0]->passesUpdatedSince, 'serialNumbers' => $serials], 200, [
                        
                        'Content-Type' => 'application/json',
                        'Pragma' => 'no-cache',
                    ]);
                } else {
                    return response()->json(['message' => 'No passes registered with this device.'], 204);
                }
            }
        } else {
            $passes = Pass::where('deviceLibraryIdentifier', $deviceLibraryIdentifier)->get();
            if (count($passes) > 0) {
                foreach ($passes as $pass) {
                    array_push($serials, $pass->serialNumber);
                }

                return new Response(['lastUpdated' => $passes[0]->passesUpdatedSince, 'serialNumbers' => $serials], 200, [
                   
                    'Content-Type' => 'application/json',
                    'Pragma' => 'no-cache',
                ]);
            } else {
                return response()->json(['message' => 'No passes registered with this device.'], 204);
            }
        }
    }
    public function getPass($passTypeIdentifier, $serialNumber)
    {
        $pkpass = PassGenerator::getPass($serialNumber);

        $pass = Pass::where('serialNumber', $serialNumber)->first();
        $arr = array();
        if ($pass) {
            if ($pass->passesUpdatedSince == null) {
                return response()->json(['message' => 'No changed passes available.'], 304);
            } else {
                // if($pass->passesUpdatedSince == null)


                if (Carbon::parse($pass->passesUpdatedSince)->lt(Carbon::now())) {
                    return response()->json(['message' => 'No changed passes available.'], 304);
                } else {
                    return new Response($pkpass, 200, [
                        'Content-Transfer-Encoding' => 'binary',
                        'Content-Description' => 'File Transfer',
                        'Content-Disposition' => 'attachment; filename="pass.pkpass"',
                        'Content-length' => strlen($pkpass),
                        "Last-Modified" => $pass->passesUpdatedSince,
                        'Content-Type' => PassGenerator::getPassMimeType(),
                        'Pragma' => 'no-cache',
                    ]);
                }
            }
        } else {
            return response()->json(['message' => 'No passes were found.'], 400);
        }
    }

    public function deletePass($deviceLibraryIdentifier, $passTypeIdentifier, $serialNumber)
    {
        $delpass = Pass::where('deviceLibraryIdentifier', $deviceLibraryIdentifier)->delete();
        return response()->json(['success' => !!$delpass, 'message' => "Unregistered!"], 200);
    }

    public function logIt(Request $request)
    {
        $log = '';
        if (isset($request->logs)) {
            foreach ($request->logs as $msg) {
                $arr = array();

                $arr['message'] = $msg;
                $arr['action'] = 'insert';
                $arr['user'] = 'ApplePass';
                $log = Log::create($arr);
            }
        }


        return response()->json(['success' => !!$log], 200);
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
