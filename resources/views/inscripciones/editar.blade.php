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
      <h1>Editar inscripción de alumno en año escolar</h1>
      <form class="row" action= "{{route('actualizar_inscripcion')}}" method="POST">
          @csrf
          <input type="hidden" name="id_inscripcion" value="{{$inscripcion->id_inscripcion}}">
          <div class="form-group col-3">
              <label for="id_anio_escolar">Año escolar</label>
              <select class="form-control" name="id_anio_escolar" id="id_anio_escolar">
                <option value="">Seleccione</option>
                @foreach ($anios_escolares as $anio_escolar)
                    <option value="{{$anio_escolar->id_anio_escolar}}" @if($anio_escolar->id_anio_escolar == $inscripcion->id_anio_escolar) selected @endif>
                      {{$anio_escolar->anio_escolar}}
                    </option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-3">
              <label for="id_seccion">Grado/sección</label>
              <select class="form-control" name="id_seccion" id="id_seccion">
                <option value="">Seleccione</option>
                @foreach ($secciones as $seccion)
                    <option value="{{$seccion->id_seccion}}" @if($seccion->id_seccion == $inscripcion->id_seccion) selected @endif>
                      {{$seccion->grado}} {{$seccion->seccion}}
                    </option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-3">
              <label for="id_estudiante">Estudiante</label>
              <select class="form-control" name="id_estudiante" id="id_estudiante">
                <option value="">Seleccione</option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{$estudiante->id_estudiante}}" @if($estudiante->id_estudiante == $inscripcion->id_estudiante) selected @endif>
                      {{$estudiante->nombres}} {{$estudiante->apellidos}}
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
