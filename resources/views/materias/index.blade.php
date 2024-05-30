@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Materias</h1>
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
      <a href="{{ route('crear_materia') }}" class="btn btn-warning btn-sm">Añadir Materia</a>
      <table id="tabla-principal" class="table table-striped table-borderless">
          <thead>
              <tr>
                  <th>Materia</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($materias as $materia)
              <tr>
                  <td>{{ $materia->nombre_materia }}</td>
                  <td style="width: 150px;">
                      <a href="{{route('editar_materia', $materia->id_materia)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $materia->id_materia }}', '{{ route('eliminar_materia')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
