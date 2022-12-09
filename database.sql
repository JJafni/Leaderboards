DROP DATABASE IF EXISTS `leaderboard`;

CREATE DATABASE `leaderboard`;

USE `leaderboard`;

CREATE TABLE `tafeltennis` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) NOT NULL,
    won INT NOT NULL,
    lost INT NOT NULL
);

CREATE TABLE `mariokart` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) NOT NULL,
    total_score INT NOT NULL,
    total_matches INT NOT NULL,
    average_place INT NOT NULL
);

CREATE TABLE `users` (
    id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username TINYTEXT NOT NULL,
    password LONGTEXT NOT NULL,
    email TINYTEXT NOT NULL
);