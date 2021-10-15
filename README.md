# BienesRaicesMVC

Proyecto Bienes Raices realizado con el paradigma MVC

# Preparando el proyecto

## Se ha añadido la tabla Blog para implentar el blog basico del sitio.
Es necesario modificar la base de datos.

Tabla usuarios
~~~
CREATE TABLE `usuarios` (
  `id` int(1) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`) VALUES
(1, 'correo@correo.com', '$2y$10$8vLUO2Merb4zm0wQ/BjvGejadGAKbwRnLa.KI/4aB5i3GQuCtojmG', 'Admin');
~~~
Tabla blog:
~~~
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `imagen` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `descripcion` mediumtext CHARACTER SET utf8,
  `contenido` longtext CHARACTER SET utf8,
  `creado` date DEFAULT NULL,
  `usuarioId` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarioId_idx` (`usuarioId`),
  CONSTRAINT `usuarioId` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
~~~

Clonar el proyecto
~~~
git cone https://github.com/JCervantesB/BienesRaicesMVC.git
~~~
Iniciar el proyecto
~~~
cd ./BienesRaicesMVC/public

php -S localhost:3000
~~~

Entrar a http://localhost:3000/

De no funcionar, es posible que requieras instalar los modulos necesarios, asi como composer
~~~
cd ./BienesRaicesMVC

> npm i
> composer install
~~~


