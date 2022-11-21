<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        $Compania = $this->GetCompania();
        $Perfil = $this->Getperfil();

        return view('auth.register',['Compania'=> $Compania,
        'Perfil'=> $Perfil ]);
    }
    public function createUser()
    {
        $Compania = $this->GetCompania();
        $Perfil = $this->Getperfil();

        return view('RegistrarUsuaio',['Compania'=> $Compania,
        'Perfil'=> $Perfil ]);
    }
    
    private function GetCompania()
    {
        $Compania = DB::table('Compania')
                ->get();
        return  $Compania;
    }

    private function Getperfil()
    {
        $rol = DB::table('perfil')
                ->get();
        return  $rol;
    }
    public function store2(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

   $user = User::createUser([
       'name' => $request->name,
       'email' => $request->email,
       'password' => Hash::make($request->password),
       'idCompania'=>  $request->empresa,
       'idRol'=> $request->rol
   ]);
   event(new Registered($user));
   $user->save();
   return redirect('/dashboard');   
    }




    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

   $user = User::create([
       'name' => $request->name,
       'email' => $request->email,
       'password' => Hash::make($request->password),
       'idCompania'=>  $request->empresa,
       'idRol'=> $request->rol
   ]);
   event(new Registered($user));
   $user->save();
   return redirect('/dashboard');   
    }
}
