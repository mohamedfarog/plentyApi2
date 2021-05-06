<?php

namespace App\Http\Controllers;

use App\Models\TableCapacity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TableCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if($user){
            return TableCapacity::get();
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableCapacity  $tableCapacity
     * @return \Illuminate\Http\Response
     */
    public function show(TableCapacity $tableCapacity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableCapacity  $tableCapacity
     * @return \Illuminate\Http\Response
     */
    public function edit(TableCapacity $tableCapacity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableCapacity  $tableCapacity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableCapacity $tableCapacity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableCapacity  $tableCapacity
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableCapacity $tableCapacity)
    {
        //
    }
}
