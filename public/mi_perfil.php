<?php
session_start();
require '../vendor/autoload.php';

use Clases\Usuarios;
use Philo\Blade\Blade;

// Verificar si hay una sesión iniciada
if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión iniciada, redirigir al usuario a la página de inicio de sesión
    header("Location: account.php");
    exit;
}

$error = null;
$datosUsuario = $_SESSION['usuario'];

// Instanciar la clase Usuarios para obtener los datos del usuario desde la base de datos
$usuario = new Usuarios();
$datosUsuarioBD = $usuario->verDatosUsuario($datosUsuario['id']);

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // No necesitas verificar el inicio de sesión aquí, ya que el usuario ya está autenticado
    // No hagas nada aquí o redirige al usuario nuevamente a la página de inicio de sesión
    // Aquí deberías manejar el formulario de actualización de perfil si lo hay
}

// Instancia de Blade
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

// Renderizar la vista de Blade
echo $blade->view()->make('vmi_perfil', ['usuario' => $datosUsuarioBD, 'error' => $error])->render();
?>
