<?php
session_start();
require '../vendor/autoload.php';

use Clases\Usuarios;

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreUsuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];

    $usuario = new Usuarios();

    // Verificar las credenciales de inicio de sesión
    $usuarioValidado = $usuario->verificarInicioSesion($nombreUsuario, $password);
    if ($usuarioValidado) {
        // Inicio de sesión exitoso, establecer la sesión del usuario
        $_SESSION['usuario'] = $usuarioValidado;
        header("Location: index.php");
        exit;

    } else {
        header("Location: account.php?error=credenciales_invalidas");
        exit;
    }
} else {
    // Si no se envió el formulario de inicio de sesión, redirigir al usuario a alguna página
    header("Location: index.php");
    exit;
}
