-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 17 Σεπ 2021 στις 18:22:19
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
(1, '2021-09-06', '2021-09-07', 'Sick leave', 'aaa', 93),
(2, '2021-09-08', '2021-09-09', 'Vation', 'fffff', 93),
(3, '2021-09-06', '2021-09-10', 'Sick leave', 'aaa', 93),
(5, '2021-09-12', '2021-09-12', 'Vation', 'fffff', 93),
(6, '2021-09-13', '2021-09-13', 'Vation', 'fffff', 93),
(7, '2021-09-13', '2021-09-16', 'Vation', 'fffff', 93),
(8, '2021-09-17', '2021-09-19', 'Non Paid Absence', 'bbb', 93),
(9, '2021-09-20', '2021-09-23', 'Sick leave', 'Sick', 93);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
