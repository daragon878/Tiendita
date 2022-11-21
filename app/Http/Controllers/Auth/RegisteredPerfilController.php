<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Yajra\Datatables\Datatables;

class RegisteredPerfilController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function perfil()
    {
        return view('RegistrarPerfil');
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
        $perfil = Perfil::create([
        'Description' => $request->Descripcion
            ]);

        $perfil->save();
        return redirect('/dashboard'); 
    }
    
   
    public function getDataTable(Request $Request)
    {
        if($Request->ajax()){

           $UserSel= DB::select('select name ,password,id,idRol from users');
           return Datatables::of($UserSel)
           ->editColumn('idRol', function ($lineUser) {
                
            if ($lineUser->idRol=='1')
            {
                return 'Administrador';
            }else{
                return 'no administrador';
            }
            
            })
           ->addColumn('ops',function ($UserSel) {	           	        	    
            return "<a class='badge badge-info editar-producto' style='color: #fff;' href='javascript:return false'>EDITAR</a>
            <a class='badge badge-danger configurar-producto' style='color: #fff;' href='javascript:return false'>CARACTERISTICAS</a>";		
        })
        ->rawColumns(['ops','idRol'])
        ->make(true);
        }else{
            return view('ViewGetDataTable');
        }
    }
/*select users.name as name,users.password as password,users.id as id,users.email as email,compania.Razzon_Social as Razzon_Social from users
           inner join compania on users.idCompania = compania.id */
    

}
