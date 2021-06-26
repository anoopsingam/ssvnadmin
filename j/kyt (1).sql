-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 01:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sssvn`
--

-- --------------------------------------------------------

--
-- Table structure for table `kyt`
--

CREATE TABLE `kyt` (
  `id` varchar(10) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `voter_id` varchar(20) DEFAULT NULL,
  `pan_card` varchar(15) DEFAULT NULL,
  `ration_card` varchar(20) DEFAULT NULL,
  `passport` varchar(15) DEFAULT NULL,
  `father_name` varchar(30) DEFAULT NULL,
  `mother_name` varchar(30) DEFAULT NULL,
  `date_of_birth` varchar(11) DEFAULT NULL,
  `date_of_joining` varchar(11) DEFAULT NULL,
  `education_qualification` varchar(50) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `name_of_spouse` varchar(30) DEFAULT NULL,
  `no_of_kids` varchar(1) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `phone_no` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `bank_account_no` varchar(15) DEFAULT NULL,
  `bank_branch` varchar(25) DEFAULT NULL,
  `bank_ifsc` varchar(15) DEFAULT NULL,
  `original_certificate` varchar(50) DEFAULT NULL,
  `present_address` varchar(70) DEFAULT NULL,
  `permanent_address` varchar(70) DEFAULT NULL,
  `pf_enrolment_no` varchar(20) DEFAULT NULL,
  `esi_enrolment_no` varchar(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `link_documents` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyt`
--

INSERT INTO `kyt` (`id`, `name`, `aadhar_no`, `voter_id`, `pan_card`, `ration_card`, `passport`, `father_name`, `mother_name`, `date_of_birth`, `date_of_joining`, `education_qualification`, `marital_status`, `name_of_spouse`, `no_of_kids`, `gender`, `phone_no`, `email`, `bank_account_no`, `bank_branch`, `bank_ifsc`, `original_certificate`, `present_address`, `permanent_address`, `pf_enrolment_no`, `esi_enrolment_no`, `status`, `link_documents`) VALUES
('stark1', 'shinchan nohara', '1234567890', '0987654321', '1236789045', '0987432165', '578904321', 'hiroshi', 'mitsi', '19/01/2001', 'kal join ho', '5 sal ka baccha', 'single', 'nanako', '0', 'male', 'quantum robo', 'shinchan@gmail.com', 'kalsubah', 'kasukabe', 'himawari', 'certificate', 'kasukabe defence group', 'kasukabe defence group', 'himawarinohara', 'masaou', 'not_admitted', 'uploads/shinchan nohara.pdf'),
('stark2', 'Shravan mobile', 'Adharr', 'Voterr', 'Pann', 'Rationn', 'Passportt', 'Fname', 'Mname', '19/01/2001', '10/10/10', 'Nulll', 'Single', 'No', '0', 'male', '8431254651', 'shravan@starktechlabs.in', 'Bank number', 'Branch', 'Ifsc', 'Certific', 'Ssbjjj', 'Ssbjjjjjjjjj', 'Pfenroll', 'Esienroll', 'not_admitted', 'uploads/Shravan mobile.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
