DROP DATABASE hkaps5;

CREATE DATABASE hkaps5;

GRANT ALL PRIVILEGES ON database.hkaps5.* ;

USE hkaps5;

CREATE TABLE Products (
		maker VARCHAR(256),
		model VARCHAR(256) NOT NULL,
		types VARCHAR(256),
		PRIMARY KEY(model)
);
CREATE TABLE PCs (
		model VARCHAR(256) NOT NULL,
		speed DOUBLE,
		ram INTEGER,
		hd INTEGER,
		price DOUBLE,
		PRIMARY KEY(model)
);
CREATE TABLE Laptops (
		model VARCHAR(256) NOT NULL,
		speed DOUBLE,
		ram INTEGER,
		hd INTEGER,
		screen DOUBLE,
		price DOUBLE,
		PRIMARY KEY(model)
);
CREATE TABLE Printers (
		model VARCHAR(256) NOT NULL,
		color BOOLEAN,
		types VARCHAR(256),
		price DOUBLE,
		PRIMARY KEY(model)
);

INSERT INTO Products (maker, model, types) VALUES ("Sony", "Vaio16", "Desktop");
INSERT INTO Products (maker, model, types) VALUES ("Apple", "macAir 2", "Laptop");
INSERT INTO Products (maker, model, types) VALUES ("HP", "Jet2000", "Printer");
INSERT INTO Products (maker, model, types) VALUES ("Lenovo", "G50", "Laptop");
INSERT INTO Products (maker, model, types) VALUES ("Dell", "aspirus", "Laptop");
INSERT INTO Products (maker, model, types) VALUES ("Compaque", "comp21", "Desktop");
INSERT INTO Products (maker, model, types) VALUES ("Dell", "alien52", "Desktop");
INSERT INTO Products (maker, model, types) VALUES ("Samsung", "sam54", "Desktop");
INSERT INTO Products (maker, model, types) VALUES ("MSN", "G8for", "Desktop");
INSERT INTO Products (maker, model, types) VALUES ("Lenovo", "aspirus", "Laptop");
INSERT INTO Products (maker, model, types) VALUES ("Canon", "Jet2000", "Printer");
INSERT INTO Products (maker, model, types) VALUES ("GCC", "Laser3000", "Printer");
INSERT INTO Products (maker, model, types) VALUES ("HP", "OfficePro", "Printer");
INSERT INTO Products (maker, model, types) VALUES ("Diablo", "PrintCar", "Printer");
INSERT INTO Products (maker, model, types) VALUES ("Eltron", "OfficeMate", "Printer");

INSERT INTO PCs (model, speed, ram, hd, price)VALUES ("Vaio16", 2.5, 4, 500, 560);
INSERT INTO PCs (model, speed, ram, hd, price)VALUES ("comp21", 3.4, 6, 700, 750);
INSERT INTO PCs (model, speed, ram, hd, price)VALUES ("alien52", 4.1, 8, 1000, 869);
INSERT INTO PCs (model, speed, ram, hd, price)VALUES ("sam54", 3.6, 16, 750, 754);
INSERT INTO PCs (model, speed, ram, hd, price)VALUES ("G8for", 4.2, 16, 1200, 905);

INSERT INTO Laptops (model, speed, ram, hd, screen, price)VALUES ("G50", 2, 4, 1000, 15, 438);
INSERT INTO Laptops (model, speed, ram, hd, screen, price)VALUES ("aspirus", 2.5, 4, 800, 13.5, 498);
INSERT INTO Laptops (model, speed, ram, hd, screen, price)VALUES ("macAir 2", 3.1, 6, 500, 17.2, 850);
INSERT INTO Laptops (model, speed, ram, hd, screen, price)VALUES ("think480", 4.5, 8, 800, 13.2, 789);

INSERT INTO printers (model,color,types, price) VALUES ("Jet2000", True, "RGB colors", 720 );
INSERT INTO printers (model,color,types, price) VALUES ("Laser3000", FALSE, "BW colors", 520 );
INSERT INTO printers (model,color,types, price) VALUES ("OfficePro", True, "RGB colors", 850 );
INSERT INTO printers (model,color,types, price) VALUES ("PrintCar", FALSE, "BW colors", 300 );
INSERT INTO printers (model,color,types, price) VALUES ("OfficeMate", True, "RGB colors", 620 );