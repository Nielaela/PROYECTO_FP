@extends('plantillas.base')

@section('titulo', 'Lista de Cursos')
@section('encabezado', 'Lista de Cursos')

@section('content')
<div class="container mt-4">
   <!-- Mensaje para usuarios no conectados -->
   @if (!$usuarioConectado)
   <div class="alert alert-warning mt-2" role="alert">
      ¡Inicia sesión para poder adquirir los cursos!.
   </div>
   @endif
    <div class="row">
        @foreach($cursos as $curso)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-img-container">
                        <img src="{{ $ruta_imagenes . '/' . $curso['imagen'] }}" class="card-img-top" alt="Imagen del curso">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $curso['titulo'] }}</h5>
                        <p class="card-text">{{ $curso['descripcion'] }}</p>
                        <p class="card-text">Dificultad: {{ $curso['nivel_dificultad'] }}</p>
                        <p class="card-text">Precio: ${{ $curso['precio'] }}</p>
                        @if ($usuarioConectado)
                        <form action="detalles_curso.php" method="GET">
                            <input type="hidden" name="id" value="{{ $curso['id'] }}">
                            <button type="submit" class="btn btn-primary">Ver detalles</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="../views/plantillas/js/verificar_sesion.js"></script>
@endsection
