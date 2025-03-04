-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla ripoll_daniela_proyecto.cursos: ~2 rows (aproximadamente)
INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `nivel_dificultad`, `duracion`, `precio`, `idUsuario`, `imagen`, `manual_pdf`) VALUES
	(1, 'Técnicas básicas de crochet', 'Conocimientos básicos de las herramientas, materiales y técnicas de crochet.', 'Básico', '5h', 0.00, NULL, 'tec_basicas.png', 'tec_basicas.pdf'),
	(2, 'Crea tu primer amigurumi', 'Aprenderemos a realizar nuestro primer amigurumi, técnicas y materiales a utilizar,', 'Básico', '10h', 5.00, NULL, 'primer_amigurumi.png', 'primer_amigurumi.pdf');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
