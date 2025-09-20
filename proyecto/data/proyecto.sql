CREATE DATABASE IF NOT EXISTS proyecto;
USE proyecto;

CREATE TABLE IF NOT EXISTS `vehiculos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `anno` int(4) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `Patente` varchar (9) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `vehiculos` (`marca`, `modelo`, `anno`, `Tipo`, `Patente`, `precio`) VALUES
('Toyota', 'Corolla', 2020, 'Sedan', 'ABC123', 20000.00),
('Ford', 'Mustang', 2019, 'Coupe', 'XYZ789', 30000.00),
('Honda', 'Civic', 2021, 'Sedan', 'DEF456', 22000.00),
('Chevrolet', 'Camaro', 2018, 'Coupe', 'GHI012', 28000.00),
('Nissan', 'Altima', 2020, 'Sedan', 'JKL345', 21000.00);

SELECT * FROM vehiculos