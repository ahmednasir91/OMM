-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2012 at 06:48 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `omm`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senderid` mediumint(8) unsigned NOT NULL,
  `recipientid` mediumint(8) unsigned NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isread` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `senderid` (`senderid`),
  KEY `recipientid` (`recipientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderid`, `recipientid`, `subject`, `description`, `date`, `isread`) VALUES
(7, 2, 5, 'mymessage', 'asas', '2012-05-14 05:54:05', 1),
(9, 2, 4, 'ahmed', 'ahmed', '2012-05-14 06:27:15', 1),
(15, 6, 6, 'Your product has been sold.', 'Greetings, zain has bought your product "Nokia Lumia 900". You can reply to this message and ask him for more details.', '2012-05-14 13:07:04', 1),
(16, 2, 6, 'Your product has been sold.', 'Greetings, ahmednasir has bought your product "Apple iPhone 4S". You can reply to this message and ask him for more details.', '2012-05-14 13:59:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Stuck at Relation Algebra Question No. 9', 'stuck-at-relation-algebra-question-no.-9', 'I am good');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(100) NOT NULL,
  `model_no` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `seller_id` mediumint(8) unsigned NOT NULL,
  `image_url` varchar(2000) DEFAULT NULL,
  `thumb_url` varchar(2000) DEFAULT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `seller_id` (`seller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `make`, `model_no`, `description`, `price`, `seller_id`, `image_url`, `thumb_url`, `sold`) VALUES
(16, 'Samsung', 'Galaxy S', 'The Samsung Galaxy S is an Android smartphone that was announced by Samsung in March 2010. It features a 1 GHz ARM "Hummingbird" processor, 8–16 GB internal Flash memory, a 4-inch 480×800 pixel AMOLED capacitive touchscreen display, Wi-Fi connectivity, a 5-megapixel camera with a maximum resolution of 2560x1920 and, on select models, a front-facing 0.3 MP VGA camera (640x480).[2][3] The base version of the phone, the GT-I9000, was quickly followed by variant models for the US carriers such as the Epic 4G, Vibrant, Captivate, Fascinate, and Mesmerize.', '40000', 6, '/uploads/images/samsung-galaxy-s_1.jpg', '/uploads/images/samsung-galaxy-s_1_thumb.jpg', 0),
(17, 'Apple', 'iPhone 4S', 'The iPhone 4S is a touchscreen-based, slate-sized smartphone developed by Apple Inc. It is the fifth generation of the iPhone[5] and retains the exterior design of its predecessor, the iPhone 4, but is host to a range of improved hardware specifications and software updates.[6] The phone added a voice recognition system known as Siri and a cloud storage service named iCloud. Some of the device''s functions may be voice-controlled through Siri.[7] On October 4, 2011 in Cupertino, California, Apple started accepting pre-order requests for the iPhone 4S on October 7, 2011, in seven initial countries (United States, Canada, Australia, United Kingdom, France, Germany and Japan) with the first delivery date set for October 14, 2011 and available on that same day for direct in-store sales in those countries. It was released in 22 more countries, including Ireland, Mexico, and Singapore on October 28.', '60000', 6, '/uploads/images/whiteiphone-110424-1.png', '/uploads/images/whiteiphone-110424-1_thumb.png', 1),
(18, 'Nokia', 'Lumia 900', 'The iPhone 4S is a touchscreen-based, slate-sized smartphone developed by Apple Inc. It is the fifth generation of the iPhone[5] and retains the exterior design of its predecessor, the iPhone 4, but is host to a range of improved hardware specifications and software updates.[6] The phone added a voice recognition system known as Siri and a cloud storage service named iCloud. Some of the device''s functions may be voice-controlled through Siri.[7] On October 4, 2011 in Cupertino, California, Apple started accepting pre-order requests for the iPhone 4S on October 7, 2011, in seven initial countries (United States, Canada, Australia, United Kingdom, France, Germany and Japan) with the first delivery date set for October 14, 2011 and available on that same day for direct in-store sales in those countries. It was released in 22 more countries, including Ireland, Mexico, and Singapore on October 28.', '45000', 6, '/uploads/images/nokia-lumia-900.jpg', '/uploads/images/nokia-lumia-900_thumb.jpg', 1),
(20, 'Nokia', 'N800', 'The Nokia N800 Internet tablet is a wireless Internet appliance from Nokia, originally announced at the Las Vegas CES 2007 Summit in January 2007. N800 allows the user to browse the Internet and communicate using Wi-Fi networks or with mobile phone via Bluetooth. The N800 was developed as the successor to the Nokia 770. It includes FM and Internet radio, an RSS news reader, image viewer and a media player for audio and video files.', '20200', 2, './uploads/images/nokia-n800-stand2.gif', '/uploads/images/nokia-n800-stand2_thumb.gif', 0),
(21, 'Nokia', 'N90', 'The Nokia N90 is a smartphone with two displays. It has a built-in digital camera and integrated flash and can record video with audio. The phone has no vibration feature. The screen can be swiveled 270° to let the phone be handled more like a conventional video camera. The camera lens can also be swiveled.\r\nIt uses the Series 60 2nd Edition, Feature Pack 3 user interface on top of the Symbian OS 8.1a operating system. Later revisions also shipped with Version 2 of the Nokia Lifeblog software.\r\nThe N90 was usually bundled with a 64 MB or 128 MB DV-RS-MMC memory card and a USB data cable.\r\nThe Nokia N90 began shipping in Q2 2005 in Australia, Singapore and India (possibly incomplete list), and in Q1 2006 was made available in the USA.\r\nComplaints about the N90 include high price, large size and weight and "chunkiness."', '12000', 2, './uploads/images/2745308196463732.jpg', '/uploads/images/2745308196463732_thumb.jpg', 0),
(22, 'HTC', 'One X', 'HTC One X - Your Quad-core-powered Entertainer.\r\nExclusively Available At All Mobilink Sales & Service Centers.\r\nExtraordinary quad-core power gives you lightning-fast web browsing on HTC One X, Remarkable picture quality and hyper-realistic gaming effects all on a giant 4.7 inch HD screen of HTC One X, With Beats Audio of HTC One X you hear authentic, deep sound with true finely-tuned details, Access to your favorite apps is just a finger stroke away on your HTC One X Set your phone & quickly get weather updates, stock information or your favorite people''s Facebook status.  ', '55500', 1, './uploads/images/htconexb.gif', '/uploads/images/htconexb_thumb.gif', 0),
(23, 'Samsung', 'Galaxy Nexus', 'Samsung Galaxy Nexus - The possibilities are calling..\r\nSamsung Galaxy Nexus is outfitted with outstanding Samsung features such as a wide HD Super AMOLED Screen, premium curved design, thin form factor and extra fast dual core processor powering Samsung Galaxy Nexus with superb performance. Hosting the first Ice Cream Sandwich Operating System Samsung Galaxy Nexus is unified form of smartphone and tablet, Samsung Galaxy Nexus features a new refined but easy-to-use user interface. Samsung Galaxy Nexus is FAST & Samsung Galaxy Nexus is all about POWERFUL performance  ', '48000', 1, './uploads/images/Nexusg.gif', '/uploads/images/Nexusg_thumb.gif', 0),
(24, 'BlackBerry', 'Curve 9380', 'After playing it cool for a few years BlackBerry decided that there''s something to this touchscreen phone lark after all, releasing a budget all-touch device in the shape of the BlackBerry Curve 9380, Instead of the nippy 1.2GHz processor BlackBerry Curve 9380 ticks along at 806MHz though there''s a reasonable 512MB of RAM for multitasking, The BlackBerry Curve 9380''s screen is nice & bright with nice natural colours & excellent viewing angles, Both Torch 9860 & BlackBerry Curve 9380 are similar but the Curve''s pricetags makes up for the differences.  \r\n', '29500', 1, './uploads/images/bbcurve9380b.gif', '/uploads/images/bbcurve9380b_thumb.gif', 0),
(25, 'HTC', 'Explorer', 'HTC Explorer is the simply smarter phone that puts YOU in control. HTC Explorer is an intuitive, easy to use lockscreen & homescreen lets you access your most important information & tasks. Enjoy web browsing on HTC Explorer similar to your desktop. Keep in touch with loved ones even easier with email designed for easy navigation & quick reply. And the People Widget on HTC Explorer lets you group up your favorite people and view all your communication options on one screen for simple access.  \r\n', '15000', 1, './uploads/images/Explorer-b.gif', '/uploads/images/Explorer-b_thumb.gif', 0),
(26, 'HTC', 'One V', 'The first thing you pick up in the morning & the last thing you put away at night is HTC One V, You work on HTC One V, you connect to the digital world & you interact with those that matter most on it, You reach for HTC One V every time you want to remember a moment & you easily share that moment with just a couple taps, This isn’t just another smartphone; it stays with you & keeps up with you, HTC One V the essential smartphone for those on the go.  \r\n', '28500', 1, './uploads/images/htconevb.gif', '/uploads/images/htconevb_thumb.gif', 0),
(27, 'Qmobile', 'Noir A2', 'Yes it is Speed & some what it is Revolution because Qmobile Noir A2 runs on Gingerbread, With 650Mhz Processor Qmobile noir A2 is as speedy as you can ever get, Touch is everything now a days so Qmobile Noir A2 comes with Capacitive Touch Pad, Google Android Market, Facebook, Twitter, Youtube with all these apps Qmobile Noir A2 is all you need.  \r\n', '9500', 1, './uploads/images/QNoirA2b.gif', '/uploads/images/QNoirA2b_thumb.gif', 0),
(28, 'Sony Ericsson', 'W205', 'With its easy-to-use music player & on-board FM tuner SonyEricsson W205 is a decent budget music phone, SonyEricsson W205 is the cheapest phone in SonyEricsson''s current line-up of Walkman handsets, Most budget handsets have a candybar design but SonyEricsson W205 went with the adventurous slider approach, The Sony Ericsson W205 Walkman has quite obviously been built to a tight budget & as such it''s not the type of phone you''re going to flash around down the boozer.  \r\n', '6500', 1, './uploads/images/sew205b.gif', '/uploads/images/sew205b_thumb.gif', 0),
(29, 'Motorola', 'RAZR2 V8 Luxury Edition', 'This special edition of the RAZR2 has gone “lux” with 18k gold plated accents standing out against a luminous, black slate, vacuum metal finish. Decadent details, such as elegant pin stripes on the CLI lens, an engraved diamond-cut pattern on the sideband and a linear etching on the navigation wheel add to the edgy, yet chic, finishes of the device. With a soft-touch back, embossed with a snakeskin effect, the device even feels luxurious in the hand.  \r\n', '37200', 1, './uploads/images/V8Luxb.gif', '/uploads/images/V8Luxb_thumb.gif', 0),
(30, 'Samsung', 'Galaxy S II I9100', 'Making the impossible possible, Yes Samsung Galaxy S II is indeed the best smart phone, Samsung Dual Core Application Processor feature of Samsung Galaxy S II is the ultra responsive answer to mobile performance, providing high-speed multitasking and high performance gaming, Express your colour! This brilliant display of Samsung Galaxy S II delivers the best colouminimise, high contrast ratio as well as ultimate sharpness of image, Get vocal Just double tap the home key and you can control the Samsung Galaxy S II with a few selected words, With all these awesome features Samsung Galaxy S II is the cell phone you reallywant to put your money on.  \r\n', '48000', 1, './uploads/images/samsunggalaxysiib.gif', '/uploads/images/samsunggalaxysiib_thumb.gif', 0),
(31, 'Samsung', 'Galaxy Note', 'Meet the new Samsung Galaxy Note - a new type of smartphone. The world''s first 5.3" HD Super AMOLED display, Samsung Galaxy Note provides you with an expansive high-resolution screen for an immersive viewing experience. Samsung Galaxy Note provides the ability to freely capture & create ideas anywhere & everywhere. The S Pen of Samsung Galaxy Note is combined with the full touch screen to create a best-in-class mobile input experience. With Advanced 8MP powerful camera of Samsung Galaxy Note, you capture the world’s every moment in deep detail. powered by lightning fast network speed (HSPA or 4G LTE) & 1.4GHz dual core processor, Samsung Galaxy Note is a mean machine.  \r\n', '59500', 1, './uploads/images/GalaxyNoteb.gif', '/uploads/images/GalaxyNoteb_thumb.gif', 0),
(32, 'Samsung', 'Galaxy Ace S5830', 'Yes you will become an ace by using Samsung Galaxy Ace S5830, The Samsung Galaxy Ace S5830 takes a minimal approach in its design, resulting in a sophisticated mobile that will allure, With Samsung Galaxy Ace S5830 you can enjoy countless games, utilities, news, health and finance applications with more being added each day, Equipped with a strong 800MHz processor and Wi-Fi you can surf the web on Samsung Galaxy Ace S5830 like never before, The scope of what Samsung Galaxy Ace S5830 can do is virtually unlimited!  \r\n', '23900', 1, './uploads/images/Samsung_Galaxy_Aceb.gif', '/uploads/images/Samsung_Galaxy_Aceb_thumb.gif', 0),
(33, 'Samsung', 'Galaxy Pro B7510', 'When work relies on constant communication the one cell phone that will come in your mind is Samsung Galaxy Pro B7510, With the QWERTY keyboard, typing messages on Samsung Galaxy Pro B7510 is now even easier, Samsung Galaxy Pro B7510 ensure that everything from messages to phone calls and social network updates can be achieved quickly and without hassle, The Samsung Galaxy Pro B7510 is the perfect business partner and ready to add a new level of professionalism to your day.  \r\n', '19500', 1, './uploads/images/galaxyprob.gif', '/uploads/images/galaxyprob_thumb.gif', 0),
(34, 'Samsung', 'C3303K Champ', 'Samsung C3303K Champ brings a high-end look to the mobile that impresses at first sight. Cradling Samsung C3303K Champ in the palm brings to light the it’s curved back & its ergonomic finesse. Beautiful to look at & comfortable to use, Samsung C3303K Champ combines style & portability, making it an ideal choice. Samsung C3303K Champ provides an easy link to 7 popular social networking sites, so users can upload photos directly. Samsung C3303K Champ is Truly a Champ.  \r\n', '7050', 1, './uploads/images/C3303Kb.gif', '/uploads/images/C3303Kb_thumb.gif', 0),
(35, 'Samsung', 'S5263 Star II', 'The phone that makes sure that you are always the star of your social life is Samsung S5263 Star II, Facilitated by a fast high-responsive touch screen & “TouchWiz 3.0” you can easily connect to social networking sites with Samsung S5263 Star II, With faster and wider coverage, WiFi of Samsung S5263 Star II keeps you wired in to your life from anywhere, This is all contained in a smart & timeless design, you can be assured that Samsung S5263 Star II will never go out of style.  \r\n', '10300', 1, './uploads/images/S5263b.gif', '/uploads/images/S5263b_thumb.gif', 0),
(36, 'HTC', 'Sensation XL', 'Introducing HTC Sensation XL with Beats Audio. A stunning display, Hi-Fi audio & a truly immersive HTC Sense experience, plus on-demand movies – HTC Sensation XLis HTC''s best hi-def multimedia phone yet. When it comes to doing music justice, you’re way ahead of the crowd with HTC Sensation XL. With Beats Audio™ & its superb, in-box customized Beats headset. Now your audio experience sounds just like the artist intended. With HTC Sensation XL You''ll also enjoy the large 4.7 inch screen & 9.9mm sleek premium design. & record amazing HD quality video to complement your audio experience with this incredible superphone. HTC Sensation XL is the BEST sound & sight you can get on any mobile device.  \r\n', '53000', 1, './uploads/images/Sensationxlb.gif', '/uploads/images/Sensationxlb_thumb.gif', 0),
(37, 'HTC', 'Radar', 'The HTC Radar is the intuitive phone that keeps it all on your radar and lets you get real-time close with everything, Crafted from a single piece of polished metal HTC Radar just feels great in your hands and is built to last, The HTC Radar is that friend who will always be there for you It’ll make the right impression on you and everyone around you, The intuitive HTC Radar has amazing entertainment features that ensure your journeys will fly by.  \r\n', '35000', 1, './uploads/images/htcradarb.gif', '/uploads/images/htcradarb_thumb.gif', 0),
(38, 'HTC', 'ChaCha', 'You can take a photo - straight to Facebook. Make a video - straight to Facebook. Show whatever, whenever, at the touch of a button on your HTC ChaCha, Start a live instant chat & juggle between as many private conversations as you want the conversation never ends with HTC ChaCha, Heaps of friends, heaps of things you want to say HTC ChaCha comes with a QWERTY keyboard so you can knock out your messages fast, With the HTC ChaCha touchscreen zooming in and out of pictures, emails & web pages is made simple with a pinch of the screen.  \r\n', '21000', 1, './uploads/images/htcchachab.gif', '/uploads/images/htcchachab_thumb.gif', 0),
(39, 'Nokia', 'E71', 'Today work is where we are. Now meet the Nokia E71 designed for the way we work. With optimised messaging & email , high speed connections, & navigation. Nokia E71 has two home screens to choose between work & leisure modes, application shortcuts to suit your schedule. Making the most of your day at work and away, Nokia E71 is mobile efficiency, beautifully styled.  \r\n', '20900', 1, './uploads/images/E71b.gif', '/uploads/images/E71b_thumb.gif', 0),
(40, 'Nokia', 'C5 03', 'Nokia C5-03 is a slim touch screen phone with easy-to-use messaging features, Nokia C5-03 comes with free lifetime navigation with integrated A-GPS & Wi-Fi for fast internet browsing. With your Nokia C5-03 stay connected to the people who matter – access your favourite contacts with one touch, directly from the home screen of your Nokia C5-03. Enjoy entertainment on the move with C5-03 – stream videos, try new games & browse the web with a fast Wi-Fi connection.  \r\n', '15300', 1, './uploads/images/C5-03b.gif', '/uploads/images/C5-03b_thumb.gif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productid` int(11) NOT NULL,
  `userid` mediumint(8) unsigned NOT NULL,
  `description` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `productid` (`productid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `date`, `productid`, `userid`, `description`) VALUES
(12, '2012-05-14 14:58:31', 21, 6, 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `address`, `phone_number`) VALUES
(1, 2130706433, 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 1268889823, 1337013098, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, 2130706433, 'ahmednasir', '24865b73f3595c5a9bf5fb228d2e73812997bb45', NULL, 'ahmednasir91@gmail.com', NULL, NULL, NULL, 1336848172, 1337008791, 1, 'Ahmed', 'Nasir', '0', '+92213312007578'),
(4, 2130706433, 'mustafa', 'cdf1a8f8212ab8b8196b724a60e0035ec98c3b78', NULL, 'musta@ga.com', NULL, NULL, NULL, 1336906081, 1336976852, 1, 'mustafa', 'zai', 'naz', '0922'),
(5, 2130706433, 'fahad', 'ce10b7c82618562b7a408ac1c813ec71f8226f5d', NULL, 'daha@h.com', NULL, NULL, NULL, 1336912696, 1336975163, 1, 'fahad', 'uddin', 'nazimbad', '+92'),
(6, 2130706433, 'zain', 'c5eff51af65052dd87342148a38e0994f79ba091', NULL, 'zain@zain.com', NULL, NULL, NULL, 1336989817, 1337009607, 1, 'Zain', 'Nasir', 'Nazimabad', '922111');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipientid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
