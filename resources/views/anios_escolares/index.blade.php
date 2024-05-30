@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Años escolares</h1>
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
      <a href="{{ route('crear_anio_escolar') }}" class="btn btn-warning btn-sm">Añadir año escolar</a>
      <table id="tabla-principal" class="table table-striped table-borderless">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Activo</th>
                  <th>Inactivo</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($anios_escolares as $anio_escolar)
              <tr>
                  <td>{{ $anio_escolar->anio_escolar }}</td>
                  <td>{{ $anio_escolar->estado_anio_escolar }}</td>
                  <td>{{ $anio_escolar->eliminado_anio_escolar }}</td>
                  <td>
                      <a href="{{route('editar_anio_escolar', $anio_escolar->id_anio_escolar)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $anio_escolar->id_anio_escolar }}', '{{ route('eliminar_anio_escolar')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
