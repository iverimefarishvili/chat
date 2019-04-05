
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `mychat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mychat`;


CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname`varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthday` varchar (50) NOT NULL,
  `username` varchar(50) NOT NULL ,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 