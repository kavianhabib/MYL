/* Rahel Zewde + Habib Kaviani
 * Rahel.zewde@stonybrook.edu
 * habbibudin.ahmadi@stonybrook.edu
 * 111250334
 */
DROP DATABASE IF EXISTS MYL;

CREATE DATABASE MYL;

/*GRANT ALL PRIVILEGES ON database.MYL.* to grader@localhost identified by 'allowme';*/

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


INSERT INTO userLogin (userId, name,dob,email,password,photoName) VALUES ("rahelEZ", "Rahel Zewde", December 22, 1998, "rahelermias10@gmail.com", "CSE305", "rahelEZ.png");
INSERT INTO userLogin (userId, name,dob,email,password,photoName) VALUES ("habibKv", "Habib Kaviani", February 23, 1996, "habibkv@gmail.com", "CSE3052", "habibKv.png");
INSERT INTO userLogin (userId, name,dob,email,password,photoName) VALUES  ("alee", "Ali lee", October 10, 1984, "alee@gmail.com", "CSE3053", "alee.png");
INSERT INTO userLogin (userId, name,dob,email,password,photoName) VALUES  ("jdoe", "John Doe", August 25, 1942, "jdoe@gmail.com", "CSE3054", NULL);

INSERT INTO Languages (langId,userIdId,wordsCount) VALUES ("clingon","rahelEZ",4);
INSERT INTO Languages (langId,userIdId,wordsCount) VALUES ("Rokak","habibKv",20);
INSERT INTO Languages (langId,userIdId,wordsCount) VALUES ("bliob","alee",200);
INSERT INTO Languages (langId,userIdId,wordsCount) VALUES ("janey","jdoe",1);

INSERT INTO languagesRank (wordsCount,langRank) VALUES (100,1);
INSERT INTO languagesRank (wordsCount,langRank) VALUES (50,2);
INSERT INTO languagesRank (wordsCount,langRank) VALUES (10,3);
INSERT INTO languagesRank (wordsCount,langRank) VALUES (1,4);

INSERT INTO users (userId,langId,userType,wordsInput) VALUES ("rahelEZ", "clingon" , "owner", 2);
INSERT INTO users (userId,langId,userType,wordsInput) VALUES ("alee", "clingon" , "contributer", 2);
INSERT INTO users (userId,langId,userType,wordsInput) VALUES ("habibKv", "Rokak" , "owner", 15);
INSERT INTO users (userId,langId,userType,wordsInput) VALUES ("rahelEZ", "Rokak" , "contributer", 5);
INSERT INTO users (userId,langId,userType,wordsInput) VALUES ("alee", "bliob" , "owner", 180);
INSERT INTO users (userId,langId,userType,wordsInput) VALUES ("habibKv", "bliob" , "owner", 20);
INSERT INTO users (userId,langId,userType,wordsInput) VALUES ("jdoe", "janey" , "owner", 1);

INSERT INTO userRank (wordsInput, userRank) VALUES (50, 1);
INSERT INTO userRank (wordsInput, userRank) VALUES (20, 2);
INSERT INTO userRank (wordsInput, userRank) VALUES (10, 3);
INSERT INTO userRank (wordsInput, userRank) VALUES (1, 4);

INSERT INTO wordReliability VALUES ("owner", TRUE);
INSERT INTO wordReliability VALUES ("contributer", FALSE);



