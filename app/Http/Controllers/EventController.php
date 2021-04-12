<?php

namespace App\Http\Controllers;

use App\Actions\UploadHelper;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $events = Event::with(['categories'])->paginate();

        return $events;
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
        $event = '';
        $msg = '';
        if (isset($request->id)) {
            $event = Event::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $event->delete();
                    $msg = 'Event has been deleted';
                    return response()->json(['success' => !!$event, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->name_en)) {
                        $event->name_en = $request->name_en;
                    }
                    if (isset($request->name_ar)) {
                        $event->name_ar = $request->name_ar;
                    }
                    if (isset($request->desc_en)) {
                        $event->desc_en = $request->desc_en;
                    }
                    if (isset($request->desc_ar)) {
                        $event->desc_ar = $request->desc_ar;
                    }
                    if (isset($request->image)) {
                        $event->image = $helper->store($request->image,'events');
                    }
                    if (isset($request->video)) {
                        $event->video = $helper->store($request->video,'events');
                    }
                    if (isset($request->start)) {
                        $event->start = $request->start;
                    }
                    if (isset($request->end)) {
                        $event->end = $request->end;
                    }
                    $msg = 'Event has been updated';

                    $event->save();
                    return response()->json(['success' => !!$event, 'message' => $msg]);
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
            if (isset($request->image)) {
                $data['image'] = $helper->store($request->image,'events');
            }
            if (isset($request->video)) {
                $data['video'] = $helper->store($request->video,'events');
            }
            if (isset($request->start)) {
                $data['start'] = $request->start;
            }
            if (isset($request->end)) {
                $data['end'] = $request->end;
            }
            $event = Event::create($data);
            $msg = 'Event has been added';
            return response()->json(['success' => !!$event, 'message' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
