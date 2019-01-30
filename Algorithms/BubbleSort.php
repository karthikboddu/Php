<?php
/**
 * overivew : Reads in integers prints them in sorted order using Bubble Sort
 * Purpose: Print sorted list from the file using bubble sort
 * @author : karthik
 * @version : 1.0
 * @since : 17-01-2019
 */
require 'utility.php';

/**path of file */
$path = "wordsInt.txt";

//**reading from file */
$file = fopen($path, "r") or die("file not found");

/**storing in string from file */
$fileString = fgets($file);

//**explode string by ',' to arry string */
$str = explode(",", $fileString);
for ($i = 0; $i < sizeof($str); $i++) {
    echo $str[$i] . " ";
}
echo " \n";

//** function to sort data with bubblesort*/
Utility::bubbleSortFile($str);
?>