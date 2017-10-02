-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 12:45 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'LaptopBags'),
(4, 'Coolers'),
(5, 'Batteries'),
(6, 'Monitors'),
(7, 'Projectors'),
(8, 'ProjectorBags'),
(9, 'Smartphones'),
(10, 'Tablets'),
(11, 'SmartphoneAdds'),
(12, 'TabletBags'),
(13, 'Motherboards'),
(14, 'GraphicAdapter'),
(15, 'Processors'),
(16, 'Cases'),
(17, 'Charges'),
(18, 'Harddrive'),
(19, 'SSD'),
(20, 'ExternalHDD'),
(21, 'Keyboards'),
(22, 'Mouses'),
(23, 'MousePads');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `stock`, `categoryid`) VALUES
(1, 'Acer Apire', 'Model: E5-571-35L1 <br/> 15.6\" HD LED Display<br/>\nIntel Core i3-4005U<br/>\n4 GB RAM<br/>\n500 GB HDD<br/>\nIntel HD Graphics<br/>\nLAN, Wi-Fi b/g/n, HDMI, USB 3.0<br/>\nDVDRW, Webcam', '500', 15, 2),
(2, 'ACER E5-571G-31NC', 'Model: E5-571G-31NC <br/> 15.6\" HD LED Display<br/>\nIntel Core i3-5005U<br/>\n4 GB RAM<br/>\n500 GB HDD<br/>\nnVidia GeForce GT840M - 2GB<br/>\nLAN, Wi-Fi b/g/n, BT, HDMI, USB 3.0<br/>\nDVDRW, Webcam', '450', 13, 2),
(3, 'Notebook Dell Inspiron 7548\n', 'Model: Notebook Dell Inspiron 7548 i7-5500U 16GB/256GB SSD/M270 4GB/15.6\" UltraHD 4K Touch/Backlit/Al/W8.1<br/>\nProcessor : Intel® Core™ i7-5500U Processor \n(4M Cache, up to 3.00 GHz)<br/>\nMemory: 16GB DDR3L 1600MHz<br/>\nStorage: 256 SSD <br/>\nGraphics: AMD Radeon R7  M270 4GB<br/>\nDisplay:  15.6-inch 4K Ultra HD (3840 x 2160) Truelife LED-Backlit Touch Display with Wide Viewing Angle (IPS)<br/>', '50', 2, 2),
(4, 'BRIO 5207', 'Model: 5207<br/>Intel G1820 2.70 GHz<br/>\nMB Gigabyte GA-H81M-DS2<br/>\n2 GB RAM<br/>\n500 GB HDD<br/>\nIntel HD Graphics<br/>\nDVDRW', '4100', 0, 1),
(5, 'GAMER', 'Intel Core i7-4790k 4.0 GHz<br/>\nMB Gigabyte GA-Z97M-DS3H<br/>\n16 GB DDR3 RAM<br/>\n240 GB SSD + 2000 GB HDD<br/>\nnVidia GeForce GT960 - 4GB<br/>\nDVDRW', '900', 6, 1),
(6, 'Notebook Stand Omega Fresh\n', 'Cooling Stand with fan and two USB ports<br/> \nFor notebooks and laptops from 10 \"to 15.6\"<br/> \nMaterial: Metal and ABS <br/>\nDimensions (W / D / W): 390 * 360 * 50mm<br/> \nFan Dimension: 160 * 160mm <br/>\nSpeed: 900-1000RPM <br/>\nFan Noise: 25dB (min) <br/>\nLifespan: 30,000 hours', '12', 3, 4),
(7, 'Compatible Dell 1520\n', 'Model: Notebook Battery 6 Cell 5200mAh 11.1V<br/>\nBattery type: Li-ion<br/>\nVoltage: 11.1V<br/>\nCapacity: 5200mAh<br/>\nCells: 6<br/>\n<br/>\nReplacement for:<br/>\n-UW280, 0UW280, NR239, 312-0589, 451-10477<br/>\n<br/>\nCompatible with:<br/>\n-Inspiron 1520,Inspiron 1720,Dell Inspiron 530s,Dell Vostro 1500,Dell Vostro 1520,\nDell Vostro 1700,Dell Inspiron 1520,Dell Inspiron 1521,Dell Inspiron 1720,Dell Inspiron 1721,Dell Vostro 1500,Dell Vostro 1700', '20', 6, 5),
(8, 'HP Mini 210', 'Model: Notebook Battery 6 Cell 4400mAh 10.8V Compatible HP mini 210<br/>\nCompatible with:<br/>\n82213-121<br/>\n582213-421<br/>\n582214-141<br/>\n590 54400-159<br/>\n590543-001<br/>\n590544-001<br/>\n596239-001<br/>\n596240-001<br/>\nAN03<br/>\nHSTNN-DB0P<br/>\nHSTNN-IBOO<br/>\nHSTNN-LBOP<br/>\nHSTNN-Q46C<br/>\nHSTNN-XBOO<br/>\nHSTNN-XBOP<br/>\nWD546AA', '25', 4, 5),
(9, 'SSD 2.5\" Samsung 850 Pro 1TB', 'Model: SSD 2.5\" Samsung 850 Pro 1TB SATA3 550MB/s<br/>\nSSD 850 PRO 2.5\" SATA III 1TB<br/>\nThe World\'s First Consumer 3D V-NAND SSD<br/>\nUltimate Read/Write Performance<br/>\nEnhanced Endurance and Reliability<br/>\nEfficient Power Management<br/>\n<br/>\nSPECIFICATIONS:<br/>\nPRODUCT TYPE - 2.5\" SATA III Solid State Drive<br/>\nCAPACITY - 1TB<br/>\nSEQUENTIAL READ SPEED - Up to 550MB/s<br/>\nSEQUENTIAL WRITE SPEED - Up to 520 MB/s', '150', 9, 19),
(10, 'Mouse Gigabyte Aorus Pro-Laser\n', 'Model: Mouse Gigabyte Aorus Pro-Laser Thunder M7 MMO Gaming 8200dpi <br/>\n* 16 fully-programmable gaming buttons\n<br/>* Fine-tuned ergonomics for MMORPG game titles<br/>\n* Advanced 8200dpi Laser Sensor<br/>\n* Ultra-durable 20 million clicks Omron switch<br/>\n** Red Dot Design Award 2015<br/>\n<br/>\nSpecifications<br/>\nInterface: USB<br/>\nTracking System: Pro-Laser<br/>\nSensitivity: 50~8200dpi(Default: 800/1600/3200/5600 dpi)<br/>\nReport Rate: 1000Hz<br/>\nFrame Rate: 12000 frames/ second<br/>\nMaximum Tracking Speed: 150ips<br/>\nMaximum Acceleration: 30g<br/>\nDPI Switch: 800/1600/3200/5600 DPI Switchable<br/>\nScrolling: Standard Scrolling Wheel<br/>\nSide Buttons: 11<br/>\nSwitch Life (L/R click): 20 Million Times<br/>\nDimension: (L)116mm *(W)70mm *(H)44mm<br/>\nWeight: 110g ±10g<br/>\nCable Length: 1.8M<br/>\nColor: Black<br/>\nSoftware: AORUS Macro Engine<br/>\nOS Support: Windows XP 32bit/ Vista/ 7/ 8<br/>', '99', 2, 22),
(11, 'Keyboard', 'Wireless', '500', 4, 21),
(12, 'Corsair M65 Vengenace', 'DPI 8200 <br/> Programmable Buttons 8 <br/> Report Rate 1000Hz/500Hz/250Hz <br/> Weight 0.31 Kg <br/>', '4100', 4, 22),
(13, 'Asus Monitor', 'Factory pre-calibrated for unmatched color accuracy (?E< 2) with 99% Adobe RGB, 100% sRGB, and 120% NTSC\r\nProfessional 27-inch AH-IPS display with 2560 x 1440 WQHD resolution and 109 pixels per inch for greater image detail', '23000', 15, 6),
(14, 'Epson projector', 'Up to 3x wider color gamut than competitive DLP projectors\r\nLook for two numbers: 3000 lumens Color Brightness for more accurate, vivid color3000 lumens White Brightness for well-lit rooms\r\nSVGA resolution (800 x 600) - for projecting basic presentations and graphics', '28000', 2, 7),
(15, 'Laptop Bag', 'Slim, compact case is perfect for carrying laptops up to 15.6-inches without the unnecessary bulk\r\nAccessory storage pockets for portable mouse, iPod, cell phone and pens\r\nIncludes padded shoulder strap\r\nInternal dimensions: 14.7 inch x 2.2 inch x 11.2 inch\r\nExternal dimensions: 15.5 inch x 2.8 inch x 12 inch', '700', 6, 3),
(16, 'Samsung Galaxy S7 edge', 'Super AMOLED capacitive touchscreen, 16M colors\r\nSize 5.1 inches (~72.1% screen-to-body ratio)\r\nResolution 1440 x 2560 pixels (~577 ppi pixel density)\r\nCorning Gorilla Glass 4\r\n- Always-on display\r\n- TouchWiz UI', '42000', 2, 9),
(17, 'Tablet Microsoft', 'The 12-inch Surface Pro 3 is the tablet that can replace your laptop (Type Cover sold separately).\r\n12-inch Full HD touchscreen display\r\nWindows 10 Pro operating system\r\nIntel i3, i5, or i7 4th Gen available\r\nSurface Pen included', '4000', 2, 10),
(18, 'Cases for Samsung', 'New: A brand-new, unused, unopened, undamaged item in its original packaging (where packaging is applicable). Packaging should be the same as what is found in a retail store, unless the item is handmade or was packaged by the manufacturer in non-retail packaging, such as an unprinted box or plastic bag. See the seller\'s listing for full details.', '200', 20, 11),
(19, 'Tablet bag', 'A brand-new, unused, unopened, undamaged item in its original packaging (where packaging is applicable). Packaging should be the same as what is found in a retail store, unless the item is handmade or was packaged by the manufacturer in non-retail packaging, such as an unprinted box or plastic bag. See the seller\'s listing for full details', '500', 6, 12),
(20, 'Dell tower', 'Condition – MS Authorized Refurbished.\r\nBrand - DELL\r\nModel - Optiplex 755\r\nType - Desktop PC\r\nChassis - Tower\r\nSoftware - XP Pro + Antivirus (All drivers installed and related updates completed)\r\nWarranty – Seller 30-Day DOA Included.\r\nRestore Media - Included (Original Dell XP Pro. Restore CD)', '3000', 3, 16),
(21, 'Motherboard', 'Asrock B85M-DGS - Supports New 4th and 4th Generation Intel® Core™ i7/i5/i3/Xeon®/Pentium®/Celeron® Processors (Socket 1150), All Solid Capacitor design, Supports Dual Channel DDR3 1600, 1 x PCIe 3.0 x16, 1 x PCIe 2.0 x1, Graphics Output Options : DVI-D, D-Sub, Realtek Gigabit LAN, 5.1 CH HD Audio (Realtek ALC662 Audio Codec)', '800', 2, 13),
(22, 'Intel processor', 'Intel Core i7-6700K 8M Skylake Quad-Core 4.0 GHz LGA 1151 BX80662I76700K Desktop CPU', '2000', 5, 15),
(23, 'Graphic Card', 'NVIDIA GEFORCE GTX 10 SERIES. NVIDIA\'s most advanced gaming GPUs, driven by NVIDIA Pascal architecture for incredible levels of gaming performance and immersive VR. ... NVIDIA - NVIDIA GeForce GTX 1070 8GB GDDR5 PCI Express 3.0 Graphics Card', '1000', 5, 14),
(24, 'Hard disk', 'Capacity 1 TB', '600', 2, 18),
(25, 'External Hard disk', 'Portable Hard Drive\r\nCapacity: 1 TB\r\nConnectivity: USB 3.0\r\n1 Port', '1500', 1, 20),
(26, 'Mouse', 'Smooth cloth surface\r\nSteady rubber base\r\nXL sized\r\nGreat value', '350', 8, 23),
(27, 'MacBook Pro', 'The 15â€‘inch MacBook Pro with Retina display has the power to do even more amazing things. Fourth-generation quad-core Intel Core i7 processors let you make quick work of even the most complex tasks in professional apps like Final Cut Pro X, thanks to speeds up to 2.8GHz, 6MB of shared L3 cache, and Turbo Boost speeds up to 4.0GHz. And every model comes standard with 16GB of superfast memory. All of which means the 15â€‘inch MacBook Pro is ready to take on whatever you can dream up, wherever your travels take you.', '63200', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `dateStamp` date NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `hashcode` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid_2` (`userid`),
  ADD KEY `productid_2` (`productid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category_prodcut` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_product` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sales_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
