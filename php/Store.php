<?php

namespace Edu\Cnm\Mball15\HamRadioConsignment;

require_once ("autoload.php");

/**
 * Small Cross Section of a Store's Information
 *
 * This can be considered a small example of what information is utilized from a Store Entity.
 *
 * @author Marlan Ball <mball15@cnm.edu>
 * @version 1.0.0
 */
class Store implements \JsonSerializable {
	// use ValidateDate;

	/**
	 * id for this store; this is the primary key
	 * @var int $storeId
	 */
	private $storeId;
	/**
	 * the name of the store
	 * @var string $storeName
	 */
	private $storeName;
	/**
	 * the address of the store
	 * @var string $storeAddress
	 */
	private $storeAddress;
	/**
	 * the state where store is located
	 * @var string $storeState
	 */
	private $storeState;
	/**
	 * the zipcode where store is located
	 * @var string $storeZip
	 */
	private $storeZip;
	/**
	 * the phone number of the store
	 * @var string $storePhone
	 */
	private $storePhone;
	/**
	 * the email address of the store
	 * @var string $storePhone
	 */
	private $storeEmail;

	/**
	 * constructor for this store
	 *
	 * @param int|null $newStoreId id of this store or null if a new store
	 * @param string $newStoreName string containing name of the store
	 * @param string $newStoreAddress string containing address of the store
	 * @param string $newStoreState string containing state of the store
	 * @param string $newStoreZip string containing zip code of the store
	 * @param string $newStorePhone string containing phone number of the store
	 * @param string $newStoreEmail string containing email address of the store
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g. strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct(int $newStoreId = null, string $newStoreName, string $newStoreAddress, string $newStoreState, string $newStoreZip, string $newStorePhone, string $newStoreEmail) {
		try {
			$this->setStoreId($newStoreId);
			$this->setStoreName($newStoreName);
			$this->setStoreAddress($newStoreAddress);
			$this->setStoreState($newStoreState);
			$this->setStoreZip($newStoreZip);
			$this->setStorePhone($newStorePhone);
			$this->setStoreEmail($newStoreEmail);
		} catch(\InvalidArgumentException $invalidArgument) {
			//rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			//rethrow the exception to the caller
			throw(new \RangeException($range->getMessage(), 0, $range));
		} catch(\TypeError $typeError) {
			//rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for store id
	 *
	 * @return int|null value of store id
	 */

	public function getStoreId() {
		return($this->storeId);
	}

	/**
	 * mutator method for store id
	 *
	 * @param int|null $newStoreId new value of store id
	 * @throws \RangeException if $newStoreId is not positive
	 * @throws \TypeError if $newStoreId is not an integer
	 */
	public function setStoreId(int $newStoreId = null) {
		// base case: if the store id is null, this is a new store without a mySQL assigned id
		if($newStoreId === null) {
			$this->storeId = null;
			return;
		}

		// verify the store id is positive
		if($newStoreId <=0) {
			throw(new \RangeException("store id is not positive"));
		}

		// store the store id
		$this->storeId = $newStoreId;

	}

	/**
	 * accessor method for store name
	 *
	 * @return string value of store name
	 */
	public function getStoreName() {
		return($this->storeName);
	}

	/**
	 * mutator method for store name
	 *
	 * @param string $newStoreName new value of store name
	 * @throws \InvalidArgumentException if $newStoreName is not a string or insecure
	 * @throws \RangeException if $newStoreName is > 50 characters
	 * @throws \TypeError if $newStoreName is not a string
	 */
	public function setStoreName(string $newStoreName) {
		// verify the store name is secure
		$newStoreName = trim($newStoreName);
		$newStoreName = filter_var($newStoreName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStoreName) === true) {
			throw(new \InvalidArgumentException("store name content is empty or insecure"));
		}

		// verify the store name will fit in the database
		if(strlen($newStoreName) > 50) {
			throw(new \RangeException("store name is too long"));
		}

