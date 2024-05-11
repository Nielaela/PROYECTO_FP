<?php

namespace Clases;

use PDO;
use PDOException;
use Exception;

class Cursos extends Conexion
{
    private $titulo;
    private $descripcion;
    private $dificultad;
    private $duracion;
    private $precio;
    // propiedades recogidas de otras tablas BD
    private $usuarios;

    public function __construct()
    {
        parent::__construct();
    }

    function nuevoCurso($titulo, $descripcion, $dificultad, $precio)
    {
        $consulta = "INSERT INTO cursos (titulo, descripcion, nivel_dificultad, precio) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$titulo, $descripcion, $dificultad, $precio]);
            return true;
        } catch (PDOException $ex) {
            throw new Exception("Error al crear curso: " . $ex->getMessage());
            return false;
        }

        $this->conexion = null;
    }

    function verCurso($id_curso)
    {
        $consulta = "SELECT * FROM cursos WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$id_curso]);
            $curso = $stmt->fetch(PDO::FETCH_ASSOC);
            return $curso;
        } catch (PDOException $ex) {
            throw new Exception("Error al obtener curso: " . $ex->getMessage());
        }
    }

    function verListaCursos()
    {
        $consulta = "SELECT * FROM cursos";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute();
            $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cursos;
        } catch (PDOException $ex) {
            throw new Exception("Error al obtener la lista de cursos: " . $ex->getMessage());
        }
    }
}
