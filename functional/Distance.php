<?php
/**
 * overview :Takes two integer command­line arguments x
 *           and y and prints the Euclidean distance from the point (x, y) to the origin (0, 0).
 * purpose : calculate distance = sqrt(x*x + y*y)
 * @file : Distance.php
 * @author : karthik
 * @version : 1.0
 * @since : 15-01-2019
 *******************************************************************************/
include 'utility.php';
echo "enter value of x ";

/**
 * read vlaue of x 
*/
$x = Utility::readInt();
echo "enter value of y ";

/**
 * read value of y 
*/
$y = Utility::readInt();
Utility::distance($x, $y);
?>