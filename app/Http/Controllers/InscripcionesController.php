<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
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

    public function lista_inscripciones()
    {   
        $inscripciones = DB::table('inscripciones')
        ->where('eliminado_inscripcion', '=', '0')
        ->where('eliminado_seccion', '=', '0')
        ->where('eliminado_grado', '=', '0')
        ->where('eliminado_estudiante', '=', '0')
        ->where('eliminado_anio_escolar', '=', '0')
        ->leftJoin('secciones', 'secciones.id_seccion', '=', 'inscripciones.id_seccion')
        ->leftJoin('grados', 'grados.id_grado', '=', 'secciones.id_grado')
        ->leftJoin('estudiantes', 'estudiantes.id_estudiante', '=', 'inscripciones.id_estudiante')
        ->leftJoin('anios_escolares', 'anios_escolares.id_anio_escolar', '=', 'inscripciones.id_anio_escolar')
        ->orderBy('inscripciones.id_anio_escolar', 'desc')
        ->orderBy('secciones.id_grado', 'desc')
        ->orderBy('inscripciones.id_seccion', 'desc')
        ->get();

        return view('inscripciones/index', compact('inscripciones'));
    }

    public function crear()
    {
        $anios_escolares = DB::table('anios_escolares')
        ->where('eliminado_anio_escolar', '=', '0')
        ->get();

        $secciones = DB::table('secciones')
        ->where('eliminado_seccion', '=', '0')
        ->where('eliminado_grado', '=', '0')
        ->leftJoin('grados', 'grados.id_grado', '=', 'secciones.id_grado')
        ->get();

        $estudiantes = DB::table('estudiantes')
        ->where('eliminado_estudiante', '=', '0')
        ->get();

        return view('inscripciones/crear', compact('anios_escolares', 'secciones', 'estudiantes'));
    }

    public function guardar(Request $request)
    {
        //CREO LA INSCRIPCION
        $id_inscripcion = DB::table('inscripciones')->insertGetId([
            'id_estudiante' => $request->id_estudiante,
            'id_seccion' => $request->id_seccion,
            'id_anio_escolar' => $request->id_anio_escolar,
        ]);

        //NECESITO EL ID_GRADO PARA SABER QUE MATERIAS VE ESE GRADO PERO NO LO TENGO, LO QUE TENGO ES EL ID_SECCION EL CUAL SI POSEE EL ID_GRADO ENTONCES
        //CONSULTO LA SECCION CON SU ID_SECCION PARA OBTENER EL ID_GRADO QUE ESTA GUARDADO EN LA TABLA SECCIONES:
        $seccion = DB::table('secciones')
        ->where('id_seccion', $request->id_seccion)
        ->first();

        //AHORA EL ID_GRADO LO TENGO EN: $seccion->id_grado Y PROCEDEMOS A BUSCAR LAS MATERIAS CORRESPONDIENTES A ESE GRADO PARA ASIGNARSELAS AL ESTUDIANTE SELECCIONADO EN CADA LAPSO:
        $materias = DB::table('materias_grados')
        ->where('id_grado', '=', $seccion->id_grado)
        ->where('estado_materia_grado', '=', '1')
        ->where('eliminado_materia_grado', '=', '0')
        ->where('estado_materia', '=', '1')
        ->where('eliminado_materia', '=', '0')
        ->leftJoin('materias', 'materias.id_materia', '=', 'materias_grados.id_materia')
        ->get();

        //COMO YA OBTUVIMOS LAS MATERIAS, VAMOS A AGREGARLAS A CADA LAPSO AL ESTUDIANTE ELEGIDO EN LA VISTA Y LO ALMACENAREMOS EN UNA TABLA QUE ES DONDE ESTA NUESTRA RELACION DE QUE UN ESTUDIANTE ESTA VIENDO UNA MATERIA:

        //PRIMERO CONSULTAMOS LOS LAPSOS:
        $lapsos = DB::table('lapsos')
        ->where('estado_lapso', '=', '1')
        ->where('eliminado_lapso', '=', '0')
        ->get();

        //COMO DEBO GUARDAR LOS DATOS DEL ESTUDIANTE/MATERIA POR CADA LAPSO, RECORRO PRIMERO LOS LAPSOS
        foreach ($lapsos as $lapso) {
            //LUEGO PROCEDEMOS A INSERTAR CADA MATERIA EN CADA LAPSO Y LA INSCRIPCION (LA INSCRIPCION ES LA UNION DE ID_ESTUDIANTE, ID_SECCION Y ID_ANIO_ESCOLAR) LA CALIFICACION QUEDA NULA HASTA QUE SE CARGUEN LAS NOTAS DE CADA LAPSO
            foreach ($materias as $materia) {
                DB::table('calificaciones')->insert([
                    'id_inscripcion' => $id_inscripcion,
                    'id_materia' => $materia->id_materia,
                    'id_lapso' => $lapso->id_lapso
                ]);
            }
        }

        return redirect('inscripciones');
    }

    public function editar($id_inscripcion)
    { 
        $inscripcion = DB::table('inscripciones')
        ->where('id_inscripcion', $id_inscripcion)
        ->first();

        $anios_escolares = DB::table('anios_escolares')
        ->where('eliminado_anio_escolar', '=', '0')
        ->get();

        $secciones = DB::table('secciones')
        ->where('eliminado_seccion', '=', '0')
        ->where('eliminado_grado', '=', '0')
        ->leftJoin('grados', 'grados.id_grado', '=', 'secciones.id_grado')
        ->get();

        $estudiantes = DB::table('estudiantes')
        ->where('eliminado_estudiante', '=', '0')
        ->get();

        return view('inscripciones/editar', compact('inscripcion', 'anios_escolares', 'secciones', 'estudiantes'));
    }

    public function actualizar(Request $request)
    {
        DB::table('inscripciones')->where('id_inscripcion', $request->id_inscripcion)->update([
            'id_estudiante' => $request->id_estudiante,
            'id_seccion' => $request->id_seccion,
            'id_anio_escolar' => $request->id_anio_escolar,
        ]);
        return redirect('inscripciones');
    }

    public function eliminar(Request $request)
    {
        DB::table('inscripciones')
        ->where('id_inscripcion', $request->id)->update([
            'eliminado_inscripcion' => '1',
        ]);
        $respuesta = ['exito'];
        return json_encode($respuesta);
    }
}
