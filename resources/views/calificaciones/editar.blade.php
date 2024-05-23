@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calificaciones</h1>
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
      <h5>Registrar calificación a <b>{{ $calificacion->apellidos }} {{ $calificacion->nombres }}</b> en la materia <b>{{ $calificacion->nombre_materia }} de {{ $calificacion->grado }} para el {{ $calificacion->lapso }}</b></h5>
      <form class="row" action= "{{route('actualizar_calificacion')}}" method="POST">
          @csrf
          <input type="hidden" name="id_calificacion" value="{{$calificacion->id_calificacion}}">
          <div class="form-group col-3">
              <label for="calificacion">Nota:</label>
              <input type="number" class="form-control" id="calificacion" name="calificacion" required value="{{$calificacion->calificacion}}">
          </div>
         <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Actualizar</button>
         </div>
      </form>
  </div>
    <!-- /.content -->
  </div>

@endsection