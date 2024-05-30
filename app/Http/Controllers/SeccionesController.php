<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeccionesController extends Controller
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

    public function lista_secciones()
    {   
        $secciones = DB::table('secciones')
        ->where('eliminado_seccion', '=', '0')
        ->leftJoin('grados', 'grados.id_grado', '=', 'secciones.id_grado')
        ->orderBy('secciones.id_grado')
        ->get();
        return view('secciones/index', compact('secciones'));
    }


    public function crear()
    {
        $secciones = DB::table('secciones')
        ->where('estado_seccion', '=', '1')
        ->where('eliminado_seccion', '=', '0')
        ->get();

        $grados = DB::table('grados')
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->get();
        return view('secciones/crear', compact('secciones', 'grados'));
    }



    public function guardar(Request $request)
    {
        DB::table('secciones')->insert([
            'seccion' => $request->seccion,
            'id_grado'=> $request->id_grado
            
        ]);
        return redirect('secciones');
    }

    public function editar($id_seccion)
    { 
        $seccion = DB::table('secciones')
        ->where('id_seccion', $id_seccion)
        ->first();

        $grados = DB::table('grados')
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->get();
       
        return view('secciones.editar', compact('seccion', 'grados'));
    }

    public function actualizar(Request $request)
    {
        DB::table('secciones')->where('id_seccion', $request->id_seccion)->update([
            'seccion' => $request->seccion,
            'id_grado' => $request->id_grado,
            
        ]);
        return redirect('secciones');
    }

    public function eliminar(Request $request)
    {
        DB::table('secciones')
        ->where('id_seccion', $request->id)->update([
            'eliminado_seccion' => '1',
        ]);
        $respuesta = ['exito'];
        return json_encode($respuesta);
    }
}
