<?php
/**
 * overview : Print the year is a Leap Year or not.
 * purpose : Determine if it is a Leap Year.
 * @file : LeapYear.php 
 * @author : karthik
 * @version : 1.0
 * @since  : 15-01-2019
 ********************************************************************************/
include 'utility.php';
echo "enter year";
$yr = Utility::readInt();

/**
 * function to checkleap year 
*/
$flag = Utility::checkLeapYear($yr);
?>