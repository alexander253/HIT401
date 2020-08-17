USE art_db;

CREATE TABLE `customer` (
  email varchar(255) NOT NULL,
  fname varchar(255) NOT NULL,
  lname varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  city varchar(255) NOT NULL,
  state varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  postcode MEDIUMINT (5) UNSIGNED ZEROFILL NOT NULL,
  phone MEDIUMINT (10) UNSIGNED ZEROFILL NOT NULL,
  # Assuming SHA256 hash
  hashed_password char(64) NOT NULL,
  # Assuming 16 chars in salt
  salt char(16) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `product` (
  productno int(255) NOT NULL auto_increment,
  description varchar(255) NOT NULL,
  price int(255) NOT NULL,
  category varchar(255) NOT NULL,
  colour varchar(255) NOT NULL,
  size varchar(255) NOT NULL,
  PRIMARY KEY (productno)
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