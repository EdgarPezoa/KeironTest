<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // CUSTOM LOGIN
    protected function redirectTo(){
        $return = '/';
        if(Auth::check()){
            $user = Auth::user();
            if($user->tipo_usuario == 1){
                $return = "/usuario";
            }else if($user->tipo_usuario == 2){
                $return = "/administrador";
            }
        }
        return $return;
    }
}
