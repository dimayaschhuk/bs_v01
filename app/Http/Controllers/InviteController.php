<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Invite;
use Illuminate\Http\Request;
use Auth;

class InviteController extends Controller {
  /**
   *
   * Метод возвращает view с формой создания инвайта
   *
   */
    public function create() {
        return view('invite.create');
    }

  /**
   * Метод обрабатывает сохранение формы инвайта
   *
   * @param Request $request
   */
    public function store(Request $request) {
        //валидируем поле email: поле обязательное, с проверкой синтаксиса email,
        //к тому же уникальное по таблицам invites и users (столбец email)
        $this->validate($request, ['email' => 'required|email|unique:invites,email|unique:users,email']);
        $email = $request->get('email');
        $message = $request->get('message');
        //создадим новый инвайт и заполним поля email и id отправителя
        $inviter = Auth::user();
        $invite = new Invite(['email' => $email]);
        $invite->inviter_id = $inviter->id;
        $invite->invitee_id = 0;
        $invite->save();
        //вызовем метод отправки приглашения, реализованный в модели Invite
        $invite->sendInvitation($message);
        //выведем на экран сообщение, что инвайт успешно отправлен
        \Session::flash('status_message', 'Invite has being created and sent to ' .$email);
        //и вернем пользователя на страницу с формой инвайта
        return redirect('invite');
    }

  /**
   * Метод возвращает view для тех, у кого нет инвайта
   */
    public function invitesonly() {
        return view('invite.invitesonly');
    }

  /**
   * Конструктор
   *  - добавим Auth middleware, который позволяет нам легко и просто запретить доступ
   *    неавторизованным пользователям
   *  - и тут же добавим исключение: метод invitesonly() должен быть доступен всем.
   */
    public function __construct() {
        $this->middleware('auth', ['except' => 'invitesonly']);
    }
}