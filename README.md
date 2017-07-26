***********Tools***********

-S.0. : Windows;
-IDE : Eclipse Mars2;
-Languages : PHP7;
-Versioning Tools : GitHub;


***********Links***********
- Apache : https://www.apachelounge.com/download/
- PHP : http://windows.php.net/download#php-7.0 
- GitHub : you need to create an account.

***********Step By Step***********
- Download the latest Apache Version from the official Website https://www.apachelounge.com/download/ -- Zip-File
- Copy Apache24 folder from Zip-File to your C: Drive
- Navigate into C:/Apache24/bin
- Open file --httpd-- with Rightclick -- Run as Administrator 
- Open Start-menu -- Type in : cmd -- Right Click -- Run as Administrator
- Type in CMD ---- cd /Apache24/bin --
- Type in -- httpd -k install -- leave CMD open
- Download !!THREAD SAFE!! Version of PHP from :http://windows.php.net/download#php-7.0
- Open PHP Zip-File
- Create folder --PHP-- in the C: Drive
- Copy Content of PHP Zip-File to C:/PHP/
- Go to C:/PHP
- Search for File with name: "php7apache2_2.dll" and copy the name !! File has other name if older PHP version was downloaded !!
- Go to C:/Apache24/conf
- Open File "httpd" with Editor
- Scroll to bottom and add the following Code:
" LoadModule php7_module "C:/PHP/php7apache2_4" AddHandler application/x-httpd-php .php PHPIniDir C:/PHP "
!! Change PHP Version 7 to the one that you have chosen !!
- Search for line " DirectoryIndex index.html " Change to: "DirectoryIndex index.php index.html"
- Save and close
- Go back to CMD  C:/Apache24/bin  and type in " httpd -k restart "
- Navigate to C:/PHP
- Rename File "php.ini-production" to "php.ini"
- Open php.ini with Editor
- Search for Line "extension=php_mbstring.dll"
- Remove Semicolon ";" in front of "extension=php_mbstring.dll" and "extension=php_mysqli.dll"
- Save Exit
- Open CMD  C:/Apache24/bin and Type in " httpd -k restart "
- Installing EGit in Eclipse :Eclipse->Help -> Install New Software->eGit
- Configurate eGit: Preferences-window Window => Preferences. Navigate to Team => Git => Configuration and hit the New Entry-> complete with your git credentials(username/ password)
- Creating Local Repositories : right clicking on your project and navigate to Team => Share Project… -> Select Git as the repository -> Next. ->slect your project-> Create Repository->Finish.
- Create a newRepository in you Git account.
-(You can made you first commit!!)


***********Tasks***********
You have for input an unsorted file with number and you have to sort the file.
You have 3 file with different number of data: 100, 10000 and 10000000.

***********Solution***********
I created a file myConstants.php with constants for using in all php files. If you have another location for you input files, please change the values.

Solution 1 (firstVersion.php)
	- I create a sort function using class SplFileObject for sort large file in PHP
	- Get the content of page and put into array
	- Sort array numeric and write in a new file
	
	
Solution 2(mergeSort.php)
	- I create a function to get the name of file , open the file and put in an array
	- Call mergeSort algorithm to sort the file.
	- The concept of "Merge Sort" -> get array and split in 2 parts
								  -> do the same thing(recursiv sort ) until you have only one value left and one value right
								  -> call the merge function to combine
								  -> combine by merging the two sorted subarrays back into the single sorted subarray (left and fight)
	 - Write the new file;
	
		
Solution 3 (quickSort.php)
	- I create a function to get the name of file , open the file and put in an array
	- Call quickSort algorithm to sort the file.
	- The concept of "Quick Sort" -> get the array an select a item as a pivot(first position because is an anorder array)
								  -> split the initial array in 2 parts, values  that are smaller or bigger than pivot value and put in 2 different arrays.
								  ->  merge array
	- Write the new file;
	
	
Solution 4(externalSort.php)
	- I create a function to get the name of file , open the file and read charachter by character until find a comma
	- Count your value in array at the index with the same value that you have 
	- Write the new file by iterating the array;
	

***********Conclusion***********

For files with fewer data you can choose solution 1, 2 and 3.
The last solution it fit very well for all file with different number of data.

All this algorithms save the data into the main memory of a computing device (usually RAM).

Concept of "External sorting"
For large file you can use "External sorting",  typically uses a hybrid sort-merge strategy.
In the sorting phase, chunks of data small enough to fit in main memory are read, sorted, and written out to a temporary file. 
In the merge phase, the sorted sub-files are combined into a single large file.

Another way to sort large file is to use database(eg. mySql). You inset you data in database and let the database to do that, because database can work with big data.
