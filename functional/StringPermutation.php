<?php
/***********************************************************************************
 * Program to replace string with the given string
 * purpose : To replace the string 
 * @file : StringPermutation.php
 * @author karthik
 * @version 1.0
 * @since 16-01-2019
 **********************************************************************************/
include 'utility.php';
echo "enter the string \n";
$string = Utility::readString();

/**function to get string permutation  */
Utility::stringPermutation($string);

?>