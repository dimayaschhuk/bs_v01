<?

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\Invite;
use App\User;
use Carbon\Carbon;

class AuthController extends Controller {
  use AuthenticatesAndRegistersUsers;

  /**
   * Create a new authentication controller instance.
   *
   * @param  \Illuminate\Contracts\Auth\Guard  $auth
   * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
   * @return void
   */
    public function __construct(Guard $auth, Registrar $registrar) {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->middleware('guest', ['except' => 'getLogout']);
        //добавим контроллеру наш middleware, но только для функционала регистрации
        //то есть для вызовов getRegister и postRegister
        $this->middleware('invite', ['only' => ['getRegister', 'postRegister']]);
    }

  /**
   * Переопределяем функцию из трейта AuthenticatesAndRegistersUsers
   *
   * Handle a registration request for the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
    public function postRegister(Request $request) {
    //это код из оригинальной функции трейта
        $validator = $this->registrar->validator($request->all());
        if ($validator->fails()) {
          $this->throwValidationException(
            $request, $validator
          );
        }
        $this->auth->login($this->registrar->create($request->all()));
        //а этот код мы добавляем:
        //получаем объект авторизованного пользователя
        //и обновляем данные об инвайте:
        //   - сохраняем id приглашенного пользователя
        //   - помечаем инвайт как использованный
        $invite = Invite::where('code', $request->input('code'))->first();
        $user = $this->auth->user();
        $invite->invitee_id = $user->id;
        $invite->claimed = Carbon::now();
        $invite->save();    
        return redirect($this->redirectPath());
    }
}