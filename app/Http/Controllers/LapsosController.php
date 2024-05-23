<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LapsosController extends Controller
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

    public function lista_lapsos()
    {   
        $lapsos = DB::table('lapsos')
        ->where('eliminado_lapso', '=', '0')
        ->get();
        return view('lapsos/index', compact('lapsos'));
    }


    public function crear()
    {
        $lapsos = DB::table('lapsos')
        ->where('estado_lapso', '=', '1')
        ->where('eliminado_lapso', '=', '0')
        ->get();
        return view('lapsos/crear', compact('lapsos'));
    }



    public function guardar(Request $request)
    {
        DB::table('lapsos')->insert([
            'lapso' => $request->nombres,
            
        ]);
        return redirect('lapsos');
    }

    public function editar($id_lapso)
    { 
        $lapsos = DB::table('lapsos')
        ->where('id_lapso', $id_lapso)
        ->first();
       
        return view('lapsos.editar', compact('lapsos'));
    }

    public function actualizar(Request $request)
    {
        DB::table('lapsos')->where('id_lapso', $request->id_lapso)->update([
            'lapso' => $request->nombres,
            
        ]);
        return redirect('lapsos');
    }

    public function eliminar(Request $request)
    {
        DB::table('lapsos')
        ->where('id_lapso', $request->id)->update([
            'eliminado_lapso' => '1',
        ]);
        $respuesta = ['exito'];
        return json_encode($respuesta);
    }
}
