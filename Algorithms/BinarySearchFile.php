<?php
/**
 * overview  : Read in a list of words from File. Then prompt the user to enter a word to
 *              search the list. The program reports if the search word is found in the list.
 * Purpose: Print the result if the word is found or not
 * @author karthik
 * @version 1.0
 * @since 18-01-2019
 */

include 'utility.php';
$path = "wordsString.txt";
$file = fopen($path, "r") or die("file not found");
// echo fgets($file);
$fileString = fgets($file);
// echo $fileString;
$str = explode(",", "$fileString");
for ($i = 0; $i < sizeof($str); $i++) {
    echo $str[$i] . " ";
}
 
/**functiion to perform binarysearch form words file */
Utility::binarySearchFile($str);
?>