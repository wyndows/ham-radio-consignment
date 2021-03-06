<?php

namespace Edu\Cnm\Mball15\HamRadioConsignment;

require_once ("autoload.php");

/**
 * Small Cross Section of a User's Profile
 *
 * This can be considered a small example of what information is utilized from a User Entity.
 *
 * @author Marlan Ball <mball15@cnm.edu>
 * @version 1.0.0
 */
class User implements \JsonSerializable {
	use ValidateDate;

	/**
	 * id for the user; this is the primary key
	 * @var int $userId
	 */
	private $userId;
	/**
	 * the last name of the user
	 * @var string $userLastName
	 */
	private $userLastName;
	/**
	 * the First name of the user
	 * @var string $userFirstName
	 */
	private $userFirstName;
	/**
	 * the address of the user
	 * @var string $userAddress
	 */
	private $userAddress;
	/**
	 * the city of the user
	 * @var string $userCity
	 */
	private $userCity;
	/**
	 * the state of the user
	 * @var string $userState
	 */
	private $userState;
	/**
	 * the zip code of the user
	 * @var string $userZip
	 */
	private $userZip;
	/**
	 * the email address of the user
	 * @var string $userEmail
	 */
	private $userEmail;
	/**
	 * the phone number of the user
	 * @var string $userPhone
	 */
	private $userPhone;
	/**
	 * the salted password of the user
	 * @var string $userSalt
	 */
	private $userSalt;
	/**
	 * the hashed password of the user
	 * @var string $userHash
	 */
	private $userHash;

	/**
	 * accessor method for user id
	 *
	 * @return int|null value of store id
	 */
	public function getUserId() {
		return($this->userId);
	}

	/**
	 * mutator method for user id
	 *
	 * @param int/null $newUserId new value of user id
	 * @throws \RangeException if $newUserId is not positive
	 * @throws \TypeError if $newUserId is not an integer
	 */
	public function setUserId(int $newUserId = null) {
		// base case: if the user id is null, this is a new user without a mySQL assigned id
		if($newUserId === null) {
			$this->userId = null;
			return;
		}

		// verify the user id is positive
		if($newUserId <= 0) {
			throw(new \RangeException("user id is not positive"));
		}

		// store the user id
		$this->userId = $newUserId;
	}

	/**
	 * access method for user's last name
	 *
	 * @return string value of user's last name
	 */
	public function getUserLastName() {
		return($this->userLastName);
	}

	/**
	 * mutator method for user's last name
	 *
	 * @param string $newUserLastName new value of user's last name
	 * @throws \InvalidArgumentException if $newUserLastName is not a string or insecure
	 * @throws \RangeException if $newUserLastName is > 20 characters
	 * @throws \TypeError if $newUserLastName is not a string
	 */
	public function setUserLastName(string $newUserLastName) {
		// verify the store name is secure
		$newUserLastName = trim($newUserLastName);
		$newUserLastName = filter_var($newUserLastName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserLastName) === true) {
			throw(new \InvalidArgumentException("user last name is empty or insecure"));
		}

		// verify the user last name will fit in the database
		if(strlen($newUserLastName) > 20) {
			throw(new \RangeException("user last name is too long"));
		}

		// store the user last name
		$this->userLastName = $newUserLastName;
	}

	/**
	 * accessor method for user first name
	 *
	 * @return string value of user first name
	 */
	public function getUserFirstName() {
		return($this->userFirstName);
	}

	/**
	 * mutator method for user first name
	 *
	 * @param string $newUserFirstName new value of user's first name
	 * @throws \InvalidArgumentException if $newUserFirstName is not a string or insecure
	 * @throws \RangeException if $newUserFirstName is > 20 characters
	 * @throws \TypeError if $newUserFirstName is not a string
	 */
	public function setUserFirstName(string $newUserFirstName) {
		// verify the user first name is secure
		$newUserFirstName = trim($newUserFirstName);
		$newUserFirstName = filter_var($newUserFirstName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserFirstName) === true) {
			throw(new \InvalidArgumentException("user first name is empty or insecure"));
		}

		// verify the user first name will fit in the database
		if(strlen($newUserFirstName) > 20) {
			throw(new \RangeException("user first name is too long"));
		}

		// store the user first name
		$this->userFirstName = $newUserFirstName;
	}

	/**
	 * accessor method for user address
	 *
	 * @return string value of user address
	 */
	public function getUserAddress() {
		return $this->userAddress;
	}

	/**
	 * mutator method for user address
	 *
	 * @param string $newUserAddress new value of user address
	 * @throws \InvalidArgumentException if $newUserAddress is not a string or insecure
	 * @throws \RangeException if $newUserAddress is > 100 characters
	 * @throws \TypeError if $newUserAddress is not a string
	 */
	public function setUserAddress(string $newUserAddress) {
		// verify the user address is secure
		$newUserAddress = trim($newUserAddress);
		$newUserAddress = filter_var($newUserAddress, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserAddress) === true) {
			throw(new \InvalidArgumentException("user address is empty or insecure"));
		}

		//verify the user address will fit in the database
		if(strlen($newUserAddress) > 100) {
			throw(new \RangeException("user address is too long"));
		}

		//store the user address
		$this->userAddress = $newUserAddress;

	}

	/**
	 * accessor method for user city
	 *
	 * @return string value of user city
	 */
	public function getUserCity() {
		return $this->userCity;
	}

	/**
	 * mutator method for user city
	 *
	 * @param string $newUserAddress new value of user city
	 * @throws \InvalidArgumentException if $newUserCity is not a string or insecure
	 * @throws \RangeException if $newUserCity is > 100 characters
	 * @throws \TypeError if $newUserCity is not a string
	 */
	public function setUserCity(string $newUserCity) {
		// verify the user city is secure
		$newUserCity = trim($newUserCity);
		$newUserCity = filter_var($newUserCity, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserCity) === true) {
			throw(new \InvalidArgumentException("user city is empty or insecure"));
		}

		//verify the user city will fit in the database
		if(strlen($newUserCity) > 100) {
			throw(new \RangeException("user city is too long"));
		}

		//store the user city
		$this->userCity = $newUserCity;

	}

	/**
	 * accessor method for user state
	 *
	 * @return string value of user state
	 */
	public function getUserState() {
		return $this->userState;
	}

	/**
	 * mutator method for user state
	 *
	 * @param string $newUserAddress new value of user state
	 * @throws \InvalidArgumentException if $newUserState is not a string or insecure
	 * @throws \RangeException if $newUserState is > 100 characters
	 * @throws \TypeError if $newUserState is not a string
	 */
	public function setUserState(string $newUserState) {
		// verify the user state is secure
		$newUserState = trim($newUserState);
		$newUserState = filter_var($newUserState, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserState) === true) {
			throw(new \InvalidArgumentException("user state is empty or insecure"));
		}

		//verify the user state will fit in the database
		if(strlen($newUserState) > 100) {
			throw(new \RangeException("user state is too long"));
		}

		//store the user state
		$this->userState = $newUserState;

	}

	/**
	 * accessor method for user zip code
	 *
	 * @return string value of user zip code
	 */
	public function getUserZip() {}



}