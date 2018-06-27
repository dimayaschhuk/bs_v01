<?php

namespace App\Http\Controllers;

use App\Events\NewMessageAdded;
use App\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getchat(){
        $messages=Message::all();
        return view('chat.index',array(
            'messages'=>$messages,
        ));
    }

    public function post_messag(Request $request){

      $message= Message::create($request->all());
      event(
        new NewMessageAdded($message)
      );
       return redirect()->back();
    }
}
