-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2018 a las 05:37:25
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjuntos`
--

CREATE TABLE `adjuntos` (
  `ID_Adjunto` int(11) NOT NULL,
  `Rela_Tema` int(11) NOT NULL,
  `Rela_Tipo_Adjunto` int(11) NOT NULL,
  `Adjunto_Nombre` varchar(100) NOT NULL,
  `Adjunto_Ruta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`ID_Adjunto`, `Rela_Tema`, `Rela_Tipo_Adjunto`, `Adjunto_Nombre`, `Adjunto_Ruta`) VALUES
(1, 1, 2, 'was part2.docx', 'archivos/was part2.docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID_Alumno` int(11) NOT NULL,
  `Rela_Persona` int(11) NOT NULL,
  `Alumno_Codigo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `Rela_Persona`, `Alumno_Codigo`) VALUES
(1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `ID_Carrera` int(11) NOT NULL,
  `Carrera_Nombre` varchar(100) NOT NULL,
  `Carrera_Codigo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID_Carrera`, `Carrera_Nombre`, `Carrera_Codigo`) VALUES
(1, 'Lic. en Tecnologias de la Informacion y la Comunicacion', 'LTIC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreraxalumno`
--

CREATE TABLE `carreraxalumno` (
  `ID_CarreraxAlumno` int(11) NOT NULL,
  `Rela_Carrera` int(11) NOT NULL,
  `Rela_Alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID_Comentario` int(11) NOT NULL,
  `Rela_Persona` int(11) NOT NULL,
  `Rela_Tema` int(11) NOT NULL,
  `Comentario_Mensaje` longtext NOT NULL,
  `Comentario_Fecha` date NOT NULL,
  `Comentario_Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID_Materia` int(11) NOT NULL,
  `Rela_Carrera` int(11) NOT NULL,
  `Materia_Nombre` varchar(100) NOT NULL,
  `Materia_Codigo` varchar(50) DEFAULT NULL,
  `Cursada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_Materia`, `Rela_Carrera`, `Materia_Nombre`, `Materia_Codigo`, `Cursada`) VALUES
(1, 1, 'Entornos Virtuales de Ense?anza y Aprendizaje', 'EVEA', 4),
(2, 1, 'Matematica I', 'MAT1', 1),
(3, 1, 'Entornos Virtuales', 'ENT_VIR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_cursadas`
--

CREATE TABLE `materias_cursadas` (
  `ID_Mat_Cursada` int(11) NOT NULL,
  `Rela_Materia` int(11) NOT NULL,
  `Rela_Alumno` int(11) NOT NULL,
  `Fecha_Inscripcion` date NOT NULL,
  `Estado_Curso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias_cursadas`
--

INSERT INTO `materias_cursadas` (`ID_Mat_Cursada`, `Rela_Materia`, `Rela_Alumno`, `Fecha_Inscripcion`, `Estado_Curso`) VALUES
(2, 2, 1, '2018-06-26', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_pagina`
--

CREATE TABLE `mensaje_pagina` (
  `ID_Mensaje` int(11) NOT NULL,
  `Rela_Materia` int(11) NOT NULL,
  `Mensaje` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `ID_Persona` int(11) NOT NULL,
  `Persona_Nombre` varchar(40) NOT NULL,
  `Persona_Apellido` varchar(40) NOT NULL,
  `Persona_DNI` varchar(20) NOT NULL,
  `PERSONA_FECHA_NAC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`ID_Persona`, `Persona_Nombre`, `Persona_Apellido`, `Persona_DNI`, `PERSONA_FECHA_NAC`) VALUES
(1, 'Juan Pablo', 'Rodriguez', '1232536', '2000-05-24'),
(2, 'Fernando', 'Lopez', '23536342', '1990-02-21'),
(3, 'Analia', 'Sosa', '232524', '1993-06-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `ID_Profesor` int(11) NOT NULL,
  `Rela_Persona` int(11) NOT NULL,
  `Profesor_Codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`ID_Profesor`, `Rela_Persona`, `Profesor_Codigo`) VALUES
(2, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesorxmateria`
--

CREATE TABLE `profesorxmateria` (
  `ID_Profxmateria` int(11) NOT NULL,
  `Rela_Materia` int(11) NOT NULL,
  `Rela_Profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `ID_Tema` int(11) NOT NULL,
  `RELA_Materia` int(11) NOT NULL,
  `RELA_Tipo_Tema` int(11) NOT NULL,
  `Tema_Descripcion` varchar(150) NOT NULL,
  `TEMA_TITULO` varchar(100) NOT NULL,
  `TEMA_VERSION` varchar(30) NOT NULL,
  `TEMA_FECHA` date NOT NULL,
  `RELA_PROFESOR` int(11) NOT NULL,
  `ARCHIVO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`ID_Tema`, `RELA_Materia`, `RELA_Tipo_Tema`, `Tema_Descripcion`, `TEMA_TITULO`, `TEMA_VERSION`, `TEMA_FECHA`, `RELA_PROFESOR`, `ARCHIVO`) VALUES
(1, 1, 2, 'SDFSDGSDAFG', 'Prueba', '-', '2018-06-29', 2, 0),
(2, 1, 2, 'fadsfdsfsdafadsfsd', 'Prueba', '-', '2018-06-29', 2, 0),
(3, 1, 2, 'erwqrwqrwqr', 'Prueba', '-', '2018-06-29', 2, 0),
(4, 1, 2, 'PRUEBA DEFINITIVA', 'Prueba', '-', '2018-06-29', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_adjunto`
--

CREATE TABLE `tipo_adjunto` (
  `ID_Tipo_Adjunto` int(11) NOT NULL,
  `Tipo_Adjunto_Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_adjunto`
--

INSERT INTO `tipo_adjunto` (`ID_Tipo_Adjunto`, `Tipo_Adjunto_Descripcion`) VALUES
(1, 'cosme'),
(2, 'docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tema`
--

CREATE TABLE `tipo_tema` (
  `ID_Tipo_Tema` int(11) NOT NULL,
  `Tipo_Tema_Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_tema`
--

INSERT INTO `tipo_tema` (`ID_Tipo_Tema`, `Tipo_Tema_Descripcion`) VALUES
(2, 'Trabajo'),
(3, 'Apuntes'),
(4, 'Nota'),
(5, 'Bibliografía'),
(6, 'Noticias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_Tipo_Usuario` int(11) NOT NULL,
  `Tipo_Usuario_Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID_Tipo_Usuario`, `Tipo_Usuario_Descripcion`) VALUES
(1, 'Admin'),
(2, 'Alumno'),
(3, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Rela_Persona` int(11) NOT NULL,
  `Rela_Tipo_Usuario` int(11) NOT NULL,
  `Usuario_Nombre` varchar(30) NOT NULL,
  `Usuario_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Rela_Persona`, `Rela_Tipo_Usuario`, `Usuario_Nombre`, `Usuario_pass`) VALUES
(1, 1, 2, 'alumno1', '12345'),
(2, 2, 3, 'profesor1', '12345'),
(3, 3, 1, 'admin1', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
  ADD PRIMARY KEY (`ID_Adjunto`),
  ADD KEY `FK_ADJU_TEMA` (`Rela_Tema`),
  ADD KEY `FK_ADJU_TADJU` (`Rela_Tipo_Adjunto`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID_Alumno`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`ID_Carrera`);

--
-- Indices de la tabla `carreraxalumno`
--
ALTER TABLE `carreraxalumno`
  ADD PRIMARY KEY (`ID_CarreraxAlumno`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_Comentario`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID_Materia`);

--
-- Indices de la tabla `materias_cursadas`
--
ALTER TABLE `materias_cursadas`
  ADD PRIMARY KEY (`ID_Mat_Cursada`);

--
-- Indices de la tabla `mensaje_pagina`
--
ALTER TABLE `mensaje_pagina`
  ADD PRIMARY KEY (`ID_Mensaje`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ID_Persona`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ID_Profesor`);

--
-- Indices de la tabla `profesorxmateria`
--
ALTER TABLE `profesorxmateria`
  ADD PRIMARY KEY (`ID_Profxmateria`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`ID_Tema`),
  ADD KEY `FK_TEMA_MATER` (`RELA_Materia`),
  ADD KEY `FK_TEMA_PROF` (`RELA_PROFESOR`),
  ADD KEY `FK_TEMA_TITEMA` (`RELA_Tipo_Tema`);

--
-- Indices de la tabla `tipo_adjunto`
--
ALTER TABLE `tipo_adjunto`
  ADD PRIMARY KEY (`ID_Tipo_Adjunto`);

--
-- Indices de la tabla `tipo_tema`
--
ALTER TABLE `tipo_tema`
  ADD PRIMARY KEY (`ID_Tipo_Tema`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_Tipo_Usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
  MODIFY `ID_Adjunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `ID_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreraxalumno`
--
ALTER TABLE `carreraxalumno`
  MODIFY `ID_CarreraxAlumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID_Comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias_cursadas`
--
ALTER TABLE `materias_cursadas`
  MODIFY `ID_Mat_Cursada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensaje_pagina`
--
ALTER TABLE `mensaje_pagina`
  MODIFY `ID_Mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `ID_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `ID_Profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesorxmateria`
--
ALTER TABLE `profesorxmateria`
  MODIFY `ID_Profxmateria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID_Tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_adjunto`
--
ALTER TABLE `tipo_adjunto`
  MODIFY `ID_Tipo_Adjunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_tema`
--
ALTER TABLE `tipo_tema`
  MODIFY `ID_Tipo_Tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_Tipo_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
  ADD CONSTRAINT `FK_ADJU_TADJU` FOREIGN KEY (`Rela_Tipo_Adjunto`) REFERENCES `tipo_adjunto` (`ID_Tipo_Adjunto`),
  ADD CONSTRAINT `FK_ADJU_TEMA` FOREIGN KEY (`Rela_Tema`) REFERENCES `temas` (`ID_Tema`);

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `FK_TEMA_MATER` FOREIGN KEY (`RELA_Materia`) REFERENCES `materias` (`ID_Materia`),
  ADD CONSTRAINT `FK_TEMA_PROF` FOREIGN KEY (`RELA_PROFESOR`) REFERENCES `profesores` (`ID_Profesor`),
  ADD CONSTRAINT `FK_TEMA_TITEMA` FOREIGN KEY (`RELA_Tipo_Tema`) REFERENCES `tipo_tema` (`ID_Tipo_Tema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
