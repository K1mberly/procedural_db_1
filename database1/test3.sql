-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2016 a las 00:56:52
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `modelo`, `tipo`) VALUES
(1, 'optima', 'auto'),
(2, 'cerato sedan', 'auto'),
(3, 'cerato koup', 'auto'),
(4, 'soul', 'auto'),
(5, 'carens', 'auto'),
(6, 'grand carnival', 'auto'),
(7, 'k2700', 'camion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'sin seguro'),
(2, 'seguro particular'),
(3, 'soat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` int(10) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `date_entered` date NOT NULL,
  `lunch_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `street`, `city`, `state`, `zip`, `phone`, `birth_date`, `sex`, `date_entered`, `lunch_cost`) VALUES
(1, 'kimberly', 'ruiz', 'kim.ruiz.@gmail.com', 'chincha', 'lima', 'lima', 12345, 6546843, '1996-08-21', 'f', '2016-08-07', 10),
(3, 'kevin', 'ruiz', 'kevin.ruiz@hotmail.com', 'chincha', 'lima', 'lima', 14785, 4859661, '2000-05-15', 'm', '2016-08-07', 15),
(4, 'kknvf', 'jksdbfjksd', 'dfjdkfns', 'jjdbkdfd', 'sldnf', 'jn', 35455, 3545, '0000-00-00', 'f', '2016-08-07', 18),
(5, 'julissa', 'jkdvbjvnjsjvskj', 'kvjckvbkjdd@hotmail.com', 'dvkhhxbvkjbx', 'jcnvnljn', 'nu', 58962, 958745215, '1985-03-18', 'f', '2016-08-07', 25),
(6, 'gabi', 'djnfjnbj', 'jbkjbkhvhvjb', 'hkbhvhbkj', 'jbkjjj', 'mj', 78495, 65484454, '1974-09-29', 'f', '2016-08-07', 10),
(7, 'daniel', 'saljjnasjdnjln', 'hbkjbnmn', 'kvhvjbnn', 'mjgcjvbkj', 'ju', 78635, 9855548, '1974-10-05', 'm', '2016-08-07', 85),
(8, 'pablo', 'donayre', 'pablo.d@gmail.com', 'algun lado', 'lima', 'lo', 87596, 65468484, '1986-09-12', 'm', '2016-08-07', 78),
(9, 'andres', 'saenz', 'a.saenz@gmail.com', 'progrso', 'lima', 'ki', 87846, 544831284, '1990-05-23', 'm', '2016-08-07', 56),
(10, 'elena', 'hernandez', 'e.hernan@hotmail.com', 'celendin', 'lima', 'jh', 84654, 2147483647, '1965-04-25', 'f', '2016-08-07', 63),
(11, 'juliano', 'mengano', 'eljulianito@hotmail.com', 'barrios altos', 'lima', 'hj', 51454, 12345669, '1966-06-16', 'm', '2016-08-07', 1),
(12, 'el brayan', 'la britany', 'elyla@hotmail.com', 'independencia', 'lima', 'ca', 64655, 65468432, '1990-08-26', 'm', '2016-08-07', 2),
(13, 'goku', 'milk', 'g.milk@hotmail.com', 'sayayin', 'name', 'dd', 14785, 15963175, '1990-05-23', 'm', '2016-08-07', 48),
(14, 'homero', 'simpson', 'homer@gmail.com', 'rosa', 'sprinfield', 'ff', 89566, 646848213, '1895-12-15', 'm', '2016-08-07', 55),
(15, 'juan', 'jimenez', 'j.j@gmail.com', 'celendin', 'lima', 'jh', 25464, 534354843, '1974-09-29', 'm', '2016-08-07', 53),
(16, 'kimy', 'ruiz', 'kim_g@gmail.com', 'callechincha', 'lima', 'li', 59682, 98554756, '0000-00-00', 'f', '0000-00-00', 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinymce`
--

CREATE TABLE `tinymce` (
  `id` int(11) NOT NULL,
  `text_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tinymce`
--

INSERT INTO `tinymce` (`id`, `text_area`) VALUES
(31, '<p>la nancy es una mega horrible</p>'),
(32, '<p>jjblkvghcvhkbjn</p>\r\n<p>kbdfjlnskm</p>\r\n<p>sdkbajfdnwwd</p>'),
(37, '<p>cftgbnjimkjuytgv</p>'),
(38, '<p>sdrfcvghyuhbnjioikjnbgf</p>'),
(45, '<p>dajbfjldncjksjdsfnc,msdcsdfv c</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `modelo` int(30) NOT NULL,
  `color` varchar(20) CHARACTER SET latin1 NOT NULL,
  `duenio` varchar(50) CHARACTER SET latin1 NOT NULL,
  `placa` varchar(10) CHARACTER SET latin1 NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `modelo`, `color`, `duenio`, `placa`, `status`) VALUES
(1, 2, 'plomo', 'Kimberly', 'A1H631', 1),
(2, 5, 'azul', 'Kevin Axel', 'A5E148', 2),
(22, 4, 'jhbdjbjfs', 'ashvdbjas', 'asdhbajsxm', 3),
(23, 3, 'dhsbjnmk', 'sbd bjaln', 'khdbj', 1),
(24, 3, 'rosado', 'kim', 'vhikmn', 2),
(25, 5, 'azulino', 'daniel', 'hdjlkd52', 3),
(26, 3, 'gris', 'ruiz', 'jgsdsvbjls', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indices de la tabla `tinymce`
--
ALTER TABLE `tinymce`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tinymce`
--
ALTER TABLE `tinymce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
