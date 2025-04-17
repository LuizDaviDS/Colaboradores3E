<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        $authenticated = Auth::attempt($credentials);

        if (!$authenticated) {
            return redirect()->route('login.index')->withErrors([
                'email' => 'Email ou senha inválidos.'
            ]);
        } else {
            $request->session()->regenerate(); // Regenera a sessão para evitar ataques de fixação de sessão (só pra lembrar)
            return redirect()->intended('dashboard');
        }

    }
    
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Logout realizado com sucesso.');
    }
}
