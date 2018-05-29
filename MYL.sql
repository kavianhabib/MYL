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
		photoName VARCHAR (256) NOT NULL,
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
		contributor BOOLEAN,
        owner BOOLEAN,
		wordsInput INTEGER,
		/*FOREIGN KEY (userId) REFERENCES UserLogin(userId),
		FOREIGN KEY (langId) REFERENCES Languages (langId),*/
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


INSERT INTO userLogin (userId, userName,dob,email,password,photoName) VALUES ("rahelEZ", "Rahel Zewde", 1998-12-22, "rahelermias10@gmail.com", "CSE305", "rahelEZ.png");
INSERT INTO userLogin (userId, userName,dob,email,password,photoName) VALUES ("habibKv", "Habib Kaviani", 1996-02-13, "habibkv@gmail.com", "CSE3052", "habibKv.png");
INSERT INTO userLogin (userId, userName,dob,email,password,photoName) VALUES  ("alee", "Ali lee", 1984-10-10, "alee@gmail.com", "CSE3053", "alee.png");
INSERT INTO userLogin (userId, userName,dob,email,password,photoName) VALUES  ("jdoe", "John Doe", 1942-08-25, "jdoe@gmail.com", "CSE3054", NULL);

INSERT INTO Languages (langId,userId,wordsCount) VALUES ("clingon","rahelEZ",4);
INSERT INTO Languages (langId,userId,wordsCount) VALUES ("Rokak","habibKv",20);
INSERT INTO Languages (langId,userId,wordsCount) VALUES ("bliob","alee",200);
INSERT INTO Languages (langId,userId,wordsCount) VALUES ("janey","jdoe",1);

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

CREATE TABLE clingon(
	word VARCHAR(256) NOT NULL,
	translation VARCHAR(256) NOT NULL,
	PRIMARY KEY (word)
);

CREATE TABLE janey(
	word VARCHAR(256) NOT NULL,
	translation VARCHAR(256) NOT NULL,
	PRIMARY KEY (word)
);

INSERT INTO clingon (word,translation) VALUES ("Selam", "Hello");
INSERT INTO clingon (word,translation) VALUES ("eza", "There");
INSERT INTO clingon (word,translation) VALUES ("Sew", "Person");

INSERT INTO janey (word,translation) VALUES ("Annyong", "Hello");
INSERT INTO janey (word,translation) VALUES ("Igo", "There");
INSERT INTO janey (word,translation) VALUES ("Saram", "Person");

CREATE TABLE contributor(
	userId VARCHAR(256) NOT NULL,
	langId VARCHAR(256) NOT NULL,
	PRIMARY KEY (userId,langId),
	FOREIGN KEY (langId) REFERENCES languages(langId) ON DELETE CASCADE
);




