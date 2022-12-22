-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 05:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artgallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `email`, `password`) VALUES
('Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `art_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `art_title` varchar(100) NOT NULL,
  `art_category` varchar(100) NOT NULL,
  `art_theme` varchar(100) NOT NULL,
  `art_style` varchar(100) NOT NULL,
  `art_technique` varchar(100) NOT NULL,
  `art_orientation` varchar(100) NOT NULL,
  `art_description` varchar(500) NOT NULL,
  `art_price` int(11) NOT NULL,
  `art_image` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `uploaded_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `artist_id`, `art_title`, `art_category`, `art_theme`, `art_style`, `art_technique`, `art_orientation`, `art_description`, `art_price`, `art_image`, `status`, `uploaded_on`) VALUES
(14, 3, 'Buddha nature', 'Photography', 'Digital Age', 'Comics', 'Lithography', 'Square', 'This Buddha is made out of acrylics and sand, gold, very textured..\r\nIt conveys the Buddha nature amidst the storm, mindfulness, peace, zen, meditation, being in the moment', 11000, '928405_651f5b39c3cf3a22403f0fa43ebbebb6.jpeg', '', '2021-11-15'),
(18, 3, 'In the shadow', 'Drawing', 'Conceptual', 'Expressionism', 'Relief Printing', 'Portrait', 'Original figurative.In process of working, I think about the construct of time a lot and I try to find ways to depict aspects and ideas of time, timing or the passing of time and how it affects us in our lives as humans. The fact that our time is limited and often timing can turn out beautifully or disastrous makes life so unique. I also like my paintings to be quiet, in some way silent and like a frozen moment.', 11000, '487751_eb56e1393ce1a58210b147dc419746ef.jpeg', '', '2021-11-15'),
(46, 25, 'Northern lights', 'Sculpture', 'Abstraction', 'Original', 'Engraving', 'Landscape', 'Sample description', 78000, '1 (5).jpeg', '', '2021-12-15'),
(47, 25, 'Damien Hirst', 'Photography', 'Urban', 'Abstract', 'Engraving', 'Landscape', 'A picture is not thought out and fixed from the start. As you work on it, it changes to the same extent as your thoughts.', 11000, '1 (9).jpeg', '', '2021-12-15'),
(48, 25, 'Walking By', 'Drawing', 'Abstraction', 'Expressionism', 'Engraving', 'Landscape', 'The artist is more inspired by a passing glance of something, than by a clear view. She has a fascination with views out of train windows or through car wiper blades in the pouring rain, it is like if you get a smeared impression of something you actually get a much better sense of it, less bogged down with details.', 22000, 'cat3.jpeg', '', '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artist_fname` varchar(50) NOT NULL,
  `artist_lname` varchar(50) NOT NULL,
  `artist_email` varchar(50) NOT NULL,
  `artist_contact` bigint(10) NOT NULL,
  `artist_password` varchar(50) NOT NULL,
  `artist_medium` varchar(50) NOT NULL,
  `artist_image` varchar(50) NOT NULL,
  `artist_portfolio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_fname`, `artist_lname`, `artist_email`, `artist_contact`, `artist_password`, `artist_medium`, `artist_image`, `artist_portfolio`) VALUES
