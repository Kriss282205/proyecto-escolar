@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calificaciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="container-fluid px-4">
      <h4> Lista </h4>
      <table id="tabla-principal" class="table table-striped table-borderless">
          <thead>
              <tr>
                  <th>Alumno</th>
                  <th>Materia</th>
                  <th>Lapso</th>
                  <th>Nota</th>
                  <th>Grado/sección</th>
                  <th>Profesor</th>
                  <th>Año escolar</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($calificaciones as $calificacion)
              <tr>
                  <td>{{ $calificacion->apellidos_estudiante }} {{ $calificacion->nombres_estudiante }}</td>
                  <td>{{ $calificacion->nombre_materia }}</td>
                  <td>{{ $calificacion->lapso }}</td>
                  <td>{{ $calificacion->calificacion }}</td>
                  <td>{{ $calificacion->grado }} {{ $calificacion->seccion }}</td>
                  <td>{{ $calificacion->apellidos_profesor }} {{ $calificacion->nombres_profesor }}</td>
                  <td>{{ $calificacion->anio_escolar }}</td>
                  <td>
                      <a href="{{route('editar_calificacion', $calificacion->id_calificacion)}}" class="btn btn-success btn-xs">Editar</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
