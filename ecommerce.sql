-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2024 at 05:00 PM
-- Server version: 8.0.36
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('ela', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `idClient` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `name`, `lastName`, `email`, `phone`, `adress`, `password`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', '555-1234', '123 Elm Street', 'password123'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', '555-5678', '456 Oak Avenue', 'password456'),
(3, 'Emily', 'Johnson', 'emily.johnson@example.com', '555-8765', '789 Pine Road', 'password789'),
(4, 'Michael', 'Brown', 'michael.brown@example.com', '555-4321', '321 Maple Lane', 'password321'),
(5, 'Sarah', 'Davis', 'sarah.davis@example.com', '555-6789', '654 Cedar Street', 'password654'),
(6, 'David', 'Wilson', 'david.wilson@example.com', '555-9876', '987 Birch Boulevard', 'password987'),
(7, 'Laura', 'Garcia', 'laura.garcia@example.com', '555-3456', '246 Spruce Drive', 'password246');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int NOT NULL,
  `idClient` int NOT NULL,
  `dateCommande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `idProduct` int NOT NULL,
  `idCommande` int NOT NULL,
  `prix` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `etat` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `name`, `description`, `price`, `quantity`, `etat`, `picture`) VALUES
(1, 'Hydrating Face Cream', 'A moisturizing face cream suitable for all skin types.', '19.99$', 50, 'add to bag', 'face_cream.webp'),
(2, 'Brightening Serum', 'A serum that brightens and evens skin tone.', '29.99$', 30, 'add to bag', 'brightening_serum.webp'),
(3, 'Lip Balm', 'A nourishing lip balm to keep your lips soft.', '5.99$', 100, 'add to bag', 'lip_balm.webp'),
(4, 'Mascara', 'A volumizing mascara for dramatic lashes.', '14.99$', 40, 'add to bag', 'mascara.webp'),
(5, 'Eyeshadow Palette', 'A palette with 12 vibrant eyeshadow shades.', '24.99$', 20, 'add to bag', 'eyeshadow_palette.webp'),
(6, 'Sunscreen SPF 50', 'A high-protection sunscreen for all skin types.', '15.99$', 60, 'add to bag', 'sunscreen.webp'),
(7, 'Night Repair Cream', 'A night cream that repairs and rejuvenates the skin.', '34.99$', 25, 'coming soon', 'night_cream.jpg'),
(8, 'Vitamin C Serum', 'A serum that brightens and reduces fine lines.', '27.99$', 35, 'add to bag', 'vitamin_c_serum.webp'),
(9, 'Moisturizing Body Lotion', 'A body lotion that deeply moisturizes the skin.', '12.99$', 80, 'add to bag', 'body_lotion.jpg'),
(10, 'Clay Mask', 'A purifying clay mask for clear skin.', '18.99$', 45, 'add to bag', 'clay_mask.webp'),
(11, 'Anti-Aging Cream', 'A cream that reduces the appearance of wrinkles.', '39.99$', 20, 'coming soon', 'anti_aging_cream.webp'),
(12, 'Hair Conditioner', 'A conditioner that nourishes and strengthens hair.', '9.99$', 70, 'add to bag', 'hair_conditioner.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Indexes for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
