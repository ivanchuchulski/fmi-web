-- script to run in phpmyadmin

-- to change the name to <FN>_<FirstName>_<LastName>
CREATE DATABASE IF NOT EXISTS `62167_ivan_chuchulski`;

USE `62167_ivan_chuchulski`;

CREATE TABLE users (
  firstname VARCHAR(255),
  surname VARCHAR(255),
  major VARCHAR(255),
  course INT,
  studentGroup INT,
  motivation VARCHAR(255),
  facultynum INT NOT NULL,
  PRIMARY KEY (facultynum)
);