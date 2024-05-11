<?php
session_start();
require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Cursos;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);


//adicion de ruta generica de las imagenes del curso
$ruta_imagen = "../views/plantillas/recursos/images_cursos";
$ruta_manual = "../views/plantillas/recursos/manuales";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_curso = $_GET['id'];
    
    $curso = new Cursos();
    $curso_detalle = $curso->verCurso($id_curso);
}

echo $blade
    ->view()
    ->make('vcurso_detalle', [
        'curso_detalle' => $curso_detalle, 
        'ruta_imagen' => $ruta_imagen, 
        'ruta_manual' => $ruta_manual 
    ])
    ->render();
?>