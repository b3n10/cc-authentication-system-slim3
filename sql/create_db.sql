DROP DATABASE IF EXISTS authentication_system;

CREATE DATABASE authentication_system;

USE authentication_system;

CREATE TABLE users (
	id int(5)		not null AUTO_INCREMENT PRIMARY KEY,
	name				varchar(255),
	email				varchar(255) not null,
	password		varchar(255) not null,
	created_at	TIMESTAMP,
	-- last col if TIMESTAMP should have DEFAULT CURRENT_TIMESTAMP or else error --
	updated_at	TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);
