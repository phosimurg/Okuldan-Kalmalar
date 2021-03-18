CREATE TABLE `puanlar` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `yazi` int(10) unsigned NOT NULL,
  `puan` int(11) NOT NULL,
  `veren` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

CREATE TABLE `yazilar` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `baslik` varchar(255) NOT NULL,
  `metin` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5 AUTO_INCREMENT=3 ;

INSERT INTO `yazilar` VALUES (1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean vulputate, odio sed pharetra laoreet, massa nunc sagittis magna, vel eleifend tortor felis eu diam. Suspendisse eu elit non ipsum auctor sagittis. Donec mattis quam id massa. Nulla vitae elit at lacus semper venenatis. Nam pharetra, felis quis semper hendrerit, mauris est hendrerit nibh, at faucibus massa tortor at dolor. Vestibulum sapien eros, ullamcorper sed, laoreet ac, tincidunt id, lectus. Sed sollicitudin, dui at sagittis egestas, massa risus sollicitudin lorem, nec feugiat orci dolor eu risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce risus est, ultrices eu, bibendum nec, ornare eget, velit. Nam placerat nisl id lorem. Morbi eget sem eu velit feugiat aliquam. Donec egestas pretium metus.');
INSERT INTO `yazilar` VALUES (2, 'Lorem Ipsum 2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean vulputate, odio sed pharetra laoreet, massa nunc sagittis magna, vel eleifend tortor felis eu diam. Suspendisse eu elit non ipsum auctor sagittis. Donec mattis quam id massa. Nulla vitae elit at lacus semper venenatis. Nam pharetra, felis quis semper hendrerit, mauris est hendrerit nibh, at faucibus massa tortor at dolor. Vestibulum sapien eros, ullamcorper sed, laoreet ac, tincidunt id, lectus. Sed sollicitudin, dui at sagittis egestas, massa risus sollicitudin lorem, nec feugiat orci dolor eu risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce risus est, ultrices eu, bibendum nec, ornare eget, velit. Nam placerat nisl id lorem. Morbi eget sem eu velit feugiat aliquam. Donec egestas pretium metus.');
