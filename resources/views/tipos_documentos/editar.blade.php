@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container px-4">
      <h1>Añadir tipo de documento</h1>
      <form class="row" action= "{{route('actualizar_tipo_documento')}}" method="POST">
          @csrf
          <input type="hidden" name="id_tipo_documento" value="{{$tipo_documento->id_tipo_documento}}">
          <div class="form-group col-3">
              <label for="nombres">Nombres:</label>
              <input class="form-control" id="nombre_tipo_documento" name="nombre_tipo_documento" required value="{{$tipo_documento->nombre_tipo_documento}}">
          </div>
         <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Actualizar</button>
         </div>
      </form>
  </div>
    <!-- /.content -->
  </div>
@endsection
