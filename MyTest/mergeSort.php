<?php
include ('myConstants.php');
class MergeSort {
	public $path = LOCAL_PATH;
	public function __construct() {
		$this->path;
	}
	
	/**
	 * Get the name of file , open the file and put in an array
	 * Call mergeSort algorithm to sort the file.
	 * Write the new file;
	 */
	function myList($getItem) {
		if ($file = fopen ( $this->path . $getItem, "r" )) {
			while ( ! feof ( $file ) ) {
				$line = fgets ( $file );
				$myArr = explode ( ",", $line );
			}
			
			$result = implode ( ',', $this->merge_sort ( $myArr ) );
			file_put_contents ( $this->path . "mergeSort_" . $getItem, $result );
		}
	}
	
	/**
	 * Get array and split in 2 parts
	 * Do the same thing(recursiv sort ) until you have only one value in the left and one value in the right
	 * Call the merge function to combine
	 */
	function merge_sort($my_array) {
		if (count ( $my_array ) == 1)
			return $my_array;
		
		$mid = count ( $my_array ) / 2;
		$left = array_slice ( $my_array, 0, $mid );
		$right = array_slice ( $my_array, $mid );
		
		$left = $this->merge_sort ( $left );
		$right = $this->merge_sort ( $right );
		
		return $this->merge ( $left, $right );
	}
	
	/**
	 * Combine by merging the two sorted subarrays back into the single sorted subarray (left and fight)
	 */
	function merge($left, $right) {
		$res = array ();
		while ( count ( $left ) > 0 && count ( $right ) > 0 ) {
			if ($left [0] > $right [0]) {
				$res [] = $right [0];
				$right = array_slice ( $right, 1 );
			} else {
				$res [] = $left [0];
				$left = array_slice ( $left, 1 );
			}
		}
		while ( count ( $left ) > 0 ) {
			$res [] = $left [0];
			$left = array_slice ( $left, 1 );
		}
		while ( count ( $right ) > 0 ) {
			$res [] = $right [0];
			$right = array_slice ( $right, 1 );
		}
		return $res;
	}
}

// Test

$myResult = new MergeSort ();
$myResult->myList ( FILE_RANDOM );

?>