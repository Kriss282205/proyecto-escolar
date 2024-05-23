@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profesores</h1>
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
    <div class="container px-4">
      <h4> Lista </h4>
      <a href="{{ route('crear_profesor') }}" class="btn btn-warning btn-sm">Añadir Profesor</a>
      <table class="table">
          <thead>
              <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Tipo de Documento</th>
                  <th>Documento</th>
                  <th>Activo</th>
                  <th>Inactivo</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($profesores as $profesor)
              <tr>
                  <td>{{ $profesor->nombres }}</td>
                  <td>{{ $profesor->apellidos }}</td>
                  <td>{{ $profesor->nombre_tipo_documento }}</td>
                  <td>{{ $profesor->documento }}</td>
                  <td>{{ $profesor->estado_profesor }}</td>
                  <td>{{ $profesor->eliminado_profesor }}</td>
                  <td>
                      <a href="{{route('editar_profesor', $profesor->id_profesor)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $profesor->id_profesor }}', '{{ route('eliminar_profesor')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
