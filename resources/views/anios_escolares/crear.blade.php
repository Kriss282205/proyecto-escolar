@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Años escolares</h1>
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
      <h1>Añadir año escolar</h1>
      <form class="row" action= "{{route('guardar_anio_escolar')}}" method="POST">
          @csrf
          <div class="form-group col-3">
              <label for="anio_escolar">Nombre:</label>
              <input class="form-control" id="anio_escolar" name="anio_escolar" required>
          </div>
         <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
      </form>
  </div>
    <!-- /.content -->
  </div>
@endsection
