<?php
/**
 * Print the year is a Leap Year or not.
 * purpose : Determine if it is a Leap Year.
 * @author karthik
 * @version 1.0
 * @since 15-01-2019
 */
include 'utility.php';
echo "enter year";
$yr = Utility::readInt();
$flag = Utility::checkLeapYear($yr);
?>