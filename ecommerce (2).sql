-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2024 at 11:38 AM
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
  `email` varchar(255) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `id`) VALUES
('ela@gmail.com', 1);

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
(33, 'aymen', 'mansouri', 'aymen@gmail.com', '22546789', 'gafsa', '$2y$10$8KyR3mc.G3AtdNvlkwr7CuTvY1fUM00HtKnAe9Mz4pBEvj8.cbNau'),
(34, 'amina', 'toumi', 'amina@gmail.com', '55478963', 'monastir', '$2y$10$KzJ/tMPgQ7BRjfZ.zUZeT.cbH5Vee9MX0xPLvABcgwnGiA9I6Xeaq'),
(35, 'mariem', 'belhaj', 'mariem@gmail.com', '22546381', 'tunisia', '$2y$10$4FFZp0ME.0ElvqTOKnccau7NPQ/Nrr7LoMoSb/iwdlqgDh7jD3cCm'),
(37, 'emna', 'tounsi', 'emna@gmail.com', '55478963', 'tunis', '$2y$10$Nrpt4e7FaIdLefJaYQz/t.qeriqFv9OVDw174C9gH3NxOUfpiqYVC'),
(38, 'eya', 'damak', 'eya@gmail.com', '22145789', 'monastir', '$2y$10$kBg/xAcR5G0JZNS4cteO0eXssT5RisR8hMC34d7F8EumEfpF6ixru');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int NOT NULL,
  `idClient` int NOT NULL,
  `dateCommande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `dateCommande`) VALUES
(16, 33, '2024-08-19 10:24:46'),
(17, 33, '2024-08-19 11:46:09'),
(18, 37, '2024-08-19 12:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `idProduct` int NOT NULL,
  `idCommande` int NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ligne_commande`
--

INSERT INTO `ligne_commande` (`idProduct`, `idCommande`, `price`, `quantity`, `id`) VALUES
(2, 16, '59.98', 2, 28),
(3, 16, '5.99', 1, 29),
(1, 17, '19.99', 1, 30),
(1, 18, '19.99', 1, 31);

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
(1, 'Hydrating Face Cream', 'A moisturizing face cream suitable for all skin types.', '19.99$', 49, 'add to bag', 'face_cream.webp'),
(2, 'Brightening Serum', 'A serum that brightens and evens skin tone.', '29.99$', 30, 'add to bag', 'brightening_serum.webp'),
(3, 'Lip Balm', 'A nourishing lip balm to keep your lips soft.', '5.99$', 100, 'add to bag', 'lip_balm.webp'),
(4, 'Mascara', 'A volumizing mascara for dramatic lashes.', '14.99$', 39, 'add to bag', 'mascara.webp'),
(5, 'Eyeshadow Palette', 'A palette with 12 vibrant eyeshadow shades.', '24.99$', 20, 'add to bag', 'eyeshadow_palette.webp'),
(6, 'Sunscreen SPF 50', 'A high-protection sunscreen for all skin types.', '15.99$', 60, 'add to bag', 'sunscreen.webp'),
(7, 'Night Repair Cream', 'A night cream that repairs and rejuvenates the skin.', '34.99$', 25, 'coming soon', 'night_cream.jpg'),
(8, 'Vitamin C Serum', 'A serum that brightens and reduces fine lines.', '27.99$', 35, 'add to bag', 'vitamin_c_serum.webp'),
(9, 'Moisturizing Body Lotion', 'A body lotion that deeply moisturizes the skin.', '12.99$', 80, 'add to bag', 'body_lotion.jpg'),
(10, 'Clay Mask', 'A purifying clay mask for clear skin.', '18.99$', 45, 'add to bag', 'clay_mask.webp'),
(11, 'Anti-Aging Cream', 'A cream that reduces the appearance of wrinkles.', '39.99$', 20, 'coming soon', 'anti_aging_cream.webp'),
(12, 'Hair Conditioner', 'A conditioner that nourishes and strengthens hair.', '9.99$', 70, 'add to bag', 'hair_conditioner.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `id`, `role`) VALUES
(1, 'ela', '$2b$12$VpdxlmV0dQqdcxEGNwZkTei0jsb0X7lpAcnvAQ9Gc6o5NXsTFgR4a', 1, 'admin'),
(10, 'aymen', '$2y$10$8KyR3mc.G3AtdNvlkwr7CuTvY1fUM00HtKnAe9Mz4pBEvj8.cbNau', 33, 'client'),
(11, 'amina', '$2y$10$KzJ/tMPgQ7BRjfZ.zUZeT.cbH5Vee9MX0xPLvABcgwnGiA9I6Xeaq', 34, 'client'),
(12, 'mariem', '$2y$10$4FFZp0ME.0ElvqTOKnccau7NPQ/Nrr7LoMoSb/iwdlqgDh7jD3cCm', 35, 'client'),
(14, 'emna', '$2y$10$Nrpt4e7FaIdLefJaYQz/t.qeriqFv9OVDw174C9gH3NxOUfpiqYVC', 37, 'client'),
(15, 'eya', '$2y$10$kBg/xAcR5G0JZNS4cteO0eXssT5RisR8hMC34d7F8EumEfpF6ixru', 38, 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
