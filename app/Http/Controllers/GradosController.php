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

        $materias = DB::table('materias')
        ->where('estado_materia', '=', '1')
        ->where('eliminado_materia', '=', '0')
        ->get();

        return view('grados/crear', compact('grados', 'materias'));
    }



    public function guardar(Request $request)
    {
        $id_grado = DB::table('grados')->insertGetId([
            'grado' => $request->nombres,
        ]);
        foreach ($request->ids_materias as $id_materia) {
            DB::table('materias_grados')->insert([
                'id_grado' => $id_grado,
                'id_materia' => $id_materia
            ]);
        }

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
        //ACTUALIZO EL NOMBRE
        DB::table('grados')->where('id_grado', $request->id_grado)->update([
            'grado' => $request->nombres,
        ]);
        //TODAS LAS MATERIAS DE ESE GRADO LAS ELIMINO LOGICAMENTE (SIN ELIMINAR EL REGISTRO) "AL FINAL EXPLICO PORQUE"
        DB::table('materias_grados')
        ->where('id_grado', $request->id_grado)->update([
            'eliminado_materia_grado' => '1',
        ]);
        //LUEGO RECORRO EL ARRAY DE IDS DE MATERIAS QUE SELECCIONE EN EL SELECT2 MULTIPLE EN LA VISTA
        foreach ($request->ids_materias as $id_materia) {
            //COMO ES UN ARRAY, RECORRO CADA UNO DE ELLOS. EJEMPLO: [1, 3, 8] SE RECORRERA 3 VECES DONDE $id_materia VALDRA PRIMERO 1, DESPUES 3 Y POR ULTIMO 8.
            //PREGUNTO SI EXISTE YA UN REGISTRO DE ESE GRADO CON CADA UNO DE LOS $id_materia (OJO: AUNQUE ESTEN EN ELIMINADO LOGICAMENTE YA QUE ARRIBA LOS ELIMINE LOGICAMENTE) LO QUE QUIERO SABER ES SI EXISTE EL REGISTRO:
            $materia_grado = DB::table('materias_grados')
            ->where('id_grado', '=', $request->id_grado)
            ->where('id_materia', '=', $id_materia)
            ->first();
            if (isset($materia_grado)) {
                //SI EXISTE, LO VUELVO A HABILITAR COLOCANDOLE ELIMINADO = 0 ES DECIR, NO ESTA ELIMINADO
                DB::table('materias_grados')
                ->where('id_grado', '=', $request->id_grado)
                ->where('id_materia', '=', $id_materia)->update([
                    'eliminado_materia_grado' => '0',
                ]);
            } else {
                // SINO EXISTE NINGUN REGISTRO DEL PAR ID_MATERIA-ID_GRADO NI SIQUIERA ELIMINADO, LO CREO
                DB::table('materias_grados')->insert([
                    'id_grado' => $request->id_grado,
                    'id_materia' => $id_materia
                ]);
            }
            //DE ESTA FORMA, SI QUITO EN EL SELECT DE LA VISTA UNO SE QUEDARA EN ELIMINADO = 0 Y SE ASUMIRA ELIMINADO Y SI SE AGREGAN MATERIAS NUEVAS, SE AGREGARAN
        }
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
