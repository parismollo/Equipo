-- Start the MySQL server and run this file to create user table.
DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
  pseudo VARCHAR(256) NOT NULL,
  password VARCHAR(256) NOT NULL,
  PRIMARY KEY (pseudo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;