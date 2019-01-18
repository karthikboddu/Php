<?php 
    include('../Utility/utility.php');
    echo "enter first string ";
    $str1 = Utility::readString();//read string1
    echo "enter second string ";
    $str2 = Utility::readString();//read string2
    Utility::checkAnagram($str1,$str2);
?>