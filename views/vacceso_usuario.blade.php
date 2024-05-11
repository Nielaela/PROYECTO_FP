@extends('plantillas.base')

@section('titulo', 'Mi cuenta')
@section('encabezado', 'Mi cuenta')

@section('content')

<div class="form-container">
    <div class="form-panel">
      <h3>Iniciar sesión</h3>
      <form action="mi_perfil.php" method="post">
        <div class="form-group">
          <label for="username">Usuario:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <button type="submit">Iniciar sesión</button>
        </div>
      </form>
    </div>
    <div class="form-panel">
      <h3>Registrarse</h3>
      <form action="valida_registro.php" method="post">
        <div class="form-group">
          <label for="newUsername">Usuario:</label>
          <input type="text" id="newUsername" name="newUsername" required>
        </div>
        <div class="form-group">
            <label for="newEmail">Correo:</label>
            <input type="text" id="email" name="newEmail" required>
          </div>
        <div class="form-group">
          <label for="newPassword">Contraseña:</label>
          <input type="password" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirmar contraseña:</label>
          <input type="password" id="confirmPassword" name="confirmPassword" required>
        </div>
        <div class="form-group">
          <button type="submit">Registrarse</button>
        </div>
      </form>
    </div>
  </div>
  
@endsection
{{-- revisar no esta funcionando  el JS --}}
{{-- @push('scripts')
<script src="../views/plantillas/js/validar_form.js"></script>
@endpush --}}