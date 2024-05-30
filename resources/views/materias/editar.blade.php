@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Materias</h1>
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
      <h1>Editar materia</h1>
      <form class="row" action= "{{route('actualizar_materia')}}" method="POST">
          @csrf
          <input type="hidden" class="d-none" id="materias_grados_profesores" name="materias_grados_profesores">
          <input type="hidden" name="id_materia" value="{{$materia->id_materia}}">
          <div class="form-group col-3">
              <label for="nombres">Nombres:</label>
              <input class="form-control" id="nombres" name="nombres" required value="{{$materia->nombre_materia}}">
          </div>
          <div class="col-12">
            <h5>A continuación, seleccione los grados y profesores que tiene esta materia:</h5>
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th>Seleccione</th>
                        <th>Grado</th>
                        <th>Seleccione profesor</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($grados as $grado)
                    @php
                      $tiene_grado = false;
                    @endphp
                    @foreach($grados_materia as $grado_materia)
                      @if($grado->id_grado == $grado_materia->id_grado)
                        @php
                          $tiene_grado = true;
                        @endphp
                      @endif
                    @endforeach
                    <tr>
                        <td style="width: 30px; text-align: center;">
                          <input type="checkbox" class="grados" value="{{ $grado->id_grado }}"
                            @if($tiene_grado == true)
                              checked="true"
                            @endif
                          >
                        </td>
                        <td>{{ $grado->grado }}</td>
                        <td>
                          <select class="form-control id_profesor">
                            <option value="">Seleccione</option>
                            @foreach($profesores as $profesor)
                              <option value="{{ $profesor->id_profesor }}"
                                @if($tiene_grado == true)
                                  @foreach($grados_materia as $grado_materia)
                                    @if($profesor->id_profesor == $grado_materia->id_profesor && $grado->id_grado == $grado_materia->id_grado)
                                      selected="selected"
                                    @endif
                                  @endforeach
                                @endif
                              >
                                {{ $profesor->nombres }} {{ $profesor->apellidos }}
                              </option>
                            @endforeach
                          </select>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group col-12">
            <button type="button" class="btn btn-primary" onclick="guardarMateria();">Guardar</button>
            <button type="submit" id="guardar-materia" class="d-none">Enviar</button>
        </div>
      </form>
  </div>
    <!-- /.content -->
  </div>
@endsection
@section('scripts')
  <script type="text/javascript">
    function guardarMateria() {
      let grados = $('.grados');
      let id_profesores = $('.id_profesor');
      let materias_grados_profesores = [];
      for (let i = 0; i < grados.length; i++) {
        materias_grados_profesores.push({
          id_grado: grados[i].value,
          tiene_grado: grados[i].checked,
          id_profesor: id_profesores[i].value
        });
      }
      $('#materias_grados_profesores').val(JSON.stringify(materias_grados_profesores));
      $('#guardar-materia').click();
    }
  </script>
@endsection