<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
class roomController extends Controller
{
    public function getAllRooms() {

    }

    public function createRoom(Request $request) {
        $room = new Rooms;
        $room-> name = $request->name;
        $room->save();

        return response()->json([
            "message" => "room created"
        ], 201);
    }

    public function getRoom($id) {
    }

    public function updateRoom(Request $request, $id) {
    }

    public function deleteRoom ($id) {
    }
}
