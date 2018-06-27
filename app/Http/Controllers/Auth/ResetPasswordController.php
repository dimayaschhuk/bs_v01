<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller {
    // In PasswordsController 
    use ResetsPasswords;

    protected $redirectTo = '/';
    
    public function __construct() {

    }

    public function getReset($token = null) {
        if (is_null($token))
        {
            throw new NotFoundHttpException;    
        }


        return view('auth.password.reset')->with('token', $token);
    }
}
