DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS storeLocation;
DROP TABLE IF EXISTS consignItem;

CREATE TABLE customer (
	customerId      	INT UNSIGNED AUTO_INCREMENT NOT NULL,
	customerLastName  VARCHAR(20)  NOT NULL,
	customerFirstName VARCHAR(20)  NOT NULL,
	customerAddress 	VARCHAR(100) NOT NULL,
	customerCity    	VARCHAR(50)  NOT NULL,
	customerState   	CHAR(2)      NOT NULL,
	customerZip     	CHAR(5)      NOT NULL,
	customerEmail   	VARCHAR(128) NOT NULL,
	customerPhone   	VARCHAR(30)  NOT NULL,
	customerSaltHash  VARCHAR(25)  NOT NULL,
	UNIQUE(customerEmail),
	UNIQUE(customerPhone),
	PRIMARY KEY (customerId)
);

CREATE TABLE storeLocation (
	storeLocationId      INT UNSIGNED AUTO_INCREMENT NOT NULL,
	storeLocationName    VARCHAR(50)  NOT NULL,
	storeLocationAddress VARCHAR(100) NOT NULL,
	storeLocationState   CHAR(2)   	 NOT NULL,
	storeLocationZip   	CHAR(5)      NOT NULL,
	storeLocationPhone   VARCHAR(30)  NOT NULL,
	storeLocationEmail   VARCHAR(128) NOT NULL,
	UNIQUE(storeLocationName),
	UNIQUE(storeLocationEmail),
	UNIQUE(storeLocationAddress),
	UNIQUE(storeLocationPhone),
	PRIMARY KEY (storeLocationId)
);

CREATE TABLE consignItem (
	consignItemId      		INT UNSIGNED AUTO_INCREMENT NOT NULL,
	consignItemDescription  VARCHAR(50)  NOT NULL,
	consignItemPrice 			FLOAT(7,2) 	 NOT NULL,
	consignItemMedia   		BLOB(65536)  NOT NULL,
	customerId 					INT UNSIGNED NOT NULL,
	storeLocationId			INT UNSIGNED NOT NULL,
	INDEX(customerId),
	INDEX(storeLocationId),
	FOREIGN KEY(customerId) REFERENCES customer(customerId),
	FOREIGN KEY(storeLocationId) REFERENCES storeLocation(storeLocationId),
	PRIMARY KEY(consignItemId)
);

CREATE TABLE itemSale (
	itemSaleId      		INT UNSIGNED AUTO_INCREMENT NOT NULL,
	consignItemId  		VARCHAR(50)  NOT NULL,
	storeLocationId 		FLOAT(7,2) 	 NOT NULL,
	customerId   			BLOB(65536)  NOT NULL,
	consignItemPrice   	FLOAT(7,2) 	 NOT NULL,
	INDEX(customerId),
	INDEX(storeLocationId),
	INDEX(consignItemPrice),
	INDEX(consignItemId),
	FOREIGN KEY(customerId) REFERENCES customer(customerId),
	FOREIGN KEY(storeLocationId) REFERENCES storeLocation(storeLocationId),
	FOREIGN KEY(consignItemPrice) REFERENCES consignItem(consignItemPrice),
	FOREIGN KEY(consignItemId) REFERENCES consignItem(consignItemId),
	PRIMARY KEY(consignItemId)
);