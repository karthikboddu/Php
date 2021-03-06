<?php
/**
 * overview : Reads in strings from standard input and prints them in sorted order Uses insertion sort
 * Purpose : read the string from file and print them in a sorted order
 * @author : karthik
 * @version : 1.0
 * @since : 17-01-2019
 */
require 'utility.php';

/**set path of file */
$path = "wordsString.txt";

/**read the file */
$file = fopen($path, "r");
$filestr = fgets($file);

/**conert string to array */
$str = explode(",", $filestr) or die("file not found");

for ($i = 0; $i < sizeof($str); $i++) {
    echo $str[$i] . " ";
    echo " \n";
}
echo "\n";

/**function to perform insertion sort on file of int */
Utility::insertionSortFile($str);

?>