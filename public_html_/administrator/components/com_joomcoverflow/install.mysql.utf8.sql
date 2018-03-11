CREATE TABLE IF NOT EXISTS `#__coverflow_imagenes` (
  `id` int(11) NOT NULL auto_increment,
  `artLocation` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `albumName` varchar(255) NOT NULL,
  `artistLink` varchar(255) NOT NULL,
  `albumLink` varchar(255) NOT NULL,
  `state` tinyint(3) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `#__coverflow_imagenes` (`id`, `artLocation`, `artist`, `albumName`, `artistLink`, `albumLink`, `state`, `ordering`) VALUES
(1, 'album1.jpg', 'joomlaos.es', 'Joomlaos. Soluciones web Joomla', 'http://joomlaos.es', 'http://joomlaos.es', 1, 0),
(2, 'album2.jpg', 'hacce.com', 'Hacce Soluciones TIC. Diseño web Vigo - Pontevedra - Galicia', 'http://hacce.com', 'http://hacce.com', 1, 0),
(3, 'album3.jpg', 'blog.hacce.com', 'Hacce Soluciones TIC. Blog Corporativo', 'http://blog.hacce.com', 'http://blog.hacce.com', 1, 0),
(4, 'album4.jpg', 'Hacce en Facebook', 'facebook.com/pages/Hacce-Soluciones-TIC/25429283535', 'http://www.facebook.com/pages/Hacce-Soluciones-TIC/25429283535', 'http://www.facebook.com/pages/Hacce-Soluciones-TIC/25429283535', 1, 0),
(5, 'album5.jpg', 'inclusion.es', 'Inclusión. Blog de Accesibilidad y Usabilidad Web', 'http://inclusion.es', 'http://inclusion.es', 1, 0);