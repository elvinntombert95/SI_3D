-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2016 at 03:45 PM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `game_3d`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score` int(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `joining_date`, `score`) VALUES
(1, 'root', 'root@gmail.com', '$2y$10$zTqUIPAyp0KP5MnELfYdp.wobkoN.5LI/jZB.T7jkh2TAM66DMZhe', '2016-04-12 08:32:47', 0),
(2, 'root2', 'root@root.root', '$2y$10$zeA6TEGKCdU4K4ElcEvfz.SGi9r9bgpXlkASxlVytWTAD8uU4tTdK', '2016-04-12 08:33:50', 1209),
(3, 'GAZTO', 'bruh@gmail.com', '$2y$10$agTLkCTbtONyf0a/VKmxPOQPZ7GksWOHR/mwW8xXogQmG9KFd6Kpi', '2016-04-12 09:46:08', 0),
(4, 'ga', 'ga@gmail.com', '$2y$10$cP0FBpduH/M4zXzL6V4jge/II0syKdXi9Mm/Uc9OWegQYt4tWdlsq', '2016-04-12 09:46:46', 0),
(5, 'sdgefdgergerge', 'ergeggerg@gergeg.com', '$2y$10$0nLhxyj96PmbR09S5ZniS.Ns.hxNo8vDUJUt4GtmGX/85EIYiazxG', '2016-04-12 12:03:02', 0),
(6, 'laetis', 'rniznoierv@g.com', '$2y$10$VvQbOKVsqwhZgN7PSPDxZORwdCyaj48af49I/c.SdQ8mIWmZbi5ry', '2016-04-12 12:56:24', 0),
(7, 'freff', 'erferfe@flfl.m', '$2y$10$bfjTolwOGdvmvmpKmupYKOr.oY/ynCBMgK.6MjV0GK/MPR6S.Hrmu', '2016-04-14 13:45:50', 0),
(8, 'j,j,jj,j,j,j,', 'elvinnbtogfbbgbdme@gmail.com', '$2y$10$v8SpXdSRFHPWExFh/d5Z3.H6DtvXWRVHpGOPi.IIl9/WU1JmGBcVm', '2016-04-14 15:37:47', 0),
(9, 'jy,jy,htrth', 'elvinnbtome@gmail.comythy', '$2y$10$muuLSCej/QBojDR76O1Mvep72sijezI8Us44iZfWlcYW26cBOn362', '2016-04-14 15:38:42', 0),
(10, 'ghn hgnh,', 'trgttr@gmzkee.coekoe', '$2y$10$DRE.ct.TLraAi.oKIAnSxu2exigFbep6/xt5vB6U8rD/vUR83jL06', '2016-04-14 15:41:01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
