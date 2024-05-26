@extends('plantillas.base')

@section('titulo', 'Detalles del Patrón')
@section('encabezado', 'Detalles del Patrón')

@section('content')
    <div class="container my-4">
        @if($patron_detalle)
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $ruta_imagen . '/' . $patron_detalle['imagen'] }}" alt="Imagen del patrón" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <h2>{{ $patron_detalle['nombre'] }}</h2>
                    <p>{{ $patron_detalle['descripcion'] }}</p>
                    <p>Dificultad: {{ $patron_detalle['nivel_dificultad'] }}</p>
                    <p>Cetgoria: {{ $patron_detalle['categoria'] }}</p>
                    <p>Creador: {{ $patron_detalle['nombre_usuario'] }}</p>
                    <p>Manual del patron: <a href="{{ $ruta_manual . '/' . $patron_detalle['manual_patron'] }}" id = "boton-descargar" class="btn btn-primary">Descargar</a></p>
                </div>
            </div>
        @else
            <p>No se encontró información para este patron.</p>
        @endif
    </div>
@endsection
<script>
    var usuarioConectado = @json($usuarioConectado);
    
<script src="../views/plantillas/js/verificar_sesion.js"></script>
