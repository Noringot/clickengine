CREATE DATABASE IF NOT EXISTS `clickengine`;

CREATE TABLE IF NOT EXISTS `clickengine`.`users` (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL
);