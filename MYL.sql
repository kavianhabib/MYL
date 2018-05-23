/* Rahel Zewde + Habib Kaviani
 * Rahel.zewde@stonybrook.edu
 * habbibudin.ahmadi@stonybrook.edu
 * 111250334
 */
DROP DATABASE IF EXISTS MYL;

CREATE DATABASE MYL;

GRANT ALL PRIVILEGES ON database.MYL.* to grader@localhost identified by 'allowme';

USE MYL;

CREATE TABLE userLogin (
		userId VARCHAR(256) NOT NULL,
		userName  VARCHAR(256) NOT NULL,
		dob DATE,
		email VARCHAR (256) NOT NULL,
		password VARCHAR (256) NOT NULL,
		photoName VARCHAR (256) NOT NULL
		PRIMARY KEY(userId)
);

CREATE TABLE languages (
		langId VARCHAR(256) NOT NULL,
		userId VARCHAR(256) NOT NULL,
		wordsCount INTEGER,
		PRIMARY KEY(langId)
);

CREATE TABLE languagesRank (
		wordsCount INTEGER NOT NULL,
		langRank INTEGER,
		PRIMARY KEY(wordsCount)
);

CREATE TABLE users (
		userId VARCHAR(256) NOT NULL,
		langId VARCHAR(256) NOT NULL,
		userType VARCHAR(256),
		wordsInput INTEGER,
		FOREIGN KEY userId REFERENCING UserLogin
		ON DELETE CASCADE,
		FOREIGN KEY langId REFERENCING Languages 
		ON DELETE CASCADE,
		PRIMARY KEY(userId, langId)
);

CREATE TABLE userRank(
		wordsInput INTEGER NOT NULL,
		userRank INTEGER,
		PRIMARY KEY(wordsInput)
);

CREATE TABLE wordReliability (
		userType VARCHAR(256) NOT NULL,
		reliablity BOOLEAN,
		PRIMARY KEY(userType)
);
