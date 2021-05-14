-- Start the MySQL server and run this file to create user table.
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS tags;
DROP TABLE IF EXISTS projects;

CREATE TABLE users (
  pseudo VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL UNIQUE,
  gender VARCHAR(256) NOT NULL,
  date DATE NOT NULL,
  password VARCHAR(256) NOT NULL,
  PRIMARY KEY (pseudo)
);

CREATE TABLE tags (
  label VARCHAR(50) NOT NULL,
  PRIMARY KEY (label)
);

CREATE TABLE projects (
  title VARCHAR(50) NOT NULL,
  description VARCHAR(256) NOT NULL,
  PRIMARY KEY (title)
);

CREATE TABLE projectLabels(
  project VARCHAR(50) NOT NULL,
  label VARCHAR(50) NOT NULL,
  PRIMARY KEY (project, label),
  FOREIGN KEY (project) REFERENCES projects(title),
  FOREIGN KEY (label) REFERENCES tags(label)
);


CREATE TABLE userProject(
  user VARCHAR(256) NOT NULL,
  project VARCHAR(50) NOT NULL,
  PRIMARY KEY (user, project),
  FOREIGN KEY (user) REFERENCES users(pseudo),
  FOREIGN KEY (project) REFERENCES projects(title)
);
