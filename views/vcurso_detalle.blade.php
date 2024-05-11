@extends('plantillas.base')

@section('titulo', 'Detalles del Curso')
@section('encabezado', 'Detalles del Curso')

@section('content')
    <div class="container my-4">
        @if($curso_detalle)
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $ruta_imagen . '/' . $curso_detalle['imagen'] }}" alt="Imagen del curso" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <h2>{{ $curso_detalle['titulo'] }}</h2>
                    <p>{{ $curso_detalle['descripcion'] }}</p>
                    <p>Dificultad: {{ $curso_detalle['nivel_dificultad'] }}</p>
                    <p>Precio: ${{ $curso_detalle['precio'] }}</p>
                    <p>Manual del curso: <a href="{{ $ruta_manual . '/' . $curso_detalle['manual_pdf'] }}" class="btn btn-primary">Descargar</a></p>
                </div>
            </div>
        @else
            <p>No se encontró información para este curso.</p>
        @endif
    </div>
@endsection
