DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS storeLocation;
DROP TABLE IF EXISTS consignItem;

CREATE TABLE customer (
	customerId      INT UNSIGNED AUTO_INCREMENT NOT NULL,
	customerNameLast  VARCHAR(20)  NOT NULL,
	customerNameFirst VARCHAR(20)  NOT NULL,
	customerAddress 	VARCHAR(100) NOT NULL,
	customerCity    	VARCHAR(50)  NOT NULL,
	customerState   	CHAR(2)      NOT NULL,
	customerZip     	CHAR(5)      NOT NULL,
	customerEmail   	VARCHAR(128) NOT NULL,
	customerPhone   	VARCHAR(30)  NOT NULL,
	customerBalance  	INT SIGNED NOT NULL,
	customerHash    	VARCHAR(25)  NOT NULL,
);

CREATE TABLE storeLocation (
	storeLocationId      INT UNSIGNED AUTO_INCREMENT NOT NULL,
	storeLocationName    VARCHAR(50)  NOT NULL,
	storeLocationAddress VARCHAR(100) NOT NULL,
	storeLocationState   VARCHAR(2)   NOT NULL,
	storeLocationZip   	CHAR(5)      NOT NULL,
	storeLocationPhone   CHAR(12)     NOT NULL,
	storeLocationEmail   VARCHAR(128) NOT NULL,
);

CREATE TABLE consignItem (
	consignItemId      		INT UNSIGNED AUTO_INCREMENT NOT NULL,
	consignItemDescription  VARCHAR(50)  NOT NULL,
	consignItemPrice 			FLOAT(7,2) 	 NOT NULL,
	consignItemType   		VARCHAR(11)  NOT NULL,
	consignItemMedia   		BLOB(65536)  NOT NULL,
	storeLocationId   		INT UNSIGNED NOT NULL,
	PurchasecustomerId 		INT UNSIGNED NOT NULL,
	SalecustomerId				INT UNSIGNED NOT NULL
);