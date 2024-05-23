<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
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

    public function lista_calificaciones()
    {   
        $calificaciones = DB::table('calificaciones')
        ->where('eliminado_calificacion', '=', '0')
        ->leftJoin('inscripciones', 'inscripciones.id_inscripcion', '=', 'calificaciones.id_inscripcion')
        ->leftJoin('secciones', 'secciones.id_seccion', '=', 'inscripciones.id_seccion')
        ->leftJoin('grados', 'grados.id_grado', '=', 'secciones.id_grado')
        ->leftJoin('estudiantes', 'estudiantes.id_estudiante', '=', 'inscripciones.id_estudiante')
        ->leftJoin('anios_escolares', 'anios_escolares.id_anio_escolar', '=', 'inscripciones.id_anio_escolar')
        ->leftJoin('materias', 'materias.id_materia', '=', 'calificaciones.id_materia')
        ->leftJoin('lapsos', 'lapsos.id_lapso', '=', 'calificaciones.id_lapso')
        ->orderBy('inscripciones.id_anio_escolar', 'desc')
        ->orderBy('calificaciones.id_lapso', 'desc')
        ->orderBy('apellidos', 'desc')
        ->orderBy('nombres', 'desc')
        ->orderBy('nombre_materia', 'desc')
        ->get();
        return view('calificaciones/index', compact('calificaciones'));
    }


    public function crear()
    {
        $calificaciones = DB::table('calificaciones')
        ->where('estado_calificacion', '=', '1')
        ->where('eliminado_calificacion', '=', '0')
        ->get();

        $materias = DB::table('materias')
        ->where('estado_materia', '=', '1')
        ->where('eliminado_materia', '=', '0')
        ->get();

        return view('calificaciones/crear', compact('calificaciones', 'materias'));
    }



    // public function guardar(Request $request)
    // {
    //     $id_calificacion = DB::table('calificaciones')->insertGetId([
    //         'calificacion' => $request->nombres,
    //     ]);
    //     foreach ($request->ids_materias as $id_materia) {
    //         DB::table('materias_calificaciones')->insert([
    //             'id_calificacion' => $id_calificacion
    //         ]);
    //     }

    //     return redirect('calificaciones');
    // }

    public function editar($id_calificacion)
    { 
        $calificacion = DB::table('calificaciones')
        ->where('id_calificacion', $id_calificacion)
        ->where('eliminado_calificacion', '=', '0')
        ->leftJoin('inscripciones', 'inscripciones.id_inscripcion', '=', 'calificaciones.id_inscripcion')
        ->leftJoin('secciones', 'secciones.id_seccion', '=', 'inscripciones.id_seccion')
        ->leftJoin('grados', 'grados.id_grado', '=', 'secciones.id_grado')
        ->leftJoin('estudiantes', 'estudiantes.id_estudiante', '=', 'inscripciones.id_estudiante')
        ->leftJoin('anios_escolares', 'anios_escolares.id_anio_escolar', '=', 'inscripciones.id_anio_escolar')
        ->leftJoin('materias', 'materias.id_materia', '=', 'calificaciones.id_materia')
        ->leftJoin('lapsos', 'lapsos.id_lapso', '=', 'calificaciones.id_lapso')
        ->first();
       
        return view('calificaciones.editar', compact('calificacion'));
    }

    public function actualizar(Request $request)
    {
        //ACTUALIZO EL NOMBRE
        DB::table('calificaciones')
        ->where('id_calificacion', $request->id_calificacion)->update([
            'calificacion' => $request->calificacion,
        ]);
        return redirect('calificaciones');
    }

    // public function eliminar(Request $request)
    // {
    //     DB::table('calificaciones')
    //     ->where('id_calificacion', $request->id)->update([
    //         'eliminado_calificacion' => '1',
    //     ]);
    //     $respuesta = ['exito'];
    //     return json_encode($respuesta);
    // }
}
