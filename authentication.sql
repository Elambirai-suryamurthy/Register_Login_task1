-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2019 at 11:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `authtoken`
--
-- Error reading structure for table authentication.authtoken: #1932 - Table 'authentication.authtoken' doesn't exist in engine
-- Error reading data for table authentication.authtoken: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `authentication`.`authtoken`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `authtoken1`
--

CREATE TABLE `authtoken1` (
  `authid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authtoken1`
--

INSERT INTO `authtoken1` (`authid`, `id`, `token`, `timestamp`) VALUES
(1, 6, '8207e7adb5774935df808f872da4f664', '2019-03-15 16:08:47'),
(2, 6, '3a3b33fa15996b51b5fde80613e84621', '2019-03-15 16:20:28'),
(3, 12, '2d8f2766f1767c902db31885ee606a5c', '2019-03-15 16:22:00'),
(4, 12, '9ef091783ad11627c46a2c584dd0e236', '2019-03-15 16:47:05'),
(5, 17, '18d0f69e3c374c6fd9f224e67ff37166', '2019-03-17 11:29:40'),
(6, 17, 'e0145f5cd49d2462b3ae0f32c284cd0c', '2019-03-17 11:31:22'),
(7, 17, '44f8a950cd42b6a3b8842ce18b1fc65b', '2019-03-17 11:31:40'),
(8, 20, 'c1530912c0bbc872b50534f63ef46d41', '2019-03-18 10:09:27'),
(9, 12, '18994f347e0000fd4a17e0d6b3a1076c', '2019-03-18 10:09:38'),
(10, 12, 'd0cfef5ca3cdcb2dd09dfaf0ba3aaa6b', '2019-03-18 10:13:21'),
(11, 21, 'ff0cf074d4c195016ad6d921143cbfa0', '2019-03-18 10:19:28'),
(12, 25, 'c76dd9021b5daf1a89177e6dc9bac112', '2019-03-19 10:08:17'),
(13, 25, '1bf7fb3df5eb0afd0f3071bfbf068435', '2019-03-19 10:19:41'),
(14, 32, 'd409a21738934fcfb2aea946c7c4dd01', '2019-03-19 10:23:16'),
(15, 33, '20a0eabce0a0a93e9d018b702acaabc7', '2019-03-19 10:37:29'),
(16, 34, '63e77f6e4815298df5a24e4730505604', '2019-03-19 10:41:37'),
(17, 25, '5995eca0894e30233e369a2944ffbdc2', '2019-03-19 10:42:24'),
(18, 25, 'b5d51ffb8d0b1cf679749436a3c9ab6a', '2019-03-19 10:43:00'),
(19, 25, 'aac7f98a796022878b49b1dd844b87c5', '2019-03-19 10:45:44'),
(20, 25, 'd43fa269ae4e4000b37693e7700d0d25', '2019-03-19 10:46:20'),
(21, 25, 'c8229975761c386e3f96e4d34b771d90', '2019-03-19 10:54:07'),
(22, 25, 'b2547654e526f8b53eb5d237c9d8666d', '2019-03-19 11:03:09'),
(23, 25, '37186c17ede93306e83ec38c98ec9b3f', '2019-03-19 11:24:06'),
(24, 35, '145b948bb712693ff9a0f3d7f0147290', '2019-03-19 11:24:19'),
(25, 36, '9fa858be0921e8dd458f20e7d2cb3ccb', '2019-03-19 11:24:59'),
(26, 25, 'f3226eace302e1be9e7f27c2e0c776ed', '2019-03-19 11:25:14'),
(27, 25, 'c4f8aac5119e28dd06bbdd7a0646618e', '2019-03-19 11:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`, `email`, `place`) VALUES
(1, 'elai11', 'elai', 'elai@gmail.com', 'chennai11'),
(7, 'aruna1s', 'arunas', 'abi@gmail.com11s', 'chen11'),
(8, 'devi', '0c60485a3752470a32623072bb7dc06e5c5ee677e7d3428ba8a7bd7ca072fbc9', 'devi@gmail.com', 'Dharmapuri'),
(9, 'adk', 'c974063d44d9203f544c5c58e29cd1ea4842f70c8e5c947bf7fa60cffec89ca6', 'adk@gmail.com', 'Madhurai'),
(10, 'saran', 'b1979ebc4849a1b15e0d11d6112b3ec3b4f0fae9698383d4c26b6bc37d730e6c', 'saran@gmail.com', 'chennai'),
(11, 'jessy', 'e064dcc630d0cbf6da9dfdaa642deb04049ce186d719ca20921732ffca5611ae', 'jessy@gmail.com', 'chennai'),
(12, 'jessy1', 'e064dcc630d0cbf6da9dfdaa642deb04049ce186d719ca20921732ffca5611ae', 'jess1y@gmail.com', 'chennai'),
(13, 'jessy1', 'e064dcc630d0cbf6da9dfdaa642deb04049ce186d719ca20921732ffca5611ae', 'jess1yq@gmail.com', 'chennai');

-- --------------------------------------------------------

--
-- Table structure for table `login1`
--

CREATE TABLE `login1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login1`
--

INSERT INTO `login1` (`id`, `name`, `password`, `email`, `place`) VALUES
(1, 'elai', 'elai', 'elai@gmail.com', 'chennai'),
(2, 'aruna', 'aruna', 'aruna@gmail.com', 'chennai'),
(3, 'kani', 'kani', 'kani@gmail.com', 'chennai'),
(4, 'devi', 'devi', 'devi@gmail.com', 'madhurai'),
(5, 'jessy1', 'e064dcc630d0cbf6da9dfdaa642deb04049ce186d719ca20921732ffca5611ae', 'jess1yq@gmail.com', 'chennai'),
(6, 'saran', 'b1979ebc4849a1b15e0d11d6112b3ec3b4f0fae9698383d4c26b6bc37d730e6c', 'saran@gmail.com', 'chennai'),
(7, 'saran11', '0dd2b8c64cdf7b06080709b703efe804e084f0b093bc0cfa0cd25c71c54bfdff', 'saran@gmail.com1', 'chennai'),
(8, 'saran11', '0dd2b8c64cdf7b06080709b703efe804e084f0b093bc0cfa0cd25c71c54bfdff', 'saran@gmail.com11', 'chennai'),
(9, 'saran11', '0dd2b8c64cdf7b06080709b703efe804e084f0b093bc0cfa0cd25c71c54bfdff', 'saran@gmail.com112', 'chennai'),
(10, 'saran11', '0dd2b8c64cdf7b06080709b703efe804e084f0b093bc0cfa0cd25c71c54bfdff', 'saran1@gmail.com', 'chennai'),
(11, 'saran11', '0dd2b8c64cdf7b06080709b703efe804e084f0b093bc0cfa0cd25c71c54bfdff', 'saran1@gmail.co1m', 'chennai'),
(12, 'kalai', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kalai@gmail.com', 'chennai'),
(13, 'kalai', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kalai11@gmail.com', 'chennai'),
(14, 'kalai', '2b376bc76b2c7bc87286b57e87f4285072ad0fa2c4515e606e3d78556490b04a', 'kalai11@gmail.com11', 'chennai'),
(15, 'kalai', '2b376bc76b2c7bc87286b57e87f4285072ad0fa2c4515e606e3d78556490b04a', 'kal11@gmail.com11', 'chennai'),
(16, 'kalai', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kal11@gmail.com111', 'chennai'),
(17, 'kalai', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kal1121@gmail.com111', 'chennai'),
(19, 'kalai', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kal1121@gmail.com11111', 'chennai'),
(20, 'kalai', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kal1121@gmail.com1111123', 'chennai'),
(21, 'kalai', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kalss1121@gmail.com', 'chennai'),
(22, 'kalai', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kalsssa1121@gmail.com', 'chennai'),
(23, 'dds', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kalsssa1121@gmail.com', 'chennai'),
(24, 'dds', '721e3875c215a1f49c2c125e376b9dbd9c87dc14ef1b4b639a06bc2ebf830746', 'kalsssa1cas121@sgmail.com', 'chennai'),
(25, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.com', 'chennai'),
(26, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom', 'chennai'),
(27, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12', 'chennai'),
(28, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ds', 'chennai'),
(29, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12dsdddd', 'chennai'),
(30, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ddsdddd', 'chennai'),
(31, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ddsddddds', 'chennai'),
(32, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ddsdddssddds', 'chennai'),
(33, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ddsdddxzssddds', 'chennai'),
(34, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ddsdddxzssdddsd', 'chennai'),
(35, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ddsdddxzssdddsdd', 'chennai'),
(36, 'dds', 'e173a1f60595883e5a1d8c6f8f985daf49c2b27f9da8adff73d680b547aca351', 'kaa@gmail.caom12ddsdddxzssdddsddk', 'chennai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authtoken1`
--
ALTER TABLE `authtoken1`
  ADD PRIMARY KEY (`authid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login1`
--
ALTER TABLE `login1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authtoken1`
--
ALTER TABLE `authtoken1`
  MODIFY `authid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login1`
--
ALTER TABLE `login1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
