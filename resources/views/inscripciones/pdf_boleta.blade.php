<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="fondo"></div>

    <header>
        <div style="width: 100%; text-align: center; font-size: 0.35cm;">
            <br>
            <br>
            MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN<br>
            UNIDAD EDUCATIVA ANTONIO MIGUET LETTERON<br>
            TACARIGUA ESTADO CARABOBO
        </div>
    </header>
    
    <main>
        <div class="titulo-principal-documento">
            AÑO ESCOLAR {{$inscripcion->anio_escolar}}<br>
            SECCIÓN {{$inscripcion->seccion}}
        </div>
        <div style="width: 100%; text-align: center; font-size: 0.35cm;">
            <br>
            <br>
            BOLETÍN INFORMATIVO DEL RENDIMIENTO ESTUDIANTIL
        </div>
        <div class="titulos-documento">{{$inscripcion->nombres}} {{$inscripcion->apellidos}} {{$inscripcion->nombre_tipo_documento}}: {{$inscripcion->documento}}</div>
        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    @foreach($lapsos as $lapso)
                        <th>{{ $lapso->lapso }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($calificaciones as $calificacion)
                   <tr>
                       <td> {{$calificacion->nombre_materia}}</td>
                       @foreach($lapsos as $lapso)
                            <td>
                                @if($lapso->id_lapso == $calificacion->id_lapso)
                                    {{ $calificacion->calificacion }}
                                @endif
                            </td>
                        @endforeach
                   </tr>
               @endforeach
            </tbody>
        </table>
    </main>
</body>
<style>

    /*::::::::::::::::::::generales::::::::::::::::::::*/
    /*:::::::::::::::::::::::::::::::::::::::::::::::::*/

    @page {
        margin: 0cm 0cm;
        font-family: "sans-serif";
    }

    * {
        font-family: "sans-serif";
        box-sizing: border-box;
        color: #343a40;
    }

    body {
        margin: 3cm 1cm 2cm 1cm;
        /*border:2px solid red;*/
        padding:0px;
        {{--background-image: url('{{ asset('imagenes/logo.png') }}');--}}
        background-repeat: no-repeat;
        background-position: center;
        background-size: 50%;
        z-index: 1;
    }

    .fondo {
        width: 100%;
        background-color: rgba(255,255,255,0.8);
        margin:0px;
        padding:0px;
        position: fixed;
        height: 200%;
        z-index: -1;
        /*border:2px solid green;*/
    }

    .textarea {
        width: 100%;
        /*border: 1px solid red;*/
        border: 0px;
        height: auto;
        font-size: 0.32cm;
        padding: 0px;
        background-color: rgba(0,0,0,0);
    }

    /*:::::::::::::::::::::header::::::::::::::::::::::*/
    /*:::::::::::::::::::::::::::::::::::::::::::::::::*/

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 3cm;
        text-align: center;
        /*border:2px solid orange;*/
    }

    .contenedor-imagen-logo {
        width: 35%;
        height: 3cm;
        float: left;
        /*border: 2px solid gray;*/
    }

    .imagen-logo {
        height: 2cm;
        margin-top:0.5cm;
    }

    .razon-social {
        height: 0.5cm;
        /*border:1px solid pink;*/
    }

    .contenedor-numero-documento {
        width: 65%;
        float: left;
        height: 3cm;
        /*border: 2px solid red;*/
    }

    .titulo-numero-documento {
        margin-top: 1cm;
        height: 0.8cm;
        width: 69%;
        text-align: right;
        /*border:1px solid blue;*/
        float: left;
        padding-top: 0.05cm;
    }

    .numero-documento {
        margin-top: 1cm;
        height: 1cm;
        width: 23%;
        text-align: right;
        color: red;
        padding-right: 1cm;
        font-size: 0.5cm;
        /*border: 1px solid green;*/
        float: right;

    }

    .fecha-documento {
        margin-top: 2cm;
        height: 0.5cm;
        /*border:1px solid pink;*/
        text-align: right;
        padding-right: 1cm;
        width: 90%;
        float: right;
        padding-top: 0.5cm;
    }

    /*:::::::::::::::::::::cuerpo::::::::::::::::::::::*/
    /*:::::::::::::::::::::::::::::::::::::::::::::::::*/

    main {
        z-index: 2;
        padding:0px;
        /*border: 1px solid #282828;*/
    }

    .titulo-principal-documento {
        text-align: center;
        margin-top: 1cm!important;
        font-weight: bold;
        text-transform: uppercase;
    }

    .subtitulo-principal-documento {
        text-align: center;
        margin-top: 0.1cm!important;
        text-transform: uppercase;
        font-size: 0.32cm;
    }

    .contenedor-informacion-paciente {
        width: 100%;
        border-bottom: 1px solid red;
        height: 2.4cm;
    }

    .titulos-documento {
        margin-top:0.5cm;
        font-size: 0.35cm;
        text-transform: uppercase;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid black;
    }

    th {
        /*border:1px solid #282828;*/
        text-align: left;
        font-weight: 400;
        border: 1px solid black;
        font-size: 0.35cm;
    }

    tr {
        /*border:1px solid #282828;*/
        width: 100%;
        border: 1px solid black;
    }

    td {
        /*border:1px solid #282828;*/
        border: 1px solid black;
        font-size: 0.35cm;
    }

    .tc {
        text-align: center;
    }

    .tl {
        text-align: left;
    }

    .fb {
        font-weight: bold;
    }

    .tb {
        border: 1px solid #343a40;
    }

    .numero-consecutivo {
        width: 50px;
    }

    .thead-oscuro {
        background-color: #343a40;
    }

    .thead-oscuro > tr > th {
        color: #ffffff!important;
        padding: 0.15cm;
        font-weight: bold;
        font-size: 0.35cm;
    }

    .tbody-oscuro > .odd{
        background-color: rgba(220,220,220,0.5);
    }

    .tbody-oscuro > .even{
        background-color: rgba(250,250,250,0.5);
    }

    .tbody-oscuro > tr > td {
        padding: 0.15cm;
        font-size: 0.32cm;
    }

    .label-celda {
        width: 100%;
        /*border: 1px solid blue;*/
        font-size: 8px;
        padding-left: 2px;
    }

    .valor-celda {
        width: 100%;
        /*border: 1px solid red;*/
        font-size: 12px;
        padding-left: 2px;
    }

    .contenedor-itinerario {
        width: 100%;
    }

    .contenedor-condiciones {
        width: 100%;
    }

    .precio-soles {
        height: 1cm;
        width: 49%;
        font-size: 0.5cm;
        text-align: right;
        float: left;
    }

    .precio-dolares {
        height: 1cm;
        width: 49%;
        font-size: 0.5cm;
        text-align: right;
        float: right;
    }

    .incluye-iva {
        margin-top: 0.4cm;
        color: red;
        width: 100%;
        text-align: right;
        font-size: 0.35cm;
    }

    .textos-cuentas {
        font-size: 10px;
    }

    /*:::::::::::::::::::::footer::::::::::::::::::::::*/
    /*:::::::::::::::::::::::::::::::::::::::::::::::::*/

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        text-align: center;
        font-size: 12px;
        line-height: 12px;
    }

</style>
</html>