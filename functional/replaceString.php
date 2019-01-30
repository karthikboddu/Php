<?php
/**
 * overview : Program to replace string with the given string
 * purpose : To replace the string 
 * @author : karthik
 * @version : 1.0
 * @since : 16-01-2019
 **********************************************************************************/
include 'utility.php';
echo "enter the string \n";
$str = Utility::readString();

/**
 * function to replace string 
*/
Utility::stringReplace($str);

?>