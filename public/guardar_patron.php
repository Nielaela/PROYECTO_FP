<?php
session_start();
require '../vendor/autoload.php';

use Clases\Usuarios;
// Verificar si el usuario está conectado
if (!isset($_SESSION['usuario'])) {
    // Si el usuario no está conectado, redirigirlo a la página de inicio de sesión o mostrar un mensaje de error
    header("Location: inicio_sesion.php");
    exit;
}

// Obtener el ID del usuario de la sesión
$id_usuario = $_SESSION['usuario']['id'];

// Obtener el ID del patrón a agregar
$id_patron = $_POST['id_patron'];

$usuario = new Usuarios();

// Verificar si el patrón ya está en la colección del usuario
if ($usuario->patronEnColeccion($id_usuario, $id_patron)) {
    // Almacenar el mensaje en una variable de sesión
    $_SESSION['mensaje'] = "Ya tienes este patrón en tu colección";
} else {
    // Si el patrón no está en la colección del usuario, agregarlo
    $usuario->agregarPatronAColeccion($id_usuario, $id_patron);
    // Almacenar el mensaje en una variable de sesión
    $_SESSION['mensaje'] = "El patrón se ha guardado en tu colección";
}

// Redirigir de vuelta a la página de lista de patrones
header("Location: patrones.php");
exit;
// Redirigir de vuelta a la página de lista de patrones o a alguna otra página según sea necesario
header("Location: patrones.php");
exit;
?>
