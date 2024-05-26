<?php
session_start();
require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Patrones;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

// Verificar si hay una sesión iniciada
$usuarioConectado = isset($_SESSION['usuario']);

//adicion de ruta generica de las imagenes del patron
$ruta_imagen = "../views/plantillas/recursos/recursos_patrones/";
$ruta_manual = "../views/plantillas/recursos/recursos_patrones/";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_patron = $_GET['id'];
    
    $patron = new Patrones();
    $patron_detalle = $patron->verPatron($id_patron);
}
echo $blade
    ->view()
    ->make('vpatron_detalle', [
        'patron_detalle' => $patron_detalle, 
        'ruta_imagen' => $ruta_imagen, 
        'ruta_manual' => $ruta_manual ,
        'usuarioConectado' => $usuarioConectado

    ])
    ->render();
?>