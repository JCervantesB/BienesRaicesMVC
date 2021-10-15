-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.34-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla bienes_raices.blog: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `titulo`, `imagen`, `descripcion`, `contenido`, `creado`, `usuarioId`) VALUES
	(1, 'Primer Blog (Actualizado)', '32dd9096b2da38d5688caed8722545ad.jpg', 'Descripcion del articulo desde Tableplus', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur suscipit repellat libero fugiat eum! Tenetur quis commodi omnis?\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur suscipit repellat libero fugiat eum! Tenetur quis commodi omnis?\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur suscipit repellat libero fugiat eum! Tenetur quis commodi omnis?\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur suscipit repellat libero fugiat eum! Tenetur quis commodi omnis?\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur suscipit repellat libero fugiat eum! Tenetur quis commodi omnis?', '2021-09-08', 2),
	(2, 'Segunda Entrada de Blog', '2fe49cc2e8d8dd5264dd9a02eb65fb76.jpg', 'Descripcion del segundo articulo desde Tableplus', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur suscipit repellat libero fugiat eum! Tenetur quis commodi omnis?', '2021-10-14', 2),
	(3, 'Entrada de prueba', '2fe49cc2e8d8dd5264dd9a02eb65fb76.jpg', 'Entrada de prueba desde el formulario', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usÃ³ una galerÃ­a de textos y los mezclÃ³ de tal manera que logrÃ³ hacer un libro de textos especimen. No sÃ³lo sobreviviÃ³ 500 aÃ±os, sino que tambien ingresÃ³ como texto de relleno en documentos electrÃ³nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaciÃ³n de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y mÃ¡s recientemente con software de autoediciÃ³n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\n\r\n', '2021-10-15', 2),
	(4, 'Nueva entrada de Blog', 'e2af85d9c358baf64d4fe34c4d1e075f.jpg', 'Entrada de prueba desde el formulario Crear!', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usÃ³ una galerÃ­a de textos y los mezclÃ³ de tal manera que logrÃ³ hacer un libro de textos especimen. No sÃ³lo sobreviviÃ³ 500 aÃ±os, sino que tambien ingresÃ³ como texto de relleno en documentos electrÃ³nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaciÃ³n de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y mÃ¡s recientemente con software de autoediciÃ³n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\n\r\n', '2021-10-15', 2),
	(5, 'Probando publicar con otro usuario', '3dde7499a7219396d5eab8a7827576ac.jpg', 'Publicando una entrada con otro usuario', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usÃ³ una galerÃ­a de textos y los mezclÃ³ de tal manera que logrÃ³ hacer un libro de textos especimen. No sÃ³lo sobreviviÃ³ 500 aÃ±os, sino que tambien ingresÃ³ como texto de relleno en documentos electrÃ³nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaciÃ³n de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y mÃ¡s recientemente con software de autoediciÃ³n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\n\r\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usÃ³ una galerÃ­a de textos y los mezclÃ³ de tal manera que logrÃ³ hacer un libro de textos especimen. No sÃ³lo sobreviviÃ³ 500 aÃ±os, sino que tambien ingresÃ³ como texto de relleno en documentos electrÃ³nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaciÃ³n de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y mÃ¡s recientemente con software de autoediciÃ³n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\n\r\n', '2021-10-15', 3);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Volcando datos para la tabla bienes_raices.propiedades: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `propiedades` DISABLE KEYS */;
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
	(4, 'Hermosa casa en la playa (Actualizado con MVC)', 1200000.00, '2eab498349a35d15b42b225dde4c768a.jpg', 'Hermosa casa en la playa, insertada desde el formulario PHP y pasando todas las validaciones del formulario', 3, 2, 1, '2021-09-08', 1),
	(5, 'Casa con hermosa vista al mar', 1500000.00, 'a083c6025c842a07dda7f62c2ec8c610.jpg', 'Hermosa casa en la playa, insertada desde el formulario PHP y pasando todas las validaciones del formulario', 3, 2, 1, '2021-09-08', 1),
	(8, 'Gran casa cÃ©ntrica', 1250000.00, '8e3b6250f30633dd2b8b15f2713227d3.jpg', 'Hermosa casa en la playa, insertada desde el formulario PHP y pasando todas las validaciones del formulario', 4, 2, 1, '2021-09-09', 1),
	(14, ' Hermosa casa de prueba', 120000.00, '2fe49cc2e8d8dd5264dd9a02eb65fb76.jpg', 'Esta es una propiedad de prueba....\r\nEsta es una propiedad de prueba....\r\nEsta es una propiedad de prueba....\r\nEsta es una propiedad de prueba....', 3, 2, 1, '2021-09-15', 1),
	(15, ' Nueva propiedad ', 1234567.00, '5e7a6ca0382f5a5fdf4fc250b1dea8ba.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 1, 1, '2021-10-01', 1),
	(16, ' Hermosa casa en la playa (Actualizado3)', 123456.00, '65fa945f30a400f112ac5d56f6e62f85.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 1, 1, '2021-10-01', 1),
	(18, 'Casa en la Playa desde MVC', 2500000.00, '369978f03035b7888035628a5a2c331d.jpg', 'Casa en la Playa desde MVCCasa en la Playa desde MVCCasa en la Playa desde MVCCasa en la Playa desde MVCCasa en la Playa desde MVCCasa en la Playa desde MVCCasa en la Playa desde MVCCasa en la Playa desde MVCCasa en la Playa desde MVC', 3, 2, 1, '2021-10-11', 2),
	(19, 'Probando redireccion', 350000.00, 'c1ab145112e7c5be294730ade0e3dd76.jpg', 'Probando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccionProbando redireccion', 3, 2, 1, '2021-10-15', 1);
/*!40000 ALTER TABLE `propiedades` ENABLE KEYS */;

-- Volcando datos para la tabla bienes_raices.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`) VALUES
	(2, 'correo@correo.com', '$2y$10$8vLUO2Merb4zm0wQ/BjvGejadGAKbwRnLa.KI/4aB5i3GQuCtojmG', 'Admin'),
	(3, 'admin@solucioncb.com', '$2y$10$8vLUO2Merb4zm0wQ/BjvGejadGAKbwRnLa.KI/4aB5i3GQuCtojmG', 'SolucionCB');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando datos para la tabla bienes_raices.vendedores: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
	(1, 'Julio', 'Cervantes', '3112902729'),
	(2, 'Juan', 'De la Torre', '1019301011');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
