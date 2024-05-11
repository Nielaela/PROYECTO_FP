<?php
session_start();
require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Cursos;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

//adicion de ruta generica de las imagenes del curso
$ruta_imagenes = "../views/plantillas/recursos/images_cursos";

$curso = new Cursos();
$cursos = $curso->verListaCursos();

echo $blade
->view()
->make('vlista_cursos', [
    'cursos' => $cursos,
    'ruta_imagenes' => $ruta_imagenes
])
->render();
?>