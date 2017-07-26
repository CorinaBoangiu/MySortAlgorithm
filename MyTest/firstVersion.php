<?php
require ('myConstants.php');
class MySort {
	public $path = LOCAL_PATH;
	public function __construct() {
		$this->path;
	}
	
	/**
	 * Create a sort function using class SplFileObject for sort large file in PHP
	 * get the content of file and put the result in array
	 * sort array numeric and write in a new file
	 */
	public function myList($getItem) {
		foreach ( new SplFileObject ( $this->path . $getItem ) as $lineInFile ) {
			preg_match_all ( '/\d+/', $lineInFile, $numbersInFile );
			sort ( $numbersInFile [0], SORT_NUMERIC );
			$newVal = implode ( ',', $numbersInFile [0] );
			$newFile = $this->path . "new_" . $getItem;
			file_put_contents ( $newFile, $newVal );
		}
		;
	}
}

// Example

$myResult = new MySort ();
$myResult->myList ( FILE_RANDOM );

?>
