<?php
require ('myConstants.php');
ini_set ( ‘memory_limit’, ‘1G’ );
set_time_limit ( 0 );
class ExternalSort {
	public $path = LOCAL_PATH;
	public function __construct() {
		$this->path;
	}
	
	/**
	 * Get the name of file , open the file and read charachter by character until find a comma
	 * Count your value in array at the index with the same value that you have
	 * Write the new file by iterating the array;
	 */
	public function myList($getItem) {
		$inFile = $this->path . $getItem;
		$outFile = $this->path . "external_" . $getItem;
		$input = fopen ( $inFile, 'r' );
		if ($input === false) {
			throw new Exception ( 'Unable to open: ' . $inFile );
		}
		
		$map = array_fill ( 1, 10000, 0 );
		// Read file line by line and count how many of each specific number you have
		
		while ( ! feof ( $input ) ) {
			
			$finalNamb;
			$row = fgetc ( $input );
			if ($row == "," || $row == "") {
				
				$int = ( int ) $finalNamb;
				$map [$int] ++;
				$finalNamb = "";
			} else {
				$finalNamb .= $row;
			}
		}
		fclose ( $input );
		$output = fopen ( $outFile, 'w' );
		if ($output === false) {
			throw new Exception ( 'Unable to open: ' . $outFile );
		}
		
		// Write values into your output file
		foreach ( $map as $number => $count ) {
			
			$string = ($number) . ",";
			for($i = 0; $i < $count; $i ++) {
				fwrite ( $output, $string );
			}
		}
		fclose ( $output );
	}
}

$myResult = new ExternalSort ();
$myResult->myList ( FILE_RANDOM );

?>
