<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
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

    public function lista_estudiantes()
    {   
        $estudiantes = DB::table('estudiantes')
        ->where('eliminado_estudiante', '=', '0')
        ->leftJoin('tipos_documentos', 'tipos_documentos.id_tipo_documento', '=', 'estudiantes.id_tipo_documento')
        ->leftJoin('grados', 'grados.id_grado', '=', 'estudiantes.id_grado_actual')
        ->get();
        // dd($estudiantes);
        return view('estudiantes/index', compact('estudiantes'));
    }


    public function crear()
    {
        $tipos_documentos = DB::table('tipos_documentos')
        ->where('estado_tipo_documento', '=', '1')
        ->where('eliminado_tipo_documento', '=', '0')
        ->get();

        $grados = DB::table('grados')
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->get();
        return view('estudiantes/crear', compact('tipos_documentos', 'grados'));
    }



    public function guardar(Request $request)
    {
        DB::table('estudiantes')->insert([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'id_tipo_documento' => $request->id_tipo_documento,
            'documento' => $request->documento,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'id_grado_actual' => $request->id_grado,
        ]);
        return redirect('estudiantes');
    }

    public function editar($id_estudiante)
    { 
        $estudiante = DB::table('estudiantes')
        ->where('id_estudiante', $id_estudiante)
        ->first();
        $tipos_documentos = DB::table('tipos_documentos')
        ->where('estado_tipo_documento', '=', '1')
        ->where('eliminado_tipo_documento', '=', '0')
        ->get();

        $grados = DB::table('grados')
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->get();

        return view('estudiantes.editar', compact('estudiante', 'tipos_documentos', 'grados'));
    }

    public function actualizar(Request $request)
    {
        DB::table('estudiantes')->where('id_estudiante', $request->id_estudiante)->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'id_tipo_documento' => $request->id_tipo_documento,
            'documento' => $request->documento,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'id_grado_actual' => $request->id_grado,
        ]);
        return redirect('estudiantes');
    }

    public function eliminar($id)
    {
        DB::table('estudiantes')->where('id', $id)->delete();
        return redirect('/estudiantes');
    }
}
