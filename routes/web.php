<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/estudiantes', [App\Http\Controllers\EstudiantesController::class, 'lista_estudiantes'])->name('lista_estudiantes');
Route::get('/estudiantes/crear', [App\Http\Controllers\EstudiantesController::class, 'crear'])->name('crear_estudiante');
Route::post('/estudiantes/guardar', [App\Http\Controllers\EstudiantesController::class, 'guardar'])->name('guardar_estudiante');
Route::get('/estudiantes/editar/{estudiante_id?}', [App\Http\Controllers\EstudiantesController::class, 'editar'])->name('editar_estudiante');
Route::post('/estudiantes/actualizar', [App\Http\Controllers\EstudiantesController::class, 'actualizar'])->name('actualizar_estudiante');
Route::post('/estudiantes/eliminar', [App\Http\Controllers\EstudiantesController::class, 'eliminar'])->name('eliminar_estudiante');


Route::get('/profesores', [App\Http\Controllers\ProfesoresController::class, 'lista_profesores'])->name('lista_profesores');
Route::get('/profesores/crear', [App\Http\Controllers\ProfesoresController::class, 'crear'])->name('crear_profesor');
Route::post('/profesores/guardar', [App\Http\Controllers\ProfesoresController::class, 'guardar'])->name('guardar_profesor');
Route::get('/profesores/editar/{profesor_id?}', [App\Http\Controllers\ProfesoresController::class, 'editar'])->name('editar_profesor');
Route::post('/profesores/actualizar', [App\Http\Controllers\ProfesoresController::class, 'actualizar'])->name('actualizar_profesor');
Route::post('/profesores/eliminar', [App\Http\Controllers\ProfesoresController::class, 'eliminar'])->name('eliminar_profesor');


Route::get('/materias', [App\Http\Controllers\MateriasController::class, 'lista_materias'])->name('lista_materias');
Route::get('/materias/crear', [App\Http\Controllers\MateriasController::class, 'crear'])->name('crear_materia');
Route::post('/materias/guardar', [App\Http\Controllers\MateriasController::class, 'guardar'])->name('guardar_materia');
Route::get('/materias/editar/{materia_id?}', [App\Http\Controllers\MateriasController::class, 'editar'])->name('editar_materia');
Route::post('/materias/actualizar', [App\Http\Controllers\MateriasController::class, 'actualizar'])->name('actualizar_materia');
Route::post('/materias/eliminar', [App\Http\Controllers\MateriasController::class, 'eliminar'])->name('eliminar_materia');


Route::get('/grados', [App\Http\Controllers\GradosController::class, 'lista_grados'])->name('lista_grados');
Route::get('/grados/crear', [App\Http\Controllers\GradosController::class, 'crear'])->name('crear_grado');
Route::post('/grados/guardar', [App\Http\Controllers\GradosController::class, 'guardar'])->name('guardar_grado');
Route::get('/grados/editar/{grado_id?}', [App\Http\Controllers\GradosController::class, 'editar'])->name('editar_grado');
Route::post('/grados/actualizar', [App\Http\Controllers\GradosController::class, 'actualizar'])->name('actualizar_grado');
Route::post('/grados/eliminar', [App\Http\Controllers\GradosController::class, 'eliminar'])->name('eliminar_grado');


Route::get('/secciones', [App\Http\Controllers\SeccionesController::class, 'lista_secciones'])->name('lista_secciones');
Route::get('/secciones/crear', [App\Http\Controllers\SeccionesController::class, 'crear'])->name('crear_seccion');
Route::post('/secciones/guardar', [App\Http\Controllers\SeccionesController::class, 'guardar'])->name('guardar_seccion');
Route::get('/secciones/editar/{seccion_id?}', [App\Http\Controllers\SeccionesController::class, 'editar'])->name('editar_seccion');
Route::post('/secciones/actualizar', [App\Http\Controllers\SeccionesController::class, 'actualizar'])->name('actualizar_seccion');
Route::post('/secciones/eliminar', [App\Http\Controllers\SeccionesController::class, 'eliminar'])->name('eliminar_seccion');


