<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Tier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiers = Tier::orderBy('requirement', 'asc')->get();
        return $tiers;
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
    public function store(Request $request, UploadHelper $helper)
    {

        $tier = '';
        $msg = '';
        if (isset($request->id)) {
            $tier = Tier::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $tier->delete();
                    $msg = 'Tier has been deleted';
                    return response()->json(['success' => !!$tier, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name)) {
                        $tier->name = $request->name;
                    }
                    if (isset($request->threshold)) {
                        $tier->threshold = $request->threshold;
                    }
                    if (isset($request->value)) {
                        $tier->value = $request->value;
                    }
                    if (isset($request->acquisition)) {
                        $tier->acquisition = $request->acquisition;
                    }
                    if (isset($request->requirement)) {
                        $tier->requirement = $request->requirement;
                    }
                    if (isset($request->badge)) {
                        $tier->badge = $request->badge;
                    }
                    $msg = 'Tier has been updated';

                    $tier->save();
                    return response()->json(['success' => !!$tier, 'message' => $msg]);
                    break;
            }
        } else {

            $validator = Validator::make($request->all(), [
                "name" => "required",
                "acquisition" => "required",
                "requirement" => "required",
                "value" => "required",
                "badge" => "required",

            ]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
            }
            $data = array();
            if (isset($request->name)) {
                $data['name'] = $request->name;
            }
            if (isset($request->threshold)) {
                $data['threshold'] = $request->threshold;
            }
            if (isset($request->value)) {
                $data['value'] = $request->value;
            }
            if (isset($request->acquisition)) {
                $data['acquisition'] = $request->acquisition;
            }
            if (isset($request->requirement)) {
                $data['requirement'] = $request->requirement;
            }
            if (isset($request->badge)) {
                $data['badge'] = $helper->store($request->badge, 'tier');
            }
            $tiercheck = Tier::where('requirement', $request->requirement)->first();
            if ($tiercheck) {
                $tier = false;
                $msg = 'The tier with '. $request->requirement . ' is already in the system.';
                return response()->json(['success' => $tier, 'message' => $msg]);
            } else {
                $tier = Tier::create($data);
                $msg = 'Tier has been added';
            }


            return response()->json(['success' => !!$tier, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function show(Tier $tier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function edit(Tier $tier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tier $tier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tier $tier)
    {
        //
    }
}
