<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $tags = Tag::where('active', 1)->whereNull('deleted_at')->get();
        if(isset($request->search)){
            $tags = Tag::where('active', 1)->whereNull('deleted_at')->where('tag','LIKE',"%" .$request->search."%")->get();
        }
        return $tags;
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

        $tag = '';
        $msg = '';
        if (isset($request->id)) {
            $tag = Tag::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $tag->delete();
                    $msg = 'Tag has been deleted';
                    return response()->json(['success' => !!$tag, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->tag)) {
                        $tag->tag = $request->tag;
                    }
                    if (isset($request->deleted_at)) {
                        $tag->deleted_at = $request->deleted_at;
                    }
                    if (isset($request->active)) {
                        $tag->active = $request->active;
                    }
                    $msg = 'Tag has been updated';

                    $tag->save();
                    return response()->json(['success' => !!$tag, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->tag)) {
                $data['tag'] = $request->tag;
            }
            if (isset($request->deleted_at)) {
                $data['deleted_at'] = $request->deleted_at;
            }
            if (isset($request->active)) {
                $data['active'] = $request->active;
            }
            $checktag= Tag::where('tag' ,$request->tag)->first();
      
            if($checktag){
                $tag= $checktag;
                $msg = 'Tag has been retrieved';
            }else{
                $tag = Tag::create($data);
                $msg = 'Tag has been added';
            }
            
            return response()->json(['success' => !!$tag, 'message' => $msg, 'tag'=>$tag]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
