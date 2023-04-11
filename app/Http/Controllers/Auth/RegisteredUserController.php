<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        //validation form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//user variable, para llamar en la auth
       /* $user = */ User::create([
            'name' => $request->name, 
            'email' => $request->email,
            //bcrypt:se usa siempre
            'password' => bcrypt($request->password),
        ]);
/* ese user hace llamado a la variable de arriba, este de una lo manda logeado cuando register|
tambien debo importar el use Illuminate\Support\Facades\Auth;
    Auth::login($user); 
*/
            //otra opcion es

            return to_route('login')->with('status', 'se ha registrado correctamente');

    }
}
