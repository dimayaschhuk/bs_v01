<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Mail;
use App\User;
use App\Models\Feedback;


class FeedbackController extends Controller {

    public function emailList() {
        $feedback = Feedback::all();

        return $feedback;
    }

    public function store(Request $request) {
        if(($request->title == '') || ($request->description == '')) {
            $data = array(
                'result'  => 2,
                'message' => 'Заполните все поля!',
                'type'    => 'error'
            );

            return $data;
        }

        $feedback = new Feedback;

        $feedback->user_id = Auth::id();
        $feedback->title = $request->title;
        $feedback->description = $request->description;

        if($feedback->save()) {
            Mail::send('mails.new_feedback', [
                'message_title' => $request->title, 
                'message_content' => $request->description], function ($m){
                $m->from('support@ampool.tech', 'AMpool.tech');

                $m->to('slp.devtech@gmail.com', 'Admin')->subject('New feedback');
            });

            $data = array(
                'result'  => 1,
                'message' => 'Фидбек успешно добавлен',
                'type'    => 'success'
            );

        } else {
            $data = array(
                'result'  => 2,
                'message' => 'Ошибка при добавлении фидбека',
                'type'    => 'error'
            );
        }

        return $data;
    }
}