		// store the store name
		$this->storeName = $newStoreName;
	}

	/**
	 * accessor method for store address
	 *
	 * @return string value of store address
	 */
	public function getStoreAddress() {
		return($this->storeAddress);
	}

	/**
	 * mutator method for store address
	 *
	 * @param string $newStoreAddress new value of store address
	 * @throws \InvalidArgumentException if $newStoreAddress is not a string or insecure
	 * @throws \RangeException if $newStoreAddress is > 100 characters
	 * @throws \TypeError if $newStoreAddress is not a string
	 */
	public function setStoreAddress(string $newStoreAddress) {
		// verify the store address is secure
		$newStoreAddress = trim($newStoreAddress);
		$newStoreAddress = filter_var($newStoreAddress, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStoreAddress) === true) {
			throw(new \InvalidArgumentException("store address is empty or insecure"));
		}

		// verify the store address will fit in the database
		if(strlen($newStoreAddress) > 100) {
			throw(new \RangeException("store address is too long"));
		}

		// store the store address
		$this->storeAddress = $newStoreAddress;
	}

	/**
	 * accessor method for store state
	 *
	 * @return string value of store state
	 */
	public function getStoreState() {
		return($this->storeState);
	}

	/**
	 * mutator method for store state
	 *
	 * @param string $newStoreState new value of store state
	 * @throws \InvalidArgumentException if $newStoreState is not a string or insecure
	 * @throws \RangeException if $newStoreState is > 2 characters
	 * @throws \TypeError if $newStoreState is not a string
	 */
	public function setStoreState(string $newStoreState) {
		// verify the store state is secure
		$newStoreState = trim($newStoreState);
		$newStoreState = filter_var($newStoreState, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStoreState) === true) {
			throw(new \InvalidArgumentException("store state is empty or insecure"));
			}

		// verify the store address will fit in the database
		if(strlen($newStoreState) > 2) {
			throw(new \RangeException("store state is too long"));
		}

		// store the store state
		$this->storeState = $newStoreState;
	}

	/**
	 * accessor method for store zipcode
	 *
	 * @return string value of store zipcode
	 */
	public function getStoreZip() {
		return($this->storeZip);
	}

	/**
	 * mutator method for store zipcode
	 *
	 * @param string $newStoreZip new value of store zipcode
	 * @throws \InvalidArgumentException if $newStoreZip is not a string or insecure
	 * @throws \RangeException if $newStoreZip is > 5 characters
	 * @throws \TypeError if $newStoreZip is not a string
	 */
	public function setStoreZip(string $newStoreZip) {
		// verify the store zipcode is secure
		$newStoreZip = trim($newStoreZip);
		$newStoreZip = filter_var($newStoreZip, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStoreZip) === true) {
			throw(new \InvalidArgumentException("zipcode is empty or insecure"));
		}

		// verify the store zipcode will fit in the database
		if(strlen($newStoreZip) > 5) {
			throw(new \RangeException("zipcode is too long"));
		}

		// store the store's zipcode
		$this->storeZip = $newStoreZip;
	}

	/**
	 * accessor method for store phone number
	 *
	 * @return string value of store phone number
	 */
	public function getStorePhone() {
		return($this->storePhone);
	}

	/**
	 * mutator method for store phone number
	 *
	 * @param string $newStorePhone new value of store phone number
	 * @throws \InvalidArgumentException if $newStorePhone is not a string or insecure
	 * @throws \RangeException if $newStorePhone is > 30 characters
	 * @throws \TypeError if $newStorePhone is not a string
	 */
	public function setStorePhone(string $newStorePhone) {
		// verify the store phone number is secure
		$newStorePhone = trim($newStorePhone);
		$newStorePhone = filter_var($newStorePhone, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStorePhone) === true) {
			throw(new \InvalidArgumentException("phone number is empty or insecure"));
		}

		// verify the phone number will fit in the database
		if(strlen($newStorePhone) > 30) {
			throw(new \RangeException("phone number too long"));
		}

		// store the phone number
		$this->storePhone = $newStorePhone;
	}

	/**
	 * accessor method for store email
	 *
	 * @return string value of store email
	 */
	public function getStoreEmail() {
		return($this->storeEmail);
	}

	/**
	 * mutator method for store email
	 *
	 * @param string $newStoreEmail new value of store email
	 * @throws \InvalidArgumentException if $newStoreEmail is not a string or insecure
	 * @throws \RangeException if $newStoreEmail is > 128 characters
	 * @throws \TypeError if $newStoreEmail is not a string
	 */
	public function setStoreEmail(string $newStoreEmail) {
		// verify the store email is secure
		$newStoreEmail = trim($newStoreEmail);
		$newStoreEmail = filter_var($newStoreEmail, FILTER_SANITIZE_EMAIL);
		if(empty($newStoreEmail) === true) {
			throw(new \InvalidArgumentException("store email is empty or insecure"));
		}

		// verify the store email will fit in the database
		if(strlen($newStoreEmail) > 128) {
			throw(new \RangeException("store email address is too long"));
		}

		// store the store's email address
		$this->storeEmail = $newStoreEmail;
	}

	/**
	 * inserts store information into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function insert(\PDO $pdo) {
		// enforce the storeId is null (i.e., don't insert a store that already exists
		if($this->storeId !== null) {
			throw(new \PDOException("not a new store"));
		}

		// create query template
		$query = "INSERT INTO store(storeId, storeName, storeAddress, storeState, storeZip, storePhone, storeEmail) VALUES(:storeId, :storeName, :storeAddress, :storeState, :storeZip, :storePhone, :storeEmail)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["storeId" => $this->storeId, "storeName" => $this->storeName, "storeAddress" => $this->storeAddress, "storeState" => $this->storeState, "storeZip" => $this->storeZip, "storePhone" => $this->storePhone, "storeEmail" => $this->storeEmail];
		$statement->execute($parameters);

		// update the null storeId with what mySQL just gave us
		$this->storeId = intval($pdo->lastInsertId());

	}

	/**
	 * deletes this store from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		// enforce the storeId is not null (don't delete a store that has just been inserted)
		if($this->storeId === null) {
			throw(new \PDOException("unable to delete a store that does not exist"));
		}

		// create query template
		$query = "DELETE FROM store WHERE storeId = :storeId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["storeId" => $this->storeId];
		$statement->execute($parameters);
	}

	/**
	 * updates the store data in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function update(\PDO $pdo) {
		// enforce the storeId is not null (don't update the store data that hasn't been inserted yet
		if($this->storeId === null) {
			throw(new \PDOException("unable to update the store data that doesn't exist"));
		}

		// create query template
		$query = "UPDATE store SET storeName = :storeName, storeAddress = :storeAddress, storeState = :storeState, storeZip = :storeZip, storePhone = :storePhone, storeEmail = :storeEmail WHERE storeId = :storeId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["storeName" => $this->storeName, "storeAddress" => $this->storeAddress, "storeState" => $this->storeState, "storeZip" => $this->storeZip, "storePhone" => $this->storePhone, "storeEmail" => $this->storeEmail, "storeId" => $this->storeId];
		$statement->execute($parameters);
	}

	/**
	 * gets the store address by content
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $storeAddress store address content to search for
	 * @return \SplFixedArray SplFixedArray of store data found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getStoreByStoreAddress(\PDO $pdo, string $storeAddress) {
		// sanitize the description before searching
		$storeAddress = trim($storeAddress);
		$storeAddress = filter_var($storeAddress, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($storeAddress) === true) {
			throw(new \PDOException("store address is invalid"));
		}

		// create query template
		$query = "SELECT storeId, storeName, storeAddress, storeState, storeZip, storePhone, storeEmail FROM store WHERE storeAddress LIKE :storeAddress";
		$statement = $pdo->prepare($query);

		// bind the store content to the place holder in the template
		$storeAddress = "%$storeAddress%";
		$parameters = array("storeContent" => $storeAddress);
		$statement->execute($parameters);

		// build an array of store data
		$storeData = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$store = new Store($row["storeId"], $row["storeName"], $row["storeAddress"], $row["storeState"], $row["storeZip"], $row["storePhone"], $row["storeEmail"]);
				$storeData[$storeData->key()] = $store;
				$storeData->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($storeData);

	}

	/**
	 * get the store by storeId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $storeId store id to search for
	 * @return Store|null store found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getStoreByStoreId(\PDO $pdo, int $storeId) {
		// sanitize the storeId before searching
		if($storeId <= 0) {
			throw(new \PDOException("store id is not positive"));
		}

		// create query template
		$query = "SELECT storeId, storeName, storeAddress, storeState, storeZip, storePhone, storeEmail FROM store WHERE storeId = :storeId";
		$statement = $pdo->prepare($query);

		// bind the store id to the place holder in the template
		$parameters = array("storeId" => $storeId);
		$statement->execute($parameters);

		// grab the store from mySQL
		try {
			$store = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$store = new Store($row["storeId"], $row["storeName"], $row["storeAddress"], $row["storeState"], $row["storeZip"], $row["storePhone"], $row["storeEmail"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($store);
	}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 */
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return($fields);
	}

}

?>