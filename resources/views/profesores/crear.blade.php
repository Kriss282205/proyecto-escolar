@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid px-4">
      <h1>Añadir Profesor</h1>
      <form class="row" action= "{{route('guardar_profesor')}}" method="POST">
          @csrf
          <div class="form-group col-3">
              <label for="nombres">Nombres:</label>
              <input class="form-control" id="nombres" name="nombres" required>
          </div>
          <div class="form-group col-3">
              <label for="apellidos">Apellidos:</label>
              <input class="form-control" id="apellidos" name="apellidos" required>
          </div>
          <div class="form-group col-3">
              <label for="id_tipo_documento">Tipo documento</label>
              <select class="form-control" name="id_tipo_documento" id="id_tipo_documento">
                <option value="">Seleccione</option>
                @foreach ($tipos_documentos as $tipo_documento)
                    <option value="{{$tipo_documento->id_tipo_documento}}">{{$tipo_documento->nombre_tipo_documento}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-3">
              <label for="documento">Documento:</label>
              <input class="form-control" id="documento" name="documento" required>
          </div>
         <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
      </form>
  </div>
    <!-- /.content -->
  </div>
@endsection
