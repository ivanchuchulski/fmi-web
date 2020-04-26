-- script to run in phpmyadmin

CREATE DATABASE IF NOT EXISTS 'www_authentication';

CREATE TABLE user (
  email VARCHAR(255),
  password VARCHAR(255),
);

INSERT INTO user (email, password) values ('asdf@asd', 'pass1');
INSERT INTO user (email, password) values ('qwerty@asd', 'pass2');
