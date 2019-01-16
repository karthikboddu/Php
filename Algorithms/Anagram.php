<?php 
    include('../Utility/utility.php');
    echo "enter first string";
    $str1 = readString();//read string1
    echo "enter second string";
    $str2 = readString();//read string2
    checkAnagram($str1,$str2);
?>