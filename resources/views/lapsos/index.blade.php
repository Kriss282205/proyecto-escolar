@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lapsos</h1>
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
      <a href="{{ route('crear_lapso') }}" class="btn btn-warning btn-sm">Añadir lapso</a>
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
              @foreach($lapsos as $lapso)
              <tr>
                  <td>{{ $lapso->lapso }}</td>
                  <td>{{ $lapso->estado_lapso }}</td>
                  <td>{{ $lapso->eliminado_lapso }}</td>
                  <td>
                      <a href="{{route('editar_lapso', $lapso->id_lapso)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $lapso->id_lapso }}', '{{ route('eliminar_lapso')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
