<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Compania;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class RegisteredCompanyController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function Compania()
    {
        return view('RegistrarCompania');
    }

    private function GetCompania()
    {
        $Compania = DB::table('Compania')
                ->get();
        return  $Compania;
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
        $Compania = Compania::create([
            'Ruc' => $request->ruc,
            'Razzon_Social' => $request->Razzon_Social,
            'Sucursal' => $request->Sucursal,
            'Direccion' => $request->Direccion,
            'Num_Telefono' => $request->Telefono,
            'Correo' => $request->Rugro,
            'Rugro' => $request->Rugro
            ]);
            $Compania->save();
            return redirect('/dashboard');  

    }
/*$Compania = Compania::create([
        'Ruc' => $request->ruc,
        'Razzon_Social' => $request->Razzon_Social,
        'Sucursal' => $request->Sucursal,
        'Direccion' => $request->Direccion,
        'Num_Telefono' => $request->Telefono,
        'Correo' => $request->Rugro,
        'Rugro' => $request->Rugro
        ]);
        $Compania->save();
        return redirect('/dashboard');   
        */


}
