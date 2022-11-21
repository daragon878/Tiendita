<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;;
use App\Models\Perfil;
use Illuminate\Support\Arr;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $UserLogin= Auth::user()->name;
        $idRolLogin= Auth::user()->idRol;
        $PerfilDescription= $this->GetPerfil($idRolLogin);
        $RolComany=$this->GetRolCompany($UserLogin);
        $input = Arr::except($RolComany,['Rugro']);
        return view('dashboard')->with(['perfil'=>$PerfilDescription->Description]);
    }

/*  
 return view('dashboard')->with(['perfil'=>$PerfilDescription->Description]);*/
    private function GetPerfil(string $idPerfil)
    {
        $Perfil = DB::table('perfil')->where('id',$idPerfil)->first();
        return $Perfil;
    }

    private function GetRolCompany(string $idRol)
    {
        $RolCompany = DB::select('SELECT compania.Rugro FROM users	inner join compania on users.idCompania= compania.id
        where users.name="'.$idRol.'"');
        return $RolCompany;
    }
/*$RolCompany = DB::table('users')
                        ->join('compania','users.idCompania','=','compania.id')
                        ->where('users.name','=',$idRol) ->get();
                         */
    private function GetCompania()
    {
        $Compania = DB::table('Compania')
                ->get();
        return  $Compania;
    }
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
