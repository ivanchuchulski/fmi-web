-- db ddl commands for creation
-- for db setup view the db-config.ini file in backend folder
-- host=127.0.0.1
-- name=62167_ivan_chuchulski
-- user=root
-- password=

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