CREATE TABLE persistent (
  `name` varchar(128) NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;