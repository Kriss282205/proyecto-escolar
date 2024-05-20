<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MateriasController extends Controller
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

    public function lista_materias()
    {   
        $materias = DB::table('materias')
        ->where('eliminado_materia', '=', '0')
        ->get();
        return view('materias/index', compact('materias'));
    }


    public function crear()
    {
        $materias = DB::table('materias')
        ->where('estado_materia', '=', '1')
        ->where('eliminado_materia', '=', '0')
        ->get();
        return view('materias/crear', compact('materias'));
    }



    public function guardar(Request $request)
    {
        DB::table('materias')->insert([
            'nombre_materia' => $request->nombres,
            
        ]);
        return redirect('materias');
    }

    public function editar($id_materia)
    { 
        $materia = DB::table('materias')
        ->where('id_materia', $id_materia)
        ->first();
       
        return view('materias.editar', compact('materia'));
    }

    public function actualizar(Request $request)
    {
        DB::table('materias')->where('id_materia', $request->id_materia)->update([
            'nombre_materia' => $request->nombres,
            
        ]);
        return redirect('materias');
    }

    public function eliminar($id)
    {
        DB::table('materias')->where('id', $id)->delete();
        return redirect('/materias');
    }
}
