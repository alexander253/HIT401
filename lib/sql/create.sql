USE waste_app;

CREATE TABLE `user` (
  email varchar(255) NOT NULL,
  fname varchar(255) NOT NULL,
  lname varchar(255) NOT NULL,
  points INT (99),
  # Assuming SHA256 hash
  hashed_password char(64) NOT NULL,
  # Assuming 16 chars in salt
  salt char(16) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `bin` (
  id int(255) NOT NULL auto_increment,
  type varchar(255) NOT NULL,
  location varchar(255) NOT NULL,
  used int(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `rubbish` (
  id int(255) NOT NULL auto_increment,
  type varchar(255) NOT NULL,
  description varchar(255) NOT NULL,

  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `purchase` (
  purchaseno varchar(255) NOT NULL,
  date varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  PRIMARY KEY (purchaseno)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `purchaseitem` (
  itemno int(255) NOT NULL,
  purchaseno int(255) NOT NULL,
  productno int(255) NOT NULL


) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
