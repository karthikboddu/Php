<?php
/**
 * Write a program with Static Functions to do Merge Sort of list of Strings
 * purpose : To sort elements using merge sort
 * @author karthik
 * @version 1.0
 * @since 19-01-2019
 */
include 'utility.php';
// echo "enter the number of elements\n";
// $num = Utility::readInt();
// // echo "enter the string \n";
$input = array("a","b","f","r","g","d");

// $input =array();
// for($i=0;$i<$num;$i++){
   
//     $input[$i] = Utility::getStringArray();
// }
// echo count($input);
$output = Utility::mergeSort($input);
echo "elements are \n";
for($i=0;$i<sizeof($output);$i++){
    echo $output[$i] ."   \n";
}