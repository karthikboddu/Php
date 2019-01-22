<?php 
/**
 * takes two integer command­line arguments x
 * and y and prints the Euclidean distance from the point (x, y) to the origin (0, 0).
 * purpose : calculate distance = sqrt(x*x + y*y)
 * @author karthik
 * @version 1.0
 * @since 17-01-2019
 */
    include('utility.php');
    echo "enter first string ";
    $str1 = Utility::readString();//read string1
    echo "enter second string ";
    $str2 = Utility::readString();//read string2
    Utility::checkAnagram($str1,$str2);
?>