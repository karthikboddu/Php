<?php
include('utility.php');
$path = "wordsInt.txt";
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