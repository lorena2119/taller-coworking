<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponse;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::get();
        return $this->success($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request) {
        $room = Room::create($request->validated());
        return response()->json($room, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = Room::find($id);
        if ($result){
            return $this->success($result);
        }else{
            return $this->error("Todo mal, como no dijo el Pibe", 404, ['id' => 'No se encontró el id']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
