<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreroomTypeRequest;
use App\Http\Requests\UpdateroomTypeRequest;
use App\Models\roomType;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreroomTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(roomType $roomType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateroomTypeRequest $request, roomType $roomType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(roomType $roomType)
    {
        //
    }
}
