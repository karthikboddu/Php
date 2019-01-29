<?php
/**
 * overview : takes two integer command­line arguments x
 *              and y and prints the Euclidean distance from the point (x, y) to the origin (0, 0).
 * purpose : calculate distance = sqrt(x*x + y*y)
 * @file : Anagram.php
 * @author karthik
 * @version 1.0
 * @since 17-01-2019
 */
include 'utility.php';
echo "enter first string ";

/** read string2 str2*/
$str1 = Utility::readString();
echo "enter second string ";
$str2 = Utility::readString();

/**function to check anagram */
Utility::checkAnagram($str1, $str2);
?>