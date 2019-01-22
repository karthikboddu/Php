<?php
/**
     * Reads in integers prints them in sorted order using Bubble Sort
     * Purpose: Print sorted list from the file using bubble sort
     * @author karthik
     * @version 1.0   
     * @since 17-01-2019
 */ 
    require('utility.php');
    $path = "wordsInt.txt";/**path of file */
    $file = fopen($path,"r") or die("file not found");//**reading from file */
    $fileString = fgets($file);/**storing in string from file */
    $str = explode(",",$fileString);//**explode string by ',' to arry string */
    for($i=0;$i<sizeof($str);$i++){
        echo $str[$i]." "; 
    }
    echo " \n";
    Utility::bubbleSortFile($str);//** call for method with array*/
    ?> 