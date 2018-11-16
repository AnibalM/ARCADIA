<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['Email'=> $request->email, 'password' => $request->password]))
        {
            if (Auth::user()->ADMIN == 1)
            {
                return redirect('dashboard-admin');
            }
            else
            {
                return redirect('dashboard-docente');
            }
        }
        else
        {
            $msg = "Usuario y/o Contraseña incorrecta";
            return view('auth.login', compact('msg'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return view('auth.login');
    }
}
