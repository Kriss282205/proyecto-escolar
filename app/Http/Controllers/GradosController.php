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
        ->get();
        return view('grados/index', compact('grados'));
    }


    public function crear()
    {
        $grados = DB::table('grados')
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->get();
        return view('grados/crear', compact('grados'));
    }



    public function guardar(Request $request)
    {
        DB::table('grados')->insert([
            'grado' => $request->nombres,
            
        ]);
        return redirect('grados');
    }

    public function editar($id_grado)
    { 
        $grado = DB::table('grados')
        ->where('id_grado', $id_grado)
        ->first();
       
        return view('grados.editar', compact('grado'));
    }

    public function actualizar(Request $request)
    {
        DB::table('grados')->where('id_grado', $request->id_grado)->update([
            'grado' => $request->nombres,
            
        ]);
        return redirect('grados');
    }

    public function eliminar($id)
    {
        DB::table('grados')->where('id', $id)->delete();
        return redirect('/grados');
    }
}
