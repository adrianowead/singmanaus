<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Verifica o token de lembrar login
     */
    public function loginViaRemember()
    {
        if(Auth::viaRemember()) return redirect()->route('dashboard');

        return view('login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if($request->method() == 'GET') return redirect()->route('login');

        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials, $request->input('remember'))) {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Sair
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
