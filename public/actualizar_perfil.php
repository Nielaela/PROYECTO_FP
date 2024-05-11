<?php
session_start();
require '../vendor/autoload.php';

use Clases\Usuarios;

// Verificar si hay una sesión iniciada
if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión iniciada, redirigir al usuario a la página de inicio de sesión
    header("Location: account.php");
    exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreUsuario = $_POST['nombre'];
    $emailUsuario = $_POST['email'];
    $passUsuario = $_POST['password'];
    $passRepetida = $_POST['confirmPassword'];
    
    // Instanciar la clase Usuarios
    $usuario = new Usuarios();
    
    // Comprobar si el usuario (email)ya está en uso
    if ($usuario->comprobarUsuario($emailUsuario)) {
        echo "El usuario ya está en uso.";
        exit;
    }
       
    // Verificar que las contraseñas coincidan
    if ($passUsuario !== $passRepetida) {
        echo "Las contraseñas no coinciden.";
        exit;
    }
    
    // Hash de la contraseña
    $passHash = password_hash($passUsuario, PASSWORD_DEFAULT);
    
    try {
        // Realizar la actualización del perfil
        $usuario->actualizarPerfil($nombreUsuario, $emailUsuario, $passHash);
        
        // Mostrar mensaje de éxito
        echo "¡Perfil actualizado correctamente!";
        header("Location: mi_perfil.php");
    } catch (Exception $ex) {
        // Mostrar mensaje de error
        echo "Error al actualizar el perfil: " . $ex->getMessage();
    }
} else {
    // Redireccionar si no se ha enviado el formulario
    header("Location: mi_perfil.php");
    exit;
}
?>
