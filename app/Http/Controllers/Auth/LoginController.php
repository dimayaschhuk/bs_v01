<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\UserLogin;

class LoginController extends Controller {


    public function index() {
        return view('auth/login');
    }



    public function showLoginForm() {
        if(Auth::check()) {
            return redirect()->intended('/');
        } else {
            return view('auth/login');
        }
    }

    public function login(Request $request) {

        $name = $request['name'];


        if (strpos($name, '@') == false) {
            $login = 'login';
        } else {
            $login = 'email';
        }

        if (Auth::attempt([$login => $name, 'password' => $request['password']])) {
            // Аутентификация успешна...
            return "sss";

        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->intended('login');
    }
}