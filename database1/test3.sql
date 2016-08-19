-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2016 a las 02:59:13
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
(1, '<p>holiii</p>'),
(2, '<p style="text-align: center;">mi&nbsp;<strong>nombre&nbsp;<em>es&nbsp;</em></strong><em>kimberly</em></p>'),
(3, '<p>kimberly</p>'),
(4, '<p>jazmin</p>'),
(5, '<p>algooo</p>'),
(6, '<p>ruiz garcia</p>'),
(7, '<p>jazmin del carmen</p>'),
(8, '<p>kimberly jazmin ruiz garcia</p>'),
(9, '<p>jazmin ruiz</p>'),
(10, '<p>kevin</p>'),
(11, '<p>axel</p>'),
(12, '<p>axel ruiz</p>'),
(13, '<p>ruiz axel</p>'),
(14, '<p>lunaa</p>'),
(15, '<p>luna huele feo</p>'),
(16, '<p>hola q hce</p>');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tinymce`
--
ALTER TABLE `tinymce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
