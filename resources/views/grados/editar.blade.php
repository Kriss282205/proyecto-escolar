@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container px-4">
      <h1>Añadir Grado</h1>
      <form class="row" action= "{{route('actualizar_grado')}}" method="POST">
          @csrf
          <input type="hidden" name="id_grado" value="{{$grado->id_grado}}">
          <div class="form-group col-3">
              <label for="nombres">Nombres:</label>
              <input class="form-control" id="nombres" name="nombres" required value="{{$grado->grado}}">
          </div>
          <div class="form-group col-12">
              <label for="ids_materias">Seleccione las materias que cursan el grado a crear:</label>
              <select class="form-control select2" name="ids_materias[]" id="ids_materias" multiple="multiple" required value="{{ $materias_grados }}">
                @foreach ($materias as $materia)
                    <option value="{{$materia->id_materia}}">{{$materia->nombre_materia}}</option>
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
@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
        var selectedIds = @json($materias_grados);
        $('#ids_materias').val(selectedIds).trigger('change');
    });
</script>
@endsection