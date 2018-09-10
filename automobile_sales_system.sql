-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2018 at 05:28 PM
-- Server version: 10.1.35-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anamulra_vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `delivered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `vehicle_id`, `delivered`) VALUES
(1, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `cell`, `email`, `password`, `address`, `city`, `country`, `pincode`, `gender`, `type`) VALUES
(1, 'Super', 'Admin', '01700000000', 'admin@gmail.com', '123456', 'Shukrabad, Dhaka.', 'Dhaka', 'Bangladesh', '1234', 0, 1),
(2, 'Anamul', 'Hasan', '1521215956', 'anamulhasan@gmail.com', '123456', 'Chasara.Narayanganj', 'Dhaka', 'Bangladesh', '1207', 0, 2),
(3, 'Anamul', 'Rafin', '01685034907', 'rafin84062@gmail.com', '123456', 'Dhanmondi 32, Dhaka.', 'Dhaka.', 'Bangladesh', '1207', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `model`, `type`, `company`, `description`, `price`, `image`) VALUES
(1, 'Honda Civic', 'Civic', 'Gas', 'Honda', 'Drive wheels: Front; Base engine : 2.0L In-Line 4-Cylinder 16-Valve DOHC i-VTEC; Base horsepower : 158 at 6,500rpm; Base torque : 138Ib-ft at 4200 rpm; Transmission : 6-speed manual; Fuel: Regular Gas; Fuel capacity(gallons) : 12.4gallons; Fuel economy: 28/40/32; Base wheels : 16-inch steel with full covers; Body style : 4-door sedan; Seat upholstery : Fabric', '42,00000', 'uploads/Civic 2017.jpg'),
(2, 'Honda Vezel', 'Vezel','Gas','Honda','Class : Subcompact crossover SUV; Body style : 4-door SUV; Layout : Front-engine,front-wheel-drive || Front-engine,all-wheel-drive; Related : Honda Fit, Honda WR-V, Honda XR-V; Engine : 1.5L L15B |4, 1.8L R18A1 |4; Transmission : 7-speed automatic CVT','3500000','uploads/Vezel 2017.jpeg'),
(3, 'Nissan Juke','Juke','','Nissan','Engine : 1.5L HR15DE |4 (Petrol), 1.6L MR16DDT Turbo |4 (Petrol), 1.6L HR16DE |4(Petrol), 3.8L VR38DETT Twin-Turbo V6(Juke-R, Petrol), 1.5L Renault K9K |4(Diesel); Transmission : 5-speed manual, 6-speed manual, Xtronic CVT, 6-speed dual-clutch automatic (Juke-R)','5000000','uploads/Juke 2015.jpg'),
(4, 'Nissan X-Trail','X-Trail','','Nissan','Engine : Petrol 2.0L MR20DD 143 hp (106KW) |4(144 hp for X-Trail Hybrid), 2.5L QR25DE 170hp (126KW) |4, Diesel 2.0L 177bhp(130KW) |4, 1.6L Y9M 130 bhp (96KW) |4; Transmission : 6-speed manual, 6-speed automatic CVT','5100000','uploads/X-Trail 2017.jpg'),
(5, 'Renault Duster','Duster','','Renault','Engine : 1.2L |4 Turbo(Petrol), 1.6L |4 (Petrol), 1.6L |4 (Petrol/ethanol), 1.6L |4 (Petrol/LPG), 2.0L |4 (Petrol), 2.0L |4 (Petrol/ethanol), 1.5L |4(diesel); Transmission : 5-speed manual, 6-speed manual, 4-speed automatic, 6-speed semi-automatic(Easy-R), X-Tronic CVT','3500000','uploads/Duster.jpg'),
(6, 'Toyota Allion','Allion','Gasoline (Petrol)','Toyota','Engine capacity : Available in 1500cc(official 1496cc), 1800cc(official 1797cc) & 2000cc(official 1986cc); Driving type : 1500cc and 2000cc is available in two wheel drive(2wd) only 1800cc is available both 2wd & also four wheel drive(4wd); Steering position : right hand drive(on the right side of car); Transmission type : Super CVT-i automaic gear; Passenger capacity : 5(according to Japanese law); Engine type : 1500cc1NZ-FE DOHC 4Cylinders 16Valves, 1800cc 2ZR-FAE DOHC 4Cylinders 16valves, 2000cc 3ZR-FAE DOHC 4Cylinders 16Valves','2800000','uploads/Allion 2017.jpg'),
(7, 'Toyota Crown','Crown','','Toyota','Body type : 4-door sedan, Platform : (TNGA: GA-N), Engine : 2.0L 8AR-FTS |4-T(Petrol), 2.5L A25A-FXS |4(Petrol hybrid), 3.5L 8GR-FXS V6(petrol hybrid); Power output : 180kw (241 hp;245 PS)(2.0L), 166kw(223 hp;226PS)(2.5L;combined), 264kw (354 hp;359 PS)(3.5L; combined), Transmission : 8-speed automatic (2.0L), CVT automatic (2.5L), 10-speed Multi Stage Hybrid, System automatic (3.5L)','17500000','uploads/Crown 2017.jpg'),
(8, 'Toyota Noah','Noah','','Toyota','Class : Mid-size MPV; Body style : 5-door minivan; Layout : Front engine, front-wheel, drive/four-wheel drive; Engine : 2.0L 1AZ-FSE DI |4, 2.0L 3ZR-FE DI |4, 2.0L 3ZR-FAE DI |4 Valvematic; Transmission CVT(2004-2014), 1-speed planetary gear (Hybrid), 4-speed automatic(2001-2004) CVT-i (2.0L), 1-speed Electro Shiftmatic (Hybrid)','3500000','uploads/Noah 2018.jpg'),
(9, 'Toyota Premio','Premio','Gasoline(Petrol)','Toyota','Engine capacity : Available in 1500cc (offical 1496cc),1800cc(offical 1797cc) & 2000cc(offical 1986cc); Driving type : 1500cc and 2000cc is available in Two wheel drive(2wd) only 1800cc is available in both 2wd and Four wheel drive (4wd); Steering position : Right hand drive(on the right side of car); Transmission type : Super CVT-i automatic gear; Passenger capacity : 5(According to Japanese law); Engine type : 1500cc 1NZ-FE DOHC 4Cylinders 16Valves, 1800cc 2ZR-FAE DOHC 4Cylinders 16Valves, 2000cc 2ZR-FAE DOHC 4Cylinders 16Valves; Number of Doors : 4','3800000','uploads/Premio 2017.jpg'),
(10, 'Volvo S90','S90','Petrol/Diesel','Volvo','Class : Executive Car, Mid-size luxury car(E); Body style  : 4-door sedan; Layout : Front-engine, front-wheel drive/four-wheel-drive; Platform : SPA platform; Related : Volvo V90 || Volvo XC90 ||; Engine : 2.0L |4 2.0L |4 (140kw-235kw), 2.0L |4 (140kw-173kw), Hybrid 2.0L |4 petrol (234kw-235kw+64kw); Electric motor : 64kw (87PS); Transmission : 6-speed M66 manual, 8-speed Aisin TG-81SC automatic; Hybrid : Plug-in hybrid; Battery : 9.2kwh lithium-ion battery, 10.4kwh lithium-ion battery; Electric range : 45km(28mi) (NEDC)','13500000','uploads/S90 2017.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