Route::get('/lapsos', [App\Http\Controllers\LapsosController::class, 'lista_lapsos'])->name('lista_lapsos');
Route::get('/lapsos/crear', [App\Http\Controllers\LapsosController::class, 'crear'])->name('crear_lapso');
Route::post('/lapsos/guardar', [App\Http\Controllers\LapsosController::class, 'guardar'])->name('guardar_lapso');
Route::get('/lapsos/editar/{lapso_id?}', [App\Http\Controllers\LapsosController::class, 'editar'])->name('editar_lapso');
Route::post('/lapsos/actualizar', [App\Http\Controllers\LapsosController::class, 'actualizar'])->name('actualizar_lapso');
Route::post('/lapsos/eliminar', [App\Http\Controllers\LapsosController::class, 'eliminar'])->name('eliminar_lapso');


Route::get('/tipos_documentos', [App\Http\Controllers\Tipos_documentosController::class, 'lista_tipos_documentos'])->name('lista_tipos_documentos');
Route::get('/tipos_documentos/crear', [App\Http\Controllers\Tipos_documentosController::class, 'crear'])->name('crear_tipo_documento');
Route::post('/tipos_documentos/guardar', [App\Http\Controllers\Tipos_documentosController::class, 'guardar'])->name('guardar_tipo_documento');
Route::get('/tipos_documentos/editar/{tipo_documento_id?}', [App\Http\Controllers\Tipos_documentosController::class, 'editar'])->name('editar_tipo_documento');
Route::post('/tipos_documentos/actualizar', [App\Http\Controllers\Tipos_documentosController::class, 'actualizar'])->name('actualizar_tipo_documento');
Route::post('/tipos_documentos/eliminar', [App\Http\Controllers\Tipos_documentosController::class, 'eliminar'])->name('eliminar_tipo_documento');


Route::get('/anios_escolares', [App\Http\Controllers\Anios_escolaresController::class, 'lista_anios_escolares'])->name('lista_anios_escolares');
Route::get('/anios_escolares/crear', [App\Http\Controllers\Anios_escolaresController::class, 'crear'])->name('crear_anio_escolar');
Route::post('/anios_escolares/guardar', [App\Http\Controllers\Anios_escolaresController::class, 'guardar'])->name('guardar_anio_escolar');
Route::get('/anios_escolares/editar/{anio_escolare_id?}', [App\Http\Controllers\Anios_escolaresController::class, 'editar'])->name('editar_anio_escolar');
Route::post('/anios_escolares/actualizar', [App\Http\Controllers\Anios_escolaresController::class, 'actualizar'])->name('actualizar_anio_escolar');
Route::post('/anios_escolares/eliminar', [App\Http\Controllers\Anios_escolaresController::class, 'eliminar'])->name('eliminar_anio_escolar');


Route::get('/inscripciones', [App\Http\Controllers\InscripcionesController::class, 'lista_inscripciones'])->name('lista_inscripciones');
Route::get('/inscripciones/crear', [App\Http\Controllers\InscripcionesController::class, 'crear'])->name('crear_inscripcion');
Route::post('/inscripciones/guardar', [App\Http\Controllers\InscripcionesController::class, 'guardar'])->name('guardar_inscripcion');
Route::get('/inscripciones/editar/{inscripcion_id?}', [App\Http\Controllers\InscripcionesController::class, 'editar'])->name('editar_inscripcion');
Route::post('/inscripciones/actualizar', [App\Http\Controllers\InscripcionesController::class, 'actualizar'])->name('actualizar_inscripcion');
Route::post('/inscripciones/eliminar', [App\Http\Controllers\InscripcionesController::class, 'eliminar'])->name('eliminar_inscripcion');


Route::get('/calificaciones', [App\Http\Controllers\CalificacionesController::class, 'lista_calificaciones'])->name('lista_calificaciones');
Route::get('/calificaciones/crear', [App\Http\Controllers\CalificacionesController::class, 'crear'])->name('crear_calificacion');
Route::post('/calificaciones/guardar', [App\Http\Controllers\CalificacionesController::class, 'guardar'])->name('guardar_calificacion');
Route::get('/calificaciones/editar/{calificacion_id?}', [App\Http\Controllers\CalificacionesController::class, 'editar'])->name('editar_calificacion');
Route::post('/calificaciones/actualizar', [App\Http\Controllers\CalificacionesController::class, 'actualizar'])->name('actualizar_calificacion');
Route::post('/calificaciones/eliminar', [App\Http\Controllers\CalificacionesController::class, 'eliminar'])->name('eliminar_calificacion');