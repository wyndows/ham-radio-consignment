DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS store;
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS sale;

CREATE TABLE user (
	userId      	INT UNSIGNED AUTO_INCREMENT NOT NULL,
	userLastName  	VARCHAR(20) NOT NULL,
	userFirstName 	VARCHAR(20) NOT NULL,
	userAddress 	VARCHAR(100)NOT NULL,
	userCity    	VARCHAR(50) NOT NULL,
	userState   	CHAR(2)     NOT NULL,
	userZip     	CHAR(5)     NOT NULL,
	userEmail   	VARCHAR(128)NOT NULL,
	userPhone   	VARCHAR(30) NOT NULL,
	userSalt  		CHAR(64)  	NOT NULL,
	userHash  		CHAR(128) 	NOT NULL,
	UNIQUE(userEmail),
	UNIQUE(userPhone),
	PRIMARY KEY (userId)
);

CREATE TABLE store (
	storeId      INT UNSIGNED AUTO_INCREMENT NOT NULL,
	storeName    VARCHAR(50)  NOT NULL,
	storeAddress VARCHAR(100) NOT NULL,
	storeState   CHAR(2)   	 NOT NULL,
	storeZip   	 CHAR(5)      NOT NULL,
	storePhone   VARCHAR(30)  NOT NULL,
	storeEmail   VARCHAR(128) NOT NULL,
	UNIQUE(storeName),
	UNIQUE(storeEmail),
	UNIQUE(storeAddress),
	UNIQUE(storePhone),
	PRIMARY KEY (storeId)
);

CREATE TABLE item (
	itemId      		INT UNSIGNED AUTO_INCREMENT NOT NULL,
	itemDescription  VARCHAR(50)  NOT NULL,
	itemPrice 			NUMERIC(7,2) 	 NOT NULL,
	itemMedia   		BLOB  NOT NULL,
	userId 					INT UNSIGNED NOT NULL,
	storeId			INT UNSIGNED NOT NULL,
	INDEX(userId),
	INDEX(storeId),
	FOREIGN KEY(userId) REFERENCES user(userId),
	FOREIGN KEY(storeId) REFERENCES store(storeId),
	PRIMARY KEY(itemId)
);

CREATE TABLE sale (
	saleId      		INT UNSIGNED AUTO_INCREMENT NOT NULL,
	itemId  		INT UNSIGNED NOT NULL,
	storeId 		INT UNSIGNED NOT NULL,
	userId   			INT UNSIGNED NOT NULL,
	INDEX(userId),
	INDEX(storeId),
	INDEX(itemId),
	FOREIGN KEY(userId) REFERENCES user(userId),
	FOREIGN KEY(storeId) REFERENCES store(storeId),
	FOREIGN KEY(itemId) REFERENCES item(itemId),
	PRIMARY KEY(saleId)
);