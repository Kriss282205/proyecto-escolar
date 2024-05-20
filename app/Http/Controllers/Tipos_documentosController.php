<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Tipos_documentosController extends Controller
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

    public function lista_tipos_documentos()
    {   
        $tipos_documentos = DB::table('tipos_documentos')
        ->where('eliminado_tipo_documento', '=', '0')
        ->get();
        return view('tipos_documentos/index', compact('tipos_documentos'));
    }


    public function crear()
    {
        $tipos_documentos = DB::table('tipos_documentos')
        ->where('estado_tipo_documento', '=', '1')
        ->where('eliminado_tipo_documento', '=', '0')
        ->get();
        return view('tipos_documentos/crear', compact('tipos_documentos'));
    }



    public function guardar(Request $request)
    {
        DB::table('tipos_documentos')->insert([
            'nombre_tipo_documento' => $request->nombre_tipo_documento,
            
        ]);
        return redirect('tipos_documentos');
    }

    public function editar($id_tipo_documento)
    { 
        $tipo_documento = DB::table('tipos_documentos')
        ->where('id_tipo_documento', $id_tipo_documento)
        ->first();
        return view('tipos_documentos/editar', compact('tipo_documento'));
    }

    public function actualizar(Request $request)
    {
        DB::table('tipos_documentos')->where('id_tipo_documento', $request->id_tipo_documento)->update([
            'nombre_tipo_documento' => $request->nombre_tipo_documento,
            
        ]);
        return redirect('tipos_documentos');
    }

    public function eliminar($id)
    {
        DB::table('tipos_documentos')->where('id', $id)->delete();
        return redirect('/tipos_documentos');
    }
}
