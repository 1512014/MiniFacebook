<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getNewMessages(Request $request){
//        $request_data = json_decode($request->getContent(), true);
        $request_data = $request->all();
        $user_id = $request_data['user_id'];
        $current_user_id = Auth::user()->id;
        $messages = Message::whereIn('sent_user', [$user_id, $current_user_id])
            ->whereIn('received_user', [$user_id, $current_user_id])
            ->orderBy('id', 'asc')
            ->get();
        echo json_encode($messages);
        die;
    }

    public function getNewGroupMessages(Request $request){
        $request_data = $request->all();
        $group_id = $request_data['group_id'];
        $messages = Message::where('group_id', $group_id)
            ->where('received_user', 0)
            ->orderBy('id', 'asc')
            ->get();
        foreach ($messages as $message){
            $message['sent_user_data'] = User::findOrFail($message->sent_user);
        }
        echo json_encode($messages);
    }

    public function addNewMessage(Request $request){

        $input = json_decode($request->getContent(), true);
        $input['sent_user'] = Auth::user()->id;
        Message::create($input);
        echo json_encode($input);
        die;
    }

    public static function getGroupMessages($group_id){
        $messages = Message::where('received_user', 0)->where('group_id', $group_id)->orderBy('id', 'asc')->get();
        foreach ($messages as $message){
            $message['sent_user_data'] = User::findOrFail($message->sent_user);
        }
        return $messages;
    }
}
