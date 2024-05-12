<?php
session_start();

require '../vendor/autoload.php';

use Clases\Patrones;

// Verifica si hay una sesión de usuario iniciada
if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión iniciada, redirige al usuario a la página de inicio de sesión o muestra un mensaje de error
    header("Location: login.php?error=not_logged_in");
    exit();
}

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si todos los campos necesarios están presentes
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['nivel_dificultad']) && isset($_POST['categoria']) && isset($_FILES['imagen']) && isset($_FILES['manual'])) {
        // Obtén los valores del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $nivel_dificultad = $_POST['nivel_dificultad'];
        $categoria = $_POST['categoria'];
        $imagen = $_FILES['imagen'];
        $manual = $_FILES['manual'];

        // Instancia la clase para manejar los patrones
        $patron = new Patrones();
        $idUsuario = $_SESSION['usuario']['id'];
        try {
            if ($patron->nuevoPatron($nombre, $descripcion, $nivel_dificultad, $categoria, $idUsuario, $imagen, $manual)) {
                header("Location: patrones.php");
                exit();
            } else {
                echo "Error al agregar el patrón.";
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
    } else {
        // Si no se proporcionan todos los campos necesarios, muestra un mensaje de error
        echo "Por favor, complete todos los campos.";
    }
} else {
    // Si no se envió el formulario mediante el método POST, redirecciona a alguna otra página o muestra un mensaje adecuado.
    // Por ejemplo:
    // header("Location: alguna_pagina.php");
    // exit();
    echo "Acceso denegado.";
}