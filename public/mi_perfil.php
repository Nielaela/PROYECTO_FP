<?php
session_start();
require '../vendor/autoload.php';

use Clases\Usuarios;
use Philo\Blade\Blade;

// Verificar si se han enviado datos desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado los campos de usuario y contraseña
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Instanciar la clase Usuarios para verificar las credenciales
        $usuario = new Usuarios();
        // Verificar las credenciales utilizando la función verificarInicioSesion
        $datosUsuario = $usuario->verificarInicioSesion($_POST['username'], $_POST['password']);

        if ($datosUsuario) {
            // Si las credenciales son correctas, establece la sesión del usuario
            $_SESSION['usuario'] = $datosUsuario;

            // Redirige al usuario a su perfil
            header("Location: mi_perfil.php");
            exit;
        } else {
            // Si las credenciales son incorrectas, muestra un mensaje de error y redirige al usuario a la página de inicio de sesión
            $error = "Usuario o contraseña incorrectos.";
            header("Location: account.php?error=" . urlencode($error));
            exit;
        }
    } else {
        // Si no se enviaron todos los campos necesarios, redirige al usuario a la página de inicio de sesión
        header("Location: account.php");
        exit;
    }
}

// Si el usuario accede directamente a mi_perfil.php sin enviar el formulario de inicio de sesión,
// Verificar si hay una sesión iniciada
if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión iniciada, redirigir al usuario a la página de inicio de sesión
    header("Location: account.php");
    exit;
}

$datosUsuario = $_SESSION['usuario'];

// Instanciar la clase Usuarios para obtener los datos del usuario desde la base de datos
$usuario = new Usuarios();
$datosUsuarioBD = $usuario->verDatosUsuario($datosUsuario['id']);

// Instancia de Blade
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

// Renderizar la vista de Blade
echo $blade->view()->make('vmi_perfil', ['usuario' => $datosUsuarioBD])->render();
?>
