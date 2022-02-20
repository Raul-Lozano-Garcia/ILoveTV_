-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2022 a las 16:56:34
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `series`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `socio` bigint(20) UNSIGNED NOT NULL,
  `serie` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`socio`, `serie`, `fecha`, `texto`) VALUES
(2, 1, '2022-02-20', 'Me ha encantado esta serie. Estoy deseando que lancen ya la siguiente temporada. ¡No puedo esperar más!'),
(2, 5, '2022-02-20', 'Para muchos la mejor serie de la historia. Para mí una perdida de tiempo. No me ha gustado nada de nada.'),
(4, 11, '2022-02-20', 'No entiendo las críticas que se le ha hecho a lo largo de sus temporadas. Veo que pocos entienden lo que es una buena serie de verdad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lanzamientos`
--

CREATE TABLE `lanzamientos` (
  `serie` bigint(20) UNSIGNED NOT NULL,
  `plataforma` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lanzamientos`
--

INSERT INTO `lanzamientos` (`serie`, `plataforma`, `fecha`) VALUES
(1, 1, '2022-02-25'),
(1, 2, '2022-02-09'),
(2, 3, '2022-02-08'),
(3, 3, '2022-02-10'),
(3, 4, '2022-02-16'),
(4, 1, '2022-02-02'),
(4, 3, '2022-02-17'),
(5, 2, '2022-02-16'),
(5, 4, '2022-02-23'),
(6, 1, '2022-02-18'),
(11, 1, '2022-02-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` set('0','1') NOT NULL,
  `logotipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `activo`, `logotipo`) VALUES
(1, 'Netflix', '1', '1.png'),
(2, 'HBO', '1', '2.png'),
(3, 'Disney Plus', '1', '3.png'),
(4, 'Amazon Prime Video', '1', '4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `activo` set('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `nombre`, `descripcion`, `foto`, `activo`) VALUES
(1, 'Por trece razones', 'Después de que una mujer joven se quite la vida, su compañero de clase encuentra una misteriosa caja en su patio.', '1.jpg', '1'),
(2, 'The Mandalorian', 'Las aventuras de Mando, un pistolero solitario y cazarrecompensas que se abre paso a través de las fronteras más remotas de la galaxia, lejos de la jurisdicción de la Nueva República.', '2.jpg', '1'),
(3, 'El corazón de Sergio Ramos', 'Sergio Ramos capitanea dos de los equipos más importantes: la selección española y el Real Madrid. La serie documenta los éxitos y fracasos de la temporada de ambos equipos a través de los medios de comunicación, los fans y él mismo. Fuera del campo, Sergio se apoya en sus aficiones y su familia. Disfruta día a día de sus tres hijos, su prometida y su ganadería de caballos andaluces.', '3.jpg', '1'),
(4, 'Mr. Robot', 'Elliot Alderson, un brillante programador con problemas de ansiedad social, trabaja como ingeniero de ciberseguridad de día y como justiciero de noche. Su vida da un giro cuando unos ciberterroristas lo reclutan.', '4.jpg', '1'),
(5, 'Juego de tronos', 'El libro mejor vendido de la serie \"A Song of Ice and Fire\" escrito por George R.R, es llevado a la pantalla chica cuando HBO decide recrear esta historia épica de fantasía. Es la descripción de dos familias poderosas, reyes y reinas, caballeros y renegados, hombres falsos y honestos, haciendo parte de un juego mortal por el control de los Siete Reinados de Westeros y por sentarse en el trono más alto. Martin es el co productor ejecutivo y uno de los escritores de la serie que fue filmada en el Norte de Irlanda y Malta.', '5.jpg', '1'),
(6, 'Soy Georgina', 'Esta es Georgina Rodríguez: madre, influencer, empresaria y pareja de Cristiano Ronaldo. Un retrato emotivo y exhaustivo de su vida cotidiana.', '6.jpg', '0'),
(11, 'Peaky Blinders', 'Gran Bretaña vive la posguerra. Los soldados regresan, se acuñan nuevas revoluciones y nacen bandas criminales en una nación agitada. En Birmingham, una pandilla de gánsters callejeros asciende hasta convertirse en los reyes de la clase obrera.', '11.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `activo` set('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `nick`, `pass`, `activo`) VALUES
(0, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(1, 'Raúl Lozano', 'raul_eag', '81dc9bdb52d04dc20036dbd8313ed055', '1'),
(2, 'María Gutiérrez', 'gutiMD', 'd93591bdf7860e1e4ee2fca799911215', '1'),
(4, 'Michel Motrileño', 'elaguilucho', '3b712de48137572f3849aabd5666a4e3', '1'),
(6, 'Antonio Gallego', 'anthony_vice', 'db11437d95fc188d3ea9638fbab67eee', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`socio`,`serie`),
  ADD KEY `comentario_series` (`serie`);

--
-- Indices de la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD PRIMARY KEY (`serie`,`plataforma`),
  ADD KEY `lanzamientos_plataformas` (`plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_series` FOREIGN KEY (`serie`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_socios` FOREIGN KEY (`socio`) REFERENCES `socios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD CONSTRAINT `lanzamientos_plataformas` FOREIGN KEY (`plataforma`) REFERENCES `plataformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lanzamientos_series` FOREIGN KEY (`serie`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
