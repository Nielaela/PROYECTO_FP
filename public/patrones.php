<?php
session_start();
require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Patrones;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

// Verificar si hay un mensaje en la variable de sesión
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : null;

// Limpiar la variable de sesión después de obtener el mensaje
unset($_SESSION['mensaje']);

// Verificar si hay una sesión iniciada
$usuarioConectado = isset($_SESSION['usuario']);

//Ruta para obtener la imágen desde el servidor
$ruta_imagenes = "../views/plantillas/recursos/recursos_patrones/";

$patron = new Patrones();

//control filtrado AJAX NO FUNCIONA ----REVISAR-------
// Verifica si se ha enviado el parámetro 'categoria' en la URL
if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    // Llama a la función que obtiene la lista de patrones filtrada por categoría
    $patronesFiltrados = $patron->verListaPatronesPorCategoria($categoria); 
    // Devuelve la lista de patrones como respuesta JSON
    echo json_encode($patronesFiltrados);
    exit; 
}
// Si no se proporciona el parámetro 'categoria', devuelve la lista de patrones completa
$patrones = $patron->verListaPatrones();
echo $blade
->view()
->make('vlista_patrones', [
    'patrones' => $patrones,
    'ruta_imagenes' => $ruta_imagenes,
    'usuarioConectado' => $usuarioConectado,
    'mensaje' => $mensaje
])
->render();
?>