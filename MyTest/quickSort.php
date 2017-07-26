<?php
require ('myConstants.php');
class QuickSort {
	public $path = LOCAL_PATH;
	public function __construct() {
		$this->path;
	}
	
	/**
	 * Get the name of file , open the file and put in an array
	 * Call quickSort algorithm to sort the file.
	 * Write the new file;
	 */
	function myList($getItem) {
		if ($file = fopen ( $this->path . $getItem, "r" )) {
			while ( ! feof ( $file ) ) {
				$line = fgets ( $file );
				$myArr = explode ( ",", $line );
			}
			
			$result = implode ( ',', $this->quick_sort ( $myArr ) );
			file_put_contents ( $this->path . "quickSort_" . $getItem, $result );
		}
	}
	
	/**
	 * Get the array an select a item as a pivot(first position)
	 * Split the initial array in 2 parts values smaller or bigger than pivot value and put in 2 different arrays
	 * Merge the arrays
	 */
	function quick_sort($array) {
		$length = count ( $array );
		
		if ($length <= 1) {
			return $array;
		} else {
			
			// select an item to act as a pivot point
			$pivot = $array [0];
			
			// declare our two arrays to act as partitions
			$left = $right = array ();
			
			// loop and compare each item in the array to the pivot value, place item in appropriate partition
			for($i = 1; $i < count ( $array ); $i ++) {
				if ($array [$i] < $pivot) {
					$left [] = $array [$i];
				} else {
					$right [] = $array [$i];
				}
			}
			
			// use recursion to now sort the left and right lists
			return array_merge ( $this->quick_sort ( $left ), array (
					$pivot 
			), $this->quick_sort ( $right ) );
		}
	}
}

// Test

$myResult = new QuickSort ();
$myResult->myList ( FILE_RANDOM );
