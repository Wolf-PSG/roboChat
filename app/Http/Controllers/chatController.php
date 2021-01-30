<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Events\NewMessage;
class chatController extends Controller
{
    public function getAllMessages($id)
    {
        if (Rooms::where('id', $id)->exists()) {
            $chat = chat::where('room_id', $id)->orderBy('created_at', 'DESC')->get()->toJson(JSON_PRETTY_PRINT);

            return response(
                $chat
                , 200);
        } else {
            return response()->json([
                "message" => "Room not found",
            ], 404);
        }
    }

    public function createChat(Request $request, $id)
    {
        if (Rooms::where('id', $id)->exists()) {
            $chat = new chat;
            $chat->message = $request->message;
            $chat->name = $request->name;
            $chat->room_id = $id;
            $chat->save();

            broadcast(new NewMessage($chat))->toOthers();
            
            return response()->json([
                "message" => "message created",
            ], 201);
        } else {
            return response()->json([
                "message" => "Room not found",
            ], 404);
        }
    }

    //
    public function deleteMessage($id)
    {
        if (chat::where('id', $id)->exists()) {
            $chat = chat::find($id);
            $chat->delete();

            return response()->json([
                "message" => "records deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "message not found",
            ], 404);
        }
    }

    //****************May use later on ********** */

    // public function getChat($id) {
    //     if (chat::where('id', $id)->exists()) { //checks if message with id exists inside db
    //     $message = chat::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
    //     return response($message, 200);
    //   } else {
    //     return response()->json([
    //       "message" => "Room not found"
    //     ], 404);
    //   }
    // }

    // public function updateMe(Request $request, $id) {
    // if (chat::where('id', $id)->exists()) {
    // $message = chat::find($id);
    // $message->name = is_null($request->name) ? $message->name : $request->name;
    // gets the key from message of name and checks if the request is null for name if not change to request name
    // $message->save();
    //
    // return response()->json([
    // "message" => "records updated successfully"
    // ], 200);
    // } else {
    // return response()->json([
    // "message" => "Room not found"
    // ], 404);
    //
    // }
    //
    // }
}
