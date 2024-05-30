@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inscripciones</h1>
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
      <a href="{{ route('crear_inscripcion') }}" class="btn btn-warning btn-sm">Inscribir alumno</a>
      <table id="tabla-principal" class="table table-striped table-borderless">
          <thead>
              <tr>
                  <th>Alumno</th>
                  <th>Grado/sección</th>
                  <th>Año escolar</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($inscripciones as $inscripcion)
              <tr>
                  <td>{{ $inscripcion->nombres }} {{ $inscripcion->apellidos }}</td>
                  <td>{{ $inscripcion->grado }} {{ $inscripcion->seccion }}</td>
                  <td>{{ $inscripcion->anio_escolar }}</td>
                  <td>
                      <a href="{{route('boleta', $inscripcion->id_inscripcion)}}" class="btn btn-primary btn-xs">Boleta</a>
                      <a href="{{route('editar_inscripcion', $inscripcion->id_inscripcion)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $inscripcion->id_inscripcion }}', '{{ route('eliminar_inscripcion')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
