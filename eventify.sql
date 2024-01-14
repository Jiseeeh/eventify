-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 03:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventify`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `frontmatter` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` text DEFAULT NULL,
  `maximum_slot` int(11) NOT NULL,
  `remaining_slot` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `uniq_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `frontmatter`, `description`, `image_url`, `maximum_slot`, `remaining_slot`, `start`, `end`, `uniq_id`) VALUES
(1, 'Sample Event 1', 'Frontmatter for Event 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Euismod quis viverra nibh cras pulvinar mattis nunc sed. Id aliquet risus feugiat in ante metus dictum at. Vitae tortor condimentum lacinia quis vel eros donec ac odio. Aliquet nec ullamcorper sit amet risus nullam eget. Sit amet mattis vulputate enim nulla aliquet. Quis vel eros donec ac odio tempor orci. Purus in massa tempor nec. Rhoncus dolor purus non enim praesent. Consequat mauris nunc congue nisi vitae suscipit. Facilisis gravida neque convallis a cras semper. Dis parturient montes nascetur ridiculus. Nec ullamcorper sit amet risus nullam. A condimentum vitae sapien pellentesque habitant. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Euismod quis viverra nibh cras pulvinar mattis nunc sed. Id aliquet risus feugiat in ante metus dictum at. Vitae tortor condimentum lacinia quis vel eros donec ac odio. Aliquet nec ullamcorper sit amet risus nullam eget. Sit amet mattis vulputate enim nulla aliquet. Quis vel eros donec ac odio tempor orci. Purus in massa tempor nec. Rhoncus dolor purus non enim praesent. Consequat mauris nunc congue nisi vitae suscipit. Facilisis gravida neque convallis a cras semper. Dis parturient montes nascetur ridiculus. Nec ullamcorper sit amet risus nullam. A condimentum vitae sapien pellentesque habitant.', NULL, 200, 7, '2023-10-20 09:00:00', '2023-10-24 00:00:00', '653106930f100'),
(2, 'Sample Event 2', 'Frontmatter for Event 2', 'Orion\'s sword science bits of moving fluff prime number Jean-François Champollion Drake Equation. Culture at the edge of forever citizens of distant epochs adipisci velit Neque porro quisquam est great turbulent clouds. Made in the interiors of collapsing stars nisi ut aliquid ex ea commodi consequatur are creatures of the cosmos stirred by starlight Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit Ut enim ad minima veniam and billions upon billions upon billions upon billions upon billions upon billions upon billions.', NULL, 200, 197, '2023-10-27 00:00:00', '2023-10-28 01:31:47', '653106d6d6c6e'),
(6, 'Ultra Mega Sagan Event', 'Muse about Cambrian explosion sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem tesseract decipherment Vangelis. Ut enim ad minima veniam colonies colonies the carbon in our apple pies Quis autem vel eum', 'Vangelis preserve and cherish that pale blue dot permanence of the stars cosmic ocean encyclopaedia galactica of brilliant syntheses? Shores of the cosmic ocean Euclid Drake Equation brain is the seed of intelligence another world are creatures of the cosmos. A still more glorious dawn awaits how far away inconspicuous motes of rock and gas Rig Veda tendrils of gossamer clouds great turbulent clouds. Great turbulent clouds the ash of stellar alchemy Sea of Tranquility two ghostly white figures in coveralls and helmets are softly dancing the carbon in our apple pies inconspicuous motes of rock and gas.\r\n\r\nOf brilliant syntheses two ghostly white figures in coveralls and helmets are softly dancing vastness is bearable only through love great turbulent clouds Orion\'s sword concept of the number one. Laws of physics stirred by starlight take root and flourish not a sunrise but a galaxyrise Apollonius of Perga Sea of Tranquility? Courage of our questions citizens of distant epochs circumnavigated rich in heavy atoms prime number are creatures of the cosmos.\r\n\r\nBillions upon billions how far away at the edge of forever two ghostly white figures in coveralls and helmets are softly dancing the sky calls to us intelligent beings. Finite but unbounded colonies billions upon billions tesseract from which we spring billions upon billions? Kindling the energy hidden in matter star stuff harvesting star light are creatures of the cosmos paroxysm of global death hundreds of thousands dream of the mind\'s eye.\r\n\r\nMuse about decipherment descended from astronomers another world dispassionate extraterrestrial observer a very small stage in a vast cosmic arena. White dwarf extraordinary claims require extraordinary evidence finite but unbounded vanquish the impossible shores of the cosmic ocean a still more glorious dawn awaits. Vanquish the impossible two ghostly white figures in coveralls and helmets are softly dancing courage of our questions concept of the number one invent the universe the only home we\'ve ever known.\r\n\r\nJean-François Champollion great turbulent clouds muse about realm of the galaxies how far away cosmic fugue. From which we spring a mote of dust suspended in a sunbeam circumnavigated star stuff harvesting star light made in the interiors of collapsing stars take root and flourish. Paroxysm of global death made in the interiors of collapsing stars another world brain is the seed of intelligence stirred by starlight stirred by starlight.\r\n\r\nFinite but unbounded intelligent beings made in the interiors of collapsing stars hundreds of thousands tingling of the spine billions upon billions. Rich in heavy atoms circumnavigated are creatures of the cosmos inconspicuous motes of rock and gas the carbon in our apple pies a very small stage in a vast cosmic arena. Rich in heavy atoms courage of our questions not a sunrise but a galaxyrise something incredible is waiting to be known muse about extraordinary claims require extraordinary evidence?\r\n\r\nLaws of physics vanquish the impossible a very small stage in a vast cosmic arena Hypatia rings of Uranus Drake Equation. Citizens of distant epochs not a sunrise but a galaxyrise great turbulent clouds dispassionate extraterrestrial observer ship of the imagination culture. Invent the universe with pretty stories for which there\'s little good evidence Sea of Tranquility with pretty stories for which there\'s little good evidence permanence of the stars shores of the cosmic ocean.\r\n\r\nPreserve and cherish that pale blue dot take root and flourish paroxysm of global death the carbon in our apple pies prime number finite but unbounded. Permanence of the stars permanence of the stars Orion\'s sword courage of our questions intelligent beings cosmic ocean. Two ghostly white figures in coveralls and helmets are softly dancing emerged into consciousness the only home we\'ve ever known realm of the galaxies emerged into consciousness rich in heavy atoms.\r\n\r\nVenture across the centuries rich in heavy atoms realm of the galaxies permanence of the stars Apollonius of Perga. Vanquish the impossible something incredible is waiting to be known descended from astronomers a mote of dust suspended in a sunbeam bits of moving fluff bits of moving fluff. Inconspicuous motes of rock and gas courage of our questions the only home we\'ve ever known astonishment network of wormholes another world?\r\n\r\nVenture how far away inconspicuous motes of rock and gas explorations rich in mystery decipherment. Made in the interiors of collapsing stars invent the universe finite but unbounded emerged into consciousness invent the universe Orion\'s sword. Are creatures of the cosmos Orion\'s sword realm of the galaxies stirred by starlight stirred by starlight the only home we\'ve ever known. Citizens of distant epochs with pretty stories for which there\'s little good evidence extraordinary claims require extraordinary evidence extraordinary claims require extraordinary evidence the only home we\'ve ever known citizens of distant epochs and billions upon billions upon billions upon billions upon billions upon billions upon billions.', 'https://png.pngtree.com/background/20210712/original/pngtree-vast-space-universe-blue-nebula-galaxy-background-picture-image_1178899.jpg', 420, 410, '2023-10-23 22:46:00', '2024-10-23 22:32:00', '653687210a454'),
(7, 'Ultra mega super deluxe event', 'sdfsdfsdfsdfsdfsdf', 'sdfsdfsdfdsfdsfdsfdsfdffd', 'https://img.freepik.com/free-photo/venus-sky-night-background-asset-game-2d-futuristic-generative-ai_191095-2029.jpg', 23, 22, '2023-10-24 17:30:00', '2023-11-09 17:31:00', '65378e848e18d'),
(8, 'gfdgfdgfdgdfgdf', 'dfgdfgdfgdfgfd', 'gfdgfdgfdgfd', 'https://png.pngtree.com/background/20210712/original/pngtree-vast-space-universe-blue-nebula-galaxy-background-picture-image_1178899.jpg', 23, 22, '2024-01-10 20:47:00', '2024-07-19 20:47:00', '659e91d6aa9e8'),
(9, 'Absent ako bukas', 'SECRET SUMMARY', 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdf', 'https://img.freepik.com/free-photo/venus-sky-night-background-asset-game-2d-futuristic-generative-ai_191095-2029.jpg', 12, 10, '2024-01-11 07:00:00', '2024-01-11 18:04:00', '659e94c532161');

-- --------------------------------------------------------

--
-- Table structure for table `student_events`
--

CREATE TABLE `student_events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `uniq_id` text NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` enum('STUDENT','ADMIN') NOT NULL DEFAULT 'STUDENT',
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `uniq_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`, `uniq_id`) VALUES
(1, 'ADMIN', 'Jiseeeh', '$2y$10$XTSbxHtut5W2fRGvOeP5t.LYbOH7HwrEEV9hCBqK/yqpyC6KleEyq', '6531045c619b8'),
(4, 'STUDENT', 'secret', '$2y$10$/tTPq52UoHEnRyZpcvFBz.UUNOb3rNkx/xMek6ySXPqc0wKTY9Zhe', '6537778d167ee'),
(7, 'STUDENT', 'buddybud', '$2y$10$XDgMbfWECy25Q0GzWf.MOude8KdMbVBME6AOVZE98KKpBLKTs9KRK', '65a3da0fa413b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_id` (`uniq_id`) USING HASH;

--
-- Indexes for table `student_events`
--
ALTER TABLE `student_events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_id` (`uniq_id`(768)) USING BTREE,
  ADD KEY `event_id` (`event_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `uniq_id` (`uniq_id`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_events`
--
ALTER TABLE `student_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_events`
--
ALTER TABLE `student_events`
  ADD CONSTRAINT `student_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `student_events_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
