<?php

namespace Clases;

use PDO;
use PDOException;
use Exception;

class Patrones extends Conexion
{
    private $nombre;
    private $descripcion;
    private $dificultad;
    private $categoria;
    private $imagen;
    private $manualPatron;
    // propiedades recogidas de otras tablas BD
    private $usuarios;

    public function __construct()
    {
        parent::__construct();
    }
    function nuevoPatron($nombre, $descripcion, $dificultad, $categoria, $idUsuario, $imagen, $manualPatron)
    {
        // Directorio donde se guardarán los archivos
        $directorio = '../views/plantillas/recursos/recursos_patrones/';

        // Nombre del archivo de imagen y manual
        $nombreImagen = $imagen['name'];
        $nombreManual = $manualPatron['name'];

        // Ruta completa de los archivos
        $rutaImagen = $directorio . $nombreImagen;
        $rutaManual = $directorio . $nombreManual;

        // Mover archivos a la carpeta de destino
        move_uploaded_file($imagen['tmp_name'], $rutaImagen);
        move_uploaded_file($manualPatron['tmp_name'], $rutaManual);

        $consulta = "INSERT INTO patrones (nombre, descripcion, nivel_dificultad, categoria, idUsuario, imagen, manual_patron) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$nombre, $descripcion, $dificultad, $categoria, $idUsuario, $nombreImagen, $nombreManual]);
            return true;
        } catch (PDOException $ex) {
            // En caso de error, puedes manejarlo como desees
            throw new Exception("Error al añadir patrón: " . $ex->getMessage());
            return false;
        }

        $this->conexion = null;
    }

    function verPatron($id_patron)
    {
        $consulta = "SELECT * FROM patrones WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$id_patron]);
            $curso = $stmt->fetch(PDO::FETCH_ASSOC);
            return $curso;
        } catch (PDOException $ex) {
            throw new Exception("Error al obtener el patron: " . $ex->getMessage());
        }
    }

    function verListaPatrones()
    {
        $consulta = "SELECT p.*, u.nombre AS nombre_usuario 
        FROM patrones p 
        INNER JOIN usuarios u ON p.idUsuario = u.id";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute();
            $patrones = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $patrones;
        } catch (PDOException $ex) {
            throw new Exception("Error al obtener la lista de patrones: " . $ex->getMessage());
        }
    }

    function verListaPatronesPorCategoria($categoria)
    {
        $consulta = "SELECT p.*, u.nombre AS nombre_usuario 
                     FROM patrones p 
                     INNER JOIN usuarios u ON p.idUsuario = u.id 
                     WHERE p.categoria = ?";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$categoria]);
            $patrones = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $patrones;
        } catch (PDOException $ex) {
            throw new Exception("Error al obtener la lista de patrones por categoría: " . $ex->getMessage());
        }
    }
}
