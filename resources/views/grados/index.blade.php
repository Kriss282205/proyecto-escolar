@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Grados</h1>
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
      <a href="{{ route('crear_grado') }}" class="btn btn-warning btn-sm">Añadir Grado</a>
      <table id="tabla-principal" class="table table-striped table-borderless">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach($grados as $grado)
              <tr>
                  <td>{{ $grado->grado }}</td>
                  <td style="width: 150px;">
                      <a href="{{route('editar_grado', $grado->id_grado)}}" class="btn btn-success btn-xs">Editar</a>
                      <div class="btn btn-danger btn-xs" onclick="eliminarTabla('{{ $grado->id_grado }}', '{{ route('eliminar_grado')}}');">Eliminar</div>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
