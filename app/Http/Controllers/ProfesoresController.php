<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
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

    public function lista_profesores()
    {   
        $profesores = DB::table('profesores')
        ->where('eliminado_profesor', '=', '0')
        ->leftJoin('tipos_documentos', 'tipos_documentos.id_tipo_documento', '=', 'profesores.id_tipo_documento')
        ->get();
        return view('profesores/index', compact('profesores'));
    }


    public function crear()
    {
        $tipos_documentos = DB::table('tipos_documentos')
        ->where('estado_tipo_documento', '=', '1')
        ->where('eliminado_tipo_documento', '=', '0')
        ->get();
        return view('profesores/crear', compact('tipos_documentos'));
    }



    public function guardar(Request $request)
    {
        DB::table('profesores')->insert([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'id_tipo_documento' => $request->id_tipo_documento,
            'documento' => $request->documento,
            
        ]);
        return redirect('profesores');
    }

    public function editar($id_profesor)
    { 
        $profesor = DB::table('profesores')
        ->where('id_profesor', $id_profesor)
        ->first();
        $tipos_documentos = DB::table('tipos_documentos')
        ->where('estado_tipo_documento', '=', '1')
        ->where('eliminado_tipo_documento', '=', '0')
        ->get();

        return view('profesores.editar', compact('profesor', 'tipos_documentos'));
    }

    public function actualizar(Request $request)
    {
        DB::table('profesores')->where('id_profesor', $request->id_profesor)->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'id_tipo_documento' => $request->id_tipo_documento,
            'documento' => $request->documento,
        ]);
        return redirect('profesores');
    }

    public function eliminar(Request $request)
    {
        DB::table('profesores')
        ->where('id_profesor', $request->id)->update([
            'eliminado_profesor' => '1',
        ]);
        $respuesta = ['exito'];
        return json_encode($respuesta);
    }
}
