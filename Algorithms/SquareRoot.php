<?php
/**
 * overview : Write a static function sqrt to compute the square root of a nonnegative number c
 * purpose :  to compute the square root of a nonnegative number c
 * @file : SquareRoot.php
 * @author : karthik
 * @version : 1.0   
 * @since : 19-01-2019
 */
require('utility.php');
echo "enter the number \n";
$number = Utility::readInt();

/**function to find square root of a number */
Utility::sqrt($number);
?>