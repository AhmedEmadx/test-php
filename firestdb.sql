-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(32) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1179 ;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `username`, `password`, `email`, `lastname`, `salt`) VALUES
(1,'', '', '', '', '')