<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
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
    public function store(Request $request, UploadHelper $helper)
    {
        //
        $image = '';
        $msg = '';
        if (isset($request->id)) {
            $image = Image::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $image->delete();
                    $msg = 'Image has been deleted';
                    return response()->json(['success' => !!$image, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->product_id)) {
                        $image->product_id = $request->product_id;
                    }
                    if (isset($request->img)) {
                        $image->url = $helper->store($request->img);
                    }
                    $msg = 'Image has been updated';

                    $image->save();
                    return response()->json(['success' => !!$image, 'message' => $msg]);
                    break;
            }
        } else {
            $validator = Validator::make($request->all(), [
                "product_id" => "required",
                "img" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
            }
            $data = array();
            if (isset($request->product_id)) {
                $data['product_id'] = $request->product_id;
            }
            if (isset($request->img)) {
                $data['url'] = $helper->store($request->img);
            }
            $image = Image::create($data);
            $msg = 'Image has been added';
            return response()->json(['success' => !!$image, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
