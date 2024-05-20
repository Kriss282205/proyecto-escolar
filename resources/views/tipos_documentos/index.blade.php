@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tipos de documentos</h1>
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
      <a href="{{ route('crear_tipo_documento') }}" class="btn btn-warning btn-sm">Añadir tipo de documento</a>
      <table class="table">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Activo</th>
                  <th>Inactivo</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($tipos_documentos as $tipo_documento)
              <tr>
                  <td>{{ $tipo_documento->nombre_tipo_documento }}</td>
                  <td>{{ $tipo_documento->estado_tipo_documento }}</td>
                  <td>{{ $tipo_documento->eliminado_tipo_documento }}</td>
                  <td>
                      <a href="{{route('editar_tipo_documento', $tipo_documento->id_tipo_documento)}}" class="btn btn-success btn-xs">Editar</a>
                      <form action="/tipos_documentos/{{ $tipo_documento->id_tipo_documento}}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
