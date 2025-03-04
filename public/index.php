<?php
session_start();
require '../vendor/autoload.php';

use Philo\Blade\Blade;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

echo $blade
->view()
->make('vindex')
->render();

?>