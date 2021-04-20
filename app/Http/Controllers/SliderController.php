<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $slider = Slider::where('isactive', 1)->with('shop');
        if (isset($request->shop_id)) {
            $slider = $slider->where('shop_id', $request->shop_id);
        } elseif (isset($request->location)) {
            $slider = $slider->where('location', $request->location);
        }
        return $slider->get();
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
        $user=Auth::user();
        if($user->typeofuser=='S'|| $user->typeofuser=='V'||$user->typeofuser=='A')
        {

            $slider = new Slider();
            if (isset($request->id))
                $slider = Slider::where('id', $request->id)->first();
    
            switch ($request->action) {
                case 'remove':
                    $slider->delete();
                    break;
    
                default:
                    $slider->url = $helper->store($request->file, 'slider');
                    if (isset($request->shop_id)) {
                        $slider->shop_id = $request->shop_id;
                    }
                    if (isset($request->location) && in_array($request->location, ["home", "shop"])) {
                        $slider->location = $request->location;
                    }
                    $slider->save();
                    
                    break;
            }
        }
        return response()->json(['error' =>'You don\'t have permission to access this resource'],400);

        return $slider;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
