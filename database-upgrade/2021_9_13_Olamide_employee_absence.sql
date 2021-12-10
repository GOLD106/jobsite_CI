-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 13 Σεπ 2021 στις 19:57:41
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `developer_data`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee_absence`
--

CREATE TABLE `employee_absence` (
  `id` int(11) NOT NULL,
  `absence_from` date DEFAULT NULL,
  `absence_to` date DEFAULT NULL,
  `absence_type` varchar(255) DEFAULT NULL,
  `absence_note` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `employee_absence`
--

INSERT INTO `employee_absence` (`id`, `absence_from`, `absence_to`, `absence_type`, `absence_note`, `user_id`) VALUES
(1, '2021-09-06', '2021-09-07', 'Vation', '   va                   ', 93),
(2, '2021-09-09', '2021-09-09', 'Vation', 'vaca', 93),
(3, '2021-09-10', '2021-09-11', 'Vation', 'vaca', 93),
(4, '2021-09-08', '2021-09-08', 'Vation', 'vava                  ', 93),
(5, '2021-09-13', '2021-09-13', 'Vation', 'aaaa', 93);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `employee_absence`
--
ALTER TABLE `employee_absence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `employee_absence`
--
ALTER TABLE `employee_absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
