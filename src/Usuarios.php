<?php

namespace Clases;

use PDO;
use PDOException;
use Exception;

class Usuarios extends Conexion
{
    private $rol;
    private $nombre;
    private $pass;
    private $email;
    // propiedades recogidas de otras tablas BD
    private $posts;
    private $proyectos;
    private $patrones;
    private $cursos;

    public function __construct()
    {
        parent::__construct();
    }

    function registroUsuario($nombre, $pass, $email)
    {
        $rol = 'user';
        $consulta = "INSERT INTO usuarios (rol, nombre, pass, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$rol, $nombre, $pass, $email]);
            return true;
        } catch (PDOException $ex) {
            throw new Exception("Error al crear usuario: " . $ex->getMessage());
            return false;
        }

        $this->conexion = null;
    }

    function verDatosUsuario($idUsuario)
    {
        $consulta = "SELECT nombre, email FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$idUsuario]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $ex) {
            throw new Exception("Error al obtener datos del usuario: " . $ex->getMessage());
        }

        $this->conexion = null;
    }

    function comprobarUsuario($emailUsuario)
    {
        $consulta = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$emailUsuario]);
            $numeroFilas = $stmt->fetchColumn();
            return $numeroFilas > 0;
        } catch (PDOException $ex) {
            throw new Exception("Error al verificar si el usuario está registrado: " . $ex->getMessage());
        }

        $this->conexion = null;
    }

    function comprobarRegistroUsuario($nombreUsuario, $emailUsuario)
    {
        $consultaEmail = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
        $stmtEmail = $this->conexion->prepare($consultaEmail);

        $consultaUsuario = "SELECT COUNT(*) FROM usuarios WHERE nombre = ?";
        $stmtUsuario = $this->conexion->prepare($consultaUsuario);

        try {
            // Comprobación del email
            $stmtEmail->execute([$emailUsuario]);
            $filasEmail = $stmtEmail->fetchColumn();

            // Comprobación del nombre de usuario
            $stmtUsuario->execute([$nombreUsuario]);
            $filasUsuario = $stmtUsuario->fetchColumn();

            // Verificar si el correo electrónico o el nombre de usuario ya están registrados
            if ($filasEmail > 0 || $filasUsuario > 0) {
                return true; // El usuario ya está registrado
            } else {
                return false; // El usuario no está registrado
            }
        } catch (PDOException $ex) {
            throw new Exception("Error al verificar si el usuario está registrado: " . $ex->getMessage());
        }
    }

    function verificarInicioSesion($nombreUsuario, $password)
    {
        $consulta = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute([$nombreUsuario]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si se encontró un usuario con el nombre dado
            if ($usuario) {
                // Verificar la contraseña
                if (password_verify($password, $usuario['pass'])) {
                    // Contraseña correcta, retornar los datos del usuario
                    return $usuario;
                } else {
                    // Contraseña incorrecta
                    return false;
                }
            } else {
                // No se encontró un usuario con el nombre dado
                return false;
            }
        } catch (PDOException $ex) {
            throw new Exception("Error al verificar los datos de inicio de sesión: " . $ex->getMessage());
        }

        $this->conexion = null;
    }

    public function actualizarPerfil($nombreUsuario, $emailUsuario, $passHash)
    {
        $consulta = "UPDATE usuarios SET nombre = ?, email = ?, pass = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $idUsuario = $_SESSION['usuario']['id']; // Suponiendo que tienes almacenado el ID del usuario en la sesión
            $stmt->execute([$nombreUsuario, $emailUsuario, $passHash, $idUsuario]);
            return true; // Perfil actualizado correctamente
        } catch (PDOException $ex) {
            throw new Exception("Error al actualizar el perfil: " . $ex->getMessage());
        }
    }

    // faltan funciones con inner join de cursos y patrones que obtenga el usuario
}
