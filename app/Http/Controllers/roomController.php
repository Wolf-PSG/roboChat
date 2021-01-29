<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
class roomController extends Controller
{
    public function getAllRooms() {
    $room = Rooms::get()->toJson(JSON_PRETTY_PRINT);
    return response($room, 200);
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
        if (Rooms::where('id', $id)->exists()) { //checks if room with id exists inside db
        $room = Rooms::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($room, 200);
      } else {
        return response()->json([
          "message" => "Room not found"
        ], 404);
      }
    }

    public function updateRoom(Request $request, $id) {
        if (Rooms::where('id', $id)->exists()) {
            $room = Rooms::find($id);
            $room->name = is_null($request->name) ? $room->name : $request->name;
            // gets the key from room of name and checks if the request is null for name if not change to request name
            $room->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Room not found"
            ], 404);
        
        }

    }

    public function deleteRoom ($id) {
        if(Rooms::where('id', $id)->exists()) {
            $room = Rooms::find($id);
            $room->delete();

            return response()->json([
            "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
            "message" => "Room not found"
            ], 404);
        }
    }
}
