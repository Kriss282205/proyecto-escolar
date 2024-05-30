<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GradosController extends Controller
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

    public function lista_grados()
    {   
        $grados = DB::table('grados')
        ->where('eliminado_grado', '=', '0')
        ->orderBy('id_grado')
        ->get();
        return view('grados/index', compact('grados'));
    }


    public function crear()
    {
        $materias = DB::table('materias')
        ->where('estado_materia', '=', '1')
        ->where('eliminado_materia', '=', '0')
        ->get();

        return view('grados/crear', compact('materias'));
    }



    public function guardar(Request $request)
    {
        $id_grado = DB::table('grados')->insertGetId([
            'grado' => $request->grado,
        ]);

        return redirect('grados');
    }

    public function editar($id_grado)
    { 
        $grado = DB::table('grados')
        ->where('id_grado', $id_grado)
        ->first();

        $materias = DB::table('materias')
        ->where('estado_materia', '=', '1')
        ->where('eliminado_materia', '=', '0')
        ->get();

        $materias_grados = DB::table('materias_grados')
        ->where('id_grado', '=', $id_grado)
        ->where('estado_materia_grado', '=', '1')
        ->where('eliminado_materia_grado', '=', '0')
        ->pluck('id_materia');
       
        return view('grados.editar', compact('grado', 'materias', 'materias_grados'));
    }

    public function actualizar(Request $request)
    {
        DB::table('grados')
        ->where('id_grado', $request->id_grado)
        ->update([
            'grado' => $request->grado,
        ]);
        return redirect('grados');
    }

    public function eliminar(Request $request)
    {
        DB::table('grados')
        ->where('id_grado', $request->id)->update([
            'eliminado_grado' => '1',
        ]);
        $respuesta = ['exito'];
        return json_encode($respuesta);
    }
}
