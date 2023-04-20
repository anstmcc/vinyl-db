CREATE DATABASE vinyl;

USE vinyl;

CREATE TABLE Owner(
owner_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
name char(50) NOT NULL
);

CREATE TABLE Artist(
artist_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name varchar(255) NOT NULL,
group_members varchar(255)
);

CREATE TABLE Record(
record_id varchar(255) PRIMARY KEY NOT NULL,
title varchar(255) NOT NULL,
artist int NOT NULL,
price FLOAT,
owner int NOT NULL,
last_cleaned DATE,
FOREIGN KEY (artist) REFERENCES Artist(artist_id),
FOREIGN KEY (owner) REFERENCES Owner(owner_id)
);