@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Estudiantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">General Form</li>
              
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="container-fluid px-4">
      <h4> Lista </h4>
      <a href="{{ route('crear_estudiante') }}" class="btn btn-warning btn-sm">Añadir Estudiante</a>
      <table id="tabla-principal" class="table table-striped table-borderless">
          <thead>
              <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Tipo de Documento</th>
                  <th>Documento</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Grado actual</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($estudiantes as $estudiante)
              <tr>
                  <td>{{ $estudiante->nombres }}</td>
                  <td>{{ $estudiante->apellidos }}</td>
                  <td>{{ $estudiante->nombre_tipo_documento }}</td>
                  <td>{{ $estudiante->documento }}</td>
                  <td>{{ $estudiante->fecha_nacimiento }}</td>
                  <td>{{ $estudiante->grado }}</td>
                  <td>
                      <a href="{{route('editar_estudiante', $estudiante->id_estudiante)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $estudiante->id_estudiante }}', '{{ route('eliminar_estudiante')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
