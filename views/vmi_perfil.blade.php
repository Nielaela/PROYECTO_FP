@extends('plantillas.base')

@section('titulo', 'Mi Perfil')
@section('encabezado', 'Mi Perfil')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Datos Personales</h3>
                    <p class="card-text">Nombre de usuario: {{ $usuario['nombre'] }}</p>
                    <p class="card-text">Correo electrónico: {{ $usuario['email'] }}</p>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Cursos</h3>
                    {{-- añadir datos relativos a cursos en posesion, patrones, etc: --}}
                </div>
                <div class="card-body">
                    <h3 class="card-title">Patrones</h3>
                    @if($patronesEnPosesion)
                    <ul>
                        @foreach($patronesEnPosesion as $patron)
                            <li style="display: flex; align-items: center;">
                                <span>{{ $patron['nombre'] }}</span>
                                <span>
                                    <form action="detalles_patron.php" method="GET">
                                        <input type="hidden" name="id" value="{{ $patron['id'] }}">
                                        <button type="submit" class="btn btn-secondary">Ver detalles</button>
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    
                @else
                    <p>No tienes ningún patrón en posesión actualmente.</p>
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <button class="btn btn-primary" onclick="mostrarFormulario()">Modificar datos</button>
                </div>
                <div id="formulario-accion" style="display: none;">
                    <div class="card-body">
                        <form action="actualizar_perfil.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nuevo nombre de usuario:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Nuevo correo electrónico:</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="newPassword">Nueva contraseña:</label>
                                <input type="password" id="password" name="password" required>
                              </div>
                              <div class="form-group">
                                <label for="confirmPassword">Confirmar nueva contraseña:</label>
                                <input type="password" id="confirmPassword" name="confirmPassword" required>
                              </div>

                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../views/plantillas/js/mostrar_formulario.js"></script>
</script>
@endsection
