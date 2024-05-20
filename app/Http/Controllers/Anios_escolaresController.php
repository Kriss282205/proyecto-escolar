<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Anios_escolaresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function lista_anios_escolares()
    {   
        $anios_escolares = DB::table('anios_escolares')
        ->where('eliminado_anio_escolar', '=', '0')
        ->get();
        return view('anios_escolares/index', compact('anios_escolares'));
    }


    public function crear()
    {
        $anios_escolares = DB::table('anios_escolares')
        ->where('estado_anio_escolar', '=', '1')
        ->where('eliminado_anio_escolar', '=', '0')
        ->get();
        return view('anios_escolares/crear', compact('anios_escolares'));
    }



    public function guardar(Request $request)
    {
        DB::table('anios_escolares')->insert([
            'anio_escolar' => $request->anio_escolar,
            
        ]);
        return redirect('anios_escolares');
    }

    public function editar($id_anio_escolar)
    { 
        $anio_escolar = DB::table('anios_escolares')
        ->where('id_anio_escolar', $id_anio_escolar)
        ->first();
        return view('anios_escolares/editar', compact('anio_escolar'));
    }

    public function actualizar(Request $request)
    {
        DB::table('anios_escolares')->where('id_anio_escolar', $request->id_anio_escolar)->update([
            'anio_escolar' => $request->anio_escolar,
            
        ]);
        return redirect('anios_escolares');
    }

    public function eliminar($id)
    {
        DB::table('anios_escolares')->where('id', $id)->delete();
        return redirect('/anios_escolares');
    }
}
