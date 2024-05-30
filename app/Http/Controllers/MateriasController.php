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
        ->orderBy('nombre_materia')
        ->get();
        return view('materias/index', compact('materias'));
    }

    public function crear()
    {
        $grados = DB::table('grados')
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->get();

        $profesores = DB::table('profesores')
        ->where('eliminado_profesor', '=', '0')
        ->get();

        return view('materias/crear', compact('profesores', 'grados'));
    }

    public function guardar(Request $request)
    {
        $id_materia = DB::table('materias')->insertGetId([
            'nombre_materia' => $request->nombres,
        ]);
        foreach (json_decode($request->materias_grados_profesores) as $materia_grado) {
            if ($materia_grado->tiene_grado == true) {
                $id_profesor = null;
                if ($materia_grado->id_profesor != '' && $materia_grado->id_profesor != null) {
                    $id_profesor = $materia_grado->id_profesor;
                }
                DB::table('materias_grados')->insert([
                    'id_grado' => $materia_grado->id_grado,
                    'id_materia' => $id_materia,
                    'id_profesor' => $id_profesor
                ]);
            }
        }
        return redirect('materias');
    }

    public function editar($id_materia)
    { 
        $materia = DB::table('materias')
        ->where('id_materia', $id_materia)
        ->first();

        $grados = DB::table('grados')
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->get();

        $grados_materia = DB::table('grados')
        ->where('materias_grados.id_materia', $id_materia)
        ->where('estado_grado', '=', '1')
        ->where('eliminado_grado', '=', '0')
        ->where('estado_materia_grado', '=', '1')
        ->where('eliminado_materia_grado', '=', '0')
        ->leftJoin('materias_grados', 'materias_grados.id_grado', '=', 'grados.id_grado')
        ->leftJoin('materias', 'materias.id_materia', '=', 'materias_grados.id_materia')
        ->get();

        $profesores = DB::table('profesores')
        ->where('eliminado_profesor', '=', '0')
        ->get();
       
        return view('materias.editar', compact('materia', 'profesores', 'grados', 'grados_materia'));
    }

    public function actualizar(Request $request)
    {
        DB::table('materias')->where('id_materia', $request->id_materia)->update([
            'nombre_materia' => $request->nombres,
        ]);

        DB::table('materias_grados')
        ->where('id_materia', $request->id_materia)->update([
            'eliminado_materia_grado' => '1',
        ]);
        foreach (json_decode($request->materias_grados_profesores) as $materia_grado) {
            if ($materia_grado->tiene_grado == true) {
                $id_profesor = null;
                if ($materia_grado->id_profesor != '' && $materia_grado->id_profesor != null) {
                    $id_profesor = $materia_grado->id_profesor;
                }
                $materia_grado_buscar = DB::table('materias_grados')
                ->where('id_grado', '=', $materia_grado->id_grado)
                ->where('id_materia', '=', $request->id_materia)
                ->first();
                if (isset($materia_grado_buscar)) {
                    DB::table('materias_grados')
                    ->where('id_grado', '=', $materia_grado->id_grado)
                    ->where('id_materia', '=', $request->id_materia)
                    ->update([
                        'id_profesor' => $id_profesor,
                        'eliminado_materia_grado' => '0',
                    ]);
                } else {
                    DB::table('materias_grados')->insert([
                        'id_grado' => $materia_grado->id_grado,
                        'id_materia' => $request->id_materia,
                        'id_profesor' => $id_profesor
                    ]);
                }
            }
        }

        return redirect('materias');
    }

    public function eliminar(Request $request)
    {
        DB::table('materias')
        ->where('id_materia', $request->id)->update([
            'eliminado_materia' => '1',
        ]);
        $respuesta = ['exito'];
        return json_encode($respuesta);
    }
}
