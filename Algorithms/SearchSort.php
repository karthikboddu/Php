<?php 
include('utility.php');
echo "enter the size of array";
$n = Utility::readInt();
$arr = array();
    for($i=0;$i<$n;$i++){
        $arr[$i] = Utility::readString();
    }
    asort($arr);
// echo "enter element to search \n"; 
//  $key = Utility::readString();
// Utility::binarySearch($arr,$key);
// Utility::binarySearchString($arr,$key);
// Utility::insertionSort($arr);
// Utility::insertionSortString($arr);
Utility::bubbleSortString($arr);
// Utility::bubbleSort($arr);
?>