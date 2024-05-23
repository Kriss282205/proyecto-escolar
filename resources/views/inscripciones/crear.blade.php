@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inscripciones</h1>
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
    <div class="container px-4">
      <h1>Inscribir alumno en año escolar</h1>
      <form class="row" action= "{{route('guardar_inscripcion')}}" method="POST">
          @csrf
          <div class="form-group col-3">
              <label for="id_anio_escolar">Año escolar</label>
              <select class="form-control" name="id_anio_escolar" id="id_anio_escolar">
                <option value="">Seleccione</option>
                @foreach ($anios_escolares as $anio_escolar)
                    <option value="{{$anio_escolar->id_anio_escolar}}">{{$anio_escolar->anio_escolar}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-3">
              <label for="id_seccion">Grado/sección</label>
              <select class="form-control" name="id_seccion" id="id_seccion">
                <option value="">Seleccione</option>
                @foreach ($secciones as $seccion)
                    <option value="{{$seccion->id_seccion}}">{{$seccion->grado}} {{$seccion->seccion}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-3">
              <label for="id_estudiante">Estudiante</label>
              <select class="form-control" name="id_estudiante" id="id_estudiante">
                <option value="">Seleccione</option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{$estudiante->id_estudiante}}">{{$estudiante->nombres}} {{$estudiante->apellidos}}</option>
                @endforeach
              </select>
          </div>
         <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
      </form>
  </div>
    <!-- /.content -->
  </div>
@endsection
