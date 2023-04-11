<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticathedSessionController extends Controller
{
    public function store(Request $request){
        
           $credentials = $request->validate([
//aqui ponemos lo que requieren para validar
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ( ! Auth::attempt($credentials, $request->boolean('remember'))){
           throw ValidationException::withMessages([
            'email' => __('auth.failed')

           ]);
        }
           
        $request->session()->regenerate();

        return redirect()->intended()->with('status', 'has iniciado seccion correctamente');
    
    }

    public function destroy(Request $request){

       
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'ha cerrado cession ');

    }
    
}
        
