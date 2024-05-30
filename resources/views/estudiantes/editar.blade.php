@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Estudiantes</h1>
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
      <h1>Añadir Estudiante</h1>
      <form class="row" action= "{{route('actualizar_estudiante')}}" method="POST">
          @csrf
          <input type="hidden" name="id_estudiante" value="{{$estudiante->id_estudiante}}">
          <div class="form-group col-3">
              <label for="nombres">Nombres:</label>
              <input class="form-control" id="nombres" name="nombres" required value="{{$estudiante->nombres}}">
          </div>
          <div class="form-group col-3">
              <label for="apellidos">Apellidos:</label>
              <input class="form-control" id="apellidos" name="apellidos" required value="{{$estudiante->apellidos}}">
          </div>
          <div class="form-group col-3">
              <label for="id_tipo_documento">Tipo documento</label>
              <select class="form-control" name="id_tipo_documento" id="id_tipo_documento">
                <option value="">Seleccione</option>
                @foreach ($tipos_documentos as $tipo_documento)
                    <option value="{{$tipo_documento->id_tipo_documento}}" @if($tipo_documento->id_tipo_documento == $estudiante->id_tipo_documento) selected="selected" @endif>
                      {{$tipo_documento->nombre_tipo_documento}}
                    </option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-3">
              <label for="documento">Documento:</label>
              <input class="form-control" id="documento" name="documento" required value="{{$estudiante->documento}}">
          </div>
          <div class="form-group col-3">
              <label for="fecha_nacimiento">Fecha de nacimiento:</label>
              <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required value="{{$estudiante->fecha_nacimiento}}">
         </div>
         <div class="form-group col-3">
              <label for="id_grado">Grado:</label>
              <select class="form-control" name="id_grado" id="id_grado">
                <option value="">Seleccione</option>
                @foreach ($grados as $grado)
                    <option value="{{$grado->id_grado}}" @if($grado->id_grado == $estudiante->id_grado_actual) selected @endif>
                      {{$grado->grado}}
                    </option>
                @endforeach
            </select>
        </div>
         <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Actualizar</button>
         </div>
      </form>
  </div>
    <!-- /.content -->
  </div>
@endsection
