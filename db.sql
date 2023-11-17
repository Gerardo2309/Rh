  /*idtrabajador = rfc*/
DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE IF NOT EXISTS `trabajadores` (
  `idtrabajador` varchar(13) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `puesto` text NOT NULL,
  `telefono` bigint(20) NOT NULL, 
  `correo` text NOT NULL,
  `direccion` text NOT NULL,
  `fechaingreso` DATETIME NOT NULL,
  `sucursal` text NOT NULL,
  `sueldo` decimal(8,2) NULL,  
  `salario` decimal(8,2) NULL, 
  `infonavit` int(1) NULL,
  PRIMARY KEY (`idtrabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user` varchar(13) NOT NULL,
  `idtrabajador` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`User`), 
  FOREIGN KEY (idtrabajador) REFERENCES trabajadores(idtrabajador)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`user`, `idtrabajador`, `password`) VALUES ('Gerardo23','COAG0009238T5','ab767dcbd54062cc93af26df2f8fe8b077d13002fdf83ba4d0f3d373148b1de4f38bbaaf582c7066873af2ea6ba2da469c25256db4d7aa79a97f69fdd2648992');

DROP TABLE IF EXISTS `fsolicitud`;
CREATE TABLE IF NOT EXISTS `fsolicitud` (
  `idtrabajador` varchar(13) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `puesto` text NOT NULL,
  `telefono` bigint(11) NOT NULL,  
  `correo` text NOT NULL,  
  `direccion` text NOT NULL,  
  `archivo` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtrabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `doctrabajadores`;
CREATE TABLE IF NOT EXISTS `doctrabajadores` (
  `idtrabajador` varchar(13) NOT NULL, 
  `doc1` varchar(255) NULL,  
  `doc2` varchar(255) NULL,
  `doc3` varchar(255) NULL,
  `doc4` varchar(255) NULL,
  `doc5` varchar(255) NULL,
  `perfil` varchar(255) NULL,  
  FOREIGN KEY (idtrabajador) REFERENCES trabajadores(idtrabajador) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `nomina_percepciones`;
CREATE TABLE IF NOT EXISTS `nomina_percepciones` (
  `fecha` DATETIME NOT NULL, 
  `idtrabajador` varchar(13) NOT NULL, 
  `diasT` int(3) NULL,
  `hras_extras` int(3) NULL,
  `festivo` int(3) NULL,
  `prima_vac` decimal(8,2) NULL,
  FOREIGN KEY (idtrabajador) REFERENCES trabajadores(idtrabajador) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `nomina_deducciones`;
CREATE TABLE IF NOT EXISTS `nomina_deducciones` (
  `fecha` DATETIME NOT NULL, 
  `idtrabajador` varchar(13) NOT NULL, 
  `comida` decimal(8,2) NULL,
  `conv_infonavit` decimal(8,2) NULL,
  `cxc` decimal(8,2) NULL,
  FOREIGN KEY (idtrabajador) REFERENCES trabajadores(idtrabajador) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `cal_isr`;
CREATE TABLE IF NOT EXISTS `cal_isr` (
  `id` int(2) NOT NULL AUTO_INCREMENT, 
  `inferior1` decimal(8,2) NOT NULL, 
  `inferior2` decimal(8,2) NOT NULL,
  `lim_sup` decimal(8,2) NOT NULL,
  `cuota` decimal(8,2) NOT NULL,
  `porciento` decimal(8,2) NOT NULL,
  `subcidio` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cal_isr` (`id`, `inferior1`, `inferior2`, `lim_sup`, `cuota`, `porciento`, `subcidio`) 
VALUES 
(NULL, '0.01', '0.01', '318.00', '0.00', '1.92', '200.85'),
(NULL, '318.01', '318.01', '872.85', '6.15', '6.40', '200.85'),
(NULL, '318.01', '872.86', '1,309.20', '6.15', '6.40', '200.70'),
(NULL, '318.01', '1309.21', '1713.60', '6.15', '6.40', '200.70'),
(NULL, '318.01', '1713.61', '1745.70', '6.15', '6.40', '193.80'),
(NULL, '318.01', '1745.71', '2193.75', '6.15', '6.40', '188.70'),
(NULL, '318.01', '2193.76', '2327.55', '6.15', '6.40', '174.75'),
(NULL, '318.01', '2327.56', '2632.65', '6.15', '6.40', '160.35'),
(NULL, '318.01', '2632.66', '2699.40', '6.15', '6.40', '145.35'),
(NULL, '2699.41', '2699.41', '3071.40', '158.55', '10.88', '145.35'),
(NULL, '2699.41', '3071.41', '3510.15', '158.55', '10.88', '125.10'),
(NULL, '2699.41', '3510.16', '3642.60', '158.55', '10.88', '107.40'),
(NULL, '2699.41', '3642.61', '4744.05', '158.55', '10.88', '0.00'),
(NULL, '4744.06', '4744.06', '5514.75', '381.00', '16.00', '0.00'),
(NULL, '5514.76', '5514.76', '6602.70', '504.30', '17.92', '0.00'),
(NULL, '6602.71', '6602.71', '13316.70', '699.30', '21.36', '0.00'),
(NULL, '13316.71', '13316.71', '20988.90', '2133.30', '23.52', '0.00'),
(NULL, '20988.91', '20988.91', '40071.30', '3937.80', '30.00', '0.00'),
(NULL, '40071.31', '40071.31', '53428.50', '9662.55', '32.00', '0.00'),
(NULL, '53428.51', '53428.51', '160285.35', '13936.80', '34.00', '0.00');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `categoria` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(8,2) NOT NULL,  
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `menu` (`idmenu`, `nombre`, `categoria`, `descripcion`, `precio`) 
VALUES 
(NULL, 'Hamburgesa Mexico Magico', 'Alimentos', 'Hamburgesa de carne res a termino medio con papas y adesesos', '257.80');



DROP TABLE IF EXISTS `comida_trab`;
CREATE TABLE IF NOT EXISTS `comida_trab` (
  `fecha` DATETIME NOT NULL, 
  `idorden` int(10) NOT NULL, 
  `idmenu` int(10) NOT NULL, 
  `idtrabajador` varchar(13) NOT NULL, 
  `cantidad` int(2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idorden`),
  FOREIGN KEY (idmenu) REFERENCES menu(idmenu),
  FOREIGN KEY (idtrabajador) REFERENCES trabajadores(idtrabajador)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `cxc`;
CREATE TABLE IF NOT EXISTS `cxc` (
  `fecha` DATE NOT NULL, 
  `idcxc` varchar(16) NOT NULL, 
  `idtrabajador` varchar(13) NOT NULL, 
  `monto` decimal(8,2) NOT NULL,
  `plazos` int(2) NOT NULL,
  `cobrado` decimal(8,2) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`idcxc`),
  FOREIGN KEY (idtrabajador) REFERENCES trabajadores(idtrabajador)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `idtrabajador` varchar(13) NOT NULL, 
  `fecha` DATE NOT NULL, 
  `entrada` TIME NOT NULL, 
  `salida` TIME NOT NULL,
  FOREIGN KEY (idtrabajador) REFERENCES trabajadores(idtrabajador)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

