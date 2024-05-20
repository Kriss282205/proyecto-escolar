@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lapsos</h1>
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
      <h1>Añadir lapso</h1>
      <form class="row" action= "{{route('guardar_lapso')}}" method="POST">
          @csrf
          <div class="form-group col-3">
              <label for="nombres">Nombre:</label>
              <input class="form-control" id="nombres" name="nombres" required>
          </div>
         <div class="form-group col-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
      </form>
  </div>
    <!-- /.content -->
  </div>
@endsection
