<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $remember = $request->filled('remember');
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            activity('user')
                ->causedBy(Auth::user())
                ->event('login')
                ->log('Se ha iniciado la sesión de usuario');
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        activity('user')
            ->causedBy(Auth::user())
            ->event('logout')
            ->log('Se ha cerrado la sesión de usuario');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');
    }
}
