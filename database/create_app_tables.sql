-- Start the MySQL server and run this file to create user table.
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS tags;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS projectLabels;
DROP TABLE IF EXISTS userLabels;
DROP TABLE IF EXISTS userProject;

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


-- Many 2 Many tables
/*
1. projectLabels: describe relation between project and its labels.
2. userLabels: a user can follow "labels", in other words, topics.
3. userProject: a user can build many projects and the project can have many collaborators
*/

CREATE TABLE projectLabels(
  project VARCHAR(50) NOT NULL,
  label VARCHAR(50) NOT NULL,
  PRIMARY KEY (project, label),
  FOREIGN KEY (project) REFERENCES projects(title),
  FOREIGN KEY (label) REFERENCES tags(label)
);


CREATE TABLE userLabels(
  user VARCHAR(256) NOT NULL,
  label VARCHAR(50) NOT NULL,
  PRIMARY KEY (user, label),
  FOREIGN KEY (user) REFERENCES users(pseudo),
  FOREIGN KEY (label) REFERENCES tags(label)
);


CREATE TABLE userProject(
  user VARCHAR(256) NOT NULL,
  project VARCHAR(50) NOT NULL,
  PRIMARY KEY (user, project),
  FOREIGN KEY (user) REFERENCES users(pseudo),
  FOREIGN KEY (project) REFERENCES projects(title)
);
