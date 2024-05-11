<?php
session_start();
require '../vendor/autoload.php';

use Clases\Usuarios;
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $nombreUsuario = $_POST['newUsername'];
    $emailUsuario = $_POST['newEmail'];
    $passUsuario = $_POST['newPassword'];
    $passRepetida = $_POST['confirmPassword'];

    // Instanciar la clase Usuarios
    $usuario = new Usuarios();

    // Verificar si el usuario ya está registrado
    if ($usuario->comprobarUsuario($emailUsuario, $nombreUsuario)) {
        echo "El usuario ya está registrado. Por favor, intenta con otro correo electrónico o nombre de usuario.";
        exit; // Detener la ejecución del script
    }

    // Verificar si las contraseñas coinciden
    if ($passUsuario !== $passRepetida) {
        echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        exit; // Detener la ejecución del script
    }

    // Hash de la contraseña
    $passHash = password_hash($passUsuario, PASSWORD_DEFAULT);

    // Realizar el registro del usuario
    try {
        if ($usuario->registroUsuario($nombreUsuario, $passHash, $emailUsuario)) {
            echo "¡Registro exitoso!"; // Registro exitoso
            // Redireccionar a la pagina de perfil de usuario
            header("Location: mi_perfil.php");
        } else {
            echo "Error al registrar el usuario."; // Error en el registro
        }
    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage(); // Capturar cualquier excepción
    }
} else {
    // Redireccionar si no se ha enviado el formulario
    header("Location: account.php");
    exit;
}


?>