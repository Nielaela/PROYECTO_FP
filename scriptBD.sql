-- Volcando estructura de base de datos para proyecto
CREATE DATABASE IF NOT EXISTS `ripoll_daniela_proyecto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ripoll_daniela_proyecto`;

-- Tablas principales
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(50) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    pass VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    idPost INT,
    idProyecto INT,
    idPatron INT,
    idCurso INT
);

CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    nivel_dificultad VARCHAR(50) NOT NULL,
    duracion VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255),
    manual_pdf VARCHAR(255),
    idUsuario INT
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    fecha_publicacion DATE NOT NULL,
    idUsuario INT
);

CREATE TABLE patrones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    nivel_dificultad VARCHAR(50) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    idUsuario INT
);

CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    fecha_publicacion DATE NOT NULL,
    idUsuario INT
);

-- Tablas relacionales para relaciones N:M
CREATE TABLE interacciones_blog (
    idUsuario INT,
    idPost INT,
    fecha_respuesta DATE NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id),
    FOREIGN KEY (idPost) REFERENCES posts(id),
    PRIMARY KEY (idUsuario, idPost)
);

CREATE TABLE formacion_usuarios (
    idUsuario INT,
    idCurso INT,
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id),
    FOREIGN KEY (idCurso) REFERENCES cursos(id),
    PRIMARY KEY (idUsuario, idCurso)
);

CREATE TABLE coleccion_patrones_usuario (
    idUsuario INT,
    idPatron INT,
    fecha_adquisicion DATE NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id),
    FOREIGN KEY (idPatron) REFERENCES patrones(id),
    PRIMARY KEY (idUsuario, idPatron)
);

-- Añadimos las FKs de las tablas

 ALTER TABLE usuarios 
     ADD FOREIGN KEY (idCurso) REFERENCES cursos(id),
     ADD FOREIGN KEY (idPost) REFERENCES posts(id),
     ADD FOREIGN KEY (idPatron) REFERENCES patrones(id),
     ADD FOREIGN KEY (idProyecto) REFERENCES proyectos(id)
 ;
     
 ALTER TABLE cursos 
     ADD FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
 ;
 
 ALTER TABLE posts 
     ADD FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
 ;
 
  ALTER TABLE patrones 
     ADD FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
 ;
 
 ALTER TABLE proyectos 
     ADD FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
 ;
    
  
-- Creamos un usuario (para la conexión de la BD)
create user proyectoDR@'localhost' identified BY 'secreto';
-- Le damos permiso en la base de datos "ripoll_daniela_proyecto"
grant all on ripoll_daniela_proyecto.* to proyectoDR@'localhost';