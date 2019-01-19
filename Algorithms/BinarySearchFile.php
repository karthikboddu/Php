<?php
/**
     * Create Utility Class having bubblesort int string ,binary search int string,insertion int string  
     * Purpose: Print elapsed time for each sort and search techniques 
     * @author karthik
     * @version 1.0   
     * @since 17-01-2019
 */ 

    include('utility.php');
    $path = "wordsString.txt";
    $file = fopen($path,"r") or die("file not found");
    // echo fgets($file);
    $fileString = fgets($file);
    // echo $fileString;
    $str = explode(",","$fileString");
    for($i=0;$i<sizeof($str);$i++){
        echo $str[$i]." ";
    }

    Utility::binarySearchFile($str);

?>