<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
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


        $style = '';
        $msg = '';
        if (isset($request->id)) {
            $style = Style::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $style->delete();
                    $msg = 'Style has been deleted';
                    return response()->json(['success' => !!$style, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->primary)) {
                        $style->primary = $request->primary;
                    }
                    if (isset($request->secondary)) {
                        $style->secondary = $request->secondary;
                    }
                    if (isset($request->posterimg)) {
                        $style->posterimg = $helper->store($request->posterimg, 'styles');
                    }
                    if (isset($request->brandheader)) {
                        $style->brandheader = $helper->store($request->brandheader, 'styles');
                    }
                    if (isset($request->backgroundimg)) {
                        $style->backgroundimg = $helper->store($request->backgroundimg, 'styles');
                    }
                    if (isset($request->banner)) {
                        $style->banner = $helper->store($request->banner, 'styles');
                    }
                    if (isset($request->backgroundvid)) {
                        $style->backgroundvid = $helper->store($request->backgroundvid, 'styles');
                    }
                    if (isset($request->shop_id)) {
                        $style->shop_id = $request->shop_id;
                    }
                    if (isset($request->textcolor1)) {
                        $style->textcolor1 = $request->textcolor1;
                    }
                    if (isset($request->textcolor2)) {
                        $style->textcolor2 = $request->textcolor2;
                    }
                    if (isset($request->textcolor3)) {
                        $style->textcolor3 = $request->textcolor3;
                    }
                    if (isset($request->textcolor4)) {
                        $style->textcolor4 = $request->textcolor4;
                    }
                    $msg = 'Style has been updated';

                    $style->save();
                    return response()->json(['success' => !!$style, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->primary)) {
                $data['primary'] = $request->primary;
            }
            if (isset($request->secondary)) {
                $data['secondary'] = $request->secondary;
            }
            if (isset($request->posterimg)) {
                $data['posterimg'] = $helper->store($request->posterimg, 'styles');
            }
            if (isset($request->brandheader)) {
                $data['brandheader'] = $helper->store($request->brandheader, 'styles');
            }
            if (isset($request->backgroundimg)) {
                $data['backgroundimg'] = $helper->store($request->backgroundimg, 'styles');
            }
            if (isset($request->banner)) {
                $data['banner'] = $helper->store($request->banner, 'styles');
            }
            if (isset($request->backgroundvid)) {
                $data['backgroundvid'] = $helper->store($request->backgroundvid, 'styles');
            }
            if (isset($request->shop_id)) {
                $data['shop_id'] = $request->shop_id;
            }
            if (isset($request->textcolor1)) {
                $data['textcolor1'] = $request->textcolor1;
            }
            if (isset($request->textcolor2)) {
                $data['textcolor2'] = $request->textcolor2;
            }
            if (isset($request->textcolor3)) {
                $data['textcolor3'] = $request->textcolor3;
            }
            if (isset($request->textcolor4)) {
                $data['textcolor4'] = $request->textcolor4;
            }
            $style = Style::create($data);
            $msg = 'Style has been added';
            return response()->json(['success' => !!$style, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        //
    }
}
