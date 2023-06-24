SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `beds` (
  `Hospital` varchar(30) NOT NULL,
  `Total beds` int(8) NOT NULL,
  `ICU beds` int(8) NOT NULL,
  `Ventilator` int(8) NOT NULL,
  `Non icu beds with oxy` int(8) NOT NULL,
  `Locate Hospital` varchar(30) NOT NULL,
  PRIMARY KEY (`Hospital`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `beds`
  ADD PRIMARY KEY (`Hospital`);

ALTER TABLE `beds`
  MODIFY `Hospital` varchar(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;