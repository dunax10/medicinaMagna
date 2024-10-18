-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2024 at 11:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicina_magna`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `idConsulta` int NOT NULL,
  `idMedico` int DEFAULT NULL,
  `idPaciente` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultorios`
--

CREATE TABLE `consultorios` (
  `idConsultorio` int NOT NULL,
  `nombre` int NOT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consultorios`
--

INSERT INTO `consultorios` (`idConsultorio`, `nombre`, `vigente`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `consultorios_medicos`
--

CREATE TABLE `consultorios_medicos` (
  `idConsultorio` int DEFAULT NULL,
  `idMedico` int DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `horaIngreso` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `horaEgreso` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consultorios_medicos`
--

INSERT INTO `consultorios_medicos` (`idConsultorio`, `idMedico`, `fecha`, `horaIngreso`, `horaEgreso`) VALUES
(1, 1, 'martes', '14:09', '18:59'),
(1, 1, 'martes', '12:00', '14:08'),
(1, 6, 'martes', '20:00', '6:00'),
(1, 1, 'miercoles', '20:00', '6:00'),
(1, 6, 'jueves', '20:00', '6:00');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `mail` varchar(70) DEFAULT NULL,
  `contraseña` varchar(30) DEFAULT NULL,
  `administrador` tinyint DEFAULT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombre`, `mail`, `contraseña`, `administrador`, `vigente`) VALUES
(1, 'nombre123', 'afsd@adfs', '123', 0, 0),
(2, 'Admin', 'adminReal@gmail.com', '123', 1, 0),
(3, 'oiijk', 'jkh@wertyuy', 'hola123', 0, 0),
(4, 'oiijk', 'jkh@we', 'noCreada', 0, 0),
(5, 'Medico', 'asdfasf@asdf', '123', 0, 1),
(6, NULL, NULL, 'noCreada', 0, 1),
(7, 'Medico', 'medico123@gmail.com', '1', 0, 0),
(8, 'Empleado', 'empleado123@gmail.com', '1234', 0, 0),
(9, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enfermedades`
--

CREATE TABLE `enfermedades` (
  `idEnfermedad` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enfermedades`
--

INSERT INTO `enfermedades` (`idEnfermedad`, `nombre`, `vigente`) VALUES
(1, 'Gripe', 0),
(2, 'Asma', 0),
(3, 'Enfermedad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enfermedades_historiales_clinicos`
--

CREATE TABLE `enfermedades_historiales_clinicos` (
  `idCuerpo` int NOT NULL,
  `idHistorial` int DEFAULT NULL,
  `idEnfermedad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enfermedades_historiales_clinicos`
--

INSERT INTO `enfermedades_historiales_clinicos` (`idCuerpo`, `idHistorial`, `idEnfermedad`) VALUES
(1, 1, 2),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL),
(5, 1, 3),
(6, NULL, 3),
(7, 6, 2),
(8, 7, 3),
(9, 8, 3),
(10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enfermedades_recetas`
--

CREATE TABLE `enfermedades_recetas` (
  `idCuerpo` int NOT NULL,
  `idReceta` int DEFAULT NULL,
  `idEnfermedad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enfermedades_recetas`
--

INSERT INTO `enfermedades_recetas` (`idCuerpo`, `idReceta`, `idEnfermedad`) VALUES
(1, 1, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `historiales_clinicos`
--

CREATE TABLE `historiales_clinicos` (
  `idHistorial` int NOT NULL,
  `idPaciente` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcionMalestar` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `historiales_clinicos`
--

INSERT INTO `historiales_clinicos` (`idHistorial`, `idPaciente`, `fecha`, `descripcionMalestar`) VALUES
(1, 1, '2024-08-29', 'Estaba enfermo pe :v'),
(2, 2, '2024-08-31', 'asdf'),
(3, 2, '2024-08-31', 'asdf'),
(4, 2, '2024-08-31', 'asdfasdf'),
(5, 2, '2024-08-31', 'adsf'),
(6, 2, '2024-08-31', 'adf'),
(7, 1, '2024-09-01', NULL),
(8, 1, '2024-09-01', NULL),
(9, NULL, '2024-09-01', NULL),
(10, 1, '2024-09-17', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `medicamentos`
--

CREATE TABLE `medicamentos` (
  `idMedicamento` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicamentos`
--

INSERT INTO `medicamentos` (`idMedicamento`, `nombre`, `vigente`) VALUES
(1, 'Ibuprofeno', 0),
(2, 'Amoxicilina', 0),
(3, 'Medicamento', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicamentos_historiales_clinicos`
--

CREATE TABLE `medicamentos_historiales_clinicos` (
  `idCuerpo` int NOT NULL,
  `idHistorial` int DEFAULT NULL,
  `idMedicamento` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicamentos_historiales_clinicos`
--

INSERT INTO `medicamentos_historiales_clinicos` (`idCuerpo`, `idHistorial`, `idMedicamento`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(6, 7, 3),
(7, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicamentos_recetas`
--

CREATE TABLE `medicamentos_recetas` (
  `idCuerpo` int NOT NULL,
  `idReceta` int DEFAULT NULL,
  `idMedicamento` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicamentos_recetas`
--

INSERT INTO `medicamentos_recetas` (`idCuerpo`, `idReceta`, `idMedicamento`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE `medicos` (
  `idMedico` int NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `dni` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `telefono` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `domicilio` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `disponibilidad` tinyint DEFAULT NULL,
  `idEmpleado` int DEFAULT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`idMedico`, `nombre`, `apellido`, `dni`, `sexo`, `fechaNacimiento`, `fechaIngreso`, `telefono`, `domicilio`, `disponibilidad`, `idEmpleado`, `vigente`) VALUES
(1, 'dfsg', 'asdf', 'asdf', 'F', '2024-08-01', '2024-08-01', 'adf', 'asfd', 0, NULL, 0),
(2, 'Admin', 'Administrador', '99999999', 'M', '2024-08-09', '2024-08-09', '99999999', '99999999', 1, 2, 0),
(3, 'oiijk', 'jk', '99999999', 'F', '2024-08-02', '2024-08-01', '99999999', '99999999', 1, NULL, 0),
(4, 'oiijk', 'jk', '99999999', 'F', '2024-08-24', '2024-08-01', '99999999', '99999999', 1, NULL, 0),
(5, 'oiijk', 'jk', '99999999', 'F', '2024-08-01', '2024-08-01', '99999999', '99999999', 1, 4, 0),
(6, 'Medico', '123', '213455', 'M', '2024-08-10', '2024-08-08', '14343543', '2345413', 1, 5, 1),
(7, 'Medico', 'ESTOY CREANDOLO', '123456', 'F', '2024-08-10', '2024-08-02', '23456789', 'domicilio 123', 1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `obras_sociales`
--

CREATE TABLE `obras_sociales` (
  `idObraSocial` int NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `obras_sociales`
--

INSERT INTO `obras_sociales` (`idObraSocial`, `nombre`, `telefono`, `vigente`) VALUES
(1, '44444444', NULL, 0),
(2, 'Pami', '44444444', 0),
(3, 'Minecraft', '44444444', 0),
(4, 'Nombre123', '44444444', 0);

-- --------------------------------------------------------

--
-- Table structure for table `obras_sociales_medicos`
--

CREATE TABLE `obras_sociales_medicos` (
  `idCuerpo` int NOT NULL,
  `idMedico` int DEFAULT NULL,
  `idObraSocial` int DEFAULT NULL,
  `numeroObraSocial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `obras_sociales_medicos`
--

INSERT INTO `obras_sociales_medicos` (`idCuerpo`, `idMedico`, `idObraSocial`, `numeroObraSocial`) VALUES
(1, 2, 3, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `obras_sociales_pacientes`
--

CREATE TABLE `obras_sociales_pacientes` (
  `idCuerpo` int NOT NULL,
  `idPaciente` int DEFAULT NULL,
  `idObraSocial` int DEFAULT NULL,
  `numeroObraSocial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `obras_sociales_pacientes`
--

INSERT INTO `obras_sociales_pacientes` (`idCuerpo`, `idPaciente`, `idObraSocial`, `numeroObraSocial`) VALUES
(1, 2, 1, '21');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL,
  `tipoSangre` varchar(4) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `mail` varchar(200) NOT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `nombre`, `apellido`, `dni`, `telefono`, `domicilio`, `tipoSangre`, `sexo`, `fechaNacimiento`, `mail`, `vigente`) VALUES
(1, 'sdfghjk', 'lkjhgfd', '123456', 'fghj', 'dfghjkl', 'A+', 'F', '2024-08-02', 'sdfghjk@kjhgfd', 0),
(2, 'Paciente', 'ESTOY CREANDOLO', '123456', '23456789', 'domicilio 123', 'AB+', 'F', '2024-08-10', 'paciente123@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recetas`
--

CREATE TABLE `recetas` (
  `idReceta` int NOT NULL,
  `idPaciente` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidadMedicamento` int DEFAULT NULL,
  `periodoMedicamentos` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recetas`
--

INSERT INTO `recetas` (`idReceta`, `idPaciente`, `fecha`, `cantidadMedicamento`, `periodoMedicamentos`) VALUES
(1, 2, '2024-09-01', 1, '9hs'),
(2, 2, '2024-09-01', 1, '9hs'),
(3, 2, '2024-09-01', 12, 'asdf'),
(4, 2, '2024-09-01', 12, 'asdf'),
(5, 2, '2024-09-01', 12, 'asfd'),
(6, 2, '2024-09-01', 12, 'afsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `consultas_ibfk_1` (`idMedico`);

--
-- Indexes for table `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`idConsultorio`);

--
-- Indexes for table `consultorios_medicos`
--
ALTER TABLE `consultorios_medicos`
  ADD KEY `consultorios_ibfk_1` (`idMedico`),
  ADD KEY `consultorios_medicos` (`idConsultorio`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`idEnfermedad`);

--
-- Indexes for table `enfermedades_historiales_clinicos`
--
ALTER TABLE `enfermedades_historiales_clinicos`
  ADD PRIMARY KEY (`idCuerpo`),
  ADD KEY `idHistorial` (`idHistorial`),
  ADD KEY `idEnfermedad` (`idEnfermedad`);

--
-- Indexes for table `enfermedades_recetas`
--
ALTER TABLE `enfermedades_recetas`
  ADD PRIMARY KEY (`idCuerpo`),
  ADD KEY `idReceta` (`idReceta`),
  ADD KEY `idEnfermedad` (`idEnfermedad`);

--
-- Indexes for table `historiales_clinicos`
--
ALTER TABLE `historiales_clinicos`
  ADD PRIMARY KEY (`idHistorial`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- Indexes for table `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`idMedicamento`);

--
-- Indexes for table `medicamentos_historiales_clinicos`
--
ALTER TABLE `medicamentos_historiales_clinicos`
  ADD PRIMARY KEY (`idCuerpo`),
  ADD KEY `idHistorial` (`idHistorial`),
  ADD KEY `idMedicamento` (`idMedicamento`);

--
-- Indexes for table `medicamentos_recetas`
--
ALTER TABLE `medicamentos_recetas`
  ADD PRIMARY KEY (`idCuerpo`),
  ADD KEY `idReceta` (`idReceta`),
  ADD KEY `idMedicamento` (`idMedicamento`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`idMedico`),
  ADD KEY `medicos` (`idEmpleado`);

--
-- Indexes for table `obras_sociales`
--
ALTER TABLE `obras_sociales`
  ADD PRIMARY KEY (`idObraSocial`);

--
-- Indexes for table `obras_sociales_medicos`
--
ALTER TABLE `obras_sociales_medicos`
  ADD PRIMARY KEY (`idCuerpo`),
  ADD KEY `idObraSocial` (`idObraSocial`),
  ADD KEY `obras_sociales_medicos` (`idMedico`);

--
-- Indexes for table `obras_sociales_pacientes`
--
ALTER TABLE `obras_sociales_pacientes`
  ADD PRIMARY KEY (`idCuerpo`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idObraSocial` (`idObraSocial`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`idReceta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `idConsulta` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `idConsultorio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `idEnfermedad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enfermedades_historiales_clinicos`
--
ALTER TABLE `enfermedades_historiales_clinicos`
  MODIFY `idCuerpo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enfermedades_recetas`
--
ALTER TABLE `enfermedades_recetas`
  MODIFY `idCuerpo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historiales_clinicos`
--
ALTER TABLE `historiales_clinicos`
  MODIFY `idHistorial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `idMedicamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicamentos_historiales_clinicos`
--
ALTER TABLE `medicamentos_historiales_clinicos`
  MODIFY `idCuerpo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicamentos_recetas`
--
ALTER TABLE `medicamentos_recetas`
  MODIFY `idCuerpo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `idMedico` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `idObraSocial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obras_sociales_medicos`
--
ALTER TABLE `obras_sociales_medicos`
  MODIFY `idCuerpo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obras_sociales_pacientes`
--
ALTER TABLE `obras_sociales_pacientes`
  MODIFY `idCuerpo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recetas`
--
ALTER TABLE `recetas`
  MODIFY `idReceta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`idMedico`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`);

--
-- Constraints for table `consultorios_medicos`
--
ALTER TABLE `consultorios_medicos`
  ADD CONSTRAINT `consultorios_medicos_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`idMedico`),
  ADD CONSTRAINT `consultorios_medicos_ibfk_2` FOREIGN KEY (`idConsultorio`) REFERENCES `consultorios` (`idConsultorio`);

--
-- Constraints for table `enfermedades_historiales_clinicos`
--
ALTER TABLE `enfermedades_historiales_clinicos`
  ADD CONSTRAINT `enfermedades_historiales_clinicos_ibfk_1` FOREIGN KEY (`idHistorial`) REFERENCES `historiales_clinicos` (`idHistorial`),
  ADD CONSTRAINT `enfermedades_historiales_clinicos_ibfk_2` FOREIGN KEY (`idEnfermedad`) REFERENCES `enfermedades` (`idEnfermedad`);

--
-- Constraints for table `enfermedades_recetas`
--
ALTER TABLE `enfermedades_recetas`
  ADD CONSTRAINT `enfermedades_recetas_ibfk_1` FOREIGN KEY (`idReceta`) REFERENCES `recetas` (`idReceta`),
  ADD CONSTRAINT `enfermedades_recetas_ibfk_2` FOREIGN KEY (`idEnfermedad`) REFERENCES `enfermedades` (`idEnfermedad`);

--
-- Constraints for table `historiales_clinicos`
--
ALTER TABLE `historiales_clinicos`
  ADD CONSTRAINT `historiales_clinicos_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`);

--
-- Constraints for table `medicamentos_historiales_clinicos`
--
ALTER TABLE `medicamentos_historiales_clinicos`
  ADD CONSTRAINT `medicamentos_historiales_clinicos_ibfk_1` FOREIGN KEY (`idHistorial`) REFERENCES `historiales_clinicos` (`idHistorial`),
  ADD CONSTRAINT `medicamentos_historiales_clinicos_ibfk_2` FOREIGN KEY (`idMedicamento`) REFERENCES `medicamentos` (`idMedicamento`);

--
-- Constraints for table `medicamentos_recetas`
--
ALTER TABLE `medicamentos_recetas`
  ADD CONSTRAINT `medicamentos_recetas_ibfk_1` FOREIGN KEY (`idReceta`) REFERENCES `recetas` (`idReceta`),
  ADD CONSTRAINT `medicamentos_recetas_ibfk_2` FOREIGN KEY (`idMedicamento`) REFERENCES `medicamentos` (`idMedicamento`);

--
-- Constraints for table `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`);

--
-- Constraints for table `obras_sociales_medicos`
--
ALTER TABLE `obras_sociales_medicos`
  ADD CONSTRAINT `obras_sociales_medicos` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`idMedico`),
  ADD CONSTRAINT `obras_sociales_medicos_ibfk_2` FOREIGN KEY (`idObraSocial`) REFERENCES `obras_sociales` (`idObraSocial`);

--
-- Constraints for table `obras_sociales_pacientes`
--
ALTER TABLE `obras_sociales_pacientes`
  ADD CONSTRAINT `obras_sociales_pacientes_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `obras_sociales_pacientes_ibfk_2` FOREIGN KEY (`idObraSocial`) REFERENCES `obras_sociales` (`idObraSocial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
