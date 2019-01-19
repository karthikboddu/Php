<?php
/**
 * Program to replace string with the given string
 * purpose : To replace the string 
 * @author karthik
 * @version 1.0
 * @since 16-01-2019
 */
include 'utility.php';
echo "enter the string \n";
$str = Utility::readString();
Utility::stringReplace($str);
// $str1 = str_replace("<<","",$inputStr);
// $str2 = str_replace(">>","",$str1);
// $str3 = str_replace("UserName","karthik",$str2);
?>