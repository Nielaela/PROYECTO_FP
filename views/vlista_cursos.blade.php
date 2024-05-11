@extends('plantillas.base')

@section('titulo', 'Lista de Cursos')
@section('encabezado', 'Lista de Cursos')

@section('content')
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
                    <form action="detalles_curso.php" method="GET">
                        <input type="hidden" name="id" value="{{ $curso['id'] }}">
                        <button type="submit" class="btn btn-primary">Ver detalles</button>
                    </form>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
