-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 16 Σεπ 2021 στις 19:41:16
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
-- Δομή πίνακα για τον πίνακα `shift_schedule`
--

CREATE TABLE `shift_schedule` (
  `id` int(11) NOT NULL,
  `shift_title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `total_hours` float(50,0) NOT NULL,
  `shift_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_job` varchar(255) NOT NULL,
  `schedule_note` varchar(255) NOT NULL,
  `shift_start` varchar(255) NOT NULL,
  `shift_end` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `shift_schedule`
--

INSERT INTO `shift_schedule` (`id`, `shift_title`, `location`, `total_hours`, `shift_date`, `user_id`, `schedule_job`, `schedule_note`, `shift_start`, `shift_end`, `status`) VALUES
(63, 'customer2222', 'United Kingdom222', 8, '2021-09-08', 93, '301', '222', '09:10', '17:00', ''),
(94, 'customer2222', 'United Kingdom222', 8, '2021-09-10', 93, 'Locksmith, Security & Fire Safety', '222', '09:20', '17:00', ''),
(95, 'sss', 'TTTTTT', 8, '2021-09-06', 93, 'Dog', 'TTTTT', '09:00', '17:00', ''),
(96, 'customer1', 'UK', 8, '2021-09-07', 71, 'cleaning', 'done', '09:00', '17:00', ''),
(97, 'shifttitle', 'United Kindom', 6, '2021-09-07', 72, 'Domestic Cleaning NormalAppliances CleaningEnd & Pre Tenancy/ Student accommodationOven/BBQ Deep CleanWindow CleaningUpholstery and Furniture CleaningCarpet and Rug CleaningCommercial CleaningIndustrial CleaningOffice CleaningBuilding-Construction / After', 'Done										', '09:19', '15:20', 'true'),
(98, 'ddd', 'ssss', 8, '2021-09-10', 72, 'Locksmith, Security & Fire Safety', 'qwe									', '09:56', '17:57', 'true'),
(99, 'asdf sdf', 'dsafsdf', 14, '2021-09-09', 71, 'Domestic Cleaning NormalAppliances CleaningEnd & Pre Tenancy/ Student accommodationOven/BBQ Deep CleanWindow CleaningUpholstery and Furniture CleaningCarpet and Rug CleaningCommercial CleaningIndustrial CleaningOffice CleaningBuilding-Construction / After', '										', '09:31', '23:31', ''),
(100, 'asdf sdf', 'dsafsdf', 8, '2021-09-09', 71, 'Domestic Cleaning NormalAppliances CleaningEnd & Pre Tenancy/ Student accommodationOven/BBQ Deep CleanWindow CleaningUpholstery and Furniture CleaningCarpet and Rug CleaningCommercial CleaningIndustrial CleaningOffice CleaningBuilding-Construction / After', '										', '09:31', '17:31', ''),
(101, 'sss', 'TTTTTT', 8, '2021-09-06', 93, 'Locksmith, Security & Fire Safety', 'TTTTT', '09:00', '17:00', ''),
(102, 'sdfsadf', 'United Kindom', 8, '2021-09-13', 95, 'Locksmith, Security & Fire Safety', 'sss								', '09:43', '17:44', 'false');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `shift_schedule`
--
ALTER TABLE `shift_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `shift_schedule`
--
ALTER TABLE `shift_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
