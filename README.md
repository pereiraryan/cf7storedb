# cf7storedb
Plugin to store data in on table for wordpress

Create a table to store the data in the database.

CREATE TABLE `wp_wp_forms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `form` varchar(100) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



And create a folder in Plugins section 
