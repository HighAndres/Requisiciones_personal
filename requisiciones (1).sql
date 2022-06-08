-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-04-2021 a las 15:49:20
-- Versión del servidor: 5.6.49-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `requisiciones`
--
CREATE DATABASE IF NOT EXISTS `requisiciones` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `requisiciones`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_depto` int(11) NOT NULL,
  `depto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_depto` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_depto`, `depto`, `tipo_depto`) VALUES
(1, 'Jefatura de Sistemas', 'Administrativo'),
(2, 'Jefatura de Crédito y Cobranza', 'Administrativo'),
(3, 'Jefatura de Ing. del Producto', 'Administrativo'),
(4, 'Gerencia de Producción', 'Administrativo'),
(5, 'Jefatura de Costos', 'Administrativo'),
(6, 'Gerencia de Logística', 'Administrativo'),
(7, 'Jefatura de Planeación y Control de la Producción', 'Administrativo'),
(8, 'Jefatura de Administración de Personal', 'Administrativo'),
(9, 'Gerencia de Abastecimiento y Adquisiciones', 'Administrativo'),
(10, 'Jefatura de Aseguramiento de Calidad', 'Administrativo'),
(11, 'Jefatura de Ventas Firmas Ingeniería', 'Administrativo'),
(12, 'Jefatura de Contabilidad', 'Administrativo'),
(13, 'Jefatura de Mantenimiento', 'Administrativo'),
(14, 'Almacén de Producto Terminado', 'Administrativo'),
(15, 'Gerencia de Talento', 'Administrativo'),
(16, 'Gerencia de Ventas del Sureste', 'Administrativo'),
(17, 'Jefatura Ventas Distribuidores', 'Administrativo'),
(18, 'Gerencia de Ventas Internacionales', 'Administrativo'),
(19, 'Jefatura de Ingeniería de Manufactura', 'Administrativo'),
(20, 'Dirección General', 'Administrativo'),
(21, 'Jefatura Ventas Proyectos', 'Administrativo'),
(22, 'Jefatura de QHSE', 'Administrativo'),
(23, 'Gerencia de Administración de Contratos', 'Administrativo'),
(24, 'Gerencia Administrativa', 'Administrativo'),
(25, 'Gerencia de Procesos Especiales', 'Administrativo'),
(26, 'Gerencia de Servicios Técnicos', 'Administrativo'),
(27, 'Jefatura Ventas Actuadores', 'Administrativo'),
(28, 'Jefatura de Servicios Generales', 'Administrativo'),
(29, 'Dirección de Administración y Finanzas', 'Administrativo'),
(30, 'Gerencia de Ventas Nacionales', 'Administrativo'),
(31, 'Dirección Comercial', 'Administrativo'),
(32, 'Dirección Estratégica', 'Administrativo'),
(33, 'Dirección de Operaciones', 'Administrativo'),
(34, 'Jefatura Ventas Gobierno', 'Administrativo'),
(35, 'Jefatura de Compras Estratégicas', 'Administrativo'),
(36, 'Almacén de Materia Prima', 'Administrativo'),
(37, 'Jefatura de Tesorería', 'Administrativo'),
(38, 'Jefatura Ventas C & SA', 'Administrativo'),
(39, 'Dirección de Ingeniería R&D', 'Administrativo'),
(40, 'AX ONE', 'Administrativo'),
(41, 'BIAS', 'Administrativo'),
(42, 'Línea Machos Maquinado', 'Sindicato'),
(43, 'Recursos Humanos', 'Sindicato'),
(44, 'Manufactura', 'Sindicato'),
(45, 'Línea Fundido Chica Maquinado', 'Sindicato'),
(46, 'Almacén de Producto Terminado', 'Sindicato'),
(47, 'Línea Fundido Chica Ensamble', 'Sindicato'),
(48, 'Línea Fundido Grande Maquinado', 'Sindicato'),
(49, 'Línea Fundido Grande Ensamble', 'Sindicato'),
(50, 'Mantenimiento', 'Sindicato'),
(51, 'Soldadura', 'Sindicato'),
(52, 'Línea Forjado SAB Maquinado', 'Sindicato'),
(53, 'Línea API 6D Ensamble', 'Sindicato'),
(54, 'Maquinado de Misceláneos', 'Sindicato'),
(55, 'Línea Forjado SAB Ensamble', 'Sindicato'),
(56, 'Línea Machos Ensamble', 'Sindicato'),
(57, 'Almacén de Materia Prima INVAL', 'Sindicato'),
(58, 'PND', 'Sindicato'),
(59, 'Taller de Herramientas', 'Sindicato'),
(60, 'Logística', 'Sindicato'),
(61, 'Línea API 6D Maquinado', 'Sindicato'),
(62, 'Almacén de Herramientas', 'Sindicato'),
(63, 'Barras y Corte', 'Sindicato'),
(64, 'Jefatura de Cotizaciones', 'Administrativo'),
(65, 'Jefatura de Calidad', 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Director/Gerente'),
(2, 'Recursos Humanos'),
(3, 'Usuario'),
(4, 'Administrador'),
(5, 'Dirección General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_folio` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `empresa_solicitante` text COLLATE utf8_spanish_ci NOT NULL,
  `centro_costos` int(10) NOT NULL,
  `area_operativa` int(11) NOT NULL,
  `tipo_de_personal` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `puesto_solicitado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `personas_requeridas` int(10) NOT NULL,
  `grado_estudios` text COLLATE utf8_spanish_ci NOT NULL,
  `motivo_requisicion` text COLLATE utf8_spanish_ci NOT NULL,
  `jefe_inmediato` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `colaborador_reemplazo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cotizacion` text COLLATE utf8_spanish_ci NOT NULL,
  `periodo` text COLLATE utf8_spanish_ci NOT NULL,
  `salario_inicial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `salario_final` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genero_requerido` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` text COLLATE utf8_spanish_ci NOT NULL,
  `edad_minima` int(10) NOT NULL,
  `edad_maxima` int(10) NOT NULL,
  `licencia_conducir` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `anios_experiencia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `rolar_turno` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `trato_cli_prov` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `manejo_personal` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `horario_inicial` time NOT NULL,
  `horario_final` time NOT NULL,
  `conocimiento_1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `conocimiento_2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `conocimiento_3` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `conocimiento_4` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `conocimiento_5` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `competencia_1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `competencia_2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `competencia_3` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `competencia_4` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `competencia_5` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `actividad_1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `actividad_2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `actividad_3` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `actividad_4` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `actividad_5` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_folio`, `id_user`, `fecha_creacion`, `empresa_solicitante`, `centro_costos`, `area_operativa`, `tipo_de_personal`, `puesto_solicitado`, `personas_requeridas`, `grado_estudios`, `motivo_requisicion`, `jefe_inmediato`, `colaborador_reemplazo`, `cotizacion`, `periodo`, `salario_inicial`, `salario_final`, `genero_requerido`, `estado_civil`, `edad_minima`, `edad_maxima`, `licencia_conducir`, `anios_experiencia`, `rolar_turno`, `trato_cli_prov`, `manejo_personal`, `jornada`, `horario_inicial`, `horario_final`, `conocimiento_1`, `conocimiento_2`, `conocimiento_3`, `conocimiento_4`, `conocimiento_5`, `competencia_1`, `competencia_2`, `competencia_3`, `competencia_4`, `competencia_5`, `actividad_1`, `actividad_2`, `actividad_3`, `actividad_4`, `actividad_5`, `estatus`) VALUES
(931, 27, '2021-01-27 10:25:17', 'WALWORTH', 4005, 7, 'Administrativo', 'Jefe De Planeación', 1, 'Licenciatura/Ingeniería', 'Puesto de Nueva Creación', '', NULL, 'Neto', 'Mensual', '$29,526.56', '$32,479.21', 'Masculino', 'Indistinto', 30, 50, 'Otra', '5', 'No', 'No', 'Si', 'Lunes a Viernes', '08:00:00', '17:30:00', 'MANEJO AVANZADO DE ERP', 'MANEJO AVANZADO DE EXCEL', 'PRODUCTO', 'CONOCIMIENTOS BÁSICOS DE MANUFACTURA', 'FAMILIARIZADO CON HTAS D SISTEMAS DE GESTIÓN DE CALIDAD', 'MANEJO DE PERSONAL', 'TRATO CON CLIENTES', 'ADMINISTRACIÓN DE TAREAS Y TIEMPO', 'COMUNICACIÓN EFECTIVA', 'ENFOQUE A RESULTADOS', 'ADMINISTRACIÓN DEL PERSONAL A CARGO', 'ANÁLISIS DE TIEMPOS DE ENTREGA DE PROYECTOS AV', 'ADMINISTRACIÓN DE PROYECTOS DE AV', 'GESTIÓN DE METAS DE FACTURACIÓN', 'GESTIÓN DE LOS PROGRAMAS DE FABRICACIÓN', 'Autorizada'),
(932, 27, '2021-01-27 10:23:43', 'WALWORTH', 4002, 4, 'Administrativo', 'Coordinador De Recub', 1, 'Bachillerato', 'Puesto de Nueva Creación', '', NULL, 'Neto', 'Mensual', '$17,032.90', '$20,438.49', 'Masculino', 'Indistinto', 30, 50, 'Otra', '2', 'No', 'Si', 'Si', 'Lunes a Viernes', '07:00:00', '17:30:00', 'PROCESOS BÁSICOS DE FABRICACIÓN', 'RECUBRIMIENTOS (PINTURA)', 'CONTROL DE CALIDAD (PROCESOS)', 'CONOCIMIENTOS DEL PRODUCTO (INTERMEDIO)', 'SISTEMA DE GESTIÓN DE CALIDAD', 'MANEJO DE PERSONAL', 'TRATO CON CLIENTES Y PROVEEDORES', 'COMUNICACIÓN EFECTIVA', 'ENFOQUE A RESULTADOS', 'ANALÍTICO', 'ADMINISTRACIÓN Y CAPACITACIÓN DEL PERSONAL A CARGO', 'ANÁLISIS DE REQUISITOS DE REC ESPECIALES (IPE)', 'SUPERVISIÓN DE PROCESOS DE REC ESPECIALES', 'ELABORACIÓN DE REPORTES DE REC ESPECIALES', 'ANÁLISIS Y MANTTO A INFRAESTRUCTURA DE REC ESPECIALES', 'Autorizada'),
(933, 48, '2021-02-03 09:23:28', 'WALWORTH', 4010, 22, 'Administrativo', 'Enfermera', 1, 'Bachillerato', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$10,500.00', '$10,500.00', 'Indistinto', 'Indistinto', 25, 45, 'Otra', '2', 'No', 'Si', 'No', 'Lunes a Viernes', '07:00:00', '04:30:00', 'MEDICAMENTOS Y EQUIPOS DE CONSULTORIO', 'LEY FEDERAL DEL TRABAJO', 'LEY FEDERAL DEL IMSS', 'MÉTODOS DE PREVENCIÓN Y REGISTRO DE ACCIDENTES.', 'NORMAS DE LA STPS', 'ORIENTACIÓN AL CLIENTE', 'COMUNICACIÓN ASERTIVA', 'ENFOQUE A RESULTADOS', 'ORGANIZACIÓN', 'ADMINISTRACIÓN DEL TIEMPO', 'ATENCIÓN Y ORIENTACIÓN MÉDICA A LOS COLABORADORES DE', 'REGISTRO Y ARCHIVO DE EXPEDIENTES DE EXÁMENES MÉDICO', 'MANTENIMIENTO DEL INVENTARIO DE MEDICAMENTOS Y EQUIPO', 'MANTENIMIENTO DE LOS BOTIQUINES', 'PARTICIPAR EN LAS BRIGADAS DE EMERGENCIAS', 'Autorizada'),
(934, 28, '2021-02-09 13:49:41', 'WALWORTH', 4006, 19, 'Sindicalizado', 'Ayudante de ensamble', 1, 'Secundaria', 'Incremento de Actividad', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 18, 50, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '15:30:00', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'HERRAMIENTAS MANUALES', 'ORDEN Y LIMPIEZA', 'TRABAJO EN EQUIPO', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'ORDENADO', 'TRABAJO EN EQUIPO', 'USO DE HERRAMIENTAS MANUALES', 'MOVIMIENTO DE MATERIALES.', 'CARGA DE MATERIALES.', 'HABILITADO DE MATERIAL', 'MANTENER EL ORDEN Y LIMPIEZA EN EL ÁREA.', 'APOYO EN LAS NECESIDADES DEL ÁREA', 'Autorizada'),
(935, 28, '2021-02-09 13:52:37', 'WALWORTH', 4006, 19, 'Sindicalizado', 'Soldador Arco Manual', 1, 'Secundaria', 'Incremento de Actividad', '', NULL, 'Bruta', 'Semanal', '$323.25', '$323.25', 'Masculino', 'Indistinto', 18, 50, 'Otra', '2', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '15:30:00', 'SOLDADURA', 'PAILERÍA', 'ESTRUCTURAS METÁLICAS', 'USO DE HERRAMIENTAS MANUALES.', 'ORDEN Y LIMPIEZA', 'SOLDADURA', 'PAILERÍA', 'USO DE HERRAMIENTAS', 'ORDEN Y LIMPIEZA', 'SEGUIMIENTO A OBJETIVOS', 'HABILITADO DE MATERIALES', 'DESARROLLO DE ESTRUCTURAS', 'COLOCACIÓN Y MONTAJE DE ESTRUCTURAS.', 'APOYO EN LOS REQUERIMIENTOS DEL ÁREA.', 'MANTENER EL ORDEN Y LIMPIEZA DEL ÁREA.', 'Autorizada'),
(937, 30, '2021-02-08 08:25:11', 'WALWORTH', 4007, 13, 'Administrativo', 'Tecnico En Cnc', 1, 'Licenciatura/Ingeniería', 'Puesto de Nueva Creación', '', NULL, 'Neto', 'Mensual', '$11,500.00', '$12,800.00', 'Masculino', 'Indistinto', 22, 40, 'Otra', 'Más de 5', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'AMPLIO CONOCIMIENTO EN ELECTRÓNICA Y ELECTROMECÁNICA ', 'CONOCIMIENTO E INTERPRETACIÓN DE DIAGRAMAS ELECTRÓNICO ', ' INTERPRETACIÓN DE DIAGRAMAS Y PLANOS ELÉCTRICOS ', 'INTERPRETACIÓN DE PLANOS NEUMÁTICOS E HIDRÁULICOS', 'USO DE INSTRUMENTOS DE MEDICIÓN Y CALIBRACIÓN ', ' TRABAJAR CON LOS DIFERENTES VOLTAJES EN LA INDUSTRIA ', ' CORREGIR FALLAS DE LOS CIRCUITOS ELECTRÓNICOS', 'CORREGIR FALLAS DE PARTES MECÁNICAS', 'GENERAR CAMBIOS NECESARIOS EN LOS EQUIPOS PARA SU MEJO ', 'SOLUCIÓN RÁPIDA A LAS FALLAS EN LOS EQUIPOS  ', 'MANTENIMIENTO DE EQUIPOS DE CONTROL NUMÉRICO ', 'MANTENIMIENTOS PROGRAMADOS A LOS EQUIPOS ', 'MANTENIMIENTOS CORRECTIVOS A LOS EQUIPOS', 'ELABORACIÓN DE REPORTES DE ESTADOS DE LOS EQUIPOS', 'MANTENER LIMPIOS LOS EQUIPOS Y EL HERRAMENTAL DE TRABAJ', 'Autorizada'),
(939, 30, '2021-02-05 13:15:28', 'WALWORTH', 4007, 13, 'Administrativo', 'Tecnico En Cnc', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$13,500', '$13,500 ', 'Masculino', 'Indistinto', 22, 40, 'Particular', 'Más de 5', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'AMPLIO CONOCIMIENTO EN ELECTRÓNICA Y ELECTROMECÁNICA ', 'CONOCIMIENTO E INTERPRETACIÓN DE DIAGRAMAS ELECTRÓNICO ', ' INTERPRETACIÓN DE DIAGRAMAS Y PLANOS ELÉCTRICOS ', 'INTERPRETACIÓN DE PLANOS NEUMÁTICOS E HIDRÁULICOS', 'USO DE INSTRUMENTOS DE MEDICIÓN Y CALIBRACIÓN ', ' TRABAJAR CON LOS DIFERENTES VOLTAJES EN LA INDUSTRIA ', ' CORREGIR FALLAS DE LOS CIRCUITOS ELECTRÓNICOS', 'CORREGIR FALLAS DE PARTES MECÁNICAS', 'GENERAR CAMBIOS NECESARIOS EN LOS EQUIPOS PARA SU MEJO ', 'SOLUCIÓN RÁPIDA A LAS FALLAS EN LOS EQUIPOS  ', 'MANTENIMIENTO DE EQUIPOS DE CONTROL NUMÉRICO ', 'MANTENIMIENTOS PROGRAMADOS A LOS EQUIPOS ', 'MANTENIMIENTOS CORRECTIVOS A LOS EQUIPOS', 'ELABORACIÓN DE REPORTES DE ESTADOS DE LOS EQUIPOS', 'MANTENER LIMPIOS LOS EQUIPOS Y EL HERRAMENTAL DE TRABAJ', 'Autorizada'),
(940, 30, '2021-02-05 13:15:09', 'WALWORTH', 4007, 13, 'Administrativo', 'Mecanico De Montacar', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$11,000.00', '$12,500.00', 'Masculino', 'Indistinto', 18, 45, 'Particular', 'Más de 5', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'MOTORES DE COMBUSTIÓN A GAS  ', 'MONTACARGAS DE OPERACIÓN ELÉCTRICA', 'USO DE HERRAMIENTAS AUTOMOTRICES', 'USO DE EQUIPOS DE MEDICIÓN Y CALIBRACIÓN', 'MANEJO DE MONTACARGAS ', 'REPARACIÓN DE MONTACARGAS DE COMBUSTIÓN', 'REPARACION DE MONTACARGAS ELÉCTRICOS', 'REPARARON DE TRANSMISIONES  HIDRÁULICAS', 'AJUSTE DE MOTORES DE COMBUSTIÓN', 'SOLUCIÓN RÁPIDA A LAS FALLAS DE UN MONTACARGAS ', 'CORRECCIÓN DE FALLAS EN MONTACARGAS', 'MANTENIMIENTOS PROGRAMADOS A MONTACARGAS', 'MANTENIMIENTOS CORRECTIVOS A MONTACARGAS', 'SOLICITAR REFACCIONAMIENTO PARA LOS EQUIPOS DE CARGA', 'MANTENER LIMPIOS LOS EQUIPOS Y EL HERRAMENTAL DE TRABAJ', 'Autorizada'),
(941, 37, '2021-02-09 11:01:37', 'WALWORTH', 402, 4, 'Sindicalizado', 'Soldador Arco Manual', 5, 'Secundaria', 'Incremento de Actividad', '', NULL, 'Bruta', 'Mensual', '$323.25', '$323.25', 'Masculino', 'Casado/a', 25, 45, 'Otra', '3', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'USO DE EQUIPO DE SOLDADURA (ARCO MANUAL)', 'INTERPRETACIÓN DE PROCEDIMIENTOS DE SOLDADURA', 'CONOCIMIENTO BÁSICO DE INSPECCIÓN DE SOLDADURA', 'CONOCIMIENTO DE MATERIALES', 'CONOCIMIENTO DE POSICIONES DE SOLDADURA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'LLENADO CORRECTO DE REGISTROS', 'PREPARACIONES DE HERRAMENTALES ', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(943, 28, '2021-02-09 11:02:34', 'WALWORTH', 402, 44, 'Administrativo', 'Trainee', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$7,875.00', '$7,875.00', 'Indistinto', 'Soltero/a', 18, 50, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'VALVULAS EN GENERAL', 'PROCESO DE MANUFACTURA ', '5S', 'KAIZEN', 'DIBUJO TECNICO', 'DISEÑO Y DIBUJO TECNICO CAD', 'DISEÑO LAYOUT', 'APLICACION DE 5S', 'APLICACION DE 5S', 'SEGUIMIEENTO A OBJETIVOS', 'Diseño de dispositivos y herramientas CAD', 'RECOPILACION DE INFORMACION EN PLANTA', 'DESARROLLO E IMPLEMENTACION DE PROYECTOS ASIGNADOS ', 'X', 'X', 'Autorizada'),
(944, 30, '2021-02-08 19:41:12', 'WALWORTH', 4007, 13, 'Administrativo', 'Becario', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', '', NULL, 'Neto', 'Mensual', '$3,000.00', '$3,000.00', 'Femenino', 'Soltero/a', 18, 20, 'Particular', '1', 'No', 'Si', 'Si', 'Lunes a Viernes', '08:00:00', '14:30:00', 'ESTUDIANDO ALGUNA INGENIERIA', 'MANEJO DE PC', 'USO DE PAQUETERIA DE  PC', 'EQUIPOS DE OFICINA ', 'DOCUMENTACIÓN Y ARCHIVO ', 'ORGANIZAR DOCUMENTACIÓN ', 'ELABORAR INDICADORES', 'ELABORAR DOCUMENTACIÓN  ', 'SEGUIMIENTO A LAS REPORTES Y DOCUMENTOS DEL AREA', 'ATENDER LLAMADAS DE PROVEEDORES ', 'MANTENER EN ORDEN DOCUMENTACIÓN DEL AREA', 'ELABORACIÓN DE LOS INDICADORES DEL ÁREA ', 'ANALIZAR SOLICITUDES DE REFACCIONAMIENTO DEL ÁREA ', 'ELABORAR REPORTES DE ACTIVIDADES DEL ÁREA ', 'ELABORAR REQUISICIONES DE REFACCIONES', ''),
(945, 36, '2021-02-09 16:57:16', 'WALWORTH', 4013, 14, 'Sindicalizado', 'Auxiliar De Inv.', 1, 'Bachillerato', 'Baja/Renuncia', '', NULL, '', 'Semanal', '$7000.00', '$8000.00', 'Masculino', 'Casado/a', 25, 30, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', '', '', '', '', '', 'CONTROL DE INVENTARIOS', 'REALIZACIÓN DE CONTEOS CÍCLICOS', 'CONTROL DE ALMACENES', 'CONOCIMIENTO DE TÉCNICAS DE INVENTARIOS', 'CONOCIMIENTOS DE ALMACENES', 'CONTROL DE INVENTARIOS', 'REALIZACIÓN DE CONTEOS CÍCLICOS', 'CONTROL DE ALMACENES', 'CONOCIMIENTO DE TÉCNICAS DE INVENTARIOS', 'CONOCIMIENTOS DE ALMACENES', 'Autorizada'),
(946, 50, '2021-02-10 18:21:13', 'BIAS', 1, 41, 'Administrativo', 'Consultor ', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$25,000', '$25,000', 'Indistinto', 'Indistinto', 25, 37, 'Particular', '3', 'No', 'Si', 'Si', 'Lunes a Viernes', '08:30:00', '17:30:00', 'ADMINISTRACIÓN DE EMPRESAS', 'INGLÉS', 'GESTIÓN DE PROCESOS', 'GESTIÓN DE PROYECTOS', 'HERRAMIENTAS DE TRABAJO COLABORATIVO', 'AUTOGESTIÓN / LIDERZGO', 'RESOLUCIÓN DE PROBLEMAS', 'RELACIONES INTERPERSONALES', 'COMUNICACIÓN EFECTIVA (ORAL Y ESCRITA) ', 'APERTURA AL CAMBIO / FLEXIBLE', 'DISEÑAR ESTRATEGIAS DE MEJORA.', 'DESARROLLO DOCUMENTAL DE PROCESOS.', 'IMPLEMENTACIÓN IN SITU', 'GENERACIÓN DE DOCUMENTOS BASE DE CONTROL Y REPORTE.', 'ANÁLISIS DE DATOS Y TOMA DE DECISIONES.', 'Pendiente'),
(947, 18, '2021-02-10 21:10:49', 'WALWORTH', 4103, 11, 'Administrativo', 'Asesor técnico de ve', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$16,000.00', '$16,000.00', 'Masculino', 'Indistinto', 25, 35, 'Particular', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'MANEJO DE PAQUETE OFFICE PRINCIPALMENTE EXCEL', 'BUENA NEGOCIACIÓN', 'INGLES LECTURA', 'CONOCIMIENTO DE MATERIALES', 'PROACTIVO', 'HABILIDAD NEGOCIADORA', 'PROACTIVO', 'ORGANIZADO', 'HONESTIDAD', 'RESPONSABLE', 'REALIZAR COTIZACIONES EN TIEMPO Y FORMA', 'LLENAR INDICADORES', 'PROSPECCIÓN Y SEGUIMIENTO DE CLIENTES Y CUENTAS CLAVE', 'REALIZAR AGENDA PARA VISITAR A LOS CLIENTES', 'ASESORAR TÉCNICA Y COMERCIALMENTE A LOS CLIENTES', 'Autorizada'),
(948, 48, '2021-02-11 17:35:20', 'WALWORTH', 4010, 22, 'Administrativo', 'Sup. Limpieza', 1, 'Secundaria', 'Puesto de Nueva Creación', '', NULL, 'Neto', 'Mensual', '$5,963.15', '$6,825.00', 'Indistinto', 'Indistinto', 33, 50, 'Otra', '5', 'No', 'No', 'Si', 'Lunes a Sábado', '06:00:00', '14:30:00', '•	SUPERVISIÓN DE PERSONAL', '•	MANEJO DE SOLVENTES', '•	MANEJO DE RESIDUOS', 'NA', 'NA', 'ORIENTACIÓN AL CLIENTE', 'LIDERAZGO', 'ENFOQUE A RESULTADOS', 'NA', 'NA', '1.	COORDINAR LAS FUNCIONES DEL EQUIPO DE TRABAJO DE LIM', '2.	SUPERVISAR QUE SE ESTÉ LLEVANDO A CABO EL PLAN DE TR', '3.	GENERAR REPORTE DE INCIDENCIAS', '4.	REVISAR Y REPORTAR EL STOCK DE CONSUMIBLES E INSUMOS', '5.	ATENCIÓN A CLIENTES INTERNOS EN SOLICITUDES ACORDE A', 'Autorizada'),
(949, 44, '2021-02-18 21:55:50', 'WALWORTH', 4211, 24, 'Administrativo', 'Recepcionista', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$6,825.00', '$6,825.00', 'Femenino', 'Indistinto', 20, 35, 'Otra', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'BUEN MANEJO DE PAQUETERÍA OFFICE', 'ATENCIÓN A CLIENTES EXTERNOS E INTERNOS', 'ORGANIZACIÓN Y CONTROL', 'PLANEACIÓN DE ACTIVIDADES', 'INGLES INTERMEDIO', 'ORGANIZACIÓN', 'BUEN TRATO', 'DISPOSICIÓN', 'ORIENTADA AL SERVICIO', 'DILIGENCIA', 'ATENCIÓN A VISITAS EN PLANTA', 'APOYO AL ÁREA DE SERVICIOS GENERALES', 'CONTROL DE PAPELERÍA', 'ELABORACIÓN DE REQUISICIONES GASTOS ', 'CONTROL DE PAQUETERÍA Y RECEPCIÓN DE ENVÍOS', 'Autorizada'),
(950, 28, '2021-02-22 12:08:07', 'WALWORTH', 4006, 19, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Neto', 'Semanal', '$214.05', '$214.05', 'Indistinto', 'Indistinto', 18, 50, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'HERRAMIENTAS MANUALES', 'ORDEN Y LIMPIEZA', 'TRABAJO EN EQUIPO', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'ORDENADO', 'TRABAJO EN EQUIPO', 'USO DE HERRAMIENTAS MANUALES', 'MOVIMIENTO DE MATERIALES.', 'CARGA DE MATERIALES.', 'HABILITADO DE MATERIAL', 'MANTENER EL ORDEN Y LIMPIEZA EN EL ÁREA.', 'APOYO EN LAS NECESIDADES DEL ÁREA', 'Autorizada'),
(951, 37, '2021-02-23 15:57:30', 'WALWORTH', 402, 4, 'Sindicalizado', 'Soldador Arco Manual', 5, 'Secundaria', 'Incremento de Actividad', '', NULL, 'Bruta', 'Semanal', '$323.25', '$323.25', 'Masculino', 'Indistinto', 25, 45, 'Otra', '3', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'USO DE EQUIPO DE SOLDADURA (ARCO MANUAL)', 'INTERPRETACIÓN DE PROCEDIMIENTOS DE SOLDADURA', 'CONOCIMIENTO BÁSICO DE INSPECCIÓN DE SOLDADURA', 'CONOCIMIENTO DE MATERIALES', 'CONOCIMIENTO DE POSICIONES DE SOLDADURA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'LLENADO CORRECTO DE REGISTROS', 'PREPARACIONES DE HERRAMENTALES ', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(952, 37, '2021-02-23 16:10:20', 'WALWORTH', 402, 4, 'Sindicalizado', 'Soldador Arco Manual', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$323.25', '$323.25', 'Masculino', 'Indistinto', 25, 45, 'Otra', '3', 'Si', 'No', 'No', 'Lunes a Viernes', '07:00:00', '15:30:00', 'USO DE EQUIPO DE SOLDADURA (ARCO MANUAL)', 'INTERPRETACIÓN DE PROCEDIMIENTOS DE SOLDADURA', 'CONOCIMIENTO BÁSICO DE INSPECCIÓN DE SOLDADURA', 'CONOCIMIENTO DE MATERIALES', 'CONOCIMIENTO DE POSICIONES DE SOLDADURA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'LLENADO CORRECTO DE REGISTROS', 'PREPARACIONES DE HERRAMENTALES ', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(953, 37, '2021-02-26 15:58:27', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(954, 37, '2021-02-26 16:02:05', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'LLENADO CORRECTO DE REGISTROS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(955, 37, '2021-02-26 16:06:30', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Femenino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(956, 37, '2021-02-26 16:09:15', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(957, 37, '2021-02-26 16:12:18', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'LLENADO CORRECTO DE REGISTROS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(958, 37, '2021-02-26 16:17:30', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'LLENADO CORRECTO DE REGISTROS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(959, 37, '2021-02-26 16:20:49', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Femenino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'LLENADO CORRECTO DE REGISTROS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(960, 37, '2021-02-26 16:23:34', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Femenino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(961, 37, '2021-02-26 16:26:12', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(962, 37, '2021-02-26 16:29:41', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(963, 37, '2021-02-26 16:31:53', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(964, 37, '2021-02-26 16:34:00', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(965, 37, '2021-02-26 16:36:24', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', ''),
(966, 37, '2021-02-26 16:38:27', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(967, 37, '2021-02-26 16:40:12', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Femenino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(968, 37, '2021-02-26 16:42:04', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', '', NULL, 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(969, 25, '2021-03-01 16:36:43', 'WALWORTH', 4006, 3, 'Administrativo', 'Ing. Del Producto Jr', 2, 'Licenciatura/Ingeniería', 'Baja/Renuncia', '', NULL, 'Neto', 'Mensual', '$13,000.00', '$16,000.00', 'Indistinto', 'Indistinto', 25, 45, 'Otra', '3', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'NORMAS DE DISE;O PARA VALVULAS OIL Y GAS ', 'TOLERANCIAS GEOMETRICAS', 'RESISTENCIA DE MATERIALES', 'INSTRUMENTOS DE MEDICION', 'AUTOCAD Y SOLID WORKS', 'SOLUCION DE PROBLEMAS', 'TRABAJO EN EQUIPO', 'TOMA DE DESICIONES', 'CAPACIDAD DE ADAPTACION', 'ENFOQUE A RESULTADOS', 'DISEÑO DE PROTOTIPOS DE VALVULAS ', 'ELABORAR LISTAS DE MATERIALES', 'ELABORACION DE DOCUMENTACION TECNICA (ESPECIFICACIONES)', 'ELABORAR INGENIERIAS INVERSAS', 'ELABORACION DE PLANOS DE COMPONENTES MECANICOS', 'Autorizada'),
(970, 34, '2021-03-02 11:07:44', 'WALWORTH', 4018, 7, 'Administrativo', 'Becario Planeación', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', '', NULL, 'Neto', 'Mensual', '$3,000.00', '$3,000.00', 'Femenino', 'Indistinto', 22, 25, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '15:00:00', 'EXCEL BÁSICO', 'PLANEACIÓN', 'ORGANIZACIÓN', 'ADMINISTRACIÓN', 'COMUNICACIÓN', 'AUTONOMÍA Y PROACTIVIDAD', 'RELACIÓN INTERPERSONAL', 'CAPACIDAD DE ORGANIZACIÓN DEL TRABAJO', 'CAPACIDAD DE INICIATIVA', 'CAPACIDAD DE INNOVACIÓN', 'GENERACIÓN DE REPORTES DE SEGUIMIENTO', 'GENERACIÓN DE REPORTE DE INVENTARIOS ', 'SEGUIMIENTO EN PISO DE ÓRDENES DE TRABAJO', 'GENERACIÓN DE REQUERIMIENTOS MATERIAS PRIMAS', 'LIBERACIÓN DE ÓRDENES', 'Autorizada'),
(971, 37, '2021-03-08 10:37:18', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 10, 'Secundaria', 'Puesto de Nueva Creación', 'Joel Hidalgo', 'N/a', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Casado/a', 24, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Viernes', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(972, 28, '2021-03-09 12:30:04', 'WALWORTH', 4006, 19, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Aldo Ávila', 'Julio César Cortés Cruz', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Indistinto', 'Indistinto', 18, 50, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'HERRAMIENTAS MANUALES', 'ORDEN Y LIMPIEZA', 'TRABAJO EN EQUIPO', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'ORDENADO', 'TRABAJO EN EQUIPO', 'USO DE HERRAMIENTAS MANUALES', 'MOVIMIENTO DE MATERIALES.', 'CARGA DE MATERIALES.', 'HABILITADO DE MATERIAL', 'MANTENER EL ORDEN Y LIMPIEZA EN EL ÁREA.', 'APOYO EN LAS NECESIDADES DEL ÁREA', 'Autorizada'),
(973, 25, '2021-03-09 14:02:07', 'WALWORTH', 4021, 3, 'Administrativo', 'Ing. Del Producto Sr', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Roberto Carlos Lopez', '', 'Neto', 'Mensual', '$24,000.00', '$28,000.00', 'Indistinto', 'Indistinto', 30, 50, 'Otra', '3', 'No', 'Si', 'Si', 'Lunes a Viernes', '08:00:00', '17:30:00', 'NORMAS DE DISE;O PARA VALVULAS OIL Y GAS ', 'TOLERANCIAS GEOMETRICAS', 'RESISTENCIA DE MATERIALES', 'INSTRUMENTOS DE MEDICION Y PRUEBAS NO DESTRUCTIVA', 'AUTOCAD Y SOLID WORKS, ANALISIS POR ELEMENTOS FINITOS', 'SOLUCION DE PROBLEMAS Y CONTROL DE SUS EMOCIONES', 'TRABAJO EN EQUIPO, SOLUCION DE CONFLICTOS', 'TOMA DE DESICIONES', 'CAPACIDAD DE ADAPTACION', 'ENFOQUE A RESULTADOS', 'DISEÑO DE VALVULAS NUEVAS Y CONVERSIONES ESPECIALES ', 'ELABORAR LISTAS DE MATERIALES Y ESPECIF. DE MATERIALES', 'ELABORACION DE DOCUMENTACION TECNICA (ESPECIFICACIONES)', 'ELABORAR PAQUETES DEDISE;O', 'ELABORACION DE PLANOS DE COMPONENTES MECANICOS', 'Autorizada'),
(974, 37, '2021-03-12 09:46:05', 'WALWORTH', 402, 4, 'Administrativo', 'Ayudante De Ensamble', 3, 'Secundaria', 'Incremento de Actividad', 'Froylan Hernandez', 'N/a', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Casado/a', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(975, 37, '2021-03-12 09:58:59', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 2, 'Secundaria', 'Incremento de Actividad', 'Froylan Hernandez', 'N/a', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Femenino', 'Casado/a', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(976, 37, '2021-03-12 10:11:19', 'WALWORTH', 402, 4, 'Sindicalizado', 'Soldador Arco Manual', 2, 'Secundaria', 'Incremento de Actividad', 'Froylan Hernandez', 'N/a', 'Bruta', 'Semanal', '$323.25', '$323.25', 'Masculino', 'Casado/a', 25, 45, 'Otra', '3', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'USO DE EQUIPO DE SOLDADURA (ARCO MANUAL)', 'INTERPRETACIÓN DE PROCEDIMIENTOS DE SOLDADURA', 'CONOCIMIENTO BÁSICO DE INSPECCIÓN DE SOLDADURA', 'CONOCIMIENTO DE MATERIALES', 'CONOCIMIENTO DE POSICIONES DE SOLDADURA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'LLENADO CORRECTO DE REGISTROS', 'PREPARACIONES DE HERRAMENTALES ', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(977, 31, '2021-03-12 10:20:21', 'WALWORTH', 4003, 33, 'Administrativo', 'Comprador Jr', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', 'Gerente De Adquisiciones Y Abastecimientos', 'Nancy Benitez', 'Neto', 'Mensual', '$12,000.00', '$16,000.00', 'Masculino', 'Indistinto', 25, 45, 'Particular', '3', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'MANEJO DE EXCEL NIVEL INTERMEDIO (TDIN+ FORMULA)', 'MANEJO DE INTERNET BUSQUEDA DE OPCIONES DE SUMINISTRO ', 'INGLES BASICO', 'COMPRA DE INSUMOS MRO (INDIRECTOS RAMO METALMEC)', 'MANEJO DE ERP', 'NEGOCIACION Y COMUNICACION ORAL ESCRITA EFECTIVA', 'ADMINISTRADO Y ORDENADO', 'TRABAJO EN EQUIPO Y SENTIDO DE SERVICIO', 'HONESTIDAD , ETICA PROFESIONAL', 'SENTIDO DE URGENCIA', 'REVISAR REQUISICIONES Y SOLICITAR COTIZACIONES', 'SELECCIONAR PROVEEDOR Y ELABORAR ORDENES', 'EXPEDITAR FECHAS DE ENTREGA', 'INTERACCIÓN INTERDEPARTAMENTAL', 'RESOLUCION DE PROBLEMAS ', 'Autorizada'),
(978, 31, '2021-03-12 10:22:17', 'WALWORTH', 4003, 33, 'Administrativo', 'Comprador Jr', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', 'Gerente De Adquisiciones Y Abastecimientos', 'Ricardo Chazaro', 'Neto', 'Mensual', '$12,000.00', '$16,000.00', 'Masculino', 'Indistinto', 25, 45, 'Particular', '3', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'MANEJO DE EXCEL NIVEL INTERMEDIO (TDIN+ FORMULA)', 'MANEJO DE INTERNET BUSQUEDA DE OPCIONES DE SUMINISTRO ', 'INGLES BASICO', 'COMPRA DE INSUMOS MRO (INDIRECTOS RAMO METALMEC)', 'MANEJO DE ERP', 'NEGOCIACION Y COMUNICACION ORAL ESCRITA EFECTIVA', 'ADMINISTRADO Y ORDENADO', 'TRABAJO EN EQUIPO Y SENTIDO DE SERVICIO', 'HONESTIDAD , ETICA PROFESIONAL', 'SENTIDO DE URGENCIA', 'REVISAR REQUISICIONES Y SOLICITAR COTIZACIONES', 'SELECCIONAR PROVEEDOR Y ELABORAR ORDENES', 'EXPEDITAR FECHAS DE ENTREGA', 'INTERACCIÓN INTERDEPARTAMENTAL', 'RESOLUCION DE PROBLEMAS ', 'Autorizada'),
(979, 37, '2021-03-12 12:22:16', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 10, 'Secundaria', 'Incremento de Actividad', 'Joel Hidalgo', 'N/a', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Indistinto', 'Casado/a', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(980, 32, '2021-03-12 13:23:50', 'WALWORTH', 4005, 7, 'Administrativo', 'Controlador Sr.', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', 'Héctor Cardoso Abad', 'Edgar Jiménez Hernández', 'Neto', 'Mensual', '$21,000.00', '$21,000.00', 'Masculino', 'Indistinto', 34, 40, 'Otra', 'Más de 5', 'No', 'No', 'Si', 'Lunes a Viernes', '08:00:00', '17:30:00', 'METAL MECÁNICA', 'PLANEACIÓN', 'CONTROL DE PRODUCCIÓN', 'ALMACENES', 'PRODUCCIÓN', 'LIDERAZGO', 'TRABAJO EN EQUIPO', 'CAPACIDAD DE ANÁLSIS', 'COMUNICACIÓN EFECTIVA', 'COMUNICACIÓN ASERTIVA', 'PROVEER ESTATUS Y TIEMPOS DE ENTREGA DE LA FABRICACIÓN', 'SEGUIMIENTO AL CUMPLIMIENTO DEL PMF', 'SEGUIMIENTO A COMPRA DE MATERIALES PARA FABRICACIÓN', 'SEGUIMIENTO AL SURTIMIENTO DE MATERIALES A PRODUCCIÓN', 'ELABORACIÓN DE PROGRAMAS DE PRODUCCIÓN', 'Autorizada'),
(982, 34, '2021-03-12 14:53:03', 'WALWORTH', 4018, 23, 'Administrativo', 'Administrador Ventas', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Edgar Islas', '', 'Neto', 'Mensual', '$10,000.00', '$15,000.00', 'Femenino', 'Indistinto', 25, 35, 'Otra', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'ADMINISTRACIÓN', 'EXCEL BÁSICO', 'ORGANIZACIÓN', 'COMUNICACIÓN', 'ERP', 'AUTONOMÍA Y PROACTIVIDAD', 'RELACIÓN INTERPERSONAL', 'CAPACIDAD DE ORGANIZACIÓN DEL TRABAJO', 'CAPACIDAD DE INICIATIVA', 'CAPACIDAD DE INNOVACIÓN', 'INGRESO DE ÓRDENES A SISTEMA ERP', 'GENERACIÓN DE RMA´S', 'PROPORCIONAR INSTRUCCIONES DE EMBARQUE', 'ADMINISTRAR Y RECOLECTAR FIRMAS DE FORMATOS', 'COMPILACIÓN DE INFORMACIÓN PARA PEDIDOS', 'Autorizada'),
(983, 34, '2021-03-12 15:11:18', 'WALWORTH', 4018, 23, 'Administrativo', 'Project Manager', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', 'Edgar Islas', 'Luis Barrera', 'Neto', 'Mensual', '$20000.00', '$20000.00', 'Indistinto', 'Indistinto', 25, 35, 'Particular', '1', 'No', 'Si', 'Si', 'Lunes a Viernes', '08:00:00', '17:30:00', 'GESTIÓN DE PROYECTOS DE INICIO A FIN', 'HABILIDADES DE NEGOCIACIÓN', 'IDENTIFICACIÓN Y MITIGACIÓN DE RIESGOS', 'PLANIFICACIÓN DE PROYECTOS ', 'INGLÉS INTERMEDIO', 'LIDERAZGO', 'TRABAJO EN EQUIPO', 'GESTIÓN ADMINISTRATIVA ', 'COMUNICACIÓN EFECTIVA', 'ORGANIZACIÓN', 'DESARROLLO Y CUMPLIMIENTO DE CRONOGRAMAS DE PROYECTO', 'REVISIÓN DE ESPECIFICACIONES CONTRACTUALES', 'ATENCIÓN A CLIENTES (INSPECCIONES, VISITAS Y REUNIONES)', 'COORDINAR TODAS PARTES INVOLUCRADAS DEL PROYECTO', 'CONTROLAR LOS RECURSOS ASIGNADOS AL PROYECTO', 'Autorizada'),
(984, 34, '2021-03-12 15:19:54', 'WALWORTH', 4018, 23, 'Administrativo', 'Becario Admon. Venta', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Edgar Islas', '', 'Neto', 'Mensual', '$3000.00', '$3000.00', 'Femenino', 'Indistinto', 20, 22, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '15:00:00', 'EXCEL BÁSICO', 'PLANEACIÓN', 'ORGANIZACIÓN', 'ADMINISTRACIÓN', 'COMUNICACIÓN', 'LIDERAZGO', 'TRABAJO EN EQUIPO', 'COMPROMISO', 'RESPONSABILIDAD', 'CAPACIDAD DE INNOVACIÓN', 'GENERACIÓN DE REPORTES DE SEGUIMIENTO', 'GENERACIÓN DE REPORTE DE INVENTARIOS ', 'SEGUIMIENTO EN PISO DE ÓRDENES DE TRABAJO', 'GENERACIÓN DE REQUERIMIENTOS MATERIAS PRIMAS', 'LIBERACIÓN DE ÓRDENES', 'Autorizada'),
(985, 31, '2021-03-12 16:20:12', 'WALWORTH', 4003, 33, 'Administrativo', 'Comprador Sr', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', 'Gerente De Adquisiciones Y Abastecimientos', 'Mayte Limones', 'Neto', 'Mensual', '$28,000.00', '$30,000.00', 'Indistinto', 'Indistinto', 28, 55, 'Particular', '5', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'MANEJO DE EXCEL NIVEL INTERMEDIO (TDIN+ FORMULA)', 'MANEJO DE INTERNET BUSQUEDA DE OPCIONES DE SUMINISTRO ', 'INGLES AVANZADO', 'MIN 5 AÑOS EXPERIENCIA EN PROCESO DE COMPRAS ', 'DESARROLLO DE PROVEEDORES', 'NEGOCIACION Y COMUNICACION ORAL ESCRITA EFECTIVA', 'ADMINISTRADO Y ORDENADO', 'TRABAJO EN EQUIPO Y SENTIDO DE SERVICIO', 'HONESTIDAD , ETICA PROFESIONAL', 'SENTIDO DE URGENCIA', 'REVISAR REQUISICIONES Y SOLICITAR COTIZACIONES', 'SELECCIONAR PROVEEDOR Y ELABORAR ORDENES', 'EXPEDITAR FECHAS DE ENTREGA', 'INTERACCIÓN INTERDEPARTAMENTAL', 'RESOLUCION DE PROBLEMAS ', 'Autorizada'),
(986, 28, '2021-03-16 12:10:36', 'WALWORTH', 4006, 19, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Aldo Ávila', 'José Roberto Rafael Graciano', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Indistinto', 'Indistinto', 18, 50, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'HERRAMIENTAS MANUALES', 'ORDEN Y LIMPIEZA', 'TRABAJO EN EQUIPO', 'CARGA DE MATERIALES', 'MOVIMIENTO DE MATERIALES', 'ORDENADO', 'TRABAJO EN EQUIPO', 'USO DE HERRAMIENTAS MANUALES', 'MOVIMIENTO DE MATERIALES.', 'CARGA DE MATERIALES.', 'HABILITADO DE MATERIAL', 'MANTENER EL ORDEN Y LIMPIEZA EN EL ÁREA.', 'APOYO EN LAS NECESIDADES DEL ÁREA', 'Autorizada'),
(987, 34, '2021-03-17 08:14:41', 'WALWORTH', 4018, 7, 'Administrativo', 'Becario Planeación', 3, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Edgar Islas', '', 'Neto', 'Mensual', '$3,000.00', '$3,000.00', 'Indistinto', 'Indistinto', 21, 24, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '15:00:00', 'EXCEL BÁSICO', 'PLANEACIÓN', 'ORGANIZACIÓN', 'ADMINISTRACIÓN', 'COMUNICACIÓN', 'AUTONOMÍA Y PROACTIVIDAD', 'TRABAJO EN EQUIPO', 'COMPROMISO', 'RESPONSABILIDAD', 'CAPACIDAD DE INNOVACIÓN', 'GENERACIÓN DE REPORTES DE SEGUIMIENTO', 'GENERACIÓN DE REPORTE DE INVENTARIOS ', 'SEGUIMIENTO EN PISO DE ÓRDENES DE TRABAJO', 'GENERACIÓN DE REQUERIMIENTOS MATERIAS PRIMAS', 'LIBERACIÓN DE ÓRDENES', 'Autorizada'),
(988, 32, '2021-03-17 13:26:52', 'WALWORTH', 4005, 33, 'Administrativo', 'Becario', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Héctor Cardoso Abad', '-', 'Bruta', 'Mensual', '$3,000.00', '$3,000.00', 'Indistinto', 'Indistinto', 19, 20, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '15:00:00', 'INGENIERÍA  DE MATERIALES', 'INSTRUMENTOS DE MEDICIÓN', 'PROBABILIDAD', 'ESTADISTICA', 'MICROSOFT OFFICE', 'LIDERAZGO', 'TRABAJO EN EQUIPO', 'CAPACIDAD DE ANÁLSIS', 'COMUNICACIÓN EFECTIVA', 'COMUNICACIÓN ASERTIVA', 'APOYO A PROVEER ESTATUS EN PISO', 'APOYO AL SEGUIMIENTO DEL PLAN MAESTRO DE FABRICACIÓN', 'APOYO EN LA ELABORACIÓN DE PROGRAMAS DE CORTE', 'APOYO EN LA ELABORACIÓN DE PROGRAMAS DE MAQUINADOS', 'APOYO AL SEGUIMIENTO DE SURTIMIENTOS DE MATERIALES', 'Autorizada'),
(989, 36, '2021-03-23 09:04:32', 'WALWORTH', 4012, 36, 'Sindicalizado', 'Ayudante De Almacén', 1, 'Bachillerato', 'Baja/Renuncia', 'Ing. German Velazquez', 'Juan Carlos Rosales Aparicio', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Casado/a', 21, 25, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:00:00', 'OPERACIÓN BÁSICA DE ALMACENES DE MATERIA PRIMA', 'OPERACIÓN BÁSICA DE UN PROCESO DE SUMINISTRO', 'OPERACIÓN BÁSICA DE UN PROCESO DE ALMACENAJE', 'OPERACIÓN BÁSICA DE UN PROCESO DE RECIBO', 'CONOCIMIENTO BÁSICO DE TÉCNICAS DE MEJORA CONTINUA', 'DEBERÁ  TRABAJAR BAJO PRESIÓN', 'DEBERÁ TRABAJAR EN EQUIPO', 'DEBERÁ TRABAJAR ORIENTADO AL SERVICIO Y AL CLIENTE', 'DEBERÁ SER ORGANIZADO Y ORDENADO', 'DEBERÁ SER HONESTO', 'ACTIVIDAD DE SUMINISTRO DE MP', 'ACTIVIDAD DE RECIBO DE MP DE PRODUCCIÓN & PROVEEDORES', 'ACTIVIDAD DE ALMACENAJE DE MP', 'ACTIVIDAD DE REVISAR Y ANALIZAR ORDENES DE TRABAJO', 'PARTICIPAR EN LOS INVENTARIOS DEL ALMACÉN', 'Autorizada'),
(990, 36, '2021-03-23 09:07:25', 'WALWORTH', 4012, 36, 'Sindicalizado', 'Ayudante De Almacén', 3, 'Bachillerato', 'Incremento de Actividad', 'Ing. German Velazquez', '', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Casado/a', 21, 25, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'OPERACIÓN BÁSICA DE ALMACENES DE MATERIA PRIMA', 'OPERACIÓN BÁSICA DE UN PROCESO DE SUMINISTRO', 'OPERACIÓN BÁSICA DE UN PROCESO DE ALMACENAJE', 'OPERACIÓN BÁSICA DE UN PROCESO DE RECIBO', 'CONOCIMIENTO BÁSICO DE TÉCNICAS DE MEJORA CONTINUA', 'DEBERÁ  TRABAJAR BAJO PRESIÓN', 'DEBERÁ TRABAJAR EN EQUIPO', 'DEBERÁ TRABAJAR ORIENTADO AL SERVICIO Y AL CLIENTE', 'DEBERÁ SER ORGANIZADO Y ORDENADO', 'DEBERÁ SER HONESTO', 'ACTIVIDAD DE SUMINISTRO DE MP', 'ACTIVIDAD DE RECIBO DE MP DE PRODUCCIÓN & PROVEEDORES', 'ACTIVIDAD DE ALMACENAJE DE MP', 'ACTIVIDAD DE REVISAR Y ANALIZAR ORDENES DE TRABAJO', 'PARTICIPAR EN LOS INVENTARIOS DEL ALMACÉN', 'Autorizada'),
(991, 36, '2021-03-23 09:11:05', 'WALWORTH', 4013, 14, 'Sindicalizado', 'Ayudante De Almacén', 5, 'Bachillerato', 'Incremento de Actividad', 'Ing. Juan Flores', '', 'Bruta', 'Semanal', '$214.05', '$214.05', 'Masculino', 'Casado/a', 21, 25, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'OPERACIÓN BÁSICA DE ALMACENES DE PRODUCTO TERMINADO', 'OPERACIÓN BÁSICA DE UN PROCESO DE SUMINISTRO & EMBARQUE', 'OPERACIÓN BÁSICA DE UN PROCESO DE ALMACENAJE', 'OPERACIÓN BÁSICA DE UN PROCESO DE RECIBO', 'CONOCIMIENTO BÁSICO DE TÉCNICAS DE MEJORA CONTINUA', 'DEBERÁ  TRABAJAR BAJO PRESIÓN', 'DEBERÁ TRABAJAR EN EQUIPO', 'DEBERÁ TRABAJAR ORIENTADO AL SERVICIO Y AL CLIENTE', 'DEBERÁ SER ORGANIZADO Y ORDENADO', 'DEBERÁ SER HONESTO', 'ACTIVIDAD DE SUMINISTRO DE PRODUCTO TERMINADO', 'ACTIVIDAD DE RECIBO DE PT DE PRODUCCIÓN & PROVEEDORES', 'ACTIVIDAD DE ALMACENAJE DE PT', 'ACTIVIDAD DE REVISAR Y ANALIZAR ORDENES DE TRABAJO', 'ACTIVIDAD DE EMBARQUES A CLIENTES', 'Autorizada'),
(992, 36, '2021-03-23 09:34:26', 'WALWORTH', 4120, 6, 'Administrativo', 'Trainee De Logistica', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Ing. Agni Ruiz', '', 'Neto', 'Mensual', '$7,000.00', '$9,000.00', 'Femenino', 'Soltero/a', 21, 25, 'Otra', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'CONOCIMIENTOS BÁSICOS EN EMBARQUES TERRESTRES & AÉREOS', 'CONOCIMIENTOS BÁSICOS DE NORMAS NACIONALES TRANSPORTE', 'CONOCIMIENTO BÁSICO DE TÉCNICAS DE LOGISTICA', 'EXPERIENCIA MÍNIMA EN TRATO CON PROVEEDORES', 'CONOCIMIENTO BÁSICO DE TÉCNICAS DE MEJORA CONTINUA', 'DEBERÁ  TRABAJAR BAJO PRESIÓN', 'DEBERÁ TRABAJAR EN EQUIPO', 'DEBERÁ TRABAJAR ORIENTADO AL SERVICIO Y AL CLIENTE', 'DEBERÁ SER ORGANIZADO Y ORDENADO', 'DEBERÁ SER HONESTO', 'EJECUTAR EL PROCESO DE EMBARQUE ', 'MANTENER LOS GASTOS LOGÍSTICOS DE ACUERDO A BUDGET', 'COORDINAR A LOS INVOLUCRADOS EN EL EMBARQUE', 'REALIZAR COTIZACIONES DE PROVEEDORES LOGÍSTICOS', 'PARTICIPAR EN PROYECTOS DE AHORROS LOGÍSTICOS', 'Autorizada'),
(993, 36, '2021-03-23 09:42:13', 'WALWORTH', 4120, 6, 'Administrativo', 'Trainee De Logística', 1, 'Licenciatura/Ingeniería', 'Promoción Interna', 'Ing. Arturo Falcon', '', 'Neto', 'Mensual', '$7,000.00', '$9,000.00', 'Femenino', 'Soltero/a', 21, 25, 'Otra', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'CONOCIMIENTO BÁSICO DE VENTAS INTER COMPAÑÍA', 'CONOCIMIENTO BÁSICO DE COMPRAS INTER COMPAÑÍA', 'CONOCIMIENTO BÁSICO DE POLÍTICAS INTER COMPAÑÍA', 'CONOCIMIENTO BÁSICO DE PROCESOS ADMINISTRATIVOS ', 'CONOCIMIENTO BÁSICO DE ERP ', 'DEBERÁ  TRABAJAR BAJO PRESIÓN', 'DEBERÁ TRABAJAR EN EQUIPO', 'DEBERÁ TRABAJAR ORIENTADO AL SERVICIO Y AL CLIENTE', 'DEBERÁ SER ORGANIZADO Y ORDENADO', 'DEBERÁ SER HONESTO', 'GENERAR Y PROCESAR ORDENES DE COMPRA INTER COMPAÑÍAS', 'GENERAR Y PROCESAR ORDENES DE VENTA INTER COMPAÑÍAS', 'SOLICITAR Y PROCESAR LAS FACTURAS INTER COMPAÑÍAS', 'INGRESAR Y EMBARCAR EN EL ERP ', 'REALIZAR ANÁLISIS DE IMPACTOS DE OPERACIONES INTER C.', 'Autorizada'),
(995, 48, '2021-03-24 13:21:23', 'WALWORTH', 4011, 22, 'Administrativo', 'Ad. Documentos T.', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Roberto Cisneros', '', 'Neto', 'Mensual', '$7,500.00', '$7,500.00', 'Indistinto', 'Indistinto', 20, 30, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '05:30:00', 'DESEABLE CONOCIMIENTO DE MATERIALES', 'DESEABLE CONOCIMIENTOS EN ENSAYOS NO DESTTUCTIVOS', 'SISTEMA DE GESTIÓN DE CALIDAD', 'NA', 'NA', 'ORGANIZACIÓN ', 'ENFOQUE A LA CALIDAD', 'ORIENTACIÓN AL CLIENTE', 'NA', 'NA', 'REVISAR LOS REQUERIMIENTOS DOCUMENTALES DEL CLIENTE.', 'IDENTIFICAR ORDENES DE VENTA CON REQUERIMIENTOS DOC.', 'RECUPERAR REGISTROS DE DISTINTAS ÁREAS.', 'VERIFICAR CUMPLIMIENTO EN LOS REGISTROS', 'ENTREGAR DOCUMENTOS FÍSICOS /ELECTRÓNICOS', 'Autorizada'),
(996, 37, '2021-03-25 13:12:33', 'WALWORTH', 402, 4, 'Sindicalizado', 'Soldador Arco Manual', 1, 'Secundaria', 'Baja/Renuncia', 'Froylan Hernandez', 'Jose Manuel Castillo Lucio', 'Bruta', 'Semanal', '$323.25', '$323.25', 'Masculino', 'Casado/a', 30, 45, 'Otra', '3', 'Si', 'No', 'No', 'Lunes a Viernes', '07:00:00', '15:30:00', 'USO DE EQUIPO DE SOLDADURA (ARCO MANUAL)', 'INTERPRETACIÓN DE PROCEDIMIENTOS DE SOLDADURA', 'CONOCIMIENTO BÁSICO DE INSPECCIÓN DE SOLDADURA', 'CONOCIMIENTO DE MATERIALES', 'CONOCIMIENTO DE POSICIONES DE SOLDADURA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'LLENADO CORRECTO DE REGISTROS', 'PREPARACIONES DE HERRAMENTALES ', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada');
INSERT INTO `solicitudes` (`id_folio`, `id_user`, `fecha_creacion`, `empresa_solicitante`, `centro_costos`, `area_operativa`, `tipo_de_personal`, `puesto_solicitado`, `personas_requeridas`, `grado_estudios`, `motivo_requisicion`, `jefe_inmediato`, `colaborador_reemplazo`, `cotizacion`, `periodo`, `salario_inicial`, `salario_final`, `genero_requerido`, `estado_civil`, `edad_minima`, `edad_maxima`, `licencia_conducir`, `anios_experiencia`, `rolar_turno`, `trato_cli_prov`, `manejo_personal`, `jornada`, `horario_inicial`, `horario_final`, `conocimiento_1`, `conocimiento_2`, `conocimiento_3`, `conocimiento_4`, `conocimiento_5`, `competencia_1`, `competencia_2`, `competencia_3`, `competencia_4`, `competencia_5`, `actividad_1`, `actividad_2`, `actividad_3`, `actividad_4`, `actividad_5`, `estatus`) VALUES
(997, 52, '2021-03-25 13:31:24', 'WALWORTH', 4021, 39, 'Administrativo', 'Ingeniero Jr', 1, 'Licenciatura/Ingeniería', 'Promoción Interna', 'Jaime García', 'Antonio Espinosa Liceaga', 'Bruta', 'Mensual', '$0.00', '$0.00', 'Masculino', 'Indistinto', 25, 35, 'Otra', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'DISEÑO DE PIEZAS DENTRO DEL SECTOR METALMECÁNICO ', 'TOLERANCIAS GEOMÉTRICAS', 'AUTOCAD Y SOLID WORKS', 'INSTRUMENTOS DE MEDICIÓN', 'RESISTENCIA DE MATERIALES', 'TRABAJO EN EQUIPO', 'ORGANIZADO', 'CAPACIDAD DE ANÁLISIS', 'TOMA DE DECISIONES', 'CREATIVIDAD E INOVACIÓN', 'ELABORACIÓN DE LISTAS DE MATERIALES', 'ELABORACIÓN DE DOCUMENTACIÓN TÉCNICA', 'ELABORACIÓN DE PLANOS PARA MAQUINADOS ', 'DISEÑO DE PROTOTIPO DE VÁLVULAS', 'SOLUCIÓN DE PROBLEMAS EN PLANTA', 'Autorizada'),
(998, 34, '2021-03-25 13:49:21', 'WALWORTH', 4018, 23, 'Administrativo', 'Becario Project M.', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Edgar Islas', '', 'Neto', 'Mensual', '$3,000.00', '$3,000.00', 'Femenino', 'Indistinto', 21, 25, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '15:00:00', 'EXCEL BÁSICO', 'MS PROJECT BÁSICO', 'ADMINISTRACIÓN', 'PLANIFICACIÓN DE PROYECTOS ', 'COMUNICACIÓN', 'AUTONOMÍA Y PROACTIVIDAD', 'TRABAJO EN EQUIPO', 'COMPROMISO', 'RESPONSABILIDAD', 'CAPACIDAD DE INNOVACIÓN', 'GENERACIÓN DE REPORTES DE SEGUIMIENTO', 'REVISIÓN DE ESPECIFICACIONES CONTRACTUALES', 'SEGUIMIENTO EN PISO DE ÓRDENES DE TRABAJO', 'COMPILAR INFORMACIÓN DEL PROYECTO', 'CONTROLAR LOS RECURSOS ASIGNADOS AL PROYECTO', 'Autorizada'),
(999, 48, '2021-03-25 15:30:23', 'WALWORTH', 4010, 22, 'Administrativo', 'Ayudante De Limpieza', 1, 'Secundaria', 'Baja/Renuncia', 'Adriana Cuevas', ' Renato Jiménez', 'Neto', 'Mensual', '$4,200.00', '$4,200.00', 'Indistinto', 'Indistinto', 30, 50, 'Otra', '2', 'No', 'No', 'No', 'Lunes a Sábado', '06:00:00', '02:30:00', 'MANEJO DE SOLVENTES', 'MANEJO DE RESIDUOS', 'NA', 'NA', 'NA', 'ORIENTACIÓN AL CLIENTE', 'ORGANIZACIÓN ', 'COMUNICACIÓN ', 'NA', 'NA', 'LIMPIEZA DE ESCRITORIOS', 'LAVADO DE BAÑO', 'LIMPIEZA DE PISOS', 'DISPOSICIÓN DE BASURA GENERAL Y RECICLAJE.', 'LIMPIEZA DE VIDRIOS', 'Autorizada'),
(1000, 28, '2021-03-25 16:17:44', 'WALWORTH', 4006, 19, 'Administrativo', 'Becario (A)', 1, 'Licenciatura/Ingeniería', 'Promoción Interna', 'Aldo Ávila', 'Andrea Montoya', 'Neto', 'Mensual', '$3,000.00', '$3,000.00', 'Indistinto', 'Indistinto', 18, 50, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '07:00:00', '16:30:00', 'VÁLVULAS EN GENERAL', 'PROCESOS DE MANUFACTURA', '5\'S', 'ORDEN Y LIMPIEZA', 'DIBUJO TÉCNICO', 'DISEÑO Y DIBUJO TÉCNICO CAD', 'DISEÑO DE LAYOUT', 'APLICACIÓN DE 5\'S', 'APLICACIÓN DE MEJORA CONTINUA.', 'SEGUIMIENTO A OBJETIVOS', 'DISEÑO DE DISPOSITIVOS Y HERRAMIENTAS EN CAD', 'RECOPILACIÓN DE INFORMACIÓN EN PLANTA', 'DESARROLLO E IMPLEMENTACIÓN DE PROYECTOS ASIGNADOS.', 'SOPORTE A REQUERIMIENTOS DE INSUMOS Y HTAS', 'APLICACIÓN DE 5\'S Y KAIZEN', 'Autorizada'),
(1001, 53, '2021-03-25 17:18:40', 'WALWORTH', 4111, 18, 'Administrativo', 'Becario Ventas Int', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Oscar Pacheco', '', 'Neto', 'Mensual', '$3,000.00', '$3,000.00', 'Indistinto', 'Indistinto', 18, 24, 'Particular', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '15:00:00', 'PREFERENTE MANEJO DE EXCEL BÁSICO-INTERMEDIO', 'MANEJO DE IDIOMA INGLÉS, PREFERENTE INTERMEDIO', 'N/A', 'N/A', 'N/A', 'COMPROMISO', 'PROACTIVO', 'CONFIANZA', 'N/A', 'N/A', 'REVISIÓN DE ORDENES DE COMPRA DEL CLIENTE', 'APOYO GENERAL AL ÁREA DE VENTAS INTERNACIONALES PARA US', 'N/A', 'N/A', 'N/A', 'Autorizada'),
(1002, 20, '2021-03-26 10:15:54', 'WALWORTH', 4104, 34, 'Administrativo', 'Asesor De Ventas', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Jorge Cárdenas Monroy', '', 'Neto', 'Mensual', '$13,000.00', '$15,000.00', 'Masculino', 'Indistinto', 23, 24, 'Particular', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'BÁSICOS DE INGENIERÍA ', 'MANEJO DE PC Y PAQUETERÍA OFFICE', 'MANEJO DE IDIOMA INGLES INTERMEDIO', 'PREFERENTEMENTE QUE CONOZCA LAS VÁLVULAS EN GENERAL', 'DESEABLE EXPERIENCIA EN SECTOR GUBERNAMENTAL', 'PROACTIVO', 'GUSTO POR LAS VENTAS', 'ACTITUD DE SERVICIO', 'CAPACIDAD DE ANÁLISIS DE SEGUIMIENTO A PROCESOS', 'TRABAJO EN EQUIPO', 'APOYO TÉCNICO PARA LA ELABORACIÓN DE COTIZACIONES ', 'INGRESO DE PEDIDOS Y SU SEGUIMIENTO', ' REPORTES DE COTIZACIONES, INDICADORES Y FORECAST', 'INTERACCIÓN CON CLIENTES', 'CONOCIMIENTO GENERAL DE TODAS LAS LÍNEAS WALWORTH', 'Autorizada'),
(1003, 20, '2021-03-26 10:36:34', 'WALWORTH', 4104, 34, 'Administrativo', 'Becario Ventas', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Jorge Cárdenas Monroy', 'Ninguno', 'Neto', 'Mensual', '$3,000.00', '$4,000.00', 'Masculino', 'Indistinto', 20, 21, 'Particular', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'MANEJO DE PC Y PAQUETERÍA OFFICE', 'MANEJO DE  INGLÉS BÁSICO', 'PASANTE', 'PREFERENTEMENTE DE LA CARRERA DE INGENIERIA', 'ORIENTADO A LABORES DE OFICINA', 'PROACTIVO', 'ALINEADO A PROCEDIMIENTOS', 'ACTITUD DE SERVICIO', 'ANALITICO', 'ACTITUD DE COMPROMISO', 'APOYO ADMINISTRATIVO A VENTAS GOBIERNO', 'INTERACCIÓN CON PERSONAL DE PLANTA', 'SOPORTE EN ACTIVIDADES DE OFICINA', 'MANEJO DE ARCHIVO ', 'ATENCIÓN TELEFÓNICA A CLIENTES ', 'Autorizada'),
(1004, 37, '2021-03-30 09:10:25', 'WALWORTH', 402, 4, 'Sindicalizado', 'Soldador Arco Manual', 1, 'Secundaria', 'Baja/Renuncia', 'Froylan Hernandez', 'Luis Miguel Hernández Lázaro', 'Bruta', 'Semanal', '$2,262.75', '$2,262.75', 'Masculino', 'Indistinto', 25, 45, 'Otra', '3', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'USO DE EQUIPO DE SOLDADURA (ARCO MANUAL)', 'INTERPRETACIÓN DE PROCEDIMIENTOS DE SOLDADURA', 'CONOCIMIENTO BÁSICO DE INSPECCIÓN DE SOLDADURA', 'CONOCIMIENTO DE MATERIALES', 'CONOCIMIENTO DE POSICIONES DE SOLDADURA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'LLENADO CORRECTO DE REGISTROS', 'PREPARACIONES DE HERRAMENTALES ', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1005, 37, '2021-03-30 09:13:39', 'WALWORTH', 402, 4, 'Sindicalizado', 'Soldador Arco Manual', 1, 'Secundaria', 'Baja/Renuncia', 'Froylan Hernandez', 'Jose Domínguez Echeverria', 'Bruta', 'Semanal', '$323.25', '$323.25', 'Masculino', 'Indistinto', 25, 45, 'Otra', '3', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'USO DE EQUIPO DE SOLDADURA (ARCO MANUAL)', 'INTERPRETACIÓN DE PROCEDIMIENTOS DE SOLDADURA', 'CONOCIMIENTO BÁSICO DE INSPECCIÓN DE SOLDADURA', 'CONOCIMIENTO DE MATERIALES', 'CONOCIMIENTO DE POSICIONES DE SOLDADURA', 'LABORAR SIGUIENDO PROCEDIMIENTOS DE TRABAJO', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APORTE DE SOLDADURA A COMPONENTES DE VALVULAS', 'LLENADO CORRECTO DE REGISTROS', 'PREPARACIONES DE HERRAMENTALES ', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1006, 37, '2021-03-30 11:07:25', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Froylan Hernandez', 'Rafael Melquiades Pérez', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1007, 37, '2021-03-30 11:10:39', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Froylan Hernandez', 'Omar Juan Aguilar Rivera', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1008, 37, '2021-03-30 11:13:17', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Joel Hidalgo', 'Moreno Olvera Reyes David', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1009, 37, '2021-03-30 11:17:46', 'WALWORTH', 402, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Abinadab Nuñez', 'Sanchez Santana Roberto Carlos ', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1010, 37, '2021-03-31 10:56:41', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Joel Hidalgo', 'Campos Gonzalez Marcos Ignacio', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1011, 37, '2021-03-31 11:28:47', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Joel Hidalgo', 'Hernandez Ramon Victor', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1012, 37, '2021-03-31 11:31:21', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Joel Hidalgo', 'Sanchez Araujo Roberto', 'Bruta', 'Semanal', '$214.00', '$214.00', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1013, 48, '2021-03-31 18:14:10', 'WALWORTH', 4011, 22, 'Administrativo', 'Analista De Procesos', 1, 'Licenciatura/Ingeniería', 'Puesto de Nueva Creación', 'Marisol Prieto', '', 'Neto', 'Mensual', '$3,000.00', '$3,000.00', 'Indistinto', 'Indistinto', 20, 25, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '03:00:00', 'EXCEL AVANZADO', 'MAPA DE PROCESOS', 'INGLÉS INTERMEDIO (DESEABLE)', 'MANEJO OFFICE', 'NA', 'ORGANIZACIÓN ', 'COMUNICACIÓN ASERTIVA', 'NEGOCIACIÓN ', 'ANÁLISIS Y SÍNTESIS', 'NA', 'ELABORAR MATRIZ DE INDICADORES', 'RECOPILAR INFORMACIÓN PARA INDICADORES', 'SEGUIMIENTO A INDICADORES', 'PRESENTAR DATOS OBTENIDOS.', 'NA', 'Autorizada'),
(1014, 37, '2021-04-06 10:34:44', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Hector Rodriguez', 'Rodriguez Lugo Rogelio Valdemar', 'Bruta', 'Semanal', '$1,498.35', '$1,498.35', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'EXPERIENCIA EN ÁREA DE  PRODUCCIÓN METAL MECÁNICA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1015, 37, '2021-04-06 10:37:25', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Promoción Interna', 'Hector Rodriguez', 'Hernandez Perez Maria Celina', 'Bruta', 'Semanal', '$1,498.35', '$1,498.35', 'Femenino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'EXPERIENCIA EN ÁREA DE  PRODUCCIÓN METAL MECÁNICA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1016, 52, '2021-04-08 09:36:43', 'WALWORTH', 4021, 39, 'Administrativo', 'Dibujante', 1, 'Bachillerato', 'Promoción Interna', 'Jaime García', 'Eduardo Barrera Zepeda', 'Neto', 'Mensual', '$0.00', '$0.00', 'Indistinto', 'Indistinto', 20, 35, 'Otra', '1', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'TOLERANCIAS GEOMÉTRICAS', 'AUTOCAD Y SOLIWORKS 2D Y 3D', 'INSTRUMENTOS DE MEDICIÓN', 'PRACTICAS DE DIBUJOS DE INGENIERÍA', 'CONOCIMIENTO DE VÁLVULAS ', 'TRABAJO EN EQUIPO', 'ORGANIZADO', 'TENER INICIATIVA', 'TOMA DE DECISIONES', 'FLEXIBILIDAD Y ADAPTACIÓN AL CAMBIO', 'ELABORACIÓN DE PLANOS DE MAQUINADOS Y FUNDICIÓN', 'MODELADO DE PIEZAS MECÁNICAS  EN 3D', 'CODIFICACIÓN DE PIEZAS MECÁNICAS', 'ADMINISTRACIÓN DE DIBUJOS ELABORADOS', 'SOPORTE A PLANTA', 'Autorizada'),
(1017, 34, '2021-04-15 16:59:30', 'WALWORTH', 4018, 23, 'Administrativo', 'Administrador Ventas', 1, 'Licenciatura/Ingeniería', 'Baja/Renuncia', 'Edgar Islas', 'Alba Piñon', 'Neto', 'Mensual', '$10,000.00', '$15,000.00', 'Femenino', 'Indistinto', 25, 40, 'Particular', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'ADMINISTRACIÓN', 'HABILIDADES DE NEGOCIACIÓN', 'ORGANIZACIÓN', 'COMUNICACIÓN', 'ERP', 'AUTONOMÍA Y PROACTIVIDAD', 'TRABAJO EN EQUIPO', 'CAPACIDAD DE ORGANIZACIÓN DEL TRABAJO', 'CAPACIDAD DE INICIATIVA', 'ORGANIZACIÓN', 'INGRESO DE ÓRDENES A SISTEMA ERP', 'GENERACIÓN DE RMA´S', 'PROPORCIONAR INSTRUCCIONES DE EMBARQUE', 'ADMINISTRAR Y RECOLECTAR FIRMAS DE FORMATOS', 'COMPILACIÓN DE INFORMACIÓN PARA PEDIDOS', 'Autorizada'),
(1018, 46, '2021-04-15 18:05:29', 'WALWORTH', 4204, 15, 'Administrativo', 'Trainee de FI', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Roxana Galvez', '', 'Neto', 'Mensual', '$9,000.00', '$10,500.00', 'Indistinto', 'Indistinto', 23, 30, 'Otra', '1', 'No', 'Si', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'LFT', 'STPS', 'SIRCE', 'CAPACITACIÓN E-LEARNING', 'PROGRAMA ANUAL DE CAPACITAICÓN', 'ORGANIZACIÓN', 'ORIENTACIÓN AL CLIENTE INTERNO', 'COMUNICACIÓN EFECTIVA', 'TRABAJO COLABORATIVO', 'ADAPTACIÓN AL CAMBIO', 'CARGA MASIVA TRIMESTRAL EN SIRCE', 'ACTUALIZACIÓN DE DC-1, DC-2 Y DC-4', 'REGISTROS DE CAPACITACIÓN', 'SEGUIMIENTO A PROGRAMA JCF', 'LOGISTICA DE CAPACITACIÓN', 'Autorizada'),
(1019, 43, '2021-04-15 18:38:48', 'WALWORTH', 4208, 8, 'Administrativo', 'Analista de Nóminas', 1, 'Licenciatura/Ingeniería', 'Incremento de Actividad', 'Alejandra Enriquez Reyes', '', 'Neto', 'Mensual', '$12,000.00', '$12,000.00', 'Femenino', 'Indistinto', 27, 32, 'Otra', '2', 'No', 'No', 'No', 'Lunes a Viernes', '08:00:00', '17:30:00', 'MANEJO DE IDSE', 'MANEJO DE SUA', 'MANEJO DE NOI', 'CONOCIMIENTOS DE  EBA Y EMA', 'CONTROL DOCUMENTOS', 'TRABAJO BAJO PRESIÓN', 'EXCELENTE TRATO CON EL PERSONAL', 'ORDENADA', 'COMPROMISO CON SU TRABAJO', 'HONESTAS', 'PROCESO DE CONTRATACIÓN DEL PERSONAL', 'ARCHIVO Y CONTROL DE EXPEDIENTES', 'ANALISIS DE EMA Y EBA', 'ALTAS DE PERSONAL EN NOI', 'ATENCIÓN A REQUERIMIENTOS ADMINISTRATIVOS DEL PERSONAL', 'Autorizada'),
(1020, 37, '2021-04-20 14:54:58', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Joel Hidalgo', 'Rodriguez Maldonado Sofia Monserrat', 'Bruta', 'Semanal', '$1,498.35', '$1,498.35', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'APOYO A PINTOR', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1021, 37, '2021-04-20 14:58:34', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Joel Hidalgo', 'Gutierrez Rivera Victor Hugo', 'Bruta', 'Semanal', '$1,498.35', '$1,498.35', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1022, 37, '2021-04-20 15:01:49', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Hector Rodriguez', 'Santiago Hernandez Martin', 'Bruta', 'Semanal', '$1,498.35', '$1,498.35', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada'),
(1023, 37, '2021-04-20 15:06:29', 'WALWORTH', 4002, 4, 'Sindicalizado', 'Ayudante De Ensamble', 1, 'Secundaria', 'Baja/Renuncia', 'Hector Rodriguez', 'Luna Delgado Alberto Arturo', 'Bruta', 'Mensual', '$1,498.35', '$1,498.35', 'Masculino', 'Indistinto', 25, 45, 'Otra', '2', 'Si', 'No', 'No', 'Lunes a Sábado', '07:00:00', '15:30:00', 'MANEJO DE HERRAMIENTAS MANUALES', 'NA', 'NA', 'NA', 'NA', 'DESTREZA MANUAL', 'TRABAJO EN EQUIPO', 'CUMPLIMIENTO CON PUNTUALIDAD Y ASISTENCIA', 'ENFOQUE A LA CALIDAD EN SU TRABAJO', 'TRABAJAR CON SEGURIDAD E HIGIENE', 'APOYO A ENSAMBLADOR', 'REBABADO DE PIEZAS METALICAS', 'LLENADO DE REPORTES DIARIO', 'LABORAR SEGÚN REGLAMENTOS DE SEGURIDAD E HIGIENE', 'MANTENER ORDEN Y LIMPIEZA DE ÁREA DE TRABAJO', 'Autorizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `departamento_id` int(3) NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rol_id` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre`, `apellidos`, `departamento_id`, `email`, `password`, `rol_id`) VALUES
(8, 'Talento', '', 15, 'talento@grupowalworth.com', 'temp', 4),
(9, 'Ivan', 'Barreto', 29, 'ibarreto@grupowalworth.com', ' Walworth321$', 3),
(11, 'Felipe', 'Monroy', 29, 'fmonroy@walworth.com.mx', 'fmga1170', 1),
(12, 'Luiz Daniel', 'Durante', 20, 'ldurante@walworth.com.mx', 'lddo0105', 5),
(13, 'Adrian', 'Mathieu', 31, 'amathieu@walworth.com.mx', 'amvn5545', 1),
(14, 'Jorge', 'Castrillo', 26, 'jcastrillo@walworth.com.mx', 'jcin2202', 1),
(15, 'Humberto', 'Garcia Abreu', 30, 'hgarcia@walworth.com.mx', 'hgvn0510', 1),
(16, 'Rodrigo', 'Ascencio', 31, 'rascencio@walworth.com.mx', 'ravi8614', 1),
(17, 'Said', 'Ayala', 38, 'sayala@walworth.com.mx', 'savn2213', 3),
(18, 'Juan Carlos', 'Salas', 31, 'csalas@walworth.com.mx', 'csvn2780', 3),
(19, 'Carlos', 'Pineda', 11, 'cpineda@walworth.com.mx', 'cpvn5941\r\n\r\n', 3),
(20, 'Jorge', 'Cárdenas', 31, 'jcardenas@walworth.com.mx', 'jc201105', 3),
(21, 'Ignacio', 'Pardo', 30, 'ipardo@walworth.com.mx', 'ipvt1608\r\n', 3),
(22, 'Humberto', 'Aguilar', 30, 'haguilar@walworth.com.mx', 'havn1503', 3),
(23, 'Gabriel', 'Rojas', 18, 'grojas@walworth.com.mx', 'grvi7723', 1),
(24, 'Jaime', 'García', 39, 'jagarcia@walworth.com.mx', 'jgin1205', 1),
(25, 'Salvador', 'Gonzalez', 39, 'sgonzalez@walworth.com.mx', 'sgin1585', 1),
(26, 'Marco Antonio', 'Iniguez', 20, 'miniguez@walworth.com.mx', 'mici1288\r\n', 3),
(27, 'Anibal', 'Molina', 33, 'amolina@walworth.com.mx', 'ampr5347', 1),
(28, 'Aldo', 'Almazan', 33, 'aalmazan@walworth.com.mx', 'aama3169', 3),
(29, 'Alberto', 'Molinar', 7, 'amolinar@walworth.com.mx', 'amdg9208', 3),
(30, 'Juan', 'Morales', 33, 'jmorales@walworth.com.mx', 'juan321', 3),
(31, 'Gilberto', 'Sanchez', 33, 'gsanchez@walworth.com.mx', 'gscp1007', 3),
(32, 'Hector', 'Cardoso', 33, 'hcardoso@walworth.com.mx', 'hcop2611', 3),
(33, 'Sergio', 'Tlatelpa', 65, 'stlatelpa@walworth.com.mx', 'stcf1162', 3),
(34, 'Edgar', 'Islas', 33, 'eislas@walworth.com.mx', 'edis9078', 3),
(35, 'Cecilia', 'Morales', 30, 'cmorales@walworth.com.mx', 'cmvn1005', 3),
(36, 'Abraham', 'Sernas', 33, 'aserna@walworth.com.mx', 'aspt2872', 3),
(37, 'Javier', 'Cabello', 33, 'jcabello@walworth.com.mx', 'jcpr5941', 3),
(38, 'Adolfo ', 'Arroyo', 7, 'aarroyo@walworth.com.mx', 'arpt1303', 3),
(39, 'Joel', 'Hidalgo', 4, 'jhidalgo@walworth.com.mx', 'hidalgo60', 3),
(40, 'David ', 'Abad', 33, 'dabad@walworth.com.mx', 'dapx0215', 3),
(41, 'Ivan', 'Sanchez', 29, 'isanchez@walworth.com.mx', 'isad0793', 3),
(42, 'Edgar', 'Lugo', 29, 'elugo@walworth.com.mx', 'elco0220', 3),
(43, 'Alejandra', 'Enriquez', 29, 'aenriquez@walworth.com.mx', 'aerh7129', 3),
(44, 'Enrique', 'Vertiz', 29, 'evertiz@grupowalworth.com', 'evga2011', 3),
(45, 'Apolo', 'Rodriguez', 20, 'arodriguez@walworth.com.mx', 'armk2602', 3),
(46, 'Roxana ', 'Galvez', 15, 'rgalvez@grupowalworth.com', 'temp', 3),
(47, 'Victor', 'Hernandez', 20, 'vhernandez@walworth.com.mx', 'vh2602', 3),
(48, 'Marisol', 'Prieto', 33, 'lprieto@walworth.com.mx', 'mpvi8218', 3),
(49, 'Cristopher ', 'Sanchez', 20, 'csanchez@axoneconsulting.com', 'axone', 3),
(50, 'Monserrat', 'Sanchez', 20, 'msanchez@biascg.com.mx', 'bias', 3),
(51, 'Karen ', 'Rubio', 15, 'krubio@grupowalworth.com', 'krta1112', 2),
(52, 'Roberto Carlos', 'Lopez', 39, 'rclopez@walworth.com.mx', 'rcin1185', 3),
(53, 'Oscar', 'Pacheco', 18, 'opacheco@walworth.com.mx', 'opvi8317', 3),
(54, 'Blanca', 'Gomez', 15, 'becariotalento@walworth.com.mx', 'btta3905', 2),
(55, 'Andres', 'Celis', 29, 'acelis@grupowalworth.com', 'temp', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_depto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_folio`),
  ADD KEY `user_ibfk_1` (`id_user`),
  ADD KEY `are_operativa_depto_fk` (`area_operativa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `usuarios_ibfk_1` (`rol_id`),
  ADD KEY `depto_ibfk_1` (`departamento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_depto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `area_depto_fk` FOREIGN KEY (`area_operativa`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `depto_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
