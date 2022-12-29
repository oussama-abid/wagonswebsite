<?php

namespace App\Http\Controllers;

use App\Models\relation;
use App\Http\Requests\StorerelationRequest;
use App\Http\Requests\UpdaterelationRequest;

class RelationController extends Controller
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
     * @param  \App\Http\Requests\StorerelationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerelationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function show(relation $relation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function edit(relation $relation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterelationRequest  $request
     * @param  \App\Models\relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterelationRequest $request, relation $relation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\relation  $relation
     * @return \Illuminate\Http\Response
     */
    public function destroy(relation $relation)
    {
        //
    }
}
