<?php

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
 * @return int|null value of store name
 */

public function getStoreName() {
			return($this->storeName);
}

/**
 * mutator method for tweet id
 *
 * @param int|null $newStoreName new value of store name
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

			// verify the store name content will fit in the database
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