(3, 'Andrew Foy', 's', 'abc1@gmail.com', 9898786767, '81dc9bdb52d04dc20036dbd8313ed055', 'Painting', 'Ellipse 148-3.png', 'https://google.com'),
(15, 'Dhanu', 'S', 'dhanu12@gmail.com', 7898989656, 'ef73781effc5774100f87fe2f437a435', 'Photography', 'Ellipse 148-1.png', 'https://google.com'),
(22, 'Swathi', 'S', 'swathi12@gmail.com', 8978678988, 'ef73781effc5774100f87fe2f437a435', 'Photography', 'Ellipse 148-2.png', 'https://sample.com'),
(23, 'Pragathi', 'S', 'Pragathi@gmail.com', 8978778909, 'ef73781effc5774100f87fe2f437a435', 'Other Media', 'Ellipse 148-2.png', 'https://sample.com'),
(24, 'Kavi', 'S', 'kavi@gmail.com', 8789678989, 'ef73781effc5774100f87fe2f437a435', 'Photography', 'Ellipse 148-1.png', 'https://sample.com'),
(25, 'Ellaki', 'S', 'ellakii@gmail.com', 8870986958, 'f0c7f1bf5c4e679ce09af1b886ed2fcd', 'Work on Paper', 'Ellipse 148-2.png', 'https://google.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `art_image` varchar(50) NOT NULL,
  `art_title` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `art_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `last_edited` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `date_created`, `last_edited`) VALUES
(4, 'Painting', '2021-11-14', '2021-11-21'),
(5, 'Photography', '2021-11-14', '2021-11-17'),
(6, 'Drawing', '2021-11-14', '0000-00-00'),
(7, 'Work on Paper', '2021-11-14', '0000-00-00'),
(10, 'Other Media', '2021-11-17', '0000-00-00'),
(23, 'Sculpture', '2021-11-22', '2021-11-25'),
(26, 'Work on clay', '2021-11-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `posted_date`) VALUES
(1, 'Ellakiya', 'abc12@gmail.com', 'Regarding Price for an painting', 'AA', '2021-11-06'),
(2, 'Ellakiya', 'abc12@gmail.com', 'Regarding Price for an painting', 'AAA', '2021-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `exb_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_desc` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `timing` time NOT NULL DEFAULT current_timestamp(),
  `location` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`exb_id`, `event_name`, `event_desc`, `start_date`, `end_date`, `timing`, `location`, `image`) VALUES
(6, 'MUSIC AND POETRY', 'This is the sample description.', '2021-12-12', '2021-11-24', '01:20:00', 'Chennai', 'about1.jpg'),
(7, 'CASTLE CREW', 'You can join a group exhibition or book a free private view in the fields of abstract painting, fine arts photography and sculpture. Meet the artists in person by joining an artist talk or an \"open late\" free art gallery event and get yourself inspired.', '2021-11-24', '2021-11-06', '09:00:00', 'Coimbatore', 'login1.jpg'),
(8, 'ARTSY WISH', 'This is sample text', '2021-11-24', '2021-11-30', '04:24:00', 'Chennai', 'about.jpg'),
(9, 'POETRY', 'Art galleries are great places to visit to get inspiration and get your creative juices flowing. They are incredibly well designed and aesthetically pleasing. What you might not be aware of is that most art galleries have their own websites, and they are as aesthetic as the real thing. ', '2021-11-04', '2021-11-23', '03:25:00', 'Coimbatore', 'slide1.jpg'),
(10, 'MUSIC', 'Buy and sell art, paintings, limited edition prints, collectibles, sculptures, photographs.', '2021-12-09', '2021-12-12', '22:29:00', 'Erode', 'slides1.jpg'),
(11, 'MUSIC AND POETRY', 'Sample description', '2021-11-20', '2021-12-11', '22:35:00', 'Bengalore', 'login2.png'),
(14, 'MUSIC AND POETRY', 'Buy and sell art, paintings, limited edition prints, collectibles, sculptures, photographs.', '2021-11-19', '2021-11-16', '11:53:00', 'Chennai', '1 (6).jpeg'),
(15, 'MUSIC AND POETRY', 'Buy and sell art, paintings, limited edition prints, collectibles, sculptures, photographs.', '2021-12-10', '2021-11-10', '13:49:00', 'Coimbatore', '1 (6).jpeg'),
(16, 'POETRY', 'Sample exhibition detail', '2021-12-04', '2021-11-27', '11:54:00', 'Chennai', '1 (5).jpeg'),
(18, 'MUSIC', 'The market is abuzz with innovations and companies are constantly upgrading their offerings to meet the growing demand in various segments such as Airports, Metro-Rail projects, shopping malls, IT parks, and SEZs. Big ticket projects like Delhi Mumbai Industrial Corridor and Sagar Mala Project, where industrial townships are planned, will increase the demand for flooring products. The swift rise in urbanization, and industrialization, has created a considerable increase in the rate of constructi', '2021-12-26', '2021-12-08', '20:02:00', 'Chennai', 'about1.jpg'),
(19, 'MUSIC AND POETRY', 'The market is abuzz with innovations and companies are constantly upgrading their offerings to meet the growing demand in various segments such as Airports, Metro-Rail projects, shopping malls, IT parks, and SEZs. Big ticket projects like Delhi Mumbai Industrial Corridor and Sagar Mala Project, where industrial townships are planned, will increase the demand for flooring products. The swift rise in urbanization, and industrialization, has created a considerable increase in the rate of constructi', '2021-11-06', '2021-11-11', '06:00:00', 'Chennai', 'login1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `member_id`, `art_id`, `added_on`) VALUES
(49, 14, 14, '2021-11-24'),
(53, 11, 14, '2021-11-24'),
(55, 11, 18, '2021-11-24'),
(58, 9, 18, '2021-11-24'),
(67, 20, 18, '2021-12-05'),
(68, 9, 14, '2021-12-07'),
(69, 21, 18, '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `email`, `password`, `contact`) VALUES
(9, 'Anu', 'anu@gmail.com', '89a4b5bd7d02ad1e342c960e6a98365c', 8870986950),
(14, 'swathi', 'swathi@gmail.com', '46eafc3f1b688c52837ef0c7fa2018f9', 9898786767),
(16, 'Pragathi', 'pragathi@gmail.com', 'ef73781effc5774100f87fe2f437a435', 8870986950),
(17, 'srijaa', 'abc12@gmail.com', 'ef73781effc5774100f87fe2f437a435', 8870986950),
(20, 'Dhanu', 'dhanu@gmail.com', 'ef73781effc5774100f87fe2f437a435', 8870986950),
(21, 'Ellakiya S', 'ellakiyas@gmail.com', 'f0c7f1bf5c4e679ce09af1b886ed2fcd', 8870986950);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `member_id`, `title`, `amount`, `quantity`, `order_date`, `address`) VALUES
(3, 11, 'Northern lights in winter(1)', 34000, 0, '2021-11-23', ''),
(4, 11, 'Northern lights in winter(3)', 102000, 0, '2021-11-23', ''),
(5, 9, 'Northern lights in winter(1)', 34000, 0, '2021-11-23', ''),
(6, 11, 'Northern lights in winter(2)', 68000, 0, '2021-11-24', ''),
(7, 11, 'In the shadow(1)', 11000, 0, '2021-11-24', ''),
(8, 11, 'Buddha nature(1), Mirek Kuzniar,(1)', 22000, 0, '2021-11-24', ''),
(9, 11, 'Southern Winter(2)', 20000, 0, '2021-11-24', ''),
(10, 15, 'Northern lights in winter(2)', 68000, 0, '2021-11-25', ''),
(12, 11, 'Northern lights in winter(1)', 34000, 0, '2021-11-25', ''),
(13, 16, 'Gary Komarin(1)', 11000, 0, '2021-11-25', ''),
(14, 17, 'Gary Komarin(2), Mirek Kuzniar,(1)', 33000, 0, '2021-11-26', ''),
(15, 17, 'Northern lights in winter(1), <br>Buddha nature(2)', 56000, 0, '2021-11-26', ''),
(16, 17, 'Buddha nature(1)', 11000, 0, '2021-11-26', ''),
(17, 17, 'Buddha nature(1)', 11000, 0, '2021-11-26', ''),
(18, 17, 'Northern lights in winter(1)', 34000, 0, '2021-11-26', ''),
(21, 19, 'In the shadow(1), <br>Southern Winter(1)', 21000, 0, '2021-11-26', '1234,ABCD Street, Chennai'),
(22, 19, 'Lezzueck Coosemans(1)', 22000, 0, '2021-11-26', '1234,Abcd address'),
(23, 19, 'In the shadow(1)', 11000, 0, '2021-11-26', '1234,ABCD Street'),
(24, 20, 'Lezzueck Coosemans(3)', 66000, 0, '2021-11-26', '1234,ABCD'),
(25, 20, 'Gary Komarin(1)', 11000, 0, '2021-11-26', 'Abcd address'),
(26, 21, 'Gary Komarin(2)', 156, 0, '2021-11-26', '1234abcd'),
(27, 21, 'Northern lights in winter(2)', 156000, 0, '2021-12-15', '1234,New Street.'),
(28, 21, 'Northern lights(1)', 78000, 0, '2021-12-15', '1234,New Street.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`exb_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `exb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
