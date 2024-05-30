@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Secciones</h1>
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
      <a href="{{ route('crear_seccion') }}" class="btn btn-warning btn-sm">Añadir seccion</a>
      <table id="tabla-principal" class="table table-striped table-borderless">
          <thead>
              <tr>
                  <th>Grado</th>
                  <th>Sección</th>
                  <th>Activo</th>
                  <th>Inactivo</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($secciones as $seccion)
              <tr>
                  <td>{{ $seccion->grado }}</td>
                  <td>{{ $seccion->seccion }}</td>
                  <td>{{ $seccion->estado_seccion }}</td>
                  <td>{{ $seccion->eliminado_seccion }}</td>
                  <td>
                      <a href="{{route('editar_seccion', $seccion->id_seccion)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $seccion->id_seccion }}', '{{ route('eliminar_seccion')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
